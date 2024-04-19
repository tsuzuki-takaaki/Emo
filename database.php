<?php
    require_once("./idiorm.php");
    ORM::configure('mysql:host=localhost;dbname=mdesu');
    ORM::configure('username', 'dbuser');
    ORM::configure('password', 'dbpass');
    $db = ORM::get_db();
