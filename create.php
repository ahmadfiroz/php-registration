<?php

	require 'database.php';


	if ( !empty($_POST)) {
		// keep track validation errors
		$idError = null;
		$nameError = null;
		$addressError = null;
		$mobileError = null;

		// keep track post values
		$id = $_POST['ID'];
		$name = $_POST['Name'];
		$address = $_POST['Address'];
		$mobile = $_POST['PhoneNumber'];

		// validate input
		$valid = true;
		if (empty($name)) {
			$nameError = 'Please enter Name';
			$valid = false;
		}

		if (empty($address)) {
			$addressError = 'Please enter Address';
			$valid = false;
		}

		if (empty($mobile)) {
			$mobileError = 'Please enter Mobile Number';
			$valid = false;
		}
		if (empty($id)) {
			$idError = 'Please enter an ID';
			$valid = false;
		}

		// insert data
if ($valid) {
	$pdo = Database::connect();
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql = "INSERT INTO student (Name,Address,PhoneNumber, ID) values(?, ?, ?, ?)";
	$q = $pdo->prepare($sql);
	$q->execute(array($name,$address,$mobile, $id));
	Database::disconnect();
	header("Location: index.php");
}

	}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">

    			<div class="span10 offset1">
    				<div class="row">
		    			<h3>Create</h3>
		    		</div>

	    			<form class="form-horizontal" action="create.php" method="post">
							<div class="control-group <?php echo !empty($idError)?'error':'';?>">
								<label class="control-label">ID</label>
								<div class="controls">
										<input name="ID" type="text"  placeholder="ID" value="<?php echo !empty($id)?$id:'';?>">
										<?php if (!empty($idError)): ?>
											<span class="help-inline"><?php echo $idError;?></span>
										<?php endif; ?>
								</div>
							</div>
					  <div class="control-group <?php echo !empty($nameError)?'error':'';?>">
					    <label class="control-label">Name</label>
					    <div class="controls">
					      	<input name="Name" type="text"  placeholder="Name" value="<?php echo !empty($name)?$name:'';?>">
					      	<?php if (!empty($nameError)): ?>
					      		<span class="help-inline"><?php echo $nameError;?></span>
					      	<?php endif; ?>
					    </div>
					  </div>
					  <div class="control-group <?php echo !empty($addressError)?'error':'';?>">
					    <label class="control-label">Address</label>
					    <div class="controls">
					      	<input name="Address" type="text" placeholder="Address" value="<?php echo !empty($address)?$address:'';?>">
					      	<?php if (!empty($addressError)): ?>
					      		<span class="help-inline"><?php echo $addressError;?></span>
					      	<?php endif;?>
					    </div>
					  </div>
					  <div class="control-group <?php echo !empty($mobileError)?'error':'';?>">
					    <label class="control-label">Mobile Number</label>
					    <div class="controls">
					      	<input name="PhoneNumber" type="text"  placeholder="Mobile Number" value="<?php echo !empty($mobile)?$mobile:'';?>">
					      	<?php if (!empty($mobileError)): ?>
					      		<span class="help-inline"><?php echo $mobileError;?></span>
					      	<?php endif;?>
					    </div>
					  </div>
					  <div class="form-actions">
						  <button type="submit" class="btn btn-success">Create</button>
						  <a class="btn" href="index.php">Back</a>
						</div>
					</form>
				</div>
    </div>
  </body>
</html>
