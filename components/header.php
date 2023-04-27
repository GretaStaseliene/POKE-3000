<header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom bg-primary">
    <a href="./" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
        <svg class="bi me-2" width="40" height="32">
            <use xlink:href="#bootstrap" />
        </svg>
        <?php if(!isset($_SESSION['id'])) { ?>
            <span class="fs-4 text-white">POKE-3000</span>
        <?php } else { ?>
            <span class="fs-4 text-white"><?= $_SESSION['user_name']; ?></span>
        <?php } ?>
    </a>

    <?php if(isset($_SESSION['id'])) { ?>
        <ul class="nav nav-pills">
            <li class="nav-item"><a href="#" class="nav-link text-white"><i class="fa-solid fa-hand-point-right fa-xl"></i></a></li>
            <li class="nav-item"><a href="?page=edit_user" class="nav-link text-white"><i class="fa-solid fa-user-large"></i></a></li>
            <li class="nav-item"><a href="?page=logout" class="nav-link text-white"><i class="fa-solid fa-right-from-bracket fa-xl"></i></a></li>
        </ul>
    <?php } ?>
</header>