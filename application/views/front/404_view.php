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
								<?php echo "<li><a href='".$menu->slug."'>$menu->menu_name<i class='fas fa-chevron-down'></i></a>";?>
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
									<?php if($menu->slug == "sustainability") {echo "<li class='sustainability'><a href='".$menu->slug."'>$menu->menu_name</a></li>";} else {?>
								<?php echo "<li><a href='".$menu->slug."'>$menu->menu_name</a></li>"; } }?>						
						<?php } ?>
					</ul>
				</div>
				<div class="language">
					<div class="btn">
						<div class="flag"><img src="assets/front/images/tr.png"></div>
						<div class="name">TR<i class="fas fa-chevron-down"></i></div>
					</div>
					<div class="list">
						<a href="#"><img src="assets/front/images/en.png"> EN</a>
						<a href="#"><img src="assets/front/images/es.png"> ES</a>
						<a href="#"><img src="assets/front/images/it.png"> IT</a>
						<a href="#"><img src="assets/front/images/fr.png"> FR</a>
					</div>
				</div>
				<div class="catalog">
					<a href="#"><div>PRODUCT <span>CATALOG</span></div></a>
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
						<div class="title">ADDRESS</div>
						<?php echo $contact[0]->hidden_address; ?>
					</div>
					<div class="item">
						<div class="title">CONTACT NUMBER</div>
						<p>Tel:  <?php echo $contact[0]->phone; ?></p>
						<p>Fax:  <?php echo $contact[0]->fax; ?></p>
						<p>Mob:  <?php echo $contact[0]->mobile; ?></p>
					</div>
					<div class="item">
						<div class="title">SOCIAL</div>
						<ul class="social">
							<?php foreach($socials as $social) {?>
								<li><a href="<?=$social->url?>"><i class="fab fa-<?=$social->icon?>"></i></a></li>
							<?php }?>
						</ul>
					</div>
					<div class="action">
						<a href="contact">GET IN TOUCH</a>
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
									<?php } else { echo "<li><a href='".$menu->slug."'>$menu->menu_name</a></li>"; } ?>					
							<?php } ?>
						</ul>
					</div>
					<div class="catalog">
						<a href="#"><div>PRODUCT <span>CATALOG</span></div></a>
					</div>
				</div>
			</div>
			
			<section>
				
				<div class="page-title">
					<div class="anime leaf-2"></div>
					<div class="bg" style="background-image:url(assets/front/images/page-title-bg.jpg)"></div>
					<div class="down" onclick="scrollSection($('.content-start'), 80)"></div>
					<div class="container">
						<h1>Page not Found</h1>
					</div>
				</div>
				
				<div class="page-not-found content-start">
					<div class="container">
						<div class="number">
							<img src="assets/front/images/404.png">
						</div>
						<div class="text">
							<p>
								Sorry, the page you wanted to visit was not found!
							</p>
							<p>
								If you wish, you can return to the <a href="#">homepage</a> or <a href="#">contact us</a> from the contact page.
							</p>
						</div>
						<div class="action">
							<a href="#">Back to Home</a>
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
							<h3>Contact For Inquiry</h3>
							<a href="#">CONTACT US</a>
						</div>
					</div>
				</div>
				
			</section>
			
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
													<?php } else { echo "<li><a href='".$menu->slug."'>$menu->menu_name</a></li>"; } ?>					
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
											<li>All Rights Reserved. &copy;2020</li>
											<li><a href="#">Terms & Privacy Policy</a></li>
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
		
		<script src="assets/front/js/jquery-3.3.1.min.js"></script>
		<script src="assets/front/js/jquery.fancybox.min.js"></script>
		<script src="assets/front/js/slick.min.js"></script>
		<script src="assets/front/js/scrollmagic/greensock/TweenMax.min.js"></script>
		<script src="assets/front/js/scrollmagic/ScrollMagic.min.js"></script>
		<script src="assets/front/js/scrollmagic/plugins/animation.gsap.js"></script>
		<script src="assets/front/js/scrollmagic/plugins/debug.addIndicators.js"></script>
		<script src="assets/front/js/custom.js?v=1"></script>
	</body>
</html>