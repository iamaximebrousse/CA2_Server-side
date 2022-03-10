<?php
// Get the category data
$name = $name = filter_input(INPUT_POST, 'software');

// Validate inputs
if ($name == null) {
    $error = "Invalid software data. Check all fields and try again.";
    include('error.php');
} else {
    require_once('database.php');

    // Add the product to the database
    $query = "INSERT INTO software (softwareName)
              VALUES (:name)";
    $statement = $db->prepare($query);
    $statement->bindValue(':name', $name);
    $statement->execute();
    $statement->closeCursor();

    // Display the Category List page
    include('software_list.php');
}
?>