<hr style="margin-top: -5px " color="red">
<h1 style="color: red"><center> My Postingan </center></h1>
<hr color="red">
<br><br>
<center>	
<?php  
 	include ("Koneksi.php");
 	include ("header.php");
	$sql = "SELECT * FROM data_posting";
 	$result = mysqli_query($conn, $sql);
 		if (mysqli_num_rows($result)>0) {
 			while ($row = mysqli_fetch_assoc($result)) {
 				?>
 				<table border="1" width="70%">
 					<tr>
 						<th>Postingan</th>
 						<th>Gambar</th>
 					</tr>
	 				<tr>
	 					<br><br>
		 				<td><?php echo $row['posting']?></td>
		 				<td><img width="100px" src="<?php echo $row['gambar']; ?>" alt=""></td>
	 				</tr>
 				</table>
 				<br>
 				<?php
 			}
 		}else{
 			echo "0 results";
 		}
 		mysqli_close($conn);
 ?>
 </center>