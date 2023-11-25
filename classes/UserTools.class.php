<?php

//UserTools.class.php
require_once 'User.class.php';
require_once 'DB.class.php';
require_once 'Tools.class.php';

class UserTools
{
    public function login($username, $password)
    {
        $tool = new Tools();
        $db = new DB();
        $connection = $db->connect_get();
        $hashedPassword = md5($password);
        $result = mysqli_query($connection, "SELECT * FROM users WHERE username = '$username' AND 
			password = '$hashedPassword'");
        if (mysqli_num_rows($result) == 1) {
            $data = mysqli_fetch_assoc($result);
            $_SESSION["user"] = serialize(new User($data));
            date_default_timezone_set("GMT");
            $_SESSION["login_time"] = time();
            date_default_timezone_set($tool->getGlobal('tz'));
            $_SESSION["logged_in"] = 1;
            return 1;
        } else {
            return 0;
        }
    }

    public function logout()
    {
        $db = new DB();
        unset($_SESSION['user']);
        unset($_SESSION['login_time']);
        unset($_SESSION['logged_in']);
        session_destroy();
        header("Location: index.php");
    }

    public function checkUsernameExists($username)
    {
        $db = new DB();
        $connection = $db->connect_get();
        $result = mysqli_query($connection, "select id from users where username='" . $username . "'");
        if (mysqli_num_rows($result) == 0) {
            return false;
        } else {
            return true;
        }
    }

    public function get($id)
    {
        $db = new DB();
        $connection = $db->connect_get();
        $result = $db->select('users', "id = $id");
        return new User($result);
    }

    public function fio($id, $rid = true){
        $db = new DB();
        $connection = $db->connect_get();
        $result = $db->select('users', "id = $id");
        if ($rid) return '('.$result['id']. ') '. $result['f'].' '.$result['i'].' '.$result['o'];
        else return $result['f'].' '.$result['i'].' '.$result['o'];
    }
}

?>