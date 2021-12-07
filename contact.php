<!DOCTYPE html>

<html lang="en">

  <head>

    <meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
    <title>UWEC Waterski and Wakeboard Team</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel='stylesheet' type='text/css' media='screen' href='css/contact.css'>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito">

  </head>

  <body>

    <header>

      <h1 class="header">UW - Eau Claire: Waterski and Wakeboard Team</h1>

      <div class="navbar">

        <a class="navbar-link" href="index.html">Home</a>
        <a class="navbar-link" href="practices.html">Practices</a>
        <a class="navbar-link" href="tournaments.html">Tournaments</a>
        <a class="navbar-link" href="executive.html">Executive Board</a>
        <a class="navbar-link" href="gallery.html">Photo Gallery</a>
        <a class="navbar-link" href="contact.html">Contact</a>
        <a class="navbar-link" href="affiliations.html">Affiliations</a>
        <a class="navbar-link" href="equipment.html">Equipment Use</a>
        <a class="navbar-link" href="events.html">Social Events</a>
        <a class="navbar-link" href="join.html">How to Join</a>

      </div>

    </header>

    <div class="content">

      <h1>Contact Us</h1>
      <p class="contacttext">For any questions or concerns you have, please email us or call us at 262-622-3449</p>

      <form action="contact.php" method="post" class="contactform">
          <p class="formrow">
          <label for="name">Your Name</label>
          <input type="text" id="name" name="name">
          </p>
          <p class="formrow">
          <label for="email">Your Email</label>
          <input type="email" id="email" name="email">
          </p>
          <p class="formrow">
          <label for="subject">Subject</label>
          <input type="text" id="subject" name="subject">
          </p>
          <p class="formrow">
          <label for="message">Message</label>
          <textarea id="message" name="message"></textarea>
          </p>
          <p class="formrow">
          <input type="submit" value="Submit">
          </p>
      </form>

    </div>
    
    <footer>
      <div class="footer">
        The Waterski and Wakeboard Team is a recognized Club Sports team at the University of Wisconsin - Eau Claire
      </div>
    </footer>

    

  </body>
  
</html>

<?php
    // Defined as constants so that they can't be changed
    DEFINE ('DB_USER', 'root');
    DEFINE ('DB_PASSWORD', '');
    DEFINE ('DB_HOST', 'localhost');
    DEFINE ('DB_NAME', 'test2');
    // $dbc will contain a resource link to the database
    // @ keeps the error from showing in the browser
    $dbc = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
    OR die('Could not connect to MySQL: ' .
    mysqli_connect_error());

    $sql = 'INSERT INTO submissions (name, email, subject, message) VALUES ("'.$_POST['name'].'","'.$_POST["email"].'", "'.$_POST["subject"].'", "'.$_POST["message"].'")'; 
    if (mysqli_query($dbc, $sql)){
        echo '<script>alert("Your message has been submitted!")</script>';
    } else {
        echo '<script>alert("ERROR: Request could not be completed.")</script>';
    }

    mysqli_close($dbc);
?>