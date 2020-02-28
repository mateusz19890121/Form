<style>
    td{
   padding: 8px; 
}
</style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php   

$dbh = new PDO("mysql:host=localhost;dbname=formdata", "root");
$sth = $dbh->prepare("SELECT * FROM data");
$sth->execute();
$result = $sth->fetchAll(PDO::FETCH_ASSOC);

echo "<table>";
echo "<tr>
<td>ID</td><td>Name</td> <td>Surname</td> <td>Email</td><td>Telephone</td><td>Date of birth</td><td>Height</td><td>Weight</td><td>Gender</td><td>Gender</td>
     </tr>";
foreach($result as $key => $row)
{
    echo "<tr>";
    echo "<td>". $row['ID'] . "</td>" . "<td>". $row['Name'] . "</td>". "<td>". $row['Surname']."</td>". "<td>" . $row['Email'] . "</td>" . "<td>" . $row['Telephone'] . "</td>" . "<td>". $row['Date_of_Birth'] . "</td>" . "<td>" . $row['Height'] ."</td>" . "<td>". $row['Weight'] . "</td>" ."<td>" . $row['Gender'] . "</td>" . "<td>" . $row['Country'] . "</td>" . "<td><a href='update.php?rn=" . $row['ID'] ."&nm=" . $row['Name'] . "&sn=" . $row['Surname'] . "&em=" . $row['Email']. "&tl=" . $row['Telephone'] . "&db=" . $row['Date_of_Birth'] . "&ht=" . $row['Height'] . "&wt=" . $row['Weight']."&gr=" . $row['Gender'] . "&cr=" .$row['Country']."'" .">Edit</a></td><td><a href='delete.php?dl=" . $row['ID'] . "'".">Delete</a></td>";
    echo "</tr>";
}
echo "</table>";

?>


</body>
</html>
