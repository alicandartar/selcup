<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class=" text-center">
                <img src="<?=base_url()?>assets/admin/dist/img/administrator.png" width="50" class="img-thumbnail img-responsive" alt="User Image" >
            </div>
            <div class="text-center">
                <span style="color:#fff; font-size: 11px !important;"><?=$user_info["Username"]?></span>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="treeview <?=$this->uri->segment(2) == 'dashboard' ? 'active' : ''?>">
                <a href="<?=base_url()?>admin/dashboard">
                    <i class="fa fa-dashboard"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="treeview <?=$this->uri->segment(2) == 'slider' ? 'active' : ''?>">
                <a href="#">
                    <i class="fa fa-file-image-o"></i>
                    <span>Slider</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?=base_url()?>admin/slider"><i class="fa fa-circle-o"></i>Anasayfa Sliderlar</a></li>
                    <li><a href="<?=base_url()?>admin/otherslider"><i class="fa fa-circle-o"></i>Diğer Sayfa Sliderlar</a></li>
                    <!--<li><a href="<?=base_url()?>admin/slider/add"><i class="fa fa-circle-o"></i> Slider Ekle</a></li>-->
                </ul>
            </li>
            <li class="treeview <?=$this->uri->segment(2) == 'mainproduct' ? 'active' : ''?>">
                <a href="#">
                    <i class="fa fa-product-hunt"></i>
                    <span>Ürün</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?=base_url()?>admin/mainproduct"><i class="fa fa-circle-o"></i>Ana Ürünler(Bardak Tipleri)</a></li>
                    <li><a href="<?=base_url()?>admin/product"><i class="fa fa-circle-o"></i> Alt Ürünler(Bardak Boyutları)</a></li>
                    <li><a href="<?=base_url()?>admin/features"><i class="fa fa-circle-o"></i> Ürün Özellikler Kısmı(Features)</a></li>
                    <li><a href="<?=base_url()?>admin/cupstatics"><i class="fa fa-circle-o"></i> Ürün Sayfaları Statik Açıklamalar</a></li>
                    <li><a href="<?=base_url()?>admin/cupslider"><i class="fa fa-circle-o"></i> Ürün Sayfaları Sayfa İçi Slider</a></li>
                    <!--<li><a href="<?=base_url()?>admin/product/add"><i class="fa fa-circle-o"></i> Slider Ekle</a></li>-->
                </ul>
            </li>
            <!--<li class="treeview <?=$this->uri->segment(2) == 'page' ? 'active' : ''?>">
                <a href="#">
                    <i class="fa fa-file-o"></i>
                    <span>Sayfa</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?=base_url()?>admin/page"><i class="fa fa-circle-o"></i> Sayfalar</a></li>
                    <li><a href="<?=base_url()?>admin/page/add"><i class="fa fa-circle-o"></i> Sayfa Ekle</a></li>
                </ul>
            </li>-->
            <li class="treeview <?=$this->uri->segment(2) == 'news' ? 'active' : ''?>">
                <a href="#">
                    <i class="fa fa-newspaper-o"></i>
                    <span>Haber</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?=base_url()?>admin/news"><i class="fa fa-circle-o"></i> Haberler</a></li>
                    <li><a href="<?=base_url()?>admin/news/add"><i class="fa fa-circle-o"></i> Haber Ekle</a></li>
                </ul>
            </li>
            <li class="treeview <?=$this->uri->segment(2) == 'about' ? 'active' : ''?>">
                <a href="#">
                    <i class="fa fa-briefcase"></i>
                    <span>Hakkımızda</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?=base_url()?>admin/about"><i class="fa fa-circle-o"></i>Hakkımızda</a></li>
                    <li><a href="<?=base_url()?>admin/certificate"><i class="fa fa-circle-o"></i> Sertifikalar</a></li>
                </ul>
            </li>
            <li class="treeview <?=$this->uri->segment(2) == 'sustainability' ? 'active' : ''?>">
                <a href="#">
                    <i class="fa fa-leaf"></i>
                    <span>Sürdürülebilirlik</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?=base_url()?>admin/sustainability"><i class="fa fa-circle-o"></i>Sürdürülebilirlik</a></li>
                    <!--<li><a href="<?=base_url()?>admin/certificate"><i class="fa fa-circle-o"></i> Sertifikalar</a></li>-->
                </ul>
            </li>
            <li class="treeview <?=$this->uri->segment(2) == 'contact' ? 'active' : ''?>">
                <a href="#">
                    <i class="fa fa-address-card-o"></i>
                    <span>İletişim</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?=base_url()?>admin/contact"><i class="fa fa-circle-o"></i>İletişim</a></li>
                    <li><a href="<?=base_url()?>admin/social_settings"><i class="fa fa-circle-o"></i> Sosyal Medya Ayarları</a></li>
                    <li><a href="<?=base_url()?>admin/terms"><i class="fa fa-circle-o"></i> Şartlar ve Gizlilik Politikası</a></li>
                    <li><a href="<?=base_url()?>admin/catalog"><i class="fa fa-circle-o"></i> Ürün Kataloğu</a></li>
                    <li><a href="<?=base_url()?>admin/statik"><i class="fa fa-circle-o"></i> Sayfalarda Statik Alanlar</a></li>
                    <!--<li><a href="<?=base_url()?>admin/certificate"><i class="fa fa-circle-o"></i> Sertifikalar</a></li>-->
                </ul>
            </li>
            <!--<li class="treeview <?=$this->uri->segment(2) == 'photo' ? 'active' : ''?>">
                <a href="#">
                    <i class="fa fa-picture-o"></i>
                    <span>Foto Galeri</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?=base_url()?>admin/photo"><i class="fa fa-circle-o"></i> Fotoğraflar</a></li>
                    <li><a href="<?=base_url()?>admin/photo/add"><i class="fa fa-circle-o"></i> Fotoğraf Ekle</a></li>
                </ul>
            </li>-->
            <li class="treeview <?=$this->uri->segment(2) == 'seo' ? 'active' : ''?>">
                <a href="<?=base_url()?>admin/seo/edit/1">
                    <i class="fa fa-search"></i>
                    <span>Seo</span>
                </a>
            </li>
            <li class="treeview <?=$this->uri->segment(2) == 'page' ? 'active' : ''?>">
                <a href="<?=base_url()?>admin/page">
                    <i class="fa fa-file"></i>
                    <span>Yeni Menu Açıklamaları</span>
                </a>
            </li>
            <li class="treeview <?=$this->uri->segment(2) == 'filemanager' ? 'active' : ''?>">
                <a href="<?=base_url()?>admin/filemanager">
                    <i class="fa fa-folder-open"></i>
                    <span>Dosya</span>
                </a>
            </li>
            <!--<li class="treeview">
                <a href="<?=base_url()?>en/admin/dashboard" target="_blank">
                    <i class="fa fa-sign-out"></i>
                    <span><img src="http://www.sagliklogistics.com/en/assets/front/images/flag/en.png" width="18" alt=""> &nbsp; İngilizce Admin Paneli</span>
                </a>
            </li>
            <li class="treeview">
                <a href="<?=base_url()?>it/admin/dashboard" target="_blank">
                    <i class="fa fa-sign-out"></i>
                    <span><img src="http://www.sagliklogistics.com/en/assets/front/images/flag/it.png" width="18" alt=""> &nbsp; İtalyanca Admin Paneli</span>
                </a>
            </li>-->
            <li class="treeview">
                <a href="<?=base_url()?>admin/dashboard/logout">
                    <i class="fa fa-sign-out"></i>
                    <span>Çıkış Yap</span>
                </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>