<?php
require_once 'header.php';
require_once 'connection.php'; // Make sure you include your database connection file

// Fetch all products from the database
$sql = "SELECT * FROM product";
$productResult = mysqli_query($conn, $sql);

// Check if the query executed successfully
if (!$productResult) {
    die("Query Failed: " . mysqli_error($conn));
}

// Fetch the products into an array
$products = [];
if ($productResult && mysqli_num_rows($productResult) > 0) {
    while ($row = mysqli_fetch_assoc($productResult)) {
        $products[] = $row;
    }
} else {
    echo "No products found or query failed.";
}
?>

<h1>Index Page</h1>
<hr>
<table border="1" width="100%">
    <thead>
        <tr>
            <th>Id</th>
            <th>Product</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Total</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php if (is_array($products) && count($products) > 0): ?>
            <?php foreach ($products as $pro): ?>
                <tr>
                    <td><?= htmlspecialchars($pro['pid']); ?></td>
                    <td><?= htmlspecialchars($pro['name']); ?></td>
                    <td><?= htmlspecialchars($pro['quantity']); ?></td>
                    <td><?= htmlspecialchars($pro['price']); ?></td>
                    <td><?= htmlspecialchars($pro['quantity'] * $pro['price']); ?></td>
                    <td>
                        <a href="edit.php?id=<?= htmlspecialchars($pro['pid']); ?>">Edit</a>
                        <a href="delete.php?id=<?= htmlspecialchars($pro['pid']); ?>">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="6">No products available.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

<?php
require_once 'footer.php';
?>