<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->session->unset_userdata('mobileno');
$this->session->unset_userdata('msg');
if ($this->session->userdata('user_token')) {
    redirect('/letsstart/');
}
if (!isset($_SESSION['number'])) {
  redirect('/loginotp/');
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
    </style>
</head>
<body>


<div class="container main_wrapper">
    <div class="login_box">

        <div class="col-md-6 float-left col-12 no-padding">
        <img src="<?php echo base_url('assets/images/hero_2.jpg'); ?>" class="w-100 desktop_view">
        <img src="<?php echo base_url('assets/images/hero_2_mob.jpg') ?>" class="w-100 mobile_view">
        </div>
        <div class="col-md-5 float-left col-12 pl_20">
            <h1 class="section_title mt_20">Login to your account</h1>
            <span class="second_subtitle float-left w-100 pb_30"> Login/Create an account to search jobs and apply </span>

            
            <form id="otpverification">
                <div class="col-md-7 float-left col-12 no-padding mb_20 shownumber"><?php if (isset($_SESSION['number'])) {
                  echo $_SESSION['number'];
                } ?> <a id="textboxshow" href="">Change</a></div>
                <div class="col-md-7 float-left col-12 no-padding mb_20" id="otpshow">
                    <label>OTP</label>
                    <input type="text" name="otp" class="form-control" id="otp" placeholder="Please enter OTP">
                    <span class="help-block error" name="error"><?php echo @$error; ?></span>
                    <a href="" id="resend">Re Send</a>
                    <span id="timer"></span>
                    <span id="timer1"></span>
                    <span class="help-block number-error"><?php echo form_error('number'); ?></span>
                </div>
                <div class="col-md-7 float-left col-12 no-padding" id="send">
                    <input type="submit" id="otpsubmit" class="primary_btn" value="Login" >
                </div>
                <div class="col-md-12 float-left col-12 no-padding">
                    <label style="margin-left: 20%; margin-top: 5px;">OR</label>
                </div>
                
            </form>
            <?php
        
            echo form_open('/login/'); ?>
            <div class="col-md-7 float-left col-12 no-padding">
                    <input type="submit" id="pwdclick" style="background-color: #fff; color: #0C056F; border-color: #0C056F;" class="primary_btn" value="Login with password">
                </div>
            </form>
                <span class="w-100 float-left pb_10">
                    Don’t have an account?<a href="<?php echo base_url('register/') ?>" class="pl_20">Create Now</a> 
                </span>
        </div> <!--Col-md 5 End here ===================-->
    </div> <!--Login box-->
</div>
    

     
</body>
</html>
<script src="<?php echo base_url('assets/js/jquery-3.4.0.min.js'); ?>"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $("#textboxshow").click(function(){
      setTimeout(function () {
             //Redirect with JavaScript
             window.location.href= "<?php echo base_url('/loginotp/'); ?>";
          }, 100);
    });
  });
var a = "<?php if (isset($_SESSION['number'])) { echo base64_encode($_SESSION['number']); } ?>";
    if (a!="") {
        $("#otpsubmit").click(function(){
            var b = $("#otp").val();
            $.ajax({
                type: 'post',
                url: "<?php echo base_url('/login-otp/'); ?>",
                data: {b:b},
                success: function (data) {
                    alert(data);
                }
            });            
        });
    }

</script>