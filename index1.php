<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form style="margin-bottom: 20px;"  action="index1.php" method="POST">
    <select name="kategorijos" id="">
    <option name="kategorijos" value="Katinas">Kačių šeimininkai</option>
    <option name="kategorijos" value="Suo">Šunų šeimininkai</option>
    <option name="kategorijos" value="Briedis">Briedžių šeimininkai</option>
    </select>
    <input type="submit" name="ikelti" value="Gauti">

    <input type="text" name="sav-vardas" value="">
    <input type="text" name="aug-vardas" value="">
    <input type="submit" name="prideti" value="Prideti">
    </form>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "123";
    
    if (isset($_POST['ikelti'])) {
        
        
        // Prisijungiam prie serverio
        $conn = mysqli_connect($servername, $username, $password, 'testbase');
        
        // Patikrinam prisijungimą
        if (!$conn) {
           die("Connection failed: " . mysqli_connect_error());
        }
        echo "Connected successfully<br>";

    $sql = "SELECT id, Savininko_vardas, Augintinio_vardas FROM Savininkai_ir_gyvunai WHERE Augintinio_rusis='".$_POST['kategorijos']."'";
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) > 0) {
       // kiekvieną eilutę atskirai
       while($row = mysqli_fetch_assoc($result)) {
           echo "id: " . $row["id"]. " - Name: " . $row["Savininko_vardas"]. "Pet name: " . $row["Augintinio_vardas"]. "<br>";
       }
    } else {
       echo "0 results";
    }


    } else if(isset($_POST['prideti'])) {
        // Prisijungiam prie serverio
        $conn = mysqli_connect($servername, $username, $password, 'testbase');
        
        // Patikrinam prisijungimą
        if (!$conn) {
           die("Connection failed: " . mysqli_connect_error());
        }
        echo "Connected successfully<br>";


    $sql = "INSERT INTO Savininkai_ir_gyvunai (Savininko_vardas, Augintinio_vardas, Augintinio_rusis) VALUES ('".$_POST['sav-vardas']."','".$_POST['aug-vardas']."','".$_POST['kategorijos']."')";
    $result = mysqli_query($conn, $sql);
    
    } 
    ?>
    <a href="http://localhost/duomenu-bazes/index2.php">Lentelės duomenys</a>
</body>
</html>