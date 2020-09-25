<!-- Fancybox -->
<script type="text/javascript" src="<?=base_url()?>assets/admin/fancybox/source/jquery.fancybox.pack.js"></script>
<!-- DatePicker -->
<script src="<?=base_url()?>assets/admin/plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- DatePicker Language -->
<script src="<?=base_url()?>assets/admin/plugins/datepicker/locales/bootstrap-datepicker.tr.js"></script>
<!-- Tinymce -->
<script type="text/javascript" src="<?=base_url()?>assets/admin/tinymce/tinymce.min.js"></script>
<script type="text/javascript">
    tinymce.init({

        selector: "textarea",
        plugins: [
            "advlist autolink autosave link image lists charmap print preview hr anchor pagebreak spellchecker",
            "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
            "responsivefilemanager table contextmenu directionality emoticons template textcolor paste fullpage textcolor colorpicker textpattern jbimages"
        ],

        toolbar1: "newdocument fullpage code | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | styleselect formatselect fontselect fontsizeselect",
        //toolbar2: "cut copy paste | searchreplace | bullist numlist | outdent indent blockquote | undo redo  | link image jbimages | inserttime preview | forecolor backcolor",
        toolbar2: "cut copy paste | searchreplace | bullist numlist | outdent indent blockquote | undo redo  | link responsivefilemanager | inserttime preview | forecolor backcolor",
        toolbar3: " table | hr removeformat | subscript superscript | charmap emoticons | print fullscreen | ltr rtl | spellchecker | visualchars visualblocks nonbreaking template pagebreak restoredraft",

        menubar: false,
        toolbar_items_size: 'small',
        // Font families
        font_formats: "Arial = Arial, Helvetica Neue, Helvetica, sans-serif;" + // cssfontstack.com
        "Courier New = Courier New, Courier, Lucida Sans Typewriter, Lucida Typewriter, monospace;" +
        "Georgia = Georgia, Times, Times New Roman, serif;" +
        "Lucida Grande = Lucida Grande, Lucida Sans Unicode, Lucida Sans, Geneva, Verdana, sans-serif;" +
        "Tahoma = Tahoma, Verdana, Segoe, sans-serif;" +
        "Times New Roman = TimesNewRoman, Times New Roman, Times, Baskerville, Georgia, serif;" +
        "Trebuchet MS = Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;" +
        "Verdana = Verdana, Geneva, sans-serif", // No semi-colon on last, or TinyMCE errors out

        style_formats: [
            {title: 'Bold text', inline: 'b'},
            {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
            {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
            {title: 'Example 1', inline: 'span', classes: 'example1'},
            {title: 'Example 2', inline: 'span', classes: 'example2'},
            {title: 'Table styles'},
            {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
        ],


        relative_urls: false,
        browser_spellcheck : true ,
        filemanager_title:"uploads",
        external_filemanager_path:"<?=base_url()?>/filemanager/",
        external_plugins: { "filemanager" : "<?=base_url()?>/filemanager/plugin.min.js"},
        filemanager_access_key : '<?=$this->config->item('encryption_key')?>',

        templates: [
            {title: 'Test template 1', content: 'Test 1'},
            {title: 'Test template 2', content: 'Test 2'}
        ]
    });


    jQuery(document).ready(function () {


        $("#InputTitle").bind("keyup", function () {
            var title = $("#InputTitle").val();
            var id = '<?=$info->id?>';
            var data = {'title':title,'id':id};
            console.log(title);
            $.ajax({
                url: '/admin/news/checkSlug',
                type: 'POST',
                data: data,
                dataType: 'JSON',
                success: function (response) {
                    $("#jsonSlug").text(response.response);
                    console.log(response);
                },
                error: function (response) {
                    console.log(response);
                }
            });
        });

        $('.iframe-btn').fancybox({
            'width'	: 880,
            'height'	: 570,
            'type'	: 'iframe',
            'autoScale'   : false,
            'fitToView' : false,
            'autoSize' : false
        });


        $('.datetimepicker').datepicker({
            language: 'tr',
            format: 'dd-mm-yyyy',
            autoclose: true,
        });

        // Handles message from ResponsiveFilemanager
        function OnMessage(e){
            var event = e.originalEvent;
            // Make sure the sender of the event is trusted
            if(event.data.sender === 'responsivefilemanager'){
                if(event.data.field_id){
                    var fieldID=event.data.field_id;
                    var url=event.data.url;
                    $('#'+fieldID).val(url).trigger('change');
                    $.fancybox.close();


                    // Delete handler of the message from ResponsiveFilemanager
                    $(window).off('message', OnMessage);
                }
            }
        }

        // Handler for a message from ResponsiveFilemanager
        $('.iframe-btn').on('click',function(){
            $(window).on('message', OnMessage);
        });

    });
    function responsive_filemanager_callback(field_id){

        var url=jQuery('#'+field_id).val();
        console.log(field_id);
        jQuery('#'+field_id+'View').attr('src', "<?=base_url().'uploads/'?>"+url);
        //your code
    }




</script>

<!-- DatePicker -->
<link rel="stylesheet" href="<?=base_url()?>assets/admin/plugins/datepicker/datepicker3.css">
<!-- Fancybox -->
<link rel="stylesheet" href="<?=base_url()?>assets/admin/fancybox/source/jquery.fancybox.css" type="text/css" />
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Anasayfa Ürün
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
            <!-- left column -->
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Ürün Bölümü Düzenleme Formu</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <div class="box-body">
                        <div class="form-group">
                            <label for="size">Bardak Boyut</label>
                            <input type="text" name="size" class="form-control" id="size" placeholder="Başlık" value="<?=$info->name?>" required>
                        </div>
                        <div class="form-group">
                            <label for="status">Hangi Ana Ürüne Ait</label>
                            <select name="cupname" id="cupname" class="form-control">
                            <?php foreach ($products as $product) {?>
                                <option value=<?=$product->id?> <?=$info->cup_name_id == $product->id ? 'Selected': NULL?> > <?=$product->name?></option>
                                <?php }?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Resim Seç</label>
                            <div class="input-group">
                                <input type="hidden" class="form-control imageUrl" name="cover" id="cover0" value="<?php foreach($products as $product){if($product->id == $info->cup_name_id) echo $product->image;}?>">
                                <a href="<?=base_url()?>filemanager/dialog.php?type=0&field_id=cover0&relative_url=1&akey=<?=$this->config->item('encryption_key')?>" class="btn btn-default btn-flat iframe-btn">
                                    <i class="fa fa-search"> Dosya Seç</i>
                                </a>
                                <a href="<?=base_url()?>filemanager/dialog.php?type=0&field_id=cover0&relative_url=1&akey=<?=$this->config->item('encryption_key')?>" class="iframe-btn">
                                    <img id="cover0View" src="<?=base_url()?><?php foreach($products as $product){if($product->id == $info->cup_name_id) echo $product->image;}?>" class="img-responsive CoverView">
                                </a><!--=$products[$info->cup_name_id-1]->image-->
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="title">Capacity</label>
                            <input type="text" name="capacity" class="form-control" id="capacity" placeholder="capacity" value="<?=$info->capacity?>" required>
                        </div>
                        <div class="form-group">
                            <label for="title">Product Code</label>
                            <input type="text" name="product_code" class="form-control" id="product_code" placeholder="product_code" value="<?=$info->product_code?>" required>
                        </div>
                        <div class="form-group">
                            <label for="title">Height</label>
                            <input type="text" name="height" class="form-control" id="height" placeholder="Height" value="<?=$info->height?>" required>
                        </div>
                        <div class="form-group">
                            <label for="title">Brim Diemeter</label>
                            <input type="text" name="brim_diameter" class="form-control" id="brim_diameter" placeholder="brim_diameter" value="<?=$info->brim_diameter?>" required>
                        </div>
                        <div class="form-group">
                            <label for="title">Pack Quantity</label>
                            <input type="text" name="pack_quantity" class="form-control" id="pack_quantity" placeholder="pack_quantity" value="<?=$info->pack_quantity?>" required>
                        </div>
                        <div class="form-group">
                            <label for="title">Case Quantity</label>
                            <input type="text" name="case_quantity" class="form-control" id="case_quantity" placeholder="case_quantity" value="<?=$info->case_quantity?>" required>
                        </div>
                        <div class="form-group">
                            <label for="title">Specification</label>
                            <input type="text" name="specification" class="form-control" id="specification" placeholder="specification" value="<?=$info->specification?>" required>
                        </div>
                        <div class="form-group" style="background-color: #fbf8f5;">
                            <label for="title">Usage Place Birinci Resim</label>
                            <label>Resim Seç</label>
                            <div class="input-group">
                                <input type="hidden" class="form-control imageUrl" name="cover1" id="cover1" value="<?=$info->usage_place?>">
                                <a href="<?=base_url()?>filemanager/dialog.php?type=0&field_id=cover1&relative_url=1&akey=<?=$this->config->item('encryption_key')?>" class="btn btn-default btn-flat iframe-btn">
                                    <i class="fa fa-search"> Dosya Seç</i>
                                </a>
                                <a href="<?=base_url()?>filemanager/dialog.php?type=0&field_id=cover1&relative_url=1&akey=<?=$this->config->item('encryption_key')?>" class="iframe-btn">
                                    <img id="cover1View" src="<?=base_url()?><?=$info->usage_place?>" class="img-responsive CoverView">
                                </a>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="status">Usage Place Birinci Resim Aktif/Pasif Durumu</label>
                            <select name="status" id="status" class="form-control">
                                <option value="1" <?=$info->status == 1 ? 'Selected': NULL?>>Evet</option>
                                <option value="0" <?=$info->status == 0 ? 'Selected': NULL?>>Hayır</option>
                            </select>
                        </div>
                        <div class="form-group" style="background-color: #fbf8f5;">
                            <label for="title">Usage Place İkinci Resim</label>
                            <label>Resim Seç</label>
                            <div class="input-group">
                                <input type="hidden" class="form-control imageUrl" name="cover2" id="cover2" value="<?=$info->usage_place2?>">
                                <a href="<?=base_url()?>filemanager/dialog.php?type=0&field_id=cover2&relative_url=1&akey=<?=$this->config->item('encryption_key')?>" class="btn btn-default btn-flat iframe-btn">
                                    <i class="fa fa-search"> Dosya Seç</i>
                                </a>
                                <a href="<?=base_url()?>filemanager/dialog.php?type=0&field_id=cover2&relative_url=1&akey=<?=$this->config->item('encryption_key')?>" class="iframe-btn">
                                    <img id="cover2View" src="<?=base_url()?><?=$info->usage_place2?>" class="img-responsive CoverView">
                                </a>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="status2">Usage Place İkinci Resim Aktif/Pasif Durumu</label>
                            <select name="status2" id="status2" class="form-control">
                                <option value="1" <?=$info->status2 == 1 ? 'Selected': NULL?>>Evet</option>
                                <option value="0" <?=$info->status2 == 0 ? 'Selected': NULL?>>Hayır</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="not">Usage Place İlk Resmin Açıklaması</label>
                            <input type="text" name="not" class="form-control" id="not" placeholder="Content" value="<?=$info->content?>" required>
                        </div>
                        <div class="form-group">
                            <label for="not2">Usage Place İkinci Resmin Açıklaması</label>
                            <input type="text" name="not2" class="form-control" id="not2" placeholder="Content" value="<?=$info->content2?>" required>
                        </div>
                        <div class="form-group">
                            <label>Ürün için Catalog Bİlgisi Seç</label>
                            <div class="input-group">
                                <input type="hidden" class="form-control imageUrl" name="cover3" id="cover3" value="<?=$info->catalog?>">
                                <a href="<?=base_url()?>filemanager/dialog.php?type=0&field_id=cover3&relative_url=1&akey=<?=$this->config->item('encryption_key')?>" class="btn btn-default btn-flat iframe-btn">
                                    <i class="fa fa-search"> Dosya Seç</i>
                                </a>
                                <a href="<?=base_url()?>filemanager/dialog.php?type=0&field_id=cover3&relative_url=1&akey=<?=$this->config->item('encryption_key')?>" class="iframe-btn">
                                    <!--<img id="cover3View" src="<?=base_url()?><?=$info->catalog?>" class="img-responsive CoverView">-->
                                    <embed src="<?=base_url()?><?=$info->catalog?>" width="800px" height="750px" />
                                </a>
                            </div>
                        </div>
                        <!--<div class="form-group">
                            <label for="title">Anasayfa Görünür İsmi Değiştir</label>
                            <input type="text" name="section_name" class="form-control" id="section_name" placeholder="Section Name" required>
                        </div>-->
                        <!--<div class="form-group">
                            <label for="title">Sırası</label>
                            <input type="text" name="sequence" class="form-control" id="sequence" placeholder="Sırası" value="<?=$info->sequence?>" required>
                        </div>-->
                    </div><!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Kaydet</button>
                    </div>
                </div><!-- /.box -->
            </div><!--/.col (left) -->
            <!-- right column -->
            
        </div>   <!-- /.row -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
