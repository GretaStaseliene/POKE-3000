<?php

if (!empty($_POST)) {
    $user_name = $_POST['user_name'];
    $password = md5($_POST['password']);

    $params = [
        'page' => './',
        'message' => 'Toks vartotojas nerastas',
        'status' => 'danger'
    ];
    
    $query = "SELECT * FROM users WHERE user_name='$user_name' AND password='$password'";
    $result = mysqli_query($db, $query);

    if ($result->num_rows === 0) {
        header('Location: ?' . http_build_query($params));
        exit;
    } else {
        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);

            if ($row['user_name'] === $user_name && $row['password'] === $password) {
                $_SESSION['user_name'] = $row['user_name'];
                $_SESSION['name'] = $row['name'];
                $_SESSION['id'] = $row['id'];

                header('Location: ?page=users');
                exit();
            }
        }
    }
}


if (isset($_GET['page']) && $_GET['page'] == 'register') {
    header('Location: ?page=register');
    exit;
}

?>

<?php if (isset($_GET['message'])) : ?>
    <div class="alert alert-<?= $_GET['status']; ?>"><?= $_GET['message'] ?></div>
<?php endif; ?>
<div class="login">
    <form method="POST">
        <h1 class="text-uppercase fw-normal">Prisijungimas</h1>
        <div class="mb-3">
            <input type="text" name="user_name" placeholder="Prisijungimo vardas" class="form-control" />
        </div>
        <div class="mb-3">
            <input type="password" name="password" class="form-control" placeholder="Slaptažodis" />
        </div>
        <div class="d-flex justify-content-between">
            <button class="btn btn-success">Prisijungti</button>
            <a href="?page=register" class="btn btn-primary">Registruotis</a>
        </div>
    </form>
</div>