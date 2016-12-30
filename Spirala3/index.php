<?php
  session_start(); 

  error_reporting(E_ALL);
  ini_set('display_errors',1);
  ini_set('display_startup_errors',1);
  error_reporting(-1);

  require('fpdf/fpdf.php');

  if(isset($_POST['delete'])){
    $id = (int)$_POST['story_id'];

    $xml = simplexml_load_file("xml/stories.xml");
    foreach($xml->item as $key => $item)
    {
      if($item->id == $id){
        $dom=dom_import_simplexml($item);
        $dom->parentNode->removeChild($dom);
      }
    }
    $xml->asXML("xml/stories.xml");
  }

  if(isset($_POST['downloadcsv'])){
    if(file_exists("xml/stories.xml")) 
    {
      $dataxml = simplexml_load_file("xml/stories.xml");
      $f = fopen('csv/export.csv', 'w');
      createCsv($dataxml, $f);
      fclose($f);

      header('Content-Type: application/octet-stream');
      header("Content-Transfer-Encoding: Binary"); 
      header("Content-disposition: attachment; filename=\"" . basename("csv/export.csv") . "\""); 
      readfile("csv/export.csv");
    }
  }

  if(isset($_POST['downloadpdf'])){

    $pdf = new FPDF();

    $pdf->AddPage();
    $pdf->SetAuthor('Edita Milisic');
    $pdf->SetTitle('Newsletter');
    $pdf->SetFont('Helvetica', 'B', 14);
    $pdf->SetTextColor(50,60,100);

    $xml = simplexml_load_file("xml/stories.xml");
    foreach($xml->item as $key => $item)
    {
      $txt = $item->title.' | '.$item->story.'\n';
      $pdf->Write(8, $txt);
    }

    $pdf->Output('pdf/newslettter.pdf', 'I');

    header('Content-Type: application/octet-stream');
    header("Content-Transfer-Encoding: Binary"); 
    header("Content-disposition: attachment; filename=\"" . basename("pdf/newsletter.pdf") . "\""); 
    readfile("pdf/newsletter.pdf");
  }
  

  /* XML TO CSV function */
  function createCsv($xml,$f)
  {
      foreach ($xml->children() as $item) 
      {
        $hasChild = (count($item->children()) > 0)?true:false;

      if( ! $hasChild)
      {
        $put_arr = array($item->getName(),$item); 
        fputcsv($f, $put_arr ,',','"');
      }else{
        createCsv($item, $f);
      }
    }
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
    <div id="opis">
      <p ><b> Welcome to Writers Social Networks - a uniqe place for all young and ambitious writers.
        Wheater you want to write and share your stories with other writers,
      find the most popular stories in various genres or be part of very intense and creative competitions, you can find it all here.</b></p>
    </div>

    <div style="background: #fefefe;border:1px solid #d5d5d5;padding:15px;">
      <div id="naslov">
        Latest storeis 
      </div>

      <table style="width: 100%;">
        <tr>
          <td style="width:20%;font-weight: bold;border-bottom: 1px solid #d5d5d5;padding-bottom:10px;margin-bottom: 10px;">ID</td>
          <td style="width: 60%;font-weight: bold;border-bottom: 1px solid #d5d5d5;padding-bottom:10px;margin-bottom: 10px;">Title</td>
          <td style="width: 20%;font-weight: bold;border-bottom: 1px solid #d5d5d5;padding-bottom:10px;margin-bottom:10px;">Action</td>
        </tr>

        <?php
            $xml = simplexml_load_file("xml/stories.xml");

            foreach($xml->item as $item){
              ?>
                <tr>
                  <td><?=$item->id?></td>
                  <td><a href="show.php?id=<?=$item->id;?>"><?=htmlspecialchars($item->title);?></a></td>
                  <td>
                    <?php if(isset($_SESSION['user'])){ ?>
                      <form action="" method="post">
                        <input type="hidden" name="story_id" value="<?=$item->id;?>"/>
                        <input type="submit" name="delete" value="Delete" />
                      </form>
                    <?php } ?>
                  </td>
                </tr>
              <?php
            } 
        ?>
        <tr>
          <td>
        </tr>

      </table>

      <form action="" method="post">
        <input type="submit" name="downloadcsv" value="Downlaod CSV" />
      </form>

      <form action="" method="post">
        <input type="submit" name="downloadpdf" value="Downlaod PDF" />
      </form>

    </div>
  </div>
  <script src="javascript.js"></script>
</body>
</html>