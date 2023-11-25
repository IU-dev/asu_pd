<?php
//User.class.php

require_once 'DB.class.php';
require_once 'Tools.class.php';
require_once 'PractiseDeadline.php';

/**
 * Класс пользователя системы
 */
class Practise
{
    public $id;
    public $name;
    public $organiser;
    public $date_start;
    public $date_finish;
    public $deadlines;

    function __construct($data)
    {
        $this->id = (isset($data['id'])) ? $data['id'] : "";
        $this->name = (isset($data['name'])) ? $data['name'] : "";
        $this->organiser = User::GetUser($data['organiser']);
        $this->email = (isset($data['email'])) ? $data['email'] : "";
        $this->date_start = (isset($data['date_start'])) ? new DateTime($data['date_start']) : "";
        $this->date_finish = (isset($data['date_finish'])) ? new DateTime($data['date_finish']) : "";
    }

    public static function GetPractise($id){
        $db = new DB();
        $data = $db->select('practises', "id = '". $id . "'");
        return new Practise($data);
    }

    public static function GetAllPractises(){
        $db = new DB();
        $data = $db->select_fs('practises', "id != 0");
        $result = [];
        foreach($data as $k=>$d){
            array_push($result, new Practise($d));
        }
        return $result;
    }

    public function deadlines(){
        return PractiseDeadline::GetDeadlinesById($this->id);
    }

    public function save($isNew = false)
    {
        $tool = new Tools();
        $db = new DB();
        if (!$isNew) {
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