<?php
/**
 * Template Name: Login
 *
 */

get_header(); 
while( have_posts() ) : the_post();
?>

<section id="login">           
    <div id="notepad">
        <div class="row no-margin">            
            <ul class="tabs">
                <li> <a href="<?php bloginfo('wpurl'); ?>/registro">nuevos usuarios</a> </li>
                <li class="active"> <a href="<?php bloginfo('wpurl'); ?>/login">usuarios registrados</a> </li>
            </ul> 
            <div class="col-lg-offset-2 col-lg-8">
                <?php if( @$_GET['req_pass'] ){ ?>
                <form autocomplete="off" method="post" action="<?php bloginfo('wpurl'); ?>/login">
                    <input type="text" name="user" style="display: none;" />
                    <input type="password" name="password" style="display: none;" />
                    <div class="form-group">
                        <p>
                            Ingresa tu email y te enviaremos como<br />
                            recuperar tu contraseña
                        </p>
                        <p>&nbsp;</p>
                        <label> email </label>
                        <input type="text" />
                    </div>                    
                    <div class="form-group">
                        <input type="submit" class="boton" value="enviar" />
                    </div>                                        
                </form>
                <?php } else { ?> 
                <form autocomplete="off" method="post">
                    <input type="text" name="user" style="display: none;" />
                    <input type="password" name="password" style="display: none;" />
                    <div class="form-group">
                        <label> email </label>
                        <input type="text" />
                    </div>
                    <div class="form-group">
                        <label> email </label>
                        <input type="password" />
                    </div>
                    <div class="form-group">
                        <input type="submit" class="boton" value="entrar" />
                    </div>
                    <div class="form-group">
                        <p>&nbsp;</p>
                        <a href="<?php bloginfo('wpurl'); ?>/login/?req_pass=1">Olvidaste tu contraseña?</a>
                    </div>                    
                </form>
                <?php } ?>
            </div>                
        </div>
    </div>
</section>


<?php 
endwhile;
get_footer(); 
?>
