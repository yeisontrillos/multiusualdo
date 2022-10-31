<?php
/* Esta ejecutando MySQL
servidor con configuración predeterminada (usuario 'root' sin contraseña) */
define('DB_SERVER', 'b6ev4mlskxgzxbe8deuq-mysql.services.clever-cloud.com');
define('DB_USERNAME', 'uosw2tajeneyji6e');
define('DB_PASSWORD', 'xbKicQBkE8r8LQiZxTxa');
define('DB_NAME', 'b6ev4mlskxgzxbe8deuq');
 
/* Intento de conexión a la base de datos MySQL */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Verifica la conexión
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>