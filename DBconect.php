<?php
$db_host="b6ev4mlskxgzxbe8deuq-mysql.services.clever-cloud.com"; //localhost server 
$db_user="uosw2tajeneyji6e";	//database username
$db_password="xbKicQBkE8r8LQiZxTxa";	//database password   
$db_name="b6ev4mlskxgzxbe8deuq";	//database name

try
{
	$db=new PDO("mysql:host={$db_host};dbname={$db_name}",$db_user,$db_password);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOEXCEPTION $e)
{
	$e->getMessage();
}

?>



