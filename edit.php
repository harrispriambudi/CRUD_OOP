<?php
include 'connection.php';
include 'member_process.php';
$mp = new member_process();
$conn = new connection();
$conn->connectMySQL();
$arraymember=$mp->view();

$errors = array();
$id = $_GET['id'];
	if(empty($id))
	{
		header('location: home.php');
		exit;
	}
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
	$mp->update($id, $nama, $usia, $gender);
	}
	}

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<link href="styles/theme.css" rel="stylesheet"/>
<title>Edit</title>
</head>
<body>

	<div id="wrapper">

    <form action="edit.php?id=<?php echo $id; ?>" method="post" enctype="multipart/form-data">
        <div>
        	<label for="nama">nama</label>
            <?php if(isset($errors['nama'])): ?>
            <label for "nama"><p class="error">Isi nama dengan benar</p></label>
            <?php endif; ?>
            <input id="nama" name="nama" readonly="readonly" value="<?php echo $mp->get('nama', $id); ?>">
        </div>

        <div>
        	<label for="usia">usia</label>
            <?php if(isset($errors['usia'])): ?>
            <label for "usia"><p class="error">Isi usia dengan benar</p></label>
            <?php endif; ?>
            <input id="usia" name="usia" value="<?php echo $mp->get('usia', $id); ?>">
        </div>

        <div>
        	<label for="gender">gender</label>
            <?php if(isset($errors['gender'])): ?>
            <label for "gender"><p class="error">Isi gender dengan benar</p></label>
            <?php endif; ?>
			<?php if ($mp->get('gender', $id) == 'pria'){ ?>
			<input id="gender" name="gender" type="radio" value="pria" checked />PRIA
			<input id="gender" name="gender" type="radio" value="wanita"/>WANITA
            <?php } else {?>
			<input id="gender" name="gender" type="radio" value="pria"/>PRIA
			<input id="gender" name="gender" type="radio" value="wanita" checked />WANITA
			<?php } ?>
			
        </div>
		
        <div>
            <button type="submit">Save</button>
        </div>

    </form>
  </div>

</body>
</html>