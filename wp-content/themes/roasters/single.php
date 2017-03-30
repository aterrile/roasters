<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */
get_header();
if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

<section id="single">
    <div class="container">
        <div class="row no-margin">    
            <div class="col-lg-12 col-md-12">
                <div class="col-lg-10 col-md-8 col-sm-12 no-margin no-padding">
                    <h4 class="date"> <?php echo getNombreMes(get_the_date('n')) ?> <?php echo get_the_date('Y') ?> </h4>
                </div>
                <br class="clear" />
                <h2> <?php the_title(); ?></a> </h2>
                <?php the_content(); ?>
            </div>
            
            <br class="clear" />
            <div style="height: 120px;"></div>
        </div>
    </div>    
</section>    

<?php 
endwhile;
get_footer(); 
?>