<!doctype html>
<html lang="tr">
	<head>
		<title><?=str_replace('[PageTitle]', mb_convert_case($info[0]->menu_name, MB_CASE_TITLE, "UTF-8") , $seo->title)?></title>
		<meta name="keywords" content="<?=str_replace('[PageTitle]', mb_convert_case($info[0]->menu_name, MB_CASE_TITLE, "UTF-8") , $seo->keywords)?>" />
		<meta name="description" content="<?=str_replace('[PageTitle]', mb_convert_case($info[0]->menu_name, MB_CASE_TITLE, "UTF-8") , $seo->description)?>" />
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
										<?php if($this->uri->segment(1) == $menu->slug){ echo "<li><a class='active' href='".$menu->slug."'>$menu->menu_name</a></li>";?>
										<?php } else{ if($menu->slug == 'main'){echo "<li><a href='".base_url()."'>$menu->menu_name</a></li>";}else{echo "<li><a href='".base_url().$menu->slug."'>$menu->menu_name</a></li>";}}?>
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
								<li><a target="_blank" href="<?=$social->url?>"><i class="fab fa-<?=$social->icon?>"></i></a></li>
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
										<?php foreach ($submenus as $submenu) { echo "<li><a href='product/".$submenu->slug."'>$submenu->sub_menu_name</a></li>"; } ?>
									</ul>
									<?php } else { if($menu->slug == 'main'){echo "<li><a href='".base_url()."'>$menu->menu_name</a></li>";}else{echo "<li><a href='".base_url().$menu->slug."'>$menu->menu_name</a></li>";} } ?>					
							<?php } ?>
						</ul>
					</div>
					<div class="catalog">
					<a target="_blank" href="<?=$catalogs[0]->image?>"><div><?=$catalogs[0]->product?> <span><?=$catalogs[0]->catalog?></span></div></a>
					</div>
				</div>
			</div>
			
			<section>
				
				<div class="page-title">
					<div class="anime leaf-2"></div>
					<div class="bg" style="background-image:url(<?=base_url()?><?=$pageslider[0]->image?>)"></div>
					<div class="down" onclick="scrollSection($('.content-start'), 80)"></div>
					<div class="container">
							<?php foreach($menus as $menu){ if($menu->slug == $this->uri->segment(1)) {?>
								<h1><?=mb_convert_case($menu->menu_name, MB_CASE_TITLE, "UTF-8")?></h1>
							<?php } }?>
					</div>
				</div>
				
				<div class="contact-us content-start">
					<div class="container">
						<div class="row">
							<div class="col-sm-12 col-md-6">
								<div class="info">
									<div class="content">
										<h2><?=$statics[0]->contactinfo?></h2>
										<p>
											<i class="fas fa-map-marker-alt"></i> <?php echo $contact[0]->address?>
										</p>
										<p>
											<i class="fas fa-phone"></i> <?php echo $contact[0]->phone?>
										</p>
										<p>
											<i class="fas fa-print"></i> <?php echo $contact[0]->fax?>
										</p>
										<p>
											<i class="far fa-envelope"></i> <a href="mailto:info@selcup.com.tr"><?php echo $contact[0]->email?></a>
										</p>
									</div>
								</div>
							</div>
							<div class="col-sm-12 col-md-6">
								<div class="form">
									<h2><?=$statics[0]->contactform?></h2>
									<form id="contact-form" action="<?=base_url()?>ajax/contact_form"  method="post"  >
									<div class="label"><?=$statics[0]->name?></div>
									<div class="input"><input type="text" name="name" class="textbox" required></div>
									<!--<div class="error-label"><i class="fas fa-exclamation-triangle"></i> please fill the name surname</div>-->
									<div class="label"><?=$statics[0]->subject?></div>
									<div class="input"><input type="text" name="subject" class="textbox" required></div>
									<div class="label"><?=$statics[0]->message?></div>
									<div class="input"><textarea class="textarea" name="message" required></textarea></div>
									<div class="agree">
										<label class="checkbox">
											<input type="checkbox">
											<span class="control"></span>
											<span class="name"><?=$statics[0]->ihaveread?> <a href="#agreeContent" data-fancybox><?=$terms[1]->name?></a></span>
										</label>
									</div>
									<div class="submit"><input id="checkBtn" type="submit" class="button" value="SEND"></div>
									</form>     
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<div class="world-map">
					<div class="container">
						<h3><?=$statics[0]->selcup?></h3>
						<div class="map">
							<div id="vmap"></div>
						</div>
					</div>
				</div>
				
				<div class="popup-content" id="agreeContent">
					<h3><?=$terms[1]->name?></h3>
					<?=$terms[1]->content?>
				</div>
				
				<!--<div class="main-contact">
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
				</div>-->
				
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
													<?php } else { if($menu->slug == 'main'){echo "<li><a href='".base_url()."'>$menu->menu_name</a></li>";}else{echo "<li><a href='".base_url().$menu->slug."'>$menu->menu_name</a></li>";} } ?>					
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
		
		<link rel="stylesheet" href="<?=base_url()?>assets/front/map/jqvmap.min.css">
		<script src="<?=base_url()?>assets/front/map/jquery.vmap.min.js"></script>
		<script src="<?=base_url()?>assets/front/map/maps/jquery.vmap.world.js"></script>
		<script src="<?=base_url()?>assets/front/map/jquery.vmap.sampledata.js"></script>
		<script type="text/javascript">
			function escapeXml(string) {
				return string.replace(/[<>]/g, function (c) {
				  switch (c) {
					case '<': return '\u003c';
					case '>': return '\u003e';
				  }
				});
			}
			jQuery(document).ready(function () {
				var pins = {
					tr: escapeXml('<div class="map-pin"></div>'),
					hr: escapeXml('<div class="map-pin"></div>'),
					eg: escapeXml('<div class="map-pin"></div>'),
					de: escapeXml('<div class="map-pin"></div>'),
					es: escapeXml('<div class="map-pin"></div>'),
					fr: escapeXml('<div class="map-pin"></div>'),
					ru: escapeXml('<div class="map-pin"></div>'),
					ro: escapeXml('<div class="map-pin"></div>'),
					sa: escapeXml('<div class="map-pin"></div>')
				};
				jQuery('#vmap').vectorMap({
					map: 'world_en',
					pins: pins,
					backgroundColor: '#ffffff',
					color: '#be9c79',
					selectedColor: null,
					hoverColor: null,
					enableZoom: false,
					showTooltip: true,
					colors: {
						it: '#623623',
						es: '#623623',
						pt: '#623623',
						fr: '#623623',
						de: '#623623',
						nl: '#623623',
						lv: '#623623',
						at: '#623623',
						si: '#623623',
						hr: '#623623',
						ch: '#623623',
						ro: '#623623',
						cz: '#623623',
						hu: '#623623',
						sk: '#623623',
						rs: '#623623',
						al: '#623623',
						bg: '#623623',
						ru: '#623623',
						ma: '#623623',
						sa: '#623623',
						ae: '#623623',
						qa: '#623623',
						tr: '#623623',
						eg: '#623623',
						ba: '#623623',
						mk: '#623623'
					},
					onResize: function (element, width, height) {
						console.log('Map Size: ' +  width + 'x' +  height);
					}
				});

				
			});
		</script>	
		<script type="text/javascript">
			$(document).ready(function () {
				$('#checkBtn').click(function() {
				checked = $("input[type=checkbox]:checked").length;

				if(!checked) {
					alert("You must check checkbox.");
					return false;
				}

				});
			});

		</script>
	</body>
</html>