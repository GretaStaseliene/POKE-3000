<?php
include('functions.php');

if (!empty($_POST)) {

    $user_name = validate($_POST['user_name']);
    $first_name = validate($_POST['first_name']);
    $last_name = validate($_POST['last_name']);
    $email = validate($_POST['email']);
    $password = validate(md5($_POST['password']));

    $params = [
        'page' => 'login',
        'message' => 'Vartotojas užregistruotas. Prisijunkite',
        'status' => 'success'
    ];

    if ($db->query(
        vsprintf(
            "INSERT INTO users (user_name, first_name, last_name, email, password) VALUES ('%s', '%s', '%s', '%s', '%s')",
            [$user_name, $first_name, $last_name, $email, $password]
        )

    )) {
        header('Location: ?' . http_build_query($params));
    }
}

?>

<form method="POST" class="signup">
    <h2 class="text-uppercase fw-normal">Registracija</h2>

    <div class="mb-3">
        <label>Prisijungimo vardas</label>
        <input type="text" name="user_name" class="form-control" required />
    </div>
    <div class="mb-3">
        <label>Vardas</label>
        <input type="text" name="first_name" class="form-control" required />
    </div>
    <div class="mb-3">
        <label>Pavardė</label>
        <input type="text" name="last_name" class="form-control" required />
    </div>
    <div class="mb-3">
        <label>El. paštas</label>
        <input type="email" name="email" class="form-control" required />
    </div>
    <div class="mb-3">
        <label>Slaptažodis</label>
        <input type="password" name="password" class="form-control" required />
    </div>
    <div class="mb-3">
        <label>Slaptažodio pakartojimas</label>
        <input type="password" class="form-control" required />
    </div>

    <button class="btn btn-primary">Registruotis</button>
</form>