<?php
  if (isset($_POST["submit"])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $human = intval($_POST['human']);
    $from = 'ASA web contact form'; 
    $to = 'utexasastronomy@gmail.com'; 
    $subject = '**Message from ASA website**';
    
    $body ="From: $name\n E-Mail: $email\n Message:\n $message";
    // Check if name has been entered
    if (!$_POST['name']) {
      $errName = 'Please enter your name';
    }
    
    // Check if email has been entered and is valid
    if (!$_POST['email'] || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
      $errEmail = 'Please enter a valid email address';
    }
    
    //Check if message has been entered
    if (!$_POST['message']) {
      $errMessage = 'Please enter your message';
    }
    //Check if simple anti-bot test is correct
    if ($human !== 5) {
      $errHuman = 'Your anti-spam is incorrect';
    }
// If there are no errors, send the email
if (!$errName && !$errEmail && !$errMessage && !$errHuman) {
  if (mail ($to, $subject, $body, $from)) {
    $result='<div class="alert alert-success">Thank You! We will be in contact!</div>';
  } else {
    $result='<div class="alert alert-danger">Sorry there was an error sending your message. Please try again later.</div>';
  }
}
  }
?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="author" content="Kevin Singh ksingh@utexas.edu">

    <title>Astronomy Students Association</title>
    <link rel="icon" type="image/png" href="favicomatic2/favicon-32x32.png" sizes="32x32" />
    <link rel="icon" type="image/png" href="favicomatic2/favicon-16x16.png" sizes="16x16" />
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="font-awesome-4.4.0/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="social-buttons-3.css">
    <link rel="stylesheet" href="main.css">
  </head>

	<body>
		<!-- Navigation bar content -->
		<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
			<div class="container">

				<!-- Brand and toggle get grouped for better mobile display -->
    			<div class="navbar-header">
      				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse"> <!-- aria-expanded="false"> -->
      			    <span class="sr-only">Toggle navigation</span>
        			  <span class="icon-bar"></span>
        				<span class="icon-bar"></span>
        			  <span class="icon-bar"></span> 
      				</button>
      				<a class="navbar-brand" href="index.html">
      					<img alt="ASA" src="favicomatic3/apple-touch-icon-57x57.png">
      				</a>
    			</div> <!-- /.navbar-header -->

    			<!-- Navbar links, forms and other content for toggling -->
    			<div class="collapse navbar-collapse"> <!-- id="#asa-navbar-collapse"> -->
            <ul class="nav navbar-nav navbar-right">
              <li><a href="index.html">Home</a></li>
              <li><a href="about.html">About</a></li>
              <li><a href="gallery.html">Gallery</a></li>
              <li><a href="events.html">Events</a></li>
              <li class="active"><a href="contact.php">Contact</a></li>
            </ul>
    			</div> <!-- /.collapse navbar-collapse -->
			</div> <!-- /.container -->
		</nav>

    <div class="container">
      <div class="row"> <br>
        <div class="col-md-8">
          <h3>Get in touch with us!</h3> <br>

        <form class="form-horizontal" role="form" method="post" action="contact.php">
          
          <div class="form-group">
            <label for="name" class="col-sm-2 control-label">Name</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="name" name="name" placeholder="First & Last Name" value="<?php echo htmlspecialchars($_POST['name']); ?>">
              <?php echo "<p class='text-danger'>$errName</p>";?>
            </div>
          </div>
          <div class="form-group">
            <label for="email" class="col-sm-2 control-label">Email</label>
            <div class="col-sm-10">
              <input type="email" class="form-control" id="email" name="email" placeholder="example@domain.com" value="<?php echo htmlspecialchars($_POST['email']); ?>">
              <?php echo "<p class='text-danger'>$errEmail</p>";?>
            </div>
          </div>
          <div class="form-group">
            <label for="message" class="col-sm-2 control-label">Message</label>
            <div class="col-sm-10">
              <textarea class="form-control" rows="4" name="message"><?php echo htmlspecialchars($_POST['message']);?></textarea>
              <?php echo "<p class='text-danger'>$errMessage</p>";?>
            </div>
          </div>
          <div class="form-group">
            <label for="human" class="col-sm-2 control-label">2 + 3 = ?</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="human" name="human" placeholder="Your Answer">
              <?php echo "<p class='text-danger'>$errHuman</p>";?>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-10 col-sm-offset-2">
              <input id="submit" name="submit" type="submit" value="Send" class="btn btn-primary">
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-10 col-sm-offset-2">
              <?php echo $result; ?>  
            </div>
          </div>
        </form> 

      </div> <!-- /.col-md-8 -->
    </div> <!-- /.row --> 
  </div> <!-- /.container -->
  <br> <br> <br>


    <!-- Footer -->
    <footer class="footer">
      <div class="container">
        <a href="https://www.facebook.com/groups/AstronomyStudentsAssociation/">
        <button class="btn btn-mini btn-facebook"><i class="fa fa-facebook"></i></button></a>

        <a href="https://www.twitter.com/UTAstronomy/">
        <button class="btn btn-mini btn-twitter"><i class="fa fa-twitter"></i></button></a>
        <p class="pull-right">Designed by <a id="footer-mail" href="mailto: ksingh@utexas.edu">Kevin Singh</a></p>
      </div>
    </footer>
        
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>

</html> 