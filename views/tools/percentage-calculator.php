<?php
// SEO and Page Metadata
$page_title = "$title"; // You may Change the Title here
$page_description = "$desc"; // Put your Description here
$page_keywords = "$kw";

// Include common header
include '../../includes/header.php';
?>

<style>
    /* Custom styles for the modern calculator look - mostly reusable */
    .calculator-card {
        background: linear-gradient(to bottom right, #f8f9fa, #e9ecef);
        border: none;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        overflow: hidden;
    }

    #display-container {
        background-color: #343a40;
        color: #ffffff;
        border-top-left-radius: 15px;
        border-top-right-radius: 15px;
        padding: 15px 20px;
        text-align: right;
        font-family: 'Roboto Mono', monospace;
        position: relative;
    }

    #previous-display {
        font-size: 1.2rem;
        color: #adb5bd;
        min-height: 25px;
        overflow: hidden;
        white-space: nowrap;
        text-overflow: ellipsis;
    }

    #current-display {
        font-size: 2.8rem;
        font-weight: bold;
        min-height: 50px;
        display: block;
        width: 100%;
        border: none;
        background: transparent;
        color: inherit;
        text-align: right;
        padding: 0;
    }

    .calculator-card .btn {
        border-radius: 10px;
        font-weight: 600;
        transition: all 0.2s ease-in-out;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
    }

    .calculator-card .btn-light {
        background-color: #ffffff;
        color: #495057;
        border: 1px solid #dee2e6;
    }

    .calculator-card .btn-light:hover {
        background-color: #e2e6ea;
        color: #212529;
        transform: translateY(-1px);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .calculator-card .btn-danger {
        background-color: #dc3545;
        color: #ffffff;
        border: 1px solid #dc3545;
    }

    .calculator-card .btn-danger:hover {
        background-color: #c82333;
        color: #ffffff;
        transform: translateY(-1px);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
    }

    /* Operator buttons specific styling for percentage, maybe a different color */
    .calculator-card .btn.btn-primary { /* Using primary for percentage operations */
        background-color: #007bff;
        color: #ffffff;
        border-color: #007bff;
    }
    .calculator-card .btn.btn-primary:hover {
        background-color: #0056b3;
        border-color: #0056b3;
    }

    .history-area .card-header {
        border-bottom: 1px solid #e9ecef;
        background-color: #f8f9fa;
    }
    .history-area .card-body {
        background-color: #ffffff;
    }
    #historyOutput p {
        border-bottom: 1px dashed #e9ecef;
        padding: 8px 0;
        font-family: 'Roboto Mono', monospace;
        word-break: break-all;
    }
    #historyOutput p:last-child {
        border-bottom: none;
    }
</style>

<!-- TOOL -->
<div class="container py-5">
    <div class="row justify-content-center">
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

        <div class="col-lg-2">
            <div class="collapse d-lg-block h-100" id="toolsSidebar">
                <div class="card h-100">
                    <div class="card-body p-2">
                        <input type="text" id="searchTools" class="form-control border-danger mb-3" placeholder="Search tools...">

                        <div class="list-group list-group-flush overflow-auto" style="max-height: calc(200vh - 150px);">
                            <div id="toolsList"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-7">
            <div class="tool-container rounded-3 p-0">
                <header class="text-center mb-4 pt-4">
                    <h1 class="h2">Online Percentage Calculator <i class="fas fa-percent text-danger ms-2"></i></h1>
                    <p class="lead text-muted">Quickly calculate percentages, add or subtract percentages from numbers.</p>
                </header>

                <div class="calculator-card card mb-4">
                    <div id="display-container">
                        <div id="previous-display"></div>
                        <input type="text" id="current-display" value="0" readonly>
                    </div>
                    <div class="card-body p-4">
                        <div class="row g-2">
                            <div class="col-3"><button class="btn btn-light w-100 fs-4 py-3" onclick="clearAll()">AC</button></div>
                            <div class="col-3"><button class="btn btn-primary w-100 fs-4 py-3" onclick="setPercentageMode('percentOf')">% of</button></div>
                            <div class="col-3"><button class="btn btn-primary w-100 fs-4 py-3" onclick="setPercentageMode('addPercent')">+%</button></div>
                            <div class="col-3"><button class="btn btn-light w-100 fs-4 py-3" onclick="backspace()">←</button></div>

                            <div class="col-3"><button class="btn btn-light w-100 fs-4 py-3" onclick="appendNumber('7')">7</button></div>
                            <div class="col-3"><button class="btn btn-light w-100 fs-4 py-3" onclick="appendNumber('8')">8</button></div>
                            <div class="col-3"><button class="btn btn-light w-100 fs-4 py-3" onclick="appendNumber('9')">9</button></div>
                            <div class="col-3"><button class="btn btn-primary w-100 fs-4 py-3" onclick="setPercentageMode('subtractPercent')">-%</button></div>
                            <div class="col-3"><button class="btn btn-light w-100 fs-4 py-3" onclick="appendNumber('4')">4</button></div>
                            <div class="col-3"><button class="btn btn-light w-100 fs-4 py-3" onclick="appendNumber('5')">5</button></div>
                            <div class="col-3"><button class="btn btn-light w-100 fs-4 py-3" onclick="appendNumber('6')">6</button></div>
                            <div class="col-3"><button class="btn btn-light w-100 fs-4 py-3" onclick="appendOperator('/')">÷</button></div> <div class="col-3"><button class="btn btn-light w-100 fs-4 py-3" onclick="appendNumber('1')">1</button></div>
                            <div class="col-3"><button class="btn btn-light w-100 fs-4 py-3" onclick="appendNumber('2')">2</button></div>
                            <div class="col-3"><button class="btn btn-light w-100 fs-4 py-3" onclick="appendNumber('3')">3</button></div>
                            <div class="col-3"><button class="btn btn-danger w-100 fs-4 py-3" onclick="calculate()">=</button></div>

                            <div class="col-6"><button class="btn btn-light w-100 fs-4 py-3" onclick="appendNumber('0')">0</button></div>
                            <div class="col-3"><button class="btn btn-light w-100 fs-4 py-3" onclick="appendDecimal('.')">.</button></div>
                            <div class="col-3"><button class="btn btn-light w-100 fs-4 py-3" onclick="appendOperator('*')">×</button></div> </div>
                    </div>
                </div>

                <div class="history-area card mt-4 shadow-sm">
                    <div class="card-header bg-light d-flex justify-content-between align-items-center">
                        <h5 class="mb-0"><i class="fas fa-history me-2"></i>Calculation History</h5>
                        <button class="btn btn-sm btn-outline-danger" onclick="clearHistory()">Clear History</button>
                    </div>
                    <div class="card-body p-0">
                        <div class="m-0 p-3 bg-light" id="historyOutput" style="min-height: 100px; max-height: 200px; overflow: auto;">
                            <div class="text-center text-muted" id="noHistoryMessage">No history yet</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <!-- Sticky sidebar -->
    <div class="col-lg-2 border shadow-sm sticky-top vh-100 p-3">
        
    </div>

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
                <?php include '../../views/content/percentage-calculator-content.php'; ?>
            </article>
        </div>
    </div>
