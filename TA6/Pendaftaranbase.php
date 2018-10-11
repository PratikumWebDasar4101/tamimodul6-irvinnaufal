<?php  
include("Koneksi.php");
 session_start();
$nim = $_SESSION['nim'];
$username 	= $_POST['username'];
$password 	= $_POST['password'];
$email 		= $_POST['email'];
$sql = "INSERT INTO data_user (username, password, email) VALUES ('$username', '$password', '$email')";
if (mysqli_query($conn, $sql)) {
      ?>
      <script>
			alert("Data Berhasil Dibuat");
			location = "Login.php"
		</script>
	 <?php  
} else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
?>