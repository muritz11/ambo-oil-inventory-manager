<?php
require_once 'assets/php/session_start.php';
$title = 'Monthly stock';

require_once 'assets/php/helpers.php';

$months = ['Select month', 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];


$this_year = date("Y");
$this_month = date("m");


if (isset($_POST['set-LS'])){

    $sel_month = $_POST['months'];

    $new_month = two_dec($sel_month);

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    require_once 'assets/demo/header_links.html';
    ?>
    <style>
        .fa-calendar-plus-o{
            color: green;
            cursor: pointer;
        }
        .fa-calendar-plus-o:hover{
            transform: scale(1.2);
            transition: .5s;
        }

        .modal {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1; /* Sit on top */
            left: 0;
            top: 0;
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
            background-image: url("assets/img/images2.jpeg");
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            color: white;
            margin: 15% auto; /* 15% from the top and centered */
            border: 1px solid #888;
            width: 30%; /* Could be more or less, depending on screen size */
            min-height: 200px;
        }
        .close {
            /*color: #aaa;*/
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        .modal-header {
            padding: 2px 16px;
            background-color: white;
            color: white;
        }

        /* Modal Body */
        .modal-body {
            padding: 20px 16px;
            text-align: center;
        }
        .low-input{
            width: 60%;
            margin: 15% auto;
            background: white;
            border-radius: 20px;
            padding: 8px;
        }
        .low-input button{
            background: none;
            color: green;
            float: right;
            padding: 2px;
            border: none;
        }
        .low-input button:hover{
            background: #ddd;
            border-radius: 50%;
        }
        #select{
            border: none;
            outline: none;
        }
    </style>
</head>
<body class="sb-nav-fixed">
<?php
require_once 'assets/demo/header.html';
?>
<div id="layoutSidenav">
    <?php
    require_once 'assets/demo/sidebar.html';
    ?>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Monthly stock</h1>


                <div class="card mb-4">
                    <div class="card-header" id="avail-tab">

                        <div class="row">
                            <div class="col-6" id="upd-tab">
                                <i class="fa fa-calendar mr-1"></i>
                                monthly stock
                            </div>
                            <div class="col-6 text-right">
                                <?= isset($_POST['months'])? $months[$sel_month].", ".date("Y") : date("F, Y"); ?>
                                <i class="fa fa-calendar-plus-o" title="choose month"></i>
                            </div>
                        </div>
                    </div>
                    <div class="card-body" id="avail">
                        <div class="table-responsive" id="table-1">
                            <table class="table table-bordered" id="my_table" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Product name</th>
                                    <th>UOM</th>
                                    <th>Opening stock</th>
                                    <th>Received stock</th>
                                    <th>Supplied stock</th>
                                    <th>Physical stock</th>
                                    <th>Date</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Product name</th>
                                    <th>UOM</th>
                                    <th>Opening stock</th>
                                    <th>Received stock</th>
                                    <th>Supplied stock</th>
                                    <th>Physical stock</th>
                                    <th>Date</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                <?php

                                isset($_POST['months']) ? monthly($this_year, $new_month) : monthly($this_year, $this_month);

                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- The Modal -->
                <div id="myModal" class="modal">

                    <!-- Modal content -->
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 style="color: black; font-weight: normal;">Choose month</h5>
                            <span class="close">&times;</span>
                        </div>
                        <div class="modal-body">
                            <form action="monthly.php" method="post">
                                <div class="low-input">
                                    <select name="months" id="select">
                                        <?php

                                        for ($x = 1; $x < count($months); $x++){

                                            echo '<option value="'.$x.'">'.$months[$x].'</option>';

                                        }

                                        ?>
                                    </select>
                                    <button name="set-LS"><i class="fa fa-check"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>

            </div>
        </main>

        <?php
        require_once 'assets/demo/footer.html';
        ?>
    </div>
</div>

<!--        require footer links-->
<?php
require_once 'assets/demo/footer_links.html';
?>

<script>
    $(document).ready(function () {

        var addMonth = $('.fa-calendar-plus-o');

        $('.close').click(function () {
            $('.modal').fadeToggle('slow');
        });

        addMonth.click(function () {

            $('.modal').fadeToggle('slow');

        });

    });
</script>
</body>
</html>