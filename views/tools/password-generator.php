<?php
// SEO and Page Metadata
$page_title = "Password Generator - Create Strong Secure Passwords Online"; // You may Change the Title here
$page_description = "Free password generator online. Create strong, secure, random passwords with custom length and character sets. Generate 100% secure passwords instantly."; // Put your Description here
$page_keywords = "$kw";

// Include common header
include '../../includes/header.php';
?>

<!-- TOOL -->
<div class="container">
    <div class="row justify-content-center">
        
        <!-- Mobile Toggle Button (Visible only on mobile) -->
        <div class="d-lg-none mb-3">
            <button class="btn btn-outline-danger w-100 d-flex justify-content-between align-items-center collapsed" 
                    type="button" 
                    data-bs-toggle="collapse" 
                    data-bs-target="#toolsSidebar" 
                    aria-expanded="false">
                <span>Browse Tools</span>
                <i class="fas fa-chevron-down"></i>
            </button>
        </div>


        <!-- Sidebar Column (Visible on all screens) -->
        <div class="col-lg-2">
            <div class="collapse d-lg-block h-100" id="toolsSidebar">
                <div class="card h-100">
                    <div class="card-body p-2">
                        <!-- Search Box -->
                        <input type="text" id="searchTools" class="form-control border-danger mb-3" placeholder="Search tools...">
                        
                        <!-- Tools List -->
                        <div class="list-group list-group-flush overflow-auto" style="max-height: calc(200vh - 150px);">
                            <div id="toolsList"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-lg-7 border shadow-sm">
            <div class="tool-container rounded-3 p-4 p-md-5">
                <header class="text-center mb-4">
                    <h1 class="h2">Password Generator <i class="fas fa-key text-danger ms-2"></i></h1>
                    <p class="lead text-muted">Create strong, secure passwords for all your accounts.</p>
                </header>

                <div class="options-card card mb-4">
                    <div class="card-header bg-light">
                        <h5 class="mb-0"><i class="fas fa-sliders-h me-2"></i>Password Settings</h5>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="passwordLength" class="form-label">Password Length</label>
                                <input type="range" class="form-range" min="8" max="64" value="16" id="passwordLength">
                                <div class="d-flex justify-content-between">
                                    <span>8</span>
                                    <span id="lengthValue">16</span>
                                    <span>64</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="passwordQuantity" class="form-label">Number of Passwords</label>
                                <select id="passwordQuantity" class="form-select">
                                    <option value="1">1</option>
                                    <option value="3">3</option>
                                    <option value="5">5</option>
                                    <option value="10">10</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="includeUppercase" checked>
                                    <label class="form-check-label" for="includeUppercase">
                                        Include Uppercase Letters (A-Z)
                                    </label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="includeLowercase" checked>
                                    <label class="form-check-label" for="includeLowercase">
                                        Include Lowercase Letters (a-z)
                                    </label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="includeNumbers" checked>
                                    <label class="form-check-label" for="includeNumbers">
                                        Include Numbers (0-9)
                                    </label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="includeSymbols">
                                    <label class="form-check-label" for="includeSymbols">
                                        Include Symbols (!@#$%^&*)
                                    </label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="excludeSimilar">
                                    <label class="form-check-label" for="excludeSimilar">
                                        Exclude Similar Characters (i,l,1,L,o,0,O)
                                    </label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="excludeAmbiguous">
                                    <label class="form-check-label" for="excludeAmbiguous">
                                        Exclude Ambiguous Characters ({ } [ ] ( ) / \ ' " ` ~ , ; : . < >)
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-grid gap-3 d-md-flex justify-content-md-center mb-4">
                    <button class="btn btn-danger btn-md px-4" id="generateBtn">
                        <i class="fas fa-bolt me-2"></i> Generate
                    </button>
                    <button class="btn btn-primary btn-md px-4" id="howToBtn">
                        <i class="fas fa-question-circle me-2"></i> How To
                    </button>
                    <button class="btn btn-secondary btn-md px-2" id="resetBtn">
                        <i class="fas fa-redo me-2"></i> Reset
                    </button>
                    <button class="btn btn-success btn-md px-2" id="copyBtn" disabled>
                        <i class="fas fa-copy me-2"></i> Copy
                    </button>
                </div>

                <div id="statusArea" class="text-center"></div>

                <div class="preview-area card mt-4">
                    <div class="card-header bg-light d-flex justify-content-between align-items-center">
                        <h5 class="mb-0"><i class="fas fa-lock me-2"></i>Generated Passwords</h5>
                        <span class="badge bg-info" id="strengthBadge">Strength: Medium</span>
                    </div>
                    <div class="card-body p-0">
                        <div class="m-0 p-3 bg-light" id="passwordOutput" style="min-height: 200px; max-height: 400px; overflow: auto;">
                            <div class="text-center text-muted">Your generated passwords will appear here</div>
                        </div>
                    </div>
                </div>

                <div class="history-area card mt-4" id="historyContainer" style="display: none;">
                    <div class="card-header bg-light">
                        <h5 class="mb-0"><i class="fas fa-history me-2"></i>Password History (Last 10)</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0" id="historyTable">
                                <thead>
                                    <tr>
                                        <th width="5%"></th>
                                        <th>Password</th>
                                        <th>Date</th>
                                        <th>Strength</th>
                                        <th width="15%" class="text-end">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="historyList"></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <!-- Sticky sidebar -->
    </div>
</div>

<?php include '../../includes/sharer.php'; ?>

<!-- Content -->
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8 border shadow-sm">
            <article>
                <header class="mb-5 text-center">
                    <h2 class="display-5"><?php echo $page_title; ?></h2>
                    <p class="lead"><?php echo $page_description; ?></p>
                </header>
                <?php include '../../views/content/password-generator-content.php'; ?>
            </article>
        </div>
    </div>
</div>

<script>
// JavaScript for Password Generator
let generatedPasswords = [];
let passwordHistory = JSON.parse(localStorage.getItem('passwordHistory')) || [];

// Character sets
const charSets = {
    lowercase: 'abcdefghijklmnopqrstuvwxyz',
    uppercase: 'ABCDEFGHIJKLMNOPQRSTUVWXYZ',
    numbers: '0123456789',
    symbols: '!@#$%^&*()_+-=[]{}|;:,.<>?'
};

// Similar and ambiguous characters to exclude
const similarChars = 'il1Lo0O';
const ambiguousChars = '{}[]()/\\\'"`~,;:.<>';

// Initialize elements
const passwordLength = document.getElementById('passwordLength');
const lengthValue = document.getElementById('lengthValue');
const generateBtn = document.getElementById('generateBtn');
const copyBtn = document.getElementById('copyBtn');
const howToBtn = document.getElementById('howToBtn');
const resetBtn = document.getElementById('resetBtn');
const passwordOutput = document.getElementById('passwordOutput');
const statusArea = document.getElementById('statusArea');
const strengthBadge = document.getElementById('strengthBadge');
const historyContainer = document.getElementById('historyContainer');
const historyList = document.getElementById('historyList');

// Event Listeners
passwordLength.addEventListener('input', updateLengthValue);
generateBtn.addEventListener('click', generatePasswords);
copyBtn.addEventListener('click', copyPasswords);
howToBtn.addEventListener('click', showHowTo);
resetBtn.addEventListener('click', resetAll);

// Initialize history display
displayHistory();

// Update length value display
function updateLengthValue() {
    lengthValue.textContent = passwordLength.value;
}

// How To Button
function showHowTo() {
    Swal.fire({
        title: 'Welcome to Password Generator',
        html: `Follow these steps to create secure passwords:<br><br>
        <ol class="text-start">
            <li>Adjust the slider to set your desired password length (12+ recommended).</li>
            <li>Select which character types to include in your passwords.</li>
            <li>Optionally exclude similar or ambiguous characters.</li>
            <li>Click "Generate" to create random passwords.</li>
            <li>Copy passwords to your clipboard and use them in your accounts.</li>
        </ol>`,
        icon: 'info',
        confirmButtonText: 'Got it!',
        confirmButtonColor: '#0d6efd'
    });
}

// Reset Button
function resetAll() {
    passwordLength.value = 16;
    lengthValue.textContent = '16';
    document.getElementById('passwordQuantity').value = '1';
    document.getElementById('includeUppercase').checked = true;
    document.getElementById('includeLowercase').checked = true;
    document.getElementById('includeNumbers').checked = true;
    document.getElementById('includeSymbols').checked = false;
    document.getElementById('excludeSimilar').checked = false;
    document.getElementById('excludeAmbiguous').checked = false;
    
    passwordOutput.innerHTML = '<div class="text-center text-muted">Your generated passwords will appear here</div>';
    statusArea.textContent = '';
    copyBtn.disabled = true;
    strengthBadge.textContent = 'Strength: Medium';
    strengthBadge.className = 'badge bg-warning';
}

// Generate Passwords
function generatePasswords() {
    const quantity = parseInt(document.getElementById('passwordQuantity').value);
    const length = parseInt(passwordLength.value);
    const includeUppercase = document.getElementById('includeUppercase').checked;
    const includeLowercase = document.getElementById('includeLowercase').checked;
    const includeNumbers = document.getElementById('includeNumbers').checked;
    const includeSymbols = document.getElementById('includeSymbols').checked;
    const excludeSimilar = document.getElementById('excludeSimilar').checked;
    const excludeAmbiguous = document.getElementById('excludeAmbiguous').checked;

    // Validate at least one character set is selected
    if (!includeUppercase && !includeLowercase && !includeNumbers && !includeSymbols) {
        showError('Please select at least one character type.');
        Swal.fire({
            title: 'Error',
            text: 'Please select at least one character type.',
            icon: 'error',
            confirmButtonText: 'OK'
        });
        return;
    }

    // Build character pool based on selections
    let charPool = '';
    
    if (includeLowercase) {
        charPool += charSets.lowercase;
        if (excludeSimilar) {
            charPool = charPool.replace(/[il1]/g, '');
        }
    }
    
    if (includeUppercase) {
        charPool += charSets.uppercase;
        if (excludeSimilar) {
            charPool = charPool.replace(/[LO0]/g, '');
        }
    }
    
    if (includeNumbers) {
        charPool += charSets.numbers;
        if (excludeSimilar) {
            charPool = charPool.replace(/[01]/g, '');
        }
    }
    
    if (includeSymbols) {
        let symbols = charSets.symbols;
        if (excludeAmbiguous) {
            symbols = symbols.replace(/[{}[\]()\/\\'"`~,;:.<>]/g, '');
        }
        charPool += symbols;
    }

    // Generate passwords
    generatedPasswords = [];
    passwordOutput.innerHTML = '';
    
    for (let i = 0; i < quantity; i++) {
        let password = '';
        const crypto = window.crypto || window.msCrypto;
        const values = new Uint32Array(length);
        
        if (crypto) {
            crypto.getRandomValues(values);
            
            for (let j = 0; j < length; j++) {
                password += charPool[values[j] % charPool.length];
            }
        } else {
            // Fallback for browsers without crypto support
            for (let j = 0; j < length; j++) {
                password += charPool[Math.floor(Math.random() * charPool.length)];
            }
        }
        
        generatedPasswords.push(password);
        
        // Create password display element
        const passwordDiv = document.createElement('div');
        passwordDiv.className = 'password-item d-flex justify-content-between align-items-center p-2 mb-2 bg-white rounded';
        passwordDiv.innerHTML = `
            <span class="password-text font-monospace">${password}</span>
            <button class="btn btn-sm btn-outline-secondary copy-password" data-password="${password}">
                <i class="fas fa-copy"></i>
            </button>
        `;
        passwordOutput.appendChild(passwordDiv);
    }

    // Add copy event listeners to individual password buttons
    document.querySelectorAll('.copy-password').forEach(btn => {
        btn.addEventListener('click', (e) => {
            const password = e.currentTarget.getAttribute('data-password');
            copyToClipboard(password);
            showStatus('Password copied to clipboard!', 'success');
            
            Swal.fire({
                title: 'Copied!',
                text: 'Password has been copied to your clipboard.',
                icon: 'success',
                confirmButtonText: 'OK',
                timer: 1000,
                timerProgressBar: true
            });
        });
    });

    // Update UI
    copyBtn.disabled = false;
    updatePasswordStrength();
    showStatus(`${quantity} password(s) generated successfully!`, 'success');
    
    // Add to history
    addToHistory(generatedPasswords[0]);
    
    Swal.fire({
        title: 'Passwords Generated!',
        text: 'Your secure passwords have been created.',
        icon: 'success',
        confirmButtonText: 'OK',
        timer: 1000,
        timerProgressBar: true
    });
}

// Copy Passwords to Clipboard
function copyPasswords() {
    if (generatedPasswords.length === 0) {
        showError('No passwords to copy. Please generate first.');
        Swal.fire({
            title: 'No Passwords',
            text: 'No passwords to copy. Please generate first.',
            icon: 'warning',
            confirmButtonText: 'OK'
        });
        return;
    }

    let passwordsText = generatedPasswords.join('\n');
    copyToClipboard(passwordsText);
    showStatus('All passwords copied to clipboard!', 'success');
    
    Swal.fire({
        title: 'Copied!',
        text: 'All passwords have been copied to your clipboard.',
        icon: 'success',
        confirmButtonText: 'OK',
        timer: 1000,
        timerProgressBar: true
    });
}

// Helper function to copy text to clipboard
function copyToClipboard(text) {
    const textarea = document.createElement('textarea');
    textarea.value = text;
    textarea.style.position = 'fixed';
    document.body.appendChild(textarea);
    textarea.select();
    
    try {
        document.execCommand('copy');
    } catch (err) {
        console.error('Failed to copy text: ', err);
    }
    
    document.body.removeChild(textarea);
}

// Calculate and display password strength
function updatePasswordStrength() {
    if (generatedPasswords.length === 0) return;
    
    const password = generatedPasswords[0];
    const length = password.length;
    let strength = 0;
    
    // Length contributes up to 50% of strength
    strength += Math.min(length / 32 * 50, 50);
    
    // Character variety contributes the rest
    const hasLower = /[a-z]/.test(password);
    const hasUpper = /[A-Z]/.test(password);
    const hasNumber = /[0-9]/.test(password);
    const hasSymbol = /[^a-zA-Z0-9]/.test(password);
    
    const varietyCount = [hasLower, hasUpper, hasNumber, hasSymbol].filter(Boolean).length;
    strength += varietyCount * 12.5;
    
    // Determine strength level
    let strengthLevel, badgeClass;
    if (strength >= 80) {
        strengthLevel = 'Very Strong';
        badgeClass = 'bg-primary';
    } else if (strength >= 60) {
        strengthLevel = 'Strong';
        badgeClass = 'bg-success';
    } else if (strength >= 40) {
        strengthLevel = 'Medium';
        badgeClass = 'bg-warning';
    } else if (strength >= 20) {
        strengthLevel = 'Weak';
        badgeClass = 'bg-danger';
    } else {
        strengthLevel = 'Very Weak';
        badgeClass = 'bg-secondary';
    }
    
    strengthBadge.textContent = `Strength: ${strengthLevel}`;
    strengthBadge.className = `badge ${badgeClass}`;
}

// History Functions
function addToHistory(password) {
    const strength = calculatePasswordStrength(password);
    
    const historyItem = {
        id: Date.now(),
        password: password,
        date: new Date().toLocaleString(),
        strength: strength
    };

    passwordHistory.unshift(historyItem);
    if (passwordHistory.length > 10) {
        passwordHistory.pop();
    }

    localStorage.setItem('passwordHistory', JSON.stringify(passwordHistory));
    displayHistory();
}

function calculatePasswordStrength(password) {
    let score = 0;
    
    // Length
    score += password.length * 4;
    
    // Variety
    if (/[a-z]/.test(password)) score += 10;
    if (/[A-Z]/.test(password)) score += 10;
    if (/[0-9]/.test(password)) score += 10;
    if (/[^a-zA-Z0-9]/.test(password)) score += 15;
    
    // Deductions
    if (/^[a-zA-Z]+$/.test(password)) score -= 20;
    if (/^[0-9]+$/.test(password)) score -= 20;
    
    // Normalize to 0-100
    score = Math.max(0, Math.min(100, score));
    
    // Categorize
    if (score >= 80) return 'Very Strong';
    if (score >= 60) return 'Strong';
    if (score >= 40) return 'Medium';
    if (score >= 20) return 'Weak';
    return 'Very Weak';
}

function displayHistory() {
    if (passwordHistory.length === 0) {
        historyContainer.style.display = 'none';
        return;
    }

    historyList.innerHTML = '';
    passwordHistory.forEach(item => {
        const tr = document.createElement('tr');
        
        // Determine badge class based on strength
        let badgeClass;
        switch(item.strength) {
            case 'Very Strong': badgeClass = 'bg-primary'; break;
            case 'Strong': badgeClass = 'bg-success'; break;
            case 'Medium': badgeClass = 'bg-warning'; break;
            case 'Weak': badgeClass = 'bg-danger'; break;
            default: badgeClass = 'bg-secondary';
        }
        
        tr.innerHTML = `
            <td>
                <button class="btn btn-sm btn-outline-danger delete-history" data-id="${item.id}" title="Delete">
                    <i class="fas fa-trash-alt"></i>
                </button>
            </td>
            <td class="font-monospace">${item.password}</td>
            <td>${item.date}</td>
            <td><span class="badge ${badgeClass}">${item.strength}</span></td>
            <td class="text-end">
                <button class="btn btn-sm btn-outline-secondary copy-history" data-id="${item.id}" title="Copy">
                    <i class="fas fa-copy"></i>
                </button>
            </td>
        `;
        historyList.appendChild(tr);
    });

    // Add event listeners for history actions
    document.querySelectorAll('.delete-history').forEach(btn => {
        btn.addEventListener('click', (e) => {
            const id = parseInt(e.currentTarget.getAttribute('data-id'));
            deleteHistoryItem(id);
        });
    });

    document.querySelectorAll('.copy-history').forEach(btn => {
        btn.addEventListener('click', (e) => {
            const id = parseInt(e.currentTarget.getAttribute('data-id'));
            copyHistoryItem(id);
        });
    });

    historyContainer.style.display = 'block';
}

function deleteHistoryItem(id) {
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to recover this password!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#6c757d',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            passwordHistory = passwordHistory.filter(item => item.id !== id);
            localStorage.setItem('passwordHistory', JSON.stringify(passwordHistory));
            displayHistory();
        }
    });
}

function copyHistoryItem(id) {
    const item = passwordHistory.find(item => item.id === id);
    if (!item) return;

    copyToClipboard(item.password);
    showStatus('Password copied to clipboard!', 'success');
    
    Swal.fire({
        title: 'Copied!',
        text: 'Password has been copied to your clipboard.',
        icon: 'success',
        confirmButtonText: 'OK',
        timer: 1000,
        timerProgressBar: true
    });
}

// Helper Functions
function showStatus(message, type) {
    statusArea.textContent = message;
    statusArea.className = `text-center text-${type}`;
}

function showError(message) {
    showStatus(message, 'danger');
}
</script>

<?php include '../../includes/footer.php'; ?>