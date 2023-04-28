<?php
include('functions.php');

$currentUser = $_SESSION['id'];
$query = "SELECT * FROM users WHERE id = $currentUser";

$result = mysqli_query($db, $query);

// print_r($currentUser);

if(isset($_POST['edit_first_name']) || isset($_POST['edit_last_name']) || isset($_POST['edit_email'])) {
    $edited_first_name = validate($_POST['edit_first_name']);
    $edited_last_name = validate($_POST['edit_last_name']);
    $edited_email = validate($_POST['edit_email']);

    if ($db->query("UPDATE `users` SET `first_name` = '$edited_first_name', `last_name` = '$edited_last_name', `email` = '$edited_email' WHERE `id` = $currentUser")) {
        header('Location: ?page=users');
    }
}

?>

<form method="POST" class="edit">
    <h5 class="text-uppercase fw-bold">Redaguoti vartotojo informaciją</h5>

    <?php

    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            while ($user = mysqli_fetch_array($result)) { ?>

                <div class="mb-3">
                    <label>Prisijungimo vardas</label>
                    <input type="text" class="form-control" value="<?= $user['user_name']; ?>" readonly />
                </div>
                <div class="mb-3">
                    <label>Vardas</label>
                    <input type="text" name="edit_first_name" class="form-control" value="<?= $user['first_name']; ?>" />
                </div>
                <div class="mb-3">
                    <label>Pavardė</label>
                    <input type="text" name="edit_last_name" class="form-control" value="<?= $user['last_name']; ?>" />
                </div>
                <div class="mb-3">
                    <label>El. paštas</label>
                    <input type="email" name="edit_email" class="form-control" value="<?= $user['email']; ?>" />
                </div>
    <?php
                }
            }
        }
    ?>

    <button class="btn btn-primary">Redaguoti</button>
</form>