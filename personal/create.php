
<?php
// Incluir archivo de configuración
require_once "config.php";
 
// Definir variables e inicializar con valores vacíos
$name = $address = $salary = "";
$name_err = $address_err = $salary_err = "";
 
// Procesamiento de datos del formulario cuando se envía el formulario
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validar nombre
    $input_name = trim($_POST["name"]);
    if(empty($input_name)){
        $name_err = "Por favor ingrese el nombre del empleado.";
    } elseif(!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $name_err = "Por favor ingrese un nombre válido.";
    } else{
        $name = $input_name;
    }
    
    // Validar dirección
    $input_address = trim($_POST["address"]);
    if(empty($input_address)){
        $address_err = "Por favor ingrese una dirección.";     
    } else{
        $address = $input_address;
    }
    
    // Validar salario
    $input_salary = trim($_POST["salary"]);
    if(empty($input_salary)){
        $salary_err = "Por favor ingrese el monto del salario del empleado.";     
    } elseif(!ctype_digit($input_salary)){
        $salary_err = "Por favor ingrese un valor correcto y positivo.";
    } else{
        $salary = $input_salary;
    }
    
    // Verifique los errores de entrada antes de insertar en la base de datos
    if(empty($name_err) && empty($address_err) && empty($salary_err)){
        // Preparar una declaración de inserción
        $sql = "INSERT INTO employees (name, address, salary) VALUES (?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Vincular variables a la declaración preparada como parámetros
            mysqli_stmt_bind_param($stmt, "sss", $param_name, $param_address, $param_salary);
            
            // Establecer parámetros
            $param_name = $name;
            $param_address = $address;
            $param_salary = $salary;
            
            // Intento de ejecutar la declaración preparada
            if(mysqli_stmt_execute($stmt)){
                // Registros creados con éxito. Redirigir a la página de destino
                header("location: personal_portada.php");
                exit();
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
         
        // Cerrar declaración
        mysqli_stmt_close($stmt);
    }
    
    // Conexión cercana
    mysqli_close($link);
}

?>


 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Agregar Empleado</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
        .login-form {
		width: 340px;
    	margin: 40px auto;
		background-color: #85858A;
            border-radius: 40px;
        }
        .login-form h2 {
            margin: 0 0 10px;
        }
        .form-control, .btn {
            min-height: 40px;
            border-radius: 40px;
        }
        .login-form form {
            margin-bottom: 40px;
            background: #f7f7f7;
            box-shadow: 0px 0px 0px rgba(2, 2, 2, 0.3);
            padding: 10px;
            width: 88%;
            background-color: #9E9EAC;
            border-radius: 10px;
            margin: 20px;
        }
        .btn {        
            font-size: 15px;
            font-weight: bold;
        }
    </style>
</head>
<body>
<center>
   <div class="login-form">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-14">
                    <div class="page-header">
                        
                        <h2 style="color:white">Agregar nuevo Rol</h2>
                    </div>
                    <p style="color:white">Diligenciar formulario.</p>
                    <form  class="col-sm-10 text-left" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                            <label>Nombre</label>
                            <input type="text" name="name" class="form-control" value="<?php echo $name; ?>">
                            <span class="help-block"><?php echo $name_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($address_err)) ? 'has-error' : ''; ?>">
                            <label>Dirección</label>
                            <textarea name="address" class="form-control"><?php echo $address; ?></textarea>
                            <span class="help-block"><?php echo $address_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($salary_err)) ? 'has-error' : ''; ?>">
                            <label>Sueldo</label>
                            <input type="text" name="salary" class="form-control" value="<?php echo $salary; ?>">
                            <span class="help-block"><?php echo $salary_err;?></span>
                        </div>
                        <input type="submit" class="btn btn-success" value="Submit">
                        <a href="personal_portada.php" class="btn btn-primary">Cancelar</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</center>
</body>
</html>