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
        jQuery('#Image'+field_id).attr('src', '<?=base_url().'uploads/'?>'+url);
        //your code
    }

</script>

<!-- Fancybox -->
<link rel="stylesheet" href="<?=base_url()?>assets/admin/fancybox/source/jquery.fancybox.css" type="text/css" />


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Form Sayfaları Statik Alanları
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
                        <h3 class="box-title">Form Statik Alanları</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <?=form_open_multipart($CurrentUrl)?>
                    <div class="box-body">
                        <?php print_r($error)?>
                        <button type="submit" class="btn btn-primary">Kaydet</button>
                        <div class="box-body" id="GalleryImages">
                            <div class="col-md-12">
                                <h3>Genel Form Ayarları</h3>
                                <div class="form-group col-md-6">
                                    <label>Form gönderiminin başarılı olmasının ardından çıkacak mesaj</label>
                                    <input type="text" name="general_form_success" class="form-control" value="<?=$info->general_form_success?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Form gönderiminin başarısız olmasının ardından çıkacak mesaj</label>
                                    <input type="text" name="general_form_failed" class="form-control" value="<?=$info->general_form_failed?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Form gönderiminin dosya yükleme yüzünden başarısız olmasının ardından çıkacak mesaj</label>
                                    <input type="text" name="general_form_filefailed" class="form-control" value="<?=$info->general_form_filefailed?>">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <h3>Memnuniyet Şikayet Form Ayarları</h3>
                                <div class="form-group col-md-6">
                                    <label>Form Başlığı</label>
                                    <input type="text" name="memnuniyet_form_title" class="form-control" value="<?=$info->memnuniyet_form_title?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Ad Soyad Başlığı</label>
                                    <input type="text" name="memnuniyet_form_adsoyad" class="form-control" value="<?=$info->memnuniyet_form_adsoyad?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Firma Adı Başlığı</label>
                                    <input type="text" name="memnuniyet_form_firmaadi" class="form-control" value="<?=$info->memnuniyet_form_firmaadi?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Telefon Başlığı</label>
                                    <input type="text" name="memnuniyet_form_telefon" class="form-control" value="<?=$info->memnuniyet_form_telefon?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Fax Başlığı</label>
                                    <input type="text" name="memnuniyet_form_fax" class="form-control" value="<?=$info->memnuniyet_form_fax?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Email Başlığı</label>
                                    <input type="text" name="memnuniyet_form_email" class="form-control" value="<?=$info->memnuniyet_form_email?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Mesaj Başlığı</label>
                                    <input type="text" name="memnuniyet_form_mesaj" class="form-control" value="<?=$info->memnuniyet_form_mesaj?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Form Tipi Başlığı</label>
                                    <input type="text" name="memnuniyet_form_formtipi" class="form-control" value="<?=$info->memnuniyet_form_formtipi?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Memnuniyet Başlığı</label>
                                    <input type="text" name="memnuniyet_form_memnuniyet" class="form-control" value="<?=$info->memnuniyet_form_memnuniyet?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Öneri Başlığı</label>
                                    <input type="text" name="memnuniyet_form_oneri" class="form-control" value="<?=$info->memnuniyet_form_oneri?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Şikayet Başlığı</label>
                                    <input type="text" name="memnuniyet_form_sikayet" class="form-control" value="<?=$info->memnuniyet_form_sikayet?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Gönder Butonu Alanı</label>
                                    <input type="text" name="memnuniyet_form_gonderbutonu" class="form-control" value="<?=$info->memnuniyet_form_gonderbutonu?>">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <h3>Kampanya Form Ayarları</h3>
                                <div class="form-group col-md-6">
                                    <label>Firma Bilgileri Başlığı</label>
                                    <input type="text" name="kampanya_form_firmatitle" class="form-control" value="<?=$info->kampanya_form_firmatitle?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Adres Bilgileri Başlığı</label>
                                    <input type="text" name="kampanya_form_adrestitle" class="form-control" value="<?=$info->kampanya_form_adrestitle?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Firma Adı ve Ünvanı Başlığı</label>
                                    <input type="text" name="kampanya_form_firmaadi" class="form-control" value="<?=$info->kampanya_form_firmaadi?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Yükleme Ülkesi Başlığı</label>
                                    <input type="text" name="kampanya_form_yuklemeulkesi" class="form-control" value="<?=$info->kampanya_form_yuklemeulkesi?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Ad Soyad ve Ünvanı Başlığı</label>
                                    <input type="text" name="kampanya_form_adsoyad" class="form-control" value="<?=$info->kampanya_form_adsoyad?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Yükleme Adresi Başlığı</label>
                                    <input type="text" name="kampanya_form_yuklemeadresi" class="form-control" value="<?=$info->kampanya_form_yuklemeadresi?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Telefon Başlığı</label>
                                    <input type="text" name="kampanya_form_telefon" class="form-control" value="<?=$info->kampanya_form_telefon?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Yükleme Tarihi Başlığı</label>
                                    <input type="text" name="kampanya_form_yuklemetarihi" class="form-control" value="<?=$info->kampanya_form_yuklemetarihi?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Email Adresi Başlığı</label>
                                    <input type="text" name="kampanya_form_email" class="form-control" value="<?=$info->kampanya_form_email?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Boşaltma Ülkesi Başlığı</label>
                                    <input type="text" name="kampanya_form_bosaltmaulkesi" class="form-control" value="<?=$info->kampanya_form_bosaltmaulkesi?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Yükün Cinsi Başlığı</label>
                                    <input type="text" name="kampanya_form_yukuncinsi" class="form-control" value="<?=$info->kampanya_form_yukuncinsi?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Boşaltma Adresi Başlığı</label>
                                    <input type="text" name="kampanya_form_bosaltmaadresi" class="form-control" value="<?=$info->kampanya_form_bosaltmaadresi?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Yükün Miktarı Başlığı</label>
                                    <input type="text" name="kampanya_form_yukunmiktari" class="form-control" value="<?=$info->kampanya_form_yukunmiktari?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Boşaltma Tarihi Başlığı</label>
                                    <input type="text" name="kampanya_form_bosaltmatarihi" class="form-control" value="<?=$info->kampanya_form_bosaltmatarihi?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Araç Cinsi Başlığı</label>
                                    <input type="text" name="kampanya_form_araccinsi" class="form-control" value="<?=$info->kampanya_form_araccinsi?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Eklemek İstedikleriniz Başlığı</label>
                                    <input type="text" name="kampanya_form_eknot" class="form-control" value="<?=$info->kampanya_form_eknot?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Gönder Butonu Alanı</label>
                                    <input type="text" name="kampanya_form_gonderbutonu" class="form-control" value="<?=$info->kampanya_form_gonderbutonu?>">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <h3>İş Başvuru Formu</h3>
                                <div class="form-group col-md-6">
                                    <label>Gönder Butonu Alanı</label>
                                    <input type="text" name="isbasvuru_form_gonderbutonu" class="form-control" value="<?=$info->isbasvuru_form_gonderbutonu?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>İş Başvuru Formu Başlığı</label>
                                    <input type="text" name="isbasvuru_form_title" class="form-control" value="<?=$info->isbasvuru_form_title?>">
                                </div>
                               <!-- <div class="form-group col-md-6">
                                    <label>İş Başvuru Formu İçerik Yazısı</label>
                                    <input type="text" name="isbasvuru_form_content" class="form-control" value="<?/*=$info->isbasvuru_form_content*/?>">
                                </div>-->
                                <div class="form-group col-md-6">
                                    <label>İletişim Bilgileri Alanı</label>
                                    <input type="text" name="isbasvuru_form_iletisimbilg" class="form-control" value="<?=$info->isbasvuru_form_iletisimbilg?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Ad Soyad Alanı</label>
                                    <input type="text" name="isbasvuru_form_adsoyad" class="form-control" value="<?=$info->isbasvuru_form_adsoyad?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Adres Alanı</label>
                                    <input type="text" name="isbasvuru_form_adres" class="form-control" value="<?=$info->isbasvuru_form_adres?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Semt Alanı</label>
                                    <input type="text" name="isbasvuru_form_semt" class="form-control" value="<?=$info->isbasvuru_form_semt?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Şehir Alanı</label>
                                    <input type="text" name="isbasvuru_form_sehir" class="form-control" value="<?=$info->isbasvuru_form_sehir?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Telefon Alanı</label>
                                    <input type="text" name="isbasvuru_form_telefon" class="form-control" value="<?=$info->isbasvuru_form_telefon?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>E Posta Alanı</label>
                                    <input type="text" name="isbasvuru_form_eposta" class="form-control" value="<?=$info->isbasvuru_form_eposta?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Kişisel Bilgiler Alanı</label>
                                    <input type="text" name="isbasvuru_form_kisiselbilg" class="form-control" value="<?=$info->isbasvuru_form_kisiselbilg?>">
                                </div>
                            <div class="form-group col-md-6">
                                    <label>Doğum Tarihi Alanı</label>
                                    <input type="text" name="isbasvuru_form_dogumtarihi" class="form-control" value="<?=$info->isbasvuru_form_dogumtarihi?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Cinsiyet Alanı</label>
                                    <input type="text" name="isbasvuru_form_cinsiyet" class="form-control" value="<?=$info->isbasvuru_form_cinsiyet?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Erkek Alanı</label>
                                    <input type="text" name="isbasvuru_form_erkek" class="form-control" value="<?=$info->isbasvuru_form_erkek?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Kadın Alanı</label>
                                    <input type="text" name="isbasvuru_form_kadin" class="form-control" value="<?=$info->isbasvuru_form_kadin?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Medeni Durumu Alanı</label>
                                    <input type="text" name="isbasvuru_form_medenidurum" class="form-control" value="<?=$info->isbasvuru_form_medenidurum?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Evli Alanı</label>
                                    <input type="text" name="isbasvuru_form_evli" class="form-control" value="<?=$info->isbasvuru_form_evli?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Bekar Alanı</label>
                                    <input type="text" name="isbasvuru_form_bekar" class="form-control" value="<?=$info->isbasvuru_form_bekar?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Sürücü Belgesi Alanı</label>
                                    <input type="text" name="isbasvuru_form_surucubelgesi" class="form-control" value="<?=$info->isbasvuru_form_surucubelgesi?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Var Alanı</label>
                                    <input type="text" name="isbasvuru_form_var" class="form-control" value="<?=$info->isbasvuru_form_var?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Yok Alanı</label>
                                    <input type="text" name="isbasvuru_form_yok" class="form-control" value="<?=$info->isbasvuru_form_yok?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Evet Alanı</label>
                                    <input type="text" name="isbasvuru_form_evet" class="form-control" value="<?=$info->isbasvuru_form_evet?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Hayır Alanı</label>
                                    <input type="text" name="isbasvuru_form_hayir" class="form-control" value="<?=$info->isbasvuru_form_hayir?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Askerlik Durumu Alanı</label>
                                    <input type="text" name="isbasvuru_form_askerlikdurumu" class="form-control" value="<?=$info->isbasvuru_form_askerlikdurumu?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Yapıldı Alanı</label>
                                    <input type="text" name="isbasvuru_form_yapildi" class="form-control" value="<?=$info->isbasvuru_form_yapildi?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Yapılmadı Alanı</label>
                                    <input type="text" name="isbasvuru_form_yapilmadi" class="form-control" value="<?=$info->isbasvuru_form_yapilmadi?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Tecilli Alanı</label>
                                    <input type="text" name="isbasvuru_form_tecilli" class="form-control" value="<?=$info->isbasvuru_form_tecilli?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Muaf Alanı</label>
                                    <input type="text" name="isbasvuru_form_muaf" class="form-control" value="<?=$info->isbasvuru_form_muaf?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>İş Deneyimi Alanı</label>
                                    <input type="text" name="isbasvuru_form_isdeneyimi" class="form-control" value="<?=$info->isbasvuru_form_isdeneyimi?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Çalıştığı Firma Alanı</label>
                                    <input type="text" name="isbasvuru_form_calistigifirma" class="form-control" value="<?=$info->isbasvuru_form_calistigifirma?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Çalışma Süresi Alanı</label>
                                    <input type="text" name="isbasvuru_form_calismasuresi" class="form-control" value="<?=$info->isbasvuru_form_calismasuresi?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Ayrılma Nedeni Alanı</label>
                                    <input type="text" name="isbasvuru_form_ayrilmanedeni" class="form-control" value="<?=$info->isbasvuru_form_ayrilmanedeni?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Görev / Ünvan Alanı</label>
                                    <input type="text" name="isbasvuru_form_gorevunvan" class="form-control" value="<?=$info->isbasvuru_form_gorevunvan?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Eğitim Bilgileri Alanı</label>
                                    <input type="text" name="isbasvuru_form_egitimbilgileri" class="form-control" value="<?=$info->isbasvuru_form_egitimbilgileri?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Eğitim Durumu Alanı</label>
                                    <input type="text" name="isbasvuru_form_egitimdurumu" class="form-control" value="<?=$info->isbasvuru_form_egitimdurumu?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Lisans Alanı</label>
                                    <input type="text" name="isbasvuru_form_egitimlisans" class="form-control" value="<?=$info->isbasvuru_form_egitimlisans?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Lisansüstü Alanı</label>
                                    <input type="text" name="isbasvuru_form_egitimlisansustu" class="form-control" value="<?=$info->isbasvuru_form_egitimlisansustu?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Doktora Alanı</label>
                                    <input type="text" name="isbasvuru_form_egitimdoktora" class="form-control" value="<?=$info->isbasvuru_form_egitimdoktora?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Lise Alanı</label>
                                    <input type="text" name="isbasvuru_form_egitimlise" class="form-control" value="<?=$info->isbasvuru_form_egitimlise?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>İlkokul Alanı</label>
                                    <input type="text" name="isbasvuru_form_egitimilkokul" class="form-control" value="<?=$info->isbasvuru_form_egitimilkokul?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Okul Adı Alanı</label>
                                    <input type="text" name="isbasvuru_form_okuladi" class="form-control" value="<?=$info->isbasvuru_form_okuladi?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Yabancı Dil Alanı</label>
                                    <input type="text" name="isbasvuru_form_yabancidil" class="form-control" value="<?=$info->isbasvuru_form_yabancidil?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Okuma - Yazma Alanı</label>
                                    <input type="text" name="isbasvuru_form_okumayazma" class="form-control" value="<?=$info->isbasvuru_form_okumayazma?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Anlama - Konusma Alanı</label>
                                    <input type="text" name="isbasvuru_form_anlamakonusma" class="form-control" value="<?=$info->isbasvuru_form_anlamakonusma?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Çeviri</label>
                                    <input type="text" name="isbasvuru_form_ceviri" class="form-control" value="<?=$info->isbasvuru_form_ceviri?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Orta Alanı</label>
                                    <input type="text" name="isbasvuru_form_orta" class="form-control" value="<?=$info->isbasvuru_form_orta?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>İyi Alanı</label>
                                    <input type="text" name="isbasvuru_form_iyi" class="form-control" value="<?=$info->isbasvuru_form_iyi?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Çok İyi Alanı</label>
                                    <input type="text" name="isbasvuru_form_cokiyi" class="form-control" value="<?=$info->isbasvuru_form_cokiyi?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Bilgisayar Kullanım Bilginiz	</label>
                                    <input type="text" name="isbasvuru_form_bilgisayar" class="form-control" value="<?=$info->isbasvuru_form_bilgisayar?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Katıldığınız Kurs ve Seminerler</label>
                                    <input type="text" name="isbasvuru_form_kurs" class="form-control" value="<?=$info->isbasvuru_form_kurs?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Başvuru yaptığınız pozisyon</label>
                                    <input type="text" name="isbasvuru_form_pozisyon" class="form-control" value="<?=$info->isbasvuru_form_pozisyon?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Daha önce şirketimizde çalıştınız mı?</label>
                                    <input type="text" name="isbasvuru_form_dahaonce" class="form-control" value="<?=$info->isbasvuru_form_dahaonce?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Başka bir şehirde / ülkede çalışır mısınız?</label>
                                    <input type="text" name="isbasvuru_form_baskasehir" class="form-control" value="<?=$info->isbasvuru_form_baskasehir?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Referanslarınız</label>
                                    <input type="text" name="isbasvuru_form_referans" class="form-control" value="<?=$info->isbasvuru_form_referans?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Üye olduğunuz Dernek ve Kuruluşlar</label>
                                    <input type="text" name="isbasvuru_form_uyeoldugunuz" class="form-control" value="<?=$info->isbasvuru_form_uyeoldugunuz?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Staj Bilgileriniz</label>
                                    <input type="text" name="isbasvuru_form_staj" class="form-control" value="<?=$info->isbasvuru_form_staj?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Eklemek İstedikleriniz Alanı</label>
                                    <input type="text" name="isbasvuru_form_eknot" class="form-control" value="<?=$info->isbasvuru_form_eknot?>">
                                </div>
                            </div>
                            <div class="col-md-6" style="display: none;">
                                <h3>Hizmet Başvuru Formu</h3>
                                <div class="form-group col-md-6">
                                    <label>Hizmet Başvuru Formu Başlığı</label>
                                    <input type="text" name="hizmetbasvuru_form_title" class="form-control" value="<?=$info->hizmetbasvuru_form_title?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Hizmet Başvuru Formu İçerik Yazısı</label>
                                    <input type="text" name="hizmetbasvuru_form_content" class="form-control" value="<?=$info->hizmetbasvuru_form_content?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Firma Adı Alanı</label>
                                    <input type="text" name="hizmetbasvuru_form_firmaadi" class="form-control" value="<?=$info->hizmetbasvuru_form_firmaadi?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Posta Kodu Alanı</label>
                                    <input type="text" name="hizmetbasvuru_form_postakodu" class="form-control" value="<?=$info->hizmetbasvuru_form_postakodu?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Firma Vergi Dairesi Alanı</label>
                                    <input type="text" name="hizmetbasvuru_form_firmavd" class="form-control" value="<?=$info->hizmetbasvuru_form_firmavd?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Firma Vergi Dairesi No Alanı</label>
                                    <input type="text" name="hizmetbasvuru_form_firmavno" class="form-control" value="<?=$info->hizmetbasvuru_form_firmavno?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Ünvan Alanı</label>
                                    <input type="text" name="hizmetbasvuru_form_unvan" class="form-control" value="<?=$info->hizmetbasvuru_form_unvan?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>İletişime Geçilecek Kişi Alanı</label>
                                    <input type="text" name="hizmetbasvuru_form_iletisimkisi" class="form-control" value="<?=$info->hizmetbasvuru_form_iletisimkisi?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Güvenlik Bilgi Formu Hakkında Bilgi Veren Kişi Alanı</label>
                                    <input type="text" name="hizmetbasvuru_form_bilgiverenkisi" class="form-control" value="<?=$info->hizmetbasvuru_form_bilgiverenkisi?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Güvenlik Bilgi Formu Hakkında Bilgi Veren Kişi Eğer Alanı</label>
                                    <input type="text" name="hizmetbasvuru_form_bilgiverenkisieger" class="form-control" value="<?=$info->hizmetbasvuru_form_bilgiverenkisieger?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Talep Edilen Hizmet Detay Alanı</label>
                                    <input type="text" name="hizmetbasvuru_form_hizmetdetay" class="form-control" value="<?=$info->hizmetbasvuru_form_hizmetdetay?>">
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

