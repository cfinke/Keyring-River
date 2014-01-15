<?php
/**
 * @package Keyring River
 */

$service_id = $q;
$categories = array( 'link', 'attachment', 'photo', 'thought', 'retweet' );
$category = $categories[ rand( 0, count( $categories ) - 1 ) ];
$services = array( 'twitter', 'dribbble', 'instagram', 'github', 'im' );
$service = $services[ rand( 0, count( $services ) - 1 ) ];
$date = date( 'F j, Y', rand( 0, time() ) );
$data = "Lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem.";

switch ( $service ) {
	case 'twitter':
		$category = 'thought';
		$date = get_the_time( 'F j, Y' );
		$data = get_the_content();
	break;
}

?>
<li id="post-<?php the_ID(); ?>" <?php post_class( 'post' ); ?>>
	<?php if ( $category == 'link' ) { ?>
		<a target="_blank" href="<?php echo esc_url( $attachment ); ?>">
	<?php } else if ( strlen($attachment) > 0 || $category == 'link') { ?>
		<a target="_blank" href="<?php echo esc_url( $link ); ?>">
	<?php } ?>
	<div class="icons">
		<span class="logo <?php echo $service ?>">
			<?php
			
			switch ($service) {
				case 'twitter':
					echo "&#xe086;";
				break;
				case 'dribbble':
					echo "&#xe021;";
				break;
				case 'instagram':
					echo "&#xe100;";
				break;
				case 'github':
					echo "&#xe037;";
				break;
			}
			?>
		</span><br>
		<span class="logo category <?php echo $service ?>">
			<?php
			
			switch ($category) {
				case 'link':
				echo "&#128279;";
				break;
				case 'photo':
				echo "";
				break;
				case 'thought':
				echo "";
				break;
				case 'retweet':
				echo "&#128227;";
				break;
			}
			
			?>
		</span>
	</div>
	<?php if( substr($attachment, -3) == 'jpg' || substr($attachment, -4) == 'jpeg' || substr($attachment, -3) == 'png' || substr($attachment, -3) == 'png' ) { ?>
		<div class="attachment" style="background-image: url('<?php echo $attachment ?>')"></div>
	<?php } ?>
	<div class="content <?php echo $service ?>">
		<span class="date"><?php echo $date; ?></span><br>
		<span class="text"><?php echo $data; ?></span>
	</div>
	<?php if ( strlen($attachment) > 0 || $category == 'link' ) { ?>
		</a>
	<?php } ?>
</li>