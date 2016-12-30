<?php
	session_start();

	function like_match($pattern, $subject)
	{
	    $pattern = str_replace('%', '.*', preg_quote($pattern, '/'));
	    return (bool) preg_match("/^{$pattern}$/i", $subject);
	}

	if(isset($_POST)){
		if($_POST['pojam']){
			$pojam = $_POST['pojam'];
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
	}
?>