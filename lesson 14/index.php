<?php include("header.php") ?>
  <body>
    <h1>Hello, world!</h1>
        <form action="add.php" method="POST">

        <input type="text" name="name" placeholder="Name">
        <br>
        <input type="text" name="surname" placeholder="Surname">
        <br>
        <input type="email" name="email" placeholder="Email">
        <br>
        <button type="submit" name="submit">Add</button>

        <a href="dashboard.php">Go to dashboard</a>

    </form>
<?php include("footer.php") ?>