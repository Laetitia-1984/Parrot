<?php 

require_once('library/config.php');
require_once('library/session.php');

session_destroy(); //Destruction de la session

unset($_SESSION); //Destruction du tableau de session

header('location: login.php');

