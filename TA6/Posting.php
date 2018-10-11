<hr style="margin-top: -5px " color="red">
<h1 style="color: red"><center> Postingan </center></h1>
<hr color="red">
<br><br>
<?php 
include ("koneksi.php");
include("header.php");
 ?>
 <br><br>
 <center>
<form enctype="multipart/form-data" method="post">
<table>
<tr>
	<td>Posting</td>
	<td>:</td>
	<td>
	<textarea rows="20" cols="80" name="posting">
		
	</textarea></td>
</tr>
<tr>
	<td>Upload Foto</td>
	<td>:</td>
	<td><input type="file" name="gambar"></td>
<tr>
	<td colspan="3" align="right"><input type="submit" name="kirim" value="POST"></td>
</tr>
<tr>
	<td><a href="halamanawal.php">Home</a></td>
</tr>
		
</tr>
</form>
</table>
</center>
<?php  
	if (isset($_POST['kirim'])) {
		$dir = "upload/";
		$nama_file = $_FILES["gambar"]["name"];
		$nama_file_tmp = $_FILES["gambar"]["tmp_name"];
		$nama_file_temp = explode(".", $_FILES["gambar"]["name"]);
		$nama_file_baru = time() . '.' . end($nama_file_temp);
		$target_file = $dir . $nama_file_baru;
		$posting = $_POST['posting'];
		$sql = "INSERT INTO data_posting(posting, gambar)
	            VALUES ('$posting', '$target_file')";
	    if (mysqli_query($conn, $sql) && move_uploaded_file($nama_file_tmp, $target_file)) {
			echo "	<script>
         				alert('Posting telah berhasil di post');
         				location='mypostingan.php';
         			</script>";	    	
	    }else {
	        echo "Error: " . $sql . "<br?" . mysqli_error($conn);
	    }
	}
?>