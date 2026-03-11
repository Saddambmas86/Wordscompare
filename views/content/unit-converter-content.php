<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unit Converter - Convert Length, Weight, Temperature, Volume Online</title>
    <meta name="description" content="Free unit converter online. Convert length, weight, temperature, volume, area, speed, time. Metric to imperial conversion. 50+ units supported!">
    <meta name="keywords" content="unit converter, measurement converter, length converter, weight converter, temperature converter, volume converter, metric to imperial, conversion calculator">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        .feature-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.15) !important;
        }
        .benefit-check {
            color: #28a745;
            font-size: 1.3rem;
        }
    </style>
</head>
<body>
    <!-- Intro Section -->
    <div class="card border-0 shadow-sm text-white mb-4" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
        <div class="card-body p-4 p-md-5 text-center">
            <i class="fas fa-exchange-alt fa-4x mb-3"></i>
            <h2 class="display-5 mb-3">🔄 Unit Converter - Convert Measurements Online Free</h2>
            <p class="lead mb-0">Convert length, weight, temperature, volume, area & more. Metric, imperial, US customary units. Instant results!</p>
        </div>
    </div>

    <div class="container mb-5">
        <!-- Feature Cards -->
        <div class="row g-3 mb-4">
            <div class="col-md-3">
                <div class="card h-100 border-0 shadow-sm text-center feature-card">
                    <div class="card-body">
                        <i class="fas fa-ruler fa-3x text-primary mb-3"></i>
                        <h6 class="fw-bold">Length</h6>
                        <p class="small mb-0">Meter, km, mile, yard, feet</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card h-100 border-0 shadow-sm text-center feature-card">
                    <div class="card-body">
                        <i class="fas fa-weight-hanging fa-3x text-success mb-3"></i>
                        <h6 class="fw-bold">Weight</h6>
                        <p class="small mb-0">Kg, gram, pound, ounce, ton</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card h-100 border-0 shadow-sm text-center feature-card">
                    <div class="card-body">
                        <i class="fas fa-thermometer-half fa-3x text-info mb-3"></i>
                        <h6 class="fw-bold">Temperature</h6>
                        <p class="small mb-0">Celsius, Fahrenheit, Kelvin</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card h-100 border-0 shadow-sm text-center feature-card">
                    <div class="card-body">
                        <i class="fas fa-flask fa-3x text-warning mb-3"></i>
                        <h6 class="fw-bold">Volume</h6>
                        <p class="small mb-0">Liter, gallon, ml, cubic meter</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Conversion Categories -->
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-header bg-white border-0 py-3">
                <h3 class="h2 mb-0 text-center fw-bold"><i class="fas fa-list-ul me-2 text-primary"></i>Supported Conversions</h3>
            </div>
            <div class="card-body p-4 p-md-5">
                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-header bg-primary text-white">
                                <h5 class="fw-bold mb-0"><i class="fas fa-ruler-horizontal me-2"></i>Length & Distance</h5>
                            </div>
                            <div class="card-body">
                                <ul class="small">
                                    <li>Meter (m), Kilometer (km), Centimeter (cm), Millimeter (mm)</li>
                                    <li>Mile, Yard, Foot, Inch</li>
                                    <li>Nautical Mile, Light Year, Astronomical Unit</li>
                                    <li>Micron, Nanometer, Angstrom</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-header bg-success text-white">
                                <h5 class="fw-bold mb-0"><i class="fas fa-weight me-2"></i>Weight & Mass</h5>
                            </div>
                            <div class="card-body">
                                <ul class="small">
                                    <li>Kilogram (kg), Gram (g), Milligram (mg)</li>
                                    <li>Pound (lb), Ounce (oz), Stone</li>
                                    <li>Metric Ton, US Ton, Imperial Ton</li>
                                    <li>Carat, Grain, Pennyweight</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-header bg-info text-white">
                                <h5 class="fw-bold mb-0"><i class="fas fa-thermometer-full me-2"></i>Temperature</h5>
                            </div>
                            <div class="card-body">
                                <ul class="small">
                                    <li>Celsius (°C) ↔ Fahrenheit (°F) ↔ Kelvin (K)</li>
                                    <li><strong>Formula:</strong> °F = (°C × 9/5) + 32</li>
                                    <li><strong>Formula:</strong> K = °C + 273.15</li>
                                    <li>Réaumur, Rankine, Newton, Delisle, Rømer</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-header bg-warning text-dark">
                                <h5 class="fw-bold mb-0"><i class="fas fa-wine-bottle me-2"></i>Volume & Capacity</h5>
                            </div>
                            <div class="card-body">
                                <ul class="small">
                                    <li>Liter, Milliliter, Cubic Meter (m³)</li>
                                    <li>Gallon (US/UK), Quart, Pint, Cup</li>
                                    <li>Fluid Ounce, Tablespoon, Teaspoon</li>
                                    <li>Barrel (Oil), Bushel, Peck</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Use Cases -->
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-header bg-white border-0 py-3">
                <h3 class="h2 mb-0 text-center fw-bold"><i class="fas fa-users me-2 text-success"></i>Unit Converter Use Cases</h3>
            </div>
            <div class="card-body p-4 p-md-5">
                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-body">
                                <h5 class="fw-bold text-primary mb-3"><i class="fas fa-home me-2"></i>Daily Life</h5>
                                <ul class="small">
                                    <li>Cooking recipes: cups to ml, tbsp to ml</li>
                                    <li>Height conversion: feet/inches to cm</li>
                                    <li>Weight: kg to lbs for travel, fitness</li>
                                    <li>Temperature: °C to °F for weather forecasts</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-body">
                                <h5 class="fw-bold text-success mb-3"><i class="fas fa-graduation-cap me-2"></i>Education</h5>
                                <ul class="small">
                                    <li>Physics/Chemistry problems: SI units conversion</li>
                                    <li>Math homework: metric to imperial</li>
                                    <li>Science lab measurements</li>
                                    <li>Geography: distance, area calculations</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-body">
                                <h5 class="fw-bold text-info mb-3"><i class="fas fa-tools me-2"></i>Construction & DIY</h5>
                                <ul class="small">
                                    <li>Blueprints: inches to mm, feet to meters</li>
                                    <li>Lumber: board feet to cubic meters</li>
                                    <li>Paint coverage: sq ft to sq meters</li>
                                    <li>Concrete: cubic yards to cubic meters</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-body">
                                <h5 class="fw-bold text-warning mb-3"><i class="fas fa-globe-americas me-2"></i>Travel & Sports</h5>
                                <ul class="small">
                                    <li>Distance: miles to km for road trips</li>
                                    <li>Fuel economy: MPG to L/100km</li>
                                    <li>Speed: mph to km/h</li>
                                    <li>Running pace: min/mile to min/km</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- FAQ -->
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-header bg-white border-0 py-3">
                <h3 class="h2 mb-0 text-center fw-bold"><i class="fas fa-question-circle me-2 text-info"></i>Frequently Asked Questions</h3>
            </div>
            <div class="card-body p-4 p-md-5">
                <div class="accordion" id="faqAccordion">
                    <div class="accordion-item mb-3 border">
                        <h4 class="accordion-header">
                            <button class="accordion-button fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                                <span class="faq-badge me-3">Q1</span>
                                How accurate are the conversions?
                            </button>
                        </h4>
                        <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                <p class="text-success fw-bold"><i class="fas fa-check-double me-2"></i>High precision calculations:</p>
                                <ul>
                                    <li><strong>Standard Factors:</strong> Uses internationally accepted conversion factors</li>
                                    <li><strong>Precision:</strong> Up to 10 decimal places for accuracy</li>
                                    <li><strong>Rounding:</strong> Results rounded appropriately for practical use</li>
                                    <li><strong>Scientific Notation:</strong> Very large/small numbers displayed properly</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    
                    <div class="accordion-item mb-3 border">
                        <h4 class="accordion-header">
                            <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                                <span class="faq-badge me-3">Q2</span>
                                What's the difference between US and UK gallons?
                            </button>
                        </h4>
                        <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                <p class="text-info fw-bold"><i class="fas fa-info-circle me-2"></i>Important volume differences:</p>
                                <ul>
                                    <li><strong>US Liquid Gallon:</strong> 3.785 liters</li>
                                    <li><strong>UK (Imperial) Gallon:</strong> 4.546 liters (20% larger!)</li>
                                    <li><strong>US Dry Gallon:</strong> 4.405 liters (rarely used)</li>
                                    <li><strong>Impact:</strong> Fuel economy differs significantly (MPG US vs MPG UK)</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Benefits -->
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white border-0 py-3">
                <h3 class="h2 mb-0 text-center fw-bold"><i class="fas fa-star me-2 text-warning"></i>Benefits</h3>
            </div>
            <div class="card-body p-4 p-md-5">
                <div class="row g-4">
                    <div class="col-md-6">
                        <h5 class="fw-bold text-primary mb-3">Why Use Unit Converter?</h5>
                        <ul class="list-unstyled">
                            <li class="mb-3">
                                <i class="fas fa-check-circle benefit-check me-2"></i>
                                <strong>Universal Understanding:</strong> Bridge metric and imperial systems
                            </li>
                            <li class="mb-3">
                                <i class="fas fa-check-circle benefit-check me-2"></i>
                                <strong>Error Prevention:</strong> Accurate conversions prevent costly mistakes
                            </li>
                            <li class="mb-3">
                                <i class="fas fa-check-circle benefit-check me-2"></i>
                                <strong>Time-Saving:</strong> Instant results vs manual calculation
                            </li>
                            <li class="mb-3">
                                <i class="fas fa-check-circle benefit-check me-2"></i>
                                <strong>Educational:</strong> Learn relationships between units
                            </li>
                            <li class="mb-3">
                                <i class="fas fa-check-circle benefit-check me-2"></i>
                                <strong>International Communication:</strong> Work across measurement systems
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <h5 class="fw-bold text-success mb-3">Tool Features</h5>
                        <ul class="list-unstyled">
                            <li class="mb-3">
                                <i class="fas fa-check-circle benefit-check me-2"></i>
                                <strong>50+ Units:</strong> Comprehensive coverage across categories
                            </li>
                            <li class="mb-3">
                                <i class="fas fa-check-circle benefit-check me-2"></i>
                                <strong>Real-Time:</strong> Instant conversion as you type
                            </li>
                            <li class="mb-3">
                                <i class="fas fa-check-circle benefit-check me-2"></i>
                                <strong>Bi-Directional:</strong> Convert both ways seamlessly
                            </li>
                            <li class="mb-3">
                                <i class="fas fa-check-circle benefit-check me-2"></i>
                                <strong>Mobile-Friendly:</strong> Perfect on phones, tablets, desktops
                            </li>
                            <li class="mb-3">
                                <i class="fas fa-check-circle benefit-check me-2"></i>
                                <strong>100% Free:</strong> Unlimited conversions, no registration
                            </li>
                        </ul>
                    </div>
                </div>
                
                <div class="text-center mt-4 p-4" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%); border-radius: 15px;">
                    <h4 class="text-white mb-3"><i class="fas fa-sync-alt me-2"></i>Convert Units Now!</h4>
                    <p class="text-white mb-0">Transform measurements instantly—free forever!</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
