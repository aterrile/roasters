<?php
/**
 * Template Name: Homepage
 *
 */


get_header(); 
while( have_posts() ) : the_post();
$arr_pines = array();
$args = array(
    'post_type' => 'pins_home',
    'posts_per_page' => -1
);
$frase_home = get_field('frase_home');
$query = new WP_Query( $args );
while( $query->have_posts() ) : $query->the_post();
    $image_id = get_post_thumbnail_id( get_the_ID() );
    $thumb = wp_get_attachment_image_src($image_id,'home_pin');
    $src = $thumb[0]; 
    $arr_pines[] = array(
        'titulo' => get_the_title(),
        'contenido' => get_the_content(),
        'slug' => slugify(get_the_title()),
        'thumb' => $src,
        'x' => get_field('posicion_x'),
        'y' => get_field('posicion_y')
    );
endwhile;
?>
<section id="home">
    <div class="row no-margin">
        <div class="col-lg-12">
            <div class="mapa_container">
                <div class="container">
                    <div class="frase">
                        <?php echo $frase_home; ?>
                    </div>
                </div>
                <img src="<?php bloginfo('template_url'); ?>/images/mapa.png" class="mapa img-responsive" />
                <?php foreach( $arr_pines as $pin ){?>
                <a href="#<?php echo $pin['slug'] ?>" class="marker" style="left: <?php echo $pin['x'] ?>%;top: <?php echo $pin['y'] ?>%;"></a>         
                <?php } ?>            
                <div class="inner_fade">                            
                    <ul class="home_bottom">
                        <li>  
                            <div class="info">
                                <h3> Nueva Tostadora </h3>
                                <img src="<?php bloginfo('template_url'); ?>/images/cafetero_small.png" />
                                <p>
                                Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh
                                euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad
                                minim veniam, quis nostrud exerci tatio.
                                </p>
                            </div>
                        </li>
                        <li>  
                            <div class="info">
                                <h3> Ya Abrimos! </h3>
                                <img src="<?php bloginfo('template_url'); ?>/images/taza_small.png" />
                                <p>
                                Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh
                                euismod tincidunt ut laoreet dolore magna.
                                </p>
                            </div>
                        </li>
                    </ul>                                        
                </div>
            </div>
        </div>    
    </div>    
</section>
<div class="tooltips">
    <?php foreach( $arr_pines as $pin ){?>
    <div id="<?php echo $pin['slug'] ?>" class="item">
        <div class="thumb">
            <img src="<?php echo $pin['thumb'] ?>" width="138" height="79" />
        </div>
        <div class="dash"></div>
        <br class="clear" />
        <h3> <?php echo $pin['titulo'] ?> </h3>
        <?php echo $pin['contenido'] ?>
    </div>
    <?php } ?>
</div>
<?php 
endwhile;
get_footer(); 
?>