<?php
require_once 'classes/User.class.php';
require_once 'classes/UserTools.class.php';
require_once 'classes/DB.class.php';
require_once 'classes/Tools.class.php';
require_once 'classes/Practise.class.php';
require_once 'classes/PractiseDeadline.php';
require_once 'includes/footer.inc.php';
//connect to the database
$db = new DB();
$db->connect();

//initialize UserTools object
$userTools = new UserTools();
//start the session

$tool = new Tools();

$pname = "АСУ ПД ИжГТУ";

session_start();
session_regenerate_id();

date_default_timezone_set($tool->getGlobal('tz'));

//refresh session variables if logged in
if (isset($_SESSION['logged_in'])) {
    $user = unserialize($_SESSION['user']);
    $_SESSION['user'] = serialize($userTools->get($user->id));
}
?>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<!-- Font Awesome -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
<script src="color-modes.js"></script>
<link href="bootstrap.min.css" rel="stylesheet">
<link href="main.css" rel="stylesheet">
