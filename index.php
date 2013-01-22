<?php
    session_start();

    require "config/config.php";
    require "system/Loader.php";

    Loader::run($CONFIG['system']);

?>