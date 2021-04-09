<?php
require_once 'assets/php/session_start.php';
$title = 'Users';

require_once 'assets/php/helpers.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Users</title>
    <?php
    require_once 'assets/demo/header_links.html';
    ?>
    <style>
        .marg{
            margin-bottom: 50px;
        }

        /*modal*/
        .modal {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1; /* Sit on top */
            right: 0;
            bottom: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgb(0,0,0); /* Fallback color */
            background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
            -webkit-animation-name: fadeIn; /* Fade in the background */
            -webkit-animation-duration: 0.4s;
            animation-name: fadeIn;
            animation-duration: 0.4s
        }

        .modal-content {
            display: none;
            margin: 15% auto; /* 15% from the top and centered */
            border: 1px solid #888;
            width: 30%; /* Could be more or less, depending on screen size */
            min-height: 200px;
        }


        /* Modal Body */
        .modal-body {
            padding: 30px 16px;
            text-align: center;
        }

        .fa-warning{
            color: #FFB800;
        }
    </style>
</head>
<body class="sb-nav-fixed">
            <div class="container-fluid">
                <div class="alert alert-success msg" style="display:none;width: 50%;
                margin: auto;
                text-align: center;
                position: absolute;
                top: 10px;
                left: 25%;
                opacity: 0;
                z-index: 1;"><h5 id="msgH5"><?=$msg ?? '' ?></h5></div>
                <h1 class="mt-4 ">Manage users</h1>
                <h5 class="marg"><a href="index.php"><i class="fa fa-chevron-circle-left"></i> Home</a></h5>

                <div class="alert" id="msg" style="display:none;">
                    <strong>Info!</strong> Indicates a neutral informative change or action.
                </div>

                <div class="users marg">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="bg-light">
                            <tr>
                                <th>ID</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            getUsers($usuario['id']);
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- The Modal -->
                <div id="alertModal" class="modal" role="dialog">

                    <!-- Modal content -->
                    <div class="modal-content">
                        <div class="modal-body">
                            <i class="fa fa-warning fa-5x"></i>
                            <h2>Are you sure?</h2>
                            <p class="text-muted">You won't be able to revert this!</p>
                            <a href="users.php?del=0" class="btn bg-light" id="close">No, cancel</a>

                            <form action="users.php" method="post" style="display: inline;">
                                <input type="hidden" value="<?= $_GET['id'] ?>" name="id">
                                <button class="btn btn-danger" name="del-user">Yes, delete user</button>
                            </form>

                        </div>
                    </div>

                </div>

            </div>

        <?php
        require_once 'assets/demo/footer.html';
        ?>

<!--        require footer links-->
<?php
require_once 'assets/demo/footer_links.html';
?>


            <script>


                //displays err/success msg
                function displayError(report, colour){
                    var msg = $('#msg');
                    msg.slideDown();
                    msg.addClass("alert-" + colour);
                    msg.html(report);
                    setTimeout(function(){
                        msg.slideUp();
                        msg.removeClass("alert-" + colour);
                    }, 4000)
                }

                $(document).ready(function () {

                    var mod = $('.modal');
                    var modal = $('.modal-content');
                    var close = $('#close');


                    close.click(function () {
                        modal.toggle('slow', function () {
                            mod.toggle();
                        });
                    });


                    <?php
                    echo isset($_GET['del']) && $_GET['del'] == 1 ? 'openModal();' : '';
                    ?>

                });

                $(document).on('click', '#btnDel', function (e) {
                    e.preventDefault();
                    info = $(this).attr('delID');
                    nom = $(this).attr('delUser');
                    if(confirm('Are you sure you want to delete: '+ nom.toUpperCase())) {

                        $.ajax({
                            url: 'assets/php/helpers.php',
                            method: 'POST',
                            data: {delUser: info},
                            success: function (data) {
                                if (data == 'ok'){
                                    displayError('User deleted', 'info');
                                    setTimeout( ()=>{
                                        window.top.location = window.top.location;
                                    },1000)
                                } else{
                                    alert(data);
                                }
                            },
                            error: function (status) {
                                console.log('something went wrong')
                            }
                        })
                    }

                })


            </script>
</body>
</html>