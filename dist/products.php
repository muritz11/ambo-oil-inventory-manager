<?php
require_once 'assets/php/session_start.php';

require_once 'assets/php/helpers.php';

include_once '../assets/simplexlsx-master/src/SimpleXLSX.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Products</title>
    <?php
    require_once '../assets/header_links.html';
    ?>
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
                    <h1 class="mt-4">Products</h1>

                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fa fa-cubes mr-1"></i>
                            All Products and prices
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
                                        <th>Low stock point</th>
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
            require_once '../assets/footer.html';
            ?>
        </div>
    </div>

    <!--        require footer links  -->
    <?php
    require_once '../assets/footer_links.html';
    ?>
</body>
</html>