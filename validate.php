<?php
    // Defined as constants so that they can't be changed
    DEFINE ('DB_USER', 'root');
    DEFINE ('DB_PASSWORD', '');
    DEFINE ('DB_HOST', 'localhost');
    DEFINE ('DB_NAME', 'database_contact');
    // $dbc will contain a resource link to the database
    // @ keeps the error from showing in the browser
    $dbc = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
    OR die('Could not connect to MySQL: ' .mysqli_connect_error());

    function test_input($data) {
      
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
       
    if ($_SERVER["REQUEST_METHOD"]== "POST") {
          
        $adminname = test_input($_POST["adminname"]);
        $password = test_input($_POST["password"]);
        $query = "SELECT * FROM adminlogin";
        
        $users = @mysqli_query($dbc, $query);
          
        foreach($users as $user) {
              
            if(($user['adminname'] == $adminname) && 
                ($user['password'] == $password)) {
                    header("Location: adminpage.php");
            }
            else {
                header("Location: login.php");
            }
        }
    }
      
    ?>