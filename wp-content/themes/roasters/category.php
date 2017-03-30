<?php
/**
 * The template for displaying Category Archive pages.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */


$cat_id = get_query_var( 'cat' );
get_header(); ?>

<section id="productos">
    <div class="container">
        <div class="row no-margin">    
            <div class="col-lg-3 col-md-12">                
                <ul class="sidebar_menu">
                <?php
                $args = array(
                    'child_of' => 8,
                    'title_li' => '',
                    'order' => 'DESC'
                ); 
                wp_list_categories( $args );
                ?>
                
                    <!-- 
                    <li> <a href="#"> suscripciones </a> </li>
                    <li> <a href="#"> cafes </a> </li>
                    <li> <a href="#"> packs </a> </li>
                    <li> <a href="#"> accesorios </a> </li>
                    -->
                </ul>                
            </div>
            <div class="col-lg-9 col-md-12">
                <div class="row no-margin">
                    <div class="col-lg-6 col-md-12">
                        <a href="#" data-toggle="collapse" data-target="#suscribete" class="select">suscribete ahora <i class="fa fa-caret-down"></i> </a>
                        <div id="suscribete" class="collapse collapsed">
                            <form>
                                <div class="form-group">
                                    <label> elige tu café: </label>
                                    <select>
                                        <option></option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label> cantidad: </label>
                                    <select>
                                        <option></option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label> tiempo: </label>
                                    <select>
                                        <option></option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label> mail: </label>
                                    <input type="text" />
                                </div>
                                <div class="form-group">
                                    <label> clave: </label>
                                    <input type="text" />
                                </div>
                                <div class="form-group">
                                    <span> crea una cuenta <a href="#"><strong>aquí &nbsp; <i class="fa fa-caret-right"></i> </strong></a> </span>
                                </div>
                                
                                <h4> TOTAL: $8.990 </h4>
                                <a href="#" class="buy"> comprar <i class="fa fa-caret-right"></i> </a>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <a href="#" data-toggle="collapse" data-target="#regala" class="select">regala una suscripcion <i class="fa fa-caret-down"></i> </a>
                        <div id="regala" class="collapse collapsed">
                            <form>
                                <div class="form-group">
                                    <label> elige tu café: </label>
                                    <select>
                                        <option></option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label> cantidad: </label>
                                    <select></select>
                                </div>
                                <div class="form-group">
                                    <label> tiempo: </label>
                                    <select></select>
                                </div>
                                <div class="form-group">
                                    <label> mail: </label>
                                    <input type="text" />
                                </div>
                                <div class="form-group">
                                    <label> clave: </label>
                                    <input type="text" />
                                </div>
                                <div class="form-group">
                                    <span> crea una cuenta <a href="#"><strong>aquí &nbsp; <i class="fa fa-caret-right"></i> </strong></a> </span>
                                </div>
                                
                                <h4> TOTAL: $8.990 </h4>
                                <a href="#" class="buy"> comprar <i class="fa fa-caret-right"></i> </a>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="row no-margin">
                    <div id="product-grid">
                        <?php 
                        $query_args = array(
                            'cat' => $cat_id,
                            'post_type' => 'shop'                            
                        ); 
                        $query = new WP_Query( $query_args );
                        while( $query->have_posts() ) : $query->the_post();
                        $grafica_mas_info = get_post_meta(get_the_ID(),'grafica_mas_info',true);                                                
                        $thumb = wp_get_attachment_image_src($grafica_mas_info,'full');
                        $src = $thumb[0];                        
                        ?>
                        <div class="col-lg-4 col-md-12">                             
                            <div class="product_item">
                                <a href="#" class="overlay" data-graph="<?php echo $src; ?>">
                                    <?php the_content(); ?>
                                    <br class="clear" />                                    
                                    <span class="plus">+</span>
                                </a>
                                <a href="#">
                                    <?php the_post_thumbnail('thumb_producto') ?>
                                </a>
                                <h4> 
                                    <?php 
                                    $precio = get_field('precio');
                                    echo "$ " . number_format($precio,0,',','.');
                                    ?> 
                                </h4>
                                <a href="#" class="buy"> comprar <i class="fa fa-caret-right"></i> </a>
                            </div>
                        </div>
                        <?php
                        endwhile;
                        ?>
                    </div>
                </div>            
            </div>    
        </div>
    </div>    
</section>

<?php get_footer(); ?>
