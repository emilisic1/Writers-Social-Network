<?php
  session_start(); 
  /* Getting trenutni unosi */
  $xml = simplexml_load_file("xml/stories.xml");

  if(isset($_GET['id'])){
    $fill = array();
    $xml = simplexml_load_file("xml/stories.xml");
    foreach($xml->item as $key => $item)
    {
      if($item->id == $_GET['id']){
        $fill['title'] = htmlspecialchars($item->title);
        $fill['story'] = htmlspecialchars($item->story);
      }
    }
  }else header('Location: 404.php');
  
  
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
      <?=$fill['title'];?>
    </div>
    <p>
      <?=$fill['story'];?>
    </p>
  </div>
  <div class="kolona jedan"></div>
</div>


</div>
</body>
</html>
