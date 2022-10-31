<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="initial-scale=1.0, maximum-scale=2.0">
<title>Multiusuarios</title>
		
<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
<script src="../js/jquery-1.12.4-jquery.min.js"></script>
<script src="../bootstrap/js/bootstrap.min.js"></script>
<style type="text/css">
	.login-form {
		width: 340px;
    	margin: 20px auto;
	}
    .login-form form {
    	margin-bottom: 15px;
        background: #f7f7f7;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;
    }
    .login-form h2 {
        margin: 0 0 15px;
    }
    .form-control, .btn {
        min-height: 38px;
        border-radius: 2px;
    }
    .btn {        
        font-size: 15px;
        font-weight: bold;
    }
    .bbodi{
		background-color: #8F909C;
      
	}
</style>
</head>

	<body class="bbodi">
		
<?php include("../header.php");?>
	
	<div class="wrapper">
	
	<div class="container">
			
		<div class="col-lg-12">
		 
			<center>
				<h1>PANEL ADMINISTRATIVO</h1>
				
				<!-- <h3>
				<?php
				session_start();

				if(!isset($_SESSION['admin_login']))	
				{
					header("location: ../index.php");  
				}

				if(isset($_SESSION['personal_login']))	
				{
					header("location: ../personal/personal_portada.php");	
				}

				if(isset($_SESSION['usuarios_login']))	
				{
					header("location: ../usuarios/usuarios_portada.php");
				}
				
				if(isset($_SESSION['admin_login']))
				{
				?>
					Bienvenido,
				<?php
						echo $_SESSION['admin_login'];
				}
				?>
				</h3> -->

				<?php
  $conexion = mysqli_connect("b6ev4mlskxgzxbe8deuq-mysql.services.clever-cloud.com", "uosw2tajeneyji6e", "xbKicQBkE8r8LQiZxTxa", "b6ev4mlskxgzxbe8deuq") or
  die("Problemas con la conexión");

    if ($_POST){
      $id=$_POST['id'];
      $accion=$_POST['accion'];
  
  switch ($accion) {
   case "Borrar": 
     $registros = mysqli_query($conexion, "delete from mainlogin where id=$id");
    break;

    case "Registrar": 
      mysqli_query($conexion, "insert into mainlogin(username,email,password,role) values 
      ('$_REQUEST[username]','$_REQUEST[email]','$_REQUEST[password]','$_REQUEST[role]')")
      or die("Problemas en el select" . mysqli_error($conexion));
      header("location:admin_portada.php");
      mysqli_close($conexion);
break;
    
   default:
     echo "No existe";
  }
  }
  $registros = mysqli_query($conexion, "select * from mainlogin") or
    die("Problemas en el select:" . mysqli_error($conexion));
   
    ?>
					
			</center>
			<a href="../cerrar_sesion.php"><button class="btn btn-danger text-left"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Cerrar Sesion</button></a>
			<a href="registro.php"><button class="btn btn-success text-left"><span class="" aria-hidden="true"></span> Crear Rol</button></a>
            <hr>
		</div>
		
		<br><br><br>
		<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Panel de usuarios
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th width="4%">ID</th>
                                            <th width="18%">Usuario</th>
                                            <th width="24%">Email</th>
                                            <th width="19%">Rol</th>
                                            <th width="24%">Password</th>
											<th colspan="2">Opciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php

                        /* require_once '../DBconect.php';
                        $select_stmt=$db->prepare("SELECT id,username,email,role FROM mainlogin");
                        $select_stmt->execute(); */
									
									while ($reg = mysqli_fetch_array($registros)) 
									{
									?>
                                        <tr>
                                            <td><?php echo $reg["id"]; ?></td>
                                            <td><?php echo $reg["username"]; ?></td>
                                            <td><?php echo $reg["email"]; ?></td>
                                            <td><?php echo $reg["role"]; ?></td>
                                            <td>*******</td>
											<td> <form action="modificacion.php" method="post"> 
											<input type="hidden" name="id" value="<?php echo $reg['id'] ; ?>">
											<button type="submit" class="btn btn-success">Editar</button> </form></td>
										
											<td><form action="" method="post">
											<input type="hidden" name="id" value="<?php echo $reg['id'] ; ?>">
											<button type="submit" class="btn btn-danger" name="accion" value="Borrar">Borrar</button></form></td>
                                        </tr>
									<?php 
									}
									?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
		
	</div>
			
	</div>
										
	</body>
</html>