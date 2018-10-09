<?php /** @var $form LoginForm */ ?>
<?php $view->render('head'); ?>
    <form action="./login" method="POST">
        <label>Email</label>
        <input type="email" name="email" value="<?php echo $form->getSubmittedValue('email'); ?>">
        <?php echo $form->getErrorForField('email'); ?>
        <br>
        <br>

        <label>Password</label>
        <input type="password" name="password" value="">
        <?php echo $form->getErrorForField('password'); ?>
        <br>
        <br>

        <?php $checkbox = $form->getCheckboxes()[0]; ?>
        <input type="checkbox" id="<?php echo $checkbox['id']; ?>" name="<?php echo $checkbox['id']; ?>">
        <label><?php echo $checkbox['title']; ?></label>
        <?php echo $form->getErrorForField($checkbox['id']); ?>
        <br>
        <br>

        <?php $checkbox = $form->getCheckboxes()[1]; ?>
        <input type="checkbox" id="<?php echo $checkbox['id']; ?>" name="<?php echo $checkbox['id']; ?>">
        <label><?php echo $checkbox['title']; ?></label>
        <?php echo $form->getErrorForField($checkbox['id']); ?>
        <br>
        <br>

        <input type="submit" value="Login">
    </form>
    <hr>
<?php echo $sidebarContent; ?>
<?php $view->render('footer'); ?>