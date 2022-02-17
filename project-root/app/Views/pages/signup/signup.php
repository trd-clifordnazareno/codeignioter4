<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
</head>
<body>

<?php if($errors = session()->has('errors')) : ?>

<?php foreach(session('errors') as $error) : ?>
  <?php echo $error . "</br>";  ?>
<?php endforeach; ?>
<?php endif; ?>

<?= current_user()->fname ?>
<h1>signup</h1>
<form action="<?php echo base_url('signup/signup/'); ?>" method="POST">
  <label for="fname">First name:</label><br>
  <input type="text" id="fname" name="fname" value="<?= old('fname') ?>"><br>
  <label for="lname">Last name:</label><br>
  <input type="text" id="lname" name="lname" value="<?= old('lname') ?>"><br>
  <label for="lname">age</label><br>
  <input type="text" id="age" name="age" value="<?= old('age') ?>"><br>
  <label for="lname">Number:</label><br>
  <input type="text" id="number" name="number" value="<?= old('number') ?>"><br>
  <label for="lname">password:</label><br>
  <input type="text" id="password_hash" name="password_hash" value="<?= old('password_hash') ?>"><br>
  <label for="lname">password:</label><br>
  <input type="text" id="password_confirmation" name="password_confirmation" value="<?= old('password_confirmation') ?>"><br><br>
  <input type="submit" value="Submit">
</form> 
</body>
</html>