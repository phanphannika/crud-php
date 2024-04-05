<?php
  $hostname = "localhost";
  $username = "root";
  $password = "";
  $databasename = "crud";
  $connect = new mysqli($hostname, $username, $password, $databasename);
  if($connect->connect_error) {
    die("error connect to database" . $connect->connect_error);
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Crud Operation</title>
  <style>
  .container {
    width: 80%;
    margin: auto;
  }

  .title {
    text-align: center;
  }

  table {
    font-family: Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;

  }

  th,
  td {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
  }

  tr:nth-child(even) {
    background-color: #dddddd;
  }

  .add {
    background-color: green;
    padding: 10px 20px;
    border-radius: 5px;
    border: none;
    outline: none;
    margin-bottom: 10px;
  }
  a {
    text-decoration: none;
    color:white;
  }

  .edit {
    background-color: blue;
    color: white;
    border: none;
    outline: none;
    padding: 7.5px;
    border-radius: 5px;
  }
 
  .delete {
    background-color: red;
    color: white;
    border: none;
    outline: none;
    padding: 7.5px;
    border-radius: 5px;
  }
  </style>
</head>

<body>

  <div class="container">
    <h2 class="title">HTML CRUD</h2>
    <button class="add"><a href="./add.php">Add</a></button>
    <table>
      <tr>
        <th>Name</th>
        <th>Age</th>
        <th>Address</th>
        <th>Action</th>
      </tr>
      <?php
        $sql = "select * from tbluser";
        $result = $connect->query($sql);
        if(!$result) {
          die("error fetching data:" . $connect_error);
        }
        while($row = $result->fetch_assoc()) {
          echo "
            <tr>
              <td>$row[name]</td>
              <td>$row[age]</td>
              <td>$row[address]</td>
              <td>
                <button class='edit'><a href='./edit.php?id=$row[id]'>Edit</a></button>
                <button class='delete'><a href='./delete.php?id=$row[id]'>Delete</a></button>
              </td>
            </tr>
          ";
        }
            
        ?>

    </table>

  </div>

</body>

</html>