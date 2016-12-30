<?php
  session_start(); 
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<head>
  <meta http-equiv="Content-type" content="text/html; charset=utf-8">
  <title>Home</title>
  <link rel="stylesheet" href="glavni.css">
  <link href='http://fonts.googleapis.com/css?family=Berkshire+Swash' rel='stylesheet' type='text/css'>
</head>
<body>
  <div id= "okvir">
    <div id="header">
      <h1> Writers Social Network </h1>
    </div>
    <div id="meni">
      <ul>
         <?php if(isset($_SESSION['user'])){ ?>
        <li><a href="logout.php">LOGOUT</a></li>
        <?php }else{ ?>
        <li><a href="login.php">LOGIN</a></li>
        <?php } ?>
        <li><a href="search.php">SEARCH</a></li>
        <li><a href="contact.php">CONTACT</a></li>
        <li><a href="aboutus.php">ABOUT US</a></li>
        <li><a href="create.php">CREATE</a></li>
        <li><a href="discover.php">DISCOVER</a></li>
        <li><a href="index.php">HOME</a></li>
      </ul>
    </div>
    <div id="nevidljivi">
      <img id="nevidljivi-slika" src="" />
    </div>
    <div class="red bijela-pozadina">
      <div class="kolona jedan">
        <img class="discover-slika" id="sl1" onclick="prikaz_slike('sl1')" src="slike/prva.jpg" />
      </div>
      <div class="kolona jedan">
        <img class="discover-slika" id="sl2" onclick="prikaz_slike('sl2')" src="slike/druga.jpg" />
      </div>
      <div class="kolona jedan">
        <img class="discover-slika" id="sl3" onclick="prikaz_slike('sl3')" src="slike/treca.jpg" />
      </div>
      <div class="kolona jedan">
        <img class="discover-slika" id="sl4" onclick="prikaz_slike('sl4')" src="slike/cetvrta.jpg" />
      </div>
    </div>
  </div>
</body>
</html>