<?php
session_start();

if (isset($_SESSION['msg'])){
    $msg = $_SESSION['msg'];

//    $username = $_SESSION['username'];
//    $email = $_SESSION['email'];
//    $firstName = $_SESSION['firstname'];
//    $lastName = $_SESSION['lastname'];

    session_unset();
}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Ambo oil - login</title>
        <link rel="icon" href="../dist/assets/img/oando.jpg">
        <link href="css/styles.css" rel="stylesheet" />
        <style>
            .msg{
                width: 50%;
                margin: auto;
                text-align: center;
                position: absolute;
                top: 10px;
                left: 25%;
                opacity: 0;
                z-index: 1;
            }
            #loader {
                position: absolute;
                left: 40%;
                top: 40%;
                z-index: 1;
                /*margin: -75px 0 0 -75px;*/
                /*border: 16px solid #f3f3f3;*/
                border-radius: 50%;
                /*border-top: 16px solid #3498db;*/
                width: 120px;
                height: 120px;
                opacity: 0.95;
                /*-webkit-animation: spin 2s linear infinite;*/
                animation: spin 2s linear infinite;
            }
            @keyframes spin {
                0% { transform: rotate(0deg); }
                100% { transform: rotate(360deg); }
            }
        </style>
    </head>
    <body class="bg-primary">

        <img src="assets/img/images.png" alt="" id="loader">
        <div class="alert alert-danger msg"><h5 id="msgH5"><?=$msg ?? '' ?></h5></div>

        <div id="layoutAuthentication" class="none">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                                    <div class="card-body">
                                        <form action="assets/php/validate.php" method="post">
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputUsername">Username</label>
                                                <input class="form-control py-4" id="inputUsername" type="text" name="username" placeholder="Enter Username" />
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputPassword">Password</label>
                                                <input class="form-control py-4" id="inputPassword" type="password" name="password" placeholder="Enter password" />
                                            </div>
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox">
                                                    <input class="custom-control-input" id="rememberPasswordCheck" type="checkbox" />
                                                    <label class="custom-control-label" for="rememberPasswordCheck">Remember password</label>
                                                </div>
                                            </div>
                                            <div id="errmsg" style="display: none;"></div>
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <a class="small" href="password.html">Forgot Password?</a>
                                                <button class="btn btn-primary" name="login" id="login">Login</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center">
                                        <div class="small"><a href="register.php">Need an account? Sign up!</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2020</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="../library/ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js" crossorigin="anonymous"></script>
<!--        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>-->
        <script src="js/scripts.js"></script>
        <script>

            var msg = $('.msg');
            var msgH5 = $('#msgH5');
            var user = $('#inputUsername');
            var pwd =  $('#inputPassword');
            var loginBtn  = $('#login');
            var errMsg  = $('#errmsg');


            if (msgH5.text() === ''){
                msg.hide();
            } else {
                msg.show('slow');
                msg.animate({top: '0px', opacity:0.95}, "slow");
                msg.animate({top: '10px'}, "slow");
                setTimeout(function () {
                    msg.hide('slow');
                }, 7000);
            }


            var inputFields = [user, pwd];
            //some front end validation
            loginBtn.click(function (e) {

                if (emptyInputs(inputFields)){

                    e.preventDefault();
                    displayError('Check for empty fields', 'warning');

                }

            });


            var i;
            function emptyInputs(input) {
                if (Array.isArray(input)){
                    for(i = 0; i < input.length; i++){
                        if(input[i].val().length < 1){
                            return true;
                        }
                    }
                } else {
                    if(input.val().length < 1){
                        return true;
                    }
                }
            }

            function displayError(report, colour){
                errMsg.show(500);
                errMsg.html("<div class='alert alert-"+ colour +"'>"+ report +"</div>");
                setTimeout(function(){
                    errMsg.hide('slow');
                }, 3000)
            }


            var loader = $('#loader');
            var primary = $('.none');

            window.onload = primary.hide();

            function showPage() {
                loader.hide('fast');
                primary.show('slow');
            }

            function loaderAnime() {
                setTimeout(showPage, 100);
            }

            window.onload = loaderAnime();
        </script>
    </body>
</html>
