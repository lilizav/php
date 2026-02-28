<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="container">
    <h2>Login</h2>

    <?php
    if (isset($_SESSION["error"])) {
        echo '<p class="message">' . $_SESSION["error"] . '</p>';
        unset($_SESSION["error"]);

        // 👇 Show register button ONLY when login fails
        echo '<div style="margin-bottom:15px;">
                <a href="register_form.php" class="button-secondary">
                    Create an Account
                </a>
              </div>';
    }

    if (isset($_SESSION["success"])) {
        echo '<p class="success">' . $_SESSION["success"] . '</p>';
        unset($_SESSION["success"]);
    }
    ?>

    <form action="login.php" method="POST">
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Login</button>
    </form>

</div>

</body>
</html>