<?php
$page_title = "Text Comparison Tool - Compare Two Texts Online Free";
$page_description = "Free text comparison tool online. Compare two texts side by side and highlight differences, additions, and deletions. Perfect for proofreading and code review.";
$page_keywords = "$kw";
$page_key = 'text-comparision';
include '../../includes/header.php';
?>

<main class="container-fluid px-3 py-4" style="max-width: 1400px;">
    <!-- Header -->
    <div class="text-center mb-4">
        <h1 class="h2 mb-2"><i class="fas fa-exchange-alt text-success"></i> Text Compare!</h1>
        <p class="text-muted">Compare two versions of a text to find differences.</p>
    </div>

    <!-- Comparison Results (shown after compare) -->
    <div id="resultsArea" class="mb-4" style="display: none;">
        <div class="d-flex justify-content-between align-items-center mb-2">
            <h5 class="m-0">Comparison Results</h5>
            <div class="diff-nav">
                <button id="prevDiff" class="btn btn-sm btn-outline-secondary" title="Previous difference">
                    <i class="fas fa-chevron-up"></i>
                </button>
                <span id="diffCounter" class="mx-2 text-muted small">0/0</span>
                <button id="nextDiff" class="btn btn-sm btn-outline-secondary" title="Next difference">
                    <i class="fas fa-chevron-down"></i>
                </button>
            </div>
        </div>
        <div class="comparison-table-wrapper border rounded">
            <table class="comparison-table w-100">
                <thead>
                    <tr class="header-row">
                        <th class="line-num-col">#</th>
                        <th class="indicator-col"></th>
                        <th class="content-col">Original Text</th>
                        <th class="line-num-col">#</th>
                        <th class="indicator-col"></th>
                        <th class="content-col">Modified Text</th>
                    </tr>
                </thead>
                <tbody id="comparisonBody"></tbody>
            </table>
        </div>
    </div>

    <!-- Input Area -->
    <div class="row g-0 mb-3">
        <!-- Left Text Area -->
        <div class="col-md-6">
            <div class="text-area-header bg-light border border-end-0 p-2 d-flex justify-content-between align-items-center">
                <span class="small fw-bold text-muted">Original Text</span>
                <small class="text-muted">Chars: <span id="char1">0</span></small>
            </div>
            <textarea 
                id="text1" 
                class="form-control border-end-0 rounded-0" 
                rows="12" 
                placeholder="Paste one version of a text here."
                style="font-family: 'Consolas', 'Monaco', 'Courier New', monospace; resize: vertical;"></textarea>
        </div>
        
        <!-- Right Text Area -->
        <div class="col-md-6">
            <div class="text-area-header bg-light border p-2 d-flex justify-content-between align-items-center">
                <span class="small fw-bold text-muted">Modified Text</span>
                <small class="text-muted">Chars: <span id="char2">0</span></small>
            </div>
            <textarea 
                id="text2" 
                class="form-control border rounded-0" 
                rows="12" 
                placeholder="Paste another version of the text here."
                style="font-family: 'Consolas', 'Monaco', 'Courier New', monospace; resize: vertical;"></textarea>
        </div>
    </div>

    <!-- Control Buttons -->
    <div class="row align-items-center mb-4">
        <div class="col-md-8">
            <div class="d-flex flex-wrap gap-2">
                <button id="compareBtn" class="btn btn-success">
                    <i class="fas fa-check me-2"></i>Compare!
                </button>
                <button id="swapBtn" class="btn btn-outline-secondary">
                    <i class="fas fa-exchange-alt me-2"></i>Switch texts
                </button>
                <button id="clearBtn" class="btn btn-outline-secondary">
                    <i class="fas fa-trash-alt me-2"></i>Clear all
                </button>
            </div>
            <small class="text-muted mt-1 d-block">
                <i class="fas fa-keyboard me-1"></i>Shortcuts: Ctrl+Alt+C = Compare, Ctrl+Alt+S = Switch, Ctrl+Alt+R = Clear
            </small>
        </div>
        <div class="col-md-4 text-md-end mt-2 mt-md-0">
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="ignoreCase">
                <label class="form-check-label small" for="ignoreCase">Ignore case</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="ignoreSpaces">
                <label class="form-check-label small" for="ignoreSpaces">Ignore spaces</label>
            </div>
        </div>
    </div>

    <!-- Inline Preview (like text-compare.com) -->
    <div id="inlinePreview" class="mb-4" style="display: none;">
        <div class="border rounded p-3 bg-light">
            <h6 class="text-muted mb-2"><i class="fas fa-eye me-2"></i>Quick Preview</h6>
            <div id="previewContent" class="font-monospace small"></div>
        </div>
    </div>
