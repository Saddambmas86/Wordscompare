<?php
// SEO and Page Metadata
$page_title = "Unit Converter"; // You may Change the Title here
$page_description = "Unit Converter online."; // Put your Description here
$page_keywords = "unit converter, length converter, area converter, volume converter, mass converter, temperature converter, online converter";

// Include common header
include '../../includes/header.php';
?>

<!-- TOOL -->
<div class="container">
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

        <div class="col-lg-7 border shadow-sm">
            <div class="tool-container rounded-3 p-4 p-md-5">
                <header class="text-center mb-4">
                    <h1 class="h2">Unit Converter <i class="fas fa-calculator text-danger ms-2"></i></h1>
                    <p class="lead text-muted">Convert between different units of measurement instantly.</p>
                </header>

                <div class="options-card card mb-4">
                    <div class="card-header bg-light">
                        <h5 class="mb-0"><i class="fas fa-exchange-alt me-2"></i>Conversion Settings</h5>
                    </div>
                    <div class="card-body">
                        <ul class="nav nav-tabs mb-4" id="unitTabs" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="length-tab" data-bs-toggle="tab" data-bs-target="#length" type="button" role="tab" aria-controls="length" aria-selected="true">Length</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="area-tab" data-bs-toggle="tab" data-bs-target="#area" type="button" role="tab" aria-controls="area" aria-selected="false">Area</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="volume-tab" data-bs-toggle="tab" data-bs-target="#volume" type="button" role="tab" aria-controls="volume" aria-selected="false">Volume</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="mass-tab" data-bs-toggle="tab" data-bs-target="#mass" type="button" role="tab" aria-controls="mass" aria-selected="false">Mass</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="temperature-tab" data-bs-toggle="tab" data-bs-target="#temperature" type="button" role="tab" aria-controls="temperature" aria-selected="false">Temperature</button>
                            </li>
                        </ul>

                        <div class="tab-content" id="unitTabsContent">
                            <div class="tab-pane fade show active" id="length" role="tabpanel" aria-labelledby="length-tab">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label for="lengthInput" class="form-label">Input Value</label>
                                        <input type="number" class="form-control" id="lengthInput" value="1" min="0">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="lengthFromUnit" class="form-label">From Unit</label>
                                        <select class="form-select" id="lengthFromUnit">
                                            <option value="meters">Meters (m)</option>
                                            <option value="kilometers">Kilometers (km)</option>
                                            <option value="centimeters">Centimeters (cm)</option>
                                            <option value="millimeters">Millimeters (mm)</option>
                                            <option value="micrometers">Micrometers (µm)</option>
                                            <option value="nanometers">Nanometers (nm)</option>
                                            <option value="miles">Miles (mi)</option>
                                            <option value="yards">Yards (yd)</option>
                                            <option value="feet">Feet (ft)</option>
                                            <option value="inches">Inches (in)</option>
                                            <option value="nautical_miles">Nautical Miles (nmi)</option>
                                        </select>
                                    </div>
                                    <div class="col-12">
                                        <label for="lengthResult" class="form-label">Result</label>
                                        <div id="lengthResult" class="form-control bg-light text-success fw-bold" readonly></div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="area" role="tabpanel" aria-labelledby="area-tab">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label for="areaInput" class="form-label">Input Value</label>
                                        <input type="number" class="form-control" id="areaInput" value="1" min="0">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="areaFromUnit" class="form-label">From Unit</label>
                                        <select class="form-select" id="areaFromUnit">
                                            <option value="sq_meters">Square Meters (m²)</option>
                                            <option value="sq_kilometers">Square Kilometers (km²)</option>
                                            <option value="sq_centimeters">Square Centimeters (cm²)</option>
                                            <option value="sq_millimeters">Square Millimeters (mm²)</option>
                                            <option value="acres">Acres</option>
                                            <option value="hectares">Hectares</option>
                                            <option value="sq_miles">Square Miles (mi²)</option>
                                            <option value="sq_yards">Square Yards (yd²)</option>
                                            <option value="sq_feet">Square Feet (ft²)</option>
                                            <option value="sq_inches">Square Inches (in²)</option>
                                        </select>
                                    </div>
                                    <div class="col-12">
                                        <label for="areaResult" class="form-label">Result</label>
                                        <div id="areaResult" class="form-control bg-light text-success fw-bold" readonly></div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="volume" role="tabpanel" aria-labelledby="volume-tab">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label for="volumeInput" class="form-label">Input Value</label>
                                        <input type="number" class="form-control" id="volumeInput" value="1" min="0">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="volumeFromUnit" class="form-label">From Unit</label>
                                        <select class="form-select" id="volumeFromUnit">
                                            <option value="cubic_meters">Cubic Meters (m³)</option>
                                            <option value="cubic_centimeters">Cubic Centimeters (cm³)</option>
                                            <option value="liters">Liters (L)</option>
                                            <option value="milliliters">Milliliters (mL)</option>
                                            <option value="gallons_us">Gallons (US)</option>
                                            <option value="quarts_us">Quarts (US)</option>
                                            <option value="pints_us">Pints (US)</option>
                                            <option value="cups_us">Cups (US)</option>
                                            <option value="fluid_ounces_us">Fluid Ounces (US)</option>
                                            <option value="cubic_feet">Cubic Feet (ft³)</option>
                                            <option value="cubic_inches">Cubic Inches (in³)</option>
                                        </select>
                                    </div>
                                    <div class="col-12">
                                        <label for="volumeResult" class="form-label">Result</label>
                                        <div id="volumeResult" class="form-control bg-light text-success fw-bold" readonly></div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="mass" role="tabpanel" aria-labelledby="mass-tab">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label for="massInput" class="form-label">Input Value</label>
                                        <input type="number" class="form-control" id="massInput" value="1" min="0">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="massFromUnit" class="form-label">From Unit</label>
                                        <select class="form-select" id="massFromUnit">
                                            <option value="kilograms">Kilograms (kg)</option>
                                            <option value="grams">Grams (g)</option>
                                            <option value="milligrams">Milligrams (mg)</option>
                                            <option value="metric_tons">Metric Tons (t)</option>
                                            <option value="pounds">Pounds (lb)</option>
                                            <option value="ounces">Ounces (oz)</option>
                                        </select>
                                    </div>
                                    <div class="col-12">
                                        <label for="massResult" class="form-label">Result</label>
                                        <div id="massResult" class="form-control bg-light text-success fw-bold" readonly></div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="temperature" role="tabpanel" aria-labelledby="temperature-tab">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label for="temperatureInput" class="form-label">Input Value</label>
                                        <input type="number" class="form-control" id="temperatureInput" value="0">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="temperatureFromUnit" class="form-label">From Unit</label>
                                        <select class="form-select" id="temperatureFromUnit">
                                            <option value="celsius">Celsius (°C)</option>
                                            <option value="fahrenheit">Fahrenheit (°F)</option>
                                            <option value="kelvin">Kelvin (K)</option>
                                        </select>
                                    </div>
                                    <div class="col-12">
                                        <label for="temperatureResult" class="form-label">Result</label>
                                        <div id="temperatureResult" class="form-control bg-light text-success fw-bold" readonly></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="statusArea" class="text-center"></div>
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
                <?php include '../../views/content/unit-converter-content.php'; ?>
            </article>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const statusArea = document.getElementById('statusArea');

    function showStatus(message, type) {
        statusArea.textContent = message;
        statusArea.className = `text-center text-${type}`;
    }

    function showError(message) {
        showStatus(message, 'danger');
    }

    // Conversion factors (all base units are SI - meters, sq_meters, liters, kilograms, Celsius)
    const conversionFactors = {
        length: {
            meters: 1,
            kilometers: 1000,
            centimeters: 0.01,
            millimeters: 0.001,
            micrometers: 0.000001,
            nanometers: 0.000000001,
            miles: 1609.34,
            yards: 0.9144,
            feet: 0.3048,
            inches: 0.0254,
            nautical_miles: 1852
        },
        area: {
            sq_meters: 1,
            sq_kilometers: 1000000,
            sq_centimeters: 0.0001,
            sq_millimeters: 0.000001,
            acres: 4046.86,
            hectares: 10000,
            sq_miles: 2589988.11,
            sq_yards: 0.836127,
            sq_feet: 0.092903,
            sq_inches: 0.00064516
        },
        volume: {
            cubic_meters: 1,
            cubic_centimeters: 0.000001,
            liters: 0.001,
            milliliters: 0.000001,
            gallons_us: 0.00378541,
            quarts_us: 0.000946353,
            pints_us: 0.000473176,
            cups_us: 0.000236588,
            fluid_ounces_us: 0.0000295735,
            cubic_feet: 0.0283168,
            cubic_inches: 0.0000163871
        },
        mass: {
            kilograms: 1,
            grams: 0.001,
            milligrams: 0.000001,
            metric_tons: 1000,
            pounds: 0.453592,
            ounces: 0.0283495
        }
    };

    // Helper function to convert a value from one unit to another
    function convertUnit(value, fromUnit, category) {
        const factors = conversionFactors[category];
        if (factors[fromUnit] === undefined) {
            showError(`Invalid 'from' unit for ${category}.`);
            return {};
        }

        const baseValue = value * factors[fromUnit];
        const results = {};
        for (const toUnit in factors) {
            if (factors[toUnit] !== 0) { // Avoid division by zero
                results[toUnit] = baseValue / factors[toUnit];
            } else {
                 results[toUnit] = 0; // Handle cases where target unit factor is 0 (though unlikely with current units)
            }
        }
        return results;
    }

    // Specific function for Temperature conversions (non-linear)
    function convertTemperature(value, fromUnit) {
        let celsius;

        if (fromUnit === 'celsius') {
            celsius = value;
        } else if (fromUnit === 'fahrenheit') {
            celsius = (value - 32) * 5 / 9;
        } else if (fromUnit === 'kelvin') {
            celsius = value - 273.15;
        } else {
            showError("Invalid 'from' temperature unit.");
            return {};
        }

        return {
            celsius: celsius,
            fahrenheit: (celsius * 9 / 5) + 32,
            kelvin: celsius + 273.15
        };
    }

    // Function to format results
    function formatResult(value, unit) {
        if (value === null || isNaN(value)) {
            return "Invalid Input";
        }
        let unitSymbol = '';
        switch(unit) {
            case 'meters': unitSymbol = ' m'; break;
            case 'kilometers': unitSymbol = ' km'; break;
            case 'centimeters': unitSymbol = ' cm'; break;
            case 'millimeters': unitSymbol = ' mm'; break;
            case 'micrometers': unitSymbol = ' µm'; break;
            case 'nanometers': unitSymbol = ' nm'; break;
            case 'miles': unitSymbol = ' mi'; break;
            case 'yards': unitSymbol = ' yd'; break;
            case 'feet': unitSymbol = ' ft'; break;
            case 'inches': unitSymbol = ' in'; break;
            case 'nautical_miles': unitSymbol = ' nmi'; break;

            case 'sq_meters': unitSymbol = ' m²'; break;
            case 'sq_kilometers': unitSymbol = ' km²'; break;
            case 'sq_centimeters': unitSymbol = ' cm²'; break;
            case 'sq_millimeters': unitSymbol = ' mm²'; break;
            case 'acres': unitSymbol = ' acres'; break;
            case 'hectares': unitSymbol = ' ha'; break;
            case 'sq_miles': unitSymbol = ' mi²'; break;
            case 'sq_yards': unitSymbol = ' yd²'; break;
            case 'sq_feet': unitSymbol = ' ft²'; break;
            case 'sq_inches': unitSymbol = ' in²'; break;

            case 'cubic_meters': unitSymbol = ' m³'; break;
            case 'cubic_centimeters': unitSymbol = ' cm³'; break;
            case 'liters': unitSymbol = ' L'; break;
            case 'milliliters': unitSymbol = ' mL'; break;
            case 'gallons_us': unitSymbol = ' gal (US)'; break;
            case 'quarts_us': unitSymbol = ' qt (US)'; break;
            case 'pints_us': unitSymbol = ' pt (US)'; break;
            case 'cups_us': unitSymbol = ' cup (US)'; break;
            case 'fluid_ounces_us': unitSymbol = ' fl oz (US)'; break;
            case 'cubic_feet': unitSymbol = ' ft³'; break;
            case 'cubic_inches': unitSymbol = ' in³'; break;

            case 'kilograms': unitSymbol = ' kg'; break;
            case 'grams': unitSymbol = ' g'; break;
            case 'milligrams': unitSymbol = ' mg'; break;
            case 'metric_tons': unitSymbol = ' t'; break;
            case 'pounds': unitSymbol = ' lb'; break;
            case 'ounces': unitSymbol = ' oz'; break;

            case 'celsius': unitSymbol = ' °C'; break;
            case 'fahrenheit': unitSymbol = ' °F'; break;
            case 'kelvin': unitSymbol = ' K'; break;
            default: unitSymbol = '';
        }
        return `${value.toFixed(6)}${unitSymbol}`;
    }

    // Generic update function for linear conversions (Length, Area, Volume, Mass)
    function updateConversion(inputElementId, fromUnitElementId, resultElementId, category) {
        const input = document.getElementById(inputElementId);
        const fromUnit = document.getElementById(fromUnitElementId);
        const resultDiv = document.getElementById(resultElementId);

        const value = parseFloat(input.value);
        if (isNaN(value) || value < 0 && category !== 'temperature') { // Allow negative for temperature
            resultDiv.innerHTML = '<span class="text-danger">Invalid input</span>';
            return;
        }

        let resultsHtml = '';
        let conversions;

        if (category === 'temperature') {
            conversions = convertTemperature(value, fromUnit.value);
            for (const unit in conversions) {
                resultsHtml += `<div>${formatResult(conversions[unit], unit)}</div>`;
            }
        } else {
            conversions = convertUnit(value, fromUnit.value, category);
            // Display all conversions except the 'from' unit
            for (const unit in conversions) {
                if (unit !== fromUnit.value) {
                    resultsHtml += `<div>${formatResult(conversions[unit], unit)}</div>`;
                }
            }
             // Also display the input value itself with its unit
             resultsHtml = `<div>${formatResult(value, fromUnit.value)}</div>` + resultsHtml;
        }
        resultDiv.innerHTML = resultsHtml;
    }

    // Event listeners for Length
    const lengthInput = document.getElementById('lengthInput');
    const lengthFromUnit = document.getElementById('lengthFromUnit');
    lengthInput.addEventListener('input', () => updateConversion('lengthInput', 'lengthFromUnit', 'lengthResult', 'length'));
    lengthFromUnit.addEventListener('change', () => updateConversion('lengthInput', 'lengthFromUnit', 'lengthResult', 'length'));

    // Event listeners for Area
    const areaInput = document.getElementById('areaInput');
    const areaFromUnit = document.getElementById('areaFromUnit');
    areaInput.addEventListener('input', () => updateConversion('areaInput', 'areaFromUnit', 'areaResult', 'area'));
    areaFromUnit.addEventListener('change', () => updateConversion('areaInput', 'areaFromUnit', 'areaResult', 'area'));

    // Event listeners for Volume
    const volumeInput = document.getElementById('volumeInput');
    const volumeFromUnit = document.getElementById('volumeFromUnit');
    volumeInput.addEventListener('input', () => updateConversion('volumeInput', 'volumeFromUnit', 'volumeResult', 'volume'));
    volumeFromUnit.addEventListener('change', () => updateConversion('volumeInput', 'volumeFromUnit', 'volumeResult', 'volume'));

    // Event listeners for Mass
    const massInput = document.getElementById('massInput');
    const massFromUnit = document.getElementById('massFromUnit');
    massInput.addEventListener('input', () => updateConversion('massInput', 'massFromUnit', 'massResult', 'mass'));
    massFromUnit.addEventListener('change', () => updateConversion('massInput', 'massFromUnit', 'massResult', 'mass'));

    // Event listeners for Temperature
    const temperatureInput = document.getElementById('temperatureInput');
    const temperatureFromUnit = document.getElementById('temperatureFromUnit');
    temperatureInput.addEventListener('input', () => updateConversion('temperatureInput', 'temperatureFromUnit', 'temperatureResult', 'temperature'));
    temperatureFromUnit.addEventListener('change', () => updateConversion('temperatureInput', 'temperatureFromUnit', 'temperatureResult', 'temperature'));

    // Initialize conversions on page load for the active tab
    const unitTabs = document.getElementById('unitTabs');
    const activeTab = unitTabs.querySelector('.nav-link.active');

    function initializeConversions() {
        if (activeTab.id === 'length-tab') updateConversion('lengthInput', 'lengthFromUnit', 'lengthResult', 'length');
        if (activeTab.id === 'area-tab') updateConversion('areaInput', 'areaFromUnit', 'areaResult', 'area');
        if (activeTab.id === 'volume-tab') updateConversion('volumeInput', 'volumeFromUnit', 'volumeResult', 'volume');
        if (activeTab.id === 'mass-tab') updateConversion('massInput', 'massFromUnit', 'massResult', 'mass');
        if (activeTab.id === 'temperature-tab') updateConversion('temperatureInput', 'temperatureFromUnit', 'temperatureResult', 'temperature');
    }

    // Call initialize on page load
    initializeConversions();

    // Re-initialize when a new tab is shown
    unitTabs.addEventListener('shown.bs.tab', function (event) {
        const newTabId = event.target.id;
        if (newTabId === 'length-tab') updateConversion('lengthInput', 'lengthFromUnit', 'lengthResult', 'length');
        else if (newTabId === 'area-tab') updateConversion('areaInput', 'areaFromUnit', 'areaResult', 'area');
        else if (newTabId === 'volume-tab') updateConversion('volumeInput', 'volumeFromUnit', 'volumeResult', 'volume');
        else if (newTabId === 'mass-tab') updateConversion('massInput', 'massFromUnit', 'massResult', 'mass');
        else if (newTabId === 'temperature-tab') updateConversion('temperatureInput', 'temperatureFromUnit', 'temperatureResult', 'temperature');
    });

    // Dummy tools list for sidebar (as seen in password-generator.php)
    const toolsListDiv = document.getElementById('toolsList');
    if (toolsListDiv) {
        toolsListDiv.innerHTML = `
            <a href="#" class="list-group-item list-group-item-action py-2 ripple">Password Generator</a>
            <a href="#" class="list-group-item list-group-item-action py-2 ripple active">Unit Converter</a>
            <a href="#" class="list-group-item list-group-item-action py-2 ripple">Base64 Encoder/Decoder</a>
            <a href="#" class="list-group-item list-group-item-action py-2 ripple">MD5 Generator</a>
        `;
    }
});
</script>

<?php include '../../includes/footer.php'; ?>