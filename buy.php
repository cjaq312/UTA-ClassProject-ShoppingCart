<html>
<head>
<?php 
class buy{

	var $jsonfile=null;
	var $decodedfile=null;
	var $count=0;
	var $key = 'AIzaSyBS_NS2XzMydndwfE5DYcYPw5QTexd6CyY';
	
function initialize(){
session_start();
if (!isset($_SESSION['count']))
	$_SESSION['count'] = 0;
}

function search(){
	$search=$_POST["search"];
$key = 'AIzaSyBS_NS2XzMydndwfE5DYcYPw5QTexd6CyY';
	if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($search)) {
		$search = urlencode($_POST['search']);
		$url = 'https://www.googleapis.com/shopping/search/v1/public/products?key=' . $key . '&country=US&q=' . $search . '&maxResults=25';
		global $jsonfile = file_get_contents($url);
		global $decodedfile = json_decode($jsonfile,true);
		global $count=$decodedfile["currentItemCount"];
	}
}

function displaysearch(){
	echo "<table>";
	for($i=0;$i<=24;$i++){
		echo "<tr>";
		echo "<td>".$decodedfile["items"][$i]["product"]["googleId"]."</td>";
		echo "<td>".$decodedfile["items"][$i]["product"]["title"]."</td>";
		echo "<td>".$decodedfile["items"][$i]["product"]["inventories"][0]["price"]."</td>";
		echo "<td>".$decodedfile["items"][$i]["product"]["link"]."</td>";
		echo "</tr>";
	}
	echo "</table>";
}

function displaybucket(){
	echo "<table>";
	for($i=0;$i<=24;$i++){
		echo "<tr>";
		echo "<td>".$decodedfile["items"][$i]["product"]["googleId"]."</td>";
		echo "<td>".$decodedfile["items"][$i]["product"]["title"]."</td>";
		echo "<td>".$decodedfile["items"][$i]["product"]["inventories"][0]["price"]."</td>";
		echo "<td>".$decodedfile["items"][$i]["product"]["link"]."</td>";
		echo "</tr>";
	}
	echo "</table>";
}

function buy(){

}

function delete(){
}

function clear(){
}
}
?>
</head>
<body>
	<legend>
		Find Products
		<form action="buy.php" method="post">
			Search for items:<input type="text" name="search" id="search" /> <input
				type="submit" value="Search" />

		</form>
	</legend>

	<?php 
	
	$instance = new buy();
	$instance -> search();
	$instance -> displaysearch();
	
	
	

	/*
	$search=$_POST["search"];
	$buy=$_POST["buy"];
	$delete=$_POST["delete"];
	$clear=$_POST["clear"];
	*/

	?>
</body>
</html>
