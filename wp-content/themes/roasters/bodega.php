<?php
/**
 * Template Name: Bodega
 *
 */

get_header(); 
while( have_posts() ) : the_post();
?>

<section id="single">
    <div class="container">
        <div class="row no-margin">    
            <div class="col-lg-12 col-md-12">
                <div class="col-lg-10 col-md-8 col-sm-12 no-margin no-padding">
                    <h4 class="date"> SPECIALTY COFFEE </h4>
                </div>
                <br class="clear" />
                <h2> <?php the_title(); ?></a> </h2>
                <?php the_content(); ?>
                <?php the_post_thumbnail('full', array('class'=>'thumb_bodega')) ?>
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
