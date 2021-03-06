<?php
require_once('database.php');

// Get category ID
if (!isset($category_id)) {
    $category_id = filter_input(INPUT_GET, 'category_id', FILTER_VALIDATE_INT);

    if ($category_id == NULL || $category_id == FALSE) {
        $category_id = 1;
    }
}

// Get name for current category
$queryCategory = "SELECT * FROM categories
WHERE categoryID = :category_id";
    $statement1 = $db->prepare($queryCategory);
    $statement1->bindValue(':category_id', $category_id);
    $statement1->execute();
    $category = $statement1->fetch();
    $statement1->closeCursor();
    $category_name = $category["categoryName"];

// Get all categories
$queryAllCategories = 'SELECT * FROM categories
ORDER BY categoryID';
    $statement2 = $db->prepare($queryAllCategories);
    $statement2->execute();
    $categories = $statement2->fetchAll();
    $statement2->closeCursor();

// Get all softwares
$queryAllsoftwares = 'SELECT * FROM software
ORDER BY softwareID';
    $statement4 = $db->prepare($queryAllsoftwares);
    $statement4->execute();
    $softwares = $statement4->fetchAll();
    $statement4->closeCursor();

// Get records for selected category
$queryRecords = "SELECT * FROM records, software
WHERE categoryID = :category_id and software.softwareID = records.softwareID
ORDER BY recordID";
    $statement3 = $db->prepare($queryRecords);
    $statement3->bindValue(':category_id', $category_id);
    $statement3->execute();
    $records = $statement3->fetchAll();
    $statement3->closeCursor();
?>
<div class="container">
    <?php include('includes/header.php'); ?>

    <div>
        <nav>
            <?php foreach ($categories as $category) : ?>
                <article>
                    <a href="backoffice.?category_id=<?php echo $category['categoryID']; ?>"> <?php echo $category["categoryName"]; ?> </a>
                </article>
                    <?php endforeach; ?>
        </nav>    
    </div>
</header>
<section>
<!-- display a table of records -->
    <h2><?php echo $category_name; ?></h2>
    <table>
        <tr>
            <th>Image</th>
            <th>Name</th>
            <th>Description</th>
            <th>Software</th>
            <th>Delete</th>
            <th>Edit</th>
        </tr>
        <?php foreach ($records as $record) : ?>
        <tr>
            <td>
                <img src="image_uploads/<?php echo $record['image']; ?>" width="100px" height="100px" />
            </td>
            <td>
                <b>
                    <?php echo $record['name']; ?>
                </b>
            </td>
            <td>
                <?php echo $record['description']; ?>
            </td>
            <td class="right">
                <?php echo $record['softwareName']; ?>
            </td>
            <td>
                <form action="delete_record.php" method="post" id="delete_record_form">
                    <input type="hidden" name="record_id"value="<?php echo $record['recordID']; ?>">
                    <input type="hidden" name="category_id"value="<?php echo $record['categoryID']; ?>">
                    <input type="submit" value="Delete">
                </form>
            </td>
            <td>
                <form action="edit_record_form.php" method="post"id="delete_record_form">
                    <input type="hidden" name="record_id"value="<?php echo $record['recordID']; ?>">
                    <input type="hidden" name="category_id" value="<?php echo $record['categoryID']; ?>">
                    <input type="submit" value="Edit">
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
   <article class="btm">
        <p>
            <a href="index.php">Home</a>
        </p>
        <p>
            <a href="add_record_form.php">Add Record</a>
        </p>
        <p>
            <a href="category_list.php">Manage Categories</a>
        </p>
        <p>
            <a href="software_list.php">Manage Softwares</a>
        </p>
    </article>
</section>
<?php include('includes/footer.php'); ?>