<?php
defined('BASEPATH') OR exit('No direct script access allowed');
unset($_SESSION['otp']);
if (empty($_SESSION['mobileno'])) {
    redirect('/login/');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Change Password</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="WeThink Studio is an award winning UX Agency with practices spanning User Experience, Mobility, Service Design, Digital Transformation, User Research and Agile UX" />
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/custom.css'); ?>">
    <style type="text/css">
       
        .wrapper{ width: 28%; padding: 20px; float: none; margin: 0 auto; display: block; background: #fff; margin-top: 6%; border-radius: 4px; }
        .login_bg {
            width: 100%; float: left; background: #fff; height: 100%; background: url(<?php echo base_url('assets/images/login_bg.jpg'); ?>); background-position: 50% 50%; background-repeat: no-repeat; -webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover; position: fixed; min-height: 100%; display: block;
        }
    </style>
</head>
<body>


<div class="container main_wrapper">
    <div class="login_box">
        <?php echo  $this->session->flashdata('msg'); ?>
            <?php if(isset($msg)){?>
             <?php echo $msg;?>
               <?php } ?>
        <div class="col-md-6 float-left col-12 no-padding">
        <img src="<?php echo base_url('assets/images/hero_2.jpg'); ?>" class="w-100 desktop_view">
        <img src="<?php echo base_url('assets/images/hero_2_mob.jpg') ?>" class="w-100 mobile_view">
        </div>
        <div class="col-md-5 float-left col-12 pl_20">
            <h1 class="section_title mt_20">Chnage Password</h1>
            <span class="second_subtitle float-left w-100 pb_30"> </span>
            <?php
            $attributes = array('id' => 'loginform');
            echo form_open('changepassword/', $attributes); ?>
                <div class="col-md-7 float-left col-12 no-padding mb_20">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Please enter password">
                    <span class="help-block error" name="error"><?php echo form_error('password'); echo @$error; ?></span>
                </div>
                <div class="col-md-7 float-left col-12 no-padding mb_20">
                    <label>Confirm Password</label>
                    <input type="password" name="confirm_password" class="form-control" placeholder="Please enter password">
                    <input type="hidden" value="<?php echo base64_encode($_SESSION['mobileno']); ?>" name="a">
                    <span class="help-block error" name="error"><?php echo form_error('confirm_password'); ?></span>
                </div>
                <div class="col-md-7 float-left col-12 no-padding">
                    <input type="submit" class="primary_btn" name="c_pwd" value="Chnage Password">
                </div>
            </form>
        </div> <!--Col-md 5 End here ===================-->
    </div> <!--Login box-->
</div>
    

     
</body>
</html>
<script>
$(function() {
// setTimeout() function will be fired after page is loaded
// it will wait for 5 sec. and then will fire
// $("#successMessage").hide() function
setTimeout(function() {
    $(".alert-success").hide('blind', {}, 500)
}, 5000);
});
</script>