</main>

<style>
/* Text Compare Styles - matching text-compare.com */
.text-area-header {
    border-bottom: none;
    background: #f8f9fa !important;
}

.comparison-table-wrapper {
    background: #fff;
}

.comparison-table {
    border-collapse: collapse;
    font-family: 'Consolas', 'Monaco', 'Courier New', monospace;
    font-size: 13px;
    line-height: 1.4;
    table-layout: fixed;
    width: 100%;
}

.comparison-table th,
.comparison-table td {
    padding: 2px 6px;
    border: 1px solid #e0e0e0;
    vertical-align: top;
    white-space: pre-wrap;
    word-break: break-all;
}

.comparison-table .header-row {
    background: #f5f5f5;
    font-weight: bold;
}

.comparison-table .header-row th {
    text-align: center;
    padding: 6px;
    border-bottom: 2px solid #ddd;
}

.comparison-table .line-num-col {
    width: 45px;
    text-align: right;
    background: #f8f8f8;
    color: #666;
    font-size: 11px;
}

.comparison-table .indicator-col {
    width: 20px;
    text-align: center;
    background: #f8f8f8;
    font-size: 11px;
}

.comparison-table .content-col {
    width: calc(50% - 65px);
    background: #fff;
}

/* Line number styling */
.comparison-table .line-num {
    color: #999;
    text-align: right;
}

.comparison-table .line-num.has-diff {
    background: #d4edda;
    color: #155724;
    font-weight: bold;
}

.comparison-table .line-num-link {
    cursor: pointer;
    display: inline-flex;
    align-items: center;
    gap: 2px;
}

.comparison-table .line-num-link:hover {
    color: #ff9800;
}

.comparison-table .line-num-link i {
    font-size: 10px;
    color: #ff9800;
}

/* Indicator arrows */
.comparison-table .indicator {
    color: #28a745;
    font-weight: bold;
}

.comparison-table .indicator.removed {
    color: #dc3545;
}

.comparison-table .diff-arrow {
    color: #ff9800;
    cursor: pointer;
    font-size: 10px;
    margin-left: 2px;
    display: block;
    margin-top: 2px;
}

.comparison-table .diff-arrow:hover {
    color: #f57c00;
    transform: scale(1.2);
}

/* Content cells with differences */
.comparison-table .content-cell {
    background: #fff;
}

.comparison-table .content-cell.has-diff-left {
    background: #ffebee;
}

.comparison-table .content-cell.has-diff-right {
    background: #e8f5e9;
}

/* Difference highlighting */
.diff-highlight {
    background-color: #A9D0F5;
    padding: 0 1px;
}

.diff-added {
    background-color: #a5d6a7;
    padding: 0 1px;
}

.diff-removed {
    background-color: #ef9a9a;
    text-decoration: line-through;
    padding: 0 1px;
}

/* Navigation buttons */
.diff-nav button {
    width: 32px;
    height: 32px;
    padding: 0;
    display: inline-flex;
    align-items: center;
    justify-content: center;
}

/* Textarea focus */
textarea:focus {
    box-shadow: 0 0 0 0.2rem rgba(40, 167, 69, 0.25);
    border-color: #28a745;
}

/* Dark mode support */
[data-bs-theme="dark"] .text-area-header {
    background: #212529 !important;
    border-color: #495057 !important;
}

[data-bs-theme="dark"] .comparison-table-wrapper {
    background: #1a1d20;
}

[data-bs-theme="dark"] .comparison-table th,
[data-bs-theme="dark"] .comparison-table td {
    border-color: #495057;
}

