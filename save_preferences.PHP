<?php
session_start();

$questions = array(
    0 => array(
        'question' => 'What does PHP stand for?',
        'options' => array('A' => 'Personal Home Page', 'B' => 'Hypertext Preprocessor', 'C' => 'Private Hyper Properties'),
        'correct' => 'B'
    ),
    1 => array(
        'question' => 'Which superglobal array holds session data?',
        'options' => array('A' => '$_GET', 'B' => '$_POST', 'C' => '$_SESSION'),
        'correct' => 'C'
    ),
    2 => array(
        'question' => 'Which function deletes all session data?',
        'options' => array('A' => 'session_destroy()', 'B' => 'session_unset()', 'C' => 'session_start()'),
        'correct' => 'A'
    )
);

if (!isset($_SESSION['current_question'])) {
    $_SESSION['current_question'] = 0;
    $_SESSION['score'] = 0;
}

$current = $_SESSION['current_question'];

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['submit_answer'])) {
    $user_answer = $_POST['quiz_answer'] ?? '';

    if ($user_answer === $questions[$current]['correct']) {
        $_SESSION['score']++;
    }

    $_SESSION['current_question']++;
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Quiz Tracker</title>
</head>
<body>

    <h2>Quiz - Question Track</h2>

    <?php if ($current < count($questions)): ?>
        
        <form action="" method="POST">
            <h3>Question <?php echo ($current + 1); ?>: <?php echo $questions[$current]['question']; ?></h3>

            <?php foreach ($questions[$current]['options'] as $value => $text): ?>
                <div>
                    <input type="radio" id="opt_<?php echo $value; ?>" name="quiz_answer" value="<?php echo $value; ?>" required>
                    <label for="opt_<?php echo $value; ?>"><?php echo $text; ?></label>
                </div>
                <br>
            <?php endforeach; ?>

            <br>
            <button type="submit" name="submit_answer">Next Question</button>
        </form>

    <?php else: ?>
        
        <h3>Quiz Completed!</h3>
        <p>Your Total Score: <strong><?php echo $_SESSION['score']; ?></strong> / <?php echo count($questions); ?></p>
        
        <?php session_destroy(); ?>
        <br>
        <a href="">Restart Quiz</a>

    <?php endif; ?>

</body>
</html>
