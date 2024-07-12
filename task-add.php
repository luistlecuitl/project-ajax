<?php

    include("databs.php");

    if(isset($_POST['name'])){
        $name = $_POST['name'];
        $description = $_POST['description'];
        $query = "INSERT INTO tasks(name, description) VALUES ('$name','$description')";
        $result = mysqli_query($conexion, $query);
        if(!$result){
            die("No se pudo establecer la consulta");
        }
        echo "Tarea agregada";
    }


?>