<?php
session_start();
include('DbConnection/dbconnect.php');
// include('Common Page Header.php');
?>
<center>
<h2 style='color: red;'>.... Login ...</h2>
<form method="post">
	<table>
		<tr>
			<td>User</td>
			<td><input type="text" class="textbox" name="email" placeholder="Enter Your Email" required=""></td>
		</tr>
		<tr>
			<td>Password</td>
			<td><input type="password" class="textbox" name="password" placeholder="Password" required="" onChange="msg()"></td>
		</tr>
		<tr>
			<td><input type="submit" name="reset" value="reset"></td>
		</tr>
		<tr>
			<td><input type="reset" name="reset" value="reset"></td>
		</tr>
		
		<tr>
			<td>&nbsp;</td>
		</tr>

		<tr>
			<td colspan="2" align="center"><a href="UserRegistration.php">User SignUp</a></td>
		</tr>

		<tr>
			<td colspan="2" align="center"><a href="AgentRegistration.php">Agent SignUp</a></td>
		</tr>

	</table>

     
	<?php
	if (isset($_REQUEST['submit'])) {
		$email = $_REQUEST['email'];
		$password = $_REQUEST['password'];
		$qry = "SELECT * from login WHERE `username`='$email' AND `password`='$password' AND `status`='1'";
		$result = mysqli_query($conn, $qry);
		if ($result->num_rows > 0) {
			$data = $result->fetch_assoc();
			$uid = $data['uid'];
			$type = $data['type'];
			$_SESSION['uid'] = $uid;
			$_SESSION['username'] = $email;
			$_SESSION['type'] = $type;

	
			echo "<script>alert('Login Success')</script>";
			if ($type == "agent") {
				echo "<script>window.location='AgentHome.php'</script>";
			} else if ($type == "user") {
				echo "<script>window.location='UserHome.php'</script>";
			} else if ($type == "admin") {
				echo "<script>window.location='AdminHome.php'</script>";
			}
		} else {
			echo "<script>alert('Login failed');window.location('Login.php')</script>";
		}
	}

	// include('Common Page Footer.php');

	?>
</form>
</center>