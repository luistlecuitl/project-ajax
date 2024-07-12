<?php

    include("databs.php");

    $busqueda = $_POST['search'];

    if(!empty($busqueda)){
        $query = "SELECT * FROM tasks WHERE name LIKE '$busqueda%'";
        $result = mysqli_query($conexion, $query);
        if(!$result){
            die('Error consulta'. mysqli_error($conexion));
        }

        $json = array();
        while($row = mysqli_fetch_array($result)) {
            $json[] = array(
                'name' => $row['name'],
                'task' => $row['task'],
                'id' => $row['id']
            );
        }
        $jsonString = json_encode($json);
        echo $jsonString;
    }

?>