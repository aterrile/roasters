<?php
/**
 * Template Name: Brewing
 *
 */

get_header(); 
while( have_posts() ) : the_post();
?>

<section id="brewing">
    <div class="container">
        <div class="row no-margin">    
            <div class="col-lg-3 col-md-12">                
                <?php wp_nav_menu( array( 'menu' => 'MenuBrewing', 'menu_class' => 'sidebar_menu', 'container' => '' ) ); ?>                
            </div>
            <div class="col-lg-9 col-md-12">
                <div class="content">
                    <?php the_content(); ?>
                </div>          
            </div>    
        </div>
    </div>    
</section>

<div class="video-overlay"></div>
<div id="vimeo"><a href="#" class="close">x</a><div class="inner"></div> </div>

<script> $("#menu-item-43").addClass('current-menu-item'); </script>
<?php 
endwhile;
get_footer(); 
?>
