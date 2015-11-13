<?php
session_start();
//if(!isset($_SESSION['num']))
if($_GET['val']=='r')
{
	$_SESSION['num']=0;
	//echo"$_SESSION[num]";
}
if($_GET['val']=='')
{
	header("Location:spivision.php");
}
//echo"$_GET[val]";
//echo"$_GET[next]";
if($_GET['val']=='p')
{
	if($_SESSION['num'])
	$_SESSION['num']-=9;
	//echo"$_SESSION[num]";
}
		$connect=mysql_connect("localhost","root","root");
		if(!$connect)
		{
			die("connection unsuccesful:".mysql_error());
		}
		mysql_select_db("test",$connect);
		if($_GET['next']==""){$_GET['next']="images/";}
		$row=mysql_query("SELECT * FROM data WHERE infolder='$_GET[next]' ORDER BY datetime DESC",$connect);
		if(!$row)
		{
			die("unable to select data".mysql_error());
		}
		$abc=mysql_query("SELECT * FROM data WHERE infolder='$_GET[next]' ORDER BY datetime DESC",$connect);
		for($count=0;mysql_fetch_array($abc);$count++)//counting no. of entries
		{}
		//echo"$count";
		if($_GET['val']=='n')
		{
			if(($_SESSION['num']+9)<$count)
			$_SESSION['num']+=9;
			//echo"$_SESSION[num]";
		}

		//	echo"<div style='flat:right' id='img-updt'>";
				//echo"<div style='float:left' id='img'>";
					echo"<table align='center' valign='center' border='0'>";
						echo"<tr>";
						for($a=0;$a<$_SESSION['num'];$a++)
						{mysql_fetch_array($row);}
						for($i=1;($sel=mysql_fetch_array($row))&&($i<10);$i++)
						{
							$len=strlen($sel['data']);
							$title=substr($sel['data'],0,$len-5);
							if($sel['next']=="video")
							{
								$ved=$sel['infolder'].$title.".ogv";
								$next="video.php?nm=$title&ved=".$ved;
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
									echo"<img src='".$sel['infolder'].$sel['data']."' title='$title' class='im' alt='$title'/>";
									//echo"img src='".$sel['infolder'].$sel['data']."' title='nptel' class='im'/";
								echo"</a>";
							echo"</td>";
							if($i%3==0)
							{echo"</tr>";
							echo"<tr>";}
						}
						for(;$i<10;$i++)
						{
							echo"<td>";
									echo"<a href='#'><img src='comingsoon1.jpg' class='im'/></a>";
									//echo"img src='".$sel['infolder'].$sel['data']."' title='nptel' class='im'/";
							echo"</td>";
							if($i%3==0)
							{echo"</tr>";
							echo"<tr>";}
						}
						echo"</tr>";
					echo"</table>";
					//echo"<p id='button' align='center'>";
						//echo"<input type='button' name='p' value='previous' id='p'/> &nbsp;";
						///echo"<input type='button' name='n' value='next' id='n'/>";
				//	echo"</p>";
				//echo"</div>";
				mysql_close($connect);
				?>