<?php
/**
 * This is the sidebar include template.
 *
 * For a quick explanation of b2evo 2.0 skins, please start here:
 * {@link http://manual.b2evolution.net/Skins_2.0}
 *
 * This is meant to be included in a page template.
 *
 * @package evoskins
 * @subpackage kubrick
 */
if( !defined('EVO_MAIN_INIT') ) die( 'Please, do not access this page directly.' );

?>
<div id="sidebar" align="left">

	<ul>
	<?php
		// ------------------------- "Sidebar" CONTAINER EMBEDDED HERE --------------------------
		// Display container contents:
		skin_container( NT_('Sidebar'), array(
				// The following (optional) params will be used as defaults for widgets included in this container:
				// This will enclose each widget in a block:
				'block_start' => '<li class="$wi_class$">',
				'block_end' => '</li>',
				// This will enclose the title of each widget:
				'block_title_start' => '<h2>',
				'block_title_end' => '</h2>',
				// If a widget displays a list, this will enclose that list:
				'list_start' => '<ul>',
				'list_end' => '</ul>',
				// This will enclose each item in a list:
				'item_start' => '<li>',
				'item_end' => '</li>',
				// This will enclose sub-lists in a list:
				'group_start' => '<ul>',
				'group_end' => '</ul>',
				// This will enclose (foot)notes:
				'notes_start' => '<div class="notes">',
				'notes_end' => '</div>',
			) );
		// ----------------------------- END OF "Sidebar" CONTAINER -----------------------------
	?>
	</ul>

	<?php
		// Please help us promote b2evolution and leave this logo on your blog:
		powered_by( array(
				'block_start' => '<div class="powered_by">',
				'block_end'   => '</div>',
				// Check /rsc/img/ for other possible images -- Don't forget to change or remove width & height too
				'img_url'     => 'img/b2evo-tilqi-logo-trans.png',
				'img_width'   => 150,
				'img_height'  => 58,
			) );
	?>
    <div class="validators" align="center">
    <p>
    <a href="http://validator.w3.org/check?uri=referer"><img
        src="img/valid-xhtml10.png"
        alt="Valid XHTML 1.0 Transitional" height="31" width="88" /></a>
  </p>
  
  <p>
    <a href="http://jigsaw.w3.org/css-validator/check?uri=referer&amp;profile=css3">
        <img style="border:0;width:88px;height:31px"
            src="http://jigsaw.w3.org/css-validator/images/vcss"
            alt="Valid CSS!" />
    </a>
</p>

  </div>


</div>
