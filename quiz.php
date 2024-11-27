<?php
session_start();

// Redirect to settings if the quiz session isn't set
if (!isset($_SESSION['questions']) || !isset($_SESSION['current_question'])) {
    header('Location: settings.php');
    exit;
}

// Process the answer submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['answer'])) {
    $currentQuestionIndex = $_SESSION['current_question'];
    $questions = $_SESSION['questions'];
    $currentQuestion = $questions[$currentQuestionIndex];

    // Validate the submitted answer
    $submittedAnswer = $_POST['answer'];
    $correctAnswer = $currentQuestion['answer'];

    if ($submittedAnswer == $correctAnswer) {
        $_SESSION['correct']++;
    } else {
        $_SESSION['wrong']++;
    }

    // Move to the next question
    $_SESSION['current_question']++;

    // Check if the quiz is complete
    if ($_SESSION['current_question'] >= count($_SESSION['questions'])) {
        header('Location: results.php');
        exit;
    }
}

// Retrieve the current question and answers
$currentQuestionIndex = $_SESSION['current_question'];
$questions = $_SESSION['questions'];
$currentQuestion = $questions[$currentQuestionIndex];
$question = $currentQuestion['question'];
$correctAnswer = $currentQuestion['answer'];

// Generate multiple-choice answers
$choices = [$correctAnswer];
for ($i = 1; $i <= 3; $i++) {
    do {
        $fakeAnswer = rand($correctAnswer - 10, $correctAnswer + 10);
    } while (in_array($fakeAnswer, $choices)); // Ensure unique choices
    $choices[] = $fakeAnswer;
}

shuffle($choices); // Randomize answer order
?>