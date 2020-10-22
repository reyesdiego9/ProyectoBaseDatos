<?php
 try{
        $conn = oci_connect("jordi", "clave", "localhost:1521/xe", 'AL32UTF8');
    }
    catch(PDOException $e){
        echo "<script>alert('Errr...')</script>";
    }

?>