<?php
session_start();
$title = 'Ambo oil - create account';

if (isset($_SESSION['errmsg'])){
    $msg = $_SESSION['errmsg'];

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
        <?php
        require_once 'assets/demo/header_links.html';
        ?>
    </head>
    <body class="bg-primary">


        <img src="assets/img/images.png" alt="" id="loader">
        <div class="alert alert-danger msg"><h5 id="msgH5"><?=$msg ?? '' ?></h5></div>

        <div class="main-content">
            <!--        this ^ had an id="layoutAuthentication"...-->
            <div id="layoutAuthentication_content" class="marg-bottom">
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
                                            <div id="errmsg" style="display: none;"></div>
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
            <div id="layoutAuthentication_footer">
                <?php
                require_once 'assets/demo/footer.html';
                ?>
            </div>
        </div>

        <?php
        require_once 'assets/demo/footer_links.html';
        ?>
        <script>
            var saveAcct = $('#createAcct');
            var userName = $('#inputUsername');
            var firstName = $('#inputFirstName');
            var lastName = $('#inputLastName');
            var email = $('#inputEmailAddress');
            var pass = $('#inputPassword');
            var conPass = $('#inputConfirmPassword');
            var errMsg = $('#errmsg');


            var inputFields = [userName, firstName, lastName, email, pass, conPass];

            saveAcct.click(function (e) {
                //onclick of save btn run our front end validation

                if (emptyInputs(inputFields)){

                    e.preventDefault();
                    displayError('Check for empty fields', 'danger');

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

            
            function displayError(report, colour){
                errMsg.show(700);
                errMsg.html("<div class='alert alert-"+ colour +"'>"+ report +"</div>");
                setTimeout(function(){
                    errMsg.hide('slow');
                }, 3000)
            }

        </script>
    </body>
</html>
