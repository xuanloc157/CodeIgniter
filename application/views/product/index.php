<h2><?php echo $title; ?></h2>

<?php foreach ($product as $product_item): ?>

        <h3><?php echo $product_item['name']; ?></h3>
        <div class="main">
                <?php echo $product_item['price']; ?>
        </div>
        <p><a href="<?php echo site_url('../product/'.$product_item['ID']); ?>">View article</a></p>

<?php endforeach; ?>