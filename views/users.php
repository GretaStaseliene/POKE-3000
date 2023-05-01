<?php

// $file = fopen('users.csv', 'r');

// while (($data = fgetcsv($file, 1000, ',')) !== false) {
//     $id = $data[0];
//     $first_name = $data[1];
//     $last_name = $data[2];
//     $email = $data[3];
//     $password = bin2hex(random_bytes(8));
//     $hashed_password = md5($password);

//     $query = "INSERT INTO users (first_name, last_name, email, password) VALUES ('$first_name', '$last_name', '$email', '$hashed_password')";

//     $db->query($query);
// }

// fclose($file);


if(isset($_POST['send_email'])) {
    $to = 'gretatamasauskait3@gmail.com';
    $subject = 'POKE-3000';
    $message = $_SESSION['user_name'] . 'Jus papokino';

    mail($to, $subject, $message);
}


$result = $db->query("SELECT * FROM users");
$users = $result->fetch_all(MYSQLI_ASSOC);

?>

<div class="users">
    <h2 class="text-uppercase fw-normal">Vartotojai</h2>

    <div class="container-fluid">
        <form class="d-flex" role="search">
            <input class="form-control mb-4" name="live_search" id="live_search" type="search" placeholder="Ieškoti pagal vardą">
            <!-- <div id="search_result"></div> -->
        </form>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>Vardas</th>
                <th>Pavardė</th>
                <th>El. paštas</th>
                <th>Poke skaičius</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user) : ?>
                <tr>
                    <td><?= $user['first_name']; ?></td>
                    <td><?= $user['last_name']; ?></td>
                    <td><?= $user['email']; ?></td>
                    <td><span id="value" value="counter"></span></td>
                    <td><form method="post"><input type="submit" name="send_email" class="btn btn-primary" id="submit" value="POKE"></input></form></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<script>
    // $(document).ready(function() {
    //     $("#live_search").keyup(function() {
    //         var query = $(this).val();

    //         $.ajax({
    //             url: 'search.php',
    //             method: 'POST',
    //             data: {
    //                 query: query
    //             },
    //             success: function(data) {
    //                 $('#search_result').html(data);  
    //             }
    //         });
    //     });
    // });
</script>