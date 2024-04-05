
<?php
$hostname = "localhost";
$username = "root";
$password = "";
$databasename = "crud";

$connect = new mysqli($hostname, $username, $password, $databasename);

if($connect->connect_error) {
  die('Error connecting to the database: '.$connect->connect_error);
}

if(isset($_GET['id'])) {
  $id = $_GET['id'];
  $sql = "delete from tbluser where id = $id";
  $connect->query($sql);
  header('location: ./index.php');
  exit;

}
?>