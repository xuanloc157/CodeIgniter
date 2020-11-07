<h2><?php echo $title; ?></h2>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Content</th>
            <th>Action</th>
        </tr>
    </thead>
    <?php foreach ($product as $product_item): ?>
    <tr>
        <td><?php echo $product_item['ID']; ?></td>
        <td><?php echo $product_item['name']; ?></td>
        <td><?php echo $product_item['price']; ?></td>
        <td><?php echo $product_item['title']; ?></td>
        <td>
            <a href="<?php echo site_url('../product/' . $product_item['ID']); ?>">View</a>
            <?php if ($_SESSION['user']['permission'] == 'emppro'): ?>|
            <a href="<?php echo site_url('../product/edit/' . $product_item['ID']); ?>">Edit</a>|
            <a href="<?php echo site_url('../product/delete/' . $product_item['ID']); ?>">Delete</a>
            <?php
    endif; ?>
        </td>
    </tr>
    <?php
endforeach; ?>
</table>