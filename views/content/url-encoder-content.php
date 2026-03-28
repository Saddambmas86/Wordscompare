<?php
// Ensure $base_url is available
if (!isset($base_url)) {
 $base_url = '/';
}
?>
<section class="mb-5">
 <div class="card border-0 shadow-sm mb-4" style="background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);">
 <div class="card-body p-4 p-md-5 text-center text-white">
 <i class="fas fa-link fa-4x mb-3"></i>
 <h2 class="display-5 mb-3">URL Encoder & Decoder Online</h2>
 <p class="lead mb-0">Format URLs safely for web transmission or decode them into readable text instantly.</p>
 </div>
 </div>

 <h3 class="h4 mb-3">What is URL Encoding?</h3>
 <p>URL encoding (also known as Percent-encoding) is a mechanism for safely transmitting information within a Uniform Resource Identifier (URI). Characters that are not strictly alphanumeric must be encoded to securely pass through HTTP structures without conflicts or errors. The encoded format represents unsafe characters as a "%" followed by two hexadecimal digits representing the character's ASCII/Unicode mapping.</p>
 
 <h3 class="h4 mb-3 mt-4">encodeURI vs encodeURIComponent</h3>
 <ul>
 <li><strong>encodeURIComponent (Full Encoding):</strong> Use this when you are encoding a parameter value that goes into a query string. It escapes characters like <code>?, =, &, /</code>.</li>
 <li><strong>encodeURI (Partial):</strong> Use this when you want a working URL but need to encode spaces and special characters. It leaves standard URL characters like <code>/, ?, :</code> unescaped.</li>
 </ul>

 <h3 class="h4 mb-3 mt-4">Why use this tool?</h3>
 <p>This developer tool handles conversion securely right inside your browser, meaning <strong>zero data leaves your device</strong>. It's safe to use for sensitive authentication tokens and private links.</p>
</section>

<!-- Related Tools Section -->
<section class="mt-5 py-4 border-top">
 <h3 class="h4 mb-4 text-center">Explore More Developer Tools</h3>
 <div class="row g-3 justify-content-center">
 <div class="col-md-4">
 <div class="card h-100 border-0 shadow-sm tool-card">
 <div class="card-body text-center">
 <i class="fas fa-lock fa-2x text-success mb-3"></i>
 <h5 class="card-title h6">Base64 Encoder</h5>
 <p class="card-text small text-muted">Encode and decode Base64.</p>
 <a href="<?php echo $base_url; ?>base64-encoder" class="btn btn-outline-success btn-sm stretched-link">Use Tool</a>
 </div>
 </div>
 </div>
 <div class="col-md-4">
 <div class="card h-100 border-0 shadow-sm tool-card">
 <div class="card-body text-center">
 <i class="fas fa-fingerprint fa-2x text-info mb-3"></i>
 <h5 class="card-title h6">Hash Generator</h5>
 <p class="card-text small text-muted">Generate secure hashes.</p>
 <a href="<?php echo $base_url; ?>hash-generator" class="btn btn-outline-info btn-sm stretched-link">Use Tool</a>
 </div>
 </div>
 </div>
 <div class="col-md-4">
 <div class="card h-100 border-0 shadow-sm tool-card">
 <div class="card-body text-center">
 <i class="fas fa-key fa-2x text-danger mb-3"></i>
 <h5 class="card-title h6">JWT Decoder</h5>
 <p class="card-text small text-muted">Decode JSON Web Tokens.</p>
 <a href="<?php echo $base_url; ?>jwt-decoder" class="btn btn-outline-danger btn-sm stretched-link">Use Tool</a>
 </div>
 </div>
 </div>
 </div>
</section>
