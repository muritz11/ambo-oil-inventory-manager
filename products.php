<?php
require_once 'assets/php/session_start.php';
$title = 'Products';

require_once 'assets/php/helpers.php';

include_once 'assets/demo/simplexlsx-master/src/SimpleXLSX.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    require_once 'assets/demo/header_links.html';
    ?>
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
                    <h1 class="mt-4">Products</h1>

                    <div class="card mb-4">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-6">
                                    <i class="fa fa-cubes mr-1"></i>
                                    All Products and prices
                                </div>
<!--                                <div class="col-6 text-right">-->
<!--                                    <a href="assets/demo/ambo_products.xlsx" target="_blank" class="btn btn-outline-success">Open product excel sheet</a>-->
<!--                                </div>-->
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="file">
                                <p>
                                <?php

                                ?>
                                </p>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>Product</th>
                                        <th>Pack size</th>
                                        <th>OMP/CSP (IVAT) PER PACK</th>
                                        <th>OMP/CSP (IVAT) PER UNIT</th>
                                        <th>Retail DSP (IVAT) PER PACK</th>
                                        <th>Retail DSP (IVAT) PER UNIT</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    products_table();
                                    ?>
                                    </tbody>
                                </table>
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

    <!--        require footer links  -->
    <?php
    require_once 'assets/demo/footer_links.html';
    ?>
</body>
</html>