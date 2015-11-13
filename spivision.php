<html>
<head>
<title>
	SPIVISION
</TITLE>
<link href='spivis.css' rel='stylesheet' type='text/css'>
<script src='jquery.js' type='text/javascript'></script>
<script type='text/javascript'>
$(function(){
if(window.XMLHttpRequest)
			{
				xmlhttp=new XMLHttpRequest();
			}
			else
			{
				xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			}
		xmlhttp.open("POST","spivis_ajax.php?val=r&next=<?=$_GET['next']?>","true");
		xmlhttp.send();
		xmlhttp.onreadystatechange=function()
		{
			if(	xmlhttp.readyState==4 && xmlhttp.status==200)
				{var txt=xmlhttp.responseText;
					$("#realimg").html(txt);
				}
		}
});
$(document).ready(function(){
$("#p").click(function(){
		if(window.XMLHttpRequest)
			{
				xmlhttp=new XMLHttpRequest();
			}
			else
			{
				xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			}
		xmlhttp.open("POST","spivis_ajax.php?val=p&next=<?=$_GET['next']?>","true");
		xmlhttp.send();
		xmlhttp.onreadystatechange=function()
		{
			if(	xmlhttp.readyState==4 && xmlhttp.status==200)
				{var txt=xmlhttp.responseText;
					$("#realimg").html(txt);
				}
		}
});
$("#n").click(function(){
		if(window.XMLHttpRequest)
			{
				xmlhttp=new XMLHttpRequest();
			}
			else
			{
				xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			}
		xmlhttp.open("POST","spivis_ajax.php?val=n&next=<?=$_GET['next']?>","true");
		xmlhttp.send();
		xmlhttp.onreadystatechange=function()
		{
			if(	xmlhttp.readyState==4 && xmlhttp.status==200)
				{var txt=xmlhttp.responseText;
					$("#realimg").html(txt);
				}
		}
});
});

</script>
</head>
<body background='back.jpg'>
	<div id='head'>
		<center><i>SpIvIsIoN</i></center>
	</div>
	<div id='pagebody'>
		<!--///////////////////////////////////////////////QUICK ACCESS STARTS HERE **************************************-->
		<div id='menu'>
		<div id='quickimg'>&nbsp;</div>
			<!--
			<font size=5 color='#bc0a0f'><b><u>Quick Access</u><b></font>-->
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
										$next="video.php?nm=$title&ved=".$subtab['infolder'].$title.".ogv";
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
	/*	$connect=mysql_connect("localhost","root","root");
		if(!$connect)
		{
			die("connection unsuccesful:".mysql_error());
		}
		mysql_select_db("test",$connect);
		if(!isset($_GET['next'])){$_GET['next']="images/";}
		$row=mysql_query("SELECT * FROM data WHERE infolder='$_GET[next]' ORDER BY datetime DESC",$connect);
		if(!$row)
		{
			die("unable to select data".mysql_error());
		}*/
			echo"<div style='flat:right' id='img-updt'>";
				echo"<div style='float:left' id='img'>";
				echo"<div id='realimg'>";
				/*	echo"<table align='center' valign='center' border='1'>";
						echo"<tr>";
						for($i=1;$sel=mysql_fetch_array($row);$i++)
						{
							$len=strlen($sel['data']);
							$title=substr($sel['data'],0,$len-4);
							if($sel['next']=="vedio")
							{
								$ved=$sel['infolder'].$title."ogv";
								$next="vedio.php?ved=".$ved;
							}
							else
							{
								$next="spivision.php?next=".$sel['infolder'].$sel['next'];
							}
							//echo"$len";
							//echo"$title";
						//echo"img src=\"images/".$sel['data'].".png\" title='mitocw' class='im'/";
							echo"<td>";
								echo"<a href='$next'>";
									echo"<img src='".$sel['infolder'].$sel['data']."' title='$title' class='im'/>";
									//echo"img src='".$sel['infolder'].$sel['data']."' title='nptel' class='im'/";
								echo"</a>";
							echo"</td>";
							if($i%3==0)
							{echo"</tr>";
							echo"<tr>";}
						}
						echo"</tr>";
					echo"</table>";*/
				echo"</div>";
					echo"<p id='button' align='center'>";
						echo"<input type='button' name='p' value='Previous' id='p'/>";
						echo"<input type='button' name='n' value='Next' id='n'/>";
					echo"</p>";
				echo"</div>";
	///////////////////////////////////////////////////////////////////LATEST  BLOCK///////////////////////////////////////////////////////////
				echo"<div id='latest' style='float:right'>";
					echo"<div>";
						echo"<div id='latestimg'> &nbsp;</div>";
						//echo"<font size=4 color='#34353e'><b>Latest</b></font>";
						//echo"<hr>";
						echo"<marquee direction='up' height='150px' onmouseover='this.scrollAmount=0' onmouseout='this.scrollAmount=2' scrollamount='2' loop='true'>";
							$connect=mysql_connect("localhost","root","root");
							mysql_select_db("test",$connect);
							$vids=mysql_query("SELECT * FROM data WHERE next='video' ORDER BY datetime DESC LIMIT 10",$connect);
							while($video=mysql_fetch_array($vids))
							{
								$path=$video['infolder'];
								$place=$path;$vidloc=$path;
								$len=strlen($video['data']);
								$name=substr($video['data'],0,$len-5);
								$vidloc=$vidloc.$name.".ogv";
								$path=substr($path,7,-1);
								$path=str_replace("/","->",$path);
								echo"New video:\t";
								echo"<a href='video.php?nm=$name&ved=$vidloc'>".$name."</a>";
								echo"<br/>";
								echo"Added in:\t";
								echo"<a href=spivision.php?next='$place'>".$path."</a>";
								echo"<br/><br/>";
								
							}
						echo"</marquee>";
						echo"<hr>";
					echo"</div>";
					echo"<br/>";
					echo"<div id='most'>";
						echo"<div id='mostimg'>&nbsp;</div>";
						//echo"<font size=4 color='#34353e'><b>abcd</b></font></abc>";
						//echo"<hr>";
						echo"<marquee direction='up' height='150px' onmouseover='this.scrollAmount=0' onmouseout='this.scrollAmount=2' scrollamount='2' loop='true'>";
							$vids=mysql_query("SELECT * FROM data WHERE next='video' ORDER BY views DESC LIMIT 10",$connect);
							while($video=mysql_fetch_array($vids))
							{
								$path=$video['infolder'];
								$len=strlen($video['data']);
								$name=substr($video['data'],0,$len-5);
								$vidloc=$path.$name.".ogv";
								echo"views:".$video['views'];
								echo"<br/><a href=video.php?nm=$name&ved=$vidloc>".$name."</a>\t\t&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" ;
								echo"<br/><br/>";
							}
						echo"</marquee>";
						echo"<hr/>";
					echo"</div>";
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