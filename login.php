<?php
  session_start();

  if(isset($_SESSION['user'])) header('Location: index.php');

  if(isset($_POST['login'])){

    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $xml = simplexml_load_file("xml/admin.xml");

    foreach($xml->user as $user){

      if($user->username == $username){
        if($user->password == $password){
          $_SESSION['user']['username'] = $username;
        }
      }
    }
  }

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
        #Login
      </div>
    </div>

    <div class="kolona dva">
      <form action="" method="post">
        Username:<br>
        <input id="subject" type="text" name="username"><br>
        <div id="subject-greska" class="greska"></div>
        Password:<br>
        <input id="email" type="password" name="password"></br>
        <div id="email-greska" class="greska"></div>
       </br>
       <input type="submit" name="login" value="Submit">
      </form>
    </div>
  </div>



</div>

</div>

  <script src="javascript.js"></script>
</body>
</html>
