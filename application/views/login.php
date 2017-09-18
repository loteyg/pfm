<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php
    $this->load->view('header');

   // print_r($result);
?>
    <div class="container">
        <div class='col-md-12 text-center'><h1>Funds Management System</h1></div>
        <div class="row">
            <div class="col-sm-6 col-md-4 col-md-offset-4 post_images_sec">
                <h1 class="text-center login-title">Sign in to continue to FMS</h1>
                <div class="account-wall">
                    <?php
                        $image_properties = array(
                            'src'   => 'assets/images/photo.png',
                            'alt'   => 'Enter login details',
                            'class' => 'post_images profile-img',
                            'width' => '150',
                            'height'=> '150',
                            'title' => 'User Login'
                         );
                    ?>
                    <?php echo img($image_properties);?>
                    <form class="form-signin" action="" method="post">
                        <input type="text" name="username" class="form-control" placeholder="Username" required autofocus>
                        <div class="val_errors"><?php echo form_error('username'); ?></div>
                        <input type="password" name="password" class="form-control" placeholder="Password" required >
                        <div class="val_errors"><?php echo form_error('password'); ?></div>
                        <button class="btn btn-lg btn-primary btn-block" type="submit">
                            Sign in</button>
                        <label class="checkbox pull-left">
                            <input type="checkbox" value="remember-me">
                            Remember me
                        </label>
                        <a href="#" class="pull-right need-help">Need help? </a><span class="clearfix"></span>
                    </form>
                    <div class="val_errors text-center"><?php if(isset($error_message)){echo $error_message;} ?></div>
                    <?php echo validation_errors('<span class="error">', '</span>'); ?>
                </div>
                <!--<a href="#" class="text-center new-account">Create an account </a>-->
            </div>
        </div>
    </div>
<?php $this->load->view('footer'); ?>