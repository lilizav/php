
 <?php
session_start();
include_once("config.php");

/* PROTECT PAGE */
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

/* FETCH PRODUCTS */
$sql = "SELECT * FROM products";
$stmt = $conn->prepare($sql);
$stmt->execute();
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard | Products</title>

    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- ICONS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <style>
        body {
            font-size: .875rem;
        }
        .sidebar {
            height: 100vh;
        }
        .sidebar .nav-link.active {
            background: #007bff;
            color: white;
        }
        .table td {
            vertical-align: middle;
        }
    </style>
</head>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-2 mr-0" href="#">
        Welcome, <i><?php echo $_SESSION['username']; ?></i>
    </a>
    <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
            <a class="nav-link" href="logout.php">Sign out</a>
        </li>
    </ul>
</nav>

<div class="container-fluid">
    <div class="row">

        <!-- SIDEBAR -->
        <nav class="col-md-2 d-none d-md-block bg-light sidebar pt-5">
            <div class="sidebar-sticky">
                <ul class="nav flex-column">

                    <li class="nav-item">
                        <a class="nav-link active" href="dashboard.php">
                            <i class="fas fa-home"></i>
                            Dashboard
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="profile.php?id=<?php echo $_SESSION['user_id']; ?>">
                            <i class="fas fa-user"></i>
                            Edit Profile
                        </a>
                    </li>

                </ul>
            </div>
        </nav>

        <!-- MAIN CONTENT -->
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4 pt-5">

            <div class="d-flex justify-content-between align-items-center mb-3">
                <h2>Products</h2>
                <a href="add.php" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Add Product
                </a>
            </div>

            <!-- PRODUCTS TABLE -->
            <div class="card shadow-sm">
                <div class="card-body">
                    <table class="table table-striped table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                        <?php if (count($products) > 0) { ?>
                            <?php foreach ($products as $product) { ?>
                                <tr>
                                    <td><?php echo $product['id']; ?></td>
                                    <td><?php echo $product['title']; ?></td>
                                    <td><?php echo $product['description']; ?></td>
                                    <td><?php echo $product['quantity']; ?></td>
                                    <td>€<?php echo $product['price']; ?></td>
                                    <td>
                                        <a href="edit.php?id=<?php echo $product['id']; ?>" class="btn btn-sm btn-warning">
                                            <i class="fas fa-edit"></i>
                                        </a>

                                        <a href="delete.php?id=<?php echo $product['id']; ?>"
                                           class="btn btn-sm btn-danger"
                                           onclick="return confirm('Are you sure you want to delete this product?');">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>
                        <?php } else { ?>
                            <tr>
                                <td colspan="6" class="text-center">No products found</td>
                            </tr>
                        <?php } ?>
                        </tbody>

                    </table>
                </div>
            </div>

        </main>
    </div>
</div>

</body>
</html>
