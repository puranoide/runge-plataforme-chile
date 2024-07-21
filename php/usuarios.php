<?php

include_once('conection.php');

function listarUsuarios($con){
    $mensaje = "no hay usuarios registrados";
    $usuarios = [];
    $sqlUsarios = "SELECT* from user;";
    $resultUsuarios = $con->query($sqlUsarios);

    if ($resultUsuarios->num_rows > 0) {
        while ($rowUsuarios = $resultUsuarios->fetch_assoc()) {
            $usuarios[] = $rowUsuarios;
        }
    } else {
        return $mensaje;
    }

    return $usuarios;
}

function listarUsuariosporid($con,$id){
    $mensaje = "no hay usuarios registrados con el id :".$id;
    $usuarios = [];
    $sqlUsarios = "SELECT* from user WHERE userid=$id;";
    $resultUsuarios = $con->query($sqlUsarios);

    if ($resultUsuarios->num_rows > 0) {
        while ($rowUsuarios = $resultUsuarios->fetch_assoc()) {
            $usuarios[] = $rowUsuarios;
        }
    } else {
        return $mensaje;
    }

    return $usuarios;
}

function agregarUsuario($con, $correo, $userpass, $rol,$username,$fotorutauserprofile)
{
    $mensaje = '';
    $sqlAddUsuario = "INSERT INTO user(correo,userpass,rol,username,fotorutauserprofile)
                    VALUES('$correo','$userpass','$rol','$username','$fotorutauserprofile')";

    $ejecutar = mysqli_query($con, $sqlAddUsuario);

    if ($ejecutar) {
        $iduser = mysqli_insert_id($con);
        $mensaje = 'usuario agregado con exito,ID del usuario agregado: ' . $iduser;
        return $mensaje;
    } else {
        $mensaje = 'usuario no se pudo agregar,intentelo de nuevo o contacte con soporte';
        return $mensaje;
    }
}

function actualizarUsuario($con,$id, $correo, $userpass, $rol,$username,$fotorutauserprofile)
{
    $mensaje = '';
    $sqlupdateUsuario ="UPDATE user SET correo='$correo', userpass='$userpass', rol='$rol', username='$username',fotorutauserprofile='$fotorutauserprofile'
    WHERE userid=$id;";

    $ejecutar = mysqli_query($con, $sqlupdateUsuario);

    if ($ejecutar) {
        $mensaje = 'usuario actualizado con exito,ID del usuario actualizado: ' . $id;
        return $mensaje;
    } else {
        $mensaje = 'usuario no se pudo actualizar,intentelo de nuevo o contacte con soporte';
        return $mensaje;
    }
}





/* 

$resultados=listarUsuarios($conexion);

echo '<pre>';
print_r ($resultados);
echo '</pre>';



$resultados=listarUsuariosporid($conexion,1);

echo '<pre>';
print_r ($resultados);
echo '</pre>';

$resultado=agregarUsuario($conexion,'pruebaconfuncion@gmail.com','pruebafuncion123',1,'pruebaFuncion','');
echo $resultado;


$resultado=actualizarUsuario($conexion,3,'pruebaconfuncion@gmail.com','pruebafuncion1234',2,'pruebaFuncionactualizada','');
echo $resultado;

*/
?>