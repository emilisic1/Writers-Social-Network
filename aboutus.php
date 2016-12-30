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

  <div class="red bijela-pozadina">
  <div class="kolona jedan"></div>
  <div class="kolona dva">
    <div id="naslov">
      Stories you will love!
    </div>

    <div id="opis">
      Whatever you’re into, there is something you’ll love on WSN.
      And if you can’t find exactly what you’re looking for, you have the power to create it yourself.

      <br /><br />

      The quick, brown fox jumps over a lazy dog. DJs flock by when MTV ax quiz prog. Junk MTV quiz graced by fox whelps. Bawds jog, flick quartz, vex nymphs. Waltz, bad nymph, for quick jigs vex! Fox nymphs grab quick-jived waltz. Brick quiz whangs jumpy veldt fox. Bright vixens jump; dozy fowl quack. Quick wafting zephyrs vex bold Jim. Quick zephyrs blow, vexing daft Jim. Sex-charged fop blew my junk TV quiz. How quickly daft jumping zebras vex.

        <br /><br />

      Two driven jocks help fax my big quiz. Quick, Baz, get my woven flax jodhpurs! "Now fax quiz Jack!" my brave ghost pled.

        <br /><br />
        <br /><br />
    </div>
  </div>
  <div class="kolona jedan"></div>


</div>




</div>

</div>
</body>
</html>
