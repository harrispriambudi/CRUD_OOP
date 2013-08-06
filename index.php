<?php
include 'connection.php';
include 'member_process.php';
$mp = new member_process();
$conn = new connection();
$conn->connectMySQL();
$arraymember=$mp->view();
/////
if(isset($_GET['action'])){
if ($_GET['action'] == 'delete'){
$id = $_GET['id'];
$mp->delete($id);
}
}

?>
<a href='add.php'>ADD NEW MEMBER</a>
<table border='1'>
<tr>
<th>ID</th>
<th>NAMA</th>
<th>GENDER</th>
<th>USIA</th>
<th>SETTING</th>
</tr
<?php foreach($arraymember as $data) { ?>
<tr>
<td><?php echo $data['id']; ?></td>
<td><?php echo $data['nama']; ?></td>
<td><?php echo $data['gender']; ?></td>
<td><?php echo $data['usia']; ?></td>
<td><INPUT TYPE="button" name="edit" value ='Edit' onClick="parent.location='edit.php?id=<?php echo $data['id']; ?>'"><br>

<script type="text/javascript">
<!--
function confirmation() {
	var answer = confirm("Anda Yakin Akan menghapus member <?php echo $data['nama'];?>?")
	if (answer){
		window.location = "<?php echo $_SERVER['PHP_SELF']?>?action=delete&id=<?php echo $data['id'];?>";
	}
	else{
		alert("Dibatalkan")
	}
}
//-->
</script>
<form><input type="button" onclick="confirmation()" value="Delete"></form></td>
</tr>
<?php } ?>
</table>