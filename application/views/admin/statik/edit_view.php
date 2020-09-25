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
            Statik Alanlar
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
                        <h3 class="box-title">Statik Alanlar Düzenleme Formu</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <div class="box-body">
                        <div class="form-group">
                            <label for="title">Ürün sayfalarında bulunan discover butonu</label>
                            <input type="text" name="discover" class="form-control" id="discover" placeholder="discover" value="<?=$info->discover?>" required>
                        </div>
                        <div class="form-group">
                            <label for="contactforinquiry">Sayfa Altlarında bulunan Contact For İnquiry Alanı</label>
                            <input type="text" name="contactforinquiry" class="form-control" id="contactforinquiry" placeholder="contactforinquiry" value="<?=$info->contactforinquiry?>" required>
                        </div>
                        <div class="form-group">
                            <label for="adres">Açılır Sol Menu Adres Alanı</label>
                            <input type="text" name="adres" class="form-control" id="adres" placeholder="adres" value="<?=$info->adres?>" required>
                        </div>
                        <div class="form-group">
                            <label for="contactnumber">Açılır Sol Menu Contact Number Alanı</label>
                            <input type="text" name="contactnumber" class="form-control" id="contactnumber" placeholder="contactnumber" value="<?=$info->contactnumber?>" required>
                        </div>
                        <div class="form-group">
                            <label for="social">Açılır Sol Menu Social Alanı</label>
                            <input type="text" name="social" class="form-control" id="social" placeholder="social" value="<?=$info->social?>" required>
                        </div>
                        <div class="form-group">
                            <label for="getintouch">Açılır Sol Menu Get in Touch Alanı</label>
                            <input type="text" name="getintouch" class="form-control" id="getintouch" placeholder="getintouch" value="<?=$info->getintouch?>" required>
                        </div>
                        <div class="form-group">
                            <label for="moreabout">Anasayfa More About Butonu</label>
                            <input type="text" name="moreabout" class="form-control" id="moreabout" placeholder="moreabout" value="<?=$info->moreabout?>" required>
                        </div>
                        <div class="form-group">
                            <label for="compostable">Anasayfa Compostable Alanı</label>
                            <input type="text" name="compostable" class="form-control" id="compostable" placeholder="compostable" value="<?=$info->compostable?>" required>
                        </div>
                        <div class="form-group">
                            <label for="papercup">Anasayfa Paper Cup  Alanı</label>
                            <input type="text" name="papercup" class="form-control" id="papercup" placeholder="papercup" value="<?=$info->papercup?>" required>
                        </div>
                        <div class="form-group">
                            <label for="findoutmore">Anasayfa Find Out More  Alanı</label>
                            <input type="text" name="findoutmore" class="form-control" id="findoutmore" placeholder="findoutmore" value="<?=$info->findoutmore?>" required>
                        </div>
                        <div class="form-group">
                            <label for="productsize">Anasayfa Product Size Alanı</label>
                            <input type="text" name="productsize" class="form-control" id="productsize" placeholder="productsize" value="<?=$info->productsize?>" required>
                        </div>
                        <div class="form-group">
                            <label for="details">Anasayfa Details Butonu Alanı</label>
                            <input type="text" name="details" class="form-control" id="details" placeholder="details" value="<?=$info->details?>" required>
                        </div>
                        <div class="form-group">
                            <label for="contactus">Contact For Inquiry Contact Us Butonu alanı</label>
                            <input type="text" name="contactus" class="form-control" id="contactus" placeholder="contactus" value="<?=$info->contactus?>" required>
                        </div>
                        <div class="form-group">
                            <label for="allrightsreserved">All right reserved Alanı</label>
                            <input type="text" name="allrightsreserved" class="form-control" id="allrightsreserved" placeholder="allrightsreserved" value="<?=$info->allrightsreserved?>" required>
                        </div>
                        <div class="form-group">
                            <label for="contactinfo">Contact Sayfası Contact Information Alanı</label>
                            <input type="text" name="contactinfo" class="form-control" id="contactinfo" placeholder="contactinfo" value="<?=$info->contactinfo?>" required>
                        </div>
                        <div class="form-group">
                            <label for="contactform">Contact Sayfası Contact Forma Başlığı</label>
                            <input type="text" name="contactform" class="form-control" id="contactform" placeholder="contactform" value="<?=$info->contactform?>" required>
                        </div>
                        <div class="form-group">
                            <label for="name">Contact Sayfası Contact Ad Soyad Alanı</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="name" value="<?=$info->name?>" required>
                        </div>
                        <div class="form-group">
                            <label for="subject">Contact Sayfası Contact Subject Alanı</label>
                            <input type="text" name="subject" class="form-control" id="subject" placeholder="subject" value="<?=$info->subject?>" required>
                        </div>
                        <div class="form-group">
                            <label for="message">Contact Sayfası Contact Mesaj Alanı</label>
                            <input type="text" name="message" class="form-control" id="message" placeholder="message" value="<?=$info->message?>" required>
                        </div>
                        <div class="form-group">
                            <label for="ihaveread">Contact Sayfası Okudum Onaylıyorum Alanı</label>
                            <input type="text" name="ihaveread" class="form-control" id="ihaveread" placeholder="ihaveread" value="<?=$info->ihaveread?>" required>
                        </div>
                        <div class="form-group">
                            <label for="selcup">Contact Sayfası Selcup in the world Alanı</label>
                            <input type="text" name="selcup" class="form-control" id="selcup" placeholder="selcup" value="<?=$info->selcup?>" required>
                        </div>
                        <div class="form-group">
                            <label for="cupsize">Ürün Sayfası Cups size başlığı Alanı</label>
                            <input type="text" name="cupsize" class="form-control" id="cupsize" placeholder="cupsize" value="<?=$info->cupsize?>" required>
                        </div>
                        <div class="form-group">
                            <label for="capacity">Ürün Sayfası capacity  başlığı Alanı</label>
                            <input type="text" name="capacity" class="form-control" id="capacity" placeholder="capacity" value="<?=$info->capacity?>" required>
                        </div>
                        <div class="form-group">
                            <label for="product_code">Ürün Sayfası product code  başlığı Alanı</label>
                            <input type="text" name="product_code" class="form-control" id="product_code" placeholder="product_code" value="<?=$info->product_code?>" required>
                        </div>
                        <div class="form-group">
                            <label for="height">Ürün Sayfası height  başlığı Alanı</label>
                            <input type="text" name="height" class="form-control" id="height" placeholder="height" value="<?=$info->height?>" required>
                        </div>
                        <div class="form-group">
                            <label for="brim_diameter">Ürün Sayfası brim diameter başlığı Alanı</label>
                            <input type="text" name="brim_diameter" class="form-control" id="brim_diameter" placeholder="brim_diameter" value="<?=$info->brim_diameter?>" required>
                        </div>
                        <div class="form-group">
                            <label for="pack_quantity">Ürün Sayfası pack quantity başlığı Alanı</label>
                            <input type="text" name="pack_quantity" class="form-control" id="pack_quantity" placeholder="pack_quantity" value="<?=$info->pack_quantity?>" required>
                        </div>
                        <div class="form-group">
                            <label for="case_quantity">Ürün Sayfası case quantity başlığı Alanı</label>
                            <input type="text" name="case_quantity" class="form-control" id="case_quantity" placeholder="case_quantity" value="<?=$info->case_quantity?>" required>
                        </div>
                        <div class="form-group">
                            <label for="specification">Ürün Sayfası Specification başlığı Alanı</label>
                            <input type="text" name="specification" class="form-control" id="specification" placeholder="specification" value="<?=$info->specification?>" required>
                        </div>
                        <div class="form-group">
                            <label for="usage_place">Ürün Sayfası Usage place başlığı Alanı</label>
                            <input type="text" name="usage_place" class="form-control" id="usage_place" placeholder="usage_place" value="<?=$info->usage_place?>" required>
                        </div>
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
