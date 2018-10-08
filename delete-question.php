<?php

require ('db-settings.php');

$lang = $_POST['lang'];

$mysqli = new mysqli($host, $user, $pass, $dbName);
 
// Check connection
if($mysqli === false){
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}
 
// Attempt deletion
$sql = "DELETE FROM ".$_GET['lang']." WHERE question_id=".$_GET['id'];
if ($mysqli->query($sql) === true){
    echo "Records were deleted successfully.";
} else{
    echo "ERROR: Was not able to execute $sql. " . $mysqli->error;
}

 
// Close connection
$mysqli->close();
?>
