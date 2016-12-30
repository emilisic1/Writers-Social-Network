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
        <form action="" method="get">
          <input type="text" name="pojam" onkeyup="pretraga();" id="input-pretraga" class="pretraga-pojam" placeholder="Search parametar" value="<?php if(isset($_GET['pojam'])) echo $_GET['pojam'];?>" />
          <input type="submit" name="search-triggger" value="Search" />
        </form>
        <div id="results">
            <?php

              function like_match($pattern, $subject)
              {
                  $pattern = str_replace('%', '.*', preg_quote($pattern, '/'));
                  return (bool) preg_match("/^{$pattern}$/i", $subject);
              }

              if(isset($_GET['pojam']) && $_GET['pojam'] != ""){
                  $pojam = $_GET['pojam'];
                  $res = array();

                  $xml = simplexml_load_file("xml/stories.xml");
                  $i = 0;
                    foreach($xml->item as $key => $item)
                    {
                      $ubaci = false;

                        if(like_match($pojam.'%', $item->title)) $ubaci = true;
                        if(like_match($pojam.'%', $item->story)) $ubaci = true;

                        if($ubaci){
                          $res[$i]['id'] = $item->id;
                          $res[$i]['title'] = $item->title; 
                          $res[$i]['story'] = $item->story;
                          $i++;
                        }
                    }

                    ?>
                    <table style="width: 100%;">
                        <tr>
                          <td style="width:20%;font-weight: bold;border-bottom: 1px solid #d5d5d5;padding-bottom:10px;margin-bottom: 10px;">ID</td>
                          <td style="width: 60%;font-weight: bold;border-bottom: 1px solid #d5d5d5;padding-bottom:10px;margin-bottom: 10px;">Title</td>
                          <td style="width: 20%;font-weight: bold;border-bottom: 1px solid #d5d5d5;padding-bottom:10px;margin-bottom:10px;">Action</td>
                        </tr>
                    <?php

                    foreach($res as $item){
                      ?>
                      <tr>
                              <td><?=$item['id'];?></td>
                              <td><a href="show.php?id=<?=$item['id'];?>"><?=htmlspecialchars($item['title']);?></a></td>
                              <td>
                                <?php if(isset($_SESSION['user'])){ ?>
                                  <form action="" method="post">
                                    <input type="hidden" name="story_id" value="<?=$item['id'];?>"/>
                                    <input type="submit" name="delete" value="Delete" />
                                  </form>
                                <?php } ?>
                              </td>
                            </tr>
                      <?php
                    }

                    ?></table><?php
                }
              ?>
        </div>
      </div>
      <div class="kolona jedan"></div>
    </div>
  </div>
</div>
<script src="javascript.js"></script>
</body>
</html>