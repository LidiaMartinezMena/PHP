<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Formulario práctica PHP</title>
        <link href="estilos.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div class="formulario">
        <center>
            <form method="POST" action="">
            <h2>Formulario de registro</h2>

                <label for="id"> ID <span><em> (requerido) </em></span></label>
                <input type="text" name="id" class="form-input" required/> <br>


                <label for="nombre"> Nombre <span><em> (requerido) </em></span> </label>
                <input type="text" name="nombre" class="form-input" required/> <br>

                <label for="apellido"> Apellido <span><em> (requerido) </em></span></label>
                <input type="text" name="apellido" class="form-input" required/> <br>

                <label for="email"> Email <span><em> (requerido) </em></span></label>
                <input type="text" name="email" class="form-input" required/> <br>

                <input type="submit" name="submit" class="form-boton" value="Suscribirse" />
        
            <?php 
            //Si existen datos en el formulario creado:
            if($_POST){
                $id = $_POST['id'];
                $nombre = $_POST['nombre'];
                $apellido = $_POST['apellido'];
                $email = $_POST['email'];
            
            //Conexión con base de datos
            $servername= "localhost";
            $username="root";
            $password="";
            $bdname="cursosql";

            //Creamos la conexión
            $conex = new mysqli($servername, $username, $password, $bdname);
            //Chequear si funciona 
            if($conex->connect_error){
                die("Connection failed: ". $conex->connect_error);
            }

            //Creamos una query
            $sql = "INSERT INTO empleado (id, nombre, apellido, email) VALUES 
            ('$id', '$nombre', '$apellido', '$email')";
        
            //Mensaje de datos introducidos correctamente o no
            if($conex->query($sql) ===TRUE) {
                echo "Se ha creado el registro satisfactoriamente";
            } else {
                echo "Error" .$sql . "<br>" . $conex->error;
            }

            //Cierro la conexión
            $conex->close();

            }

            
             

            
            ?>
            </form>
        </center>
        </div>
    </body>
</html>