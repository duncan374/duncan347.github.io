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
        <?php
          // Get a connection for the database
          // Defined as constants so that they can't be changed
          DEFINE ('DB_USER', 'root');
          DEFINE ('DB_PASSWORD', '');
          DEFINE ('DB_HOST', 'localhost');
          DEFINE ('DB_NAME', 'database_contact');
          // $dbc will contain a resource link to the database
          // @ keeps the error from showing in the browser
          $dbc = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
          OR die('Could not connect to MySQL: ' .mysqli_connect_error());

          // Create a query for the database
          $query = "SELECT Id, name, email, subject, message FROM submissions";

          // Get a response from the database by sending the connection
          // and the query
          $response = @mysqli_query($dbc, $query);

          // If the query executed properly proceed
          if($response){

            echo '<table align="center" cellspacing="5" cellpadding="8" style= border-radius: 10px;">
              <tr >
                <td align="center"><b>Id</b></td>
                <td align="center"><b>Name</b></td>
                <td align="center"><b>Email</b></td>
                <td align="center"><b>Subject</b></td>
                <td align="center"><b>Message</b></td>
              </tr>';

            // mysqli_fetch_array will return a row of data from the query
            // until no further data is available
            while($row = mysqli_fetch_array($response)){

            echo '<tr><td align="center">' . 
            $row['Id'] . '</td><td align="center">' .
            $row['name'] . '</td><td align="center">' . 
            $row['email'] . '</td><td align="center">' .
            $row['subject'] . '</td><td align="center">' .
            $row['message'] . '</td>';

            echo '</tr>';
          }

          echo '</table>';

          } else {

            echo "Couldn't issue database query<br />";

            echo mysqli_error($dbc);

          }

          // Close connection to the database
          mysqli_close($dbc);
        ?>
        <form action="delete_submission.php" method="post">
            <h1><p align ='left'><u>SELECT ID TO DELETE</u></p></h1><br><br>
            <h2><b>ID: </b><input type="text" name="id"><br><br>
            <input type ="submit">
            </h2>
        </form>
    </div>
    
    <footer>
      <div class="footer">
        The Waterski and Wakeboard Team is a recognized Club Sports team at the University of Wisconsin - Eau Claire
      </div>
    </footer>

    

  </body>
  
</html>

