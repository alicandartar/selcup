<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Dashboard
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?=base_url()?>admin/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
<!--            <li class="active"><i class="fa fa-dashboard"></i> Dashboard</li>-->
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
        <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3><?=$totalSlider?></h3>
                        <p>Menu</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-images"></i>
                    </div>
                    <a href="<?=base_url()?>admin/menu" class="small-box-footer">Menu <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3><?=$totalSlider?></h3>
                        <p>Slider</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-images"></i>
                    </div>
                    <a href="<?=base_url()?>admin/slider" class="small-box-footer">Slider <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3></h3>
                        <p>Manufacturing Process</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-document"></i>
                    </div>
                    <a href="<?=base_url()?>admin/manufacturing" class="small-box-footer">Manufacturing Process <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div><!-- ./col -->
			<div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3></h3>
                        <p>Home Product Sizes</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-images"></i>
                    </div>
                    <a href="<?=base_url()?>admin/homeproduct" class="small-box-footer">Home Product Sizes  <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div><!-- ./col -->
			<!-- <div class="col-lg-3 col-xs-6">
                small box
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3><?=$totalVideo?></h3>
                        <p>Video</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-play"></i>
                    </div>
                    <a href="<?=base_url()?>admin/video" class="small-box-footer">Videolar <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div> ./col -->
        </div><!-- /.row -->
        <!-- Main row -->


    </section><!-- /.content -->
</div><!-- /.content-wrapper -->