<?php ini_set('display_errors', 1);

class Create_Post {

	# Required
	private $fname;
	private $lname;
	private $email;
	private $phone;
	private $post_type;
	private $region;
	private $category;
	private $brand;
	private $title;
	private $frame;
	private $size;
	private $gear_group;
	private $wheels;
	private $content;
	private $year;
	private $sales_price;

	# Gears
	private $front_gear;
	private $rear_gear;
	private $gear_shifters;

	# Wheels
	private $rims;
	private $front_hub;
	private $rear_hub;
	private $spokes;
	private $tires;

	# Brakes
	private $break_levers;
	private $front_break;
	private $rear_break;
	private $front_disc;
	private $rear_disc;

	# Drive train
	private $crankset;
	private $bottom_bracket;
	private $cassette;
	private $chain;

	#Shock
	private $fork;
	private $rear_shock;
	private $remote_system;

	#Other
	private $handlebar;
	private $stem;
	private $headset;
	private $seatpost;
	private $saddle;
	private $weight;

	// private $type;

	function save() {
		
		if (isset($_POST['post_submit'])) {

			$current_user = wp_get_current_user();
			$this->fname = $current_user->first_name;
			$this->lname = $current_user->last_name;
			$this->email = $current_user->user_email;

			if (isset($_POST['post_phone'])) {
				$this->phone = $_POST['post_phone'];
			}

			if (isset($_POST['post_type'])) {
				$this->post_type = $_POST['post_type'];
			}

			if (isset($_POST['region'])) {
				$this->region = $_POST['region'];
			}

			if (isset($_POST['category'])) {
				$this->category = $_POST['category'];
			}

			if (isset($_POST['brand'])) {
				$this->brand = $_POST['brand'];
			}

			if (isset($_POST['post_title'])) {
				$this->title = $_POST['post_title'];
			}

			if (isset($_POST['post_frame'])) {
				$this->frame = $_POST['post_frame'];
			}

			if (isset($_POST['size'])) {
				$this->size = $_POST['size'];
			}

			if (isset($_POST['post_gear-group'])) {
				$this->gear_group = $_POST['post_gear-group'];
			}

			if (isset($_POST['post_wheels'])) {
				$this->wheels = $_POST['post_wheels'];
			}

			if (isset($_POST['post_text'])) {
				$this->content = $_POST['post_text'];
			}

			if (isset($_POST['post_year'])) {
				$this->year = preg_replace('/\s+/', '', $_POST['post_year']);
			}

			if (isset($_POST['post_sales-price'])) {
				$this->sales_price = preg_replace('/\s+/', '', $_POST['post_sales-price']);
			}

			if (isset($_POST['post_front-gear'])) {
				$this->front_gear = $_POST['post_front-gear'];
			}

			if (isset($_POST['post_rear-gear'])) {
				$this->rear_gear = $_POST['post_rear-gear'];
			}

			if (isset($_POST['post_gear-shifters'])) {
				$this->gear_shifters = $_POST['post_gear-shifters'];
			}

			if (isset($_POST['post_rims'])) {
				$this->rims = $_POST['post_rims'];
			}

			if (isset($_POST['post_front-hub'])) {
				$this->front_hub = $_POST['post_front-hub'];
			}

			if (isset($_POST['post_rear-hub'])) {
				$this->rear_hub = $_POST['post_rear-hub'];
			}

			if (isset($_POST['post_spokes'])) {
				$this->spokes = $_POST['post_spokes'];
			}

			if (isset($_POST['post_tires'])) {
				$this->tires = $_POST['post_tires'];
			}

			if (isset($_POST['post_break-levers'])) {
				$this->break_levers = $_POST['post_break-levers'];
			}

			if (isset($_POST['post_front-break'])) {
				$this->front_break = $_POST['post_front-break'];
			}

			if (isset($_POST['post_rear-break'])) {
				$this->rear_break = $_POST['post_rear-break'];
			}

			if (isset($_POST['post_front-disc'])) {
				$this->front_disc = $_POST['post_front-disc'];
			}

			if (isset($_POST['post_rear-disc'])) {
				$this->rear_disc = $_POST['post_rear-disc'];
			}

			if (isset($_POST['post_crankset'])) {
				$this->crankset = $_POST['post_crankset'];
			}

			if (isset($_POST['post_bottom-bracket'])) {
				$this->bottom_bracket = $_POST['post_bottom-bracket'];
			}

			if (isset($_POST['post_cassette'])) {
				$this->cassette = $_POST['post_cassette'];
			}

			if (isset($_POST['post_chain'])) {
				$this->chain = $_POST['post_chain'];
			}

			if (isset($_POST['post_fork'])) {
				$this->fork = $_POST['post_fork'];
			}

			if (isset($_POST['post_rear-shock'])) {
				$this->rear_shock = $_POST['post_rear-shock'];
			}

			if (isset($_POST['post_remote-system'])) {
				$this->remote_system = $_POST['post_remote-system'];
			}

			if (isset($_POST['post_handlebar'])) {
				$this->handlebar = $_POST['post_handlebar'];
			}

			if (isset($_POST['post_stem'])) {
				$this->stem = $_POST['post_stem'];
			}

			if (isset($_POST['post_headset'])) {
				$this->headset = $_POST['post_headset'];
			}

			if (isset($_POST['post_seatpost'])) {
				$this->seatpost = $_POST['post_seatpost'];
			}

			if (isset($_POST['post_saddle'])) {
				$this->saddle = $_POST['post_saddle'];
			}

			if (isset($_POST['post_weight'])) {
				$this->weight = $_POST['post_weight'];
			}

			# Fetch content to $post
			$post = array(
				'post_title' => esc_attr($this->title),
				'post_content' => esc_attr($this->content),
				'post_type'	=> esc_attr($this->post_type),
				'post_status'	=> 'publish'
			);

			# Validates the required input fields
			// if (empty($this->fname)) {
			// 	echo 'Förnamn saknas.';
			// }
			
			// elseif (empty($this->lname)) {
			// 	echo 'Efternamn saknas.';
			// }
			
			// // Släng in php validering för email
			// elseif (empty($this->email)) {
			// 	echo 'Epost saknas.';
			// }
			
			// elseif (filter_var($this->email, FILTER_VALIDATE_EMAIL) === false) {
			// 	echo 'E-posten är inte en giltig e-post.';
			// }

			// elseif (empty($_POST['post_phone'])) {
			// 	echo 'Telefonnummer saknas.';
			// }

			if (empty($_POST['category'])) {
				echo 'Välj en kategori för annonsen.';
			}
			
			elseif (empty($_POST['brand'])) {
				echo 'Lägg till varumärket på cykeln.';
			}
			
			elseif (empty($_POST['size'])) {
				echo 'Storlek saknas.';
			}
			
			elseif (empty($_POST['region'])) {
				echo 'Välj ett område.';
			}
			
			elseif (empty($_POST['post_title'])) {
				echo 'Annonsen saknar rubrik.';
			}
			
			elseif (empty($_POST['post_gear-group'])) {
				echo 'Var vänlig och fyll i växelgrupp.';
			}
			
			elseif (empty($_POST['post_wheels'])) {
				echo 'Var vänlig och fyll i hjul.';
			}
			
			elseif (empty($_POST['post_text'])) {
				echo 'Annonstext saknas.';
			}
			
			elseif (empty($_POST['post_year'])) {
				echo 'Var vänlig och skriv årsmodell.';
			}
			
			elseif (empty($_POST['post_sales-price'])) {
				echo 'Prisfältet är tomt, var vänlig och sätt ett försäljningspris.';
			}

			// elseif (empty($_POST['post_file--upload'])) {
			// 	echo 'Saknar bild.';
			// }

			else {

				# Insert $post to database
				$pid = wp_insert_post($post);

				if (isset($_POST['post_submit']) && !empty($_FILES)) {

					if (!function_exists('wp_generate_attachment_metadata')) {
						require_once(ABSPATH . "wp-admin" . '/includes/image.php');
						require_once(ABSPATH . "wp-admin" . '/includes/file.php');
						require_once(ABSPATH . "wp-admin" . '/includes/media.php');
					}

					$attach_id = media_handle_upload('post_file--upload', $pid);
				}

				# Fetch taxonomy term type
				// $term_type = esc_attr($this->type);
				// wp_set_object_terms($pid, $term_type, 'type');

				# Fetch taxonomy term category
				$term_category = esc_attr($this->category);
				wp_set_object_terms($pid, $term_category, 'category');

				# Fetch taxonomy term brand
				$term_brand = esc_attr($this->brand);
				wp_set_object_terms($pid, $term_brand, 'brand');

				# Fetch taxonomy term region
				$term_region = esc_attr($this->region);
				wp_set_object_terms($pid, $term_region, 'region');

				# Fetch taxonomy term size
				$term_size = esc_attr($this->size);
				wp_set_object_terms($pid, $term_size, 'size');

				# Insert first name
				add_post_meta($pid, 'fname', esc_attr($this->fname));

				# Insert last name
				add_post_meta($pid, 'lname', esc_attr($this->lname));

				# Insert email
				add_post_meta($pid, 'email', esc_attr($this->email));

				# Insert phone
				add_post_meta($pid, 'phone', esc_attr($this->phone));

				# Insert frame
				add_post_meta($pid, 'frame', esc_attr($this->frame));

				# Insert gear group
				add_post_meta($pid, 'gear-group', esc_attr($this->gear_group));

				# Insert wheels
				add_post_meta($pid, 'wheels', esc_attr($this->wheels));

				# Insert sales price
				add_post_meta($pid, 'sales-price', esc_attr($this->sales_price));

				# Insert image
				add_post_meta($pid, 'feature-image', $attach_id);

				# Insert model year
				add_post_meta($pid, 'year', esc_attr($this->year));

				# Insert front gear
				add_post_meta($pid, 'front-gear', esc_attr($this->front_gear));

				# Insert rear gear
				add_post_meta($pid, 'rear-gear', esc_attr($this->rear_gear));

				# Insert gear shifters
				add_post_meta($pid, 'gear-shifters', esc_attr($this->gear_shifters));

				# Insert rims
				add_post_meta($pid, 'rims', esc_attr($this->rims), $pid);

				# Insert front hub
				add_post_meta($pid, 'front-hub', esc_attr($this->front_hub));

				# Insert rear hub
				add_post_meta($pid, 'rear-hub', esc_attr($this->rear_hub));

				# Insert spokes
				add_post_meta($pid, 'spokes', esc_attr($this->spokes));

				# Insert tires
				add_post_meta($pid, 'tires', esc_attr($this->tires));

				# Insert brake levers
				add_post_meta($pid, 'break-levers', esc_attr($this->break_levers));

				# Insert front brake
				add_post_meta($pid, 'front-break', esc_attr($this->front_break));

				# Insert rear brake
				add_post_meta($pid, 'rear-break', esc_attr($this->rear_break));

				# Insert front disc
				add_post_meta($pid, 'front-disc', esc_attr($this->front_disc));

				# Insert rear disc
				add_post_meta($pid, 'rear-disc', esc_attr($this->rear_disc));

				# Insert crankset
				add_post_meta($pid, 'crankset', esc_attr($this->crankset));

				# Insert bottom bracket
				add_post_meta($pid, 'bottom-bracket', esc_attr($this->bottom_bracket));

				# Insert cassette
				add_post_meta($pid, 'cassette', esc_attr($this->cassette));

				# Insert chain
				add_post_meta($pid, 'chain', esc_attr($this->chain));

				# Insert fork
				add_post_meta($pid, 'fork', esc_attr($this->fork));

				# Insert rear shock
				add_post_meta($pid, 'rear-shock', esc_attr($this->rear_shock));

				# Insert remote system
				add_post_meta($pid, 'remote-system', esc_attr($this->remote_system));

				# Insert handlebar
				add_post_meta($pid, 'handlebar', esc_attr($this->handlebar));

				# Insert stem
				add_post_meta($pid, 'stem', esc_attr($this->stem));

				# Insert headset
				add_post_meta($pid, 'headset', esc_attr($this->headset));

				# Insert seatpost
				add_post_meta($pid, 'seatpost', esc_attr($this->seatpost));

				# Insert saddle
				add_post_meta($pid, 'saddle', esc_attr($this->saddle));

				# Insert weight
				add_post_meta($pid, 'weight', esc_attr($this->weight));



				// $link = get_permalink( $pid );
				// wp_redirect($link);
				// echo 'Din annons är nu publicerad';

				$current_user = wp_get_current_user();
		        $user_url = $current_user->user_login;
		        $url = home_url('/'.$user_url);
		        wp_redirect($url);

		        exit();

			}

		}

	}

	function __construct() {

		add_action('init', array($this, 'save'), 11);

	}

}

New Create_Post;

?>
