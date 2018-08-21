<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Table Contents</title>
</head>
<body>
<a href="http://localhost/duomenu-bazes/index1.php">Į pagrindinį</a>
<table style="margin-top: 20px; width:100%; border:1px solid black;">
  <tr>
    <th>Eilės numeris</th>
    <th>Savininko vardas</th>
    <th>Gyvūno vardas</th> 
    <th>Gyvūno rūšis</th>
  </tr>
  <form action="index2.php" method="POST">
<?php

$servername = "localhost";
$username = "root";
$password = "123";

$conn = mysqli_connect($servername, $username, $password, 'testbase');
        
// Patikrinam prisijungimą
if (!$conn) {
   die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully<br>";

 if (isset($_POST['trinti'])) {
    $sql = "DELETE FROM Savininkai_ir_gyvunai WHERE id=".$_POST['trinti'];

    if (mysqli_query($conn, $sql)) {
       echo "Record deleted successfully";
    } else {
       echo "Error deleting record: " . mysqli_error($conn);
    }
    
 }

 if(isset($_POST['index'])) {
    $sql = "UPDATE Savininkai_ir_gyvunai SET Savininko_vardas='".$_POST['edit-sav-vardas']."', Augintinio_vardas='".$_POST['edit-aug-vardas']."',
    Augintinio_rusis='".$_POST['edit-aug-rusis']."' WHERE id=".$_POST['index'];

    if (mysqli_query($conn, $sql)) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
 }

 $sql = "SELECT id, Savininko_vardas, Augintinio_vardas, Augintinio_rusis FROM Savininkai_ir_gyvunai";
 $result = mysqli_query($conn, $sql);
 
 if (mysqli_num_rows($result) > 0) {
    // kiekvieną eilutę atskirai
    while($row = mysqli_fetch_assoc($result)) {
?>
  <tr>
    <td>
    <button style="margin-left: 10px; margin-right: 10px" type="submit" name="trinti" value="<?php echo $row["id"] ?>">Trinti</button>
    <a style="padding-right: 60px;" href="index3.php?index=<?php echo $row["id"] ?>&owner_name=<?php echo $row["Savininko_vardas"] ?>&pet_name=<?php echo $row["Augintinio_vardas"] ?>&pet_type=<?php echo $row["Augintinio_rusis"] ?>">Redaguoti</a><?php echo $row["id"] ?>
    </td>
    <td><?php echo $row["Savininko_vardas"] ?></td>
    <td><?php echo $row["Augintinio_vardas"] ?></td> 
    <td><?php echo $row["Augintinio_rusis"] ?></td>
  </tr>
<?php
    }
 } else {
    echo "0 results";
 }

?>
</form>
</table> 
</body>
</html>