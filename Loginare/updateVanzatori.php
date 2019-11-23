<?php
session_start();
$sessData = !empty($_SESSION['sessData'])?$_SESSION['sessData']:'';
if(!empty($sessData['status']['msg'])){
    $statusMsg = $sessData['status']['msg'];
    $statusMsgType = $sessData['status']['type'];
    unset($_SESSION['sessData']['status']);
}
?>
<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$mysqli = new mysqli("localhost", "root", "", "unanoua");
 
// Check connection
if($mysqli === false){
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}
$last_name=$_POST['last_name'];
$adress=$_GET['adress'];
$phone=$_GET['phone'];
$typebuy=$_GET['typebuy']
// Attempt update query execution
$sql = "UPDATE vanzatori" . " SET adress = '$adress', phone='$phone', typebuy='$typebuy'". 
"WHERE last_name = '$last_name'" ;
if($mysqli->query($sql) === true){
    echo "Records were updated successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
}
 
// Close connection
$mysqli->close();
?>

<?php }else{ ?>
    <?php

header('Location: index.php');
exit;
?>
    <?php } ?>
