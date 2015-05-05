<?php

class Update_Post {

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
  private $id;

  // private $type;

  function update() {

    if (isset($_POST['submit_update']) && !empty($_POST['action'])) {

      $current_user = wp_get_current_user();
      $this->fname = $current_user->first_name;
      $this->lname = $current_user->last_name;
      $this->email = $current_user->user_email;
      
      if (isset($_POST['pid'])) {
        $this->id = $_POST['pid'];
      }

      if (isset($_POST['post_phone'])) {
        $this->phone = $_POST['post_phone'];
      }

      if (isset($_POST['post_region'])) {
        $this->region = $_POST['post_region'];
      }

      if (isset($_POST['post_category'])) {
        $this->category = $_POST['post_category'];
      }

      if (isset($_POST['post_brand'])) {
        $this->brand = $_POST['post_brand'];
      }

      if (isset($_POST['post_title'])) {
        $this->title = $_POST['post_title'];
      }

      if (isset($_POST['post_size'])) {
        $this->size = $_POST['post_size'];
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
        // $this->year = $_POST['post_year'];
        $this->year = preg_replace('/\s+/', '', $_POST['post_year']);
      }

      if (isset($_POST['post_sales-price'])) {
        // $this->sales_price = $_POST['post_sales-price'];
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

      # Update post content
      $post = array(
        'ID' => esc_attr($this->id),
        'post_title' => esc_attr($this->title),
        'post_content' => esc_attr($this->content)
      );

      # Validates the required input fields
      // if (empty($this->fname)) {
      //  echo 'Förnamn saknas.';
      // }
      
      // elseif (empty($this->lname)) {
      //  echo 'Efternamn saknas.';
      // }
      
      // // Släng in php validering för email
      // elseif (empty($this->email)) {
      //  echo 'Epost saknas.';
      // }
      
      // elseif (filter_var($this->email, FILTER_VALIDATE_EMAIL) === false) {
      //  echo 'E-posten är inte en giltig e-post.';
      // }

      // elseif (empty($_POST['post_phone'])) {
      //  echo 'Telefonnummer saknas.';
      // }

      if (empty($_POST['post_category'])) {
        echo 'Välj en kategori för annonsen.';
      }
      
      elseif (empty($_POST['post_brand'])) {
        echo 'Lägg till varumärket på cykeln.';
      }
      
      elseif (empty($_POST['post_size'])) {
        echo 'Storlek saknas.';
      }
      
      elseif (empty($_POST['post_region'])) {
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
      //  echo 'Saknar bild.';
      // }

      else {

        # Insert $post to database
        $pid = wp_update_post($post);

        if (isset($_POST['submit_update']) && !empty($_FILES)) {

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

        // # Insert first name
        update_field('fname', esc_attr($this->fname), $pid);

        // # Insert last name
        update_field('lname', esc_attr($this->lname), $pid);

        // # Insert email
        update_field('email', esc_attr($this->email), $pid);

        # Insert phone
        update_field('field_54e5ea51d52fa', esc_attr($this->phone), $pid);

        # Insert gear group
        update_field('field_54e5e9fe4621d', esc_attr($this->gear_group), $pid);

        # Insert wheels
        update_field('field_54e5e8eebf5f9', esc_attr($this->wheels), $pid);

        # Insert sales price
        update_field('field_54e5e9c4680f0', esc_attr($this->sales_price), $pid);

        # Insert image
        update_field('field_54e5e7c39cc0f', $attach_id, $pid);

        # Insert model year
        update_field('field_54e5e79bbb84a', esc_attr($this->year), $pid);

        # Insert front gear
        update_field('field_54e5ea094621e', esc_attr($this->front_gear), $pid);

        # Insert rear gear
        update_field('field_54e5ea124621f', esc_attr($this->rear_gear), $pid);

        # Insert gear shifters
        update_field('field_54e5ea1b46220', esc_attr($this->gear_shifters), $pid);

        # Insert rims
        update_field('field_54e5e8f8bf5fa', esc_attr($this->rims), $pid);

        # Insert front hub
        update_field('field_54e5e943bf5fb', esc_attr($this->front_hub), $pid);

        # Insert rear hub
        update_field('field_54e5e94dbf5fc', esc_attr($this->rear_hub), $pid);

        # Insert spokes
        update_field('field_54e5e956bf5fd', esc_attr($this->spokes), $pid);

        # Insert tires
        update_field('field_54e5e961bf5fe', esc_attr($this->tires), $pid);

        # Insert brake levers
        update_field('field_54e5e80527561', esc_attr($this->break_levers), $pid);

        # Insert front brake
        update_field('field_54e5e82927562', esc_attr($this->front_break), $pid);

        # Insert rear brake
        update_field('field_54e5e83927563', esc_attr($this->rear_break), $pid);

        # Insert front disc
        update_field('field_54e5e84227564', esc_attr($this->front_disc), $pid);

        # Insert rear disc
        update_field('field_54e5e84e27565', esc_attr($this->rear_disc), $pid);

        # Insert crankset
        update_field('field_54e5e8ae7b236', esc_attr($this->crankset), $pid);

        # Insert bottom bracket
        update_field('field_54e5e8b77b237', esc_attr($this->bottom_bracket), $pid);

        # Insert cassette
        update_field('field_54e5e8c27b238', esc_attr($this->cassette), $pid);

        # Insert chain
        update_field('field_54e5e8cc7b239', esc_attr($this->chain), $pid);

        # Insert fork
        update_field('field_54e5e86ebae86', esc_attr($this->fork), $pid);

        # Insert rear shock
        update_field('field_54e5e881bae87', esc_attr($this->rear_shock), $pid);

        # Insert remote system
        update_field('field_54e5e88bbae88', esc_attr($this->remote_system), $pid);

        # Insert handlebar
        update_field('field_54e5e97e2019e', esc_attr($this->handlebar), $pid);

        # Insert stem
        update_field('field_54e5e9862019f', esc_attr($this->stem), $pid);

        # Insert headset
        update_field('field_54e5e98e201a0', esc_attr($this->headset), $pid);

        # Insert seatpost
        update_field('field_54e5e996201a1', esc_attr($this->seatpost), $pid);

        # Insert saddle
        update_field('field_54e5e9a3201a2', esc_attr($this->saddle), $pid);

        # Insert weight
        update_field('field_54e5e9a8201a3', esc_attr($this->weight), $pid);

        // $current_user = wp_get_current_user();
        $user_url = $current_user->user_login;
        $url = home_url('/'.$user_url);
        wp_redirect($url);

      }

    }

  }

  function __construct() {

    add_action('init', array($this, 'update'), 11);

  }

}

New Update_Post;

?>
