<html>

<head>
    <title>CodeIgniter Tutorial</title>
</head>

<body>

    <h1><?php echo $title; ?></h1>
    <?php if (isset($_SESSION['user'])):?>
                <?php echo "login at " . $_SESSION['user']['username'];?>
    <br /><a href="<?php echo base_url()?>user/logout">Logout</a>
    <?php endif;?>