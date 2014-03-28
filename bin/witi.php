<?php

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
        $query = "SELECT * FROM people
            ORDER BY name
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

    public static function setReport ($id) {
        $date = date('Y-m-d H:i:s');

        $rQuery = "INSERT INTO report (personId, date)
            VALUES ('$id', '$date')
        ";

        $pQuery = "UPDATE people
            SET score = score - 5
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

}
