// =============================================
// Theme Module
// =============================================
const Theme = (() => {
    const updateThemeIcons = (isDark) => {
        document.querySelectorAll('.theme-icon').forEach(icon => {
            if (isDark) {
                icon.classList.replace('fa-sun', 'fa-moon');
            } else {
                icon.classList.replace('fa-moon', 'fa-sun');
            }
        });
    };

    const init = () => {
        const themeToggle = document.getElementById('themeToggle');
        const themeToggleMobile = document.getElementById('themeToggleMobile');
        const htmlElement = document.documentElement;
        
        // Check saved theme or prefer color scheme
        const savedTheme = localStorage.getItem('theme') || 
                          (window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light');
        
        // Set initial theme
        if (savedTheme === 'dark') {
            htmlElement.setAttribute('data-bs-theme', 'dark');
            updateThemeIcons(true);
        } else {
            htmlElement.setAttribute('data-bs-theme', 'light');
            updateThemeIcons(false);
        }
        
        // Toggle theme on button click (desktop)
        if (themeToggle) {
            themeToggle.addEventListener('click', function() {
                const isDark = htmlElement.getAttribute('data-bs-theme') === 'dark';
                
                if (isDark) {
                    htmlElement.setAttribute('data-bs-theme', 'light');
                    updateThemeIcons(false);
                    localStorage.setItem('theme', 'light');
                } else {
                    htmlElement.setAttribute('data-bs-theme', 'dark');
                    updateThemeIcons(true);
                    localStorage.setItem('theme', 'dark');
                }
            });
        }

        // Toggle theme on button click (mobile)
        if (themeToggleMobile) {
            themeToggleMobile.addEventListener('click', function() {
                const isDark = htmlElement.getAttribute('data-bs-theme') === 'dark';
                
                if (isDark) {
                    htmlElement.setAttribute('data-bs-theme', 'light');
                    updateThemeIcons(false);
                    localStorage.setItem('theme', 'light');
                } else {
                    htmlElement.setAttribute('data-bs-theme', 'dark');
                    updateThemeIcons(true);
                    localStorage.setItem('theme', 'dark');
                }
            });
        }
    };

    return { init };
})();

// =============================================
// Base URL Configuration
// =============================================
// Dynamically determine the base URL.
// This assumes your script.js is in the root of your application,
// or you are consistent with relative paths.
// If your application is always in a subfolder (e.g., /my-app/),
// you might explicitly set: const baseURL = '/my-app/';
const baseURL = window.location.origin + window.location.pathname.substring(0, window.location.pathname.lastIndexOf('/') + 1);

// =============================================
// Search Module
// =============================================
const Search = (() => {
    let searchTimeout;
    let allTools = []; // Cache for all tools from homepage

    const fetchAllTools = async () => {
        try {
            // Fetch the homepage HTML using the base URL
            const response = await fetch(baseURL);
            const html = await response.text();
            
            // Parse the HTML to extract tools
            const parser = new DOMParser();
            const doc = parser.parseFromString(html, 'text/html');
            
            const tools = [];
            doc.querySelectorAll('.card-link').forEach(card => {
                // Ensure URLs are relative to the base URL or absolute if needed
                const rawUrl = card.getAttribute('href') || '#';
                const fullUrl = new URL(rawUrl, baseURL).pathname; // Construct full path relative to origin

                tools.push({
                    name: card.querySelector('.card-title')?.textContent?.trim() || '',
                    description: card.querySelector('.card-text')?.textContent?.trim() || '',
                    url: fullUrl, // Store the full relative path
                    icon: card.querySelector('.icon-wrapper i')?.className.match(/fa-(.*?)(?=\s|$)/)?.[1] || 'tools'
                });
            });
            
            return tools;
        } catch (error) {
            console.error('Error fetching tools from homepage:', error);
            return [];
        }
    };

    const displayResults = (results, container) => {
        if (results.length === 0) {
            container.innerHTML = '<div class="search-loading">No tools found matching your search</div>';
            return;
        }
        
        let html = '';
        results.forEach(item => {
            html += `
                <div class="search-result-item" onclick="window.location.href='${item.url}'">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-${item.icon} text-primary me-3"></i>
                        <div>
                            <h6 class="mb-1">${item.name}</h6>
                            <p class="text-muted small mb-0">${item.description}</p>
                        </div>
                    </div>
                </div>
            `;
        });
        
        container.innerHTML = html;
    };

    const init = async () => {
        const searchToggle = document.getElementById('searchToggle');
        const searchToggleMobile = document.getElementById('searchToggleMobile');
        const searchBar = document.getElementById('searchBar');
        const searchInput = document.getElementById('searchInput');
        const searchResults = document.getElementById('searchResults');
        
        if (!searchToggle || !searchBar || !searchInput || !searchResults) return;

        // Pre-fetch all tools from homepage
        allTools = await fetchAllTools();

        // Toggle search bar (desktop)
        searchToggle.addEventListener('click', function(e) {
            e.stopPropagation();
            searchBar.classList.toggle('d-none');
            if (!searchBar.classList.contains('d-none')) {
                searchInput.focus();
            } else {
                searchInput.value = '';
                searchResults.innerHTML = '';
            }
        });

        // Toggle search bar (mobile)
        if (searchToggleMobile) {
            searchToggleMobile.addEventListener('click', function(e) {
                e.stopPropagation();
                searchBar.classList.toggle('d-none');
                if (!searchBar.classList.contains('d-none')) {
                    searchInput.focus();
                } else {
                    searchInput.value = '';
                    searchResults.innerHTML = '';
                }
            });
        }

        // Search as you type
        searchInput.addEventListener('input', function() {
            clearTimeout(searchTimeout);
            
            const query = this.value.trim();
            searchResults.innerHTML = '<div class="search-loading"><i class="fas fa-spinner fa-spin me-2"></i>Searching...</div>';
            
            if (query.length < 1) {
                searchResults.innerHTML = '<div class="search-loading">Type at least 1 character</div>';
                return;
            }
            
            searchTimeout = setTimeout(() => {
                const results = allTools.filter(tool => 
                    tool.name.toLowerCase().includes(query.toLowerCase()) || 
                    tool.description.toLowerCase().includes(query.toLowerCase())
                );
                displayResults(results, searchResults);
            }, 300);
        });

        // Close search when clicking outside
        document.addEventListener('click', function(e) {
            if (!searchBar.contains(e.target)) {
                const isSearchToggle = e.target === searchToggle || e.target === searchToggleMobile || 
                                     searchToggle.contains(e.target) || (searchToggleMobile && searchToggleMobile.contains(e.target));
                
                if (!isSearchToggle) {
                    searchBar.classList.add('d-none');
                    searchInput.value = '';
                    searchResults.innerHTML = '';
                }
            }
        });

        // Prevent search bar from closing when clicking inside it
        searchBar.addEventListener('click', function(e) {
            e.stopPropagation();
        });
    };

    return { init };
})();

// =============================================
// Sidebar With Search
// =============================================
document.addEventListener('DOMContentLoaded', function() {
    // Fetch tools from homepage using the base URL
    function fetchTools() {
        return fetch(baseURL)
            .then(response => response.text())
            .then(html => {
                const parser = new DOMParser();
                const doc = parser.parseFromString(html, 'text/html');
                const tools = [];
                
                doc.querySelectorAll('.card-link').forEach(card => {
                    // Ensure URLs are relative to the base URL or absolute if needed
                    const rawUrl = card.getAttribute('href') || '#';
                    const fullUrl = new URL(rawUrl, baseURL).pathname; // Construct full path relative to origin

                    tools.push({
                        name: card.querySelector('.card-title')?.textContent?.trim() || 'Untitled Tool',
                        url: fullUrl, // Store the full relative path
                        icon: card.querySelector('.icon-wrapper i')?.className.match(/fa-(.*?)(?=\s|$)/)?.[1] || 'tools'
                    });
                });
                return tools;
            });
    }

    function renderTools(tools) {
        const toolsList = document.getElementById('toolsList');
        if (!toolsList) return;
        toolsList.innerHTML = '';
        
        tools.forEach(tool => {
            // Compare current path with the full relative path of the tool
            const isCurrent = window.location.pathname === tool.url;
            const toolItem = document.createElement('a');
            toolItem.href = tool.url;
            toolItem.className = `list-group-item list-group-item-action d-flex align-items-center ${isCurrent ? 'active bg-danger border-danger' : ''}`;
            toolItem.innerHTML = `
                <i class="fas fa-${tool.icon} me-2 ${isCurrent ? 'text-white' : 'text-danger'}"></i>
                <span class="${isCurrent ? 'text-white' : ''}">${tool.name}</span>
                ${isCurrent ? '<span class="visually-hidden">(current)</span>' : ''}
            `;
            toolsList.appendChild(toolItem);
        });
    }

    // Initialize search functionality
    function initSearch(tools) {
        const searchInput = document.getElementById('searchTools');
        if (!searchInput) return;
        searchInput.addEventListener('input', function() {
            const query = this.value.toLowerCase();
            const filteredTools = tools.filter(tool => 
                tool.name.toLowerCase().includes(query) || 
                tool.icon.toLowerCase().includes(query)
            );
            renderTools(filteredTools);
        });
    }

    // Main initialization
    fetchTools()
        .then(tools => {
            renderTools(tools);
            initSearch(tools);
        })
        .catch(error => {
            console.error('Error loading tools:', error);
            const toolsListElem = document.getElementById('toolsList');
            if (toolsListElem) {
                toolsListElem.innerHTML = `
                    <div class="alert alert-danger">
                        Failed to load tools. Please try again later.
                    </div>
                `;
            }
        });
});

// =============================================
// Scroll To Top Module
// =============================================
const ScrollToTop = (() => {
    const init = () => {
        const scrollToTopBtn = document.getElementById('scrollToTop');
        
        if (!scrollToTopBtn) return;

        window.addEventListener('scroll', function() {
            scrollToTopBtn.classList.toggle('visible', window.scrollY > 300);
        });
        
        scrollToTopBtn.addEventListener('click', function() {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    };

    return { init };
})();

// =============================================
// Main Initialization
// =============================================
document.addEventListener('DOMContentLoaded', function() {
    Search.init();
    Theme.init();
    ScrollToTop.init();
});