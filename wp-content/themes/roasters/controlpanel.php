<?php
//Original Framework http://theundersigned.net/2006/06/wordpress-how-to-theme-options/ 
//Updated and added additional options by Jeremy Clark
//http://clarktech.no-ip.com/
//Updated and added additional options by Mike Pippin -9/11/2009
//http://split-visionz.net/2009/wordpress-theme-options-framework-updated/

$themename = "Spoerer Valdes Theme";
$shortname = "spoerervaldes";
$options = array (
   
    array(  "name" => "Footer Area",
            "desc" => "Fonos y direccion",
            "id" => $shortname."_footer_area",
            "std" => "",
            "type" => "textarea")
            
     
);

function mytheme_add_admin() {

    global $themename, $shortname, $options;

    if ( $_GET['page'] == basename(__FILE__) ) {
    
        if ( 'save' == $_REQUEST['action'] ) {

                foreach ($options as $value) {
                    update_option( $value['id'], $_REQUEST[ $value['id'] ] ); }

                foreach ($options as $value) {
					if(($value['type'] === "checkbox" or $value['type'] === "multiselect" ) and is_array($_REQUEST[ $value['id'] ])){$_REQUEST[ $value['id'] ]=implode(',',$_REQUEST[ $value['id'] ]);}
                    if( isset( $_REQUEST[ $value['id'] ] ) ) { update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); } else { delete_option( $value['id'] ); } }

                header("Location: themes.php?page=controlpanel.php&saved=true");
                die;

        } else if( 'reset' == $_REQUEST['action'] ) {

            foreach ($options as $value) {
                delete_option( $value['id'] ); 
                update_option( $value['id'], $value['std'] );}

            header("Location: themes.php?page=controlpanel.php&reset=true");
            die;

        }
    }

    add_theme_page($themename." Options", "Current Theme Options", 'edit_themes', basename(__FILE__), 'mytheme_admin');

}

function mytheme_admin() {

    global $themename, $shortname, $options;

    if ( $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings saved.</strong></p></div>';
    if ( $_REQUEST['reset'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings reset.</strong></p></div>';
    
?>
<div class="wrap">
<h2><?php echo $themename; ?> settings</h2>

<form method="post">

<table class="optiontable">

<?php foreach ($options as $value) { 
    
if ($value['type'] == "text") { ?>
  <tr valign="middle"> 
        <th scope="top" style="text-align:left;"><?php echo $value['name']; ?>:</th>
	<?php if(isset($value['desc'])){?>
	</tr>
	<tr valign="middle"> 
		<td style="width:40%;"><?php echo $value['desc']?></td>
	<?php } ?>
        <td>
        <input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_settings( $value['id'] ) != "") { echo get_settings( $value['id'] ); } else { echo $value['std']; } ?>" size="40" />
    </td>
</tr>
<tr><td colspan=2><hr /></td></tr>
<?php } elseif ($value['type'] == "select") { ?>
<tr valign="middle"> 
        <th scope="top" style="text-align:left;"><?php echo $value['name']; ?>:</th>
	<?php if(isset($value['desc'])){?>
	</tr>
	<tr valign="middle"> 
		<td style="width:40%;"><?php echo $value['desc']?></td>
	<?php } ?>
        <td>
            <select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
                <?php foreach ($value['options'] as $option) { ?>
                <option<?php if ( get_settings( $value['id'] ) == $option) { echo ' selected="selected"'; }?>><?php echo $option; ?></option>
                <?php } ?>
            </select>
        </td>
    </tr>
<tr><td colspan=2><hr /></td></tr>
<?php } elseif ($value['type'] == "multiselect") { ?>
<tr valign="middle"> 
        <th scope="top" style="text-align:left;"><?php echo $value['name']; ?>:</th>
	<?php if(isset($value['desc'])){?>
	</tr>
	<tr valign="middle"> 
		<td style="width:40%;"><?php echo $value['desc']?></td>
	<?php } ?>
        <td>		
            <select  multiple="multiple" size="3" name="<?php echo $value['id']; ?>[]" id="<?php echo $value['id']; ?>" style="height:50px;">
                <?php $ch_values=explode(',',get_settings( $value['id'] )); foreach ($value['options'] as $option) { ?>
                <option<?php if ( in_array($option,$ch_values)) { echo ' selected="selected"'; }?> value="<?php echo $option; ?>"><?php echo $option; ?></option>
                <?php } ?>
            </select>		
        </td>
    </tr>
<tr><td colspan=2><hr /></td></tr>

<?php } elseif ($value['type'] == "radio") { ?>
<tr valign="middle"> 
        <th scope="top" style="text-align:left;"><?php echo $value['name']; ?>:</th>
	<?php if(isset($value['desc'])){?>
	</tr>
	<tr valign="middle"> 
		<td style="width:40%;"><?php echo $value['desc']?></td>
	<?php } ?>
        <td>
		<?php foreach ($value['options'] as $option) { ?>
			<?php echo $option; ?><input name="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php echo $option; ?>" <?php if ( get_settings( $value['id'] ) == $option) { echo 'checked'; } ?>/>|
		<?php } ?>
        </td>
    </tr>
<tr><td colspan=2><hr /></td></tr>
<?php } elseif ($value['type'] == "textarea") { ?>
<tr valign="middle"> 
        <th scope="top" style="text-align:left;"><?php echo $value['name']; ?>:</th>
	<?php if(isset($value['desc'])){?>
	</tr>
	<tr valign="middle"> 
		<td style="width:40%;"><?php echo $value['desc']?></td>
	<?php } ?>
        <td>
            <textarea name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" cols="40" rows="5"/><?php if ( get_settings( $value['id'] ) != "") { echo get_settings( $value['id'] ); } else { echo $value['std']; } ?></textarea>
		</td>
    </tr>
<tr><td colspan=2><hr /></td></tr>

<?php } elseif ($value['type'] == "checkbox") { ?>

    <tr valign="middle"> 
        <th scope="top" style="text-align:left;"><?php echo $value['name']; ?>:</th>
	<?php if(isset($value['desc'])){?>
	</tr>
	<tr valign="middle"> 
		<td style="width:40%;"><?php echo $value['desc']?></td>
	<?php } ?>
        <td>
		<?php 
		$ch_values=explode(',',get_settings( $value['id'] ));
		foreach ($value['options'] as $option) { 
		echo $option; ?><input name="<?php echo $value['id']; ?>[]" type="<?php echo $value['type']; ?>" value="<?php echo $option; ?>" <?php if ( in_array($option,$ch_values)) { echo 'checked'; } ?>/>|
		<?php } ?>

        </td>
    </tr>
<tr><td colspan=2><hr /></td></tr>
<?php } ?>
<?php 
}
?>
</table>
<p class="submit">
<input name="save" type="submit" value="Save changes" />    
<input type="hidden" name="action" value="save" />
</p>
</form>
<form method="post">
<p class="submit">
<input name="reset" type="submit" value="Reset" />
<input type="hidden" name="action" value="reset" />
</p>
</form>
<h2>Preview (updated when options are saved)</h2>
<iframe src="../?preview=true" width="100%" height="600" ></iframe>
<h4>Theme Option page for <?php echo $themename; ?>&nbsp; | &nbsp; Framework by <a href="http://clarktech.no-ip.com/" title="Jeremy Clark">Jeremy Clark</a></h4>
<?php
}
add_action('admin_menu', 'mytheme_add_admin'); ?>
