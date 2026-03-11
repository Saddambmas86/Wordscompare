<?php 
$page_title = "Contact Us";
$page_description = "Get in touch with the Snapy Tools team - feedback, suggestions, and support";
$page_keywords = "contact Snapy Tools, support, feedback, suggestions";
include '../includes/header.php'; 
?>

<!-- Page Content -->
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8 border shadow-sm p-4">
            <article>
                <header class="mb-5 text-center">
                    <h1 class="display-5 fw-bold">Contact Us</h1>
                    <p class="lead">We'd love to hear from you!</p>
                </header>

                <div class="row">
                    <div class="col-md-6 mb-4">
                        <section class="h-100">
                            <h2 class="h4 mb-3">Get In Touch</h2>
                            <p>Have questions, suggestions, or feedback about our tools? Fill out the form and we'll get back to you as soon as possible.</p>
                            
                            <div class="mt-4">
                                <h3 class="h5">Other Ways to Reach Us</h3>
                                <ul class="list-unstyled">
                                    <li class="mb-2">
                                        <i class="bi bi-envelope me-2"></i>
                                        <a href="digitaltrisha02@gmail.com">support@wordscompare.com</a>
                                    </li>
                                    <li class="mb-2">
                                        <i class="bi bi-twitter me-2"></i>
                                        <a href="digitaltrisha02@gmail.com" target="_blank">WordsCompare@gmail.com</a>
                                    </li>
                                </ul>
                            </div>
                        </section>
                    </div>
                    
                    <div class="col-md-6">
                        <form id="contactForm" method="post" action="/includes/process_contact.php">
                            <div class="mb-3">
                                <label for="name" class="form-label">Your Name</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email Address</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="subject" class="form-label">Subject</label>
                                <select class="form-select" id="subject" name="subject" required>
                                    <option value="" selected disabled>Select a topic</option>
                                    <option value="Feedback">Feedback</option>
                                    <option value="Bug Report">Bug Report</option>
                                    <option value="Feature Request">Feature Request</option>
                                    <option value="General Question">General Question</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="message" class="form-label">Message</label>
                                <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Send Message</button>
                            </div>
                        </form>
                    </div>
                </div>

                <section class="mt-5">
                    <h2 class="h4 mb-3">Frequently Asked Questions</h2>
                    <div class="accordion" id="faqAccordion">
                        <div class="accordion-item">
                            <h3 class="accordion-header" id="headingOne">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne">
                                    How long does it take to get a response?
                                </button>
                            </h3>
                            <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    We typically respond within 1-2 business days. During high volume periods, it may take slightly longer.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h3 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo">
                                    Do you provide technical support for your tools?
                                </button>
                            </h3>
                            <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Yes, we're happy to help with any technical issues you encounter with our tools. Please be as specific as possible when describing the problem.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h3 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree">
                                    Can I suggest a new tool to add to your collection?
                                </button>
                            </h3>
                            <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Absolutely! We welcome suggestions for new tools. Please use the "Feature Request" option in the contact form and describe what the tool would do and how it would be useful.
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </article>
        </div>
    </div>
</div>

<?php include '../includes/footer.php'; ?>