<?php
  session_start(); 
  /* Getting trenutni unosi */
  $xml = simplexml_load_file("xml/stories.xml");

  if(!isset($_SESSION['user'])) header('Location: index.php');

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


  if($_POST['edituj']){
    $xml = simplexml_load_file("xml/stories.xml");
    foreach($xml->item as $key => $item)
    {
      if($item->id == $_GET['id']){
        $item->title = $_POST['title'];
        $item->story = $_POST['story'];
      }
    }
    $xml->asXML("xml/stories.xml");

    header('Location: index.php');
  }

  
  
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
  <div class="kolona dva">
    <div id="naslov">
      #EditYourStory
    </div>

    <div id="opis">
      A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart. I am alone, and feel the charm of existence in this spot, which was created for the bliss of souls like mine. I am so happy, my dear friend, so absorbed in the exquisite sense of mere tranquil existence, that I neglect my talents. I should be incapable of drawing a single stroke at the present moment; and yet I feel that I never was a greater artist than now. 
    </div>
  </div>

  <div class="kolona dva">
    <form action="" method="post">
      Title:<br>
      <input id="title" type="text" name="title" value="<?=$fill['title'];?>"><br>
      <div id="title-greska" class="greska"></div>
      Story:<br>
      <textarea id="story" type="text" name="story"><?=$fill['story'];?></textarea></br>
      <div id="story-greska" class="greska"></div>
     </br>
     <input type="submit" name="edituj" onclick="validirajCreate()" value="Submit">
    </form>
  </div>
</div>


</div>
</body>
</html>
