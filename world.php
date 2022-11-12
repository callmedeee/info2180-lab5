<?php
header("Access-Control-Allow-Origin: *");
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';
$context = htmlentities($_GET['context'],ENT_QUOTES,'utf-8');
if($context != 'cities'){
	$country = htmlentities($_GET['country'],ENT_QUOTES,'utf-8');
	$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
	$stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%'");

	$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

	echo "<table>
	<br>
	
	<br>

	<tr>

	<th>Name</th>

	<th>Continent</th>

	<th>Independence Year</th>

	<th>Head of State</th>

	</tr>";

	foreach ($results as $row){
		echo "<tr>";
        	echo"<td>"; echo$row['name']; echo"</td>";
       	echo"<td>"; echo$row['continent']; echo"</td>";
       	echo"<td>"; echo$row['independence_year']; echo"</td>";
        	echo"<td>"; echo$row['head_of_state']; echo"</td>";
        	echo"</tr>";
     }
}else{
    $country = htmlentities($_GET['country'],ENT_QUOTES,'utf-8');
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $stmt = $conn->query("SELECT * FROM countries INNER JOIN cities ON cities.country_code = countries.code WHERE countries.name LIKE '%$country%'");

    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo "<table class='tbl2'>

    <br>

    <br> 

    <tr>

    <th>Name</th>

    <th>District</th>

    <th>Population</th>

    </tr>";

    foreach ($results as $row){
        echo "<tr>";
        echo"<td>"; echo$row['name']; echo"</td>";
        echo"<td>"; echo$row['district']; echo"</td>";
        echo"<td>"; echo$row['population']; echo"</td>";
        echo"</tr>";
    }



}


?>
  

