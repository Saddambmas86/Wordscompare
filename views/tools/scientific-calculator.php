<?php
// SEO and Page Metadata
$page_title = "Scientific Calculator Online Free - Advanced Math Calculator"; // You may Change the Title here
$page_description = "Free scientific calculator online. Advanced math with trigonometry, logarithms, exponents, factorial, and more. Perfect for students, engineers, and scientists."; // Put your Description here
$page_keywords = "scientific calculator  - advanced math calculator, scientific, calculator, advanced, math, free online tools, pdf tools";

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
    .calculator-card .btn[onclick*="appendOperator"],
    .calculator-card .btn.btn-operator { /* Added a class for consistent operator styling */
        background-color: #ffc107; /* Warning yellow for operators */
        color: #343a40;
        border-color: #ffc107;
    }
    .calculator-card .btn[onclick*="appendOperator"]:hover,
    .calculator-card .btn.btn-operator:hover { /* Added a class for consistent operator styling */
        background-color: #e0a800;
        border-color: #e0a800;
    }

    /* Scientific function buttons */
    .calculator-card .btn.btn-scientific {
        background-color: #17a2b8; /* Info blue for scientific functions */
        color: #ffffff;
        border: 1px solid #17a2b8;
    }
    .calculator-card .btn.btn-scientific:hover {
        background-color: #138496;
        border-color: #138496;
        transform: translateY(-1px);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
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
            <div class="tool-container rounded-3 p-0"> 
                <header class="text-center mb-4 pt-4">
                    <h1 class="h2">Modern Online Scientific Calculator <i class="fas fa-calculator text-danger ms-2"></i></h1>
                    <p class="lead text-muted">Perform advanced mathematical operations with enhanced visibility and history.</p>
                </header>

                <div class="calculator-card card mb-4">
                    <div id="display-container">
                        <div id="previous-display"></div>
                        <input type="text" id="current-display" value="0" readonly>
                    </div>
                    <div class="card-body p-4"> 
                        <div class="row g-2">
                            <div class="col-3"><button class="btn btn-scientific w-100 fs-5 py-3" onclick="appendParenthesis('(')">(</button></div>
                            <div class="col-3"><button class="btn btn-scientific w-100 fs-5 py-3" onclick="appendParenthesis(')')">)</button></div>
                            <div class="col-3"><button class="btn btn-scientific w-100 fs-5 py-3" onclick="power()">x<sup>y</sup></button></div>
                            <div class="col-3"><button class="btn btn-scientific w-100 fs-5 py-3" onclick="sqrt()">√</button></div>

                            <div class="col-3"><button class="btn btn-scientific w-100 fs-5 py-3" onclick="sin()">sin</button></div>
                            <div class="col-3"><button class="btn btn-scientific w-100 fs-5 py-3" onclick="cos()">cos</button></div>
                            <div class="col-3"><button class="btn btn-scientific w-100 fs-5 py-3" onclick="tan()">tan</button></div>
                            <div class="col-3"><button class="btn btn-scientific w-100 fs-5 py-3" onclick="factorial()">x!</button></div>

                            <div class="col-3"><button class="btn btn-scientific w-100 fs-5 py-3" onclick="log()">log</button></div>
                            <div class="col-3"><button class="btn btn-scientific w-100 fs-5 py-3" onclick="ln()">ln</button></div>
                            <div class="col-3"><button class="btn btn-scientific w-100 fs-5 py-3" onclick="appendPi()">π</button></div>
                            <div class="col-3"><button class="btn btn-scientific w-100 fs-5 py-3" onclick="appendE()">e</button></div>

                            <div class="col-3"><button class="btn btn-light w-100 fs-4 py-3" onclick="clearAll()">AC</button></div>
                            <div class="col-3"><button class="btn btn-light w-100 fs-4 py-3" onclick="backspace()">←</button></div>
                            <div class="col-3"><button class="btn btn-light w-100 fs-4 py-3" onclick="percentage()">%</button></div>
                            <div class="col-3"><button class="btn btn-operator w-100 fs-4 py-3" onclick="appendOperator('/')">÷</button></div>

                            <div class="col-3"><button class="btn btn-light w-100 fs-4 py-3" onclick="appendNumber('7')">7</button></div>
                            <div class="col-3"><button class="btn btn-light w-100 fs-4 py-3" onclick="appendNumber('8')">8</button></div>
                            <div class="col-3"><button class="btn btn-light w-100 fs-4 py-3" onclick="appendNumber('9')">9</button></div>
                            <div class="col-3"><button class="btn btn-operator w-100 fs-4 py-3" onclick="appendOperator('*')">×</button></div>

                            <div class="col-3"><button class="btn btn-light w-100 fs-4 py-3" onclick="appendNumber('4')">4</button></div>
                            <div class="col-3"><button class="btn btn-light w-100 fs-4 py-3" onclick="appendNumber('5')">5</button></div>
                            <div class="col-3"><button class="btn btn-light w-100 fs-4 py-3" onclick="appendNumber('6')">6</button></div>
                            <div class="col-3"><button class="btn btn-operator w-100 fs-4 py-3" onclick="appendOperator('-')">-</button></div>

                            <div class="col-3"><button class="btn btn-light w-100 fs-4 py-3" onclick="appendNumber('1')">1</button></div>
                            <div class="col-3"><button class="btn btn-light w-100 fs-4 py-3" onclick="appendNumber('2')">2</button></div>
                            <div class="col-3"><button class="btn btn-light w-100 fs-4 py-3" onclick="appendNumber('3')">3</button></div>
                            <div class="col-3"><button class="btn btn-operator w-100 fs-4 py-3" onclick="appendOperator('+')">+</button></div>

                            <div class="col-6"><button class="btn btn-light w-100 fs-4 py-3" onclick="appendNumber('0')">0</button></div>
                            <div class="col-3"><button class="btn btn-light w-100 fs-4 py-3" onclick="appendDecimal('.')">.</button></div>
                            <div class="col-3"><button class="btn btn-danger w-100 fs-4 py-3" onclick="calculate()">=</button></div>
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
                <?php include '../../views/content/scientific-calculator-content.php'; ?>
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
    let history = JSON.parse(localStorage.getItem('calculatorHistory')) || [];
    
    let waitingForSecondOperand = false;
    let operator = null;
    let firstOperand = null;
    let expression = ''; // For building the full expression string

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

        if (currentInput === '0' && number !== '.') { // Handle leading zero
            currentInput = number;
        } else if (waitingForSecondOperand) {
            currentInput = number;
            waitingForSecondOperand = false;
        } else {
            currentInput += number;
        }
        updateDisplays();
    }

    function appendDecimal(dot) {
        if (currentInput === 'Error') { 
            currentInput = '0.';
            previousOperation = '';
        } else if (waitingForSecondOperand) {
            currentInput = '0.';
            waitingForSecondOperand = false;
        } else if (!currentInput.includes(dot)) {
            currentInput += dot;
        }
        updateDisplays();
    }

    function appendOperator(op) {
        if (currentInput === 'Error') return;

        if (operator && !waitingForSecondOperand) {
            // If an operator was already active and a number was entered, calculate intermediate result
            calculateIntermediate();
            expression = `${previousOperation.slice(0, -1)} ${op}`; // Update expression to use the new operator
        } else if (firstOperand === null || waitingForSecondOperand) {
            // If starting a new calculation or after an operator, use currentInput as first operand
            firstOperand = parseFloat(currentInput);
            expression = `${currentInput} ${op}`;
        } else {
             // If chaining operators without new input, replace the last operator
            expression = expression.slice(0, -1) + op;
        }
        
        operator = op;
        waitingForSecondOperand = true;
        previousOperation = expression; // Update previous display with the current expression and operator
        updateDisplays();
    }

    function calculateIntermediate() {
        if (firstOperand === null || operator === null || waitingForSecondOperand) {
            return; // Not enough operands for an intermediate calculation
        }
        const secondOperand = parseFloat(currentInput);
        const result = performCalculation(firstOperand, secondOperand, operator);
        currentInput = result.toString();
        firstOperand = result; // Set the result as the new firstOperand for chaining
        operator = null; // Clear operator after intermediate calculation
    }


    function calculate() {
        if (currentInput === 'Error') {
            previousOperation = "Error";
            updateDisplays();
            return;
        }

        let finalExpression = expression;
        let result;

        if (firstOperand !== null && operator !== null && !waitingForSecondOperand) {
            const secondOperand = parseFloat(currentInput);
            finalExpression = `${firstOperand} ${operator} ${secondOperand}`;
            result = performCalculation(firstOperand, secondOperand, operator);
        } else if (firstOperand !== null && !operator) {
            // If there's a firstOperand but no operator (e.g., entered a number and pressed =)
            result = firstOperand;
            finalExpression = `${firstOperand}`;
        } else {
            // If only currentInput exists (e.g., typed a number and pressed =)
            result = parseFloat(currentInput);
            finalExpression = `${currentInput}`;
        }
        
        if (result === 'Error') {
            currentInput = 'Error';
            previousOperation = `${finalExpression} = Error`;
        } else {
            currentInput = result.toString();
            previousOperation = `${finalExpression} =`;
        }
        
        firstOperand = null; 
        operator = null; 
        waitingForSecondOperand = false;
        expression = ''; // Clear expression after calculation
        updateDisplays();

        addToHistory(finalExpression, result);
    }

    function performCalculation(num1, num2, op) {
        switch (op) {
            case '+': return num1 + num2;
            case '-': return num1 - num2;
            case '*': return num1 * num2;
            case '/': 
                if (num2 === 0) {
                    return 'Error'; 
                }
                return num1 / num2;
            case '^': return Math.pow(num1, num2);
            default: return num2;
        }
    }

    function clearAll() { 
        currentInput = '0';
        previousOperation = '';
        firstOperand = null;
        operator = null;
        waitingForSecondOperand = false;
        expression = '';
        updateDisplays();
    }

    function backspace() {
        if (currentInput === 'Error') { 
            currentInput = '0';
            previousOperation = '';
            expression = '';
        } else if (currentInput.length > 1) {
            currentInput = currentInput.slice(0, -1);
        } else {
            currentInput = '0';
        }
        updateDisplays();
    }

    function addToHistory(expr, res) {
        if (res === 'Error') { 
            return;
        }
        const formattedResult = (typeof res === 'number' && !Number.isInteger(res)) 
                                ? parseFloat(res.toFixed(10)) // To fixed 10 decimal places and then parse to remove trailing zeros
                                : res;
        const historyEntry = `${expr} = ${formattedResult}`;
        history.unshift(historyEntry); 
        if (history.length > 10) { 
            history.pop();
        }
        localStorage.setItem('calculatorHistory', JSON.stringify(history));
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

    // Scientific Functions
    function sin() {
        let val = parseFloat(currentInput);
        if (isNaN(val)) {
            currentInput = 'Error';
        } else {
            let result = Math.sin(val * Math.PI / 180); // Convert degrees to radians
            previousOperation = `sin(${val})`;
            currentInput = result.toString();
        }
        updateDisplays();
        addToHistory(previousOperation, currentInput);
        resetStateAfterFunction();
    }

    function cos() {
        let val = parseFloat(currentInput);
        if (isNaN(val)) {
            currentInput = 'Error';
        } else {
            let result = Math.cos(val * Math.PI / 180); // Convert degrees to radians
            previousOperation = `cos(${val})`;
            currentInput = result.toString();
        }
        updateDisplays();
        addToHistory(previousOperation, currentInput);
        resetStateAfterFunction();
    }

    function tan() {
        let val = parseFloat(currentInput);
        if (isNaN(val)) {
            currentInput = 'Error';
        } else {
            let result = Math.tan(val * Math.PI / 180); // Convert degrees to radians
            previousOperation = `tan(${val})`;
            currentInput = result.toString();
        }
        updateDisplays();
        addToHistory(previousOperation, currentInput);
        resetStateAfterFunction();
    }

    function log() { // Base 10 logarithm
        let val = parseFloat(currentInput);
        if (isNaN(val) || val <= 0) {
            currentInput = 'Error';
        } else {
            let result = Math.log10(val);
            previousOperation = `log(${val})`;
            currentInput = result.toString();
        }
        updateDisplays();
        addToHistory(previousOperation, currentInput);
        resetStateAfterFunction();
    }

    function ln() { // Natural logarithm
        let val = parseFloat(currentInput);
        if (isNaN(val) || val <= 0) {
            currentInput = 'Error';
        } else {
            let result = Math.log(val);
            previousOperation = `ln(${val})`;
            currentInput = result.toString();
        }
        updateDisplays();
        addToHistory(previousOperation, currentInput);
        resetStateAfterFunction();
    }

    function power() {
        if (currentInput === 'Error') return;
        firstOperand = parseFloat(currentInput);
        operator = '^';
        previousOperation = `${currentInput}^`;
        waitingForSecondOperand = true;
        updateDisplays();
    }

    function sqrt() {
        let val = parseFloat(currentInput);
        if (isNaN(val) || val < 0) {
            currentInput = 'Error';
        } else {
            let result = Math.sqrt(val);
            previousOperation = `sqrt(${val})`;
            currentInput = result.toString();
        }
        updateDisplays();
        addToHistory(previousOperation, currentInput);
        resetStateAfterFunction();
    }

    function factorial() {
        let val = parseInt(currentInput);
        if (isNaN(val) || val < 0 || !Number.isInteger(val)) {
            currentInput = 'Error';
        } else {
            let result = 1;
            if (val === 0) result = 1;
            else {
                for (let i = 2; i <= val; i++) {
                    result *= i;
                }
            }
            previousOperation = `${val}!`;
            currentInput = result.toString();
        }
        updateDisplays();
        addToHistory(previousOperation, currentInput);
        resetStateAfterFunction();
    }

    function appendPi() {
        if (currentInput === '0' || waitingForSecondOperand || currentInput === 'Error') {
            currentInput = Math.PI.toString();
        } else {
            // If a number is already present, treat it as multiplication
            currentInput += `*${Math.PI.toString()}`;
        }
        updateDisplays();
    }

    function appendE() {
        if (currentInput === '0' || waitingForSecondOperand || currentInput === 'Error') {
            currentInput = Math.E.toString();
        } else {
            // If a number is already present, treat it as multiplication
            currentInput += `*${Math.E.toString()}`;
        }
        updateDisplays();
    }

    function percentage() {
        let val = parseFloat(currentInput);
        if (isNaN(val)) {
            currentInput = 'Error';
        } else {
            currentInput = (val / 100).toString();
        }
        updateDisplays();
        // Do not add to history immediately, wait for full calculation if part of expression
    }

    function appendParenthesis(paren) {
        if (currentInput === 'Error') {
            currentInput = paren;
            previousOperation = '';
            expression = '';
        } else if (currentInput === '0' && paren === '(') {
            currentInput = paren;
        } else if (waitingForSecondOperand) {
            currentInput = paren;
            waitingForSecondOperand = false;
        } else {
            currentInput += paren;
        }
        updateDisplays();
    }

    function resetStateAfterFunction() {
        firstOperand = null;
        operator = null;
        waitingForSecondOperand = false;
        expression = '';
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
        } else if (key === '^') {
            power();
        } else if (key === 'Enter') {
            event.preventDefault(); 
            calculate();
        } else if (key === 'Backspace') {
            backspace();
        } else if (key === 'Escape') { 
            clearAll();
        } else if (key === '(' || key === ')') {
            appendParenthesis(key);
        } else if (key.toLowerCase() === 'p') { // 'p' for Pi
            appendPi();
        } else if (key.toLowerCase() === 'e') { // 'e' for Euler's number
            appendE();
        }
    });

    // Handle complex expressions evaluation
    // This is a simplified approach, a full-fledged expression parser
    // (e.g., using Shunting-yard algorithm) would be more robust for complex scientific inputs.
    // For now, extending the basic operator logic.
    // NOTE: For true complex expression parsing (e.g., 2+sin(90)*3), 
    // `eval()` with sanitization or a custom parser is necessary.
    // Given the current structure, we'll try to use a safer, step-by-step approach
    // and rely on direct function calls for scientific ops.
    // For expressions like "2 + 3 * sin(90)", this calculator will evaluate left-to-right
    // unless parentheses are explicitly used.
    // To properly handle order of operations with complex strings, `eval` is often used
    // in client-side calculators, but needs extreme caution for security.
    // Here, I will modify `calculate` to attempt `eval` if complex, but the primary
    // interaction is still button-based sequential operation.

    // Modified performCalculation to handle a broader range of expressions
    // This is a very basic attempt at evaluating full expressions. For a robust scientific calculator,
    // a proper mathematical expression parser library is highly recommended.
    // This will mainly work for chaining simple operations and direct function calls.
    function evaluateExpression(expr) {
        try {
            // Replace common math notation with JavaScript Math object equivalents
            let sanitizedExpr = expr.replace(/×/g, '*')
                                    .replace(/÷/g, '/')
                                    .replace(/π/g, 'Math.PI')
                                    .replace(/e/g, 'Math.E')
                                    .replace(/sin\(([^)]*)\)/g, (match, p1) => `Math.sin((${p1}) * Math.PI / 180)`)
                                    .replace(/cos\(([^)]*)\)/g, (match, p1) => `Math.cos((${p1}) * Math.PI / 180)`)
                                    .replace(/tan\(([^)]*)\)/g, (match, p1) => `Math.tan((${p1}) * Math.PI / 180)`)
                                    .replace(/log\(([^)]*)\)/g, (match, p1) => `Math.log10(${p1})`)
                                    .replace(/ln\(([^)]*)\)/g, (match, p1) => `Math.log(${p1})`)
                                    .replace(/sqrt\(([^)]*)\)/g, (match, p1) => `Math.sqrt(${p1})`);
            
            // Handle factorial: find digits followed by !, replace with factorial function call
            sanitizedExpr = sanitizedExpr.replace(/(\d+)!/g, (match, p1) => {
                let num = parseInt(p1);
                if (isNaN(num) || num < 0 || !Number.isInteger(num)) throw new Error('Invalid factorial input');
                let res = 1;
                for (let i = 2; i <= num; i++) res *= i;
                return res;
            });

            // Handle power (x^y) using Math.pow. This requires careful regex for order of operations
            // For now, assuming simple 'num ^ num' pattern.
            sanitizedExpr = sanitizedExpr.replace(/(\d+\.?\d*)\^(\d+\.?\d*)/g, 'Math.pow($1, $2)');


            let result = Function('return ' + sanitizedExpr)(); // Safer alternative to direct eval
            if (!isFinite(result)) {
                return 'Error';
            }
            return result;
        } catch (e) {
            console.error("Evaluation error:", e);
            return 'Error';
        }
    }

    // Override the default calculate function for full expression evaluation
    // This will require the currentInput to be built as a full expression string.
    // Reverting to the simpler button-based evaluation for `calculate` to match original intent.
    // The scientific functions (`sin`, `cos`, etc.) will still calculate and update `currentInput`
    // and `previousOperation` directly after their single operation.
    // The `performCalculation` remains for basic ops.
</script>

<?php include '../../includes/footer.php'; ?>