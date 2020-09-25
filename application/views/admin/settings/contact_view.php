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
        filemanager_access_key : '<?=$this->config->item('encryption_key')?>',

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

    });

    function responsive_filemanager_callback(field_id){
        var url=jQuery('#'+field_id).val();
        jQuery('#'+field_id).val(url);
        jQuery('#'+field_id+'View').attr('src', '<?=base_url().'uploads/'?>'+url);
        //your code
    }

    $(document).on("click",".DeleteAdres", function () {

        var total = $('#Adres .icons').length;

        if(total-1 <= 0){
            y=0;
            $('#Adres .icons').last().attr("id","Adres_"+y);
            $('#Adres .icons').last().find("a.DeleteAdres").attr("data-id",y);
            $('#Adres .icons').last().find(".adresTitle").attr("id","title"+y);
            $('#Adres .icons').last().find(".adresTitle").attr("name","adres["+y+"][title]");
            $('#Adres .icons').last().find(".adresTitle").val("");
            $('#Adres .icons').last().find(".adresAdres").attr("id","adres"+y);
            $('#Adres .icons').last().find(".adresAdres").attr("name","adres["+y+"][adres]");
            $('#Adres .icons').last().find(".adresAdres").val("");
            $('#Adres .icons').last().find(".adresCity").attr("id","city"+y);
            $('#Adres .icons').last().find(".adresCity").attr("name","adres["+y+"][city]");
            $('#Adres .icons').last().find(".adresCity").val("");
            $('#Adres .icons').last().find(".adresFax").attr("id","fax"+y);
            $('#Adres .icons').last().find(".adresFax").attr("name","adres["+y+"][fax]");
            $('#Adres .icons').last().find(".adresFax").val("");
            $('#Adres .icons').last().find(".adresPhone").attr("id","phone"+y);
            $('#Adres .icons').last().find(".adresPhone").attr("name","adres["+y+"][phone]");
            $('#Adres .icons').last().find(".adresPhone").val("");
            $('#Adres .icons').last().find(".adresMail").attr("id","mail"+y);
            $('#Adres .icons').last().find(".adresMail").attr("name","adres["+y+"][mail]");
            $('#Adres .icons').last().find(".adresMail").val("");
            $('#Adres .icons').last().find(".adresGoogle").attr("id","google"+y);
            $('#Adres .icons').last().find(".adresGoogle").attr("name","adres["+y+"][google]");
            $('#Adres .icons').last().find(".adresGoogle").val("");

        }else{

            var ID = $(this).attr("data-id");
            $("#Adres_"+ID).remove();

            $('#Adres .icons .DeleteAdres').show();

        }

    });

    <?
    if ($info->adres == null) {
        $sayi = 1;
    }
    else
    {
//    $sayi = count(json_decode($info[0]->Icons, true));
        foreach ($info->adres as $key => $adre)
        {
            $lastkey1 = $key;
        }
        $sayi = $lastkey1 + 1;
    }


    ?>

    var x = <?=$sayi?>;
    function CopyFile(){

        $('#Adres .icons').last().clone().find("input:text").val("").end().appendTo('#Adres');
        $('#Adres .icons').last().attr("id","Adres_"+x);
        $('#Adres .icons').last().find("a.DeleteAdres").attr("data-id",x);
        $('#Adres .icons').last().find(".adresTitle").attr("id","title"+x);
        $('#Adres .icons').last().find(".adresTitle").attr("name","adres["+x+"][title]");
        $('#Adres .icons').last().find(".adresTitle").val("");
        $('#Adres .icons').last().find(".adresAdres").attr("id","adres"+x);
        $('#Adres .icons').last().find(".adresAdres").attr("name","adres["+x+"][adres]");
        $('#Adres .icons').last().find(".adresAdres").val("");
        $('#Adres .icons').last().find(".adresCity").attr("id","city"+x);
        $('#Adres .icons').last().find(".adresCity").attr("name","adres["+x+"][city]");
        $('#Adres .icons').last().find(".adresCity").val("");
        $('#Adres .icons').last().find(".adresFax").attr("id","fax"+x);
        $('#Adres .icons').last().find(".adresFax").attr("name","adres["+x+"][fax]");
        $('#Adres .icons').last().find(".adresFax").val("");
        $('#Adres .icons').last().find(".adresPhone").attr("id","phone"+x);
        $('#Adres .icons').last().find(".adresPhone").attr("name","adres["+x+"][phone]");
        $('#Adres .icons').last().find(".adresPhone").val("");
        $('#Adres .icons').last().find(".adresMail").attr("id","mail"+x);
        $('#Adres .icons').last().find(".adresMail").attr("name","adres["+x+"][mail]");
        $('#Adres .icons').last().find(".adresMail").val("");
        $('#Adres .icons').last().find(".adresGoogle").attr("id","google"+x);
        $('#Adres .icons').last().find(".adresGoogle").attr("name","adres["+x+"][google]");
        $('#Adres .icons').last().find(".adresGoogle").val("");
        x++;



    }

</script>

