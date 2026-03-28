<?php
// SEO and Page Metadata
$page_title = "Simple Calculator Online Free - Basic Arithmetic Calculator"; // You may Change the Title here
$page_description = "Free simple calculator online. Perform basic arithmetic — addition, subtraction, multiplication, and division. Easy-to-use calculator for everyday calculations."; // Put your Description here
$page_keywords = "simple calculator, calculator, online calculator, free math tools, age calculator, bmi calculator, conversion calculator, wordscompare";

// Include common header
include '../../includes/header.php';
?>

<style>
    /* Custom styles for the modern calculator look */
    .calculator-card {
        background: linear-gradient(to bottom right, #f8f9fa, #e9ecef);
        border: none;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        overflow: hidden; /* Ensures border-radius applies to all content */
    }

    #display-container {
        background-color: #343a40; /* Dark background for display */
        color: #ffffff;
        border-top-left-radius: 15px;
        border-top-right-radius: 15px;
        padding: 15px 20px;
        text-align: right;
        font-family: 'Roboto Mono', monospace; /* Monospace font for numbers */
        position: relative;
    }

    #previous-display {
        font-size: 1.2rem;
        color: #adb5bd; /* Lighter color for previous calculation */
        min-height: 25px; /* Ensure space even when empty */
        overflow: hidden;
        white-space: nowrap;
        text-overflow: ellipsis;
    }

    #current-display {
        font-size: 2.8rem; /* Larger font for current input */
        font-weight: bold;
        min-height: 50px; /* Ensure space */
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

    /* Operator buttons specific styling */
    .calculator-card .btn[onclick*="appendOperator"] {
        background-color: #ffc107; /* Warning yellow for operators */
        color: #343a40;
        border-color: #ffc107;
    }
    .calculator-card .btn[onclick*="appendOperator"]:hover {
        background-color: #e0a800;
        border-color: #e0a800;
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
        word-break: break-all; /* Break long expressions */
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
            <div class="tool-container rounded-3 p-0"> <header class="text-center mb-4 pt-4">
                    <h1 class="h2">Modern Online Calculator <i class="fas fa-calculator text-danger ms-2"></i></h1>
                    <p class="lead text-muted">Perform basic arithmetic operations with enhanced visibility.</p>
                </header>

                <div class="calculator-card card mb-4">
                    <div id="display-container">
                        <div id="previous-display"></div>
                        <input type="text" id="current-display" value="0" readonly>
                    </div>
                    <div class="card-body p-4"> <div class="row g-2">
                            <div class="col-3"><button class="btn btn-light w-100 fs-4 py-3" onclick="clearAll()">AC</button></div>
                            <div class="col-3"><button class="btn btn-light w-100 fs-4 py-3" onclick="appendOperator('/')">÷</button></div>
                            <div class="col-3"><button class="btn btn-light w-100 fs-4 py-3" onclick="appendOperator('*')">×</button></div>
                            <div class="col-3"><button class="btn btn-light w-100 fs-4 py-3" onclick="backspace()">←</button></div>

                            <div class="col-3"><button class="btn btn-light w-100 fs-4 py-3" onclick="appendNumber('7')">7</button></div>
                            <div class="col-3"><button class="btn btn-light w-100 fs-4 py-3" onclick="appendNumber('8')">8</button></div>
                            <div class="col-3"><button class="btn btn-light w-100 fs-4 py-3" onclick="appendNumber('9')">9</button></div>
                            <div class="col-3"><button class="btn btn-light w-100 fs-4 py-3" onclick="appendOperator('-')">-</button></div>

                            <div class="col-3"><button class="btn btn-light w-100 fs-4 py-3" onclick="appendNumber('4')">4</button></div>
                            <div class="col-3"><button class="btn btn-light w-100 fs-4 py-3" onclick="appendNumber('5')">5</button></div>
                            <div class="col-3"><button class="btn btn-light w-100 fs-4 py-3" onclick="appendNumber('6')">6</button></div>
                            <div class="col-3"><button class="btn btn-light w-100 fs-4 py-3" onclick="appendOperator('+')">+</button></div>

                            <div class="col-3"><button class="btn btn-light w-100 fs-4 py-3" onclick="appendNumber('1')">1</button></div>
                            <div class="col-3"><button class="btn btn-light w-100 fs-4 py-3" onclick="appendNumber('2')">2</button></div>
                            <div class="col-3"><button class="btn btn-light w-100 fs-4 py-3" onclick="appendNumber('3')">3</button></div>
                            <div class="col-3"><button class="btn btn-danger w-100 fs-4 py-3" onclick="calculate()">=</button></div>

                            <div class="col-6"><button class="btn btn-light w-100 fs-4 py-3" onclick="appendNumber('0')">0</button></div>
                            <div class="col-3"><button class="btn btn-light w-100 fs-4 py-3" onclick="appendDecimal('.')">.</button></div>
                        </div>
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
                <?php include '../../views/content/simple-calculator-content.php'; ?>
            </article>
        </div>
    </div>
</div>

<script>
    let currentDisplay = document.getElementById('current-display');
    let previousDisplay = document.getElementById('previous-display'); // New element for previous input/operation
    let historyOutput = document.getElementById('historyOutput');
    let noHistoryMessage = document.getElementById('noHistoryMessage');
    
    let currentInput = '0';
    let previousOperation = ''; // Stores the operation and first operand
    let history = JSON.parse(localStorage.getItem('calculatorHistory')) || [];
    
    let waitingForSecondOperand = false;
    let operator = null;
    let firstOperand = null;

    // Initialize display and history
    updateDisplays();
    renderHistory();

    function updateDisplays() {
        currentDisplay.value = currentInput;
        previousDisplay.textContent = previousOperation;
    }

    function appendNumber(number) {
        if (currentInput === 'Error') { // If display shows error, reset
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
        if (currentInput === 'Error') { // If display shows error, reset
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

    function appendOperator(op) {
        if (currentInput === 'Error') return; // Do nothing if display is in error state

        if (firstOperand === null) {
            firstOperand = parseFloat(currentInput);
            previousOperation = `${currentInput} ${op}`;
        } else if (operator) {
            // If an operator was already pressed and a new number entered, calculate intermediate result
            const result = performCalculation(firstOperand, parseFloat(currentInput), operator);
            currentInput = result.toString();
            firstOperand = result;
            previousOperation = `${currentInput} ${op}`; // Update previous display with intermediate result and new operator
            updateDisplays();
            // Don't add intermediate calculations to history, only final '=' results
        } else {
            // If no operator was active, but an operator is pressed, just update previousOperation
            previousOperation = `${currentInput} ${op}`;
            firstOperand = parseFloat(currentInput); // Set first operand if user changes mind about operator
        }

        operator = op;
        waitingForSecondOperand = true;
        updateDisplays(); // Update displays to show previous operation line
    }

    function calculate() {
        if (firstOperand === null || operator === null) {
            // If no full expression to calculate, or only one number entered
            if (currentInput !== 'Error') { // Only if not already in error state
                previousOperation = `${currentInput} =`; // Show current number as result of itself
                updateDisplays();
            }
            return;
        }

        const secondOperand = parseFloat(currentInput);
        const expression = `${firstOperand} ${operator} ${secondOperand}`;
        const result = performCalculation(firstOperand, secondOperand, operator);
        
        currentInput = result.toString();
        previousOperation = `${expression} =`; // Show full expression on previous line
        
        firstOperand = null; // Reset for next calculation
        operator = null; // Reset operator
        waitingForSecondOperand = false;
        updateDisplays();

        addToHistory(expression, result);
    }

    function performCalculation(num1, num2, op) {
        switch (op) {
            case '+': return num1 + num2;
            case '-': return num1 - num2;
            case '*': return num1 * num2;
            case '/': 
                if (num2 === 0) {
                    return 'Error'; // Division by zero
                }
                return num1 / num2;
            default: return num2;
        }
    }

    function clearAll() { // Renamed from clearDisplay to clearAll for 'AC' button
        currentInput = '0';
        previousOperation = '';
        firstOperand = null;
        operator = null;
        waitingForSecondOperand = false;
        updateDisplays();
    }

    function backspace() {
        if (currentInput === 'Error') { // Reset after error
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
        if (result === 'Error') { // Don't save error calculations to history
            return;
        }
        // Round result for cleaner history display if it's a long decimal
        const formattedResult = (typeof result === 'number' && !Number.isInteger(result)) 
                                ? parseFloat(result.toFixed(8)) // To fixed 8 decimal places and then parse to remove trailing zeros
                                : result;
        const historyEntry = `${expression} = ${formattedResult}`;
        history.unshift(historyEntry); // Add to the beginning
        if (history.length > 10) { // Keep only last 10 entries
            history.pop();
        }
        localStorage.setItem('calculatorHistory', JSON.stringify(history));
        renderHistory();
    }

    function renderHistory() {
        historyOutput.innerHTML = ''; // Clear previous history
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
                localStorage.removeItem('calculatorHistory');
                renderHistory();
                Swal.fire(
                    'Cleared!',
                    'Your calculation history has been cleared.',
                    'success'
                );
            }
        });
    }

    // Keyboard support
    document.addEventListener('keydown', (event) => {
        const key = event.key;

        if (/[0-9]/.test(key)) {
            appendNumber(key);
        } else if (key === '.') {
            appendDecimal(key);
        } else if (['+', '-', '*', '/'].includes(key)) {
            appendOperator(key);
        } else if (key === 'Enter') {
            event.preventDefault(); // Prevent default form submission if any
            calculate();
        } else if (key === 'Backspace') {
            backspace();
        } else if (key === 'Escape') { // 'Escape' key to clear All
            clearAll();
        }
    });

</script>

<?php include '../../includes/footer.php'; ?>