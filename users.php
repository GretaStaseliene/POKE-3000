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

$result = $db->query("SELECT * FROM users");
$users = $result->fetch_all(MYSQLI_ASSOC);

?>

<div class="users">
    <h2 class="text-uppercase fw-normal">Vartotojai</h2>

    <table class="table">
        <thead>
            <tr>
                <th>Vardas</th>
                <th>Pavardė</th>
                <th>El. paštas</th>
                <th>Poke skaičius</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user) : ?>
                <tr>
                    <td><?= $user['first_name']; ?></td>
                    <td><?= $user['last_name']; ?></td>
                    <td><?= $user['email']; ?></td>
                    <td>0</td>
                    <td><button class="btn btn-primary">Poke</button></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>