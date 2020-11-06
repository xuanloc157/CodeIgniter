<h2><?php echo $title; ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open('../product/create'); ?>

    <label for="name">Name:</label>
    <input type="text" name="name" /><br />
    <label for="price">Price:</label>
    <input type="number" name="price" /><br />
    <label for="text">Text</label>
    <textarea name="title"></textarea><br />

    <input type="submit" name="submit" value="Create new item" />

</form>