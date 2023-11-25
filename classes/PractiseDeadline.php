<?php
//User.class.php

require_once 'DB.class.php';
require_once 'Tools.class.php';
require_once 'Practise.class.php';

/**
 * Класс пользователя системы
 */
class PractiseDeadline
{
    public $id;
    public $practise;
    public $name;
    public $description;
    public $points;
    public $deadline;

    function __construct($data)
    {
        $this->id = (isset($data['id'])) ? $data['id'] : "";
        $this->practise = (isset($data['practise_id'])) ? Practise::GetPractise($data['practise_id']) : "";
        $this->name = (isset($data['name'])) ? $data['name'] : "";
        $this->description = (isset($data['description'])) ? $data['description'] : "";
        $this->points = (isset($data['points'])) ? (int)$data['points'] : "";
        $this->deadline = (isset($data['deadline'])) ? new DateTime($data['deadline']) : "";
    }

    public static function GetDeadlinesById($id)
    {
        $db = new DB();
        $data = $db->select_fs('practises_deadlines', "practise_id = '". $id . "'");
        $result = [];
        foreach($data as $key=>$value)
        {
            $temp = new PractiseDeadline($value);
            array_push($result, $temp);
        }
        return $result;
    }

    public function save($isNew = false)
    {
        $tool = new Tools();
        $db = new DB();
        if (!$isNew) {
            $data = array(
                "practise_id" => "'$this->practise->id'",
                "name" => "'$this->name'",
                "description" => "'$this->description'",
                "points" => "'$this->points'",
                "deadline" => "'$this->deadline'"
            );
            $db->update($data, 'practises_deadlines', 'id = ' . $this->id);
        } else {
            $data = array(
                "practise_id" => "'$this->practise->id'",
                "name" => "'$this->name'",
                "description" => "'$this->description'",
                "points" => "'$this->points'",
                "deadline" => "'".date('Y-m-d H:i:s', $this->deadline)."'" 
            );
            $this->id = $db->insert($data, 'practises_deadlines');
        }
        return true;
    }
}

?>