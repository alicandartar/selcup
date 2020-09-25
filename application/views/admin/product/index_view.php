<!-- DataTables -->
<script src="<?=base_url()?>assets/admin/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
<script src="<?=base_url()?>assets/admin/plugins/datatables/extensions/RowReorder/js/dataTables.rowReorder.min.js"></script>
<script src="<?=base_url()?>assets/admin/plugins/datatables/media/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?=base_url()?>assets/admin/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?=base_url()?>assets/admin/plugins/fastclick/fastclick.min.js"></script>

<script type="text/javascript" charset="utf-8">
    $( document ).ready(function() {
        
         //DataTable
        var table = $('#example1').DataTable({});

        //DataTable ***

        $("#ListDelete").on("click",function(){

            if(!confirm("Gerçekten Silmek İstiyormusunuz ? ")){ return false; }

            var data = $( "input[name^=ID]:checked" ).serialize();


            $("input[name^='ID']").each(function()
            {
                if($(this).is(':checked'))
                    $("#"+$(this).val()).remove();
            });


            $.ajax({
                url: "<?php echo base_url(); ?>admin/product/ListDelete",
                type: "post",
                data: data,
                dataType: "text",
                cache: false,

                success: function (response) {
                    window.location.reload();
                }
            }).done(function ( data ) {

            });

        });

    });

</script>
<style>
    .reorder{
        cursor: pointer;
    }
</style>
<!-- DataTables -->
<link rel="stylesheet" href="<?=base_url()?>assets/admin/plugins/datatables/media/css/dataTables.bootstrap.css">


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <!--<small>
                <a class="btn btn-app" href="<?=base_url()?>admin/news">
                    <span class="badge bg-teal"><?=$TotalPage?></span>
                    <i class="fa fa-tags"></i> Haberler
                </a>
            </small>-->
            <small>
                <a class="btn btn-app" href="<?=base_url()?>admin/product/add">
                    <i class="fa fa-plus"></i> Ekle
                </a>
            </small>
            <small>
                <button class="btn btn-app" id="ListDelete">
                    <i class="fa fa-trash"></i> Sil
                </button>
            </small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?=base_url()?>admin/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">

                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Sistemde Bulunan İçerikler</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Çoklu Seçim</th>
                                <th>Bardak Boyut</th>
                                <th>Hangi Ana Ürüne Ait</th>
                                <th>Bardak Resim</th>
                                <th>İşlemler</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach($cups as $key => $cup){?>
                                <tr>
                                    <td><input type="checkbox" id="ID" class="ID" value="<?=$cup->id?>" name="ID[]"> </td>
                                    <td><?=$cup->name?></td>
                                    <?php foreach($products as $product) {if ($product->id == $cup->cup_name_id) { echo '<td>'.$product->name.'</td>'; }}?>
                                    <!--<td><?=$products[$cup->cup_name_id-1]->name?></td>-->
                                    <!--<td><img src="<?=base_url().$products[$cup->cup_name_id-1]->image?>" width="70"> </td>-->
                                    <?php foreach($products as $product) {if ($product->id == $cup->cup_name_id) { echo '<td><img width="70" src='.base_url().$product->image.'></td>'; }}?>
                                    <td><a href="<?=base_url()?>admin/product/edit/<?=$cup->id?>" class="btn btn-warning">Düzenle</a></td>
                                </tr>
                            <?php }?>
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Çoklu Seçim</th>
                                <th>Bardak Boyut</th>
                                <th>Hangi Ana Ürüne Ait</th>
                                <th>Bardak Resim</th>
                                <th>İşlemler</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->