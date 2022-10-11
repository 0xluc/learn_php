<?php
    defined('DB_SERVER') ? null : define("DB_SERVER", "localhost");
	defined('DB_USER')   ? null : define("DB_USER", "root");
	defined('DB_PASS')   ? null : define("DB_PASS", "");
	defined('DB_NAME')   ? null : define("DB_NAME", "wordpress");    

	$mysqli = mysqli_connect( DB_SERVER, DB_USER, DB_PASS, DB_NAME);

	if ( !$mysqli ) {

		$connection = "Error: Unable to connect to MySQL." . PHP_EOL;
		$connection .= "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
		$connection .= "Debugging error: " . mysqli_connect_error() . PHP_EOL;

		exit( $connection );

	}else{
		
		$connection = "Connection success - Host information: " . mysqli_get_host_info( $mysqli );
		
	}
    echo "<h1>$connection</h1>";
    $showtables= mysqli_query($mysqli, "SHOW TABLES FROM wordpress");
    while($table = mysqli_fetch_array($showtables)) { 
        echo($table[0] . "<br>");  
    }
    $showtables= mysqli_query($mysqli, "SELECT * FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = N'wp_users'");
    while($table = mysqli_fetch_array($showtables)) { 
        foreach($table as $key => $value){
            echo $key . " : " . $value . "<br>";
        }
    }

    $showtables= mysqli_query($mysqli, "SELECT user_email FROM wp_users");
    while($table = mysqli_fetch_array($showtables)) { 
        foreach($table as $key => $value){
            echo $key . " : " . $value . "<br>";
        }
    }

?>