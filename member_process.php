<?php
class member_process {

public $id;
public $nama;
public $gender;
public $usia;

function view($table){
$query = mysql_query("select * from $table");
while($row=mysql_fetch_array($query))
$data[]=$row;
return $data;
}


function add($nama, $usia, $gender){
$query = "insert into member (nama, usia, gender) values ('$nama', '$usia', '$gender')";
$execute = mysql_query($query);
if ($execute)
{echo "<script language='javascript'>alert('Pendaftaran Member Baru Berhasil');
			window.location = 'index.php'</script>";}
else
{echo "Penambahan data gagal";}
}

function delete($id){
$query="delete from member where id = $id";
$execute = mysql_query($query);
if ($execute)
{echo "<script language='javascript'>alert('Hapus Member Berhasil');
			window.location = 'index.php'</script>";}
else
{echo "Hapus data gagal";}
}

function update($id , $nama, $usia, $gender){
$query="update member set nama='$nama', usia='$usia', gender='$gender' where id ='$id'";
$execute = mysql_query($query);
if ($execute)
{echo "<script language='javascript'>alert('Update Member Berhasil');
			window.location = 'index.php'</script>";}
else
{echo "Update Gagal";}
}

function get($field, $id){
$query = "select * from member where id='$id'";
$execute = mysql_query($query);
$data = mysql_fetch_array($execute);
if ($field == 'nama')
	return $data['nama'];
else if ($field == 'usia')
	return $data['usia'];
else if ($field == 'gender')
	return $data['gender'];
}

}