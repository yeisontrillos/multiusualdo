<?php
$id=(isset($_POST['id']))?$_POST['id']:"";
$username=(isset($_POST['username']))?$_POST['username']:"";
$email=(isset($_POST['email']))?$_POST['email']:"";
$password=(isset($_POST['password']))?$_POST['password']:"";
$role=(isset($_POST['role']))?$_POST['role']:"";

$conexion = mysqli_connect("b6ev4mlskxgzxbe8deuq-mysql.services.clever-cloud.com", "uosw2tajeneyji6e", "xbKicQBkE8r8LQiZxTxa", "b6ev4mlskxgzxbe8deuq") or
die("Problemas con la conexión");
 
    $respuesta =mysqli_query($conexion," UPDATE mainlogin SET `username`='$username',`email`='$email',`password`='$password',`role`='$role'
     WHERE id=$id");   

header ("location:admin_portada.php");

?>