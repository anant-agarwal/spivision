<html>
<head>
	<title>
		videos
	</title>
	<link href='spivis.css' rel='stylesheet' type='text/css'>
</head>
<!--<body>
		//$connect=mysql_connect("localhost","root","root");
		//if(!$connect)
		//{
		//die("connection unsuccesful:".mysql_error());
		//}
		//mysql_select_db("test",$connect);
		
		<div>
		
		</div>
</body>-->
<body background='back.jpg'>
	<?php
		if(!isset($_GET['ved']))
		{header("Location:spivision.php");}
	?>
	<div id='head'>
		<center><i>SpIvIsIoN</I></center>
	</div>
	<div id='pagebody'>
		<!--///////////////////////////////////////////////QUICK ACCESS STARTS HERE **************************************-->
		<div id='menu'>
			<div id='quickimg'>&nbsp;</div>
			<!--<font size=5 color='#bc0a0f'><b><u>Quick Access</u><b></font>-->
			<?php
				$connect=mysql_connect("localhost","root","root");
					if(!$connect)
					{
						die("connection unsuccesful:".mysql_error());
					}
					mysql_select_db("test",$connect);
					$row=mysql_query("SELECT * FROM data WHERE infolder='images/'",$connect);
					if(!$row)
					{
						die("unable to select data".mysql_error());
					}
					echo"<table> <tr><td>";
					echo"<ul>";
						echo"<li>";
							echo"<a href='spivision.php'>HOME</a>";
						echo"</li>";
					for($m=0;$tabs=mysql_fetch_array($row);$m++)
					{
						echo"<li>";
							$next="spivision.php?next=".$tabs['infolder'].$tabs['next'];
							echo"<a href='$next'>";
							$len=strlen($tabs['data']);
							$title=substr($tabs['data'],0,$len-5);
							echo"$title";
							echo"</a>";
							recur($tabs);
						echo"</li>";
					}
					echo"</ul>";
					echo"</td></tr></table>";
	
					function recur($a)
					{
						if($a['next']=="video" || $a['next']=="")
						{
							return;
						}
						echo"<table><tr><td>";
						echo"<ul>";
							$abc=$a['infolder'].$a['next'];
							$subrow=mysql_query("SELECT * FROM data WHERE infolder='$abc'") or die("unablle".mysql_error());
							while($subtab=mysql_fetch_array($subrow))
							{
								echo"<li>";
									$len=strlen($subtab['data']);
									$title=substr($subtab['data'],0,$len-5);
									if($subtab['next']=="video")
									{
										$next="video.php?ved=".$subtab['infolder'].$title.".ogv";
										echo"<a href='$next'>";
									}
									else
									{
										$next="spivision.php?next=".$subtab['infolder'].$subtab['next'];
										echo"<a href='$next'>";
									}
									echo"$title";
									echo"</a>";
									recur($subtab);
								echo"</li>";
							}
						echo"</ul>";
						echo"</td></tr></table>";
					}
				mysql_close($connect);
			?>

		</div>
			
		<!--	/*echo"<div style='float:left width:100px'>";
				echo"Quick Access";
				$menu=$row;
				for($m=0;$tabs=mysql_fetch_array($menu);$m++)
				{
					<ul>
				}
			echo"<div>";*/-->
			<!--////////////////////////////////////central imagess/////////////////////////////////////////////////////////////////////////-->

	<?php
			echo"<div style='flat:right' id='img-updt'>";
				echo"<div style='float:left' id='img'>";
				?>
				
					<video controls="controls" width = "550" loop autoplay >
						<source src="<?=$_GET['ved']?>" type= "video/ogg">
							low browser support try switching to firefox
					</video>
	<?php
				echo"</div>";
	///////////////////////////////////////////////////////////////////LATEST  BLOCK///////////////////////////////////////////////////////////
				echo"<div id='latest' style='float:right'>";
						echo"<div id='relatedimg'>&nbsp;</div>";
						//echo"<font size=4 color='#34353e'><b>Related Videos</b></font>";
						//echo"<hr>";
						echo"<marquee direction='up' height='300px' onmouseover='this.scrollAmount=0' onmouseout='this.scrollAmount=2' scrollamount='2' loop='true'>";
							$connect=mysql_connect("localhost","root","root");
							mysql_select_db("test",$connect);
							$nm=$_GET['nm'].".jpeg";
							//echo"$nm";
							$xyz=mysql_query("SELECT * FROM data WHERE data='$nm'",$connect) or die(mysql_error());
							
							$inf=mysql_fetch_array($xyz);
							$val=$inf['views']+1;
							mysql_query("UPDATE data SET views=$val WHERE data='$nm' AND infolder='$inf[infolder]'") or die(mysql_error());
							$vids=mysql_query("SELECT * FROM data WHERE next='video' AND infolder='$inf[infolder]' ORDER BY datetime DESC",$connect);
							while($video=mysql_fetch_array($vids))
							{
								$path=$video['infolder'];
								$len=strlen($video['data']);
								$name=substr($video['data'],0,$len-5);
								$vidloc=$path.$name.".ogv";
								if($_GET['nm']!=$name)
								{
									echo"views:".$video['views'];
									echo"<br/><a href=video.php?ved=$vidloc>".$name."</a>\t\t&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" ;
									echo"<br/><br/>";
								}
							}
						echo"</marquee>";
						echo"<hr>";
				echo"</div>";
			echo"</div>";
			//mysql_close($connect);
		?>
	</div>
	<div style='clear:both'></div>
	<div id='footer'>
		
		powered by: <b><u>Spider Tm</u></b> <br/>
		for any suggestions,feedback,or comments<br/> contact:106109009@nitt.edu
	</div>
</body>
</html>
