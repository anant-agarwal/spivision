<html>
<head>
<title>
admin
</title>
</head>
<body>
<?php
	if(isset($_POST['user']))
	{
		if($_POST['user']=="sms" && $_POST['passwd']=="matlab09")
		{
		session_start();
		$_SESSION['admin']=1;
		header("Location:admin_upload.php");
		}
	}
?>
		<form name='newthread' action='admin_spivision.php' method='post'>
			<table>
				<tr>
					<td>
						username
					</td>
					<td>
						<input type='text' name='user'/>
					</td>
				</tr>
				<tr>
					<td>
						password
					</td>
					<td>
						<input type='password' name='passwd'/>
					</td>
				</tr>
				<tr>
					<td colspan='2'>
						<input type='submit' value='post'>
					</td>
				</tr>
			</table>
		</form>
</body>
</html>