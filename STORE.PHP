<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['save'])) {
    if (isset($_POST["theme"]) && isset($_POST["language"])) {
        $_SESSION['theme'] = $_POST["theme"];
        $_SESSION['language'] = $_POST["language"];
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    }
}

$theme = $_SESSION['theme'] ?? 'light';
$lang = $_SESSION['language'] ?? 'en';

$bg_color = ($theme === 'dark') ? '#222222' : '#f9f9f9';
$text_color = ($theme === 'dark') ? '#ffffff' : '#333333';
$form_bg = ($theme === 'dark') ? '#333333' : '#ffffff';
$form_border = ($theme === 'dark') ? '#444444' : '#ccc';
$direction = ($lang === 'ar') ? 'rtl' : 'ltr';
?>

<!DOCTYPE html>
<html lang="<?php echo $lang; ?>" dir="<?php echo $direction; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Preferences</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 40px;
            background-color: <?php echo $bg_color; ?>;
            color: <?php echo $text_color; ?>;
        }
        form {
            background-color: <?php echo $form_bg; ?>;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            max-width: 300px;
            border: 1px solid <?php echo $form_border; ?>;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }
        .radio-group label {
            display: inline;
            font-weight: normal;
            margin-right: 15px;
            margin-left: 15px;
        }
        select, button {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border-radius: 4px;
            border: 1px solid <?php echo $form_border; ?>;
            background-color: <?php echo $form_bg; ?>;
            color: <?php echo $text_color; ?>;
        }
        button {
            background-color: #007bff;
            color: white;
            font-weight: bold;
            cursor: pointer;
            border: none;
            margin-top: 10px;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

    <h2>User Preferences</h2>

    <form action="" method="POST">
        
        <div class="form-group radio-group">
            <label>Select Theme:</label>
            <input type="radio" id="light" name="theme" value="light" <?php echo ($theme === 'light') ? 'checked' : ''; ?>>
            <label for="light">Light</label>
            
            <input type="radio" id="dark" name="theme" value="dark" <?php echo ($theme === 'dark') ? 'checked' : ''; ?>>
            <label for="dark">Dark</label>
        </div>

        <div class="form-group">
            <label for="language">Select Language:</label>
            <select name="language" id="language">
                <option value="en" <?php echo ($lang === 'en') ? 'selected' : ''; ?>>English</option>
                <option value="ar" <?php echo ($lang === 'ar') ? 'selected' : ''; ?>>العربية</option>
            </select>
        </div>

        <button type="submit" name="save">Save Preferences</button>
    </form>

</body>
</html>
