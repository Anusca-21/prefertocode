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
<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">

<title>Shop Homepage - Start Bootstrap Template</title>

<!-- Bootstrap core CSS -->
<link href="ShopStart/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

<!-- Custom styles for this template -->
<link href="ShopStart/css/shop-homepage.css" rel="stylesheet">

</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
  <div class="container">
    <a class="navbar-brand" href="index.html">Nume Echipa</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="index.php">Home, Hello <?php echo $userData['last_name']; ?>
            <span class="sr-only">(current)</span>
          </a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link" href="validation.php"><?php echo $userData['type'];?></a>
         
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Locations</a>
        </li>
        <li class="nav-item">
        <a href="userAccount.php?logoutSubmit=1" class="nav-link logout">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<div class="container">

    <div class="row">

      <div class="col-lg-12">

        <h1 class="my-5 text-center" >Formular Vanzator</h1>
        <div class="list-group">
        <div class="regisFrm">
            <center>
        <form action="updateVanzatori.php" method="post">
            <input class=list-item type="text" name="last_name" placeholder="Last Name" required=""></br></br>
            <input class=list-item type="text" name="adress" placeholder="ADRESS" required=""></br></br>
            <input class=list-item type="text" name="phone" placeholder="PHONE" required=""></br></br>
            <input class=list-item type="text" name="typebuy" placeholder="Private/Company" required=""></br></br>
            <div class="send-button">
                <input type="submit" name="signupSubmit" value="CREATE ACCOUNT">
            </div>
        </form>
        </center>
    </div>
        </div>

      </div>
</div>
    <?php } ?>
