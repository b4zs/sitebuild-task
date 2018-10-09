<?php View::render('head'); ?>
    Hello, <?php echo $user['name'] ?>!
    <br>
    <a href="./logout">logout</a>
<?php View::render('footer'); ?>
