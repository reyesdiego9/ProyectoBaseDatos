<?php   
$sql = "SELECT * FROM PROD WHERE ID_PRODUCTO = ". (int) $_GET['id'];
$conn = oci_connect("jordi", "clave", "localhost:1521/xe");
$stid = oci_parse($conn, $sql);
oci_execute($stid);
$row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS);
if (!$row) {
       header('Status: 404 Not Found');
} else {
       $img = $row['IMAGEN']->load();
       header("Content-type: image/*");
       print $img;
}
?>