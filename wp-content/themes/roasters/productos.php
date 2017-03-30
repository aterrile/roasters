<?php
/**
 * Template Name: Productos
 *
 */

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
                                        <option value="">Seleccione...</option>
                                        <?php 
                                        while( have_rows('ellije_tu_cafe') ): the_row();
                                            echo '<option value="'. get_sub_field('valor') .'">'. get_sub_field('nombre_visible') .'</option>';
                                        endwhile;
                                        ?>                                        
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label> cantidad: </label>
                                    <select>
                                        <option value="">Seleccione...</option>
                                        <?php 
                                        while( have_rows('cantidad') ): the_row();
                                            echo '<option value="'. get_sub_field('valor') .'">'. get_sub_field('nombre_visible') .'</option>';
                                        endwhile;
                                        ?>                                        
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label> tiempo: </label>
                                    <select>
                                        <option value="">Seleccione...</option>
                                        <?php 
                                        while( have_rows('tiempo') ): the_row();
                                            echo '<option value="'. get_sub_field('valor') .'">'. get_sub_field('nombre_visible') .'</option>';
                                        endwhile;
                                        ?>                                        
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
                                        <option value="">Seleccione...</option>
                                        <?php 
                                        while( have_rows('ellije_tu_cafe') ): the_row();
                                            echo '<option value="'. get_sub_field('valor') .'">'. get_sub_field('nombre_visible') .'</option>';
                                        endwhile;
                                        ?>                                        
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label> cantidad: </label>
                                    <select>
                                        <option value="">Seleccione...</option>
                                        <?php 
                                        while( have_rows('cantidad') ): the_row();
                                            echo '<option value="'. get_sub_field('valor') .'">'. get_sub_field('nombre_visible') .'</option>';
                                        endwhile;
                                        ?>                                        
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label> tiempo: </label>
                                    <select>
                                        <option value="">Seleccione...</option>
                                        <?php 
                                        while( have_rows('tiempo') ): the_row();
                                            echo '<option value="'. get_sub_field('valor') .'">'. get_sub_field('nombre_visible') .'</option>';
                                        endwhile;
                                        ?>                                        
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
                </div>
                <div class="row no-margin">
                    <div id="product-grid">
                        <?php 
                        $args = array(
                            'post_type' => 'shop',
                            'posts_per_page' => -1
                        );
                        $query = new WP_Query( $args );
                        while( $query->have_posts() ) : $query->the_post();
                        $masinfo = get_field('grafica_mas_info');
                        ?>
                        <div class="col-lg-4 col-md-12">
                            <div class="product_item">
                                <a href="#" class="overlay" data-graph="<?php echo $masinfo['url']; ?>">
                                    <?php the_content(); ?>
                                    <?php if($masinfo){ ?>
                                    <span class="plus">+</span>
                                    <?php } ?>
                                </a>
                                <a href="#">
                                    <?php the_post_thumbnail('thumb_producto') ?>
                                </a>
                                <h4> <?php echo "$ " . number_format(get_field('precio'),0,',','.') ?> </h4>
                                <a href="#" class="buy"> comprar <i class="fa fa-caret-right"></i> </a>
                            </div>
                        </div>
                        <?php endwhile; ?>
                    </div>
                </div>            
            </div>    
        </div>
    </div>    
</section>

<?php get_footer(); ?>
