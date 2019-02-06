<?php

    $config = array(
        "pubTitle" => "My Pub Name",
        "pubDescription" => "A local pub for local people.",
        "menu" => array(
            "showHeader" => false
        ),
        "db" => array(
            "db1" => array(
                "dbname" => "beerz",
                "username" => "root",
                "password" => "root",
                "host" => "localhost"
            )
        ),
        "urls" => array(
            "baseUrl" => "http://board.beerz.dev"
        ),
        "dev" => true
    );
    

    /*
        Error reporting.
    */
    if($config['dev'])
    {
        error_reporting(E_ALL);
        ini_set('display_errors', 1);
    }
?>