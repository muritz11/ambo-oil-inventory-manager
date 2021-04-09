<?php
require_once 'assets/php/session_start.php';

require_once 'assets/php/helpers.php';


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Supply stock</title>
    <?php
    require_once '../assets/header_links.html';
    ?>
    <style>
        .form{
            width: 80%;
            margin: auto;
            display: none;
        }
        .after{
            display: none;
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
                <h1 class="mt-4">Supply stock</h1>

                <div class="card mb-4">
                    <div class="card-header">
                        <div class="row">
                            <div class="left col-6">
                                <i class="fa fa-truck mr-1"></i>
                                <span class="bfor">Supplied stock</span>
                                <span class="after">Add product you Supplied</span>
                            </div>
                            <div class="right col-6">
                                <div class="row">
                                    <div class="col-8"></div>
                                    <div class="col-4">
                                        <button class="btn btn-info" id="rcv">
                                            <span class="bfor">Supply stock</span>
                                            <span class="after">Go back</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Product name</th>
                                    <th>UOM</th>
                                    <th>Customer name</th>
                                    <th>Amount</th>
                                    <th>Quantity</th>
                                    <th>Date</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>S/N</th>
                                    <th>Product name</th>
                                    <th>UOM</th>
                                    <th>Customer name</th>
                                    <th>Amount</th>
                                    <th>Quantity</th>
                                    <th>Date</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                <?php
                                $table = dispTable('supplied_stock', 'customer_name');
                                ?>
                                </tbody>
                            </table>
                        </div>

                        <div class="form" id="form">
                            <form action="assets/php/validate.php" method="post">
                                <div class="form-group">
                                    <label for="product">Product name:</label>
                                    <input type="text" class="form-control" id="product" name="prodname">
                                </div>
                                <div class="form-group">
                                    <label for="pwd">UOM:</label>
                                    <input type="text" class="form-control" id="uom" name="uom">
                                </div>
                                <div class="form-group">
                                    <label for="supplier">Customer name:</label>
                                    <input type="text" class="form-control" id="name" name="name">
                                </div>
                                <div class="form-group">
                                    <label for="amt">Amount:</label>
                                    <input type="text" class="form-control" id="amt" name="amt">
                                </div>
                                <div class="form-group">
                                    <label for="qty">Quantity:</label>
                                    <input type="text" class="form-control" id="qty" name="qty">
                                </div>
                                <div class="form-group">
                                    <label for="date">Date:</label>
                                    <input type="date" class="form-control" id="date" name="date">
                                </div>
                                <button type="submit" class="btn btn-success" id="save" name="supp_stock">Save</button>
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

        var recBtn = $('#rcv');
        var recForm = $('.form');
        var table = $('.table-responsive');
//        var leftHead = $('.left');
        var bfor = $('.bfor');
        var after = $('.after');
        var prodName = $('#product');
        var uom = $('#uom');
        var name = $('#name');
        var amt = $('#amt');
        var qty = $('#qty');
        var date = $('#date');
        var save = $('#save');

        var inputs = [prodName, uom, name, amt, qty, date];

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

        <?php
        echo isset($_GET['save']) ? 'table_tog()' : '';
        ?>

        save.click(function (e) {
            if (emptyInputs(inputs)){

                var sure = confirm('Are you you want to save?? Some inputs are empty');

                if(!sure){
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
    })

</script>

</body>
</html>