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
        var table = $('#example1').DataTable({
            paging: false,
            rowReorder: true,
            columnDefs: [
                { targets: 0, visible: true, className: 'reorder' }
            ]
        });

        table.on('row-reorder', function ( e, diff, edit ) {
            var result = [];
            var totalcheckbox = $("#example1 > tbody tr").length;
            for(var i = 1; i<=totalcheckbox; i++){
                var valueOfID = $("#example1 > tbody tr:eq("+(i-1)+") td > .ID").val();
                var obj = {
                    id:valueOfID,
                    order:i
                };
                result.push(obj);
            }
            console.log(result);
            var data = {Orders:result};
            console.log(data);
            $.ajax({
                url: "<?=base_url()?>admin/social_settings/ListReorder",
                type: "post",
                data: data,
                dataType: "json",
                cache: false,
                success: function (response) {
                    //window.location.reload();
                    console.log(response);
                }
            }).done(function ( data ) {

            });

        });

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
                url: "<?php echo base_url(); ?>admin/social_settings/ListDelete",
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
            <small>
                <a class="btn btn-app" href="<?=base_url()?>admin/social_settings">
                    <span class="badge bg-teal"><?=$TotalPage?></span>
                    <i class="fa fa-tags"></i> İçerikler
                </a>
            </small>
            <small>
                <a class="btn btn-app" href="<?=base_url()?>admin/social_settings/add">
                    <i class="fa fa-plus"></i> İçerik Ekle
                </a>
            </small>
            <small>
                <button class="btn btn-app" id="ListDelete">
                    <i class="fa fa-trash"></i> İçerik Sil
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
                        <h3 class="box-title">Sistemde Bulunan Sosyal Medyalar</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Sıra</th>
                                <th>Çoklu Seçim</th>
                                <th>Başlık</th>
                                <th>Sosyal Medya Linki</th>
                                <th>İşlemler</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach($Contents as $key => $Content): ?>
                                <tr>
                                    <td class="reorder"><?=$Content->sort_sequence?></td>
                                    <td><input type="checkbox" id="ID" class="ID" value="<?=$Content->id?>" name="ID[]"> </td>
                                    <td><?=$Content->title?></td>
                                    <td><a target="_blank" href="<?=$Content->url?>"><?=$Content->url?></a></td>
                                    <td><a href="<?=base_url()?>admin/social_settings/edit/<?=$Content->id?>" class="btn btn-warning">Düzenle</a></td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Sıra</th>
                                <th>Çoklu Seçim</th>
                                <th>Başlık</th>
                                <th>Sosyal Medya Linki</th>
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