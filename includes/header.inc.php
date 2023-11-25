<?php $user = unserialize($_SESSION['user']);
?>



<div class="dropdown position-fixed bottom-0 end-0 mb-3 me-3 bd-mode-toggle">
    <button class="btn btn-bd-primary py-2 dropdown-toggle d-flex align-items-center"
        id="bd-theme"
        type="button"
        aria-expanded="false"
        data-bs-toggle="dropdown"
        aria-label="Toggle theme (auto)">
        <svg class="bi my-1 theme-icon-active" width="1em" height="1em"><use href="#circle-half"></use></svg>
            <span class="visually-hidden" id="bd-theme-text">Toggle theme</span>
    </button>
    <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="bd-theme-text">
        <li>
            <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="light" aria-pressed="false">
                <svg class="bi me-2 opacity-50 theme-icon" width="1em" height="1em"><use href="#sun-fill"></use></svg>
                    Светлая
                <svg class="bi ms-auto d-none" width="1em" height="1em"><use href="#check2"></use></svg>
            </button>
        </li>
        <li>
            <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="dark" aria-pressed="false">
                <svg class="bi me-2 opacity-50 theme-icon" width="1em" height="1em"><use href="#moon-stars-fill"></use></svg>
                Темная
                <svg class="bi ms-auto d-none" width="1em" height="1em"><use href="#check2"></use></svg>
            </button>
        </li>
        <li>
            <button type="button" class="dropdown-item d-flex align-items-center active" data-bs-theme-value="auto" aria-pressed="true">
                <svg class="bi me-2 opacity-50 theme-icon" width="1em" height="1em"><use href="#circle-half"></use></svg>
                Авто
                <svg class="bi ms-auto d-none" width="1em" height="1em"><use href="#check2"></use></svg>
            </button>
        </li>
    </ul>
</div>

<!---
<header class="p-3 mb-0 border-bottom">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a href="" class ="nav-link <?php echo($section == "main" ? "link-body-emphasis" : "link-secondary"); ?>">Главная</a></li>
                <?php if (isset($user->username)) : ?>
                <li><a href="#" class="nav-link <?php echo($section == "lk" ? "link-body-emphasis" : "link-secondary"); ?>">Личный кабинет</a></li>
                <li><a href="#" class="nav-link <?php echo($section == "projects" ? "link-body-emphasis" : "link-secondary"); ?>">Проекты</a></li>
                <?php endif ?>
            </ul>
            <div class="d-flex justify-content-center mb-2">
                <?php if (isset($user->username)) : ?>
                    <a href="logout.php" class="btn btn-primary">Выйти</a>
                <?php else : ?>
                    <a href="login.php" class="btn btn-primary">Войти</a>
                <?php endif ?>
            </div>
        </div>
    </div>
</header>
--->

<div class="container min-vw-100">
    <div class="row min-vw-100">
        <div class="col-2 d-flex flex-nowrap flex-column flex-shrink-0 p-2 bg-body-tertiary min-vh-100">
            <ul class="nav nav-pills flex-column mb-auto">
                    <li class="nav-item">
                        <a href="index.php" class="nav-link <?php echo($page == "index.php" ? "active" : ""); ?>" aria-current="page">
                            Главная
                        </a>
                        <?php if (isset($user->username)) : ?>
                        <a href="practises.php" class="nav-link <?php echo($page == "practises.php" ? "active" : ""); ?>" aria-current="page">
                            Практики
                        </a>
                        <a href="projects.php" class="nav-link <?php echo($page == "projects.php" ? "active" : ""); ?>" aria-current="page">
                            Мои проекты
                        </a>
                        <?php endif ?>
                    </li>
                    <?php if (isset($user->username)) : ?>
                    <li class="nav-item">
                        <a href="logout.php" class="nav-link <?php echo($page == "logout.php" ? "active" : ""); ?>" aria-current="page">
                            Выход
                        </a>
                    </li>
                    <?php else : ?>
                    <li class="nav-item">
                        <a href="login.php" class="nav-link <?php echo($page == "login.php" ? "active" : ""); ?>" aria-current="page">
                            Вход
                        </a>
                    </li>
                    <?php endif ?>
            </ul>
        </div>
        <div class="col-10"> 

