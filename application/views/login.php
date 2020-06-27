<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->session->unset_userdata('mobileno');
$this->session->unset_userdata('msg');
if ($this->session->userdata('user_token')) {
    redirect('/letsstart/');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
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
        #otpshow{
            display: none;
        }
        @media (max-width: 768px) {
            .login_box {
                box-shadow: none !IMPORTANT;
            }
            body{
                background: #fff !important;
            }
            .common_box{
                box-shadow: none;
            }
        }
    </style>
</head>
<body>


<div class="container">
    <div class="row">

        <div class="col-md-5 float-left col-12 desktop_view mt_30">
            <div class="common_box float-left p_20">
                <img src="<?php echo base_url('assets/images/Resume-rafiki.svg'); ?>" style="max-width: 200px;">
                <span class="section_title w-100 float-left">New to Adidhi</span>
                <ul class="page_ul_list_tick mt_10">
                    <li>Exclusively serving <strong> F&amp;B industry</strong> </li>
                    <li><strong>FREE</strong>  registration. </li>
                    <li><strong>12 years </strong>in Food &amp; Beverage staffing. </li>
                    <li>You say the vacancy, we do the rest until you get your <strong>‘Perfect Fit'</strong> </li>
                </ul>
                <a href="<?php echo base_url('register/') ?>" class="primary_btn mb_20">Register now</a>
            </div>
            
        </div>
        <img src="<?php echo base_url('assets/images/hero_2_mob.jpg') ?>" class="w-100 mobile_view">
        <div class="col-md-5 float-left col-12 common_box mt_30">
            
            <h1 class="section_title col-md-12 mt_20 mb_20">Login to your account</h1>
            

            <?php
            $attributes = array('id' => 'loginform');
            echo form_open('login/', $attributes); ?>
                <div class="col-md-12 float-left col-12  mb_20 ">
                    <label>Phone/Email</label>
                    <input type="text" name="username" class="form-control" value="" placeholder="Email/Phone">
                    <span class="help-block"><?php echo form_error('username'); ?></span>
                </div>    
                <div class="col-md-12 float-left col-12  mb_5" id="passwordshow">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Please enter password">
                    <span class="help-block error" name="error" id="loginerror"><?php echo form_error('password'); echo @$error; ?></span>
                </div>
                <span class="col-md-12 float-left col-12  mb_20">
                    <a href="<?php echo base_url('forget/') ?>" class="text-right" style="float: right; font-weight: 600; font-size: 14px; color: var(--brand);">Forget Password</a> 
                </span>

                
                <div class="col-md-12 float-left col-12 ">
                    <input type="submit" id="pwdclick" class="primary_btn w-100" value="Sign in">
                </div>
                <div class="col-md-12 float-left col-12 ">
                    <label class="text-center w-100 float-left mt_10">OR</label>
                </div>
                
            </form>
                <?php echo form_open('loginotp/');?>
                <div class="col-md-12 float-left col-12" id="loginwithotp">
                    <input type="submit" id="otpclick" name="otppage" class="second_btn w-100" value="Login with OTP" >
                </div>
            </form>
                <span class="w-100 float-left pt_20 pb_10">
                    New to Adishi?<a href="<?php echo base_url('register/') ?>" class="pl_10">Join now</a> 
                </span>
        </div> <!--Col-md 5 End here ===================-->
    </div> <!--Login box-->
</div>
    

     
</body>
</html>
<script src="<?php echo base_url('assets/js/jquery-3.4.0.min.js'); ?>"></script>
<script type="text/javascript">
$(document).ready(function(){
    $("#otpclick").click(function(){
        window.location.href == '<?php echo base_url('/loginotp/'); ?>'
    });
});    
</script>