</div>

<script>
    let currentDisplay = document.getElementById('current-display');
    let previousDisplay = document.getElementById('previous-display');
    let historyOutput = document.getElementById('historyOutput');
    let noHistoryMessage = document.getElementById('noHistoryMessage');

    let currentInput = '0';
    let previousOperation = '';
    let history = JSON.parse(localStorage.getItem('percentageCalculatorHistory')) || []; // Changed history key

    let waitingForSecondOperand = false;
    let baseNumber = null;
    let percentageMode = null; // Stores the type of percentage calculation ('percentOf', 'addPercent', 'subtractPercent')

    // Initialize display and history
    updateDisplays();
    renderHistory();

    function updateDisplays() {
        currentDisplay.value = currentInput;
        previousDisplay.textContent = previousOperation;
    }

    function appendNumber(number) {
        if (currentInput === 'Error') {
            currentInput = '0';
            previousOperation = '';
        }

        if (currentInput === '0' || waitingForSecondOperand) {
            currentInput = number;
            waitingForSecondOperand = false;
        } else {
            currentInput += number;
        }
        updateDisplays();
    }

    function appendDecimal(dot) {
        if (currentInput === 'Error') {
            currentInput = '0';
            previousOperation = '';
        }

        if (waitingForSecondOperand) {
            currentInput = '0.';
            waitingForSecondOperand = false;
        } else if (!currentInput.includes(dot)) {
            currentInput += dot;
        }
        updateDisplays();
    }

    // This function will handle basic arithmetic if you decide to keep it
    function appendOperator(op) {
        // Implement basic arithmetic logic if needed, similar to simple-calculator.php
        // For now, focusing on percentage modes
        if (currentInput === 'Error') return;

        if (baseNumber === null && percentageMode === null) { // If starting a fresh calculation
            baseNumber = parseFloat(currentInput);
            previousOperation = `${currentInput} ${op}`;
        } else if (baseNumber !== null && percentageMode === null) { // If an operator was pressed after a number, but no percentage mode set
            // This handles cases where you might want to do '100 + 20' then use percentage on 120
            // For a pure percentage calculator, you might simplify this or remove direct arithmetic ops
            let currentResult = performCalculation(baseNumber, parseFloat(currentInput), op);
            currentInput = currentResult.toString();
            baseNumber = currentResult;
            previousOperation = `${currentInput} ${op}`;
        }
        // If a percentage mode is active, then pressing another operator might behave differently
        // For this example, we assume operators reset percentage mode if pressed
        percentageMode = null; // Clear percentage mode if a regular operator is pressed
        operator = op; // Reuse operator variable for basic arithmetic, if needed
        waitingForSecondOperand = true;
        updateDisplays();
    }


    function setPercentageMode(mode) {
        if (currentInput === 'Error') return;

        baseNumber = parseFloat(currentInput);
        percentageMode = mode;
        waitingForSecondOperand = true;

        let displayOperator = '';
        if (mode === 'percentOf') {
            displayOperator = '% of';
        } else if (mode === 'addPercent') {
            displayOperator = '+%';
        } else if (mode === 'subtractPercent') {
            displayOperator = '-%';
        }

        previousOperation = `${baseNumber} ${displayOperator}`;
        currentInput = '0'; // Clear current input for percentage value
        updateDisplays();
    }

    function calculate() {
        if (baseNumber === null || percentageMode === null) {
            // If no full percentage expression to calculate
            if (currentInput !== 'Error') {
                previousOperation = `${currentInput} =`; // Show current number as result of itself
                updateDisplays();
            }
            return;
        }

        const percentageValue = parseFloat(currentInput);
        let result;
        let expression;

        if (percentageMode === 'percentOf') {
            result = (percentageValue / 100) * baseNumber;
            expression = `${percentageValue}% of ${baseNumber}`;
        } else if (percentageMode === 'addPercent') {
            result = baseNumber + (baseNumber * percentageValue / 100);
            expression = `${baseNumber} + ${percentageValue}%`;
        } else if (percentageMode === 'subtractPercent') {
            result = baseNumber - (baseNumber * percentageValue / 100);
            expression = `${baseNumber} - ${percentageValue}%`;
        } else {
            // Fallback for basic arithmetic if an operator was set
            // This part would be more complex if you deeply integrate basic arithmetic
            result = parseFloat(currentInput); // Or perform a stored arithmetic operation
            expression = `${currentInput}`;
        }

        if (isNaN(result)) { // Check for invalid number results
            currentInput = 'Error';
            previousOperation = '';
        } else {
            currentInput = result.toString();
            previousOperation = `${expression} =`;
            addToHistory(expression, result);
        }

        baseNumber = null;
        percentageMode = null;
        waitingForSecondOperand = false;
        updateDisplays();
    }

    // Keep performCalculation if you want to allow mixing basic arithmetic with percentages
    // (e.g., 100 + 20% of 500) - this would require more complex state management.
    // For a simpler percentage calculator, you might remove it or keep it for standalone basic ops.
    function performCalculation(num1, num2, op) {
        // This function is for basic arithmetic, not percentage specific
        switch (op) {
            case '+': return num1 + num2;
            case '-': return num1 - num2;
            case '*': return num1 * num2;
            case '/':
                if (num2 === 0) {
                    return 'Error';
                }
                return num1 / num2;
            default: return num2;
        }
    }


    function clearAll() {
        currentInput = '0';
        previousOperation = '';
        baseNumber = null;
        percentageMode = null;
        waitingForSecondOperand = false;
        updateDisplays();
    }

    function backspace() {
        if (currentInput === 'Error') {
            currentInput = '0';
            previousOperation = '';
        } else if (currentInput.length > 1) {
            currentInput = currentInput.slice(0, -1);
        } else {
            currentInput = '0';
        }
        updateDisplays();
    }

    function addToHistory(expression, result) {
        if (result === 'Error') {
            return;
        }
        const formattedResult = (typeof result === 'number' && !Number.isInteger(result))
                                ? parseFloat(result.toFixed(8))
                                : result;
        const historyEntry = `${expression} = ${formattedResult}`;
        history.unshift(historyEntry);
        if (history.length > 10) {
            history.pop();
        }
        localStorage.setItem('percentageCalculatorHistory', JSON.stringify(history)); // Changed history key
        renderHistory();
    }

    function renderHistory() {
        historyOutput.innerHTML = '';
        if (history.length === 0) {
            noHistoryMessage.style.display = 'block';
        } else {
            noHistoryMessage.style.display = 'none';
            history.forEach((item, index) => {
                const p = document.createElement('p');
                p.textContent = item;
                p.className = 'mb-1 text-muted';
                historyOutput.appendChild(p);
            });
        }
    }

    function clearHistory() {
        Swal.fire({
            title: 'Clear History?',
            text: "Are you sure you want to clear all calculation history?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Yes, clear it!'
        }).then((result) => {
            if (result.isConfirmed) {
                history = [];
                localStorage.removeItem('percentageCalculatorHistory'); // Changed history key
                renderHistory();
                Swal.fire(
                    'Cleared!',
                    'Your calculation history has been cleared.',
                    'success'
                );
            }
        });
    }

    // Keyboard support (adapt for percentage operations)
    document.addEventListener('keydown', (event) => {
        const key = event.key;

        if (/[0-9]/.test(key)) {
            appendNumber(key);
        } else if (key === '.') {
            appendDecimal(key);
        } else if (key === 'Enter') {
            event.preventDefault();
            calculate();
        } else if (key === 'Backspace') {
            backspace();
        } else if (key === 'Escape') {
            clearAll();
        }
        // You would need custom keyboard shortcuts for percentage modes if desired
        // e.g., 'p' for '% of', '+' for '+%', '-' for '-%' but this can conflict with numbers/operators
        // A more robust keyboard mapping for percentage might be needed
    });

</script>

<?php include '../../includes/footer.php'; ?>