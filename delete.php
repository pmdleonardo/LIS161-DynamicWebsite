 <?php
// connection to database
$servername = "localhost";
$uname = "root";
$pw = "";
$dbName = "static";
// Create connection
$conn = mysqli_connect($servername, $uname, $pw, $dbName);
$id = $_GET['id'];
// Check connection
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}
//insert to table login
$sql = "DELETE FROM login WHERE id = $id";
$result = $conn->query($sql);
echo "DELETED!";
$conn->close();
?>
