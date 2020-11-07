<h2><?php echo $title; ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open('../product/edit/'. $product_item['ID']); ?>
    <input type="hidden" name="id" value="<?php echo $product_item['ID']?>"/>
    <label for="name">Name:</label>
    <input type="text" name="name" value="<?php echo $product_item['name']?>"/><br />
    <label for="price">Price: </label>
    <input type="number" name="price" value="<?php echo $product_item['price']?>" /><br />
    <label for="text">Text</label>
    <textarea name="title"><?php echo $product_item['title']?></textarea><br />

    <input type="submit" name="submit" value="Edit" />

</form>