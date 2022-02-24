<?php
// Get the category data
$name = $name = filter_input(INPUT_POST, 'name');
$brand = filter_input(INPUT_POST, 'softwareBrand');

// Validate inputs
if ($name == null) {
    $error = "Invalid software data. Check all fields and try again.";
    include('error.php');
} else {
    require_once('database.php');

    // Add the product to the database
    $query = "INSERT INTO software (softwareName, softwareBrand)
              VALUES (:name, :brand)";
    $statement = $db->prepare($query);
    $statement->bindValue(':name', $name);
    $statement->execute();
    $statement->closeCursor();

    // Display the Category List page
    include('software_list.php');
}
?>