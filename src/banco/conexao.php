<?php

date_default_timezone_set('America/SAo_Paulo');

    define('DBHOST','localhost');
    define('DBUSER','root');
    define('DBPASSWOR','');
    define('DBNAME','dbaulads');

$conexao = mysqli_connect(DBHOST, DBUSER, DBPASSWOR, DBNAME);


?>