<?php
session_start();
$title = 'Ambo oil - login';


if (isset($_SESSION['msg'])){
    $msg = $_SESSION['msg'];

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
                                            <div id="errmsg" style="display: none;"></div>
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
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
            <div id="layoutAuthentication_footer" class="fixed-bottom">
                <?php
                require_once 'assets/demo/footer.html';
                ?>
            </div>
        </div>
        <?php
        require_once 'assets/demo/footer_links.html';
        ?>


        <script>

            var user = $('#inputUsername');
            var pwd =  $('#inputPassword');
            var loginBtn  = $('#login');
            var errMsg  = $('#errmsg');


            var inputFields = [user, pwd];
            //a lil front end validation
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

        </script>
    </body>
</html>
