<?php
require_once 'header.php';
require_once 'connection.php';

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the category name from the POST data
    $category_name = $_POST['category_name'];

    // Prepare an SQL statement to insert the new category
    $sql = "INSERT INTO category (category_name) VALUES ('$category_name')";

    // Execute the SQL statement
    $result = mysqli_query($conn, $sql);

    // Check the result of the query execution
    if ($result) {
        echo "Category Added Successfully";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<h1>Add Category Page</h1>
<form action="" method="post">
    <label for="category_name">Category Name</label>
    <br>
    <input type="text" name="category_name" id="category_name" required>
    <br><br>
    <button type="submit">Add Category</button>
</form>

<?php
require_once 'footer.php';
?>