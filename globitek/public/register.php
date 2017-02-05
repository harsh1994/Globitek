<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<?php
  require_once('../private/initialize.php');

  // Set default values for all variables the page needs.

  // if this is a POST request, process the form
  // Hint: private/functions.php can help

    // Confirm that POST values are present before accessing them.

    // Perform Validations
    // Hint: Write these in private/validation_functions.php

    // if there were no errors, submit data to database

      // Write SQL INSERT statement
      // $sql = "";

      // For INSERT statments, $result is just true/false
      // $result = db_query($db, $sql);
      // if($result) {
      //   db_close($db);

      //   TODO redirect user to success page

      // } else {
      //   // The SQL INSERT statement failed.
      //   // Just show the error, not the form
      //   echo db_error($db);
      //   db_close($db);
      //   exit;
      // }

?>

<?php $page_title = 'Register'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<?php
  $first_name = isset($_POST['first_name']) ? $_POST['first_name'] : '';
  $last_name = isset($_POST['last_name']) ? $_POST['last_name'] : '';
  $email = isset($_POST['email']) ? $_POST['email'] : '';
  $username = isset($_POST['username']) ? $_POST['username'] : '';
  $first_err="";
  $last_err="";
  $email_err="";
  $user_error="";
  if($_SERVER['REQUEST_METHOD'] == 'POST') 
  {
  // is a POST request

  	$first_err = has_valid_firstname($_POST['firstname']); 
	$firstname = $_POST['firstname'];
 
	$last_err = has_valid_lastname($_POST['lastname']); 
	$lastname = $_POST['lastname']; 
 
	$email_err = has_valid_email_format($_POST['email']); 
	$email = $_POST['email']; 
 
	$user_error = has_valid_username($_POST['username']); 
	$username = $_POST['username'];


    if($first_err==""&&$last_err==""&&$email_err==""&&$user_error=="") 
	{
		$conn = db_connect();
		$date = date('Y-m-d H:i:s');
		$sql = "INSERT INTO users (id, first_name,last_name,email,username,created_at)".
		 		"VALUES(NULL,'$firstname','$lastname','$email','$username','$date')";

		if($conn -> query($sql)==TRUE) {
			echo "New record created successfully";
			redirect_to("registration_success.php");
		}
		else {
			echo "Error: " . $sql . "<br>" . $conn->error;
			$conn->close();
			exit;
		}
	}
    
  } 
  else 
  {
  // is not a POST request
  }
?>

  <?php
    // TODO: display any form errors here
    // Hint: private/functions.php can help
		print("<li>".$first_err."<br>");
		print("<li>".$last_err."<br>");
		print("<li>".$email_err."<br>");
		print("<li>".$user_error."<br>");
  ?>

  <!-- TODO: HTML form goes here -->
  <div id="main-content">
  <h1>Register</h1>
  <p>Register to become a Globitek Partner.</p>
  <form action="register.php" method="post">
  First name:<br>
  <input type="text" name="firstname" value="<?php echo isset($_POST['firstname']) ? $_POST['firstname'] : '' ?>" />
  <br>
  Last name:<br>
  <input type="text" name="lastname" value="<?php echo isset($_POST['lastname']) ? $_POST['lastname'] : '' ?>" />
  <br>Email:<br>
  <input type="text" name="email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : '' ?>" />
  <br>Username:<br>
  <input type="text" name="username" value="<?php echo isset($_POST['username']) ? $_POST['username'] : '' ?>" />
  <br>
  <br>
  <input type="submit" class='btn btn-info' value="Submit" >
  </form>
 </div>


<?php include(SHARED_PATH . '/footer.php'); ?>
