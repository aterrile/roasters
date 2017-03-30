<?php
/**
 * Template Name: Registro
 *
 */

get_header(); 
while( have_posts() ) : the_post();
?>

<section id="login" class="registro">           
    <div id="notepad">
        <div class="row no-margin">            
            <ul class="tabs">
                <li class="active"> <a href="<?php bloginfo('wpurl'); ?>/registro">nuevos usuarios</a> </li>
                <li> <a href="<?php bloginfo('wpurl'); ?>/login">usuarios registrados</a> </li>
            </ul>              
                <form autocomplete="off" method="post">
                    <div class="col-lg-6 col-sm-12">
                        <input type="text" name="user" style="display: none;" />
                        <input type="password" name="password" style="display: none;" />
                        <div class="form-group">
                            <label> email </label>
                            <input type="text" />
                        </div>
                        <div class="form-group">
                            <label> nombre </label>
                            <input type="text" />
                        </div>
                        <div class="form-group">
                            <label> apellido </label>
                            <input type="text" />
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12">
                        <div class="form-group">
                            <label>fecha nacimiento</label>
                            <select> <option></option> </select>
                            <select> <option></option> </select>
                            <select> <option></option> </select>                            
                        </div>
                        <div class="form-group">
                            <div class="col-lg-6 col-sm-6 no-padding">
                                <input type="radio" class="radio" />
                                <strong>MUJER</strong>
                            </div>
                            <div class="col-lg-6 col-sm-6 no-padding">
                                <input type="radio" class="radio" />
                                <strong>HOMBRE</strong>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="boton" value="inscribirme" />
                        </div>
                    </div>
                </form>
            </div>                
        </div>
    </div>
</section>


<?php 
endwhile;
get_footer(); 
?>
