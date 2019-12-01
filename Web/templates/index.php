
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
                    <form method="POST" id="signup-form" class="signup-form" action="process.php" name="login-form">
                        <h2 class="form-title">Log In</h2>
                        <div class="form-group">
                            <input type="text" class="form-input" name="user" id="user" placeholder="User Name"/>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-input" name="password" id="password" placeholder="Password"/>
                            <span toggle="#password" class="zmdi field-icon toggle-password zmdi-eye-off"></span>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="login" id="login" class="form-submit"  value="Log in" onclick=" return checkdata()" />
                        </div>
                    </form>
                    <p class="loginhere">
                    Have not created an account before? <a href="register.php" class="loginhere-link">Sign up</a>
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
        var user=document.forms['signup-form']['user'].value;
        var password=document.forms['signup-form']['password'].value;
        if(user==""|| password=="")
        {
            alert("Please enter full information!");
            return false;
        }

    }
</script>