<?php
require_once 'assets/php/session_start.php';

require_once 'assets/php/helpers.php';


//an if to test for record deletion
if (isset($_GET['del']) and isset($_GET['id'])){
    $conn->query("delete FROM outstanding_products where id = {$_GET['id']}");
    $msg = "Record deleted";

    $_SESSION['msg'] = $msg;
}

////an if to test for record editing
if (isset($_GET['edit']) and isset($_GET['id'])) {
    $query = $conn->query("SELECT product_name, UOM, supplier, amount, quantity, date FROM outstanding_products where id = {$_GET['id']}");
    if ($q = $query->fetch_assoc()) {
        extract($q);
        $msg = "edit record #".$_GET['id'];
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Outstanding stock</title>
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
        #edit{
            color: limegreen;
            margin-left: 10px;
            cursor: pointer;
        }
        #delete{
            color: red;
            margin-left: 5px;
            cursor: pointer;
        }
        #edit:hover, #delete:hover{
            transform: scale(1.4);
            transition: .5s;
        }
        #rcv{
            padding: 3px;
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
                <h1 class="mt-4">Outstanding stock</h1>

                <div class="card mb-4">
                    <div class="card-header">
                        <div class="row">
                            <div class="left col-6">
                                <i class="fa fa-external-link mr-1"></i>
                                <span class="bfor">Outstanding stock with the supplier</span>
                                <span class="after"><?= isset($_GET['edit']) ? 'edit record '.$_GET["id"].': supplied by '.$supplier : 'Enter outstanding products with the supplier' ?></span>
                            </div>
                            <div class="right col-6">
                                <div class="row">
                                    <div class="col-8"></div>
                                    <div class="col-4">
                                        <button class="btn btn-info" id="rcv">
                                            <span class="bfor">Add outstanding</span>
                                            <span class="after"><i class="fa fa-chevron-circle-left"></i> Go back</span>
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
                                    <th>Supplier</th>
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
                                    <th>Supplier</th>
                                    <th>Amount</th>
                                    <th>Quantity</th>
                                    <th>Date</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                <?php
                                outstanding();
                                ?>
                                </tbody>
                            </table>
                        </div>

                        <div class="form" id="form">
                            <form action="assets/php/validate.php" method="post">
                                <div class="form-group">
                                    <label for="product">Product name:</label>
                                    <input type="text" class="form-control" id="product" name="prodname" value="<?=$product_name ?? '' ?>" <?php echo isset($_GET['edit']) ? 'style="background: #E9ECEF;"' : ''?> >
                                </div>
                                <div class="form-group">
                                    <label for="uom">UOM:</label>
                                    <input type="text" class="form-control" id="uom" name="uom" value="<?=$UOM ?? '' ?>" <?php echo isset($_GET['edit']) ? 'style="background: #E9ECEF;"' : ''?> >
                                </div>
                                <div class="form-group">
                                    <label for="qty">Quantity:</label>
                                    <input type="text" class="form-control" id="qty" name="qty" value="<?=$quantity ?? '' ?>">
                                </div>
                                <div class="form-group">
                                    <label for="amt">Amount:</label>
                                    <input type="text" class="form-control" id="amt" name="amt" value="<?=$amount ?? '' ?>">
                                </div>
                                <div class="form-group">
                                    <label for="supplier">Supplier:</label>
                                    <input type="text" class="form-control" id="supplier" name="name" value="<?=$supplier ?? '' ?>" <?php echo isset($_GET['edit']) ? 'style="background: #E9ECEF;"' : ''?> >
                                </div>
                                <div class="form-group">
                                    <label for="date">Date:</label>
                                    <input type="date" class="form-control" id="date" name="date">
                                </div>
                                <button type="submit" class="btn btn-success" id="save" name="outstanding">Save</button>
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
        var bfor = $('.bfor');
        var after = $('.after');
        var prodName = $('#product');
        var uom = $('#uom');
        var supp = $('#supplier');
        var amt = $('#amt');
        var qty = $('#qty');
        var date = $('#date');
        var save = $('#save');

        var del = $('.fa-trash-o');

        var inputs = [prodName, uom, supp, amt, qty, date];

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
            echo isset($_GET['edit']) ? 'table_tog()' : '';
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
                for(var i = 0; i < input.length; i++){
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

        
        del.click(function (e) {
            var confam = confirm('Are you sure you want to delete this record?');

            if (!confam){
                e.preventDefault();
            }
        });


        
    })

</script>

</body>
</html>