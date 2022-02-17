this is a task
<?php if(session()->has('info')) : ?>
        <?php echo session('info'); ?>
        <?php endif; ?>
</br>
<?php foreach($task as $p){
    echo $p. "</br>";
}
?>
<a href="<?php echo site_url("task/viewedit/". $task['id']); ?>">edit</a>
<a href="<?php echo site_url("task/delete/". $task['id']); ?>">delete</a>