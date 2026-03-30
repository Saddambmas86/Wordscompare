
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
 <div class="card border-0 shadow-sm mb-4" style="background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);">
 <div class="card-body p-4 p-md-5 text-center text-white">
 <i class="fas fa-fingerprint fa-4x mb-3"></i>
 <h2 class="display-5 mb-3">Cryptographic Hash Generator Free</h2>
 <p class="lead mb-0">Calculate MD5, SHA-1, SHA-256, and SHA-512 hashes from your string instantly in browser.</p>
 </div>
 </div>

 <h3 class="h4 mb-3">What is a Hash Function?</h3>
 <p>A hash function is any function that can be used to map data of arbitrary size to fixed-size values. The values returned by a hash function are called hash values, hash codes, digests, or simply hashes. Cryptographic hash functions have the additional property that they are extremely difficult to decipher - it is computationally infeasible to recreate the original input from the hash value.</p>
 
 <h3 class="h4 mb-3 mt-4">Supported Hash Algorithms</h3>
 <ul>
 <li><strong>MD5 (Message-Digest Algorithm):</strong> A widely used 128-bit hash function. Though typically considered cryptographically broken for digital signatures, it is still wildly popular for checksums and data integrity verification.</li>
 <li><strong>SHA-1 (Secure Hash Algorithm 1):</strong> Produces a 160-bit message digest. Like MD5, it's no longer considered secure against well-funded attackers but is still used heavily in legacy systems and Git.</li>
 <li><strong>SHA-256:</strong> Part of the SHA-2 family, providing a 256-bit hash. It is the current industry standard for password hashing, digital signatures, and blockchain technologies (like Bitcoin).</li>
 <li><strong>SHA-512:</strong> A 512-bit hash also from the SHA-2 family. It provides stronger security and can be faster on 64-bit processors than SHA-256.</li>
 </ul>

 <h3 class="h4 mb-3 mt-4">Security Guaranteed</h3>
 <p>This tool utilizes the robust CryptoJS library to generate hashes <strong>exclusively within your web browser</strong>. This guarantees that your sensitive texts, passwords, or personal data are never transmitted over the internet or saved on our servers.</p>
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
 <i class="fas fa-key fa-2x text-danger mb-3"></i>
 <h5 class="card-title h6">JWT Decoder</h5>
 <p class="card-text small text-muted">Decode JSON Web Tokens.</p>
 <a href="<?php echo $base_url; ?>jwt-decoder" class="btn btn-outline-danger btn-sm stretched-link">Use Tool</a>
 </div>
 </div>
 </div>
 </div>
</section>



<!-- Features Section -->
<section class="mb-5">
    <h2 class="mb-4"><i class="fas fa-star me-2 text-warning"></i>Key Features of Our PDF Tool</h2>
    <div class="row g-4">
        <div class="col-md-6">
            <div class="d-flex align-items-center mb-3">
                <i class="fas fa-bolt text-success fa-2x me-3"></i>
                <div>
                    <h5 class="fw-bold mb-1">Ultra-Fast Processing</h5>
                    <p class="small text-muted mb-0">Get your results in seconds, even with complex and multi-page documents.</p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="d-flex align-items-center mb-3">
                <i class="fas fa-shield-alt text-primary fa-2x me-3"></i>
                <div>
                    <h5 class="fw-bold mb-1">Privacy Focused</h5>
                    <p class="small text-muted mb-0">All files are processed securely and deleted from our servers automatically.</p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="d-flex align-items-center mb-3">
                <i class="fas fa-check-circle text-info fa-2x me-3"></i>
                <div>
                    <h5 class="fw-bold mb-1">High-Fidelity Results</h5>
                    <p class="small text-muted mb-0">Maintains document structure, formatting, and quality throughout the process.</p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="d-flex align-items-center mb-3">
                <i class="fas fa-mobile-alt text-warning fa-2x me-3"></i>
                <div>
                    <h5 class="fw-bold mb-1">No Installation Needed</h5>
                    <p class="small text-muted mb-0">Works entirely in your browser on desktop, tablet, and mobile devices.</p>
                </div>
            </div>
        </div>
    </div>
</section>