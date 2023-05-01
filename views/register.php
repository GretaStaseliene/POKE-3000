<?php
include('functions.php');
$errors = array();


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $user_name = validate($_POST['user_name']);
    $first_name = validate($_POST['first_name']);
    $last_name = validate($_POST['last_name']);
    $email = validate($_POST['email']);
    $password = validate(md5($_POST['password']));

    $u_n = "SELECT user_name FROM users WHERE user_name = '$user_name'";
    $u_r = mysqli_query($db, $u_n);

    if (empty($user_name)) {
        $errors['user_name_invalid'] = 'Įveskite vartotojo vardą';
    } else if(mysqli_num_rows($u_r) > 0) {
        $errors['user_name_invalid'] = 'Toks vartotojo vardas jau egzistuoja';
    }

    if (empty($first_name)) {
        $errors['first_name_invalid'] = 'Įveskite savo vardą';
    }

    if (empty($last_name)) {
        $errors['last_name_invalid'] = 'Įveskite pavardę';
    }

    if (empty($email)) {
        $errors['email_invalid'] = 'Įveskite vartotojo el. paštą';
    }

    if (empty($password)) {
        $errors['password_invalid'] = 'Įveskite slaptažodį';
    }

    if (count($errors) == 0) {
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
}
?>

<!-- <?php if (count($errors) > 0) { ?>
    <div class="alert alert-danger">
        <ul class="mb-0">
            <?php
            foreach ($errors as $error) {
                echo "<li class='list-style'>$error</li>";
            }
            ?>
        </ul>
    </div>
<?php } ?> -->
<form method="POST" class="signup">
    <h2 class="text-uppercase fw-normal">Registracija</h2>

    <div class="mb-3">
        <label>Prisijungimo vardas</label>
        <input type="text" name="user_name" class="form-control" />
        <p class="text-danger"><?php if(isset($errors['user_name_invalid'])) echo $errors['user_name_invalid']; ?></p>
    </div>
    <div class="mb-3">
        <label>Vardas</label>
        <input type="text" name="first_name" class="form-control" />
        <p class="text-danger"><?php if(isset($errors['first_name_invalid'])) echo $errors['first_name_invalid']; ?></p>
    </div>
    <div class="mb-3">
        <label>Pavardė</label>
        <input type="text" name="last_name" class="form-control" />
        <p class="text-danger"><?php if(isset($errors['last_name_invalid'])) echo $errors['last_name_invalid']; ?></p>
        
    </div>
    <div class="mb-3">
        <label>El. paštas</label>
        <input type="email" name="email" class="form-control" />
        <p class="text-danger"><?php if(isset($errors['email_invalid'])) echo $errors['email_invalid']; ?></p>
        
    </div>
    <div class="mb-3">
        <label>Slaptažodis</label>
        <input type="password" name="password" class="form-control" />
        <p class="text-danger"><?php if(isset($errors['password_invalid'])) echo $errors['password_invalid']; ?></p>
        
    </div>
    <div class="mb-3">
        <label>Slaptažodio pakartojimas</label>
        <input type="password" class="form-control" />
        <p class="text-danger"><?php if(isset($errors['re_password_invalid'])) echo $errors['re_password_invalid']; ?></p>
    </div>

    <button class="btn btn-primary" name="submit">Registruotis</button>
</form>