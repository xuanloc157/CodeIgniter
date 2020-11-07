<?php
echo '<h2>'.$product_item['name'].'</h2>';
echo $product_item['price']. "<br/>";
echo $product_item['title']. "<br/>";
?>
<table>
<?php foreach ($review as $review_item): ?>
<tr>
    <td><?php echo $review_item['content']?></td>
    <?php if ($_SESSION['user']['permission'] == 'emprev'): ?>
        <td><a href="<?php echo site_url('../product/deleterev' . $review_item['id']); ?>">delete</a></td>
    <?php endif;?>
</tr>
<?php endforeach;?>
</table>