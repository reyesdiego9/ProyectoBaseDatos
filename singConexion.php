<?php
    if(isset($_SESSION['user_id'])){
        $sql = "SELECT *
          FROM CLIENTE
          WHERE EMAIL=:email
        ";
        $conn = oci_connect("DiegoReyes", "toor", "localhost:1521/xe", 'AL32UTF8');
        $prueba = oci_parse($conn, $sql);
        oci_bind_by_name($prueba, ':email', $_SESSION['user_id']);
        oci_execute($prueba);
        $user = null;
          while($result = oci_fetch_array($prueba)){
            if(count($result) > 0){
            $user = $result;
          }
        }
      }

?>

