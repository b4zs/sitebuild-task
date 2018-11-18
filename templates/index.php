<?php /** @var $form LoginForm */ ?>
<?php $view->render('head'); ?>
    <div class="d-flex align-items-center justify-content-center flex-column h-full">
        <h1 class="logo login-page__logo">Mountain Rescue</h1>
        <div class="card login-page__card align-self-center border-0">
            <div class="card-header bg-primary py-4">
                <h2 class="h4 text-light text-center text-uppercase m-0">Login Please</h2>
            </div>
            <div class="card-body border border-top-0">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <form action="./login" method="POST">
                                <p class="small text-center text-primary mx-3">
                                    <?php echo $loginContent; ?>
                                </p>

                                <div class="form-group">
                                    <label class="sr-only" for="email">Email</label>
                                    <input class="form-control" placeholder="Email" type="email" name="email" id="email" value="<?php echo $form->getSubmittedValue('email'); ?>">
                                    <?php echo $form->getErrorForField('email'); ?>
                                </div>

                                <div class="form-group">
                                    <label class="sr-only" for="password">Password</label>
                                    <input class="form-control" placeholder="Password" type="password" name="password" id="password" value="">
                                    <?php echo $form->getErrorForField('password'); ?>
                                </div>

                                <?php $checkbox = $form->getCheckboxes()[0]; ?>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="<?php echo $checkbox['id']; ?>" name="<?php echo $checkbox['id']; ?>">
                                        <label for="<?php echo $checkbox['id']; ?>"><?php echo $checkbox['title']; ?></label>
                                    </div>
                                <?php echo $form->getErrorForField($checkbox['id']); ?>
                          
                                <?php $checkbox = $form->getCheckboxes()[1]; ?>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="<?php echo $checkbox['id']; ?>" name="<?php echo $checkbox['id']; ?>">
                                        <label for="<?php echo $checkbox['id']; ?>"><?php echo $checkbox['title']; ?></label>
                                    </div>
                                <?php echo $form->getErrorForField($checkbox['id']); ?>

                                <button type="submit" class="btn btn-primary btn-block">Login</button>
                            </form>
                            <hr class="d-md-none">
                        </div>
                        <aside class="col-12 col-md-6">
                            <p class="small">
                                <?php echo $sidebarContent; ?>
                            </p>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $view->render('footer'); ?>