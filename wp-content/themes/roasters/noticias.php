<?php
/**
 * Template Name: Noticias
 *
 */

get_header(); 
while( have_posts() ) : the_post();

$posts_array = array();
$args = array(
    'posts_per_page' => 4,
    'cat' => 9
);
$query = new WP_Query($args);
while( $query->have_posts() ) : $query->the_post();
    $posts_array[] = array(
        'titulo' => get_the_title(),
        'contenido' => get_the_content(),
        'thumbnail' => get_the_post_thumbnail_url(),
        'permalink' => get_permalink()
    );    
endwhile;

?>

<section id="noticias">
    <div class="container"> 
        <div class="row no-margin">    
            <div class="col-lg-8 col-md-12">
                <div class="col-lg-12 col-md-12">
                    <div data-link="<?php echo $posts_array[0]['permalink']; ?>" class="box half-height main" style="background-image: url(<?php echo $posts_array[0]['thumbnail']; ?>);">
                        <h3> <?php echo $posts_array[0]['titulo']; ?> </h3>
                        <p><?php echo excerpt($posts_array[0]['contenido'],40); ?></p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div data-link="<?php echo $posts_array[1]['permalink']; ?>" class="box half-height">
                        <h3> <?php echo $posts_array[1]['titulo']; ?> </h3>
                        <p><?php echo excerpt($posts_array[1]['contenido'],30); ?></p>
                    </div>                    
                </div>
                <div class="col-lg-6 col-md-12">
                    <div data-link="<?php echo $posts_array[2]['permalink']; ?>" class="box half-height">
                        <h3> <?php echo $posts_array[2]['titulo']; ?> </h3>
                        <p><?php echo excerpt($posts_array[2]['contenido'],30); ?></p>
                    </div>
                </div>
            </div>    
            <div class="col-lg-4 col-md-12">
                <div class="box" data-link="<?php echo $posts_array[3]['permalink']; ?>">
                    <h3> <?php echo $posts_array[3]['titulo']; ?> </h3>
                        <p><?php echo excerpt($posts_array[3]['contenido'],44); ?></p>
                    <p> <img src="<?php echo $posts_array[3]['thumbnail']; ?>" width="207" height="176" /> </p>
                </div>
            </div>            
        </div>
    </div>    
</section>

<script>
$(".box").click(function(){
    location.href = $(this).data('link');
})
</script>

<?php 
endwhile;
get_footer(); 
?>
