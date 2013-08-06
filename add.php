<?php
include 'connection.php';
include 'member_process.php';
$mp = new member_process();
$conn = new connection();
$conn->connectMySQL();

$errors = array();
$nama = filter_input(INPUT_POST, 'nama', FILTER_SANITIZE_STRING);
$usia = filter_input(INPUT_POST, 'usia', FILTER_SANITIZE_NUMBER_INT);
$gender = filter_input(INPUT_POST, 'gender', FILTER_SANITIZE_STRING);

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	if(empty($nama))
		$errors['nama']=true;

	if(empty($usia))
		$errors['usia']=true;

	if(empty($gender))
		$errors['gender']=true;	
	
	if(empty($errors))
	{
	$mp->add("$nama", "$usia", "$gender");
	}
}

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<link href="styles/theme.css" rel="stylesheet"/>
<title>Add</title>
</head>
<body>

	<div id="wrapper">

    <form action="add.php" method="post" enctype="multipart/form-data">

        <div>
        	<label for="nama">NAMA</label>	:
            <?php if(isset($errors['nama'])): ?>
            <label for "nama"><p class="error"><font color="red">Isi nama dengan benar</font></p></label>
            <?php endif; ?>
            <input id="nama" name="nama" value="<?php echo $nama; ?>"/>
        </div>

        <div>        	<label for="usia">USIA</label>	:
            <?php if(isset($errors['usia'])): ?>
            <label for "usia"><p class="error"><font color="red">Isi usia dengan benar</font></p></label>
            <?php endif; ?>
            <input id="usia" name="usia" value="<?php echo $usia; ?>"/>
        </div>

        <div>
        	<label for="gender">GENDER</label>	:
            <?php if(isset($errors['gender'])): ?>
            <label for "gender"><p class="error"><font color="red">Isi gender dengan benar</font></p></label>
            <?php endif; ?>
			<input id="gender" name="gender" type="radio" value="pria"/>PRIA
			<input id="gender" name="gender" type="radio" value="wanita"/>WANITA
        </div>
		
        <div>
            <button type="submit">Save</button>
        </div>

    </form>
  </div>

</body>
</html>