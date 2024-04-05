<?php
  // write code to connect database
  $hostname = "localhost";
  $username = "root";
  $password = "";
  $databasename = "crud";
  // use mysqli to connect between php and database
  $connect = new mysqli($hostname, $username, $password, $databasename);
  // check our connection work or not
  if($connect->connect_error) {
    die("error connect to database:". $connect->connect_error);
  }

  
  $name = "";
  $age = "";
  $address = "";
  if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $address = $_POST['address'];

    // check condition if all field empty we gonna make alert
    if($name == "" || $age == "" || $address== "") {
      echo "
        <script>
          alert('All Field Cannot Empty');
        </script>
      ";
    }else {
      
      $sql = "insert into tbluser (name, age, address) values('$name', '$age', '$address')";
      $result = $connect->query($sql);
      if(!$result) {
        die("error add user".$connect->connect_error);
      }

      // if connect->query is not error we gonna redirect to index.php by using funtion header
      header('location: ./index.php');
      exit; // leave from page add.php to index.php

    }

    
  }


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Data</title>
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
        <input type="text" placeholder="name..." name="name" value="">
        <input type="text" placeholder="age..." name="age" value="">
        <input type="text" placeholder="address..." name="address" value="">
        <button class="add" type="submit">Add</button>
      </form>
    </div>

  </body>

</html>