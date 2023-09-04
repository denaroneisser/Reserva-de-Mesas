<html>
<head><title></title></head>
<body>




</body>


</html>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "resources";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Falha: " . mysqli_connect_error());
}
