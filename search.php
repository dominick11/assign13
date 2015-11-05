<?php
    include 'shared.php';
    startPage();
    checkUserSession();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Search</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<a href="logout.php"><button>Logout</button></a><br>
    <form action="result.php" method="POST">
     <table align="center" >
     
            <tr>
                <td algin="right">Select a keyword</td>
                <td>
                 <select name="dropdownquery">
                   <option value="Rep">Rep</option>
                   <option value="Item">Item</option>
                 </select>
                </td>
            </tr>
            
            <tr>
                <td align="right"><input type="text" name="query" /></input></td>
                <td><button type="submit">Search</button></td>
            </tr>
            
        </table>     
    </form>
</body>
</html>