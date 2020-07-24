<?php
/**
 * The header for our theme
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <header class="header">
	<div class="container">
            <nav class="navbar navbar-expand-lg">
		<a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"><i class="fas fa-bars"></i></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <?php
                        wp_nav_menu([
                            'theme_location' => 'menu-1',
                            'container' => false,
                            'fallback_cb' => '__return_false',
                            'items_wrap' => '<ul id="%1$s" class="navbar-nav ml-auto">%3$s</ul>',
                            'depth' => 0,
                            'walker' => new Bootstrap_Menu_Walker(),
                        ]);
                    ?>					    
		</div> 
		<div class="social-icon">
                    <ul class="icon-list">
                        <?php 
                            $facebook_icon = esc_attr( get_option( 'facebook_handler' ) );
                            $twitter_icon = esc_attr( get_option( 'twitter_handler' ) );
                            $skype_icon = esc_attr( get_option( 'skype_handler' ) );
                            $linkedin_icon = esc_attr( get_option( 'linkedin_handler' ) );
                        
                            if( !empty( $facebook_icon ) ): ?>
                                 <li class="icon-item">
                                     <a href="<?php echo $facebook_icon;?>"><i class="fab fa-facebook-f"></i></a>
                                 </li>      
                            <?php endif;
                                if( !empty( $twitter_icon ) ): ?>
                                    <li class="icon-item">
                                        <a href="<?php echo $twitter_icon;?>"><i class="fab fa-twitter"></i></a>
                                    </li>
                            <?php endif;
                                if( !empty( $skype_icon ) ): ?>
                                    <li class="icon-item">
                                        <a href="<?php echo $skype_icon;?>"><i class="fab fa-skype"></i></a>
                                    </li>
                            <?php endif;
                                if( !empty( $linkedin_icon ) ): ?>
                                    <li class="icon-item">
                                        <a href="<?php echo $linkedin_icon;?>"><i class="fab fa-linkedin-in"></i></a>
                                    </li>
                            <?php endif;?>
			</li>
                    </ul>
		</div>
            </nav>
	</div>	       
    </header>
		<main class="main">