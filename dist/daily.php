<?php

require_once 'assets/php/session_start.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Monthly stock</title>
    <?php
    require_once '../assets/header_links.html';
    ?>
    <style>

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
                <h1 class="mt-4">Monthly stock</h1>


                <div class="card mb-4">
                    <div class="card-header" id="avail-tab">
                        <i class="fa fa-calendar mr-1"></i>
                        monthly stock
                        <?= date("m") ?>
                    </div>
                    <div class="card-body" id="avail">
                        <div class="table-responsive" id="table-1">
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
                                ?>
                                </tbody>
                            </table>
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

</body>
</html>