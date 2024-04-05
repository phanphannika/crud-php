<?php
  
  $hostname = "localhost";
  $username = "root";
  $password = "";
  $databasename = "crud";
  // make connection by using mysqli 
  $connect = new mysqli($hostname, $username, $password, $databasename);
  // check connection work or not
  if($connect->connect_error) {
    die("Error connect to database:".$connect->connect_error);
  }
  
  $name = "";
  $age = "";
  $address = "";
  $id = "";
  if($_SERVER['REQUEST_METHOD'] == 'GET') {
    if(!isset($_GET['id'])) {
      header('location: ./index.php');
      exit;
    }
    $id = $_GET['id'];

    // select data from database into input box
    $sql = "select * from tbluser where id= $id";
    $result = $connect->query($sql);
    // fetch_assoc ban tae muy row
    $row = $result->fetch_assoc();
    if(!$row) {
      die("error get data");
      
    }

    $name = $row['name'];
    $age = $row['age'];
    $address = $row['address'];

  }else {
  //   $name = $_POST['name'];
  //   $age = $_POST['age'];
  //   $address = $_POST['address'];
  //   $id = $_POST['id'];

  //   if($name =="" || $age == "" || $address == "") {
  //     echo "
  //       <srcipt>
  //         alert('All Field Can not Empty');
  //       <?script>
  //     ";

  //     die();
  //   }

  //   $sql = "update tbluser set name ='$name', age= '$age', address='$address' where id='$id' ";
  //   $result = $connect->query($sql);
    
  //   if(!$result) {
  //     echo "
  //       <script>
  //         alert('Edit Not Success'. $connect->error );
  //       </script>
  //     ";
  //   }
  //   header("location: ./index.php");
  //   exit;
  // }
  $name = $_POST['name'];
$age = $_POST['age'];
$address = $_POST['address'];
$id = $_POST['id'];

if ($name == "" || $age == "" || $address == "") {
  echo "
    <script>
      alert('All fields cannot be empty.');
    </script>
  ";
  die();
}

$sql = "UPDATE tbluser SET name='$name', age=$age, address='$address' WHERE id=$id ";
$result = $connect->query($sql);

if (!$result) {
  echo "
    <script>
      alert('Edit was not successful.');
    </script>
  ";
}

header("location: ./index.php");
exit;
}
  
  
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Data</title>
  <style>
  .container {
    width: 50%;
    margin: auto;
    background-color: gray;
    padding:20px;
    border-radius:5px;
  }

  form {
    width: 100%;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    gap: 0.5rem;
  }

  input {
    padding: 10px;
    width: 70%;
    border-radius: 5px;
    outline: none;
  }
  .title {
    text-align:center;
  }
  .add {
    background-color: green;
    outline:none;
    border:none;
    color:white;
    font-size:16px;
    padding:10px 50px;
    border-radius:5px;
    

  }
  </style>
  </head>

  <body>
    <div class="container">
      <h1 class="title">Add User</h1>
      <form action="" method="POST">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <input type="text" placeholder="name..." name="name" value="<?php echo $name; ?>">
        <input type="text" placeholder="age..." name="age" value="<?php echo $age; ?>">
        <input type="text" placeholder="address..." name="address" value="<?php echo $address;?>">
        <button class="add" type="submit">Update</button>
      </form>
    </div>

  </body>

</html>