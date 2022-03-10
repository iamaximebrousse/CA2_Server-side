<?php
require('database.php');

$record_id = filter_input(INPUT_POST, 'record_id', FILTER_VALIDATE_INT);
$query = 'SELECT * 
              FROM records, categories, software
              WHERE recordID = :record_id and records.categoryID = categories.categoryID and records.softwareID = software.softwareID';
$statement = $db->prepare($query);
$statement->bindValue(':record_id', $record_id);
$statement->execute();
$records = $statement->fetch(PDO::FETCH_ASSOC);
$statement->closeCursor();

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
        <h1>Edit Product</h1>
        <form action="edit_record.php" method="post" enctype="multipart/form-data"
              id="add_record_form">
            <input type="hidden" name="original_image" value="<?php echo $records['image']; ?>" />
            <input type="hidden" name="record_id"
                   value="<?php echo $records['recordID']; ?>">

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
            <input type="input" name="name"
                   value="<?php echo $records['name']; ?>" id="name" onBlur="name_validation();"/><span id="name_err"></span>
            <br>

            <label>Description:</label>
            <input type="input" name="description"
                   value="<?php echo $records['description']; ?>"id="description" onBlur="description_validation();"/></textarea><span id="desc_err"></span>
            <br>

            <label>Image:</label>
            <input type="file" name="image" accept="image/*" />
            <br>            
            <?php if ($records['image'] != "") { ?>
            <p><img src="image_uploads/<?php echo $records['image']; ?>" height="150" /></p>
            <?php } ?>
            
            <label>&nbsp;</label>
            <input type="submit" value="Save Changes" style="cursor:not-allowed">
            <br>
        </form>
        <p><a href="index.php">View Homepage</a></p>
    <?php
include('includes/footer.php');
?>