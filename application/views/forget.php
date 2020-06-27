<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if (isset($_SESSION['otp'])) {
    $this->session->set_tempdata('otp', $_SESSION['otp'], 120);
}
if ($this->session->userdata('user_token')) {
    redirect('/letsstart/');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Forget Password</title>
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
        .otpdata{
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
            <h1 class="section_title mt_20">Forget password to your account</h1>
            <?php $attributes = array('id' => 'formdata');
                 echo form_open('forget/otperror', $attributes); ?>
                <div class="col-md-7 float-left col-12 no-padding mb_20 numberdata">
                    <label>Mobile No</label>
                    <input type="text" name="MobileNo" class="form-control numberget" id="number" value="<?php echo set_value('MobileNo'); ?>" placeholder="Please enter register mobile number">
                    <span class="help-block mobileerror" name="errordata"><?php echo form_error('MobileNo'); echo @$errordata; ?></span>
                </div>
                
                <div class="col-md-7 float-left col-12 no-padding mb_20 otpdata" id="otp">
                    <input type="password" maxlength="6" name="otp" class="form-control" id="otphere" placeholder="Enter OTP">
                    <span class="help-block"><?php echo form_error('otp'); ?></span>
                    <span id="timer"></span>
                    <span id="timer1"></span>
                    <a href="" id="resend1">Re Send</a>
                    <input type="hidden" name="ok" id="ok">
                    <span class="help-block number-error1"></span>
                </div>
                <div class="col-md-7 float-left col-12 no-padding clickdata">
                    <input type="submit" class="primary_btn" id="submit" value="Submit">
                </div>
                <div class="col-md-7 float-left col-12 no-padding submitotp">
                    <input type="submit" class="primary_btn" name="submit" id="otpcheck" value="Submit">
                </div>
                <span class="w-100 float-left pb_10">
                    <a href="<?php echo base_url(); ?>" class="pl_20">Sign in</a> 
                </span>

            </form>
        </div> <!--Col-md 5 End here ===================-->
    </div> <!--Login box-->
</div>
    

     
</body>
</html>

<script src="<?php echo base_url('assets/js/jquery-3.4.0.min.js'); ?>"></script>
<script type="text/javascript">
    
$(document).ready(function() {
    $(".submitotp").hide();
    $("#submit").click(function(e){
        e.preventDefault();
        var mo = $(".numberget").val();
        if (mo!="") {
            $.ajax({
                url: "<?php echo base_url('forget/'); ?>",

                  type:"POST",
                  data: {mo:mo},

                  success: function(data) {
                    

                        if (data=="success") {

                            var n = $("input[name='MobileNo']").val();
                            
                              if (n!="") {
                                $(".number-error1").html("");
                                let timerOn = true;

                                function timer(remaining) {
                                  var m = Math.floor(remaining / 60);
                                  var s = remaining % 60;
                                  
                                  m = m < 10 ? '0' + m : m;
                                  s = s < 10 ? '0' + s : s;
                                  document.getElementById('timer').innerHTML = m + ':' + s;
                                  remaining -= 1;
                                  if (remaining===60) {
                                    $("#resend1").show();
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
                                    $(".number-error1").html(data);    
                                  }

                              });
                             }else{
                                $(".number-error1").html("Please enter your mobile number");
                             }
                            $("#resend1").hide();
                            $("#otp").show();
                            $("#resend1").click(function(e){
                                e.preventDefault();
                                $("#timer").hide();
                                $("#resend1").hide();
                                $(".number-error1").hide();
                                var n = $("input[name='MobileNo']").val();
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
                                            $("#resend1").show();
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
                                $(".number-error1").html("Please enter your mobile number");
                             }

                            });
                        }else
                        {
                            $(".mobileerror").html(data);
                        }
                  }

              });
        
        $(".clickdata").hide();
        $(".submitotp").show();
        }
    });
});
$(document).ready(function() {
    $("#otpcheck").click(function(e){
        e.preventDefault();
        var num = $("#number").val();
        var o = $("#otphere").val();
        if (num!="") {
          $(".clickdata").hide();
          $(".submitotp").show();
          $.ajax({
            url: "<?php echo base_url('/otperror'); ?>",
            type:"POST",
            data: {num:num,o:o},
            success: function(data) {
              $(".clickdata").hide();
              $(".submitotp").show();
              if (data=="Success") {
                window.location.replace("<?php echo base_url("/changepassword/"); ?>");
              }else{
                $(".number-error1").html(data);
              }

            }
          });
      }
  });
});

</script>
