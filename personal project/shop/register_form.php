<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" href="css/product.css">
</head>
<body>

<div class="container">
    <h2>Register</h2>

    <form action="register.php" method="POST">
        <input type="text" name="username" placeholder="Username" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Register</button>
    </form>

    <?php
    if (isset($_SESSION["error"])) {
        echo '<p class="message">' . $_SESSION["error"] . '</p>';
        unset($_SESSION["error"]);
    }

    if (isset($_SESSION["success"])) {
        echo '<p class="success">' . $_SESSION["success"] . '</p>';
        unset($_SESSION["success"]);
    }
    ?>
    
    <p style="text-align:center; margin-top:15px;">
        Already have an account? <a class="button-secondary" href="login_form.php">Login</a>
    </p>
</div>

</body>
</html>