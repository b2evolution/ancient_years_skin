<?php
/**
 * This is the main/default page template.
 *
 * For a quick explanation of b2evo 2.0 skins, please start here:
 * {@link http://manual.b2evolution.net/Skins_2.0}
 *
 * The main page template is used to display the blog when no specific page template is available
 * to handle the request (based on $disp).
 *
 * @package evoskins
 * @subpackage ancient_years v 0.1 by Emin �zlem http://www.cssdizayn.com
 *
 * @version $Id: posts.main.php,v 1.4.2.1 2008/04/26 22:28:54 fplanque Exp $
 */
if( !defined('EVO_MAIN_INIT') ) die( 'Please, do not access this page directly.' );

if( version_compare( $app_version, '2.4.1' ) < 0 )
{ // Older 2.x skins work on newer 2.x b2evo versions, but newer 2.x skins may not work on older 2.x b2evo versions.
	die( 'This skin is designed for b2evolution 2.4.1 and above. Please <a href="http://b2evolution.net/downloads/index.html">upgrade your b2evolution</a>.' );
}

// This is the main template; it may be used to display very different things.
// Do inits depending on current $disp:
skin_init( $disp );


// -------------------------- HTML HEADER INCLUDED HERE --------------------------
skin_include( '_html_header.inc.php' );
// Note: You can customize the default HTML header by copying the generic
// /skins/_html_header.inc.php file into the current skin folder.
// -------------------------------- END OF HEADER --------------------------------
?>

<!--[if IE]><link rel="stylesheet" type="text/css" href="ie.css" /><![endif]-->
<?php
// ------------------------- BODY HEADER INCLUDED HERE --------------------------
skin_include( '_body_header.inc.php' );
// Note: You can customize the default BODY header by copying the generic
// /skins/_body_footer.inc.php file into the current skin folder.
// ------------------------------- END OF FOOTER --------------------------------
?>


<div id="content" class="left">

<?php
	// ------------------------- MESSAGES GENERATED FROM ACTIONS -------------------------
	messages( array(
			'block_start' => '<div class="action_messages">',
			'block_end'   => '</div>',
		) );
	// --------------------------------- END OF MESSAGES ---------------------------------
?>

<?php
	// ------------------------- TITLE FOR THE CURRENT REQUEST -------------------------
	request_title( array(
			'title_before'=> '<h2>',
			'title_after' => '</h2>',
			'title_none'  => '',
			'glue'        => ' - ',
			'title_single_disp' => true,
			'format'      => 'htmlbody',
		) );
	// ------------------------------ END OF REQUEST TITLE -----------------------------
?>
<?php
// Go Grab the featured post:
if( $Item = & get_featured_Item() )
{	// We have a featured/intro post to display:
	// ---------------------- ITEM BLOCK INCLUDED HERE ------------------------
	skin_include( '_item_block.inc.php', array(
			'feature_block' => true,
			'content_mode' => 'auto',		// 'auto' will auto select depending on $disp-detail
			'intro_mode'   => 'normal',	// Intro posts will be displayed in normal mode
			'item_class'   => 'featured_post',
			'image_size'	 =>	'fit-400x320',
		) );
	// ----------------------------END ITEM BLOCK  ----------------------------
}
?>
<?php
// Display message if no post:
display_if_empty();

while( $Item = & mainlist_get_item() )
{	// For each blog post, do everything below up to the closing curly brace "}"
?>
	<div id="<?php $Item->anchor_id() ?>" class="post post<?php $Item->status_raw() ?>" lang="<?php $Item->lang() ?>">

		<?php
			$Item->locale_temp_switch(); // Temporarily switch to post locale (useful for multilingual blogs)
		?>

		<h2><?php $Item->title(); ?></h2>
		<small>
			<?php
				$Item->issue_time( array(
						'time_format' => 'F jS, Y',
					) );
			?>
		</small>

		<?php
			// ---------------------- POST CONTENT INCLUDED HERE ----------------------
			skin_include( '_item_content.inc.php', array(
					'image_size'	=>	'fit-400x320',
				) );
			// Note: You can customize the default item feedback by copying the generic
			// /skins/_item_feedback.inc.php file into the current skin folder.
			// -------------------------- END OF POST CONTENT -------------------------
		?>

		<?php
			// List all tags attached to this post:
			$Item->tags( array(
					'before' =>         '<div class="posttags">'.T_('Tags').': ',
					'after' =>          '</div>',
					'separator' =>      ', ',
				) );
		?>

		<p class="postmetadata">
			<?php
				$Item->categories( array(
					'before'          => '<img src="img/doc18.png" alt="Posted in" desc="Posted in" title="Posted in" />',
					'after'           => ' ',
					'include_main'    => true,
					'include_other'   => true,
					'include_external'=> true,
					'link_categories' => true,
				) );
			?>

			<?php
				$Item->edit_link( array( // Link to backoffice for editing
						'before'    => ' | ',
						'after'     => '',
					) );
			?>

			<?php
				// Link to comments, trackbacks, etc.:
				$Item->feedback_link( array(
						'type' => 'feedbacks',
						'link_before' => ' | ',
						'link_after' => '',
						'link_text_zero' => '#',
						'link_text_one' => '#',
						'link_text_more' => '#',
						'link_title' => '#',
						'use_popup' => false,
					) );
			?>
			</p>

	</div>

	<?php
	locale_restore_previous();	// Restore previous locale (Blog locale)
}
?>

<?php
	// -------------------- PREV/NEXT PAGE LINKS (POST LIST MODE) --------------------
	mainlist_page_links( array(
			'block_start' => '<div class="navigation">',
			'block_end' => '</div>',
   		'prev_text' => '&lt;&lt;',
   		'next_text' => '&gt;&gt;',
		) );
	// ------------------------- END OF PREV/NEXT PAGE LINKS -------------------------
?>

</div>


<?php
// ------------------------- SIDEBAR INCLUDED HERE --------------------------
skin_include( '_sidebar.inc.php' );
// Note: You can customize the default BODY footer by copying the
// _body_footer.inc.php file into the current skin folder.
// ----------------------------- END OF SIDEBAR -----------------------------
?>
<div class="equalize">&nbsp;</div>
</div>

<?php
// ------------------------- BODY FOOTER INCLUDED HERE --------------------------
skin_include( '_body_footer.inc.php' );
// Note: You can customize the default BODY footer by copying the
// _body_footer.inc.php file into the current skin folder.
// ------------------------------- END OF FOOTER --------------------------------
?>
</div>

<?php
// ------------------------- HTML FOOTER INCLUDED HERE --------------------------
skin_include( '_html_footer.inc.php' );
// Note: You can customize the default HTML footer by copying the
// _html_footer.inc.php file into the current skin folder.
// ------------------------------- END OF FOOTER --------------------------------
?>
