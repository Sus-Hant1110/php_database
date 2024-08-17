<?php
require_once 'connection.php';
require_once 'header.php';

// Fetch categories from the database
$sql = "SELECT * FROM category";
$result = mysqli_query($conn, $sql);
?>

<h1>Show Category Page</h1>
<table border="1" width="100%" cellspacing="0" cellpadding="10">
    <thead>
        <tr>
            <th>ID</th>
            <th>Category Name</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $index = 1;
        while ($category = mysqli_fetch_assoc($result)) {
        ?>
            <tr>
                <td><?= $index; ?></td>
                <td><?= htmlspecialchars($category['category_name']); ?></td>
                <td>
                    <a href="edit_category.php?id=<?= $category['cid']; ?>">Edit</a>
                    <a href="delete_category.php?id=<?= $category['cid']; ?>" onclick="return confirm('Are you sure you want to delete this category?');">Delete</a>
                </td>
            </tr>
        <?php $index++;
        } ?>
    </tbody>
</table>

<?php
require_once 'footer.php';
?>