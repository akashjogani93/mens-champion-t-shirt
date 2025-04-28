<?Php
$conn=mysqli_connect('localhost','root','','project_db');
if(isset($_POST['add'])){
    $task=$_POST['task'];
    $status=$_POST['status'];

 $insert=mysqli_query($conn,"insert into todo_db(task,status)values('$task','$status')");
  }
 ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<link href="to do.css"rel="stylesheet">
  </head>
  <body>
    <h1></h1>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
 
<h1 class="center"> To Do List</h1>
<form method ="POST">
<div class="input-group mb-3 pad">
    <input type="text" name="task" class="form-control" aria-label="Text input with checkbox">
</div>

<div class="input-group pad">
  <input type="text"  name="status" class="form-control" aria-label="Text input with radio button">
</div>
<input type="submit" name="add" class="btn btn-primary"> </input>
</form>
 </body>
</html>