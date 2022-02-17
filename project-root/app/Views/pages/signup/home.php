<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
</head>
<body>

<?php if(session()->has('loginsuccessful')) : ?>
    <?php echo session('loginsuccessful'); ?>

    <?php endif; ?>

    <?php if(isset(current_user()->fname)) : ?>
      <?= current_user()->fname ?>
      <?php endif ?>

<h1>login</h1>

</body>
</html>