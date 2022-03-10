<?php
    require_once('database.php');

    // Get all categories
    $query = 'SELECT * FROM software
              ORDER BY softwareID';
    $statement = $db->prepare($query);
    $statement->execute();
    $softwares = $statement->fetchAll();
    $statement->closeCursor();
?>
<!-- the head section -->
<div class="container">
<?php
include('includes/header.php');
?>
</header>
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

    <h2>Add software</h2>
    <form action="add_software.php" method="post"
          id="add_software_form">

        <label>Name:</label>
        <input type="input" name="software" id="software" onBlur="software_validation();"/>
        <input id="add_software_button" type="submit" value="Add" style="cursor:not-allowed">
        <span id="soft_err"></span>
    </form>
    <br>
    <p><a href="backoffice.php">Homepage</a></p>

    <?php
include('includes/footer.php');
?>