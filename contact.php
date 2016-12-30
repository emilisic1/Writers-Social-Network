<?php
  session_start(); 
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <title>Contact</title>
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


  <div class="red bijela-pozadina">
    <div class="kolona dva">
      <div id="naslov">
        #ContactUs
      </div>

      <div id="opis">
        If you have questions or suggestions, we are here for you!
      </div>
    </div>

    <div class="kolona dva">
      <form>
        Subject:<br>
        <input id="subject" type="text" name="subject"><br>
        <div id="subject-greska" class="greska"></div>
        E-mail:<br>
        <input id="email" type="email" name="email"></br>
        <div id="email-greska" class="greska"></div>
        Message: <br>
        <input id="text1" type="text" name="message"><br>
        <div id="text1-greska" class="greska"></div>
       </br>
       <input type="submit" onclick="validirajKontaktFormu()" value="Submit">
      </form>
    </div>
  </div>



</div>

</div>

  <script src="javascript.js"></script>
</body>
</html>
