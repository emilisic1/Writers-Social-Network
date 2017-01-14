<?php

  $veza = new PDO("mysql:dbname=spirala4;host=localhost;charset=utf8", "edita", "1234");
  $veza->exec("set names utf8");

  $stories = simplexml_load_file("xml/stories.xml");

  foreach($stories-> as s)
  {
  $result = $veza->query("select Title, Story, Author from latest_stories");

  $check = false;
  if (!$result)
  {
     $error = $veza->errorInfo();
     print "SQL greška: " . $greska[2];
     exit();
  }

  foreach($result as $r)
  {
    alert($r["Author"]);
    if($r["Author"]==$s->Name)
    {
      $check = true;
    }
  }

  if($check == false){

    $sql = "INSERT INTO latest_stories (Title, Story, Author) VALUES ('".$s->Title."', '".$s->Story."','NULL')
    $veza->query($sql);
  }
}

?>
