<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
    <title>Registration</title>
</head>

<body>
    <div class="container">
    		<div class="row">
    			<h3>Registration</h3>
    		</div>
			<div class="row">
				<p>
					<a href="create.php" class="btn btn-success">Create</a>
				</p>

				<table class="table table-striped table-bordered">
		              <thead>
		                <tr>
		                  <th>ID</th>
		                  <th>Name</th>
		                  <th>Adress</th>
		                  <th>PhoneNumber</th>
		                </tr>
		              </thead>
		              <tbody>
		              <?php
					   include 'database.php';
					   $pdo = Database::connect();
					   $sql = 'SELECT * FROM student ORDER BY id DESC';
	 				   foreach ($pdo->query($sql) as $row) {
						   		echo '<tr>';
							   	echo '<td>'. $row['ID'] . '</td>';
							   	echo '<td>'. $row['Name'] . '</td>';
							   	echo '<td>'. $row['Address'] . '</td>';
                  echo '<td>'. $row['PhoneNumber'] . '</td>';
							   	echo '<td width=250>';
							   	echo '&nbsp;';
							   	echo '<a class="btn btn-success" href="update.php?id='.$row['ID'].'">Edit</a>';
							   	echo '&nbsp;';
							   	echo '<a class="btn btn-danger" href="delete.php?id='.$row['ID'].'">Delete</a>';
							   	echo '</td>';
							   	echo '</tr>';
					   }
					   Database::disconnect();
					  ?>
				      </tbody>
	            </table>
    	</div>
    </div>
  </body>
</html>
