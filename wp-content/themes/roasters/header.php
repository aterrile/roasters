<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?php bloginfo('template_url'); ?>/images/favicon.ico" type="image/x-icon">

    <title>
        <?php
    	/*
    	 * Print the <title> tag based on what is being viewed.
    	 */
    	global $page, $paged;
    
    	wp_title( '|', true, 'right' );
    
    	// Add the blog name.
    	bloginfo( 'name' );
    
    	// Add the blog description for the home/front page.
    	$site_description = get_bloginfo( 'description', 'display' );
    	if ( $site_description && ( is_home() || is_front_page() ) )
    		echo " | $site_description";
    
    	// Add a page number if necessary:
    	if ( $paged >= 2 || $page >= 2 )
    		echo ' | ' . sprintf( __( 'Page %s', 'twentyten' ), max( $paged, $page ) );
    
    	?>
    </title>
    
    <link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/img/favicon.ico" type="image/x-icon" />
    <!-- Bootstrap Core CSS -->
    <link href="<?php bloginfo('template_url'); ?>/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Plugin CSS -->
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/vendor/font-awesome/css/font-awesome.min.css">
    
    <!-- Theme CSS -->
    <link href="<?php bloginfo('template_url'); ?>/style.css?ver=1.<?php echo uniqid() ?>" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    <!-- jQuery -->
    <script src="<?php bloginfo('template_url'); ?>/vendor/jquery/jquery.min.js"></script>
    
    <?php wp_head(); ?>

    
    
</head>

<body <?php body_class() ?>>

    <header>
        <nav id="mainNav" class="navbar navbar-default">
            
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span> <i class="fa fa-bars"></i>
                        </button>
                        <div class="container">
                            <a class="navbar-brand" href="<?php bloginfo('wpurl'); ?>"><?php bloginfo('site_name') ?></a>
                        </div>
                    </div>
                </div>
    
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <?php wp_nav_menu( array( 'menu' => 'MainMenu', 'container' => '', 'menu_class' => 'nav navbar-nav' ) ) ?>
                </div>
            <!-- /.container-fluid -->
        </nav>
        <div class="tag">
            <p> <a href="<?php bloginfo('wpurl'); ?>/login"><strong>inicia sesión</strong></a> o <a href="<?php bloginfo('wpurl'); ?>/registro">crea una cuenta</a> </p>
            <p class="black"> 
                <strong>ítems</strong> en el carro <em>0</em> 
                <a href="#">
                    <img src="<?php bloginfo('template_url'); ?>/images/carro.png" width="26" height="23" />
                </a>  
            </p>
        </div>
    </header>