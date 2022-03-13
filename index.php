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

if (isset($_GET['search']) AND !empty($_GET['search'])) {
        $query = htmlspecialchars($_GET['search']);
        $queryRecords = 'SELECT * FROM records, software
        WHERE software.softwareID = records.softwareID and name
        LIKE "%'.$query.'%" ORDER BY recordID';
}

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
                    <a href=".?category_id=<?php echo $category['categoryID']; ?>"> <?php echo $category["categoryName"]; ?> </a>
                </article>
                    <?php endforeach; ?>
        </nav> 
    </div>         
</header>

<form method="GET" action='index.php'>
    <input type="search" name="search" placeholder="Research...">
    <input type="submit" value="Submit">
</form>

<section>

<?php 
    if (isset($_GET['search']) AND !empty($_GET['search'])){
        ?> <h2>Search for : <?php echo $_GET['search'] ?></h2> <?php
    } else{
        echo "<h2>".$category_name."</h2>";
    }
?>
        <?php foreach ($records as $record) : ?>
            <article class="aff_rec">
                <div>
                    <img src="image_uploads/<?php echo $record['image']; ?>" width="100px" height="100px" />
                </div>
                <div>
                    <h3 class='name_proj'>
                        <?php echo $record['name']; ?>
                    </h3>
                    <h4 class="soft">
                        <?php echo $record['softwareName']; ?>
                    </h4>
                    <P class="desc">
                        <?php echo $record['description']; ?>
                    </P>
                </div>
            </article>

        <?php endforeach; ?>

            <article class="btm">
                <p>
                    <a href="backoffice.php">Backoffice</a>
                </p>
            </article>
        </section>
<?php include('includes/footer.php'); ?>