<?php
    include 'shared.php';
    startPage();
    checkUserSession();
?>
<!DOCTYPE html>
<html>
<head>
<!--in html, there are always four main parts in head: <title>, <metadata>, <script>, and <style> -->
<title>checkuser</title>
</head>
<body>
<?php
	//add @ before variable in order to deal with undefined index/variable notice
	@$username=$_POST['username'];
	@$password=$_POST['password'];

   // connect to mysql database
    $link=connectDB();

	$esc_username = mysqli_real_escape_string($link,$username);
	$esc_password = mysqli_real_escape_string($link,$password);

	$result = mysqli_query($link, "SELECT username, password FROM Account WHERE username='$esc_username' AND password='$esc_password' ");

	// use error_log function to check and print out error about a statement by itself if it happened   
    if(!$result)
    {
     error_log("something wrong about mysqli_query", 0);
     }   
     
	 // fetch the query result in order to check the data entered and the mysql kept.
        $row = mysqli_fetch_array($result, MYSQLI_NUM); 
 
	 // finally check the data entered and the mysql kept
       if ($row[0]==$username && $row[1]==$password)
       {
        echo "succeed!";
        echo "<script>url=\"search.php\";window.location.href=url;</script>"; //set script in order to move from this php to another php
       }
        else 
       {
        echo "not found";
       }
       
       mysqli_free_result($result);
       mysqli_close($link);       
?>

</body>
</html>

