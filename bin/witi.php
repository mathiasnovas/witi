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
 
    public static function fetchPeople () {
        $db = Mysql::get();

        $query = 'SELECT * FROM people';

        $result = mysql_query($query);
        $array = array();

        while($row = mysql_fetch_assoc($result)) {
            $array[] = $row;
        }

        return $array;
    }

    public static function fetchGadgets () {
        $db = Mysql::get();

        $query = 'SELECT * FROM gadgets';

        $result = mysql_query($query);
        $array = array();

        while($row = mysql_fetch_assoc($result)) {
            $array[] = $row;
        }

        return $array;
    }

    public static function fetchGadgetById ($id) {
        $db = Mysql::get();

        $query = 'SELECT * FROM gadgets WHERE personId="' . $id . '"';

        $result = mysql_query($query);
        $array = array();

        while($row = mysql_fetch_assoc($result)) {
            $array[] = $row;
        }

        return $array;
    }

}
