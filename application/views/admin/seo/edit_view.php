<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Seo Alanlarını Düzenle
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?=base_url()?>admin/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <?php $attributes = array('id' => 'form'); ?>
            <?=form_open_multipart($CurrentUrl)?>
            <?php $info = json_decode($info->content); $homepage = $info->homepage; $page = $info->page;?>
            <!-- left column -->
            <div class="col-md-6">
                <!-- general form elements -->
                <!-- form start -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Anasayfa Seo Alanları</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <div class="form-group">
                            <label for="">Title</label>
                            <input name="content[homepage][title]" class="form-control" value="<?=$homepage->title?>">
                        </div>
                        <div class="form-group">
                            <label for="">Description</label>
                            <textarea name="content[homepage][description]" class="form-control" rows="10"><?=$homepage->description?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Keywords</label>
                            <input name="content[homepage][keywords]" class="form-control" value="<?=$homepage->keywords?>">
                        </div>
                        <div class="form-group">
                            <label for="">Abstract</label>
                            <input name="content[homepage][abstract]" class="form-control" value="<?=$homepage->abstract?>">
                        </div>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!--/.col (left) -->
            <!-- right column -->
            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Sayfa Seo Alanları</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <div class="form-group">
                            <label for="">Title</label>
                            <input name="content[page][title]" class="form-control" value="<?=$page->title?>">
                        </div>
                        <div class="form-group">
                            <label for="">Description</label>
                            <textarea name="content[page][description]" class="form-control" rows="10"><?=$page->description?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Keywords</label>
                            <input name="content[page][keywords]" class="form-control" value="<?=$page->keywords?>">
                        </div>
                        <div class="form-group">
                            <label for="">Abstract</label>
                            <input name="content[page][abstract]" class="form-control" value="<?=$page->abstract?>">
                        </div>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!--/.col (right) -->
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary">Kaydet</button>
            </div>
            <?=form_close()?>
        </div>   <!-- /.row -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
