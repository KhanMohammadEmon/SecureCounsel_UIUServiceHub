<?php
// Establish database connection
include '../sqlCommands/connectDb.php';

// Check connection
if ($sql->connect_error) {
    die("Connection failed: " . $sql->connect_error);
}

// Check if ID is provided via GET method
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Delete record from the database
    $r1 = "DELETE FROM IP WHERE ID = $id";

    if ($sql->query($r1) === TRUE) {
        // Redirect back to the index page after successful deletion
        header("Location: IP.php");
        exit();
    } else {
        echo "Error deleting record: " . $sql->error;
    }
} else {
    echo "ID parameter is missing.";
}

$conn->close();
?>
