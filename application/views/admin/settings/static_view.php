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
        external_filemanager_path:"<?=base_url()?>filemanager/",
        external_plugins: { "filemanager" : "<?=base_url()?>filemanager/plugin.min.js"},
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

    $(document).on("click",".DeleteIcon", function () {

        var total = $('#Icons .icons').length;

        if(total-1 <= 0){
            y=0;
            var url = '<?=base_url()?>filemanager/dialog.php?type=0&field_id=icon'+y+'&relative_url=1&akey=<?=$this->config->item('encryption_key')?>';
            $('#Icons .icons').last().attr("id","Icon_"+y);
            $('#Icons .icons').last().find("input:hidden").val("");
            $('#Icons .icons').last().find("a.DeleteIcon").attr("data-id",y);
            $('#Icons .icons').last().find("a.iframe-btn").attr("href",url);
            $('#Icons .icons').last().find(".iconUrl").attr("id","icon"+y);
            $('#Icons .icons').last().find(".iconUrl").attr("name","icons["+y+"][icon]");
            $('#Icons .icons').last().find("img").attr("src","http://placehold.it/200x200");
            $('#Icons .icons').last().find("img").attr("id", "icon"+y+"View");
            $('#Icons .icons').last().find("input:text").attr("name","icons["+y+"][title]");
            $('#Icons .icons').last().find("input:text").attr("id","title"+y);
            $('#Icons .icons').last().find("input:text").val("");

        }else{

            var ID = $(this).attr("data-id");
            $("#Icon_"+ID).remove();

            $('#Icons .icons .DeleteIcon').show();

        }

    });

    <?
    if ($info->icons == null) {
        $sayi = 1;
    }
    else
    {
//    $sayi = count(json_decode($info[0]->Icons, true));
        foreach ($info->icons as $key => $ico)
        {
            $lastkey1 = $key;
        }
        $sayi = $lastkey1 + 1;
    }


    ?>

    var x = <?=$sayi?>;
    function CopyFile(){

        var url = '<?=base_url()?>filemanager/dialog.php?type=0&field_id=icon'+x+'&relative_url=1&akey=<?=$this->config->item('encryption_key')?>';
        $('#Icons .icons').last().clone().find("input:text").val("").end().appendTo('#Icons');
        $('#Icons .icons').last().attr("id","Icon_"+x);
        $('#Icons .icons').last().find("input:hidden").val("");
        $('#Icons .icons').last().find("a.DeleteIcon").attr("data-id",x);
        $('#Icons .icons').last().find("a.iframe-btn").attr("href",url);
        $('#Icons .icons').last().find(".iconUrl").attr("id","icon"+x);
        $('#Icons .icons').last().find(".iconUrl").attr("name","icons["+x+"][icon]");
        $('#Icons .icons').last().find("img").attr("src","http://placehold.it/200x200");
        $('#Icons .icons').last().find("img").attr("id", "icon"+x+"View");
        $('#Icons .icons').last().find("input:text").attr("name","icons["+x+"][title]");
        $('#Icons .icons').last().find("input:text").attr("id","title"+x);
        x++;



    }

</script>

