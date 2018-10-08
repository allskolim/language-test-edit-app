<?php
require ('db-settings.php');

$lang = $_POST['lang'];

$newVal = array(
"id" => $_POST['id'],
"content" => $_POST['question_content'],
"a1" => $_POST['question_answer_1'],
"a2" => $_POST['question_answer_2'],
"a3" => $_POST['question_answer_3'],
"correct" => $_POST['question_correct']
);

if ($lang === angielski) {
	$newVal['a4'] = $_POST['question_answer_4'];
}

$mysqli = new mysqli($host, $user, $pass, $dbName);
 
// Check connection
if($mysqli === false){
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}
 
// Attempt update query execution
if ($lang === 'angielski') {
	$sql = "UPDATE angielski SET question_content='".$newVal['content']."', question_answer_1='".$newVal['a1']."', question_answer_2='".$newVal['a2']."', question_answer_3='".$newVal['a3']."', question_answer_4='".$newVal['a4']."', question_correct='".$newVal['correct']."' WHERE id=".$_POST['id'];
} else {
	$sql = "UPDATE angielski SET question_content='".$newVal['content']."', question_answer_1='".$newVal['a1']."', question_answer_2='".$newVal['a2']."', question_answer_3='".$newVal['a3']."', question_correct='".$newVal['correct']."' WHERE id=".$_POST['id'];
}


if($mysqli->query($sql) === true){
    echo "Records were updated successfully.";
} else{
    echo "ERROR: Was not able to execute $sql. " . $mysqli->error;
}
 
// Close connection
$mysqli->close();
?>