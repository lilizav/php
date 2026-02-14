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

    <form action="login.php" method="POST">
        <input type="email" name="email" placeholder="Email">
        <input type="password" name="password" placeholder="Password">
        <button type="submit">Login</button>
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
</div>

</body>
</html>
