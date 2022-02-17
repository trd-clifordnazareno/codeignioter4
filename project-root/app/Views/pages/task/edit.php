<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
</head>
<body>


<?php if($errors = session()->has('errors')) : ?>
<?php foreach(session('errors') as $error) : ?>
    <?php echo $error;  ?>
  <?php endforeach; ?>
<?php endif; ?>


<h1>Edit</h1>
<form action="<?php echo base_url('task/update/'.$task['id']); ?>" method="POST">
  <label for="fname">First name:</label><br>
  <input type="text" id="fname" name="fname" value="<?= old('fname', $task['firstname']) ?>"><br>
  <label for="lname">Last name:</label><br>
  <input type="text" id="lname" name="lname" value="<?php echo old('lname', $task['lastname']); ?>"><br><br>
  <input type="submit" value="Submit">
</form> 
</body>
</html>