<!-- Fancybox -->
<link rel="stylesheet" href="<?=base_url()?>assets/admin/fancybox/source/jquery.fancybox.css" type="text/css" />


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            İletişim Sayfası Statik Alanları
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
                        <h3 class="box-title">İletişim Sayfası Statik Alan Formu</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <?=form_open_multipart($CurrentUrl)?>
                    <div class="box-body">
                        <?php print_r($error)?>
                        <button type="submit" class="btn btn-primary">Kaydet</button>
                        <div class="box-body" id="GalleryImages">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">İletişim Adresler ( İlk eklediğiniz adres en başta gözükür )</label><br>
                                    <button type="button" onclick="CopyFile()" class="btn btn-success">Adres Ekle</button>
                                </div>
                                <div class="form-group col-md-12" id="Adres">
                                    <?php

                                    if($info->adres != null):
                                        foreach ($info->adres as $key => $adres):?>
                                            <div class="icons col-md-12 attachment-block clearfix" id="Adres_<?=$key?>">
                                                <label>Adres</label>
                                                <div class="input-group">
                                                    <a href="javascript:void(0);" data-id="<?=$key?>" class="btn btn-danger btn-flat pull-right DeleteAdres">
                                                        <i class="fa fa-remove"> Sil</i>
                                                    </a>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Adres Başlık</label>
                                                    <input type="text" name="adres[<?=$key?>][title]" class="form-control adresTitle" value="<?=$adres->title?>">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Adres</label>
                                                    <input type="text" name="adres[<?=$key?>][adres]" class="form-control adresAdres" value="<?=$adres->adres?>">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>İlçe / İl</label>
                                                    <input type="text" name="adres[<?=$key?>][city]" class="form-control adresCity" value="<?=$adres->city?>">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Telefon</label>
                                                    <input type="text" name="adres[<?=$key?>][phone]" class="form-control adresPhone" value="<?=$adres->phone?>">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Fax</label>
                                                    <input type="text" name="adres[<?=$key?>][fax]" class="form-control adresFax" value="<?=$adres->fax?>">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>E-Posta</label>
                                                    <input type="text" name="adres[<?=$key?>][mail]" class="form-control adresMail" value="<?=$adres->mail?>">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Google Iframe Link</label>
                                                    <input type="text" name="adres[<?=$key?>][google]" class="form-control adresGoogle" value="<?=$adres->google?>">
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    <?php else: ?>

                                        <div class="icons col-md-12 attachment-block clearfix" id="Adres_0">
                                            <label>Adres</label>
                                            <div class="input-group">
                                                <a href="javascript:void(0);" data-id="0" class="btn btn-danger btn-flat pull-right DeleteAdres">
                                                    <i class="fa fa-remove"> Sil</i>
                                                </a>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Adres Başlık</label>
                                                <input type="text" name="adres[0][title]" class="form-control adresTitle"">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Adres</label>
                                                <input type="text" name="adres[0][adres]" class="form-control adresAdres"">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>İlçe / İl</label>
                                                <input type="text" name="adres[0][city]" class="form-control adresCity"">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Telefon</label>
                                                <input type="text" name="adres[0][phone]" class="form-control adresPhone"">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Fax</label>
                                                <input type="text" name="adres[0][fax]" class="form-control adresFax"">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>E-Posta</label>
                                                <input type="text" name="adres[0][mail]" class="form-control adresMail"">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Google Iframe Link</label>
                                                <input type="text" name="adres[0][google]" class="form-control adresGoogle"">
                                            </div>
                                        </div>

                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label>İletişim Sayfası Yazısı</label>
                                    <input type="text" name="contact_content" class="form-control" value="<?=$info->contact_content?>">
                                </div>
                                <div class="form-group">
                                    <label>Adres Bilgileri Başlık</label>
                                    <input type="text" name="contact_address_title" class="form-control" value="<?=$info->contact_address_title?>">
                                </div>
                                <div class="form-group">
                                    <label>Adres Bilgileri E-posta Yazısı</label>
                                    <input type="text" name="contact_address_email" class="form-control" value="<?=$info->contact_address_email?>">
                                </div>
                                <div class="form-group">
                                    <label>Adres Bilgileri Telefon Yazısı</label>
                                    <input type="text" name="contact_address_phone" class="form-control" value="<?=$info->contact_address_phone?>">
                                </div>
                                <div class="form-group">
                                    <label>Adres Bilgileri Fax Yazısı</label>
                                    <input type="text" name="contact_address_fax" class="form-control" value="<?=$info->contact_address_fax?>">
                                </div>
                                <div class="form-group">
                                    <label>İletişim Formu Başlık</label>
                                    <input type="text" name="contact_form_title" class="form-control" value="<?=$info->contact_form_title?>">
                                </div>
                                <div class="form-group">
                                    <label>İletişim Formu Ad Soyad</label>
                                    <input type="text" name="contact_form_name" class="form-control" value="<?=$info->contact_form_name?>">
                                </div>
                                <div class="form-group">
                                    <label>İletişim Formu Email</label>
                                    <input type="text" name="contact_form_email" class="form-control" value="<?=$info->contact_form_email?>">
                                </div>
                                <div class="form-group">
                                    <label>İletişim Formu Telefon</label>
                                    <input type="text" name="contact_form_phone" class="form-control" value="<?=$info->contact_form_phone?>">
                                </div>
                                <div class="form-group">
                                    <label>İletişim Formu Mesaj</label>
                                    <input type="text" name="contact_form_message" class="form-control" value="<?=$info->contact_form_message?>">
                                </div>
                                <div class="form-group">
                                    <label>İletişim Formu Gönder Butonu Yazı</label>
                                    <input type="text" name="contact_form_button" class="form-control" value="<?=$info->contact_form_button?>">
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

