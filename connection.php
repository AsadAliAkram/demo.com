 <?php

// $url = parse_url(getenv("CLEARDB_DATABASE_URL"));
//     $server = $url["host"];
//     $username = $url["user"];
//     $password = $url["pass"];
//     $db = substr($url["path"], 1);



	$server = "localhost";
    $username = "root";
    $password = "000111";
    $db = "demo";

$conn = mysqli_connect ($server, $username, $password, $db);

// $servername = "localhost";
// $username = "root";
// $password = "000111";
// $dbname = "demo"

// // try {
// //     $conn = new PDO("mysql:host=$servername;dbname=demo", $username, $password);
// //     // set the PDO error mode to exception
// //     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// //     }
// // catch(PDOException $e)
// //     {
// //     echo $sql . "<br>" . $e->getMessage();
// //     }

// // $conn = null;

// class DBController {
// 	private $host = "localhost";
// 	private $user = "root";
// 	private $password = "000111";
// 	private $database = "demo";
// 	private $conn;
	
// 	function __construct() {
// 		$this->conn = $this->connectDB();
// 	}
	
// 	function connectDB() {
// 		$conn = mysqli_connect($this->host,$this->user,$this->password,$this->database);
// 		return $conn;
// 	}
	
// 	function runQuery($query) {
// 		$result = mysqli_query($this->conn,$query);
// 		while($row=mysqli_fetch_assoc($result)) {
// 			$resultset[] = $row;
// 		}		
// 		if(!empty($resultset))
// 			return $resultset;
// 	}
	
// 	function numRows($query) {
// 		$result  = mysqli_query($this->conn,$query);
// 		$rowcount = mysqli_num_rows($result);
// 		return $rowcount;	
// 	}
// }

?>
