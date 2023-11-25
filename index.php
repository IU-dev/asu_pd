<?php
//index.php 
require_once 'includes/global.inc.php';
$page = "index.php";
$section = "main";
require_once 'includes/header.inc.php';
?>
<html>
<head>
    <title>Главная | <?php echo $pname; ?></title>
    <?php require_once 'includes/footer.inc.php'; ?>
</head>
<body>
<center>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>АСУ проектной деятельностью</h1>
                <h3><?php echo $tool->getGlobal('org') ?></h3>
                <br>
                <?php if(isset($_SESSION['logged_in'])) : ?>
                    Здравствуйте, <?php echo $user->fio(false); ?>
                <?php endif ?>
            </div>
        </div>
    </div>
    <br><br>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body"><h4 class="card-title">Витрина проектов</h4>
                        <hr>
                        <p class="card-text">Посмотреть публичную витрину проектов, разработанных студентами</p>
                        <hr>
                        <a href="#" class="black-text d-flex justify-content-end"><h5>Перейти <i
                                        class="fas fa-angle-double-right"></i></h5></a></div>
                </div>
                <br>
            </div>
            <?php if(!isset($_SESSION['logged_in'])) : ?>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body"><h4 class="card-title">Вход</h4>
                        <hr>
                        <p class="card-text">Войти в АСУ</p>
                        <hr>
                        <a href="login.php" class="black-text d-flex justify-content-end"><h5>Перейти <i
                                        class="fas fa-angle-double-right"></i></h5></a></div>
                </div>
                <br>
            </div>
            <?php else : ?>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body"><h4 class="card-title">Выход</h4>
                            <hr>
                            <p class="card-text">Выйти из АСУ</p>
                            <hr>
                            <a href="logout.php" class="black-text d-flex justify-content-end"><h5>Перейти <i
                                            class="fas fa-angle-double-right"></i></h5></a></div>
                    </div>
                    <br>
                </div>
            <?php endif ?>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body"><h4 class="card-title">Новости системы</h4>
                        <hr>
                        <p class="card-text">Ознакомиться с изменениями в системе и новостями АСУ</p>
                        <hr>
                        <a href="#" class="black-text d-flex justify-content-end"><h5>Перейти <i
                                        class="fas fa-angle-double-right"></i></h5></a></div>
                </div>
                <br>
            </div>
        </div>
    </div>
    <!---
    <br>
    <h3>Новости системы:</h3>
    <div class="row">
        <?php
    $news = $db->select_desc_fs_news("news", "display = '1'");
    foreach ($news as $article) {
        echo '<div class="col-md-4"><div class="card"><div class="view overlay">';
        echo '</div>';
        echo '<div class="card-body"><h4 class="card-title">' . $article['header'] . '</h4><hr>';
        echo '<p class="card-text">' . $article['text'] . '</p>';
        echo '<hr>' . $article['footer'];
        echo '<a href="#!" class="black-text d-flex justify-content-end"><h5>Подробнее <i class="fas fa-angle-double-right"></i></h5></a></div></div></div>';
    }
    ?>
    </div>
    --->
</center>
</body>
</html>