<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<a href="index2.php">Grįžti į lentelės turinį</a>
<form style="margin-top: 20px;" action="index2.php" method="POST">
    <input type="text" name="edit-sav-vardas" value="<?php echo $_GET['owner_name'] ?>">
    <input type="text" name="edit-aug-vardas" value="<?php echo $_GET['pet_name'] ?>">
    <input type="text" name="edit-aug-rusis" value="<?php echo $_GET['pet_type'] ?>">
    <input type="hidden" name="index" value="<?php echo $_GET['index'] ?>">
    <input type="submit" name="redaguoti" value="Redaguoti">
</form>
</body>
</html>
