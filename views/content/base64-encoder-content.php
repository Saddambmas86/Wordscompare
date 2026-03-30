
<!-- What Is Section -->
<section class="mb-5">
    <div class="card border-0 shadow-sm border-start border-4 border-primary">
        <div class="card-body p-4">
            <h2 class="h3 mb-3"><i class="fas fa-info-circle me-2 text-primary"></i>What is this PDF Tool?</h2>
            <p>This professional-grade PDF tool is designed to provide high-fidelity document management without the need for expensive software. It utilizes advanced cloud-based and local processing algorithms to ensure that your document's layout, fonts, and images are preserved with 100% accuracy. Whether you're a student, a legal professional, or a business owner, this tool streamlines your workflow by enabling instant modifications to your PDF files directly in your web browser.</p>
        </div>
    </div>
</section>
<?php
// Ensure $base_url is available
if (!isset($base_url)) {
 $base_url = '/';
}
?>
<section class="mb-5">
 <div class="card border-0 shadow-sm mb-4" style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);">
 <div class="card-body p-4 p-md-5 text-center text-white">
 <i class="fas fa-lock fa-4x mb-3"></i>
 <h2 class="display-5 mb-3">Base64 Encoder & Decoder Online</h2>
 <p class="lead mb-0">Securely encode and decode your data to and from Base64 format. 100% free and lightning fast!</p>
 </div>
 </div>

 <h3 class="h4 mb-3">What is Base64 Encoding?</h3>
 <p>Base64 is an encoding algorithm that allows you to transform any characters into an alphabet consisting of Latin letters, digits, plus, and slash. It's commonly used when there's a need to encode binary data that needs to be stored and transferred over media that are designed to deal with textual data.</p>
 
 <h3 class="h4 mb-3 mt-4">Features of this Tool</h3>
 <ul>
 <li><strong>Real-time processing:</strong> Encode or decode instantly as you type.</li>
 <li><strong>UTF-8 Support:</strong> Safely encodes high-byte characters and emojis.</li>
 <li><strong>100% Client-Side:</strong> Your data never leaves your browser, ensuring complete privacy.</li>
 </ul>

 <h3 class="h4 mb-3 mt-4">Common Use Cases</h3>
 <ul>
 <li>Encoding credentials for basic HTTP authentication.</li>
 <li>Embedding small images natively in HTML or CSS using Data URIs.</li>
 <li>Bypassing text-based software limitations by turning binary data into safe ASCII.</li>
 </ul>
</section>

<!-- Related Tools Section -->
<section class="mt-5 py-4 border-top">
 <h3 class="h4 mb-4 text-center">Explore More Developer Tools</h3>
 <div class="row g-3 justify-content-center">
 <div class="col-md-4">
 <div class="card h-100 border-0 shadow-sm tool-card">
 <div class="card-body text-center">
 <i class="fas fa-link fa-2x text-primary mb-3"></i>
 <h5 class="card-title h6">URL Encoder</h5>
 <p class="card-text small text-muted">Safely encode URLs.</p>
 <a href="<?php echo $base_url; ?>url-encoder" class="btn btn-outline-primary btn-sm stretched-link">Use Tool</a>
 </div>
 </div>
 </div>
 <div class="col-md-4">
 <div class="card h-100 border-0 shadow-sm tool-card">
 <div class="card-body text-center">
 <i class="fas fa-fingerprint fa-2x text-info mb-3"></i>
 <h5 class="card-title h6">Hash Generator</h5>
 <p class="card-text small text-muted">Generate secure hashes.</p>
 <a href="<?php echo $base_url; ?>hash-generator" class="btn btn-outline-primary btn-sm stretched-link">Use Tool</a>
 </div>
 </div>
 </div>
 <div class="col-md-4">
 <div class="card h-100 border-0 shadow-sm tool-card">
 <div class="card-body text-center">
 <i class="fas fa-key fa-2x text-danger mb-3"></i>
 <h5 class="card-title h6">JWT Decoder</h5>
 <p class="card-text small text-muted">Decode JSON Web Tokens.</p>
 <a href="<?php echo $base_url; ?>jwt-decoder" class="btn btn-outline-primary btn-sm stretched-link">Use Tool</a>
 </div>
 </div>
 </div>
 </div>
</section>
