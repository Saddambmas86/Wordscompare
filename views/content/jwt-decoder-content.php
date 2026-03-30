
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
 <div class="card border-0 shadow-sm mb-4" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);">
 <div class="card-body p-4 p-md-5 text-center text-white">
 <i class="fas fa-key fa-4x mb-3"></i>
 <h2 class="display-5 mb-3">JWT Decoder Online</h2>
 <p class="lead mb-0">Decode and parse JSON Web Tokens (JWT) safely in your browser. Read payload claims instantly.</p>
 </div>
 </div>

 <h3 class="h4 mb-3">What is a JSON Web Token?</h3>
 <p>JSON Web Token (JWT) is an open standard (RFC 7519) that defines a compact and self-contained way for securely transmitting information between parties as a JSON object. This information can be verified and trusted because it is digitally signed. JWTs can be signed using a secret (with the HMAC algorithm) or a public/private key pair using RSA or ECDSA.</p>
 
 <h3 class="h4 mb-3 mt-4">Structure of a JWT</h3>
 <p>A JWT is generally composed of three parts separated by dots (<code>.</code>):</p>
 <ol>
 <li><strong>Header:</strong> Typically consists of two parts: the type of the token, which is JWT, and the signing algorithm being used, such as HMAC SHA256 or RSA.</li>
 <li><strong>Payload:</strong> Contains the claims. Claims are statements about an entity (typically, the user) and additional data. There are three types of claims: registered, public, and private claims.</li>
 <li><strong>Signature:</strong> Used to verify the message wasn't changed along the way. To create the signature part you have to take the encoded header, the encoded payload, a secret, the algorithm specified in the header, and sign that.</li>
 </ol>

 <h3 class="h4 mb-3 mt-4">Privacy Note</h3>
 <p>Our JWT Decoder performs the decoding entirely <strong>on the client-side</strong> (within your browser). Your token is never uploaded to our servers, ensuring your sensitive data and claims remain private.</p>
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
 <i class="fas fa-fingerprint fa-2x text-info mb-3"></i>
 <h5 class="card-title h6">Hash Generator</h5>
 <p class="card-text small text-muted">Generate secure hashes.</p>
 <a href="<?php echo $base_url; ?>hash-generator" class="btn btn-outline-info btn-sm stretched-link">Use Tool</a>
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