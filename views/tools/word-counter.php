<?php
// SEO and Page Metadata
$page_title = "Word Counter"; // You may Change the Title here
$page_description = "Word Counter online."; // Put your Description here
$page_keywords = "word counter, character counter, sentence counter, paragraph counter, online text analysis, text statistics";

// Include common header
include '../../includes/header.php';

// PHP logic for counting
$text_input = '';
$word_count = 0;
$character_count = 0;
$character_no_space_count = 0;
$sentence_count = 0;
$paragraph_count = 0;
$reading_time = '0 min';
$speaking_time = '0 min';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['text_to_count'])) {
    $text_input = $_POST['text_to_count'];

    // Word Count
    // Remove extra spaces and newlines before counting words to avoid miscounts
    $cleaned_text = preg_replace('/\s+/', ' ', trim($text_input));
    if (!empty($cleaned_text)) {
        $word_count = str_word_count($cleaned_text);
    } else {
        $word_count = 0;
    }

    // Character Count (with spaces)
    $character_count = mb_strlen($text_input, 'UTF-8');

    // Character Count (without spaces)
    $character_no_space_count = mb_strlen(str_replace(' ', '', $text_input), 'UTF-8');

    // Sentence Count
    // Basic sentence counting: counts periods, question marks, exclamation marks,
    // followed by a space or end of string. May not be perfect for all cases.
    $sentences = preg_split('/(?<=[.?!])\s+/', $text_input, -1, PREG_SPLIT_NO_EMPTY);
    $sentence_count = count($sentences);

    // Paragraph Count
    // Paragraphs are typically separated by two or more newline characters.
    $paragraphs = preg_split('/\R{2,}/', trim($text_input), -1, PREG_SPLIT_NO_EMPTY);
    $paragraph_count = count($paragraphs);
    if (empty(trim($text_input))) { // Handle empty input for paragraphs
        $paragraph_count = 0;
    } elseif ($paragraph_count === 0 && !empty(trim($text_input))) {
        // If there's content but no double newlines, it's at least one paragraph
        $paragraph_count = 1;
    }


    // Reading Time (average 200 words per minute)
    if ($word_count > 0) {
        $minutes = floor($word_count / 200);
        $seconds = round(($word_count % 200) / (200 / 60));
        $reading_time = ($minutes > 0 ? $minutes . ' min ' : '') . ($seconds > 0 ? $seconds . ' sec' : '');
        if ($reading_time === '') $reading_time = 'less than 1 sec';
    }

    // Speaking Time (average 130 words per minute)
    if ($word_count > 0) {
        $minutes = floor($word_count / 130);
        $seconds = round(($word_count % 130) / (130 / 60));
        $speaking_time = ($minutes > 0 ? $minutes . ' min ' : '') . ($seconds > 0 ? $seconds . ' sec' : '');
        if ($speaking_time === '') $speaking_time = 'less than 1 sec';
    }
}
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
                    <h1 class="h2">Word Counter <i class="fas fa-calculator text-danger ms-2"></i></h1>
                    <p class="lead text-muted">Count words, characters, sentences, and paragraphs instantly.</p>
                </header>

                <div class="card mb-4">
                    <div class="card-header bg-light">
                        <h5 class="mb-0"><i class="fas fa-paragraph me-2"></i>Enter Your Text</h5>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="">
                            <div class="mb-3">
                                <textarea class="form-control" id="textToCount" name="text_to_count" rows="10"
                                          placeholder="Type or paste your text here..."><?php echo htmlspecialchars($text_input); ?></textarea>
                            </div>
                            <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                                <button type="submit" class="btn btn-danger btn-md px-4">
                                    <i class="fas fa-redo-alt me-2"></i>Analyze Text
                                </button>
                                <button type="button" class="btn btn-secondary btn-md px-4" id="clearTextBtn">
                                    <i class="fas fa-eraser me-2"></i>Clear
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card mt-4">
                    <div class="card-header bg-light">
                        <h5 class="mb-0"><i class="fas fa-chart-bar me-2"></i>Statistics</h5>
                    </div>
                    <div class="card-body">
                        <div class="row text-center">
                            <div class="col-6 col-md-3 mb-3">
                                <div class="p-3 bg-light rounded shadow-sm">
                                    <h6 class="text-muted mb-1">Words</h6>
                                    <h3 class="display-6 fw-bold text-danger" id="wordCount"><?php echo $word_count; ?></h3>
                                </div>
                            </div>
                            <div class="col-6 col-md-3 mb-3">
                                <div class="p-3 bg-light rounded shadow-sm">
                                    <h6 class="text-muted mb-1">Characters (with spaces)</h6>
                                    <h3 class="display-6 fw-bold text-danger" id="charCount"><?php echo $character_count; ?></h3>
                                </div>
                            </div>
                            <div class="col-6 col-md-3 mb-3">
                                <div class="p-3 bg-light rounded shadow-sm">
                                    <h6 class="text-muted mb-1">Characters (no spaces)</h6>
                                    <h3 class="display-6 fw-bold text-danger" id="charNoSpaceCount"><?php echo $character_no_space_count; ?></h3>
                                </div>
                            </div>
                            <div class="col-6 col-md-3 mb-3">
                                <div class="p-3 bg-light rounded shadow-sm">
                                    <h6 class="text-muted mb-1">Sentences</h6>
                                    <h3 class="display-6 fw-bold text-danger" id="sentenceCount"><?php echo $sentence_count; ?></h3>
                                </div>
                            </div>
                            <div class="col-6 col-md-3 mb-3">
                                <div class="p-3 bg-light rounded shadow-sm">
                                    <h6 class="text-muted mb-1">Paragraphs</h6>
                                    <h3 class="display-6 fw-bold text-danger" id="paragraphCount"><?php echo $paragraph_count; ?></h3>
                                </div>
                            </div>
                            <div class="col-6 col-md-3 mb-3">
                                <div class="p-3 bg-light rounded shadow-sm">
                                    <h6 class="text-muted mb-1">Reading Time (Est.)</h6>
                                    <h3 class="display-6 fw-bold text-danger" id="readingTime"><?php echo $reading_time; ?></h3>
                                </div>
                            </div>
                            <div class="col-6 col-md-3 mb-3">
                                <div class="p-3 bg-light rounded shadow-sm">
                                    <h6 class="text-muted mb-1">Speaking Time (Est.)</h6>
                                    <h3 class="display-6 fw-bold text-danger" id="speakingTime"><?php echo $speaking_time; ?></h3>
                                </div>
                            </div>
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
                <?php include '../../views/content/word-counter-content.php'; ?>
            </article>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const textToCount = document.getElementById('textToCount');
        const clearTextBtn = document.getElementById('clearTextBtn');

        // Clear button functionality
        if (clearTextBtn) {
            clearTextBtn.addEventListener('click', function() {
                textToCount.value = '';
                // Optionally submit the form to clear counts on the PHP side
                textToCount.form.submit();
            });
        }
    });
</script>

<?php include '../../includes/footer.php'; ?>