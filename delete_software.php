<?php
// Get ID
$software_id = filter_input(INPUT_POST, 'software_id', FILTER_VALIDATE_INT);

// Validate inputs
if ($software_id == null || $software_id == false) {
    $error = "Invalid software ID.";
    include('error.php');
} else {
    require_once('database.php');

    // Add the product to the database  
    $query = 'DELETE FROM software 
              WHERE softwareID = :software_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':software_id', $software_id);
    $statement->execute();
    $statement->closeCursor();

    // Display the software List page
    include('software_list.php');
}
?>
