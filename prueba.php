<?php   
$sql = "SELECT * FROM PROD WHERE ID_PRODUCTO = ". (int) $_GET['id'];
$conn = oci_connect("diegopapi", "toor", "localhost:1521/xe");
$stid = oci_parse($conn, $sql);
oci_execute($stid);
$row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS);
if (!$row) {
       header('Status: 404 Not Found');
} else {
       $img = $row['IMAGEN']->load();
       header("Content-type: image/jpeg");
       print $img;
}
?>