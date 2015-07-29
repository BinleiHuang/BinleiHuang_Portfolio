<!doctype html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js ie6 oldie" <?php language_attributes(); ?> > <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" <?php language_attributes(); ?> > <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" <?php language_attributes(); ?> "> <![endif]-->
<!-- Consider adding an manifest.appcache: h5bp.com/d/Offline -->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?> > <!--<![endif]-->
<head>
	<meta charset="<?php bloginfo('charset'); ?>">

	<title><?php wp_title('|', true, 'right'); bloginfo('name'); ?> Portfolio</title>

	<!-- Mobile viewport optimized: j.mp/bplateviewport -->

<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<!-- Favicon and Feed -->
	<link rel="shortcut icon" type="image/png" href="http://wpmmp.bmcc.cuny.edu/~bhuang/portfolio/wp-content/uploads/2015/03/shortcut.jpg">
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> Feed" href="<?php echo home_url(); ?>/feed/">
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url') ?>">

    <?php wp_head(); ?>

  <script type="text/javascript">
		$(document).ready(function() {
			$('#fullpage').fullpage({
				anchors: [ 'secondPage', '3rdPage'],
				sectionsColor: [ '#1BBC9B', '#7E8F7C'],
				navigation: true,
				navigationPosition: 'right',
				navigationTooltips: ['First page', 'Second page', 'Third and last page']
			});
		});
	</script>

</head>

<body <?php body_class('antialiased'); ?>>


<header class="main-header">

    <div class="row">
        <div class="large-12 medium-12 small-12 columns">
            <div class="title-area">

                <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>">BinleiHuang</a></h1>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="small-12 medium-12 large-12 columns">

                <nav class="nav">

                        <ul>
                            <li><a href="photography">Photography</a>
                            </li>
                            <li><a href="design">Design</a>
                            </li>
                            <li><a href="about=">About</a>
                            </li>
                            <li><a href="contact">Contact</a>
                            </li>
                        </ul>

                </nav>

        </div>
    </div>

    <hr/>

</header>

<!-- Start the main container -->
<div class="container" role="document">
