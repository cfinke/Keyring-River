<?php
/**
 * @package Keyring River
 */

$categories = array( 'link', 'attachment', 'photo', 'thought', 'retweet' );
$category = $categories[ rand( 0, count( $categories ) - 1 ) ];

$keyring_terms = wp_get_post_terms( get_the_ID(), 'keyring_services' );

if ( ! empty( $keyring_terms ) )
	$service = $keyring_terms[0]->slug;

if ( ! $service ) {
	if ( get_post_meta( get_the_ID(), 'im-porter_raw_transcript', true ) ) {
		$service = 'im';
	}
	else {
		$service = 'no-service';
	}
}

$date = get_the_time( 'F j, Y g:i a' );
$data = get_the_content();

if ( empty( $data ) ) {
	$data = get_the_title();
}

$original_permalink = get_post_meta( get_the_ID(), $service . '_permalink', true );

switch ( $service ) {
	case 'twitter':
		$category = 'thought';
		
		if ( substr( $data, 0, 3 ) == 'RT ' )
			$category = 'retweet';
	break;
	case 'foursquare':
		$category = 'checkin';
		
		$original_permalink = 'http://foursquare.com/checkin/' . get_post_meta( get_the_ID(), 'foursquare_id', true );
	break;
	case 'facebook':
		$category = 'thought';
		
		$facebook_id = get_post_meta( get_the_ID(), 'facebook_id', true );
		
		if ( $facebook_id && strpos( $facebook_id, '_' ) !== false ) {
			list( $user_id, $post_id ) = explode( '_', $facebook_id );
			
			$original_permalink = "http://facebook.com/$user_id/posts/$post_id";
		}
	break;
	case 'im':
		$category = 'chat';
	break;
	case 'reddit':
		$category = 'thought';
		
		if ( get_post_meta( get_the_ID(), 'raw_import_data', true )->kind == 't3' ) {
			$category = 'link';
		}
		else {
			$data = '<h3>' . esc_html( get_the_title() ). '</h3><div>' . get_the_content() . '</div>';
		}
		
	break;
}

if ( ! $original_permalink )
	$original_permalink = get_permalink();

?>
<li id="post-<?php the_ID(); ?>" <?php post_class( 'post' ); ?>>
	<?php if ( $original_permalink ) { ?>
		<a href="<?php echo esc_url( $original_permalink ); ?>">
	<?php } ?>
	<div class="icons">
		<span class="logo <?php echo $service ?>">
			<?php
			
			switch ($service) {
				case 'twitter':
					echo "&#xe086;";
				break;
				case 'github':
					echo "&#xe037;";
				break;
				case 'wordpress':
					echo "&#xe094;";
				break;
				case 'foursquare':
					echo "&#xe032;";
				break;
				case 'im':
					echo "&#xe004;";
				break;
				case 'facebook':
					echo "&#xe027;";
				break;
				case 'reddit':
					echo "&#xe069;";
				break;
				default:
					echo "&#xe071;";
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
	<?php if ( $original_permalink ) { ?></a><?php } ?>
	<?php if( substr($attachment, -3) == 'jpg' || substr($attachment, -4) == 'jpeg' || substr($attachment, -3) == 'png' || substr($attachment, -3) == 'png' ) { ?>
		<div class="attachment" style="background-image: url('<?php echo $attachment ?>')"></div>
	<?php } ?>
	<div class="content <?php echo $service ?>">
		<a href="<?php echo esc_url( get_permalink() ); ?>">
			<span class="date"><?php echo $date; ?></span>
		</a>
		<br />
		<span class="text"><?php echo $data; ?></span>
	</div>
</li>