<?php
    $dbh = new PDO("mysql:host=localhost;dbname=formdata", "root",'');
    $id = $_GET['dl'];
    echo $id;
    
    $sth = $dbh->prepare("DELETE FROM data WHERE ID=$id");
   
    $sth->execute();
    var_dump($sth);
    
    if($dbh && $sth)
    {
        header("refresh:0.1; url=table.php");
    }
    else
    {
        echo "Record not Deleted";
    }

?>