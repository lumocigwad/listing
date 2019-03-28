<?php 
include 'includes/session.php';
$id=80;
try{
$stmt= $conn->prepare("SELECT * FROM products WHERE id=43");
$stmt->execute();
$select=$stmt->fetch();
echo $select['units']-1;
    
    }
    catch(PDOException $e){
        echo "There is some problem in connection: " . $e->getMessage();
    }
    $pdo->close();

 ?>




