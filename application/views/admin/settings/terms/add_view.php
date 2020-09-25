<!-- Fancybox -->
<script type="text/javascript" src="<?=base_url()?>assets/admin/fancybox/source/jquery.fancybox.pack.js"></script>
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
        toolbar2: "cut copy paste | searchreplace | bullist numlist | outdent indent blockquote | undo redo  | link image jbimages | inserttime preview | forecolor backcolor",
        toolbar3: "responsivefilemanager | table | hr removeformat | subscript superscript | charmap emoticons | print fullscreen | ltr rtl | spellchecker | visualchars visualblocks nonbreaking template pagebreak restoredraft",

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
        external_filemanager_path:"<?=base_url()?>uploads/filemanager/",
        external_plugins: { "filemanager" : "<?=base_url()?>uploads/filemanager/plugin.min.js"},
        //filemanager_access_key : '9b6cd28c-7750-43e4-9dd6-6af924eb0700',

        templates: [
            {title: 'Test template 1', content: 'Test 1'},
            {title: 'Test template 2', content: 'Test 2'}
        ]
    });




    jQuery(document).ready(function () {
        $('.iframe-btn').fancybox({
            'width' : 880,
            'height'    : 570,
            'type'  : 'iframe',
            'autoScale'   : false,
            'fitToView' : false,
            'autoSize' : false
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


        $('#CopyImage').click(function(){

            var x = $('.clone').length;
            var clone = '<div class="GalleryImage clone"><div class="col-md-2 table-bordered"><div class="form-group"><label>Başlık</label><input type="text" class="form-control" name="title[]"></div><div class="form-group"><label>Site Linki</label><input type="text" class="form-control" name="url[]"></div><div class="form-group"><label>Durumu</label><select name="status[]" class="form-control"><option value="1">Aktif</option><option value="0">Pasif</option></select></div><div class="form-group"><label>Sosyal Medya</label><select name="icon[]" class="form-control"><option value="facebook">Facebook</option><option value="twitter">Twitter</option><option value="linkedin">Linkedin</option><option value="google-plus">Google Plus</option><option value="youtube">Youtube</option></select></div><div class="form-group"><label>Sıra</label><input type="number" class="form-control" name="sort_sequence[]" value="'+x+'"></div></div></div>';
            $(clone).appendTo("#GalleryImages");
            // $('.clone').last().clone().appendTo("#GalleryImages");
            // $('.clone').last().find("input:text").val("");
            // $('.clone').last().find("input:hidden").val("");

            // $('.clone').last().find("input[name='images[]']").attr("id","SliderImage"+x);
            // $('.clone').last().find(".iframe-btn").attr("href","<?=base_url()?>filemanager/dialog.php?type=1&field_id=SliderImage"+x+"&relative_url=1&akey=Qxa48BPNzyw0tk28c2QktofjTzyW8e3t");
            // $('.clone').last().find(".img-responsive").attr('id','Image'+x+'');
            // $('.clone').last().find(".img-responsive").attr('src','http://placehold.it/507x250&text=Image Area');

        });

    });

    function responsive_filemanager_callback(field_id){
        var lastChar = field_id.substr(field_id.length - 1);
        var url=jQuery('#'+field_id).val();
        jQuery('#Image'+lastChar).attr('src', '<?=base_url().'uploads/'?>'+url);
        //your code
    }

</script>

<!-- Fancybox -->
<link rel="stylesheet" href="<?=base_url()?>assets/admin/fancybox/source/jquery.fancybox.css" type="text/css" />


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Slider Ekle
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
            
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Sosyal Medya Yönetimi</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <?=form_open_multipart($CurrentUrl)?>
                    <div class="box-body">
                        <?php print_r($error)?>
                        <button type="button" id="CopyImage" class="btn btn-success">Yeni Ekle</button>
                        <button type="submit" class="btn btn-primary">Kaydet</button>
                        <div class="box-body" id="GalleryImages">
                            <div class="GalleryImage clone">
                                <div class="col-md-2 table-bordered">
                                    <div class="form-group">
                                        <label>Başlık</label>
                                        <input type="text" class="form-control" name="title[]">
                                    </div>
                                    <div class="form-group">
                                        <label>Site Linki</label>
                                        <input type="text" class="form-control" name="url[]">
                                    </div>
                                    <div class="form-group">
                                        <label>Durumu</label>
                                        <select name="status[]" class="form-control">
                                            <option value="1">Aktif</option>
                                            <option value="0">Pasif</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Sosyal Medya</label>
                                        <select name="icon[]" class="form-control">
                                            <option value="facebook">Facebook</option>
                                            <option value="twitter">Twitter</option>
                                            <option value="linkedin">Linkedin</option>
                                            <option value="google-plus">Google Plus</option>
                                            <option value="youtube">Youtube</option>
                                            <option value="instagram">Instagram</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Sıra</label>
                                        <input type="number" class="form-control" name="sort_sequence[]">
                                    </div>
                                </div>
                            </div>
                        
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Kaydet</button>
                        </div>

                    </div><!-- /.box-body -->

                    <?=form_close()?>
                </div><!-- /.box -->
            </div><!--/.col (left) -->
            <!-- right column -->

        </div>   <!-- /.row -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->

