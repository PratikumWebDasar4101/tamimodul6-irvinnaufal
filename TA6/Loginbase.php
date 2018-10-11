<?php 
include("Koneksi.php");
$username 	= $_POST['username'];
$password 	= $_POST['password'];
$sql  		= "SELECT * FROM data_user WHERE username = '$username' AND password = '$password'";
$result = mysqli_query($conn,$sql);
if (mysqli_num_rows($result) != 0) {
header("Location: Halaman_Awal.php");
}else{
 ?>
 <script>
 	alert("Username atau Password anda salah!")
 	location = "Login.php";
 </script>
 <?php 
}
?>