<?php
//There!!! optimized to the best of my abilities
//No doubt you cld do a better job but heck, i'm tired...

require_once 'assets/php/session_start.php';
$title = 'Dashboard - Ambo oil';

include_once 'assets/php/helpers.php';

////an if to test for record editing
if (isset($_GET['edit']) and isset($_GET['id'])) {
    $query = $conn->query("SELECT * FROM inventory where id = {$_GET['id']}");
    if ($q = $query->fetch_assoc()) {
        extract($q);
        $msg = "edit record #".$_GET['id'];
    }
}



?>
<!DOCTYPE html>
<html lang="en">
<!--    require head links-->
    <head>
        <?php
        require_once 'assets/demo/header_links.html';
        ?>
    </head>

    <body class="sb-nav-fixed">
        <img src="assets/img/images.png" alt="" id="loader">


    <!--include header file-->
        <?php
        require_once 'assets/demo/header.html';
        ?>

        <div id="layoutSidenav" class="main-content loader-anime">
        <!--include sidebar-->
            <?php
            require_once 'assets/demo/sidebar.html';
            ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <div class="row" id="cards">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body p-3"><?php outs_prod(); ?></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="<?= $curUser == 'admin' ? 'outstanding.php' : '401.html' ?>">View Details</a>
                                        <div class="small text-white"><i class="fa fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body p-3"><?php avail_prod(); ?></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="inventory.php">View Details</a>
                                        <div class="small text-white"><i class="fa fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body p-3"><?php supp_prod(); ?></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="supply_stock.php">View Details</a>
                                        <div class="small text-white"><i class="fa fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body p-3"><?php low_stock(); ?></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="inventory.php">View Details</a>
                                        <div class="small text-white"><i class="fa fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card mb-4">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-6" id="upd-tab">
                                        <i class="fa fa-calendar-check-o mr-1"></i>
                                        <span class="bfor">Update inventory</span>
                                        <span class="after"><?= isset($_GET['edit']) ? 'edit record #'.$_GET["id"] : 'Update inventory' ?></span>
                                    </div>
                                    <div class="col-6">
                                        <button class="btn btn-success float-right mr-2" id="add">
                                            <span class="bfor">+</span>
                                            <span class="after"><i class="fa fa-chevron-circle-left"></i> Back</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body"  id="upd">
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
                                        inventory();
                                        ?>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="form" id="form">
                                    <form action="assets/php/validate.php" method="post" autocomplete="off">
                                        <div class="form-group">
                                            <label for="product">Product name:</label>
                                            <input type="text" class="form-control" id="product" name="prodname" >
                                        </div>
                                        <div class="form-group">
                                            <label for="uom">UOM:</label>
                                            <input type="text" class="form-control" id="uom" name="uom" >
                                        </div>
                                        <div class="form-group">
                                            <label for="qty">Opening stock:</label>
                                            <input type="text" class="form-control" id="qty" name="qty" >
                                        </div>
                                        <div class="form-group">
                                            <label for="received">Received:</label>
                                            <input type="text" class="form-control" id="received" name="received" >
                                        </div>
                                        <div class="form-group">
                                            <label for="supplied">Supplied:</label>
                                            <input type="text" class="form-control" id="supplied" name="supplied" >
                                        </div>
                                        <div class="form-group">
                                            <label for="phy">Physical stock:</label>
                                            <input type="text" class="form-control" id="phy" name="phy"  >
                                        </div>
                                        <div class="form-group">
                                            <label for="date">Date:</label>
                                            <input type="date" class="form-control" id="date" name="date">
                                        </div>
                                        <button type="submit" class="btn btn-success" id="save" name="inv">Save</button>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </main>

<!--                require footer-->
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

            $('.breadcrumb').click(function () {
                $('#cards').slideToggle();
            });

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

            //to keep the form until user is done
            <?php
            echo isset($_GET['save']) ? 'table_tog();' : '';
            ?>



            $('#upd-tab').click(function () {
                $('#upd').fadeToggle();
            });

            supp.keyup(function () {
                physicalStock();
            });

            //still trying to write a function that will calc users phy stock
            function physicalStock() {
                var sum = Number(qty.val()) + Number(received.val());
                var ans = sum - supp.val();

                phy.val(ans);

            }

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
