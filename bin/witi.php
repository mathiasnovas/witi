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

}
