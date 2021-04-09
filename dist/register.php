<?php
session_start();

if (isset($_SESSION['errmsg'])){
    $errMsg = $_SESSION['errmsg'];

    $username = $_SESSION['username'];
    $email = $_SESSION['email'];
    $firstName = $_SESSION['firstname'];
    $lastName = $_SESSION['lastname'];

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
        <title>Ambo oil - create account</title>
        <link rel="icon" href="../dist/assets/img/oando.jpg">
        <link href="css/styles.css" rel="stylesheet" />
        <style>
            .red{
                color: red;
            }
            .errmsg{
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

        <div class="alert alert-danger errmsg"><h5 id="errmsg"><?=$errMsg ?? '' ?></h5></div>

        <div id="layoutAuthentication" class="none">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Create Account</h3></div>
                                    <div class="card-body">
                                        <form action="assets/php/validate.php" method="post">
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Username <span class="red">*</span></label>
                                                <input class="form-control py-4" id="inputUsername" type="text" name="username" placeholder="Enter username" value="<?=$username ?? '' ?>" />
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputFirstName">First Name <span class="red">*</span></label>
                                                        <input class="form-control py-4" id="inputFirstName" type="text" name="firstname" placeholder="Enter first name" value="<?=$firstName ?? '' ?>" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputLastName">Last Name <span class="red">*</span></label>
                                                        <input class="form-control py-4" id="inputLastName" type="text" name="lastname" placeholder="Enter last name" value="<?=$lastName ?? '' ?>" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Email <span class="red">*</span></label>
                                                <input class="form-control py-4" id="inputEmailAddress" type="email" name="email" aria-describedby="emailHelp" placeholder="Enter email address" value="<?=$email ?? '' ?>" />
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputPassword">Password <span class="red">*</span></label>
                                                        <input class="form-control py-4" id="inputPassword" type="password" name="password" placeholder="Enter password" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputConfirmPassword">Confirm Password <span class="red">*</span></label>
                                                        <input class="form-control py-4" id="inputConfirmPassword" type="password" name="conpassword" placeholder="Confirm password" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="msg" style="display: none;"></div>
                                            <div class="form-group mt-4 mb-0" id="createAcct"><button class="btn btn-primary btn-block" name="save">Create Account</button></div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center">
                                        <div class="small"><a href="login.php">Have an account? Go to login</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer" style="margin-top: 40px">
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
<!--        <script src="../library/bootstrap/js/bootstrap.min.js" crossorigin="anonymous"></script>-->
        <script src="js/scripts.js"></script>


        <script>
            var saveAcct = $('#createAcct');
            var userName = $('#inputUsername');
            var firstName = $('#inputFirstName');
            var lastName = $('#inputLastName');
            var email = $('#inputEmailAddress');
            var pass = $('#inputPassword');
            var conPass = $('#inputConfirmPassword');
            var errMsg = $('#msg');


            var inputFields = [userName, firstName, lastName, email, pass, conPass];

            saveAcct.click(function (e) {
                //onclick of save btn run our front end validation

                if (emptyInputs(inputFields)){

                    e.preventDefault();
                    displayError('Check for empty fields', 'info');

                } else if(pass.val().length < 6) {

                    e.preventDefault();
                    displayError('Password must be upto 6 characters', 'warning');

                } else if(userName.val().match(/ /g)){

                    e.preventDefault();
                    displayError('username cannot contain whitespaces', 'info');

                } else if(!/@/.test(email.val())){

                    e.preventDefault();
                    displayError('Sorry, invalid email', 'danger');

                } else if(pass.val() != conPass.val()){

                    e.preventDefault();
                    displayError('Password does not match confirm password', 'danger');

                } else if(/\d/.test(firstName.val()) || /\d/.test(lastName.val())){

                    e.preventDefault();
                    displayError('Sorry, name cannot contain numbers', 'info');

                }
                //if everything checks out submit the form for back end validation

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



            var errMsg2 = $('.errmsg');
            var errH5 = $('#errmsg');

            if (errH5.text() === ''){
                errMsg2.hide();
            } else {
                errMsg2.show('slow');
                errMsg2.animate({top: '0px', opacity:0.95}, "slow");
                errMsg2.animate({top: '10px'}, "slow");
                setTimeout(function () {
                    errMsg2.hide('slow');
                }, 4000);
            }
            
            function displayError(report, colour){
                errMsg.show(700);
                errMsg.html("<div class='alert alert-"+ colour +"'>"+ report +"</div>");
                setTimeout(function(){
                    errMsg.hide('slow');
                }, 3000)
            }


            var loader = $('#loader');
            var primary = $('.none');

            window.onload = primary.hide();

            function showPage() {
                loader.hide('slow');
                primary.show('slow');
            }

            function loaderAnime() {
                setTimeout(showPage, 100);
            }

            window.onload = loaderAnime();
        </script>
    </body>
</html>
