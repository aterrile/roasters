<?php
/**
 * Template Name: Contacto
 *
 */

get_header(); 
while( have_posts() ) : the_post();
?>

<section id="contacto">           
    <div id="notepad">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="col col1">
                    <?php the_content(); ?>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="col col2">
                    <?php the_field('columna_2') ?>
                </div>
            </div>
        </div>
    </div>
</section>


<?php 
endwhile;
get_footer(); 
?>
