
<?php echo validation_errors(); ?>
<?php if (!empty($error)) {
   echo $error;
} ?>
<?php echo form_open('../user/register'); ?>

<label for="username">Username:</label>
<input type="text" name="username" /><br />
<label for="password">Password:</label>
<input type="password" name="password" /><br />
<label for="confirm_password">Confirm Password:</label>
<input type="password" name="confirm_password" /><br />
<?php if (isset($_SESSION['user']) && $_SESSION['user']['permission'] == 'admin'):?>
    <select name="permission">
        <option value="empPro">Employee Product</option>
        <option value="empRev">Employee Review</option>
    </select>
<?php endif;?>
<input type="submit" name="submit" value="Register" />

</form>