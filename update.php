<?php


$_GET['rn'];
$_GET['nm'];
$_GET['sn'];
$_GET['em'];
$_GET['tl'];
$_GET['db'];
$_GET['ht'];
$_GET['wt'];
$_GET['gr'];
$_GET['cr'];


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        ID:<input type="number" name="ID" value="<?php echo $_GET['rn']?>">
        Name<input type="text" name="name" value="<?php echo $_GET['nm']?>">
        Surname<input type="text" name="surname" value="<?php echo $_GET['sn']?>">
        Email<input type="text" name="email" value="<?php echo $_GET['em']?>">
        Telephone<input type="number" name="telephone" value="<?php echo $_GET['tl']?>">
        Date of Birth:<input type="date" name="date_of_birth" value="<?php echo $_GET['db']?>">
        Height<input type="number" name="height" value="<?php echo $_GET['ht']?>">
        Weight<input type="number" name="weight" value="<?php echo $_GET['wt']?>">
        Gender<input type="text" name="gender" value="<?php echo $_GET['gr']?>">
        Country<input type="text" name="country" value="<?php echo $_GET['cr']?>">
        <input type="submit" name="submit" value="update">
    </form>
</body>
</html>

<?php

if(!empty($_POST))
{
    $id = $_POST['ID'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $telephone = $_POST['telephone'];
    $date_of_birth = $_POST['date_of_birth'];
    $height = $_POST['height'];
    $weight = $_POST['weight'];
    $gender = $_POST['gender'];
    $country = $_POST['country'];
    $dbh = new PDO("mysql:host=localhost;dbname=formdata", "root");
    $sth = $dbh->prepare(" UPDATE data SET Name='$name', Surname='$surname', Email='$email', Telephone='$telephone', Date_of_Birth='$$date_of_birth', Height='$height', Weight='$weight', Gender='$gender', Country='$country' WHERE ID='$id'");
    $sth->execute();
    // $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    if($dbh && $sth)
    {
        echo "Record Updateed Succesfuly";
        header("refresh:2; url=table.php");
    }
    else
    {
        echo "Record not Updated";
    }
}


