<?php

//UserTools.class.php
require_once 'User.class.php';
require_once 'DB.class.php';
require_once 'UserTools.class.php';

/**
 * Класс-инструмент tools для упрощения стандартных функций. TODO: переделать в include со статическими функциями!
 */
class Tools
{
    /**
     * Функция для осуществления выхода пользователя из системы (рудимент)
     * @return void
     */
    public function logout()
    {
        unset($_SESSION['user']);
        unset($_SESSION['login_time']);
        unset($_SESSION['logged_in']);
        session_destroy();
        header("Location: index.php");
    }

    /**
     * @param $cat Категория
     * @param $sub Над кем совершается действие
     * @param $who Кто совершает действие
     * @param $log Запись
     * @return int|string|null ID лога
     */
    public function log($cat, $sub, $who, $log)
    {
        $db = new DB();
        $tool = new Tools();
        date_default_timezone_set("GMT");
        $data['datetime'] = "'" . date("Y-m-d H:i:s", time()) . "'";
        date_default_timezone_set($tool->getGlobal('tz'));
        $data['category'] = "'" . $cat . "'";
        $data['sub'] = "'" . $sub . "'";
        $data['who'] = "'" . $who . "'";
        $data['text'] = "'" . $log . "'";
        return $db->insert($data, 'log');
    }
    /**
     * Получить значение глобальной переменной проекта
     * @param $name Название переменной
     * @return mixed Значение переменной
     */
    public function getGlobal($name)
    {
        $db = new DB();
        $data = $db->select('globals', "field = '" . $name . "'");
        return $data['value'];
    }

    /**
     * Очистить строку от символов, способных вызвать XSS
     * @param $string строка
     * @return string "безопасная" строка
     */
    public function safeString($string) // защиты от XSS уязвимостей
    {
        str_replace('"', '', $string);
        str_replace("'", '', $string);
        str_replace('<', '', $string);
        str_replace('>', '', $string);
        str_replace('UPDATE', '', $string);
        str_replace('update', '', $string);
        str_replace('DELETE', '', $string);
        str_replace('delete', '', $string);
        str_replace('SELECT', '', $string);
        str_replace('select', '', $string);
        str_replace('pdata', '', $string);
        str_replace('users', '', $string);
        str_replace('js', '', $string);
        return $string;
    }

    /**
     * Отформатировать дату
     * @param $date Дата в формате PHP date
     * @return string Дата в формате дд.мм.ГГГГ чч:мм:сс
     */
    public function date($date)
    {
        return date("d.m.Y H:i:s", strtotime($date . " GMT"));
    }

    public function date_short($date)
    {
        return date("d.m.Y", strtotime($date . " GMT"));
    }

    public function toast($type, $message)
    {
        if ($type == "success") {
            return '<script type="text/javascript">toastr.options = {
  "closeButton": true,
  "debug": false,
  "newestOnTop": false,
  "progressBar": true,
  "positionClass": "toast-top-right",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}; 
toastr["success"]("' . $message . '", "Успешно!")</script>';
        } else if ($type == "error") {
            return '<script type="text/javascript">toastr.options = {
  "closeButton": true,
  "debug": false,
  "newestOnTop": false,
  "progressBar": true,
  "positionClass": "toast-top-right",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}; 
toastr["error"]("' . $message . '", "Ошибка!")</script>';
        }
    }
}

?>