<!-- Fancybox -->
<link rel="stylesheet" href="<?=base_url()?>assets/admin/fancybox/source/jquery.fancybox.css" type="text/css" />


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Statik Alanları
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
                        <h3 class="box-title">Statik Alan Formu</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <?=form_open_multipart($CurrentUrl)?>
                    <div class="box-body">
                        <?php print_r($error)?>
                        <button type="submit" class="btn btn-primary">Kaydet</button>
                        <div class="box-body" id="GalleryImages">
                            <h4>Arama</h4>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Arama Bölümü Yazısı</label>
                                    <input type="text" class="form-control" name="search_text" value="<?=$info->search_text?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Arama Bölümü Buton Yazısı</label>
                                    <input type="text" class="form-control" name="search_button" value="<?=$info->search_button?>">
                                </div>
                            </div>

                            <h4>Ana Sayfa -> Lojistik Merkezler</h4>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Lojistik Merkezler Başlık 1. Satır</label>
                                    <input type="text" class="form-control" name="lojistik_title1" value="<?=$info->lojistik_title1?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label> Lojistik Merkezler Başlık 2. Satır</label>
                                    <input type="text" class="form-control" name="lojistik_title2" value="<?=$info->lojistik_title2?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Adresleri Gör Buton</label>
                                    <input type="text" class="form-control" name="lojistik_button" value="<?=$info->lojistik_button?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Sağ Taraf Yazı 1. Kısım Rakam</label>
                                    <input type="text" class="form-control" name="lojistik_right1number" value="<?=$info->lojistik_right1number?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Sağ Taraf Yazı 1. Kısım Yazı 1. Satır</label>
                                    <input type="text" class="form-control" name="lojistik_right1text1" value="<?=$info->lojistik_right1text1?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Sağ Taraf Yazı 1. Kısım Yazı 2. Satır</label>
                                    <input type="text" class="form-control" name="lojistik_right1text2" value="<?=$info->lojistik_right1text2?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Sağ Taraf Yazı 2. Kısım Rakam</label>
                                    <input type="text" class="form-control" name="lojistik_right2number" value="<?=$info->lojistik_right2number?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Sağ Taraf Yazı 2. Kısım Yazı 2. Satır</label>
                                    <input type="text" class="form-control" name="lojistik_right2text1" value="<?=$info->lojistik_right2text1?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Sağ Taraf Yazı 2. Kısım Yazı 2. Satır</label>
                                    <input type="text" class="form-control" name="lojistik_right2text2" value="<?=$info->lojistik_right2text2?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Sağ Taraf Yazı 3. Kısım Rakam</label>
                                    <input type="text" class="form-control" name="lojistik_right3number" value="<?=$info->lojistik_right3number?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Sağ Taraf Yazı 3. Kısım Yazı 2. Satır</label>
                                    <input type="text" class="form-control" name="lojistik_right3text1" value="<?=$info->lojistik_right3text1?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Sağ Taraf Yazı 3. Kısım Yazı 2. Satır</label>
                                    <input type="text" class="form-control" name="lojistik_right3text2" value="<?=$info->lojistik_right3text2?>">
                                </div>
                            </div>

                            <h4>Ana Sayfa -> Haberler</h4>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>SAĞLIK LOJİSTİK’TEN HABERLER Lacivert Kısım</label>
                                    <input type="text" class="form-control" name="haberler_title1" value="<?=$info->haberler_title1?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>SAĞLIK LOJİSTİK’TEN HABERLER Gri Kısım</label>
                                    <input type="text" class="form-control" name="haberler_title2" value="<?=$info->haberler_title2?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Haberler Yazısı</label>
                                    <input type="text" class="form-control" name="haberler_haberler" value="<?=$info->haberler_haberler?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Basın Yazısı</label>
                                    <input type="text" class="form-control" name="haberler_basin" value="<?=$info->haberler_basin?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Fotoğraflar Yazısı</label>
                                    <input type="text" class="form-control" name="haberler_foto" value="<?=$info->haberler_foto?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Videolar Yazısı</label>
                                    <input type="text" class="form-control" name="haberler_video" value="<?=$info->haberler_video?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Kampanyalar Yazısı</label>
                                    <input type="text" class="form-control" name="haberler_kampanya" value="<?=$info->haberler_kampanya?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Detaylar Butonu</label>
                                    <input type="text" class="form-control" name="haberler_detaylar" value="<?=$info->haberler_detaylar?>">
                                </div>
                            </div>

                            <h4>Ana Sayfa -> Yeşil Yol</h4>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Yeşil Yol Başlık Kalın</label>
                                    <input type="text" class="form-control" name="yesil_title1" value="<?=$info->yesil_title1?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Yeşil Yol Başlık İnce</label>
                                    <input type="text" class="form-control" name="yesil_title2" value="<?=$info->yesil_title2?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Yeşil Yol Alt Başlık</label>
                                    <input type="text" class="form-control" name="yesil_subtitle" value="<?=$info->yesil_subtitle?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Yeşil Yol Buton</label>
                                    <input type="text" class="form-control" name="yesil_button" value="<?=$info->yesil_button?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Yeşil Yol KM Yazı</label>
                                    <input type="text" class="form-control" name="yesil_km_text" value="<?=$info->yesil_km_text?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Yeşil Yol KM Alt Yazı</label>
                                    <input type="text" class="form-control" name="yesil_km_subtitle" value="<?=$info->yesil_km_subtitle?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Yeşil Yol KM Sayı</label>
                                    <input type="text" class="form-control" name="yesil_km" value="<?=$info->yesil_km?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Yeşil Yol CO2 Yazı</label>
                                    <input type="text" class="form-control" name="yesil_co2_text" value="<?=$info->yesil_co2_text?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Yeşil Yol CO2 Alt Yazı</label>
                                    <input type="text" class="form-control" name="yesil_co2_subtitle" value="<?=$info->yesil_co2_subtitle?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Yeşil Yol CO2 Sayı</label>
                                    <input type="text" class="form-control" name="yesil_co2" value="<?=$info->yesil_co2?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Yeşil Yol Dizel Yazı</label>
                                    <input type="text" class="form-control" name="yesil_dizel_text" value="<?=$info->yesil_dizel_text?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Yeşil Yol Dizel Alt Yazı</label>
                                    <input type="text" class="form-control" name="yesil_dizel_subtitle" value="<?=$info->yesil_dizel_subtitle?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Yeşil Yol Dizel Sayı</label>
                                    <input type="text" class="form-control" name="yesil_dizel" value="<?=$info->yesil_dizel?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Yeşil Yol Hektar Yazı</label>
                                    <input type="text" class="form-control" name="yesil_hektar_text" value="<?=$info->yesil_hektar_text?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Yeşil Yol Hektar Alt Yazı</label>
                                    <input type="text" class="form-control" name="yesil_hektar_subtitle" value="<?=$info->yesil_hektar_subtitle?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Yeşil Yol Hektar Sayı</label>
                                    <input type="text" class="form-control" name="yesil_hektar" value="<?=$info->yesil_hektar?>">
                                </div>
                            </div>

                            <h4>Footer Kısmı</h4>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Genel Müdürlük Yazısı</label>
                                    <input type="text" class="form-control" name="footer_genelmudurluk" value="<?=$info->footer_genelmudurluk?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Adres 1. Satır</label>
                                    <input type="text" class="form-control" name="footer_adres1" value="<?=$info->footer_adres1?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Adres 2. Satır</label>
                                    <input type="text" class="form-control" name="footer_adres2" value="<?=$info->footer_adres2?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Adres 3. Satır</label>
                                    <input type="text" class="form-control" name="footer_adres3" value="<?=$info->footer_adres3?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Telefon</label>
                                    <input type="text" class="form-control" name="footer_phone" value="<?=$info->footer_phone?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Fax</label>
                                    <input type="text" class="form-control" name="footer_fax" value="<?=$info->footer_fax?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" class="form-control" name="footer_email" value="<?=$info->footer_email?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>MEMNUNİYET-ÖNERİ-ŞİKAYET Başlık</label>
                                    <input type="text" class="form-control" name="footer_memnuniyet" value="<?=$info->footer_memnuniyet?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>MEMNUNİYET-ÖNERİ-ŞİKAYET Link</label>
                                    <input type="text" class="form-control" name="footer_memnuniyetlink" value="<?=$info->footer_memnuniyetlink?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>LOJİSTİK TERİMLER Başlık</label>
                                    <input type="text" class="form-control" name="footer_lojistik" value="<?=$info->footer_lojistik?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>LOJİSTİK TERİMLER Link</label>
                                    <input type="text" class="form-control" name="footer_lojistiklink" value="<?=$info->footer_lojistiklink?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>LOJİSTİK KISALTMALAR Başlık</label>
                                    <input type="text" class="form-control" name="footer_lojistikkisalt" value="<?=$info->footer_lojistikkisalt?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>LOJİSTİK KISALTMALAR Link</label>
                                    <input type="text" class="form-control" name="footer_lojistikkisaltlink" value="<?=$info->footer_lojistikkisaltlink?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>BİZİ TAKİP EDİN Başlık</label>
                                    <input type="text" class="form-control" name="footer_followus" value="<?=$info->footer_followus?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Copyright Yazısı</label>
                                    <input type="text" class="form-control" name="footer_copyright" value="<?=$info->footer_copyright?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Tüm Hakları Saklıdır Yazısı</label>
                                    <input type="text" class="form-control" name="footer_rights" value="<?=$info->footer_rights?>">
                                </div>
                            </div>

                            <h4>Haber Detay Kısmı</h4>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Tüm Haberler</label>
                                    <input type="text" class="form-control" name="news_allnews" value="<?=$info->news_allnews?>">
                                </div>
                            </div>
                            <!--<div class="form-group">
                                    <label for="PopupLink">Popup İçerik</label>
                                    <textarea name="PopupContent" id="PopupContent" class="form-control" rows="20"><?/*=$info->PopupContent*/?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="PopupStatus">Popup Durumu</label>
                                    <select name="PopupStatus" class="form-control">
                                        <option value="1" <?/*=$info->PopupStatus == "1" ? "selected" : null*/?>>Aktif</option>
                                        <option value="0" <?/*=$info->PopupStatus == "0" ? "selected" : null*/?>>Pasif</option>
                                    </select>
                                </div>-->
                            <!--<div class="col-md-4 col-md-offset-1">
                                <div class="form-group">
                                    <label for="">Ana Sayfa Üst Kısımdaki Logolar</label><br>
                                    <button type="button" onclick="CopyFile()" class="btn btn-success">Logo Ekle</button>
                                </div>
                                <div class="form-group col-md-12" id="Icons">
                                    <?php
