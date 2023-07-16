<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="astyle.css">
    <title>Login</title>
</head>
<body>
    <div id="mobile">
        <div></div>
        <div>Mohon maaf untuk tampilan mobile sedang kami kembangkan</div>
        <div>Silakan unggah naskah menggunakan laptop / komputer</div>
    </div>
    <div id="otp" style="display: none">
        <form style="background-color: transparent" id="otpform" action="">
            <input type="text" value="<?php echo $_GET['signinemail'] ?>" hidden>
            <div id="divotp" >
                <input type="number" style="width: 50%">
            </div>
        </form>
    </div>
    <!-- <h2>Weekly Coding Challenge #1: Sign in/up Form</h2> -->
    <div class="container" id="container">
        <div class="form-container sign-up-container">
            <form action="control.php" method="post">
                <h1>Buat Akun</h1>
                <div class="social-container">
                </div>

                <!-- pesan error -->
                <?php if (isset($_GET['errorsignup'])) { ?>
                    <script>container.classList.add("right-panel-active")</script>
                    <span style="color: red; font-weight: bold;"><?php echo $_GET['errorsignup']; ?></span>
                <?php } else { ?>
                    <span style="color: white;">Buat Akun</span>
                <?php } ?>
                
                <!-- input pesanan -->
                <?php if (isset($_GET['user'])) { ?>
                    <script>container.classList.add("right-panel-active")</script>
                    <input type="text" placeholder="Name" name="user" value="<?php echo $_GET['user'] ?>"/>
                <?php } else { ?>
                    <input type="text" placeholder="Name" name="user"/>
                <?php } ?>

                <?php if (isset($_GET['email'])) { ?>
                    <script>container.classList.add("right-panel-active")</script>
                    <input type="email" placeholder="Email" name="email" value="<?php echo $_GET['email'] ?>" />
                <?php } else { ?>
                    <input type="email" placeholder="Email" name="email"/>
                <?php } ?>
                
                <input type="password" placeholder="Password" name="password"/>
                <input type="password" placeholder="Confirm assword" name="re_password"/>
                <button id="btnnsgn" type="submit" name="signup">Daftar</button>
            </form>
        </div>
        <div class="form-container sign-in-container">
            <form action="login.php" method="post" id="formm">
                <img style="height: 60px;" src="../assets/login.png" alt="Login">
                <div class="social-container">
                </div>
                
                <!-- error sistem -->
                <?php if (isset($_GET['errorsignin'])) { ?>
                    <span style="color: red; font-weight: bold;"><?php echo $_GET['errorsignin']; ?></span>
                <?php } else { ?>
                    <span style="color: white;">Masuk</span>
                <?php } ?>

                <!-- input data -->
                <?php if (isset($_GET['signinemail'])) { ?>
                    <input id="disinp" type="email" placeholder="Email" name="user" value="<?php echo $_GET['signinemail'] ?>" require/>
                <?php } else { ?>
                    <input id="disinp" type="email" name="user" placeholder="Email" require/>
                <?php } ?>

                <input id="disinput" type="password" name="pass" placeholder="Password" require/>
                
                <!-- <div class="social-container" id="soccc"></div> -->
                    <section class="chapca" id="chapca">
                        <sdc style="font-size: x-small;">Silakan masukan captcha</sdc>
                        <div style="height: 10px"></div>
                        <div class="content">
                            <span id="captcha-error" class="error"></span>
                            <div class="captcha-wrap">
                                <div id="CaptchaImageCode">
                                    <canvas id="CapCode" class="capcode" width="300" height="80"></canvas>
                                </div>
                                <input type="button" class="ReloadBtn" onclick="CreateCaptcha()">
                            </div>
                            <div style="display: grid; grid-template-columns: 1fr 1fr;">
                                <input style="height: 20px" type="text" id="captcha-code" class="input" placeholder="Enter Captcha">
                                <input type="button" value="Submit" class="btnSubmit" onclick="CheckCaptcha(); Submit()">
                            </div>
                        </div>
                    </section>
                    <input type="submit" name="lupaPass" value="Lupa Password" class="lupaPass">
                <button id="btnnlog" type="submit">Masuk</button>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <!-- <h1>Welcome Back!</h1> -->
                    <img style="margin: 25px; width: 200px;" src="../assets/itbpress.png" alt="ITB Press">
                    <p></p>
                    <button class="ghost" id="signIn">Masuk</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Selamat Datang!</h1>
                    <img src="../assets/bookysign.png" alt="booky" style="height: 200px; margin: 15px;">
                    <!-- <p>Enter your personal details and start journey with us</p> -->
                    <button class="ghost" id="signUp">Daftar</button>
                </div>
            </div>
        </div>
        <div id="mobileSignup" class="mobile-signup">Daftar</div>
        <div id="mobileSignin" class="mobile-signin">Masuk</div>
    </div> 
    <div class="mobile-landscape">
        <h1>Silakan putar mobile Anda</h1>
        <img src="../assets/booky.png" alt="">
    </div>
    <script>
        const signUpButton = document.getElementById('signUp');
        const signInButton = document.getElementById('signIn');
        const container = document.getElementById('container');

        signUpButton.addEventListener('click', () => {
            container.classList.add("right-panel-active");
        });

        signInButton.addEventListener('click', () => {
            container.classList.remove("right-panel-active");
        });

        document.addEventListener("DOMContentLoaded", function() {
        var form = document.getElementById('formm');

        form.addEventListener("keydown", function(event) {
            if (event.key === "Enter") {
            event.preventDefault();
            return false;
            }
        });
        });

        const mobileSignup = document.getElementById('mobileSignup')
        const mobileSignin = document.getElementById('mobileSignin')

        mobileSignup.addEventListener('click', function(){
            container.classList.add("right-panel-active")
            mobileSignup.style.display = "none"
            mobileSignin.style.display = "grid"
        })

        mobileSignin.addEventListener('click', function(){
            container.classList.remove("right-panel-active")
            mobileSignup.style.display = "grid"
            mobileSignin.style.display = "none"
        })
    </script>
    <script src="js/jquery.js"></script>
    <script src="js/captcha.js"></script>
    <script src="js/script.js"></script>
    <?php

    if(isset($_GET['otp'])){?>
        <script>document.getElementById('otp').style.display = "block"</script>
    <?php } ?>
</body>
</html>