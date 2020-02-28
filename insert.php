<?php 
//    $name = $_POST['name'];
//    $surname = $_POST['surname'];
//    echo 'It works!';
 //   $connection->close();
//}


// try
// {
//     $con = new PDO('mysql:host=localhost;dbname=formdata', 'root', '');
//     try
// catch (PDOException $e)
// {
//     print "Błąd połączenia z bazą!: " . $e->getMessage() . "<br/>";
//     die();
// }
// if($con)
// {
//     echo 'Successsss';
// }


try
{

$name = $_POST['name'];
$surname = $_POST['surname'];
$email = $_POST['email'];
$prefix = $_POST['prefix'];
$tel = $_POST['telephone'];
$telephone = $_POST['prefix'] . $_POST['telephone'];
$birthDate = $_POST['birthDate'];
$height = $_POST['height'];
$weight = $_POST['weight'];
$country = $_POST['country'];
$gender = $_POST['gender'];

    $pdo = new PDO('mysql:host=localhost;dbname=formdata', 'root', '');
    $dodaj = "INSERT INTO data (Name, Surname, Email, Telephone, Date_of_Birth, Height, Weight, Gender, Country)
    VALUES ('$name', '$surname', '$email', '$telephone', '$birthDate', '$height', '$weight', '$gender', '$country' )";
    $stmt = $pdo->prepare($dodaj); 
    $stmt->bindParam(":Name", $name, PDO::PARAM_STR);
    $stmt->bindParam(":Surname", $surname, PDO::PARAM_STR);
    $stmt->bindParam(":Email", $email, PDO::PARAM_STR);
    $stmt->bindParam(":Telephone", $telephone, PDO::PARAM_INT);
    $stmt->bindParam(":Date_of_birth", $birthDate, PDO::PARAM_INT);
    $stmt->bindParam(":Height", $height, PDO::PARAM_INT);
    $stmt->bindParam(":Weight", $weight, PDO::PARAM_INT);
    $stmt->bindParam(":Country", $country, PDO::PARAM_STR);
    $stmt->bindParam(":Gender", $gender, PDO::PARAM_STR);
    $stmt->execute();
    if ($stmt > 0) {
        echo "Dodano: ".$dodaj." wierszy<br/> ";




        if(isset($_POST['email'])) {
            require_once 'vendor/autoload.php';
            require_once 'mail.php';
      // Create the Transport
      $transport = (new Swift_SmtpTransport('poczta.o2.pl', 465,'SSL'))
        ->setUsername(EMAIL)
        ->setPassword(PASS)
      ;
      
      // Create the Mailer using your created Transport
      $mailer = new Swift_Mailer($transport);
      
      // Create a message
      $message = (new Swift_Message('Wonderful Subject'))
        ->setFrom([EMAIL => 'John Doe'])
        ->setTo([$_POST['email']])
        ->setBody('Thank You for registering')
        ;
      
      // Send the message
      if($mailer->send($message)){
        echo "Mail Send!!!!";
      
      }else{
        echo "Mail Not send!!!!!!!!!!";
      }
          }

    }
    else
    {
        echo "Blad podczas dodawania danych!<br/>";
    }

    $pdo = null;
}
catch (PDOException $e){
    echo 'Blad polaczenia:' . $e->getMessage();
}
header("refresh:5; url=table.php");


// $sql = "insert into data (Name, Surname, Email, Telephone, Date of Birth, Height, Weight, Gender, Country) 
// VALUES ('$name', '$surname', '$email', "$prefix . ' ' . $telephone", '$birthDate', '$hieght', '$weight', '$male . $female', '$country' )";
// $query=mysqli_query($con,$sql);
// if($query)
//     echo 'data inserted';
// header("refresh:8; url=index.html");


// $statement = $db->prepare("INSERT INTO tabela (imie, nazwisko) VALUES (:imie, :nazwisko)");
// foreach($data as $row)
// {
//     $statement->bindValue(':imie', $row['imie'], PDO::PARAM_STR);
//     $statement->bindValue(':nazwisko', $row['nazwisko'], PDO::PARAM_STR);
//     $statement->execute();
// }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>