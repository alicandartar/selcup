<!-- Fancybox -->
<script type="text/javascript" src="<?=base_url()?>assets/admin/fancybox/source/jquery.fancybox.pack.js"></script>
<!-- DatePicker -->
<script src="<?=base_url()?>assets/admin/plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- DatePicker Language -->
<script src="<?=base_url()?>assets/admin/plugins/datepicker/locales/bootstrap-datepicker.tr.js"></script>
<!-- Tinymce -->
<script type="text/javascript" src="<?=base_url()?>assets/admin/tinymce/tinymce.min.js"></script>
<!-- Select2 -->
<script src="<?=base_url()?>assets/admin/plugins/select2/select2.full.min.js"></script>
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

        $("#link2").change(function(){
            var item = $(this).val();
            var otherValue = $('#link2 option:selected').attr('data-othervalue');
            $("#link3").val(item);
            item = '<a href="'+ item + '">'+ otherValue +'</a>';
            $("#link1").val(item);
        });


        $(".select2").select2({
            tags: true
        });

        $(".select2").on("select2:select", function (evt) {
            var element = evt.params.data.element;
            var $element = $(element);

            $element.detach();
            $(this).append($element);
            $(this).trigger("change");
        });

        var total = $('#GalleryImages .GalleryImage').length;
        if(total == 1){

            $('#GalleryImages .GalleryImage .DeleteImage').hide();

        }else{

            $('#GalleryImages .GalleryImage .DeleteImage').show();

        }

        $(document).on("click",".DeleteImage", function () {

            var total = $('#GalleryImages .GalleryImage').length;
            
            if(total-1 <= 0){

                $('#GalleryImages .GalleryImage .DeleteImage').hide();
                var url = '/filemanager/dialog.php?type=0&field_id=image0&relative_url=1&akey=<?=$this->config->item('encryption_key')?>';
                $('#GalleryImages .GalleryImage').last().find("input:hidden").val("");
                $('#GalleryImages .GalleryImage').last().find("a.DeleteImage").attr("data-id",0);
                $('#GalleryImages .GalleryImage').last().find("a.iframe-btn").attr("href",url);
                $('#GalleryImages .GalleryImage').last().find("img.ImageView").attr("src","http://placehold.it/238x200");
                $('#GalleryImages .GalleryImage').last().find("img.ImageView").attr("id","image0View");
                $('#GalleryImages .GalleryImage').last().find(".imageUrl").attr("id","image0");
                $('#GalleryImages .GalleryImage').last().find(".imageUrl").attr("name","images[0][image]");
                $('#GalleryImages .GalleryImage').last().find(".image-status").attr("name","images[0][status]");

            }else{

                var ID = $(this).attr("data-id");
            $("#Image_"+ID).remove();

                $('#GalleryImages .GalleryImage .DeleteImage').show();

            }

        });

        $(document).on("click",".DeleteFile", function () {
            
            var total = $('#Files .files').length;
            
            if(total-1 <= 0){

                $('#Files .files .DeleteFile').hide();
                var url = '/filemanager/dialog.php?type=0&field_id=file0&relative_url=1&akey=ZJujgz3zHmW5p1TYpawAkRPh02eTxn9K';
                $('#Files .files').last().find("input:hidden").val("");
                $('#Files .files').last().find("a.DeleteFile").attr("data-id",0);
                $('#Files .files').last().find("a.iframe-btn").attr("href",url);
                $('#Files .files').last().find(".fileUrl").attr("id","file0");
                $('#Files .files').last().find(".fileUrl").attr("name","files[0][file]");
                $('#Files .files').last().find(".FileView").attr("id","file0View");
                $('#Files .files').last().find(".FileView").text("");

            }else{

                var ID = $(this).attr("data-id");
                $("#File_"+ID).remove();

                    $('#Files .files .DeleteFile').show();

                }

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

        var url = jQuery('#'+field_id).val();
        if(field_id.slice(0,-1) != 'file'){
            jQuery('#'+field_id+'View').attr('src', "<?=base_url().'uploads/'?>"+url);
        }else{
            jQuery('#'+field_id+'View').text(url);
        }
        //your code
    }

    var x = <?=count(json_decode($info->images, true)) == 0 ? 1 : count(json_decode($info->images, true))?>;
    function CopyCover() {

        var url = '/filemanager/dialog.php?type=0&field_id=image'+x+'&relative_url=1&akey=<?=$this->config->item('encryption_key')?>';
        $('#GalleryImages .GalleryImage').last().clone().find("input:text").val("").end().appendTo('#GalleryImages');
        $('#GalleryImages .GalleryImage').last().attr("id","Image_"+x);
        $('#GalleryImages .GalleryImage').last().find("input:hidden").val("");
        $('#GalleryImages .GalleryImage').last().find("a.DeleteImage").attr("data-id",x);
        $('#GalleryImages .GalleryImage').last().find("a.iframe-btn").attr("href",url);
        $('#GalleryImages .GalleryImage').last().find("img.ImageView").attr("src","http://placehold.it/260?text=Gallery+Image");
        $('#GalleryImages .GalleryImage').last().find("img.ImageView").attr("id","image"+x+"View");
        $('#GalleryImages .GalleryImage').last().find(".imageUrl").attr("id","image"+x);
        $('#GalleryImages .GalleryImage').last().find(".imageUrl").attr("name","images["+x+"][image]");
        $('#GalleryImages .GalleryImage').last().find(".image-status").attr("name","images["+x+"][status]");
        x++;

        var total = $('#GalleryImages .GalleryImage').length;
        if(total == 1){

            $('#GalleryImages .GalleryImage .DeleteImage').hide();

        }else{

            $('#GalleryImages .GalleryImage .DeleteImage').show();

        }

    }

    <?$sayi = count(json_decode($info->files, true));
    ?>

    var y = <?=$sayi?>;
    function CopyFile(){

        var url = '/filemanager/dialog.php?type=0&field_id=file'+y+'&relative_url=1&akey=ZJujgz3zHmW5p1TYpawAkRPh02eTxn9K';
        $('#Files .files').last().clone().find("input:text").val("").end().appendTo('#Files');
        $('#Files .files').last().attr("id","File_"+y);
        $('#Files .files').last().find("input:hidden").val("");
        $('#Files .files').last().find("a.DeleteFile").attr("data-id",y);
        $('#Files .files').last().find("a.iframe-btn").attr("href",url);
        $('#Files .files').last().find(".fileUrl").attr("id","file"+y);
        $('#Files .files').last().find(".fileUrl").attr("name","files["+y+"][file]");
        $('#Files .files').last().find(".FileView").attr("id","file"+y+"View");
        $('#Files .files').last().find("#file"+y+"View").text("");
        y++;
        
        var total = $('#Files .files').length;
        if(total == 1){

            $('#Files .files .DeleteFile').hide();

        }else{

            $('#Files .files .DeleteFile').show();

        }

    }

    function copyFunction() {
        var copyText = document.getElementById("link1");
        copyText.select();
        document.execCommand("Copy");
    }

    function copyFunction2() {
        var copyText = document.getElementById("link3");
        copyText.select();
        document.execCommand("Copy");
    }


</script>

<!-- DatePicker -->
<link rel="stylesheet" href="<?=base_url()?>assets/admin/plugins/datepicker/datepicker3.css">
<!-- Fancybox -->
<link rel="stylesheet" href="<?=base_url()?>assets/admin/fancybox/source/jquery.fancybox.css" type="text/css" />
<!-- Select2 -->
<link rel="stylesheet" href="<?=base_url()?>assets/admin/plugins/select2/select2.min.css">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Sayfalar
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
            <div class="col-md-9">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Sayfa Çoğaltma Formu</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <div class="box-body">
                        <div class="form-group">
                            <label for="parent">Üst Sayfa</label>
                            <select name="parent" class="form-control">
                                <option value="0">Üst Sayfa Yok</option>
                                <?=$options_menu?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="login_require">Kullanıcılara Özel Sayfa</label>
                            <select name="login_require" class="form-control">
                                <option value="0" <?=$info->login_require == '0' ? 'selected' : NULL?>>Herkese Açık</option>
                                <option value="1" <?=$info->login_require == '1' ? 'selected' : NULL?>>Kullanıcı Özel</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="module">Modül Seçimi</label>
                            <select name="module" class="form-control">
                                <option value="page" <?=$info->module == 'page' ? 'selected' : NULL?>>Sayfa Modül</option>
                                <option value="services" <?=$info->module == 'services' ? 'selected' : NULL?>>Hizmetler Modül</option>
                                <option value="contact" <?=$info->module == 'contact' ? 'selected' : NULL?>>İletişim Modül</option>
                                <option value="news" <?=$info->module == 'news' ? 'selected' : NULL?>>Haber Modül</option>
                                <option value="press" <?=$info->module == 'press' ? 'selected' : NULL?>>Basın Modül</option>
                                <option value="photo" <?=$info->module == 'photo' ? 'selected' : NULL?>>Foto Galeri Modül</option>,
                                <option value="video" <?=$info->module == 'video' ? 'selected' : NULL?>>Video Galeri Modül</option>
                                <option value="ik_basvuru" <?=$info->module == 'ik_basvuru' ? 'selected' : NULL?>>İK Başvuru Modül</option>
                                <option value="acenta" <?=$info->module == 'acenta' ? 'selected' : NULL?>>Acenta Modül</option>
                                <option value="lojistik_terimler" <?=$info->module == 'lojistik_terimler' ? 'selected' : NULL?>>Lojistik Terimler Modül</option>
                                <option value="lojistik_merkezler"  <?=$info->module == 'lojistik_merkezler' ? 'selected' : NULL?>>Lojistik Merkezler Modül</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="homemodule">Ana Sayfa Modül Seçimi</label>
                            <select name="homemodule" class="form-control">
                                <option value="none" <?=$info->homemodule == 'none' ? 'selected' : NULL?>>Yok</option>
                                <option value="services" <?=$info->homemodule == 'services' ? 'selected' : NULL?>>Hizmetler Modül</option>
                            </select>
                        </div>
                        <div class="form-group" >
                            <label>Ana Sayfa Modül Resimi Seç</label>
                            <div class="input-group">
                                <input type="hidden" class="form-control imageUrl" name="homecover" id="homecover0" value="<?=$info->homecover?>">
                                <a href="<?=base_url()?>filemanager/dialog.php?type=0&field_id=homecover0&relative_url=1&akey=<?=$this->config->item('encryption_key')?>" class="btn btn-default btn-flat iframe-btn">
                                    <i class="fa fa-search"> Dosya Seç</i>
                                </a>
                                <a href="<?=base_url()?>filemanager/dialog.php?type=0&field_id=homecover0&relative_url=1&akey=<?=$this->config->item('encryption_key')?>" class="iframe-btn">
                                    <img id="homecover0View" src="<?=base_url()?>uploads/<?=$info->homecover?>" class="img-responsive CoverView">
                                </a>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="position">Gösterim Durumu</label>
                            <select name="position" id="position" class="form-control">
                                <option value="0" <?=$info->position == 0 ? 'Selected': NULL?>>Üst Menüde Göster</option>
                                <option value="1" <?=$info->position == 1 ? 'Selected': NULL?>>Alt Menüde Göster</option>
                                <option value="2" <?=$info->position == 2 ? 'Selected': NULL?>>Alt ve Üst Menüde Göster</option>
                                <option value="3" <?=$info->position == 3 ? 'Selected': NULL?>>Görünmez</option>
                            </select>
                        </div>
                        <div class="form-group" >
                            <label>Sayfa Resim Seç</label>
                            <div class="input-group">
                                <input type="hidden" class="form-control imageUrl" name="cover" id="cover0" value="<?=$info->cover?>">
                                <a href="<?=base_url()?>filemanager/dialog.php?type=0&field_id=cover0&relative_url=1&akey=<?=$this->config->item('encryption_key')?>" class="btn btn-default btn-flat iframe-btn">
                                    <i class="fa fa-search"> Dosya Seç</i>
                                </a>
                                <a href="<?=base_url()?>filemanager/dialog.php?type=0&field_id=cover0&relative_url=1&akey=<?=$this->config->item('encryption_key')?>" class="iframe-btn">
                                    <img id="cover0View" src="<?=base_url()?>uploads/<?=$info->cover?>" class="img-responsive CoverView">
                                </a>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="title">Başlık</label>
                            <input type="text" name="title" class="form-control" id="title" placeholder="Sayfa Adı" value="<?=$info->title?>" required>
                        </div>
                        <div class="form-group">
                            <label for="title">Slogan</label>
                            <input type="text" name="slogan" class="form-control" id="slogan" placeholder="Slogan" value="<?=$info->slogan?>">
                        </div>
                        <div class="form-group">
                            <label for="url">Yönlendirme Adresi</label>
                            <input type="text" name="url" id="url" class="form-control" placeholder="http://wwww.example.com/example" value="<?=$info->url?>" >
                        </div>
                        <div class="form-group">
                            <label for="content">İçerik</label>
                            <textarea name="content" id="content" class="form-control" rows="20"><?=$info->content?></textarea>
                            <div class="form-group">

                                <label for="link">Sayfa Link Kopyalama</label>
                                <select name="link2" class="form-control" id="link2">
                                    <option value="0">Sayfa Seçiniz</option>
                                    <?=$link?>
                                </select>
                            </div>

                            <input type="text" name="link1" class="form-control" id="link1">

                            <button type="button" onclick="copyFunction()" class="btn btn-success">Kopyala</button>

                            <p></p>

                            <input type="text" name="link3" class="form-control" id="link3">

                            <button type="button" onclick="copyFunction2()" class="btn btn-success">Kopyala</button>
                        </div><div class="form-group" style="display: none">
                            <label for="">Sayfa Resimleri</label><br>
                            <button type="button" onclick="CopyCover()" class="btn btn-success">Resim Ekle</button>
                        </div>
                        <div class="form-group col-md-12" id="GalleryImages" style="display: none">
                            <?php
                            if(count(json_decode($info->images, true)) > 0):
                                foreach ($covers = json_decode($info->images, true) as $key => $cover):?>
                                <div class="GalleryImage col-md-4 attachment-block clearfix" id="Image_<?=$key?>">
                                    <label>Kapak Resmi</label>
                                    <select name="images[<?=$key?>][status]" class="form-control image-status">
                                        <option value="0" <?=$cover["status"] == 0 ? 'Selected' : ''?>>Kapak Resmi Değil</option>
                                        <option value="1" <?=$cover["status"] == 1 ? 'Selected' : ''?>>Kapak Resmi</option>
                                    </select>
                                    <label>Resim Seç</label>
                                    <div class="input-group">
                                        <input type="hidden" class="form-control imageUrl" name="images[<?=$key?>][image]" id="image<?=$key?>" value="<?=$cover["image"]?>">
                                        <a href="<?=base_url()?>filemanager/dialog.php?type=0&field_id=image<?=$key?>&relative_url=1&akey=<?=$this->config->item('encryption_key')?>" class="btn btn-default btn-flat pull-right iframe-btn">
                                            <i class="fa fa-search"> Dosya Seç</i>
                                        </a>
                                        <a href="javascript:;" data-id="<?=$key?>" class="btn btn-danger btn-flat pull-right DeleteImage">
                                            <i class="fa fa-remove"> Sil</i>
                                        </a>
                                        <a href="<?=base_url()?>filemanager/dialog.php?type=0&field_id=image<?=$key?>&relative_url=1&akey=<?=$this->config->item('encryption_key')?>" class="iframe-btn">
                                            <img id="image<?=$key?>View" src="<?=base_url().'uploads/'.$cover["image"]?>" class="img-responsive ImageView">
                                        </a>
                                        <div class="input-group">
                                            <span id="file0View" class="FileView"><?=$cover["image"]?></span>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <div class="GalleryImage col-md-4 attachment-block clearfix" id="Image_0">
                                    <label>Kapak Resmi</label>
                                    <select name="images[0][status]" class="form-control image-status">
                                        <option value="0">Kapak Resmi Değil</option>
                                        <option value="1">Kapak Resmi</option>
                                    </select>
                                    <label>Resim Seç</label>
                                    <div class="input-group">
                                        <input type="hidden" class="form-control imageUrl" name="images[0][image]" id="image0">
                                        <a href="<?=base_url()?>filemanager/dialog.php?type=0&field_id=image0&relative_url=1&akey=<?=$this->config->item('encryption_key')?>" class="btn btn-default btn-flat pull-right iframe-btn">
                                            <i class="fa fa-search"> Dosya Seç</i>
                                        </a>
                                        <a href="javascript:;" style="display: none;" data-id="0" class="btn btn-danger btn-flat pull-right DeleteImage">
                                            <i class="fa fa-remove"> Sil</i>
                                        </a>
                                        <a href="<?=base_url()?>filemanager/dialog.php?type=0&field_id=image0&relative_url=1&akey=<?=$this->config->item('encryption_key')?>" class="iframe-btn">
                                            <img id="image0View" src="http://placehold.it/238x200" class="img-responsive ImageView">
                                        </a>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="form-group">
                            <label for="files_title">Sayfa Dosyalar Kısmı Başlığı</label>
                            <input type="text" name="files_title" class="form-control" id="files_title" placeholder="Dosyalar Başlık" value="<?=$info->files_title?>">
                        </div>
                        <div class="form-group">
                            <label for="">Sayfa Dosyaları</label><br>
                            <button type="button" onclick="CopyFile()" class="btn btn-success">Dosya Ekle</button>
                        </div>
                        <div class="form-group col-md-12" id="Files">
                            <?php
                            if(json_decode($info->files, true) != null):
                                foreach ($files = json_decode($info->files, true) as $key => $file):?>
                                    <div class="files col-md-4 attachment-block clearfix" id="File_<?=$key?>">
                                        <label>Dosya Seç</label>
                                        <div class="input-group">
                                            <input type="hidden" class="form-control fileUrl" name="files[<?=$key?>][file]" id="file<?=$key?>" value="<?=$file['file']?>">
                                            <a href="<?=base_url()?>filemanager/dialog.php?type=0&field_id=file<?=$key?>&relative_url=1&akey=<?=$this->config->item('encryption_key')?>" class="btn btn-default btn-flat iframe-btn">
                                                <i class="fa fa-search"> Dosya Seç</i>
                                            </a>
                                            <a href="javascript:void(0);" data-id="<?=$key?>" class="btn btn-danger btn-flat pull-right DeleteFile">
                                                <i class="fa fa-remove"> Sil</i>
                                            </a>
                                        </div>
                                        <div class="input-group">
                                            <span id="file<?=$key?>View" class="FileView"><?=$file['file']?></span>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php else: ?>

                                <div class="files col-md-4 attachment-block clearfix" id="File_0">
                                    <label>Dosya Seç</label>
                                    <div class="input-group">
                                        <input type="hidden" class="form-control fileUrl" name="files[0][file]" id="file0">

                                        <a href="<?=base_url()?>filemanager/dialog.php?type=0&field_id=file0&relative_url=1&akey=<?=$this->config->item('encryption_key')?>" class="btn btn-default btn-flat iframe-btn">
                                            <i class="fa fa-search"> Dosya Seç</i>
                                        </a>
                                        <a href="javascript:void(0);" style="display: none" data-id="0" class="btn btn-danger btn-flat pull-right DeleteFile">
                                            <i class="fa fa-remove"> Sil</i>
                                        </a>
                                    </div>
                                    <div class="input-group">
                                        <span id="file0View" class="FileView"></span>
                                    </div>
                                </div>

                            <?php endif; ?>
                        </div>
                        <div class="form-group">
                            <label for="sort_sequence">Sıra</label>
                            <input type="number" name="sort_sequence" id="sort_sequence" class="form-control" value="<?=$info->sort_sequence?>">
                        </div>
                        <div class="form-group">
                            <label for="status">Durumu</label>
                            <select name="status" id="status" class="form-control">
                                <option value="1" <?=$info->status == 1 ? 'Selected': NULL?>>Aktif</option>
                                <option value="0" <?=$info->status == 0 ? 'Selected': NULL?>>Pasif</option>
                            </select>
                        </div>
                    </div><!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Kaydet</button>
                    </div>
                </div><!-- /.box -->
            </div><!--/.col (left) -->
            <!-- right column -->
            <?php $meta_tags = json_decode($info->meta_tags);?>
            <div class="col-md-6" style="display:none">
                <!-- Horizontal Form -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Sayfa Seo Bölümü</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <div class="form-group">
                            <div class="callout callout-info" style="margin-bottom: 0!important;">
                                <h4><i class="fa fa-info"></i> Not:</h4>
                                Bu alanlar boş bırakıldığı takdirde, <a target="_blank" href="<?=base_url()?>admin/seo">Seo</a> bölümündeki alanlar uygulanacaktır.
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="meta_title">Meta Title</label>
                            <input type="text" name="meta[0][title]" id="meta_title" class="form-control" value="<?=$meta_tags[0]->title?>">
                        </div>
                        <div class="form-group">
                            <label for="meta_description">Meta Description</label>
                            <input type="text" name="meta[0][description]" id="meta_description" class="form-control" value="<?=$meta_tags[0]->description?>">
                        </div>
                        <div class="form-group">
                            <label for="meta_keywords">Meta Keywords</label>
                            <input type="text" name="meta[0][keywords]" id="meta_keywords" class="form-control" value="<?=$meta_tags[0]->keywords?>">
                        </div>
                        <div class="form-group">
                            <label for="meta_abstract">Meta Abstract</label>
                            <input type="text" name="meta[0][abstract]" id="meta_abstract" class="form-control" value="<?=$meta_tags[0]->abstract?>">
                        </div>
                    </div><!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Kaydet</button>
                    </div>
                </div><!-- /.box -->
                <!-- general form elements disabled -->
            </div><!--/.col (right) -->
            <?=form_close()?>
        </div>   <!-- /.row -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
