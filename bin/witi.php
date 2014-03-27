<?php

class Mysql {
    public static function get () {
        $db = mysql_connect('localhost', 'root', 'root');

        return mysql_select_db('witi', $db);
    }
}

class Witi {

    public static function parseUrl ($param) {
        $result = (isset($_GET[$param]) ? $_GET[$param] : false);

        if (!$result) {
            return;
        }

        return $result;
    }

    public static function fetch ($query) {
        $db = Mysql::get();

        $result = mysql_query($query);
        $array = array();

        while($row = mysql_fetch_assoc($result)) {
            $array[] = $row;
        }

        return $array;
    }

    public static function set ($query) {
        $db = Mysql::get();

        mysql_query($query);
    }
 
    public static function fetchPeople () {
        $query = 'SELECT * FROM people';
        $result = self::fetch($query);

        return $result;
    }

    public static function fetchGadgets () {
        $query = 'SELECT * FROM gadgets';
        $result = self::fetch($query);

        return $result;
    }

    public static function fetchPerson ($id) {
        $query = "SELECT * FROM people WHERE id = '$id'";
        $result = self::fetch($query);

        return $result[0];
    }

    public static function fetchGadgetsById ($id) {
        $query = 'SELECT * FROM gadgets WHERE personId="' . $id . '"';
        $result = self::fetch($query);

        return $result;
    }

    public static function fetchPeopleById ($id) {
        $query = 'SELECT * FROM people WHERE id="' . $id . '"';
        $result = self::fetch($query);

        return $result;
    }

    public static function addPerson ($name, $image) {
        $query = "INSERT INTO people (name, image)
            VALUES ('$name', '$image')
        ";

        self::set($query);
    }

    public static function addGadget ($name, $image) {
        $query = "INSERT INTO gadgets (name, image)
            VALUES ('$name', '$image')
        ";

        self::set($query);
    }

    public static function updatePerson ($id, $gadgetId) {
        self::wipePeople($gadgetId);

        var_dump($id, $gadgetId);

        $query = " UPDATE gadgets
            SET personId = '$id'
            WHERE id = '$gadgetId'
        ";

        self::set($query);
    }

    public static function wipePeople ($id) {
        $query = "UPDATE gadgets
            SET personId = ''
            WHERE id = '$id'
        ";

        self::set($query);
    }

    public static function getReports ($id) {
        $query = "SELECT * FROM report
            WHERE personId = '$id'
        ";
        $result = self::fetch($query);

        return $result;
    }

    public static function setReport ($id) {
        $date = date();

        $query = "INSERT INTO report (personId, date)
            VALUES ('$id', '$date')
        ";

        var_dump($query);
    }

}
