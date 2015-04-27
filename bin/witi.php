<?php

require_once 'mysql.php';

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

        $error = mysql_error();
        if (!empty($error)) {
            throw new Exception('Database error: ' . $error);
        }

        $array = array();

        while($row = mysql_fetch_assoc($result)) {
            $array[] = $row;
        }

        return $array;
    }

    public static function set ($query) {
        $db = Mysql::get();
        mysql_query($query);

        $error = mysql_error();
        if (!empty($error)) {
            throw new Exception('Database error: ' . $error);
        }
    }

    public static function fetchPeople ($order = 'name', $direction = 'ASC', $limit = 99) {
        $query = "SELECT * FROM people
            ORDER BY $order $direction
            LIMIT 0, $limit
        ";

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

    public static function fetchGadget ($id) {
        $query = "SELECT * from gadgets WHERE id = '$id'";
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
        $db = Mysql::get();
        $name = mysql_real_escape_string($name);

        $query = "INSERT INTO people (name, image)
            VALUES ('$name', '$image')
        ";

        self::set($query);
    }

    public static function addGadget ($name, $image) {
        $db = Mysql::get();
        $name = mysql_real_escape_string($name);

        $query = "INSERT INTO gadgets (name, image)
            VALUES ('$name', '$image')
        ";

        self::set($query);
    }

    public static function addAccessory ($name, $gadget_id) {
        $db = Mysql::get();
        $name = mysql_real_escape_string($name);

        $query = "INSERT INTO accessories (name, gadget_id)
            VALUES ('$name', '$gadget_id')
        ";

        self::set($query);
    }

    public static function fetchAccessories($gadget_id) {
        $query = "SELECT * FROM accessories WHERE gadget_id = '$gadget_id'";
        $result = self::fetch($query);

        return $result;
    }

    public static function updatePerson ($id, $gadgetId) {
        $gadgets = self::fetchGadgetsById($id);
        $continue = true;

        if (count($gadgets) > 0) {
            foreach ($gadgets as $gadget) {
                if ($gadget['id'] === $gadgetId) {
                    $continue = false;
                }
            }
        }

        if (!$continue) {
            return;
        }

        self::wipePeople($gadgetId);

        $gQuery = "UPDATE gadgets
            SET personId = '$id'
            WHERE id = '$gadgetId'
        ";

        $pQuery = "UPDATE people
            SET score = score + 10
            WHERE id = '$id'
        ";

        self::set($gQuery);
        self::set($pQuery);

        self::setLog($id, $gadgetId);
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
            ORDER BY date DESC
        ";
        $result = self::fetch($query);

        return $result;
    }

    public static function setReport ($id, $comment) {
        $date = date('Y-m-d H:i:s');

        if (!$comment) {
            return;
        }

        $db = Mysql::get();
        $comment = mysql_real_escape_string($comment);

        $rQuery = "INSERT INTO report (personId, date, comment)
            VALUES ('$id', '$date', '$comment')
        ";

        $pQuery = "UPDATE people
            SET score = score - 15
            WHERE id = '$id'
        ";

        self::set($rQuery);
        self::set($pQuery);
    }

    public static function getRank ($id) {
        $query = "SELECT * FROM people
            ORDER BY score DESC
        ";
        $people = self::fetch($query);
        $i = 1;
        $rank;

        foreach ($people as $person) {
            if ($person['id'] === $id) {
                $rank = $i;
            }

            $i++;
        }

        return $rank;
    }

    public static function setLog($personId, $gadgetId) {
        $date = date('Y-m-d H:i:s');

        $query = "INSERT INTO log (personId, gadgetId, date)
            VALUES ('$personId', '$gadgetId', '$date')
        ";

        self::set($query);
    }

    public static function getLog($personId) {
        $query = "SELECT * FROM log
            WHERE personId = '$personId'
            ORDER BY id DESC
            LIMIT 5
        ";

        $result = self::fetch($query);

        return $result;
    }

}
