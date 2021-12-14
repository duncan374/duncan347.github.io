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

    $sql = 'DELETE FROM submissions WHERE Id = "'.$_POST['id'].'"'; 
    if (mysqli_query($dbc, $sql)){
        header("Location: adminpage.php");
        exit;
    } else {
        echo '<script>alert("Record could not be successfully deleted!")</script>';
    }
?>