/*
                                    if($info->icons != null):
                                        foreach ($info->icons as $key => $icon):*/?>
                                            <div class="icons col-md-4 attachment-block clearfix" id="Icon_<?/*=$key*/?>">
                                                <label>Logo Seç</label>
                                                <div class="input-group">
                                                    <input type="hidden" class="form-control iconUrl" name="icons[<?/*=$key*/?>][icon]" id="icon<?/*=$key*/?>" value="<?/*=$icon->icon*/?>">
                                                    <a href="<?/*=base_url()*/?>filemanager/dialog.php?type=0&field_id=icon<?/*=$key*/?>&relative_url=1&akey=<?/*=$this->config->item('encryption_key')*/?>" class="btn btn-default btn-flat iframe-btn">
                                                        <i class="fa fa-search"> Logo Seç</i>
                                                    </a>
                                                    <a href="javascript:void(0);" data-id="<?/*=$key*/?>" class="btn btn-danger btn-flat pull-right DeleteIcon">
                                                        <i class="fa fa-remove"> Sil</i>
                                                    </a>
                                                </div>
                                                <div class="input-group">
                                                    <img id="icon<?/*=$key*/?>View" src="<?/*=base_url()*/?>uploads/<?/*=$icon->icon*/?>" class="img-responsive">
                                                </div>
                                            </div>
                                        <?php /*endforeach; */?>
                                    <?php /*else: */?>

                                        <div class="icons col-md-4 attachment-block clearfix" id="Icon_0">
                                            <label>Logo Seç</label>
                                            <div class="input-group">
                                                <input type="hidden" class="form-control iconUrl" name="icons[0][icon]" id="icon0">

                                                <a href="<?/*=base_url()*/?>filemanager/dialog.php?type=0&field_id=icon0&relative_url=1&akey=<?/*=$this->config->item('encryption_key')*/?>" class="btn btn-default btn-flat iframe-btn">
                                                    <i class="fa fa-search"> Logo Seç</i>
                                                </a>
                                                <a href="javascript:void(0);" data-id="0" class="btn btn-danger btn-flat pull-right DeleteIcon">
                                                    <i class="fa fa-remove"> Sil</i>
                                                </a>
                                            </div>
                                            <div class="input-group">
                                                <img id="icon0View" src="http://placehold.it/200x200" class="img-responsive">
                                            </div>

                                        </div>

                                    <?php /*endif; */?>
                                </div>
                            </div>-->
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

