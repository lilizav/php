<?php
session_start();
require '../config.php';

$stmt = $conn->prepare("SELECT * FROM orders ORDER BY created_at DESC");
$stmt->execute();
$orders = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<h2>Orders</h2>

<?php foreach ($orders as $order): ?>
    <div style="margin-bottom:20px;">
        <strong>Order #<?= $order['id']; ?></strong>
        <p>Total: $<?= $order['total']; ?></p>

        <?php
        $stmt = $conn->prepare("SELECT * FROM order_items WHERE order_id = ?");
        $stmt->execute([$order['id']]);
        $items = $stmt->fetchAll(PDO::FETCH_ASSOC);
        ?>

        <ul>
            <?php foreach ($items as $item): ?>
                <li>
                    <?= $item['product_name']; ?> 
                    (<?= $item['quantity']; ?>) - 
                    $<?= $item['price']; ?>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endforeach; ?>