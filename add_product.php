<?php
require_once "connection.php";
require_once 'header.php';

// Fetch all categories from the database
$sql = "SELECT * FROM category";
$categoryResult = mysqli_query($conn, $sql);

// Check if the query executed successfully
if (!$categoryResult) {
    die("Query Failed: " . mysqli_error($conn));
}

// Fetch the categories into an array
$categories = mysqli_fetch_all($categoryResult, MYSQLI_ASSOC);

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get product details from the POST data
    $category_id = $_POST['category_id'];
    $name = $_POST['name'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];

    // Prepare an SQL statement to insert the new product
    $sql = "INSERT INTO product (category_id, name, quantity, price) VALUES ('$category_id', '$name', '$quantity', '$price')";

    // Execute the SQL statement
    $result = mysqli_query($conn, $sql);

    // Check the result of the query execution
    if ($result) {
        echo "Product Added Successfully";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<h1>Add Product</h1>
<form action="" method="post">
    <label for="category_id">Category</label><br>
    <select name="category_id" id="category_id" required>
        <option value="">----Select Category----</option>
        <?php if (is_array($categories) && count($categories) > 0): ?>
            <?php foreach ($categories as $cat): ?>
                <option value="<?= htmlspecialchars($cat['cid']) ?>"><?= htmlspecialchars($cat['category_name']); ?></option>
            <?php endforeach; ?>
        <?php else: ?>
            <option value="">No categories available</option>
        <?php endif; ?>
    </select><br><br>

    <label for="name">Product Name</label> <br>
    <input type="text" name="name" id="name" required><br><br>

    <label for="quantity">Quantity</label> <br>
    <input type="number" name="quantity" id="quantity" required><br><br>

    <label for="price">Price</label><br>
    <input type="text" name="price" id="price" required><br><br>

    <button type="submit">Add Product</button>
</form>

<?php
require_once 'footer.php';
?>
