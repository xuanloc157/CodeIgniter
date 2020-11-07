
<?php echo validation_errors(); ?>
<?php if (!empty($error)) {
   echo $error;
} ?>
<?php echo form_open('../user/login'); ?>

<label for="username">Username:</label>
<input type="text" name="username" /><br />
<label for="password">Password:</label>
<input type="password" name="password" /><br />


<input type="submit" name="submit" value="Login" />
<a href="../user/register">register</a>
</form>