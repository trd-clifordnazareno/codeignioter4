<label for="fname">First name:</label><br>
  <input type="text" id="fname" name="fname" value="<?= old('firstname', $task['firstname']) ?>"><br>
  <label for="lname">Last name:</label><br>
  <input type="text" id="lname" name="lname" value="<?php echo old('lastname', $task['lastname']); ?>"><br><br>
  <input type="submit" value="Submit">