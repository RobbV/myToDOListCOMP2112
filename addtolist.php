<?php
// Error handeling
	$success = '';
	$error = '';
	if(isset($_POST["submit"]))
	{
			if(empty($_POST["task"]))
			{
				$error = "<label class='text-danger'>Please enter a task</label>";
			}
      else
      {
				// write the user inputs to the JSON file
				if(file_exists('employee_data.json'))
				{
					// grab the correct json file and convert to an array
					$current_data = file_get_contents('listdata.json');
					$array_data = json_decode($current_data, true);
					$extra = array(
						// task
						'task' => $_POST['task'],
						// find out if the user added a description
						if(empty($_POST["description"]))
						{
							'description' => ["No Description"]
						}
						'description' => $_POST["description"]
					);
					// convert updated array back to a JSON Object and save the changes
					$array_data[] = $extra;
					$final_data = json_encode($array_data);
					// success message for the user
					if(file_put_contents('listdata.json', $final_data))
					{
						$success = "<label class='text-success'>Your task has been successfully added!</p>";
					}
				}
				// error if JSON file is missing
					else
					{
						$error = 'JSON File not exits';
					}
				}
			}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Add to my list</title>
	<link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css" >
	<link rel="stylesheet" href="main.css" >
</head>
	<body>
		<h1>My to-do lists</h1>
		<h3>Fill out form to add to the to-do list</h3>
		<!-- display error message -->
		<?php
		if(isset($error))
		{
			echo $error;
		}
		?>
		<form method="post">
			<label>Task</label>
				<input type="text" name="task" class="form-control" />
			<label>Notes</label>
				<input type="text" name="description" class="form-control" />
				<input type="submit" name="submit" value="Append" class="btn btn-info" />
		</form>
		<!-- display success message to the user -->
		<?php
		if(isset($success))
		{
			echo $success;
		}
		?>
	</body>
</html>
