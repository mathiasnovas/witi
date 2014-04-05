<?php

class Mysql {

    private function __construct() {
    	$config = include('config/database.php');
        mysql_connect($config['host'], $config['username'], $config['password'])
            or die('Unable to connect to MySQL server on: localhost');
        mysql_select_db($config['database'])
        	or die('Unable to select DB: witi');
    }

    public static function get() {
    	static $instance = null;
    	if ($instance === null) {
    		$instance = new Mysql();
    	}
    	return $instance;
    }

}
