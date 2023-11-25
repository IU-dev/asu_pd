<?php

require_once 'includes/global.inc.php';
$page = "practises.php";
require_once 'includes/header.inc.php';

if (!isset($_SESSION['logged_in'])) {
    header("Location: login.php");
}

$user = unserialize($_SESSION['user']);

?>
<html lang="ru">
<head>
    <title>Практики | <?php echo $pname; ?></title>
</head>
<body>
<h3>Практики, доступные в системе</h3>

<table class="table table-bordered table-hover">
    <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Наименование</th>
          <th scope="col">Организатор</th>
          <th scope="col">Даты</th>
          <th scope="col">Рубежи</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $a = Practise::GetAllPractises();
            foreach($a as $p){
                echo '<tr>';
                echo '<td>'.$p->id.'</td>';
                echo '<td>'.$p->name.'</td>';
                echo '<td>'.$p->organiser->fio(false).'</td>';
                echo '<td>'.$p->date_start->format('d.m.Y H:i:s').'<br>'.$p->date_finish->format('d.m.Y H:i:s').'</td>';
                echo '<td><ul>';
                foreach($p->deadlines() as $k)
                {
                    echo '<li><strong>'.$k->name.'</strong><br><small>'.$k->description.'</small><br>Баллы: '.$k->points.'<br>Дедлайн: '.$k->deadline->format('d.m.Y H:i:s').'</li>';
                }
                echo '</td></ul></tr>';
            }
        ?>
    </tbody>
</table>

<?php require_once 'includes/footer.inc.php'; ?>

<script>
    $(document).ready(function () {
        $('#dtBasicExample').DataTable();
        $('.dataTables_length').addClass('bs-select');
    });
</script>
</body>
</html>