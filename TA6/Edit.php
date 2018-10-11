<hr style="margin-top: -5px " color="red">
<h1 style="color: red"><center> Edit Profil </center></h1>
<hr color="red">
<br><br>

<?php
    require_once("Koneksi.php");
    $a = mysqli_query($conn,"SELECT nim FROM data_edit ");
    $data = mysqli_fetch_assoc($a);
    $nim = $data['nim'];
    $sql = mysqli_query($conn, "SELECT * FROM data_edit ");
    $row = mysqli_fetch_assoc($sql);
    include("header.php");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Form</title>
</head>
<body>
    <center>
<br><br>
    <form method="post">
   	<table>
    	<tr>
    		<td>Nama</td>
    		<td>:</td>
    		<td><input type="text" name="nama" maxlength="35" value="<?php echo $row['nama'];?>" required></td>
    	</tr>
    	<tr>
    		<td>Kelas</td>
    		<td>:</td>
    		<td><input type="radio" name="kelas" <?php if($row['kelas'] == "41-01") { ?> checked <?php } ?> value="41-01" required>41-01
    		<input type="radio" name="kelas" <?php if($row['kelas'] == "41-02") { ?> checked <?php } ?> value="41-02" required>41-02
   			<input type="radio" name="kelas" <?php if($row['kelas'] == "41-03") { ?> checked <?php } ?> value="41-03" required>41-03
   			<input type="radio" name="kelas" <?php if($row['kelas'] == "41-04") { ?> checked <?php } ?> value="41-04" required>41-04  
    		</td>
    	</tr>
    	<tr>
    		<td>Jenis Kelamin</td>
    		<td>:</td>
    		<td>
    <input type="radio" name="jk" <?php if($row['jenis_kelamin'] == "laki-laki") { ?> checked <?php } ?>value="laki-laki" required>Laki-laki <br>
    <input type="radio" name="jk" <?php if($row['jenis_kelamin'] == "perempuan") { ?> checked <?php } ?>value="perempuan" required>Perempuan 
			</td>
    	</tr>
    	<tr>
    		<td>Fakultas</td>
    		<td>:</td>
    		<td>
    <select name="fakultas" required>
        <option <?php if($row['fakultas'] == "FIT") { ?> selected <?php } ?> value="FIT">FIT</option>
        <option <?php if($row['fakultas'] == "FEB") { ?> selected <?php } ?> value="FEB">FEB</option>
        <option <?php if($row['fakultas'] == "FIK") { ?> selected <?php } ?> value="FIK">FIK</option>
        <option <?php if($row['fakultas'] == "FTE") { ?> selected <?php } ?> value="FTE">FTE</option>
        <option <?php if($row['fakultas'] == "FIF") { ?> selected <?php } ?> value="FIF">FIF</option>
        <option <?php if($row['fakultas'] == "FRI") { ?> selected <?php } ?> value="FRI">FRI</option>
        <option <?php if($row['fakultas'] == "FKB") { ?> selected <?php } ?> value="FKB">FKB</option>
    </select>
			</td>
    </tr>
    <tr>
    	<td colspan="3" align="center"><input type="submit" name="submit" value="Submit"></td>
    </tr>
    </form> 
    </center>
    </table>   
</body>
</html>
<?php
    if (isset($_POST['submit'])) {
        $nama = $_POST['nama'];
        $kelas = $_POST['kelas'];
        $jk = $_POST['jk'];
        $fakultas = $_POST['fakultas'];
        $sql = "UPDATE data_edit SET nama = '$nama', kelas = '$kelas', jenis_kelamin ='$jk' fakultas = '$fakultas' WHERE nim ='$nim' ";
        if (mysqli_query($conn, $sql)) {
            echo "<center> Data berhasil diedit </center>";
        }else {
          }
    
        mysqli_close($conn);
    }
?>