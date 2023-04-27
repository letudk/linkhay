<?php
/**
 * Header Card
 **/
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta name="viewport" content="width=device-width">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<header>
    <nav class="navbar sticky-top">
      <div class="container">
		<div class = "navbar-brand logo">
			<?php $logo = get_template_directory_uri().'/assets/images/logo.png'; 
					$options = get_option('cms_options');
					if($options) :   if($options['logo_url']) :

					 $logo = $options['logo_url']; 
					 endif; 
					 endif; ?>
			<a alt="Logo <?php echo get_site_url(); ?>" href="<?php echo get_bloginfo('url') ?>" rel="home">
				<img alt="Logo <?php echo get_site_url(); ?>" height="50" src="<?php echo $logo;?>">
			</a>
		</div>
		<div class = "search-form">
			<!-- tim kiem -->
			<form method="get" action="<?php bloginfo('url'); ?>" class = "compact-search">
				<div style="display:flex; width: 100%;">
					<button style="padding: 17px 0px 17px 0px;background: var(--menu-mobile);width:50px" title="<?php _e('Tìm kiếm', 'linkhay'); ?>" type="submit"><i class="fas fa-search"></i></button>
					<input id="otim" style="padding: 17px 0px 17px 0px; width: 100%;" placeholder="<?php _e('Nhập từ khoá tìm kiếm', 'linkhay'); ?>" type="text" name="s" value="" maxlength="50" required="required" />
					
				</div>
			</form>
		</div>
		<div class = "user-menu" style="display:flex">
			<button id = "bell" ><i class="fa fa-bell" aria-hidden="true"></i></button>
			<!-- notifcation -->
			<div class="notifications" id="box">
				<h2>Notifications - <span>2</span></h2>
				<div class="notifications-item"> <img src="https://i.imgur.com/uIgDDDd.jpg" alt="img">
					<div class="text">
						<h4>Samso aliao</h4>
						<p>Samso Nagaro Like your home work</p>
					</div>
				</div>
				<div class="notifications-item"> <img src="https://img.icons8.com/flat_round/64/000000/vote-badge.png" alt="img">
					<div class="text">
						<h4>John Silvester</h4>
						<p>+20 vista badge earned</p>
					</div>
				</div>
			</div>
			<!-- end notication -->
			<a ahref="#"><i class="fa fa-user-circle" aria-hidden="true"></i></a>
		</div>
		<!-- Modal -->

        </div>
    </nav>
</header>
