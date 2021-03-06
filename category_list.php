<?php
    require_once('database.php');

    // Get all categories
    $query = 'SELECT * FROM categories
              ORDER BY categoryID';
    $statement = $db->prepare($query);
    $statement->execute();
    $categories = $statement->fetchAll();
    $statement->closeCursor();
?>
<!-- the head section -->
<div class="container">
<?php
include('includes/header.php');
?>
</header>
    <h1>Category List</h1>
    <table>
        <tr>
            <th>Name</th>
            <th>&nbsp;</th>
        </tr>
        <?php foreach ($categories as $category) : ?>
        <tr>
            <td>
                <?php echo $category['categoryName']; ?>
            </td>
            <td>
                <form action="delete_category.php" method="post" id="delete_product_form">
                    <input type="hidden" name="category_id" value="<?php echo $category['categoryID']; ?>">
                    <input type="submit" value="Delete">
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
    <br>

    <h2>Add Category</h2>
    <form action="add_category.php" method="post">          
        <label>Name:</label>
        <input type="input" placeholder="category..." name="name"id="add_category_form" onBlur="categories_validation();" required>
        <input id="add_category_button" type="submit" value="Add" style="cursor:not-allowed">
        <span id="cat_err"></span>
    </form>
    <br>
    <p><a href="backoffice.php">Homepage</a></p>

    <?php
include('includes/footer.php');
?>