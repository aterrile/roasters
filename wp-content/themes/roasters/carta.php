<?php
/**
 * Template Name: Carta
 *
 */

get_header(); 
while( have_posts() ) : the_post();
?>

<section id="carta">
    <div class="container">
        <div class="row no-margin">    
            <div class="col-lg-3 col-md-12">                
                <ul class="sidebar_menu">
                    <li> <a href="#cafes" class="scrollTo"> cafes </a> </li>
                    <li> <a href="#te-organico" class="scrollTo"> té orgánico </a> </li>
                    <li> <a href="#para-comer" class="scrollTo"> para comer </a> </li>
                </ul>
            </div>
            <div class="col-lg-9 col-md-12">
                <div class="content">
                    <div id="cafes">                    
                        <h3> cafés </h3>
                        <?php 
                        $args = array(
                            'post_type' => 'cartas',
                            'p' => 94
                        );
                        $q = new WP_Query( $args );
                        while( $q->have_posts() ) : $q->the_post();
                            while( have_rows('cafes') ): the_row();                            
                            $foto = get_sub_field('foto');
                            ?>
                            <div class="col-lg-3 col-md-4 col-sm-12">
                                <div class="cafe_item">
                                    <h4> <?php the_sub_field('titulo') ?> </h4>
                                    <img src="<?php echo $foto['url'] ?>" width="98" height="124" />                                    
                                </div>
                            </div>
                        <?php 
                            endwhile;
                        endwhile; 
                        ?>
                    </div>                                        
                    
                    <br class="clear" />                    
                    <div id="te-organico">
                        <h3> Té Orgánico </h3>
                        <div class="row no-margin">
                        
                            <?php 
                            $args = array(
                                'post_type' => 'cartas',
                                'p' => 97
                            );
                            $q = new WP_Query( $args );                            
                            while( $q->have_posts() ) : $q->the_post();
                                $total_rows = count( get_field('tes_organicos') );
                                $div = round( $total_rows / 2 );                                
                                $i = 0;
                                ?>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                <?php
                                while( have_rows('tes_organicos') ): the_row();
                                
                                if( $i == $div ){                                                            
                                ?>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                <?php } ?>
                                    <div>
                                        <strong><?php the_sub_field('titulo'); ?></strong>
                                        <?php the_sub_field('descripcion'); ?>
                                    </div>    
                                                                
                            <?php 
                                $i++;
                                endwhile; 
                            ?>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    </div>
                    
                    <br class="clear" />
                    <div id="para-comer">
                        <h3> PARA COMER </h3>
                        <?php 
                        $args = array(
                            'post_type' => 'cartas',
                            'p' => 98
                        );
                        $q = new WP_Query( $args );
                        while( $q->have_posts() ) : $q->the_post();
                            while( have_rows('item_repeater') ): the_row();
                            $imagen = get_sub_field('imagen');                                                            
                            ?>
                            <div class="col-lg-4 col-md-12">
                                <a href="#" data-toggle="collapse" data-target="#<?php echo slugify(get_sub_field('titulo')) ?>">
                                    <img src="<?php echo $imagen['url'] ?>" width="182" height="182" />
                                    <strong><?php the_sub_field('titulo') ?></strong>
                                </a>
                            </div>
                        <?php 
                            endwhile;
                        endwhile; 
                        ?>
                        
                        <br class="clear" />
                        
                        <?php 
                        $arr_titulos = array();
                                                
                        $q = new WP_Query( array( 'post_type' => 'cartas', 'p' => 98 ) );
                        while( $q->have_posts() ) : $q->the_post();                            
                            while( have_rows('item_repeater') ): the_row();
                                $arr_titulos[] = get_sub_field('titulo');    
                            endwhile;
                        endwhile;
                            
                        $args = array(
                            'post_type' => 'cartas',
                            'p' => 98
                        );
                        $q = new WP_Query( $args );
                        while( $q->have_posts() ) : $q->the_post();                            
                            while( have_rows('item_repeater') ): the_row();
                            ?>                            
                            <div id="<?php echo slugify(get_sub_field('titulo')) ?>" class="collapse">
                                <h3>    
                                    <?php 
                                    foreach( $arr_titulos as $tit ){
                                        if( $tit == get_sub_field('titulo') ){
                                            echo "/ " . $tit."\n";
                                        } else {
                                            echo '<a href="#" data-toggle="collapse" data-target="#'. slugify($tit) .'"> / '. $tit .' </a>'."\n";
                                        }
                                        
                                    }
                                    ?>
                                </h3>
                                
                                <h2> <?php echo get_sub_field('titulo') ?> </h2>
                                
                                <div class="row no-margin">
                                    <div class="col-lg-6 col-md-12 subrepeater">
                                    <?php 
                                    $total_rows2 = count( get_sub_field('contenido_repeater') );                                    
                                    $divi = round( $total_rows2 / 2 );                                                                    
                                    $j = 0;
                                    while( have_rows('contenido_repeater') ): the_row();
                                    if( $j == $divi ){
                                        ?>
                                        </div>
                                        <div class="col-lg-6 col-md-12 subrepeater">
                                        <?php
                                    }
                                    ?>                                    
                                        <h5> <?php echo get_sub_field('titulo_sub_repeater') ?> </h5>
                                         <?php echo get_sub_field('contenido_sub_repeater') ?>                                     
                                    <?php 
                                    $j++;
                                    endwhile; 
                                    ?>                                    
                                    </div>
                                </div>
                            </div>
                            
                        <?php 
                            endwhile;
                        endwhile; 
                        ?>
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                    </div>
                    
                    
                    
                </div>          
            </div>    
        </div>
    </div>    
</section>

<?php 
endwhile;
get_footer(); 
?>
