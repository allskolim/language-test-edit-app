<?php

require ('db-settings.php');

$lang = $_POST['lang'];

$mysqli = new mysqli($host, $user, $pass, $dbName);

// Check connection
if($mysqli === false){
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}
// Attempt select query execution
$sql = "SELECT * FROM ".$lang;
if($result = $mysqli->query($sql)){
    if($result->num_rows > 0){
        $model['data'] = $result->fetch_all(); ?>
        <div class='table-responsive align-items-center justify-content-center'>";
        <table class='table table-dark table-striped table-bordered'>";
        <tr>
                <th class='align-middle text-center' scope='col'>No.</th>
                <th class='align-middle text-center' scope='col'>Content</th>
                <th class='align-middle text-center' scope='col'>Answer A</th>
                <th class='align-middle text-center' scope='col'>Answer B</th>
                <th class='align-middle text-center' scope='col'>Answer C</th>
                <?php if ($lang == 'angielski'): ?><th class='align-middle text-center' scope='col'>Answer D</th><?php endif; ?>
                <th class='align-middle text-center' scope='col'>Correct Answer</th>
                <th class='align-middle text-center' scope='col'>Akcje</th>
            </tr>

        <?php foreach ($model['data'] as $index => $row): ?>
            <?php $index++; ?>
            <tr id="<?= $row['id'] ?>">
            <th class='align-middle text-center' scope='row'><?= $index ?></th>
            <td class="align-middle text-center"><?= $row['question_content'] ?></td>
            <td class="align-middle text-center"><?= $row['question_answer_1'] ?></td>
            <td class="align-middle text-center"><?= $row['question_answer_2'] ?></td>
            <td class="align-middle text-center"><?= $row['question_answer_3'] ?></td>
            <td class="align-middle text-center"><?= $row['question_answer_4'] ?></td>
            <td class="align-middle text-center"><?= $row['question_correct'] ?></td>
            <td class="align-middle text-center">
                <button id="edit_<?= $row['id'] ?>" class="edit-button btn btn-sm btn-light mb-2 w-100">Edytuj</button>
                <button id="delete_<?= $row['id'] ?>" class="delete-button btn btn-sm btn-danger mb-2 w-100" data-toggle='modal' data-target="#deletionConfirmAlert">Usuń</button>
                <button id="save_<?= $row['id'] ?>" class="save-button btn btn-sm btn-success mb-2 w-100" style="display: none;">Zapisz</button>
                <button id="cancel_<?= $row['id'] ?>" class="cancel-button btn btn-sm btn-danger mb-2 w-100" style="display: none;">Anuluj</button>
            </td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>
        $i = 1;
        while($row = $result->fetch_array()){
            echo "<tr id='".$row['id']."'>";
                echo "<th class='align-middle text-center' scope='row'>".$i."</th>";
                echo "<td class='question-content align-middle text-center'>" . $row['question_content'] . "</td>";
                echo "<td class='question_answer_1 align-middle text-center'>" . $row['question_answer_1'] . "</td>";
                echo "<td class='question_answer_2 align-middle text-center'>" . $row['question_answer_2'] . "</td>";
                echo "<td class='question_answer_3 align-middle text-center'>" . $row['question_answer_3'] . "</td>";
                if ($lang == 'angielski') { echo "<td class='question_answer_4 align-middle text-center'>" . $row['question_answer_4'] . "</td>"; }
                echo "<td class='align-middle text-center'>" . $row['question_correct'] . "</td>";
                echo "<td class='align-middle text-center'><button id='edit_".$row['question_id']."' class='edit-button btn btn-sm btn-light mb-2 w-100'>Edytuj</button><input type='submit' id='save".$row['question_id']."' class='save-button btn btn-sm btn-success mb-2 w-100' style='display: none;' value='Zapisz'></input><button id='delete_".$row['question_id']."' data-toggle='modal' data-target='#deletionConfirmAlert' class='delete-button btn btn-sm btn-danger w-100'>Usuń</button></td>";
             echo "</tr>";
             $i++;
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