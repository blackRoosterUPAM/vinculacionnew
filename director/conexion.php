<?php
$servername = "localhost";
$database = "vinculacion";
$username = "root";
$password = "Toor2019.";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
;
?>
<!-- Esto no se debe hacer--- se debe llamar a la principal pero bueno prosigo  -->