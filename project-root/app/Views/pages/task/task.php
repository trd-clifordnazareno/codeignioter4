this is a task
</br>
<?php if($errors = session()->has('errors')) : ?>

  <?php foreach(session('errors') as $error) : ?>
    <?php echo $error;  ?>
  <?php endforeach; ?>
<?php endif; ?>

<form action="<?php echo base_url('task/insert'); ?>" method="POST">
  <label for="fname">First name:</label><br>
  <input type="text" id="fname" name="fname" value="<?= old('fname') ?>"><br>
  <label for="lname">Last name:</label><br>
  <input type="text" id="lname" name="lname" value="<?= old('lname') ?>"><br><br>
  <input type="submit" value="Submit">
</form> 
<?php foreach($task as $p) : ?>
    <a href="<?php echo site_url("/task/showuser/".$p['id']); ?>"><?php echo $p['firstname'];   ?></a></br>
    <?php endforeach; ?>
