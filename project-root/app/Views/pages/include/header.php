<!DOCTYPE html>
<html>
<head>
<title>Header</title>
</head>
<body>

<h1>This is a hedaer</h1>

<?php if(session()->has('warning')) : ?>
    <?php echo session('warning'); ?>

    <?php endif; ?>


    