<!doctype html>
<html lang="tr">
	<head>
		<title><?=str_replace('[PageTitle]', '' , $seo->title)?></title>
		<meta name="keywords" content="<?=str_replace('[PageTitle]', '' , $seo->keywords)?>" />
		<meta name="description" content="<?=str_replace('[PageTitle]', '' , $seo->description)?>" />
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
								<?php echo "<li><a href='product/".$menu->slug."'>$menu->menu_name<i class='fas fa-chevron-down'></i></a>";?>
								<?php echo "<div class='product-submenu'>";?>
								<?php echo "<div class='product-submenu-list'>";?>
								<?php foreach ($submenus as $submenu) { 
									echo "<div class='item'>";
									 echo "<a href='product/".$submenu->slug."'>";
									 echo "<div class='photo'><img src='".base_url().$submenu->image."'></div>";
											echo "<div class='name'>$submenu->sub_menu_name</div>";
											echo "</a></div>"; } ?>
											<?php echo "</div></div></li>"; ?>
								<?php } else { ?>
									<?php if($menu->slug == "sustainability") {echo "<li class='sustainability'><a href='".$menu->slug."'>$menu->menu_name</a></li>";} else {?>
									<?php if($this->uri->segment(1) == $menu->slug || $menu->menu_name == $menuname[0]->menu_name){ echo "<li><a class='active' href='".base_url()."'>$menu->menu_name</a></li>";?>
									<?php } else{ echo "<li><a href='".$menu->slug."'>$menu->menu_name</a></li>";}?>
								<?php } }?>					
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
				<a href="<?=$catalogs[0]->image?>"><div><?=$catalogs[0]->product?> <span><?=$catalogs[0]->catalog?></span></div></a>
				</div>
				<div class="menu-btn">
					<a><span></span><span></span><span></span></a>
				</div>
			</header>
			
			<div class="contact-section hidden">
				<div class="contact-content">
					<div class="menu">
						<?php foreach ($submenus as $submenu) {?>
							<?php echo '<a href="product/'.$submenu->slug.'">'.$submenu->sub_menu_name.'</a>'; ?>
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
						<a href="contact"><?=$statics[0]->getintouch?></a>
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
										<?php foreach ($submenus as $submenu) { echo "<li><a href='product/".$submenu->slug."'>$submenu->sub_menu_name</a></li>"; } ?>
									</ul>
									<?php } else { if($menu->slug == 'main'){echo "<li><a href='".base_url()."'>$menu->menu_name</a></li>";}else{echo "<li><a href='".$menu->slug."'>$menu->menu_name</a></li>";}  } ?>					
							<?php } ?>
						</ul>
					</div>
					<div class="catalog">
					<a target="_blank" href="<?=$catalogs[0]->image?>"><div><?=$catalogs[0]->product?> <span><?=$catalogs[0]->catalog?></span></div></a>
					</div>
				</div>
			</div>
			
			<section>
				
				<div class="main-banner">
					<div class="slider-info"><span></span></div>
					<div class="slider">
						
						<?php foreach($homesliders as $homeslider){ ?>
							<?php echo '<div class="item">'; ?>
								<?php echo '<a href="">'?>
									<?php echo '<div class="bg" style="background-image:url('.base_url().$homeslider->image.')"></div>'; ?>
									<?php echo '<div class="caption">' ;?>
										<?php echo '<div class="container">' ;?>	
											<?php echo $homeslider->statement?>	
										<?php echo '</div>' ;?>
									<?php echo '</div>' ;?>
								<?php echo '</a>'?>
							<?php echo '</div>' ;?>
						<?php }?>
					</div>
					<div class="intro">
						<div class="anime bean-1"></div>
						<div class="item about">
							<div class="text-title"><?php echo $abouts[0]->title;?></div>
							<div class="info">
								<?php echo $abouts[0]->shortdetail; ?>
								<a href="<?php echo $menus[2]->slug;?>"><?=$statics[0]->moreabout?></a>
							</div>
						</div>
						<div class="item sustainability">
							<div>
								<div class="photo-title"><img src="<?=base_url()?>assets/front/images/zero-waste.png"></div>
								<div class="info">
										<p><?=$statics[0]->compostable?></p>
										<a href="<?php echo $menus[3]->slug;?>"><?php echo $menus[3]->menu_name;?></a>
								</div>
							</div>
							<div class="certificate">
								<img src="<?=base_url()?>uploads/pefc-lodsago.png" height="40" alt="">
								<img src="<?=base_url()?>uploads/compostable.jpg" height="40" alt="">
								<img src="<?=base_url()?>uploads/FSC_C155919_Promotional_with_text_Portrait_WhiteOnGreen_tm_EPsKbe.png" height="40" alt="">
							</div>
						</div>
						<div class="item concept">
							<div class="parallax">
								<div class="cup"><img src="<?=base_url()?>assets/front/images/intro-cup.png"></div>
								<div class="p-item coffee"><img src="<?=base_url()?>assets/front/images/intro-coffee-1.png"></div>
								<div class="p-item milk"><img src="<?=base_url()?>assets/front/images/intro-coffee-2.png"></div>
							</div>							
						</div>
					</div>
				</div>
				
				<div class="main-product-category">
					<div class="main-product-category-top">
						<div class="anime bean-2"></div>
						<div class="anime bean-3"></div>
						<div class="anime bean-4"></div>
						<div class="content">
							<div class="container">
								<h1><?=$statics[0]->papercup?></h1>
							</div>
						</div>
					</div>
					<div class="main-product-category-bottom">
						<div class="anime leaf-1"></div>
						<div class="anime leaf-2"></div>
						<div class="container">
							<div class="list">
								<?php foreach ($cups as $cup) {?>
									<?php echo '<div class="item">'; ?>
										<?php echo '<div class="photo"><img src="'.base_url().$cup->image.'"></div>';?>
										<?php echo '<div class="info">'; ?>
											<h3><?php echo $cup->name; ?></h3>
											<?php echo $cup->shortdetail; ?>
											<?php echo '<a href="product/'.$cup->slug.'">'.$statics[0]->findoutmore.'</a>'; ?>
										<?php echo '</div>'; ?>
									<?php echo '</div>'; ?>
								<?php }?>
							</div>
						</div>
					</div>
				</div>
				
				<div class="manufacturing-process">
					<div class="anime leaf-2"></div>
					<div class="anime leaf-3"></div>
					<div class="container">
						<h2><?php echo $processes[1]->section_name?></h2>
						<div class="slider">
							<?php foreach($processes as $process) {?>
								<?php echo '<div class="item">' ;?>
									<?php echo '<div class="icon">' ;?>
										<?php echo '<img src="'.base_url().$process->image.'">' ;?>
										<?php echo '<div class="number">'.$process->sequence.'</div>' ;?>
									<?php echo '</div>' ;?>
									<?php echo '<div class="name">'.$process->title.'</div>' ;?>
								<?php echo '</div>' ;?>
							<?php }?>
						</div>
					</div>
				</div>
				
				<div class="main-product-size">
					<div class="anime leaf-4"></div>
					<div class="content">
						<div class="container-fluid">
							<h2><?=$statics[0]->productsize?></h2>
							<div class="slider">
								<?php foreach($productsizes as $productsize){?>
									<?php echo '<div class="item">' ;?>
										<?php echo '<div class="photo"><img src="'.base_url().$productsize->image.'"></div>' ;?>
										<?php echo '<div class="info">' ;?>
											<p><?php echo $productsize->size ;?></p>
											<?php echo '<ul>' ;?>
												<?php echo '<li>width: <span>'.$productsize->width.'</span></li>' ;?>
												<?php echo '<li>height: <span>'.$productsize->height.'</span></li>' ;?>	
											<?php echo '</ul>' ;?>
											<?php echo '<a href="'.$productsize->slug.'">'.$statics[0]->details.'</a>' ;?>
										<?php echo '</div>' ;?>
									<?php echo '</div>' ;?>
								<?php } ?>
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
							<a href="contact"><?=$statics[0]->contactus?></a>
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
													<?php echo "<li><a href='product/".$menu->slug."'>$menu->menu_name</a>";?>
													<ul>
														<?php foreach ($submenus as $submenu) { echo "<li><a href='product/".$submenu->slug."'>$submenu->sub_menu_name</a></li>"; } ?>
													</ul>
													<?php } else { if($menu->slug == 'main'){ echo "<li><a href='".base_url()."'>$menu->menu_name</a></li>";}else{ echo "<li><a href='".$menu->slug."'>$menu->menu_name</a></li>";} } ?>					
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