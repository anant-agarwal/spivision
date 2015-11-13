<html>
<head>
<title>
admin_uploads
</title>
</head>
<body>
<?php
	session_start();
	if($_SESSION['admin']!=1)
	header("Location:spivision.php");
	
	if(isset($_POST['upload']))
	{
		$connect=mysql_connect("localhost","root","root");
		if(!$connect)
		{
			die("connection unsuccesful:".mysql_error());
		}
		mysql_select_db("test",$connect);
		//echo"$_POST[infolder]";
		mysql_query("INSERT INTO data (infolder,data,next) VALUES ('$_POST[infolder]','$_POST[data]','$_POST[next]')",$connect) or die("unable".mysql_error());
	}
	
?>
		<a href='logoff.php'>logoff</a><br/>
		<b><u>NOTE:</u></b><br/>
		1.name of video and its image should be same.<br/>
		2.u need to place both in same folder.<br/>
		3.video must be in .ogg format.<br/>
		4.the last image should have <i>video</i> written in the feild <i>next</i> <br/>
		5.if the image doesnot correspond to any video i.e.it is for adding a category then u must go to the folder <br/> &nbsp;&nbsp;&nbsp;where image is to be kept and create a folder of same name.<br/>
		6.image should be 177 X 133 size with the name written on it otherwise it will destroy the position of all elments.<br/>
		7.QUICK ACESS is of only 3 level till now so make new directories accordingly.		
		<br/><br/><br/>
		<form name='newthread' action='admin_upload.php' method='post'>
			<table>
				<tr>
					<td>
						infolder
					</td>
					<td>
						<input type='text' name='infolder'/>
						<br/>
						(eg : images/nptel/ )
					</td>
				</tr>
				<tr>
					<td>
						file name
					</td>
					<td>
						<input type='text' name='data'/>
						<br/>(eg : compsci.jpeg)
					</td>
				</tr>
				<tr>
					<td>
						next(i.e. which folder should open on clicking)
					</td>
					<td>
						<input type='text' name='next'/>
						<br/>(eg : compsci/ )
					</td>
				</tr>
				<tr>
					<td colspan='2'>
						<input type='submit' name='upload' value='upload'>
					</td>
				</tr>
			</table>
		</form>
</body>
</html>