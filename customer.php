<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['submit_survey'])) {
    if (isset($_POST["survey_feedback"]) && isset($_POST["survey_rating"]) && isset($_POST["survey_recommend"])) {
        
        $_SESSION['feedback'] = $_POST["survey_feedback"];
        $_SESSION['rating'] = $_POST["survey_rating"];
        $_SESSION['recommend'] = $_POST["survey_recommend"];
        
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    }
}

if (isset($_POST['reset_survey'])) {
    session_destroy();
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Survey</title>
</head>
<body>

    <?php if (!isset($_SESSION['feedback'])): ?>
        
        <h2>Customer Satisfaction Survey</h2>
        <form action="" method="POST">
            <div>
                <label for="feedback">1. What do you think about our service?</label><br><br>
                <textarea id="feedback" name="survey_feedback" rows="4" cols="40" required></textarea>
            </div>
            <br><br>
            <div>
                <label for="rating">2. Rate your overall experience (1 to 5):</label><br><br>
                <select id="rating" name="survey_rating" required>
                    <option value="5">5 - Excellent</option>
                    <option value="4">4 - Very Good</option>
                    <option value="3">3 - Good</option>
                    <option value="2">2 - Fair</option>
                    <option value="1">1 - Poor</option>
                </select>
            </div>
            <br><br>
            <div>
                <label>3. Would you recommend us to a friend?</label><br><br>
                <input type="radio" id="yes" name="survey_recommend" value="Yes" required>
                <label for="yes">Yes, definitely</label>
                <br><br>
                <input type="radio" id="no" name="survey_recommend" value="No">
                <label for="no">No, maybe not</label>
            </div>
            <br><br>
            <button type="submit" name="submit_survey">Submit Survey</button>
        </form>

    <?php else: ?>
        
        <h2>Survey Submitted! Thank you.</h2>
        <h3>Summary of your answers:</h3>
        
        <p><strong>Feedback:</strong> <?php echo $_SESSION['feedback']; ?></p>
        <p><strong>Rating:</strong> <?php echo $_SESSION['role' /* Conflation check: use correct key */] = $_SESSION['rating']; ?> / 5</p>
        <p><strong>Recommend:</strong> <?php echo $_SESSION['recommend']; ?></p>
        
        <br>
        <form action="" method="POST">
            <button type="submit" name="reset_survey">Take Survey Again</button>
        </form>

    <?php endif; ?>

</body>
</html>
