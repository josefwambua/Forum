
<?php require "../includes/header.php";?>
<?php require "../config/config.php"?>

<?php
//  check if the username is logged in, else redirect to the homepage
if(isset($_SESSION['username'])){
    header("Location: ".APPURL."");
}
// check if one of the fields are empty
if (isset($_POST)) {
    if (empty($_POST['email']) || empty($_POST['password'])) {
        echo "<script>alert('one or more fields are empty');</script>";
    } else {
        // get the data
        $email = $_POST['email'];
        $password = $_POST['password'];

        // check if the user exists in the database using their email
        $login = $conn->query("SELECT * FROM users WHERE email = '$email'");
        $login->execute();

        $fetch = $login->fetch(PDO::FETCH_ASSOC);
        // return one if the email exists on users
        if ($login->rowCount() > 0) {
            if (password_verify($password, $fetch['password'])) {
               
                // Sessions
                $_SESSION['username'] = $fetch['username'];
                $_SESSION['name'] = $fetch['name'];
                $_SESSION['user_id'] = $fetch['id'];
                $_SESSION['email'] = $fetch['email'];
                $_SESSION['user_image'] = $fetch['avatar'];


                header("location:".APPURL."");

                echo "<script>alert('Logged in')</script>";

            } else {
                echo "<script>alert('Email or password incorrect')</script>";
            }
        } else {
            echo "<script>alert('Password is incorrect')</script>";

        }
    }

}

?>

<!-- bootstrap containers for the login pages -->
<div class="container">
		<div class="row">
			<div class="col-md-8">
				<div class="main-col">
					<div class="block">
						<h1 class="pull-left">Login</h1>
						<h4 class="pull-right">A Simple Forum</h4>
						<div class="clearfix"></div>
						<hr>
						<form role="form" enctype="multipart/form-data" method="post" action="login.php">

							<div class="form-group">
							<label>Email Address*</label> <input type="email" class="form-control"
							name="email" placeholder="Enter Your Email Address">
							</div>

					<div class="form-group">
                        <label>Password*</label> <input type="password" class="form-control"
                    name="password" placeholder="Enter A Password">
                    </div>

			        <input name="submit" type="submit" class="color btn btn-default" value="Login" />
        </form>
					</div>
				</div>
			</div>

<?php require '../includes/footer.php';?>
