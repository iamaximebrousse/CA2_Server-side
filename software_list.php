<?php
    require_once('database.php');

    // Get all categories
    $query = 'SELECT * FROM software
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
    <h1>software List</h1>
    <table>
        <tr>
            <th>Name</th>
            <th>&nbsp;</th>
        </tr>
        <?php foreach ($softwares as $software) : ?>
        <tr>
            <td><?php echo $software['softwareName']; ?></td>
            <td>
                <form action="delete_software.php" method="post"
                      id="delete_product_form">
                    <input type="hidden" name="software_id"
                           value="<?php echo $software['softwareID']; ?>">
                    <input type="submit" value="Delete">
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
    <br>

    <h2>Add Category</h2>
    <form action="add_software.php" method="post"
          id="add_software_form">

        <label>Name:</label>
        <input type="input" name="name">
        <input id="add_sofftware_button" type="submit" value="Add">
    </form>
    <br>
    <p><a href="index.php">Homepage</a></p>

    <?php
include('includes/footer.php');
?>