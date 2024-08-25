<?php
include_once('conection.php');
session_start();

// Habilitar la visualización de errores
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$correo = $_POST['correo'];
$contraseña = $_POST['contraseña'];
echo $contraseña;
// Buscar el usuario por el correo
$consulta_usuario = mysqli_query($conexion, "SELECT * FROM user WHERE correo='$correo'");

if ($consulta_usuario) {
    if (mysqli_num_rows($consulta_usuario) > 0) {
        $usuario = mysqli_fetch_assoc($consulta_usuario);
        $_SESSION['id'] = $usuario['userid'];
        $_SESSION['correo'] = $usuario['correo'];
        $_SESSION['username'] = $usuario['username'];
        $_SESSION['rol'] = $usuario['rol']; // Esto estaba faltando
        $_SESSION['password']=$usuario['userpass'];
        if ($_SESSION['password']==$contraseña) {
            if ($_SESSION['rol']=='1'){
                header('location:admin.php');
                exit();
            }else{
                header('location:conductoresView');
            }
        }else {
            echo'
            <script>
                alert("contraseña incorrecta,intentelo de nuevo");
                window.location="../index";
            </script>
            
            ';
        }
       
    } else {
        echo '
            <script>
                alert("No se encontró el usuario,por favor vuelva a intentarlo");
                window.location="../index";
            </script>
        ';
        exit();
    }
} else {
    echo '
        <script>
            alert("Error en la consulta a la base de datos");
            window.location="../index";
        </script>
    ';
    exit();
}
?>
