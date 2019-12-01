
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home Control</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="../static/fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="../static/css/style.css">
</head>
<style type="text/css">
    input.form-submit
    {
        cursor: pointer;
    }
    input.form-submit:hover
    {
        color: black;
        background-image: linear-gradient(to right, #74ebd5, #9face6);
    }
    a.loginhere-link:hover{
        color: blue;
    }
</style>
<body>

    <div class="main">

        <section class="signup">
            <!-- <img src="images/signup-bg.jpg" alt=""> -->
            <div class="container">
                <div class="signup-content">
                    <form method="POST" id="signup-form" class="signup-form" action="process.php" name="signup-form">
                        <h2 class="form-title">Registration</h2>
                        <div class="form-group">
                            <input type="text" class="form-input" name="name" id="name" placeholder="Full Name"/>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-input" name="email" id="emial" placeholder="Email"/>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-input" name="phone" id="phone" placeholder="Phone"/>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-input" name="user" id="user" placeholder="User Name" />
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-input" name="password" id="password" placeholder="Password"/>
                            <span toggle="#password" class="zmdi field-icon toggle-password zmdi-eye-off"></span>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-input" name="re_password" id="re_password" placeholder="Enter your password again"/>
                        </div>
                    <!--<div class="form-group">
                            <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                            <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                        </div>-->
                        <div class="form-group">
                            <input type="submit" name="signup" id="signup" class="form-submit" value="Sign up" onclick=" return checkdata()" />
                        </div>
                    </form>
                    <p class="loginhere">
                        Have already an account ? <a href="index.php" class="loginhere-link">Login here</a>
                    </p>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="../static/vendor/jquery/jquery.min.js"></script>
    <script src="../static/js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>
<script type="text/javascript">
    function checkdata()
    {
        var name=document.forms['signup-form']['name'].value;
        var phone=document.forms['signup-form']['phone'].value;
        var user=document.forms['signup-form']['user'].value;
        var password=document.forms['signup-form']['password'].value;
        var re_password=document.forms['signup-form']['re_password'].value;
        if(name==""|| phone==""|| user==""|| password==""|| re_password=="")
        {
            alert("Please enter full information!");
            return false;
        }
        else
        {
            if(password!=re_password)
            {
                alert("Please check your re_password!");
                return false;
            }
        }

        function a()
        {
           // var phone=document.forms['signup-form']['phone'].value;
            alert('helllo');
            /*var vnf_regex = /((09|03|07|08|05)+([0-9]{8})\b)/g;
            if (vnf_regex.test(phone) == false) 
            {
                alert('Số điện thoại của bạn không đúng định dạng!');
            }else{
                alert('Số điện thoại của bạn hợp lệ!');
            }*/
        }

    }
</script>