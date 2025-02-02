<?php 
session_start();
include('connect.php');

// Check if the quiz is complete
if (!isset($_SESSION['correct']) || !isset($_SESSION['questions'])) {
    header('Location: quiz.php');
    exit;
}

// Calculate total questions and correct answers
$totalQuestions = count($_SESSION['questions']);
$correctAnswers = $_SESSION['correct'];

// Determine rank based on correct answers
if ($correctAnswers >= 0.85 * $totalQuestions) {
    $rank = 'A';
} elseif ($correctAnswers >= 0.4 * $totalQuestions) {
    $rank = 'B';
} elseif ($correctAnswers >= 0.2 * $totalQuestions) {
    $rank = 'C';
} else {
    $rank = 'D';
}

// Handle leaderboard submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['username'])) {
    $username = htmlspecialchars($_POST['username']);
    $date = date('Y-m-d H:i:s');

    // Insert user score into the leaderboard
    $stmt = $conn->prepare("INSERT INTO leaderboard (username, score, date) VALUES (?, ?, ?)");
    $stmt->bind_param("sis", $username, $correctAnswers, $date);
    $stmt->execute();

    // Reset quiz session data
    session_unset();
    session_destroy();

    // Redirect to leaderboard
    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Results</title>
    <style>
        #wrapper {
            font-family: Monaco, Courier, 'Courier New', monospace;
            margin: 50px auto;
            padding: 30px;
            background: #4D6879; /* Main color of the form */
            font-size: 14px;
            width: 100%;
            max-width: 500px;
            box-sizing: border-box;
            color: #fff;
            text-shadow: 1px 1px 1px #666;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
            text-align: center;
        }

        h1 {
            font-size: 28px;
            color: #fff;
            margin-bottom: 20px;
        }

        p {
            font-size: 18px;
            color: #fff;
            margin: 10px 0;
        }

        label {
            display: block;
            font-size: 18px;
            margin: 10px 0;
            text-align: left;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            box-sizing: border-box;
            border-radius: 6px;
            border: 1px solid #fff;
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.5);
            background: rgba(255, 255, 255, 0.1);
            color: #fff;
        }

        input[type="text"]:focus {
            border: 1px solid #ddd;
            box-shadow: 0 0 15px rgba(255, 255, 255, 0.7);
        }

        button {
            font-size: 18px;
            color: #fff;
            background: #000;
            text-shadow: 1px 1px 1px #000;
            border: 1px solid #fff;
            padding: 10px 20px;
            border-radius: 6px;
            cursor: pointer;
            margin-top: 20px;
            text-transform: uppercase;
            background-image: linear-gradient(to bottom, #3b3b3b, #000);
        }

        button:hover {
            color: #ccc;
            background: #444;
        }

        body {
            background: url('bg.gif') no-repeat center center fixed; /* Add the GIF */
            background-size: cover;
            height: 100vh;
            margin: 0;
        }
    </style>
</head>
<body>
    <div id="wrapper">
        <h1>Quiz Completed!</h1>
        <p>Your Score: <?= $correctAnswers ?> / <?= $totalQuestions ?></p>
        <p>Your Rank: <?= $rank ?></p>

        <form method="POST">
            <label for="username">Enter Your Username:</label>
            <input type="text" name="username" id="username" required>
            <button type="submit">Submit</button>
        </form>
    </div>
</body>
</html>
