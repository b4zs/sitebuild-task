<?php /** @var $form LoginForm */ ?>
<?php $view->render('head'); ?>
    <div class="d-flex align-items-center justify-content-center h-full">
        <div class="card login-card border-0">
            <div class="card-header bg-primary">
                Login Please
            </div>
            <div class="card-body border border-top-0">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <form action="./login" method="POST">
                                <label>Email</label>
                                <input type="email" name="email" value="<?php echo $form->getSubmittedValue('email'); ?>">
                                <?php echo $form->getErrorForField('email'); ?>
                                <label>Password</label>
                                <input type="password" name="password" value="">
                                <?php echo $form->getErrorForField('password'); ?>
                                <?php $checkbox = $form->getCheckboxes()[0]; ?>
                                <input type="checkbox" id="<?php echo $checkbox['id']; ?>" name="<?php echo $checkbox['id']; ?>">
                                <label><?php echo $checkbox['title']; ?></label>
                                <?php echo $form->getErrorForField($checkbox['id']); ?>
                                <?php $checkbox = $form->getCheckboxes()[1]; ?>
                                <input type="checkbox" id="<?php echo $checkbox['id']; ?>" name="<?php echo $checkbox['id']; ?>">
                                <label><?php echo $checkbox['title']; ?></label>
                                <?php echo $form->getErrorForField($checkbox['id']); ?>
                                <input type="submit" value="Login">
                            </form>
                        </div>
                        <div class="col-12 col-md-6">
                            <p class="small">
                                <?php echo $sidebarContent; ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $view->render('footer'); ?>