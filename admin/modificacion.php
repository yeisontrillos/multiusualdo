    <!DOCTYPE html>
    <html>
    <head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=2.0">
    <title>Multiusuarios PHP MySQL: Niveles de Usuarios</title>
        
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
    <script src="sweetalert2.min.js"></script>
    <script src="https://kit.fontawesome.com/1a3d6caaee.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="sweetalert2.min.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="estilos/style.css">
    <link href="https://unpkg.com/vanilla-datatables@latest/dist/vanilla-dataTables.min.css" rel="stylesheet" type="text/css">
    <script src="https://unpkg.com/vanilla-datatables@latest/dist/vanilla-dataTables.min.js" type="text/javascript"></script>
    <script src="https://kit.fontawesome.com/e1187442ed.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <script src="js/jquery-1.12.4-jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <style type="text/css">
	.login-form {
		width: 340px;
    	margin: 40px auto;
		background-color: #85858A;
		border-radius: 20px;
	}
  .login-form form {
    	margin-bottom: 15px;
        background: #f7f7f7;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 40px;
		    border-radius: 25px;
    }
    .login-form h2 {
        margin: 0 0 15px;
    }
    .form-control, .btn {
        min-height: 38px;
        border-radius: 2px;
        border-radius: 20px;
    }
    .btn {        
        font-size: 15px;
        font-weight: bold;
    }
    .colofondo{
      background-color: #8F909C;
    }

   
    
</style>
</head>
	<body class="colofondo">

<?php
$conexion = mysqli_connect("localhost", "root", "", "php_multilogin") or
die("Problemas con la conexión");
    
    
$registros = mysqli_query($conexion, "select id,username,email,password,role  from mainlogin where id='$_REQUEST[id]'") or
die("Problemas en el select:" . mysqli_error($conexion));
 
?>
      
        <center>
        <div class="login-form">  
          <div class="card">
            
            <div class="card-body">
                <form action="modificacion2.php" method="post" >
                <div class="card-header"><h3>Editar Rol</h3></div><br>
                <div class="row">
            <?php
            if ($reg = mysqli_fetch_array($registros)) { ?>
        
              <div class="form-group col">
                <label class="col-sm-9 text-left">Id</label>
                <input type="text" required readonly class="form-control" placeholder="" name="id" value="<?php echo $reg['id']; ?> ">
              </div>
        
              <div class="form-group col">
                <label class="col-sm-9 text-left" >Usuario</label>
                <input type="text" class="form-control" placeholder="Usuario" name="username"  value="<?php echo $reg['username'] ; ?> ">
              </div> 
            </div>

              <div class=" form-group col">
                <label class="col-sm-9 text-left" >Email</label>
                <input type="email" class="form-control" placeholder="Email" name="email"  value="<?php echo $reg['email'] ; ?> ">
              </div>
              
            <div class="form-group col">
              <label class="col-sm-9 text-left" > Contraseña</label>
                <input type="password" class="form-control" placeholder="Ingresa contraseña" name="password"  value="<?php echo $reg['password'] ; ?> ">
            </div>
    

            <div class="form-group " >
                <label class="col-sm-9 text-left" required readonly >Seleccione tipo</label>
                <div class="col-sm-12">
                <select class="form-control" name="role">
                    <option value=""   selected="selected" name="role" value="<?php echo $reg['role'] ; ?>"> - seleccione rol - </option>
                    <!--<option value="admin">Admin</option>-->
                    <option value="admin">Admin</option>
                    <option value="personal">Personal</option>
                    <option value="usuarios">Usuarios</option>
                </select>
                </div>
               
            
         <br>
         <br>
         <br>
         <br>
         
            <div class="card-footer">
               <button type="submit" class="btn btn-success" value="editar">Guardar</button>
               <a href="admin_portada.php"><button type="submit" class="btn btn-primary" name="accion">Atras</button>
            </div>
           
          
         
          <?php   }  ?>
          </form>
          </div>
          </center>
          </div>
          </div>