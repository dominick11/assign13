<?php
    include 'shared.php';
    startPage();
    checkUserSession();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Search results</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="/DataTables-1.10.7/media/css/jquery.dataTables.css">
    <!-- jQuery -->
    <script type="text/javascript" charset="utf8" src="/DataTables-1.10.7/media/js/jquery.js"></script>  
    <!-- DataTables -->
    <script type="text/javascript" charset="utf8" src="/DataTables-1.10.7/media/js/jquery.dataTables.js"></script>
    <!-- the below script is to initialise the DataTable in html after building the connections with the above files--> 
    <script>
    $(document).ready( function () {
          $('#example').DataTable();
      } );
    </script>
</head>
<body>
<a href="logout.php"><button>Logout</button></a><br>
<?php
   $dropdownquery=$_POST['dropdownquery'];
   $query=$_POST['query'];

   $link=connectDB();
          
	switch($dropdownquery) {
		case "Rep": $rddq =  mysqli_query($link, "SELECT * FROM Sell WHERE Rep LIKE '%" .$query. "%' ORDER BY ID"); 
		break;
		case "Item":$rddq =  mysqli_query($link, "SELECT * FROM Sell WHERE Item LIKE '%" .$query. "%' ORDER BY ID"); 
		break;
		Default: echo "something wrong in dropdown query";	 
	 }
	 
    // echo the results into DateTable below
      
        echo "<table id=\"example\" class=\"display\" cellspacing=\"0\" width=\"100%\">";
          echo "<thead>
                <tr>
                <th>OrderDate</th>
                <th>Region</th>
                <th>Rep</th>
                <th>Item</th>
                <th>Units</th>
                <th>UnitCost</th>
                <th>Total</th>
                </tr>
                </thead><tbody>"; 
               
      $row = mysqli_fetch_array($rddq, MYSQLI_NUM); //notice mysqli_ is Case-sensive like MYSQLI_NUM!                          
   
     while($row = mysqli_fetch_array($rddq))
          { 
         // initiate new object,$changedate, with php date function below in order to change date display in mysql 
         $changedate=date("n/j/y",strtotime($row['OrderDate']));
          
         echo "<tr>
                <td> " . $changedate . "</td>
                <td> " . $row['Region'] . "</td>
                <td>" . $row['Rep'] . "</td>
                <td> " . $row['Item'] . "</td>
                <td>" . $row['Units'] . "</td>
                <td> " . $row['UnitCost'] . "</td>
                <td>" . $row['Total'] . "</td>
                </tr>"; 
           }
         echo   "</tbody></table>";  
      unset($rddq);
	  mysqli_close($link);
    
?>
</body>
</html>