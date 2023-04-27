<?php

include('config.php');

session_start();

// try {
//     $db = new mysqli('localhost', 'root', '', 'poke-3000');
// } catch (Exception $error) {
//     echo '<h2>Nepavyko prisijungti prie duomenu bazes</h2>';
//     exit;
// }


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POKE-3000</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/styles.css">
</head>

<body>

    <?php include('components/header.php'); ?>

    <div class="container">
        <?php
            $page = isset($_GET['page']) ? $_GET['page'] : '';

            switch ($page) {
                case 'register':
                    include('views/register.php');
                    break;
                case 'login':
                    include('views/login.php');
                    break;
                case 'users':
                    include('users.php');
                    break;
                case 'edit_user':
                    include('views/edit_user.php');
                    break;
                case 'logout':
                    session_destroy();
                    if(isset($_GET['page']) && $_GET['page'] === 'logout') {
                        header('Location: ?page=login');
                    }
                    break;
                default:
                    include('views/login.php');
            }
        ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/7e62185a97.js" crossorigin="anonymous"></script>
</body>

</html>