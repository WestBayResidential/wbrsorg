<?php
require_once( 'settings.php' );
global $shortcode_output;
$popup = trim( $_GET['popup'] );
$shortcode = create_shortcode( $popup );

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head></head>
    <body>
        <div id="popup-window">
            <div style="padding: 25px">
                <div style="float: left;<?php if ($popup == 'tabbed' || $popup == 'accordion') {echo 'width:100%';}elseif($popup == 'button'|| $popup == 'list' || $popup == 'dropcap' || $popup == 'infobox') {echo 'width:65%';}?>">
                    <form method="post" id="popup-form">
                        <table id="popup-table" <?php if ($popup == 'tabbed' || $popup == 'accordion') {echo 'style="width:100%"';}?>>
                            <?php echo $shortcode_output ?>
                            <tbody>
                                <tr style="height: 30px;">
                                    <td class="field" ><a href="#" class="button insert" ><?php _e("Insert Shortcode", 'tkingdom')?></a></td>
                                </tr>
                            </tbody>
                        </table>
                    </form>
                </div>
                <div style="float:right;width: 230px;">
                    <?php if ($popup == 'button') { ?>
                        <iframe src="<?php echo TK_SHORTCODE_URL ?>preview.php?sc=" width="230" frameborder="0" id="sk-preview"></iframe>
                    <?php } ?>
                    <?php if ($popup == 'list') { ?>
                        <iframe src="<?php echo TK_SHORTCODE_URL ?>preview.php?sc=" width="230" frameborder="0" id="sk-preview"></iframe>
                    <?php } ?>
                    <?php if ($popup == 'dropcap') { ?>
                        <iframe src="<?php echo TK_SHORTCODE_URL ?>preview.php?sc=" width="230" frameborder="0" id="sk-preview"></iframe>
                    <?php } ?>
                    <?php if ($popup == 'infobox') { ?>
                        <iframe src="<?php echo TK_SHORTCODE_URL ?>preview.php?sc=" width="230" frameborder="0" id="sk-preview"></iframe>
                    <?php } ?>
                </div>
                <div class="clear"></div>
            </div>
        </div>
    </body>
</html>