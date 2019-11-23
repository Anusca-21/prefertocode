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
        if(!empty($sessData['userLoggedIn']) && !empty($sessData['userID'])){
            include 'user.php';
            $user = new User();
            $conditions['where'] = array(
                'id' => $sessData['userID'],
            );
            $conditions['return_type'] = 'single';
            $userData = $user->getRows($conditions);
    ?>

<?php if($userData['type']=='Vanzator'){
            header('Location: vanzator.php');
            exit;
            }elseif($userData['type']=='Cumparator'){
                header('Location: ShopStart/legume.php');
            exit;
            } ?>

<?php }else{ ?>
    <?php

header('Location: index.php');
exit;
?>
    <?php } ?>
