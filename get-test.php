<?php

require ('db-settings.php');

$lang = $_POST['lang'];
$mysqli = new mysqli($host, $user, $pass, $dbName);
if(isset($_POST['rangeMod'])): $range = $_POST['rangeMod']; else: $range = 0; endif;
// Check connection
if($mysqli === false){
die("ERROR: Could not connect. " . $mysqli->connect_error);
}

// Count rows
$sql = "SELECT * FROM ".$lang;
if($result = $mysqli->query($sql)):
if($result->num_rows > 0):
$pages = ceil(($result->num_rows) / 10); ?>
        <nav id="pagination-nav">
            <ul class="pagination pagination-nav">
                <li class="page-item pagination-nav__page-item"><a class="page-link pagination-nav__a--prev bg-info border-dark text-light">Previous</a></li>
                <?php for ($i = 1; $i <= $pages; $i++): ?>
                <li id="page_<?= $i ?>" class="page-item pagination-nav__page-item pageNo"><a class="page-link pagination-nav__a" data-modifier="<?=($i - 1) * 10 ?>"><?= $i ?></a></li>
                <?php endfor; ?>
                <li class="page-item pagination-nav__page-item"><a class="page-link pagination-nav__a--next bg-info border-dark text-light">Next</a></li>
            </ul>
        </nav>
<?php $result->free();
endif;
endif;
// Select 1st Page (10 entries)
$sql = "SELECT * FROM ".$lang." LIMIT 10 OFFSET ".$range;
if($result = $mysqli->query($sql)){
if($result->num_rows > 0){
$model['data'] = $result->fetch_all(); ?>
<div class='table-responsive align-items-center justify-content-center container-fluid'>
    <table id="test-<?= $lang ?>-questions" class='table table-dark table-striped table-bordered' data-pages="<?= $pages ?>">
        <tr>
            <th class='align-middle text-center' scope='col'>No.</th>
            <th class='align-middle text-center' scope='col'>Content</th>
            <th class='align-middle text-center' scope='col'>Answer A</th>
            <th class='align-middle text-center' scope='col'>Answer B</th>
            <th class='align-middle text-center' scope='col'>Answer C</th>
            <?php if ($lang == 'angielski'): ?><th class='align-middle text-center' scope='col'>Answer D</th><?php endif; ?>
            <th class='correct-answer align-middle text-center' scope='col'>Correct Answer</th>
            <th class='align-middle text-center' scope='col'>Akcje</th>
        </tr>
        
        <?php foreach ($model['data'] as $index => $row): ?>
        
        <?php $index++; ?>
        <tr id="<?= $row['0'] ?>">
            <th class='align-middle text-center' scope='row'><?= $index + $range ?></th>
            <td class="align-middle text-center"><?= $row[2] ?></td>
            <td class="align-middle text-center"><?= $row[3] ?></td>
            <td class="align-middle text-center"><?= $row[4] ?></td>
            <td class="align-middle text-center"><?= $row[5] ?></td>
            <td class="align-middle text-center"><?= $row[6] ?></td>
            <?php if ($lang == 'angielski'): ?>
            <td class="align-middle text-center"><?= $row[7] ?></td>
            <?php endif; ?>
            <td class="align-middle text-center">
                <button id="edit_<?= $row['0'] ?>" class="edit-button btn btn-sm btn-light mb-2 w-100">Edytuj</button>
                <button id="delete_<?= $row['0'] ?>" class="delete-button btn btn-sm btn-danger w-100" data-toggle='modal' data-target="#deletionConfirmAlert">Usuń</button>
                <button id="save_<?= $row['0'] ?>" class="save-button btn btn-sm btn-success mb-2 w-100" style="display: none;">Zapisz</button>
                <button id="cancel_<?= $row['0'] ?>" class="cancel-button btn btn-sm btn-danger w-100" style="display: none;">Anuluj</button>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>
<?php
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
