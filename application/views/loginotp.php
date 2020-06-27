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
    </style>
</head>
<body>


<div class="container">
    <div class="row">

        <div class="col-md-5 float-left col-12 desktop_view mt_30">
            <div class="common_box">

            </div>
            
        </div>
        <div class="col-md-7 float-left col-12 common_box mt_30">
            <img src="<?php echo base_url('assets/images/hero_2_mob.jpg') ?>" class="w-100 mobile_view">
            <h1 class="section_title mt_20 mb_20 w-100">Login with OTP</h1>
            

            <?php
            echo form_open(''); ?>
                <div class="col-md-7 float-left col-12 no-padding mb_20 username">
                    <label>Username</label>
                    <input type="text" name="number" class="form-control" id="number" value="" placeholder="Please enter register mobile number">
                    <span class="help-block"><?php echo form_error('username'); ?></span>
                </div>
                <div class="col-md-7 float-left col-12 no-padding mb_20 shownumber"> <a id="textboxshow" href="">Change</a></div>
                <div class="col-md-7 float-left col-12 no-padding mb_20" id="otpshow">
                    <label>OTP</label>
                    <input type="text" name="otp" class="form-control" id="otp" placeholder="Please enter OTP">
                    <span class="help-block error" name="error"><?php echo @$error; ?></span>
                    <a href="" id="resend">Re Send</a>
                    <span id="timer"></span>
                    <span id="timer1"></span>
                    <span class="help-block number-error"><?php echo form_error('number'); ?></span>
                </div>
                <span class="w-100 float-left pb_10">
                    <a href="<?php echo base_url('forget/') ?>" class="pl_20">Forget Password</a> 
                </span>

                <div class="col-md-7 float-left col-12 no-padding" id="loginwithotp">
                    <input type="submit" id="otpclick" class="primary_btn" value="Login with OTP" >
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
    $(".shownumber").hide();
    $("#send").hide();
    
    $(document).ready(function(){
    $("#otpclick").click(function(e){
        e.preventDefault();
        var a = $("#number").val();
        if (a!="") {
            $("#otpshow").show();
            $(".shownumber").append(a);
            $(".shownumber").show();
            $(".username").hide();
            $("#loginwithotp").hide();
            $("#send").show();

            $("#textboxshow").click(function(){
                $("#otpshow").hide();
                $(".shownumber").hide();
                $(".username").show();
            });

        }else{

        }
      
    });
});

$(document).ready(function() {
                $("#resend").hide();
                $("#otpclick").click(function(e){

                  e.preventDefault();

                  var n = $("input[name='number']").val();
                  /*var f = $("input[name='firstname']").val();
                  var l = $("input[name='lastname']").val();*/
                  if (n!="") {
                    $(".number-error").html("");
                    let timerOn = true;

                    function timer(remaining) {
                      var m = Math.floor(remaining / 60);
                      var s = remaining % 60;
                      
                      m = m < 10 ? '0' + m : m;
                      s = s < 10 ? '0' + s : s;
                      document.getElementById('timer').innerHTML = m + ':' + s;
                      remaining -= 1;
                      if (remaining===60) {
                        $("#resend").show();
                      }
                      if(remaining >= 0 && timerOn) {
                        setTimeout(function() {
                            timer(remaining);
                        }, 1000);
                        return;
                      }

                      if(!timerOn) {
                        // Do validate stuff here
                        return;
                      }
                      
                      // Do timeout stuff here
                      document.getElementById('timer').innerHTML = "Your otp has been expired";
                    }

                    timer(120);
                    $.ajax({

                      url: "<?php echo base_url('/ajax-otp_check_registration'); ?>",

                      type:"POST",
                      data: {n:n},

                      success: function(data) {
                        

                            $(".number-error").html(data);
                      }

                  });
                 }else{
                    $(".number-error").html("Please enter your mobile number");
                 }

              });
                $("#resend").click(function(e){
                    e.preventDefault();
                    $("#timer").hide();
                    $("#resend").hide();
                    $(".number-error").hide();
                  var n = $("input[name='number']").val();
                  if (n!="") {
                    $(".number-error").html("");
                    let timerOn = true;

                    function timer(remaining) {
                      var m = Math.floor(remaining / 60);
                      var s = remaining % 60;
                      
                      m = m < 10 ? '0' + m : m;
                      s = s < 10 ? '0' + s : s;
                      document.getElementById('timer1').innerHTML = m + ':' + s;
                      remaining -= 1;
                      if (remaining===60) {
                        $("#resend").show();
                      }
                      if(remaining >= 0 && timerOn) {
                        setTimeout(function() {
                            timer(remaining);
                        }, 1000);
                        return;
                      }

                      if(!timerOn) {
                        // Do validate stuff here
                        return;
                      }
                      
                      // Do timeout stuff here
                      document.getElementById('timer1').innerHTML = "Your otp has been expired";
                    }

                    timer(120);
                    $.ajax({

                      url: "<?php echo base_url('/ajax-otp_check_registration'); ?>",

                      type:"POST",

                      data: {n:n},

                      success: function(data) {
                            $(".number-error1").html(data);
                      }

                  });
                 }else{
                    $(".number-error").html("Please enter your mobile number");
                 }

                });

            });

$(document).ready(function(){
    $("#pwdclick").click(function(e){
        e.preventDefault();
        window.setTimeout(function() {
            window.location.href = "<?php echo base_url('/login/'); ?>";
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

