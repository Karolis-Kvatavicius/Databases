<?php

$servername = "localhost";
$username = "root";
$password = "123";

// Prisijungiam prie serverio
$conn = mysqli_connect($servername, $username, $password, 'testbase');

// Patikrinam prisijungimą
if (!$conn) {
   die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully<br>";

$sql = "DROP TABLE Savininkai_ir_gyvunai";
if (mysqli_query($conn, $sql)) {
    echo "Table Savininkai_ir_gyvunai deleted successfully";
} else {
    echo "Error deleting table: " . mysqli_error($conn);
}

$sql = "CREATE TABLE Savininkai_ir_gyvunai (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    Savininko_vardas VARCHAR(30) NOT NULL UNIQUE,
    Augintinio_vardas VARCHAR(30) NOT NULL,
    Augintinio_rusis VARCHAR(20),
    reg_date TIMESTAMP
    )";
   
    if (mysqli_query($conn, $sql)) {
        echo "Table Savininkai_ir_gyvunai created successfully";
    } else {
        echo "Error creating table: " . mysqli_error($conn);
    }


    $sql = "INSERT INTO Savininkai_ir_gyvunai (Savininko_vardas, Augintinio_vardas, Augintinio_rusis)
    VALUES ('Jonukas', 'Pupis', 'Katinas');";
    $sql .= "INSERT INTO Savininkai_ir_gyvunai (Savininko_vardas, Augintinio_vardas, Augintinio_rusis)
    VALUES ('Kazimieras', 'Margis', 'Suo');";
    $sql .= "INSERT INTO Savininkai_ir_gyvunai (Savininko_vardas, Augintinio_vardas, Augintinio_rusis)
    VALUES ('Onute', 'Klaidas', 'Briedis')";

    
    if (mysqli_multi_query($conn, $sql)) {
       echo "New records created successfully";
    } else {
       echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    

 