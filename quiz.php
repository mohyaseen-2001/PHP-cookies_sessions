<?php
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['submit_quiz'])) {
    $score = 0;
    
    if (isset($_POST['q1']) && $_POST['q1'] === 'h1') {
        $score++;
    }
    
    if (isset($_POST['q2']) && $_POST['q2'] == 'echo') {
        $score++;
    }
    
    if (isset($_POST['q3']) && $_POST['q3'] == '55') {
        $score++;   
    }

    setcookie('quiz_score', $score, time() + 86400, '/');
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

if (isset($_COOKIE['quiz_score'])) {
    echo "<h3>Your Score: " . $_COOKIE['quiz_score'] . " / 3</h3>";
} else {
    echo "<h3>You haven't taken the quiz yet!</h3>";
}
?>




<form action="" method="POST">
    
    <!-- Question 1 -->
    <div>
        <p>1. Which HTML tag is used for the largest heading?</p>
        <input type="radio" name="q1" value="h1" required> <h1><p>"h1"</p><br>
        <input type="radio" name="q1" value="h6"> <h6>h6<br>
        <input type="radio" name="q1" value="head"> <head>head<br>
    </div>

    <hr>

    <!-- Question 2 -->
    <div>
        <p>2. How do you output text to the browser in PHP?</p>
        <input type="radio" name="q2" value="echo" required> echo<br>
        <input type="radio" name="q2" value="print"> print.output<br>
        <input type="radio" name="q2" value="console"> console.log<br>
    </div>

    <hr>

    <!-- Question 3 -->
    <div>
        <p>3. What is the output of: echo 5 . "5";</p>
        <input type="radio" name="q3" value="10" required> 10<br>
        <input type="radio" name="q3" value="55"> 55<br>
        <input type="radio" name="q3" value="error"> Error<br>
    </div>

    <br>
    <button type="submit" name="submit_quiz">Submit Quiz</button>
</form>
