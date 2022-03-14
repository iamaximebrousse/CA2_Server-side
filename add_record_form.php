<?php
require('database.php');
$query = 'SELECT *
          FROM categories 
          ORDER BY categoryID';
$statement = $db->prepare($query);
$statement->execute();
$categories = $statement->fetchAll();
$statement->closeCursor();

$query2 = 'SELECT *
          FROM software 
          ORDER BY softwareID';
$statement2 = $db->prepare($query2);
$statement2->execute();
$software = $statement2->fetchAll();
$statement2->closeCursor();


?>
<!-- the head section -->
 <div class="container">
<?php
include('includes/header.php');
?>
</header>
        <h1>Add Record</h1>
        <form action="add_record.php" method="post" enctype="multipart/form-data"
              id="add_record_form">

            <label>Category:</label>
            <select name="category_id">
            <?php foreach ($categories as $category) : ?>
                <option value="<?php echo $category['categoryID']; ?>">
                    <?php echo $category['categoryName']; ?>
                </option>
            <?php endforeach; ?>
            </select>
            <br>

            <label>Software:</label>
            <select name="software_id">
            <?php foreach ($software as $softwares) : ?>
                <option value="<?php echo $softwares['softwareID']; ?>">
                    <?php echo $softwares['softwareName']; ?>
                </option>
            <?php endforeach; ?>
            </select>
            <br>

            <label>Name:</label>
            <input type="input" placeholder="Name..." name="name" id="name" onBlur="name_validation();" required><span id="name_err"></span>
            <br> 
            
            <label>Description</label>
            <textarea  cols="40" rows="5" name="description" id="description" onBlur="description_validation();" placeholder="Description..." required></textarea><span id="desc_err"></span>
            <br>  
            
            <label>Image:</label>
            <input type="file" name="image" accept="image/*" required>
            <br>
            
            <label>&nbsp;</label>
            <input type="submit" value="Add Record" class="validate">
            <br>
        </form>
        <p><a href="backoffice.php">View Homepage</a></p>
    <?php
include('includes/footer.php');
?>