[data-bs-theme="dark"] .comparison-table .header-row {
    background: #2d333b;
}

[data-bs-theme="dark"] .comparison-table .line-num-col,
[data-bs-theme="dark"] .comparison-table .indicator-col {
    background: #2d333b;
    color: #8b949e;
}

[data-bs-theme="dark"] .comparison-table .line-num.has-diff {
    background: #238636;
    color: #fff;
}

[data-bs-theme="dark"] .comparison-table .content-cell {
    background: #1a1d20;
    color: #c9d1d9;
}

[data-bs-theme="dark"] .comparison-table .content-cell.has-diff-left {
    background: rgba(248, 81, 73, 0.15);
}

[data-bs-theme="dark"] .comparison-table .content-cell.has-diff-right {
    background: rgba(46, 160, 67, 0.15);
}

[data-bs-theme="dark"] .diff-highlight {
    background-color: rgba(56, 139, 253, 0.4);
}

[data-bs-theme="dark"] .diff-added {
    background-color: rgba(46, 160, 67, 0.4);
}

[data-bs-theme="dark"] .diff-removed {
    background-color: rgba(248, 81, 73, 0.4);
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const text1 = document.getElementById('text1');
    const text2 = document.getElementById('text2');
    const compareBtn = document.getElementById('compareBtn');
    const swapBtn = document.getElementById('swapBtn');
    const clearBtn = document.getElementById('clearBtn');
    const resultsArea = document.getElementById('resultsArea');
    const comparisonBody = document.getElementById('comparisonBody');
    const prevDiffBtn = document.getElementById('prevDiff');
    const nextDiffBtn = document.getElementById('nextDiff');
    const diffCounter = document.getElementById('diffCounter');
    const inlinePreview = document.getElementById('inlinePreview');
    const previewContent = document.getElementById('previewContent');

    let diffLocations = [];
    let currentDiffIndex = -1;

    // Update character count
    function updateCount() {
        document.getElementById('char1').textContent = text1.value.length;
        document.getElementById('char2').textContent = text2.value.length;
    }

    text1.addEventListener('input', updateCount);
    text2.addEventListener('input', updateCount);

    // Swap texts
    swapBtn.addEventListener('click', function() {
        const temp = text1.value;
        text1.value = text2.value;
        text2.value = temp;
        updateCount();
        if (resultsArea.style.display !== 'none') {
            compareTexts();
        }
    });

    // Clear all
    clearBtn.addEventListener('click', function() {
        text1.value = '';
        text2.value = '';
        resultsArea.style.display = 'none';
        inlinePreview.style.display = 'none';
        updateCount();
        text1.focus();
    });

    // Compare button
    compareBtn.addEventListener('click', function() {
        compareTexts();
    });

    // Keyboard shortcuts
    document.addEventListener('keydown', function(e) {
        if (e.ctrlKey && e.altKey) {
            switch(e.key.toLowerCase()) {
                case 'c':
                    e.preventDefault();
                    compareTexts();
                    break;
                case 's':
                    e.preventDefault();
                    swapBtn.click();
                    break;
                case 'r':
                    e.preventDefault();
                    clearBtn.click();
                    break;
            }
        }
    });

    // Navigation buttons
    prevDiffBtn.addEventListener('click', function() {
        if (diffLocations.length > 0) {
            currentDiffIndex = (currentDiffIndex - 1 + diffLocations.length) % diffLocations.length;
            scrollToDiff(currentDiffIndex);
        }
    });

    nextDiffBtn.addEventListener('click', function() {
        if (diffLocations.length > 0) {
            currentDiffIndex = (currentDiffIndex + 1) % diffLocations.length;
            scrollToDiff(currentDiffIndex);
        }
    });

    function scrollToDiff(index) {
        const rows = comparisonBody.querySelectorAll('tr');
        if (rows[diffLocations[index]]) {
            rows[diffLocations[index]].scrollIntoView({ behavior: 'smooth', block: 'center' });
            updateDiffCounter();
        }
    }

    function updateDiffCounter() {
        diffCounter.textContent = diffLocations.length > 0 ? 
            `${currentDiffIndex + 1}/${diffLocations.length}` : '0/0';
    }

    function compareTexts() {
        if (!text1.value && !text2.value) {
            alert('Please enter text in at least one field');
            return;
        }

        let t1 = text1.value;
        let t2 = text2.value;

        // Apply options
        const ignoreCase = document.getElementById('ignoreCase').checked;
        const ignoreSpaces = document.getElementById('ignoreSpaces').checked;

        if (ignoreCase) {
            t1 = t1.toLowerCase();
            t2 = t2.toLowerCase();
        }

        if (ignoreSpaces) {
            t1 = t1.replace(/\s+/g, ' ').trim();
            t2 = t2.replace(/\s+/g, ' ').trim();
        }

        // Generate comparison
        const lines1 = text1.value.split('\n');
        const lines2 = text2.value.split('\n');
        const compareLines1 = t1.split('\n');
        const compareLines2 = t2.split('\n');

        const maxLines = Math.max(lines1.length, lines2.length);
        let html = '';
        diffLocations = [];

        // First pass: collect all difference locations
        for (let i = 0; i < maxLines; i++) {
            const cmp1 = compareLines1[i] || '';
            const cmp2 = compareLines2[i] || '';
            if (cmp1 !== cmp2) {
                diffLocations.push(i);
            }
        }

        const lastDiffIndex = diffLocations.length > 0 ? diffLocations[diffLocations.length - 1] : -1;

        // Second pass: generate HTML
        for (let i = 0; i < maxLines; i++) {
            const line1 = lines1[i];
            const line2 = lines2[i];
            const cmp1 = compareLines1[i] || '';
            const cmp2 = compareLines2[i] || '';
            const hasDiff = cmp1 !== cmp2;
            const leftEmpty = line1 === undefined;
            const rightEmpty = line2 === undefined;

            // Determine if this is the last difference and get next diff (circular navigation)
            const diffIndex = diffLocations.indexOf(i);
            const isLastDiff = !hasDiff || diffIndex === -1;
            const isActuallyLast = hasDiff && diffIndex === diffLocations.length - 1;
            const nextDiffLine = hasDiff ? (isActuallyLast ? diffLocations[0] : diffLocations[diffIndex + 1]) : null;
            const arrowTitle = isActuallyLast ? 'Back to first difference' : 'Next difference';
            const arrowIcon = isActuallyLast ? 'fa-arrow-up' : 'fa-arrow-down';
            const nextArrow = hasDiff ? 
                `<i class="fas ${arrowIcon} diff-arrow" data-next="${nextDiffLine}" title="${arrowTitle}"></i>` : '';

            // Determine indicator
            let leftIndicator = '';
            let rightIndicator = '';
            if (hasDiff) {
                if (leftEmpty) {
                    rightIndicator = `<span class="indicator">+</span>${nextArrow}`;
                } else if (rightEmpty) {
                    leftIndicator = `<span class="indicator removed">-</span>${nextArrow}`;
                } else {
                    leftIndicator = `<span class="indicator removed">-</span>`;
                    rightIndicator = `<span class="indicator">+</span>${nextArrow}`;
                }
            }

            const leftContent = hasDiff && !leftEmpty ? highlightDiffChars(line1, line2 || '', true) : escapeHtml(line1 || '');
            const rightContent = hasDiff && !rightEmpty ? highlightDiffChars(line2, line1 || '', false) : escapeHtml(line2 || '');

            // Add clickable line numbers with arrows for navigation
            const lineNumTitle = isActuallyLast ? 'Back to first difference' : 'Go to next difference';
            const lineNumIcon = isActuallyLast ? 'fa-caret-up' : 'fa-caret-down';
            const leftLineNum = hasDiff ? 
                `<span class="line-num-link" data-next="${nextDiffLine}" title="${lineNumTitle}">${leftEmpty ? '' : (i + 1)} <i class="fas ${lineNumIcon}"></i></span>` : 
                (leftEmpty ? '' : (i + 1));
            const rightLineNum = hasDiff ? 
                `<span class="line-num-link" data-next="${nextDiffLine}" title="${lineNumTitle}">${rightEmpty ? '' : (i + 1)} <i class="fas ${lineNumIcon}"></i></span>` : 
                (rightEmpty ? '' : (i + 1));

            html += `
                <tr data-line="${i}">
                    <td class="line-num ${hasDiff ? 'has-diff' : ''}">${leftLineNum}</td>
                    <td class="indicator-col">${leftIndicator}</td>
                    <td class="content-cell ${hasDiff && !leftEmpty ? 'has-diff-left' : ''}">${leftContent || '&nbsp;'}</td>
                    <td class="line-num ${hasDiff ? 'has-diff' : ''}">${rightLineNum}</td>
                    <td class="indicator-col">${rightIndicator}</td>
                    <td class="content-cell ${hasDiff && !rightEmpty ? 'has-diff-right' : ''}">${rightContent || '&nbsp;'}</td>
                </tr>
            `;
        }

        comparisonBody.innerHTML = html;
        resultsArea.style.display = 'block';
        currentDiffIndex = diffLocations.length > 0 ? 0 : -1;
        updateDiffCounter();

        // Add click handlers for diff arrows
        document.querySelectorAll('.diff-arrow').forEach(arrow => {
            arrow.addEventListener('click', function() {
                const nextLine = parseInt(this.dataset.next);
                const nextIndex = diffLocations.indexOf(nextLine);
                if (nextIndex !== -1) {
                    currentDiffIndex = nextIndex;
                    scrollToDiff(currentDiffIndex);
                }
            });
        });

        // Add click handlers for line number links
        document.querySelectorAll('.line-num-link').forEach(link => {
            link.addEventListener('click', function() {
                const nextLine = parseInt(this.dataset.next);
                const nextIndex = diffLocations.indexOf(nextLine);
                if (nextIndex !== -1) {
                    currentDiffIndex = nextIndex;
                    scrollToDiff(currentDiffIndex);
                }
            });
        });

        // Show inline preview for first difference
        if (diffLocations.length > 0) {
            showInlinePreview(lines1, lines2, compareLines1, compareLines2);
        } else {
            inlinePreview.style.display = 'none';
        }

        // Scroll to results
        resultsArea.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
    }

    function highlightDiffChars(str1, str2, isLeft) {
        let result = '';
        const maxLen = Math.max(str1.length, str2.length);
        let inDiff = false;

        for (let i = 0; i < maxLen; i++) {
            const c1 = str1[i];
            const c2 = str2[i];

            if (c1 !== c2) {
                if (!inDiff) {
                    result += isLeft ? '<span class="diff-removed">' : '<span class="diff-added">';
                    inDiff = true;
                }
                result += escapeHtml(c1 || ' ');
            } else {
                if (inDiff) {
                    result += '</span>';
                    inDiff = false;
                }
                result += escapeHtml(c1 || '');
            }
        }

        if (inDiff) {
            result += '</span>';
        }

        return result;
    }

    function showInlinePreview(lines1, lines2, compareLines1, compareLines2) {
        let preview = '';
        let count = 0;

        for (let i = 0; i < Math.min(lines1.length, lines2.length) && count < 3; i++) {
            if (compareLines1[i] !== compareLines2[i]) {
                const left = escapeHtml(lines1[i].substring(0, 50));
                const right = escapeHtml(lines2[i].substring(0, 50));
                preview += `<div class="mb-1"><span class="text-danger">- ${left}</span></div>`;
                preview += `<div class="mb-2"><span class="text-success">+ ${right}</span></div>`;
                count++;
            }
        }

        if (preview) {
            previewContent.innerHTML = preview;
            inlinePreview.style.display = 'block';
        }
    }

    function escapeHtml(text) {
        const map = {
            '&': '&amp;',
            '<': '&lt;',
            '>': '&gt;',
            '"': '&quot;',
            "'": '&#039;'
        };
        return text.replace(/[&<>"']/g, m => map[m]);
    }
});

</script>

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
                <?php include '../../views/content/text-comparision-content.php'; ?>
            </article>
        </div>
    </div>
</div>

<?php include '../../includes/footer.php'; ?>