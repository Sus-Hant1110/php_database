<?php
require_once 'connection.php';
require_once 'header.php';

// Check if the product ID is set
if (isset($_GET['id'])) {
    // Get the product ID
    $id = $_GET['id'];

    // Prepare an SQL statement to delete the product
    $sql = "DELETE FROM product WHERE pid = '$id'";

    // Execute the SQL statement
    $result = mysqli_query($conn, $sql);

    // Check the result of the query execution
    if ($result) {
        echo "Product Deleted Successfully";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} else {
    echo "Product ID not provided";
}
?>
<?php
require_once 'footer.php';
?>
