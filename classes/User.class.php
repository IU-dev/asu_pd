<?php
//User.class.php

require_once 'DB.class.php';
require_once 'Tools.class.php';

/**
 * Класс пользователя системы
 */
class User
{
    public $id;
    public $username;
    public $hashedPassword;
    public $f;
    public $i;
    public $o;
    public $email;
    public $student_lk_id;

    function __construct($data)
    {
        $this->id = (isset($data['id'])) ? $data['id'] : "";
        $this->username = (isset($data['username'])) ? $data['username'] : "";
        $this->hashedPassword = (isset($data['password'])) ? $data['password'] : "";
        $this->email = (isset($data['email'])) ? $data['email'] : "";
        $this->f = (isset($data['f'])) ? $data['f'] : "";
        $this->i = (isset($data['i'])) ? $data['i'] : "";
        $this->o = (isset($data['o'])) ? $data['o'] : "";
        $this->student_lk_id = (isset($data['student_lk_id'])) ? $data['student_lk_id'] : "";
    }

    public static function GetUser($id)
    {
        $db = new DB();
        $data = $db->select('users', "id = '". $id . "'");
        return new User($data);
    }

    /**
     * Вернуть ФИО пользователя
     * @param $rid По умолчанию true - вернуть с ID в скобках перед ФИО. Иначе - вернуть ФИО без ID.
     * @return string Отформатированное ФИО пользователя
     */
    public function fio($rid = true){
        if($rid) return '('. $this->id . ') ' . $this->f . ' ' . $this->i . ' ' . $this->o;
        else return $this->f . ' ' . $this->i . ' ' . $this->o;
    }

    public function save($isNewUser = false)
    {
        $tool = new Tools();
        $db = new DB();
        if (!$isNewUser) {
            $data = array(
                "username" => "'$this->username'",
                "password" => "'$this->hashedPassword'",
                "email" => "'$this->email'",
                "f" => "'$this->f'",
                "i" => "'$this->i'",
                "o" => "'$this->o'",
                "student_lk_id" => "'$this->student_lk_id'"
            );

            $db->update($data, 'users', 'id = ' . $this->id);
        } else {
            $data = array(
                "username" => "'$this->username'",
                "password" => "'$this->hashedPassword'",
                "email" => "'$this->email'",
                "f" => "'$this->f'",
                "i" => "'$this->i'",
                "o" => "'$this->o'",
                "student_lk_id" => "'$this->student_lk_id'"
            );
            $this->id = $db->insert($data, 'users');
        }
        return true;
    }
}

?>