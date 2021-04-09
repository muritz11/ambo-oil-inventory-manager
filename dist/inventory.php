<?php
require_once 'assets/php/session_start.php';

require_once 'assets/php/helpers.php';

////an if to test for record editing
if (isset($_GET['edit']) and isset($_GET['id'])) {
    $query = $conn->query("SELECT * FROM inventory_list where id = {$_GET['id']}");
    if ($q = $query->fetch_assoc()) {
        extract($q);
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Inventory</title>
    <?php
    require_once '../assets/header_links.html';
    ?>
    <style>
        #add{
            float: right;
            margin-right: 10px;
        }
        .form{
            width: 80%;
            margin: auto;
            display: none;
        }
        #upd-tab, #avail-tab{
            cursor: pointer;
        }
        .after, .none{
            display: none;
        }
        .fa-edit{
            color: limegreen;
            margin-left: 10px;
            cursor: pointer;
        }
        .fa-edit:hover{
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
            width: 50%; /* Could be more or less, depending on screen size */
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
        .low a{
            color: black;
            text-decoration: none;
        }
    </style>
</head>
<body class="sb-nav-fixed">
<?php
require_once '../assets/header.html';
?>
<div id="layoutSidenav">
    <?php
    require_once '../assets/sidebar.html';
    ?>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Inventory</h1>


                <div class="card mb-4">
                    <div class="card-header" id="avail-tab">
                        <i class="fa fa-list-ul mr-1"></i>
                        product inventory
                    </div>
                    <div class="card-body" id="avail">
                        <div class="table-responsive" id="table-1">

<!--                            id="dataTable" is interfering with phyStock column check -->

                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Product name</th>
                                    <th>UOM</th>
                                    <th>Low stock point</th>
                                    <th>Physical stock</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Product name</th>
                                    <th>UOM</th>
                                    <th>Low stock point</th>
                                    <th>Physical stock</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                <?php
                                inventory_list();
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
                            <h5 style="color: black; font-weight: normal;"> <?= $q['product']." ".$q['pack_size'] ?></h5>
                            <span class="close">&times;</span>
                        </div>
                        <div class="modal-body">
                            <form action="assets/php/validate.php" method="post">
                                <div class="low-input">
                                    <input type="hidden" value="<?= $_GET['id'] ?? '' ?>" name="id">
                                    <input type="text" name="low_stock" placeholder="Change low stock point" style="border: none; outline: none" autocomplete="off">
                                    <button name="set-LS"><i class="fa fa-check"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>

            </div>
        </main>

        <?php
        require_once '../assets/footer.html';
        ?>
    </div>
</div>

<!--        require footer links-->
<?php
require_once '../assets/footer_links.html';
?>

    <script>

        $(document).ready(function () {

            var recBtn = $('#add');
            var recForm = $('.form');
            var table = $('#table-1');
            var bfor = $('.bfor');
            var after = $('.after');
            var prodName = $('#product');
            var uom = $('#uom');
            var supp = $('#supplied');
            var received = $('#received');
            var qty = $('#qty');
            var phy = $('#phy');
            var date = $('#date');
            var save = $('#save');

            recBtn.click(function () {
                table_tog();
            });

            //a function to toggle b/w table n form
            function table_tog(){
                table.toggle(function () {
                    bfor.toggle();
                    after.toggle();
                });
                recForm.toggle();
            }
            
            $('.close').click(function () {
                $('.modal').fadeToggle('slow');
            });
            
            function openModal() {
                $('.modal').fadeToggle('slow');
            }

            <?php
            echo isset($_GET['edit']) ? 'openModal();' : '';
            ?>

            $('#avail-tab').click(function () {
                $('#avail').fadeToggle();
            });


            var inputs = [prodName, uom, supp, received, qty, phy, date];

            save.click(function (e) {


                if (emptyInputs(inputs)){

                    var sure = confirm('Are you you want to save?? Some inputs are empty');

                    if(!sure) {
                        e.preventDefault();
                    }
                }
            });


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

            var del = $('.fa-trash-o');

            del.click(function (e) {
                var confam = confirm('Are you sure you want to delete this record?');

                if (!confam){
                    e.preventDefault();
                }
            });

        });

    </script>
</body>
</html>