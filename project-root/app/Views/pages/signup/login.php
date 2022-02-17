<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
</head>
<body>

<?php if(session()->has('warning')) : ?>
    <?php echo session('warning'); ?>

    <?php endif; ?>
    <?php if(session()->has('info')) : ?>
    <?php echo session('info'); ?>

    <?php endif; ?>


    <?php if($errors = session()->has('errors')) : ?>

<?php foreach(session('errors') as $error) : ?>
  <?php echo $error;  ?>
<?php endforeach; ?>
<?php endif; ?>


<?php if(session()->has('notlogin')) : ?>
    <?php echo session('notlogin'); ?>

    <?php endif; ?>


<h1>login</h1>
<form action="<?php echo base_url('/signup/login/'); ?>" method="POST">
  <label for="fname">First name:</label><br>
  <input type="text" id="fname" name="fname" value="<?= old('fname') ?>"><br>
  <label for="lname">password:</label><br>
  <input type="text" id="password_hash" name="password_hash" value="<?= old('password_hash') ?>"><br>
  
  <input type="submit" value="Submit">
</form> 
</body>
</html>