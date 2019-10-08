<?php

session_start();
//Include config

require_once 'config.php';

//Helper files



//Autoload

spl_autoload_register('myAutoLoader');


function myAutoLoader($class_name) {
    require_once ('../classes/'.$class_name.'.php');
}
