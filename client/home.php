<?php
require '../inc/verify.php';
require '../inc/head.php';
require '../inc/header.php';
require '../inc/left-side-column.php';
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Dashboard
            <small>Painel de Controle</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3>150</h3>

                        <p>Pontos</p>
                    </div>
                    <div class="icon">
                        <!--<i class="ion ion-bag"></i>-->
                        <i class="ion ion-android-add-circle"></i>
                    </div>
                    <a href="#" class="small-box-footer">Mais informações <i class="fa fa-arrow-circle-right"></i></a>
                </div> 
            </div>

            <?php
            require '../inc/connection.php';
            $sql = "SELECT * FROM client_bsp";
            $query = mysqli_query($conexao, $sql);
            $cont = mysqli_num_rows($query);
            ?>
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3><?php echo $cont ?></h3>

                        <p>Usuários Registrados</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="#" class="small-box-footer">Mais informações <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <?php
            require '../inc/connection.php';
            $sql2 = "SELECT * FROM company_bsp";
            $query2 = mysqli_query($conexao, $sql2);
            $cont2 = mysqli_num_rows($query2);
            ?>
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3><?php echo $cont2 ?></h3>

                        <p>Software Houses</p>
                    </div>
                    <div class="icon">
                        <!--<i class="ion ion-stats-bars"></i>-->
                        <i class="fa fa-industry"></i>
                    </div>
                    <a href="#" class="small-box-footer">Mais informações <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
        <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php
require '../inc/footer.php';
?>