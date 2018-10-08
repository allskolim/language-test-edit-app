<?php

$mysqli = new mysqli("localhost", "root", "", "euro_test");

// Check connection
if($mysqli === false){
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}
 
// Attempt select query execution
$sql = "SELECT * FROM angielski";
if($result = $mysqli->query($sql)){
    if($result->num_rows > 0){
        echo "<div class='table-responsive'>";
        echo "<table class='table table-dark table-striped table-bordered'>";
            echo "<tr>";
                echo "<th scope='col'>ID</th>";
                echo "<th scope='col'>Content</th>";
                echo "<th scope='col'>Answer A</th>";
                echo "<th scope='col'>Answer B</th>";
                echo "<th scope='col'>Answer C</th>";
                echo "<th scope='col'>Answer D</th>";
                echo "<th scope='col'>Correct Answer</th>";
            echo "</tr>";
        while($row = $result->fetch_array()){
            echo "<tr>";
                echo "<th scope='row'>".$row['question_id']."</th>";
                echo "<td>" . $row['question_content'] . "</td>";
                echo "<td>" . $row['question_answer_1'] . "</td>";
                echo "<td>" . $row['question_answer_2'] . "</td>";
                echo "<td>" . $row['question_answer_3'] . "</td>";
                echo "<td>" . $row['question_answer_4'] . "</td>";
                echo "<td>" . $row['question_correct'] . "</td>";
             echo "</tr>";
        }
        echo "</table>";
        echo "</div>";
        // Free result set
        $result->free();
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
}
 
// Close connection
$mysqli->close();
?>

