<!doctype html>
<html lang="tr">
	<head>
		<title><?=str_replace('[PageTitle]', mb_convert_case($info[0]->sub_menu_name, MB_CASE_TITLE, "UTF-8") , $seo->title)?></title>
		<meta name="keywords" content="<?=str_replace('[PageTitle]', mb_convert_case($info[0]->sub_menu_name, MB_CASE_TITLE, "UTF-8") , $seo->keywords)?>" />
		<meta name="description" content="<?=str_replace('[PageTitle]', mb_convert_case($info[0]->sub_menu_name, MB_CASE_TITLE, "UTF-8") , $seo->description)?>" />
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="format-detection" content="telephone=no">
		<title>Selcup</title>
		<link rel="shortcut icon" type="image/x-icon" href="<?=base_url()?>assets/front/images/favicon.ico">
		<!--[if lt IE 9]><script src="<?=base_url()?>assets/front/js/html5shiv.min.js"></script><![endif]-->
		<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="<?=base_url()?>assets/front/css/fonts.css">
		<link rel="stylesheet" href="<?=base_url()?>assets/front/css/fontawesome-all.min.css">
		<link rel="stylesheet" href="<?=base_url()?>assets/front/css/jquery.fancybox.min.css">
		<link rel="stylesheet" href="<?=base_url()?>assets/front/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?=base_url()?>assets/front/css/styles.css?v=1">
		<link rel="stylesheet" href="<?=base_url()?>assets/front/css/responsive.css?v=1">
	</head>
	<body>
		
		<div class="wrap">
			<header>
				<div class="contact-btn">
					<a><span></span><span></span><span></span></a>
				</div>
				<div class="logo">
				<a href="<?=base_url()?>">Selcup</a>
				</div>
				<div class="menu">
					<ul>
						<?php foreach ($menus as $menu) { ?>
							<?php if ($menu->is_submenu == 1) { ?>
								<?php if($this->uri->segment(2) == $menu->slug){ echo "<li><a class='active' href='".$menu->slug."'>$menu->menu_name<i class='fas fa-chevron-down'></i></a>";?>
								<?php } else{ echo "<li><a href='".base_url().$menu->slug."'>$menu->menu_name<i class='fas fa-chevron-down'></i></a>";}?>
								<?php echo "<div class='product-submenu'>";?>
								<?php echo "<div class='product-submenu-list'>";?>
								<?php foreach ($submenus as $submenu) { 
									echo "<div class='item'>";
									 echo "<a href='".$submenu->slug."'>";
									 echo "<div class='photo'><img src='".base_url().$submenu->image."'></div>";
											echo "<div class='name'>$submenu->sub_menu_name</div>";
											echo "</a></div>"; } ?>
											<?php echo "</div></div></li>"; ?>
								<?php } else { ?>
									<?php if($menu->slug == "sustainability") {echo "<li class='sustainability'><a href='".base_url().$menu->slug."'>$menu->menu_name</a></li>";} else {?>
								<?php if($menu->slug == 'main'){echo "<li><a href='".base_url()."'>$menu->menu_name</a></li>";}else{echo "<li><a href='".base_url().$menu->slug."'>$menu->menu_name</a></li>";} } }?>						
						<?php } ?>
					</ul>
				</div>
				<div class="language">
					<div class="btn">
						<div class="flag"><img src="<?=base_url()?>assets/front/images/tr.png"></div>
						<div class="name">TR<i class="fas fa-chevron-down"></i></div>
					</div>
					<div class="list">
						<a href="#"><img src="<?=base_url()?>assets/front/images/en.png"> EN</a>
						<a href="#"><img src="<?=base_url()?>assets/front/images/es.png"> ES</a>
						<a href="#"><img src="<?=base_url()?>assets/front/images/it.png"> IT</a>
						<a href="#"><img src="<?=base_url()?>assets/front/images/fr.png"> FR</a>
					</div>
				</div>
				<div class="catalog">
				<a href="<?=base_url()?><?=$catalogs[0]->image?>"><div><?=$catalogs[0]->product?> <span><?=$catalogs[0]->catalog?></span></div></a>
				</div>
				<div class="menu-btn">
					<a><span></span><span></span><span></span></a>
				</div>
			</header>
			
			<div class="contact-section hidden">
				<div class="contact-content">
					<div class="menu">
						<?php foreach ($submenus as $submenu) {?>
							<?php echo '<a href="'.$submenu->slug.'">'.$submenu->sub_menu_name.'</a>'; ?>
						<?php }?>
					</div>
					<div class="item">
						<div class="title"><?=$statics[0]->adres?></div>
						<?php echo $contact[0]->hidden_address; ?>
					</div>
					<div class="item">
						<div class="title"><?=$statics[0]->contactnumber?></div>
						<p>Tel:  <?php echo $contact[0]->phone; ?></p>
						<p>Fax:  <?php echo $contact[0]->fax; ?></p>
						<p>Mob:  <?php echo $contact[0]->mobile; ?></p>
					</div>
					<div class="item">
						<div class="title"><?=$statics[0]->social?></div>
						<ul class="social">
							<?php foreach($socials as $social) {?>
								<li><a href="<?=$social->url?>"><i class="fab fa-<?=$social->icon?>"></i></a></li>
							<?php }?>
						</ul>
					</div>
					<div class="action">
						<a href="<?=base_url()?>contact"><?=$statics[0]->getintouch?></a>
					</div>
				</div>
			</div>
			
			<div class="mobile-menu-section hidden">
				<div class="mobile-menu-content">
					<div class="language">
						<ul>
							<li><a href="#" class="active">TR</a></li>
							<li><a href="#">EN</a></li>
							<li><a href="#">DE</a></li>
						</ul>
					</div>
					<div class="menu">
						<ul>
							<?php foreach ($menus as $menu) { ?>
								<?php if ($menu->is_submenu == 1) { ?>
									<?php echo "<li><a class='toggle'>$menu->menu_name<i class='fas fa-chevron-down'></i></a>";?>
									<ul>
										<?php foreach ($submenus as $submenu) { echo "<li><a href='".$submenu->slug."'>$submenu->sub_menu_name</a></li>"; } ?>
									</ul>
									<?php } else { if($menu->slug == 'main'){ echo "<li><a href='".base_url()."'>$menu->menu_name</a></li>";}else{ echo "<li><a href='".base_url().$menu->slug."'>$menu->menu_name</a></li>";} } ?>					
							<?php } ?>
						</ul>
					</div>
					<div class="catalog">
					<a target="_blank" href="<?=base_url()?><?=$catalogs[0]->image?>"><div><?=$catalogs[0]->product?> <span><?=$catalogs[0]->catalog?></span></div></a>
					</div>
				</div>
			</div>
			
			<section>
				
				<div class="page-title">
					<div class="anime leaf-2"></div>
					<div class="bg" style="background-image:url(<?=base_url()?><?=$pageslider[0]->image?>)"></div>
					<div class="down" onclick="scrollSection($('.content-start'), 80)"></div>
					<div class="container">
						<h1><?php echo $cupsname[0]->name;?></h1>
					</div>
				</div>
				
				<div class="product-description content-start">
					<div class="anime bean-1"></div>
					<div class="anime leaf-3"></div>
					<div class="container">
						<?php echo $cupstatic[0]->statement;?>
					</div>
				</div>
				
				<div class="product-detail">
					<div class="anime bean-2"></div>
					<div class="anime bean-3"></div>
					<div class="anime bean-4"></div>
					<div class="anime leaf-1"></div>
					<div class="content">
						<div class="product-menu">
							<div class="container">
								<ul>
									<?php foreach ($cupsname as $cupname )  { if ($cupname->slug == $this->uri->segment(2)) {?>
									<?php echo "<li><a href='$cupname->slug' class='active'>$cupname->name</a></li>"; ?>
									<?php }else echo "<li><a href='$cupname->slug'>$cupname->name</a></li>";} ?>
								</ul>
							</div>
						</div>
						<div class="product-tab">
							<div class="product-tab-left">
								<div class="product-subtitle">
									<h3><?=$statics[0]->cupsize?></h3>
								</div>
								<div class="tab-menu">
									<?php foreach($cupssize as $cupsize) { if ($cupsize->cup_name_id == '1') {?>
										<?php echo "<a href='#productSize".$cupsize->id."'>"; ?>
											<?php echo "<div class='item'>"; ?>
												<?php echo "<div class='photo'><img src='".base_url()."".$cupsname[0]->image."' height='60'></div>";?>
												<?php echo "<div class='name'>$cupsize->name</div>";?>
											<?php echo "</div>";?>
										<?php echo '</a>';?>
									<?php } }?>
									<div class="certificate-detail">
										<img src="<?=base_url()?>uploads/pefc-lodsago.png" height="40" alt="">
										<img src="<?=base_url()?>uploads/compostable.jpg" height="40" alt="">
										<img src="<?=base_url()?>uploads/FSC_C155919_Promotional_with_text_Portrait_WhiteOnGreen_tm_EPsKbe.png" height="40" alt="">
									</div>
								</div>
							</div>
							<div class="product-tab-right">
								<?php foreach($cupssize as $cupsize) { if ($cupsize->cup_name_id == 1) {?>
									<?php echo '<div id="productSize'.$cupsize->id.'" class="tab-content">';?>
										<?php echo '<div class="product-inner">';?>
											<?php echo '<div class="product-gallery">';?>
												<h2><?php echo $cupsname[0]->name;?></h2>
												<?php echo '<div class="slider">';?>
													<?php echo '<div class="item"><img src="'.base_url().''.$cupsname[0]->image.'"></div>';?>
													<!--<?php echo '<div class="item"><img src="'.base_url().''.$cupsname[0]->image.'"></div>';?>-->
												<?php echo '</div>';?>
											<?php echo '</div>';?>
											<?php echo '<div class="product-info">';?>
												<?php echo '<div class="product-subtitle">';?>
													<?php echo '<h3>'.$statics[0]->specification.'</h3>';?>
												<?php echo '</div>';?>
												<?php echo '<ul>';?>
													<?php echo '<li>'.$statics[0]->capacity.': <span>'.$cupsize->capacity.'</span></li>';?>
													<?php echo '<li>'.$statics[0]->product_code.': <span>'.$cupsize->product_code.'</span></li>';?>
													<?php echo '<li>'.$statics[0]->height.': <span>'.$cupsize->height.'</span></li>';?>
													<?php echo '<li>'.$statics[0]->brim_diameter.':	<span>'.$cupsize->brim_diameter.'</span></li>';?>
													<?php echo '<li>'.$statics[0]->pack_quantity.': <span>'.$cupsize->pack_quantity.'</span></li>';?>
													<?php echo '<li>'.$statics[0]->case_quantity.': <span>'.$cupsize->case_quantity.'</span></li>';?>
													<?php echo '<li>'.$statics[0]->specification.': <span>'.$cupsize->specification.'</span></li>';?>
													<li><?=$statics[0]->usage_place ?> <?php if($cupsize->status == 1) echo '<img src='.base_url().$cupsize->usage_place.' class="icon-img" height="30">'; ?><?php if($cupsize->status2 == 1) echo '<img src='.base_url().$cupsize->usage_place2.' class="icon-img" height="30">'; ?></li>
													<!--<?php echo '<li>'.$statics[0]->usage_place.': <img src='.base_url().$cupsize->usage_place.' class="icon-img" height="30"> <img src='.base_url().$cupsize->usage_place2.' class="icon-img" height="30"></li>';?>-->
													<?php if($cupsize->status == 1) echo '<p style="font-size:10px">'.$cupsize->content.'</p>';?>
													<?php if($cupsize->status2 == 1) echo '<p style="font-size:10px">'.$cupsize->content2.'</p>';?>
												<?php echo '</ul>';?>
												<?php echo '<div class="catalog">';?>
													<?php echo '<a href="'.base_url().$cupsize->catalog.'"><div><span>'.$catalogs[0]->product.'</span> '.$catalogs[0]->catalog.'<i class="fas fa-chevron-right"></i></div></a>';?>
												<?php echo '</div>';?>
											<?php echo '</div>';?>
										<?php echo '</div>';?>
									<?php echo '</div>';?>												
								<?php } }?>
							</div>
						</div>
					</div>
				</div>
				
				<div class="product-concept-info">
					<div class="content">
						<div class="anime leaf-2"></div>
						<div class="anime leaf-4"></div>
						<div class="product-concept-info-left">
							<h3><?php echo $cupsname[0]->name;?></h3>
							<?php echo $cupstatic[1]->statement;?>
							<a href="#"><?=$statics[0]->discover?></a>
						</div>
						<div class="product-concept-info-right" style="background-image:url(<?=base_url()?><?=$cupslider[0]->image?>)"></div>
					</div>
				</div>
				
				<div class="product-features">
					<div class="left">
						<div class="list">
						<?php foreach($features as $feature){ if($feature->position == 0) {?>
								<?php echo '<div class="item">';?>		
									<?php echo '<div class="icon"><img src="'.base_url().$feature->image.'"></div>';?>	
									<?php echo '<div class="info">';?>
										<?php echo '<h4>'.$feature->title.'</h4>';?>
										<?php echo $feature->content?>	
									<?php echo '</div>';?>
								<?php echo '</div>';?>				
						<?php } }?>
							
						</div>
					</div>
					<div class="center">
						<div class="cup">
							<img src="<?=base_url()?>assets/front/images/intro-cup-2.png">
							<div class="parallax">							
								<div class="p-item coffee"><img src="<?=base_url()?>assets/front/images/intro-coffee-1.png"></div>
								<div class="p-item milk"><img src="<?=base_url()?>assets/front/images/intro-coffee-2.png"></div>
							</div>
						</div>
					</div>
					<div class="right">
						<div class="list">
							<?php foreach($features as $feature){ if($feature->position == 1) {?>
								<?php echo '<div class="item">';?>		
									<?php echo '<div class="icon"><img src="'.base_url().$feature->image.'"></div>';?>	
									<?php echo '<div class="info">';?>
										<?php echo '<h4>'.$feature->title.'</h4>';?>
										<?php echo $feature->content?>	
									<?php echo '</div>';?>
								<?php echo '</div>';?>				
							<?php } }?>
							
						</div>
					</div>					
				</div>
				
				<div class="main-contact">
					<div class="anime leaf-5"></div>
					<div class="content">
						<div class="anime bean-2"></div>
						<div class="anime bean-3"></div>
						<div class="anime bean-4"></div>
						<div class="container">
							<h3><?=$statics[0]->contactforinquiry?></h3>
							<a href="<?=base_url()?>contact"><?=$statics[0]->contactus?></a>
						</div>
					</div>
				</div>
				
			</section>
			<div class="popup-content" id="termsandprivacy">
					<h3><?=$terms[0]->name?></h3>
					<?=$terms[0]->content?>
			</div>
			<footer>
				<div class="anime leaf-4"></div>
				<div class="footer-content">
					<div class="footer-top">
						<div class="container">
							<div class="row">
								<div class="col-sm-12 col-md-3 col-lg-2">
									<div class="logo">
										<img src="<?=base_url()?>assets/front/images/logo-light.png">
									</div>
								</div>
								<div class="col-sm-12 col-md-6 col-lg-8">
								<div class="menu">
										<ul>
											<?php foreach ($menus as $menu) { ?>
												<?php if ($menu->is_submenu == 1) { ?>
													<?php echo "<li><a href='".$menu->slug."'>$menu->menu_name</a>";?>
													<ul>
														<?php foreach ($submenus as $submenu) { echo "<li><a href='".$submenu->slug."'>$submenu->sub_menu_name</a></li>"; } ?>
													</ul>
													<?php } else { if($menu->slug == 'main'){ echo "<li><a href='".base_url()."'>$menu->menu_name</a></li>";}else{ echo "<li><a href='".base_url().$menu->slug."'>$menu->menu_name</a></li>";} } ?>					
											<?php } ?>
										</ul>
									</div>
								</div>
								<div class="col-sm-12 col-md-3 col-lg-2">
									<div class="social">
										<ul>
										<?php foreach($socials as $social) {?>
											<li><a href="<?=$social->url?>"><i class="fab fa-<?=$social->icon?>"></i></a></li>
										<?php }?>
										</ul>
									</div>
								</div>
							</div>							
						</div>
					</div>
					<div class="footer-bottom">
						<div class="container">
							<div class="row">
								<div class="col-sm-12 col-md-6">
									<div class="copyright">
										<ul>
											<li><?=$statics[0]->allrightsreserved?> &copy;2020</li>
											<li><a href="#termsandprivacy" data-fancybox><?=$terms[0]->name?></a></li>
										</ul>
									</div>
								</div>
								<div class="col-sm-12 col-md-6">
									<div class="sm724">
										<a href="http://www.sm724.com/" target="_blank">by SM724</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</footer>
		</div>
		
		<div class="overlay"></div>
		
		<script src="<?=base_url()?>assets/front/js/jquery-3.3.1.min.js"></script>
		<script src="<?=base_url()?>assets/front/js/jquery.fancybox.min.js"></script>
		<script src="<?=base_url()?>assets/front/js/slick.min.js"></script>
		<script src="<?=base_url()?>assets/front/js/scrollmagic/greensock/TweenMax.min.js"></script>
		<script src="<?=base_url()?>assets/front/js/scrollmagic/ScrollMagic.min.js"></script>
		<script src="<?=base_url()?>assets/front/js/scrollmagic/plugins/animation.gsap.js"></script>
		<script src="<?=base_url()?>assets/front/js/scrollmagic/plugins/debug.addIndicators.js"></script>
		<script src="<?=base_url()?>assets/front/js/custom.js?v=1"></script>
	</body>
</html>