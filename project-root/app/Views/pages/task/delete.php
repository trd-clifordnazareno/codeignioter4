<h1>delete task</h1>
<p>are you sure you want to delete</p>
<form action="<?php echo base_url('task/delete/'.$task['id']); ?>" method="POST">
<button>yes</button>
<a href="<?= site_url("showuser/".$task['id']); ?>">cancel</a>

</form>