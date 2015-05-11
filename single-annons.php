<?php ob_start(); get_header(); ?>

<?php

/* PHP
  ========================================================================== */

$pid = get_the_ID();
$post = get_post($pid, object);

?>



<?php if (is_user_logged_in()): ?>

    <?php $current_user = wp_get_current_user(); ?>

    <?php while (have_posts()) : (the_post()); ?>

        <?php if ($current_user->ID == $post->post_author): ?>

            <!-- Telefon -->
            <?php $phone = get_post_meta(get_the_ID(), 'phone', true); ?>

            <!-- Område -->
            <?php $region = wp_get_object_terms($pid, 'region'); ?>

            <!-- Kategori -->
            <?php $category = wp_get_object_terms($pid, 'category'); ?>

            <!-- Varumärke -->
            <?php $brand = wp_get_object_terms($pid, 'brand'); ?>

            <!-- Storlek -->
            <?php $size = wp_get_object_terms($pid, 'size'); ?>

            <!-- Årsmodell -->
            <?php $year = get_post_meta(get_the_ID(), 'year', true); ?>

            <!-- Ram -->
            <?php $frame = get_post_meta(get_the_ID(), 'frame', true); ?>

            <!-- Växelgrupp -->
            <?php $gear_group = get_post_meta(get_the_ID(), 'gear-group', true); ?>

            <!-- Hjul -->
            <?php $wheels = get_post_meta(get_the_ID(), 'wheels', true); ?>

            <!-- Pris -->
            <?php $sales_price = get_post_meta(get_the_ID(), 'sales-price', true); ?>

            <!-- Växelgrupp -->
            <?php $front_gear = get_post_meta(get_the_ID(), 'front-gear', true); ?>
            <?php $rear_gear = get_post_meta(get_the_ID(), 'rear-gear', true); ?>
            <?php $gear_shifters = get_post_meta(get_the_ID(), 'gear-shifters', true); ?>

            <!-- Hjul -->
            <?php $rims = get_post_meta(get_the_ID(), 'rims', true); ?>
            <?php $front_hub = get_post_meta(get_the_ID(), 'front-hub', true); ?>
            <?php $rear_hub = get_post_meta(get_the_ID(), 'rear-hub', true); ?>
            <?php $spokes = get_post_meta(get_the_ID(), 'spokes', true); ?>
            <?php $tires = get_post_meta(get_the_ID(), 'tires', true); ?>

            <!-- Bromsar -->
            <?php $break_levers = get_post_meta(get_the_ID(), 'break-levers', true); ?>
            <?php $front_break = get_post_meta(get_the_ID(), 'front-break', true); ?>
            <?php $rear_break = get_post_meta(get_the_ID(), 'rear-break', true); ?>
            <?php $front_disc = get_post_meta(get_the_ID(), 'front-disc', true); ?>
            <?php $rear_disc = get_post_meta(get_the_ID(), 'rear-disc', true); ?>
            
            <!-- Drivlina -->
            <?php $crankset = get_post_meta(get_the_ID(), 'crankset', true); ?>
            <?php $bottom_bracket = get_post_meta(get_the_ID(), 'bottom-bracket', true); ?>
            <?php $cassette = get_post_meta(get_the_ID(), 'cassette', true); ?>
            <?php $chain = get_post_meta(get_the_ID(), 'chain', true); ?>

            <!-- Dämpare -->
            <?php $fork = get_post_meta(get_the_ID(), 'fork', true); ?>
            <?php $rear_shock = get_post_meta(get_the_ID(), 'rear-shock', true); ?>
            <?php $remote_system = get_post_meta(get_the_ID(), 'remote-system', true); ?>

            <!-- Övrigt -->
            <?php $handlebar = get_post_meta(get_the_ID(), 'handlebar', true); ?>
            <?php $stem = get_post_meta(get_the_ID(), 'stem', true); ?>
            <?php $headset = get_post_meta(get_the_ID(), 'headset', true); ?>
            <?php $seatpost = get_post_meta(get_the_ID(), 'seatpost', true); ?>
            <?php $saddle = get_post_meta(get_the_ID(), 'saddle', true); ?>
            <?php $weight = get_post_meta(get_the_ID(), 'weight', true); ?>

            <!-- Säljare -->
            <?php $fname = get_post_meta(get_the_ID(), 'fname', true); ?>
            <?php $lname = get_post_meta(get_the_ID(), 'lname', true); ?>
            <?php $email = get_post_meta(get_the_ID(), 'email', true); ?>
            <?php $phone = get_post_meta(get_the_ID(), 'phone', true); ?>

            <main class="post" role="main">
            <form method="post" name="post" action="" enctype="multipart/form-data">
                
                <div class="post_content">
                    <div class="wrapper">

                        <div class="post_file">
                            <span>Byt annonsbild</span>
                            <input type="file" class="post_file--upload" name="post_file--upload">
                        </div>

                        <?php $image_args = array(
                            'post_type' => 'attachment',
                            'post_mime_type' => 'image',
                            'post_parent' => $pid,
                            'posts_per_page' => '1',
                            'order' => 'DESC'
                        ); ?>

                        <?php $images = get_posts($image_args); ?>

                        <?php foreach ($images as $image): ?> 
                            <?php if (!empty($image)): ?>

                                <?php $background = wp_get_attachment_image_src($image->ID, 'full'); ?>
              
                            <?php endif; ?>
                        <?php endforeach; ?>

                        <div class="post_file--preview" style="height: 600px; background: url('<?php echo $background[0]; ?>'); background-size: cover; background-position: center center;"></div>

                        <textarea class="post_title" name="post_title" placeholder="Skriv din rubrik här..." rows="1" cols="0" autofocus><?php echo get_the_title(); ?></textarea>
                        <textarea class="post_text" name="post_text" placeholder="Skriv en kort beskrivning om cykeln..." rows="1" cols="0"><?php echo get_the_content(); ?></textarea>

                    </div>
                </div>

                <div class="wrapper">
                    <div class="post_details">

                        <ul class="post_list ui-list">
                            
                            <li class="post_item">
                                <label class="spec_label">Ram</label>
                                <input type="text" class="post_frame post_input" name="post_frame" value="<?php echo $frame; ?>" placeholder="Ram" />
                            </li>
          
                            <li class="post_item">
                                <label class="spec_label">Växelgrupp</label>
                                <input type="text" class="post_gear-group post_input" name="post_gear-group" value="<?php echo $gear_group; ?>" placeholder="Växelgrupp" />
                            </li>
                
                            <li class="post_item">
                                <label class="spec_label">Hjul</label>
                                <input type="text" class="post_wheels post_input" name="post_wheels" value="<?php echo $wheels; ?>" placeholder="Hjul" />
                            </li>
                        
                            <li class="post_item">
                                <label class="spec_label">Årsmodell</label>
                                <input type="text" class="post_year post_input" name="post_year" value="<?php echo $year; ?>" placeholder="Årsmodell" />
                            </li>
                            
                            <li class="post_item">
                                <label class="spec_label">Pris</label>
                                <input type="text" class="post_sales-price post_input" name="post_sales-price" value="<?php echo $sales_price; ?>" placeholder="Pris" />
                            </li>
                            
                            
                            <li class="post_item">
                                <div class="post_spec--btn js-spec">
                                    <span>Lägg till detaljerad specifikation</span>
                                </div>
                            </li>
                        </ul>

                        <div class="post_spec">
                            <div class="input_container">
                                <h4 class="spec_title">Växlar</h4>
                                <label class="spec_label">Framväxel</label>
                                <input type="text" class="post_front-gear post_input-spec" name="post_front-gear" value="<?php echo $front_gear; ?>" placeholder="Framväxel"/>
                                <label class="spec_label">Bakväxel</label>
                                <input type="text" class="post_rear-gear post_input-spec" name="post_rear-gear" value="<?php echo $rear_gear; ?>" placeholder="Bakväxel"/>
                                <label class="spec_label">Växelreglage</label>
                                <input type="text" class="post_gear-shifters post_input-spec" name="post_gear-shifters" value="<?php echo $gear_shifters; ?>" placeholder="Växelreglage"/>
                            </div>

                            <div class="input_container">
                                <h4 class="spec_title">Hjul</h4>
                                <label class="spec_label">Fälgar</label>
                                <input type="text" class="post_rims post_input-spec" name="post_rims" value="<?php echo $rims; ?>" placeholder="Fälgar"/>
                                <label class="spec_label">Framnav</label>
                                <input type="text" class="post_front-hub post_input-spec" name="post_front-hub" value="<?php echo $front_hub; ?>" placeholder="Framnav"/>
                                <label class="spec_label">Baknav</label>
                                <input type="text" class="post_rear-hub post_input-spec" name="post_rear-hub" value="<?php echo $rear_hub; ?>" placeholder="Baknav"/>
                                <label class="spec_label">Ekrar</label>
                                <input type="text" class="post_spokes post_input-spec" name="post_spokes" value="<?php echo $spokes; ?>" placeholder="Ekrar"/>
                                <label class="spec_label">Däck</label>
                                <input type="text" class="post_tires post_input-spec" name="post_tires" value="<?php echo $tires; ?>" placeholder="Däck"/>
                            </div>

                            <div class="input_container">
                                <h4 class="spec_title">Bromsar</h4>
                                <label class="spec_label">Bromsreglage</label>
                                <input type="text" class="post_brake-levers post_input-spec" name="post_break-levers" value="<?php echo $break_levers; ?>" placeholder="Bromsreglage"/>
                                <label class="spec_label">Frambroms</label>
                                <input type="text" class="post_front-brake post_input-spec" name="post_front-break" value="<?php echo $front_break; ?>" placeholder="Frambroms"/>
                                <label class="spec_label">Bakbroms</label>
                                <input type="text" class="post_rear-brake post_input-spec" name="post_rear-break" value="<?php echo $rear_break; ?>" placeholder="Bakbroms"/>
                                <label class="spec_label">Bromsskiva fram</label>
                                <input type="text" class="post_front-disc post_input-spec" name="post_front-disc" value="<?php echo $front_disc; ?>" placeholder="Bromsskiva fram"/>
                                <label class="spec_label">Bromsskiva bak</label>
                                <input type="text" class="post_rear-disc post_input-spec" name="post_rear-disc" value="<?php echo $rear_disc; ?>" placeholder="Bromsskiva bak"/>
                            </div>

                            <div class="input_container">
                                <h4 class="spec_title">Drivlina</h4>
                                <label class="spec_label">Vevparti</label>
                                <input type="text" class="post_crankset post_input-spec" name="post_crankset" value="<?php echo $crankset; ?>" placeholder="Vevparti"/>
                                <label class="spec_label">Vevlager</label>
                                <input type="text" class="post_bottom-bracket post_input-spec" name="post_bottom-bracket" value="<?php echo $bottom_bracket; ?>" placeholder="Vevlager"/>
                                <label class="spec_label">Kassett</label>
                                <input type="text" class="post_cassette post_input-spec" name="post_cassette" value="<?php echo $cassette; ?>" placeholder="Kassett"/>
                                <label class="spec_label">Kedja</label>
                                <input type="text" class="post_chain post_input-spec" name="post_chain" value="<?php echo $chain; ?>" placeholder="Kedja"/>
                            </div>

                            <div class="input_container">
                                <h4 class="spec_title">Dämpare</h4>
                                <label class="spec_label">Framgaffel</label>
                                <input type="text" class="post_fork post_input-spec" name="post_fork" value="<?php echo $fork; ?>" placeholder="Framgaffel"/>
                                <label class="spec_label">Bakdämpare</label>
                                <input type="text" class="post_rear-shock post_input-spec" name="post_rear-shock" value="<?php echo $rear_shock; ?>" placeholder="Bakdämpare"/>
                                <label class="spec_label">Dämparreglage</label>
                                <input type="text" class="post_remote-system post_input-spec" name="post_remote-system" value="<?php echo $remote_system; ?>" placeholder="Dämparreglage"/>
                            </div>

                            <div class="input_container">
                                <h4 class="spec_title">Övrigt</h4>
                                <label class="spec_label">Styre</label>
                                <input type="text" class="post_handlebar post_input-spec" name="post_handlebar" value="<?php echo $handlebar; ?>" placeholder="Styre"/>
                                <label class="spec_label">Styrstam</label>
                                <input type="text" class="post_stem post_input-spec" name="post_stem" value="<?php echo $stem; ?>" placeholder="Styrstam"/>
                                <label class="spec_label">Styrlager</label>
                                <input type="text" class="post_headset post_input-spec" name="post_headset" value="<?php echo $headset; ?>" placeholder="Styrlager"/>
                                <label class="spec_label">Sadelstolpe</label>
                                <input type="text" class="post_seatpost post_input-spec" name="post_seatpost" value="<?php echo $seatpost; ?>" placeholder="Sadelstolpe"/>
                                <label class="spec_label">Sadel</label>
                                <input type="text" class="post_saddle post_input-spec" name="post_saddle" value="<?php echo $saddle; ?>" placeholder="Sadel"/>
                                <label class="spec_label">Vikt</label>
                                <input type="text" class="post_weight post_input-spec" name="post_weight" value="<?php echo $weight; ?>" placeholder="Vikt"/>
                            </div>
                        </div>

                        <?php $tax_args = array('hide_empty' => false); ?>
                        <?php $tax_sizeargs = array('orderby' => 'id', 'hide_empty' => false); ?>
                        <?php $categories = get_terms('category', $tax_args); ?>
                        <?php $brands = get_terms('brand', $tax_args); ?>
                        <?php $sizes = get_terms('size', $tax_sizeargs); ?>
                        <?php $regions = get_terms('region', $tax_args); ?>

                        <ul class="post_list ui-list">
              
                            <li class="post_item">
                                <div class="dropdown js-category-btn">
                                    <label class="dropdown_label">Kategori</label>
                                    <?php if (empty($category[0]->name)): ?>
                                        <span>Välj kategori</span>
                                    <?php else: ?>
                                        <span><?php echo $category[0]->name ?></span>
                                    <?php endif; ?>
                                    <input type="hidden" name="category" id="category" value="<?php echo $category[0]->slug ?>">
                                </div>
                            </li>

                            <?php if (!empty($categories) && !is_wp_error($categories)): ?>
                                <ul class="dropdown_list ui-list js-category-list">
                                    <?php foreach ($categories as $category): ?>
                                        <li class="dropdown_item js-category-item" data-category="<?php echo $category->slug ?>">
                                            <span class="dropdown_link">
                                                <?php echo $category->name ?>
                                            </span>
                                        </li>
                                    <?php endforeach ?>
                                </ul>
                            <?php endif; ?>

                            <li class="post_item">
                                <div class="dropdown js-brand-btn">
                                    <label class="dropdown_label">Märke</label>
                                    <?php if (empty($brand[0]->name)): ?>
                                        <span>Välj märke</span>
                                    <?php else: ?>
                                        <span><?php echo $brand[0]->name ?></span>
                                    <?php endif; ?>
                                    <input type="hidden" name="brand" id="brand" value="<?php echo $brand[0]->slug ?>">
                                </div>
                            </li>

                            <?php if (!empty($brands) && !is_wp_error($brands)): ?>
                                <ul class="dropdown_list ui-list js-brand-list">
                                    <?php foreach ($brands as $brand): ?>
                                        <li class="dropdown_item js-brand-item" data-brand="<?php echo $brand->slug ?>">
                                            <span class="dropdown_link">
                                                <?php echo $brand->name ?>
                                            </span>
                                        </li>
                                    <?php endforeach ?>
                                </ul>
                            <?php endif; ?>

                            <li class="post_item">
                                <div class="dropdown js-size-btn">
                                    <label class="dropdown_label">Storlek</label>
                                    <?php if (empty($size[0]->name)): ?>
                                        <span>Välj storlek</span>
                                    <?php else: ?>
                                        <span><?php echo $size[0]->name ?></span>
                                    <?php endif; ?>
                                    <input type="hidden" name="size" id="size" value="<?php echo $size[0]->slug ?>">
                                </div>
                            </li>

                            <?php if (!empty($sizes) && !is_wp_error($sizes)): ?>
                                <ul class="dropdown_list ui-list js-size-list">
                                    <?php foreach ($sizes as $size): ?>
                                        <li class="dropdown_item js-size-item" data-size="<?php echo $size->slug ?>">
                                            <span class="dropdown_link">
                                                <?php echo $size->name ?>
                                            </span>
                                        </li>
                                  <?php endforeach ?>
                                </ul>
                            <?php endif; ?>

                            <li class="post_item">
                                <div class="dropdown js-region-btn">
                                    <label class="dropdown_label">Område</label>
                                    <?php if (empty($region[0]->name)): ?>
                                        <span>Välj område</span>
                                    <?php else: ?>
                                        <span><?php echo $region[0]->name ?></span>
                                    <?php endif; ?>
                                    <input type="hidden" name="region" id="region" value="<?php echo $region[0]->slug ?>">
                                </div>
                            </li>
                                
                            <?php if (!empty($regions) && !is_wp_error($regions)): ?>
                                <ul class="dropdown_list ui-list js-region-list">
                                    <?php foreach ($regions as $region): ?>
                                        <li class="dropdown_item js-region-item" data-region="<?php echo $region->slug ?>">
                                            <span class="dropdown_link">
                                                <?php echo $region->name ?>
                                            </span>
                                        </li>
                                    <?php endforeach ?>
                                </ul>
                            <?php endif; ?>

                        </ul>

                        <ul class="post_list ui-list">
                            <h4 class="spec_title spec_title--contact">Kontakt</h4>
                            <li class="post_item">
                                <input type="text" class="post_phone post_input" name="post_phone" value="<?php echo $phone; ?>" placeholder="Telefon (valfritt)"/>
                            </li>
                        </ul>

                        <div class="post_btn--wrap">
              
                            <button name="submit_update" class="post_submit-single" title="Spara annons">Spara</button>
                            <input type="hidden" name="pid" value="<?php echo $pid ?>"/>
                            <input type="hidden" name="action" value="Update"/>
                            <input type="hidden" name="post_type" value="Annons"/>
                
                            <div class="post_delete-bg">
                                <form class="post_delete--message" action="" method="post">
                                    <p>Vill du radera din annons?</p>
                                    <input type="hidden" name="pid" value="<?php echo $pid ?>"/>
                                    <input type="submit" name="post_delete" value="Radera annons"/>
                                    <button class="post_cancel--delete" name="post_cancel--delete">Avbryt</button>
                                </form>
                            </div>

                            <div class="post_start--delete" name="post_start--delete">Radera</div>

                            <?php $post_status = get_post_status(); ?>

                            <?php if ($post_status == 'publish'): ?>
                                <div class="post_draft-bg">
                                    <form class="post_draft--message" action="" method="post">
                                        <p>Vill du inaktivera din annons?</p>
                                        <input type="hidden" name="pid" value="<?php echo $pid ?>"/>
                                        <input type="submit" name="post_draft" value="Inaktivera annons"/>
                                        <button class="post_cancel--draft" name="post_cancel--draft">Avbryt</button>
                                    </form>
                                </div>

                                <div class="post_start--draft" name="post_start--draft">Inaktivera</div>
                            <?php else: ?>
                                <div class="post_publish-bg">
                                    <form class="post_publish--message" action="" method="post">
                                        <p>Vill du publicera din annons?</p>
                                        <input type="hidden" name="pid" value="<?php echo $pid ?>"/>
                                        <input type="submit" name="post_publish" value="Publicera annons"/>
                                        <button class="post_cancel--publish" name="post_cancel--publish">Avbryt</button>
                                    </form>
                                </div>

                                <div class="post_start--publish" name="post_start--publish">Publicera</div>
                            <?php endif; ?>

                        </div>

                    </div>
                </div>

            </form>
            </main>

        <?php else: ?>

            <?php $image_args = array(
                'post_type' => 'attachment',
                'post_mime_type' => 'image',
                'post_parent' => $pid,
                'posts_per_page' => '1',
                'order' => 'DESC'
            ); ?>

            <?php $images = get_posts($image_args); ?>

            <?php foreach ($images as $image): ?> 
                <?php if (!empty($image)): ?>

                    <?php $background = wp_get_attachment_image_src($image->ID, 'full'); ?>
          
                <?php endif; ?>
            <?php endforeach; ?>

            <div class="post_content">
                <div class="wrapper">
                    <!-- <div class="post_image" style="background: url('<?php echo $background[0]; ?>'); background-size: cover; background-position: bottom center;"></div> -->
                    <img src="<?php echo $background[0]; ?>" class="post_image">

                    <h1 class="post_title"><?php the_title(); ?></h1>
                    <div class="post_text"><?php the_content(); ?></div>
                </div>
            </div>

            <div class="wrapper">
                <div class="post_details">
                    
                    <!-- Pris -->
                    <?php $sales_price = get_post_meta(get_the_ID(), 'sales-price', true); ?>

                    <!-- Växelgrupp -->
                    <?php $gear_group = get_post_meta(get_the_ID(), 'gear-group', true); ?>
                    <?php $front_gear = get_post_meta(get_the_ID(), 'front-gear', true); ?>
                    <?php $rear_gear = get_post_meta(get_the_ID(), 'rear-gear', true); ?>
                    <?php $gear_shifters = get_post_meta(get_the_ID(), 'gear-shifters', true); ?>

                    <!-- Hjul -->
                    <?php $wheels = get_post_meta(get_the_ID(), 'wheels', true); ?>
                    <?php $rims = get_post_meta(get_the_ID(), 'rims', true); ?>
                    <?php $front_hub = get_post_meta(get_the_ID(), 'front-hub', true); ?>
                    <?php $rear_hub = get_post_meta(get_the_ID(), 'rear-hub', true); ?>
                    <?php $spokes = get_post_meta(get_the_ID(), 'spokes', true); ?>
                    <?php $tires = get_post_meta(get_the_ID(), 'tires', true); ?>

                    <!-- Bromsar -->
                    <?php $break_levers = get_post_meta(get_the_ID(), 'break-levers', true); ?>
                    <?php $front_break = get_post_meta(get_the_ID(), 'front-break', true); ?>
                    <?php $rear_break = get_post_meta(get_the_ID(), 'rear-break', true); ?>
                    <?php $front_disc = get_post_meta(get_the_ID(), 'front-disc', true); ?>
                    <?php $rear_disc = get_post_meta(get_the_ID(), 'rear-disc', true); ?>

                    <!-- Drivlina -->
                    <?php $crankset = get_post_meta(get_the_ID(), 'crankset', true); ?>
                    <?php $bottom_bracket = get_post_meta(get_the_ID(), 'bottom-bracket', true); ?>
                    <?php $cassette = get_post_meta(get_the_ID(), 'cassette', true); ?>
                    <?php $chain = get_post_meta(get_the_ID(), 'chain', true); ?>

                    <!-- Dämpare -->
                    <?php $fork = get_post_meta(get_the_ID(), 'fork', true); ?>
                    <?php $rear_shock = get_post_meta(get_the_ID(), 'rear-shock', true); ?>
                    <?php $remote_system = get_post_meta(get_the_ID(), 'remote-system', true); ?>

                    <!-- Övrigt -->
                    <?php $handlebar = get_post_meta(get_the_ID(), 'handlebar', true); ?>
                    <?php $stem = get_post_meta(get_the_ID(), 'stem', true); ?>
                    <?php $headset = get_post_meta(get_the_ID(), 'headset', true); ?>
                    <?php $seatpost = get_post_meta(get_the_ID(), 'seatpost', true); ?>
                    <?php $saddle = get_post_meta(get_the_ID(), 'saddle', true); ?>
                    <?php $weight = get_post_meta(get_the_ID(), 'weight', true); ?>

                    <!-- Datum -->
                    <p>Publicerad: <?php the_time('Y.m.d - G:i'); ?></p>

                    <!-- Område -->
                    <?php $region = wp_get_object_terms($pid, 'region'); ?>

                    <!-- Kategori -->
                    <?php $category = wp_get_object_terms($pid, 'category'); ?>

                    <!-- Varumärke -->
                    <?php $brand = wp_get_object_terms($pid, 'brand'); ?>

                    <!-- Årsmodell -->
                    <?php $year = get_post_meta(get_the_ID(), 'year', true); ?>

                    <!-- Storlek -->
                    <?php $size = wp_get_object_terms($pid, 'size'); ?>

                    <!-- Ram -->
                    <?php $frame = get_post_meta(get_the_ID(), 'frame', true); ?>

                    <!-- Säljare -->
                    <?php $fname = get_post_meta(get_the_ID(), 'fname', true); ?>
                    <?php $lname = get_post_meta(get_the_ID(), 'lname', true); ?>
                    <?php $email = get_post_meta(get_the_ID(), 'email', true); ?>
                    <?php $phone = get_post_meta(get_the_ID(), 'phone', true); ?>

                    <?php if (!empty($sales_price)): ?>
                        <div class="post_details--price">
                            <p class="price-wrap--details"><span class="number"><?php echo $sales_price; ?></span> <span class="currancy">kr</span></p>
                        </div>
                    <?php endif; ?>

                    <ul class="post-list_single ui-list">
                        <?php if (!empty($category) || !empty($region) || !empty($weight) || !empty($brand) || !empty($year) || !empty($size) || !empty($frame)): ?>
                            <h4 class="spec_title">Allmänt</h4>

                            <?php if (!empty($category)): ?>
                                <li class="post_item">
                                    <label class="spec_label">Kategori</label>
                                    <div class="post_input"><?php echo $category[0]->name; ?></div>
                                </li>
                            <?php endif; ?>

                            <?php if (!empty($brand)): ?>
                                <li class="post_item">
                                    <label class="spec_label">Märke</label>
                                    <div class="post_input"><?php echo $brand[0]->name; ?></div>
                                </li>
                            <?php endif; ?>

                            <?php if (!empty($frame)): ?>
                                <li class="post_item">
                                    <label class="spec_label">Ram</label>
                                    <div class="post_input"><?php echo $frame; ?></div>
                                </li>
                            <?php endif; ?>

                            <?php if (!empty($size)): ?>
                                <li class="post_item">
                                    <label class="spec_label">Storlek</label>
                                    <div class="post_input"><?php echo $size[0]->name; ?></div>
                                </li>
                            <?php endif; ?>

                            <?php if (!empty($year)): ?>
                                <li class="post_item">
                                    <label class="spec_label">Årsmodell</label>
                                    <div class="post_input"><?php echo $year; ?></div>
                                </li>
                            <?php endif; ?>

                            <?php if (!empty($weight)): ?>
                                <li class="post_item">
                                    <label class="spec_label">Vikt</label>
                                    <div class="post_input"><?php echo $weight; ?></div>
                                </li>
                            <?php endif; ?>

                            <!--<?php if (!empty($region)): ?>
                                <li class="post_item">
                                    <label class="spec_label">Område</label>
                                    <div class="post_input"><?php echo $region[0]->name; ?></div>
                                </li>
                            <?php endif; ?>-->
                        <?php endif; ?>

                        <?php if (!empty($gear_group) || !empty($front_gear) || !empty($rear_gear) || !empty($gear_shifters)): ?>
                            <h4 class="spec_title">Växlar</h4>

                            <?php if (!empty($gear_group) && (empty($front_gear) || empty($rear_gear) || empty($gear_shifters))): ?>
                                <li class="post_item">
                                    <label class="spec_label">Växelgrupp</label>
                                    <div class="post_input"><?php echo $gear_group; ?></div>
                                </li>
                            <?php endif; ?>

                            <?php if (!empty($front_gear)): ?>
                                <li class="post_item">
                                    <label class="spec_label">Framväxel</label>
                                    <div class="post_input"><?php echo $front_gear; ?></div>
                                </li>
                            <?php endif; ?>

                            <?php if (!empty($rear_gear)): ?>
                                <li class="post_item">
                                    <label class="spec_label">Bakväxel</label>
                                    <div class="post_input"><?php echo $rear_gear; ?></div>
                                </li>
                            <?php endif; ?>

                            <?php if (!empty($gear_shifters)): ?>
                                <li class="post_item">
                                    <label class="spec_label">Växelreglage</label>
                                    <div class="post_input"><?php echo $gear_shifters; ?></div>
                                </li>
                            <?php endif; ?>
                        <?php endif; ?>

                        <?php if (!empty($wheels) || !empty($rims) || !empty($front_hub) || !empty($rear_hub) || !empty($spokes) || !empty($tires)): ?>
                            <h4 class="spec_title">Hjul</h4>

                            <?php if (!empty($wheels)): ?>
                                <li class="post_item">
                                    <label class="spec_label">Hjul</label>
                                    <div class="post_input"><?php echo $wheels; ?></div>
                                </li>
                            <?php endif; ?>

                            <?php if (!empty($rims)): ?>
                                <li class="post_item">
                                    <label class="spec_label">Fälgar</label>
                                    <div class="post_input"><?php echo $rims; ?></div>
                                </li>
                            <?php endif; ?>

                            <?php if (!empty($front_hub)): ?>
                                <li class="post_item">
                                    <label class="spec_label">Framnav</label>
                                    <div class="post_input"><?php echo $front_hub; ?></div>
                                </li>
                            <?php endif; ?>

                            <?php if (!empty($rear_hub)): ?>
                                <li class="post_item">
                                    <label class="spec_label">Baknav</label>
                                    <div class="post_input"><?php echo $rear_hub; ?></div>
                                </li>
                            <?php endif; ?>

                            <?php if (!empty($spokes)): ?>
                                <li class="post_item">
                                    <label class="spec_label">Ekrar</label>
                                    <div class="post_input"><?php echo $spokes; ?></div>
                                </li>
                            <?php endif; ?>

                            <?php if (!empty($tires)): ?>
                                <li class="post_item">
                                    <label class="spec_label">Däck</label>
                                    <div class="post_input"><?php echo $tires; ?></div>
                                </li>
                            <?php endif; ?>
                         <?php endif; ?>

                        <?php if (!empty($break_levers) || !empty($front_break) || !empty($rear_break) || !empty($front_disc) || !empty($rear_disc)): ?>
                            <h4 class="spec_title">Bromsar</h4>

                            <?php if (!empty($break_levers)): ?>
                                <li class="post_item">
                                    <label class="spec_label">Bromsreglage</label>
                                    <div class="post_input"><?php echo $break_levers; ?></div>
                                </li>
                            <?php endif; ?>

                             <?php if (!empty($front_break)): ?>
                                <li class="post_item">
                                    <label class="spec_label">Frambroms</label>
                                    <div class="post_input"><?php echo $front_break; ?></div>
                                </li>
                            <?php endif; ?>

                            <?php if (!empty($rear_break)): ?>
                                <li class="post_item">
                                    <label class="spec_label">Bakbroms</label>
                                    <div class="post_input"><?php echo $rear_break; ?></div>
                                </li>
                            <?php endif; ?>

                            <?php if (!empty($front_disc)): ?>
                                <li class="post_item">
                                    <label class="spec_label">Bromsskiva fram</label>
                                    <div class="post_input"><?php echo $front_disc; ?></div>
                                </li>
                            <?php endif; ?>

                            <?php if (!empty($rear_disc)): ?>
                                <li class="post_item">
                                    <label class="spec_label">Bromsskiva bak</label>
                                    <div class="post_input"><?php echo $rear_disc; ?></div>
                                </li>
                            <?php endif; ?>
                        <?php endif; ?>

                        <?php if (!empty($crankset) || !empty($bottom_bracket) || !empty($cassette) || !empty($chain)): ?>
                            <h4 class="spec_title">Drivlina</h4>

                            <?php if (!empty($crankset)): ?>
                                <li class="post_item">
                                    <label class="spec_label">Vevparti</label>
                                    <div class="post_input"><?php echo $crankset; ?></div>
                                </li>
                            <?php endif; ?>

                             <?php if (!empty($bottom_bracket)): ?>
                                <li class="post_item">
                                    <label class="spec_label">Vevlager</label>
                                    <div class="post_input"><?php echo $bottom_bracket; ?></div>
                                </li>
                            <?php endif; ?>

                            <?php if (!empty($cassette)): ?>
                                <li class="post_item">
                                    <label class="spec_label">Kassett</label>
                                    <div class="post_input"><?php echo $cassette; ?></div>
                                </li>
                            <?php endif; ?>

                            <?php if (!empty($chain)): ?>
                                <li class="post_item">
                                    <label class="spec_label">Kedja</label>
                                    <div class="post_input"><?php echo $chain; ?></div>
                                </li>
                            <?php endif; ?>
                        <?php endif; ?>

                        <?php if (!empty($fork) || !empty($rear_shock) || !empty($remote_system)): ?>
                            <h4 class="spec_title">Dämpare</h4>

                            <?php if (!empty($fork)): ?>
                                <li class="post_item">
                                    <label class="spec_label">Framgaffel</label>
                                    <div class="post_input"><?php echo $fork; ?></div>
                                </li>
                            <?php endif; ?>

                            <?php if (!empty($rear_shock)): ?>
                                <li class="post_item">
                                    <label class="spec_label">Bakdämpare</label>
                                    <div class="post_input"><?php echo $rear_shock; ?></div>
                                </li>
                            <?php endif; ?>

                            <?php if (!empty($remote_system)): ?>
                                <li class="post_item">
                                    <label class="spec_label">Dämparreglage</label>
                                    <div class="post_input"><?php echo $remote_system; ?></div>
                                </li>
                            <?php endif; ?>
                        <?php endif; ?>

                        <?php if (!empty($handlebar) || !empty($stem) || !empty($headset) || !empty($seatpost) || !empty($saddle)): ?>
                            <h4 class="spec_title">Övrigt</h4>
                            
                            <?php if (!empty($handlebar)): ?>
                                <li class="post_item">
                                    <label class="spec_label">Styre</label>
                                    <div class="post_input"><?php echo $handlebar; ?></div>
                                </li>
                            <?php endif; ?>

                            <?php if (!empty($stem)): ?>
                                <li class="post_item">
                                    <label class="spec_label">Styrstam</label>
                                    <div class="post_input"><?php echo $stem; ?></div>
                                </li>
                            <?php endif; ?>

                            <?php if (!empty($headset)): ?>
                                <li class="post_item">
                                    <label class="spec_label">Styrlager</label>
                                    <div class="post_input"><?php echo $headset; ?></div>
                                </li>
                            <?php endif; ?>

                            <?php if (!empty($seatpost)): ?>
                                <li class="post_item">
                                    <label class="spec_label">Sadelstolpe</label>
                                    <div class="post_input"><?php echo $seatpost; ?></div>
                                </li>
                            <?php endif; ?>

                            <?php if (!empty($saddle)): ?>
                                <li class="post_item">
                                    <label class="spec_label">Sadel</label>
                                    <div class="post_input"><?php echo $saddle; ?></div>
                                </li>
                            <?php endif; ?>
                        <?php endif; ?>
                    </ul>

                    <?php if (!empty($fname) || !empty($lname) || !empty($email) || !empty($phone) || !empty($region)): ?>
                        <h4 class="spec_title spec_title--contact">Kontakt</h4>

                        <?php if (!empty($fname) && !empty($lname)): ?>
                            <li class="post_item">
                                <label class="spec_label">Säljare</label>
                                <div class="post_input"><?php echo $fname.' '.$lname; ?></div>
                            </li>
                        <?php endif; ?>

                        <?php if (!empty($email)): ?>
                            <li class="post_item">
                                <label class="spec_label">E-post</label>
                                <div class="post_input"><?php echo $email; ?></div>
                            </li>
                        <?php endif; ?>

                        <?php if (!empty($phone)): ?>
                            <li class="post_item">
                                <label class="spec_label">Telefon</label>
                                <div class="post_input"><?php echo $phone; ?></div>
                            </li>
                        <?php endif; ?>

                        <?php if (!empty($region)): ?>
                            <li class="post_item">
                                <label class="spec_label">Område</label>
                                <div class="post_input"><?php echo $region[0]->name; ?></div>
                            </li>
                        <?php endif; ?>
                    <?php endif; ?>

                </div>  
            </div>

        <?php endif; ?>

    <?php endwhile; ?>

<?php else: ?>

    <!-- Inte inloggad -->
    <?php while (have_posts()) : (the_post()); ?>

        <?php $image_args = array(
            'post_type' => 'attachment',
            'post_mime_type' => 'image',
            'post_parent' => $pid,
            'posts_per_page' => '1',
            'order' => 'DESC'
        ); ?>

        <?php $images = get_posts($image_args); ?>

        <?php foreach ($images as $image): ?> 
            <?php if (!empty($image)): ?>

                <?php $background = wp_get_attachment_image_src($image->ID, 'full'); ?>
      
            <?php endif; ?>
        <?php endforeach; ?>

        <div class="post_content">
            <div class="wrapper">
                <!-- <div class="post_image" style="background: url('<?php echo $background[0]; ?>'); background-size: cover; background-position: bottom center;"></div> -->
                <img src="<?php echo $background[0]; ?>" class="post_image">

                <h1 class="post_title"><?php the_title(); ?></h1>
                <div class="post_text"><?php the_content(); ?></div>
            </div>
        </div>

        <div class="wrapper">
            <div class="post_details">
                
                <!-- Pris -->
                <?php $sales_price = get_post_meta(get_the_ID(), 'sales-price', true); ?>

                <!-- Växelgrupp -->
                <?php $gear_group = get_post_meta(get_the_ID(), 'gear-group', true); ?>
                <?php $front_gear = get_post_meta(get_the_ID(), 'front-gear', true); ?>
                <?php $rear_gear = get_post_meta(get_the_ID(), 'rear-gear', true); ?>
                <?php $gear_shifters = get_post_meta(get_the_ID(), 'gear-shifters', true); ?>

                <!-- Hjul -->
                <?php $wheels = get_post_meta(get_the_ID(), 'wheels', true); ?>
                <?php $rims = get_post_meta(get_the_ID(), 'rims', true); ?>
                <?php $front_hub = get_post_meta(get_the_ID(), 'front-hub', true); ?>
                <?php $rear_hub = get_post_meta(get_the_ID(), 'rear-hub', true); ?>
                <?php $spokes = get_post_meta(get_the_ID(), 'spokes', true); ?>
                <?php $tires = get_post_meta(get_the_ID(), 'tires', true); ?>

                <!-- Bromsar -->
                <?php $break_levers = get_post_meta(get_the_ID(), 'break-levers', true); ?>
                <?php $front_break = get_post_meta(get_the_ID(), 'front-break', true); ?>
                <?php $rear_break = get_post_meta(get_the_ID(), 'rear-break', true); ?>
                <?php $front_disc = get_post_meta(get_the_ID(), 'front-disc', true); ?>
                <?php $rear_disc = get_post_meta(get_the_ID(), 'rear-disc', true); ?>

                <!-- Drivlina -->
                <?php $crankset = get_post_meta(get_the_ID(), 'crankset', true); ?>
                <?php $bottom_bracket = get_post_meta(get_the_ID(), 'bottom-bracket', true); ?>
                <?php $cassette = get_post_meta(get_the_ID(), 'cassette', true); ?>
                <?php $chain = get_post_meta(get_the_ID(), 'chain', true); ?>

                <!-- Dämpare -->
                <?php $fork = get_post_meta(get_the_ID(), 'fork', true); ?>
                <?php $rear_shock = get_post_meta(get_the_ID(), 'rear-shock', true); ?>
                <?php $remote_system = get_post_meta(get_the_ID(), 'remote-system', true); ?>

                <!-- Övrigt -->
                <?php $handlebar = get_post_meta(get_the_ID(), 'handlebar', true); ?>
                <?php $stem = get_post_meta(get_the_ID(), 'stem', true); ?>
                <?php $headset = get_post_meta(get_the_ID(), 'headset', true); ?>
                <?php $seatpost = get_post_meta(get_the_ID(), 'seatpost', true); ?>
                <?php $saddle = get_post_meta(get_the_ID(), 'saddle', true); ?>
                <?php $weight = get_post_meta(get_the_ID(), 'weight', true); ?>

                <!-- Datum -->
                <p>Publicerad: <?php the_time('Y.m.d - G:i'); ?></p>

                <!-- Område -->
                <?php $region = wp_get_object_terms($pid, 'region'); ?>

                <!-- Kategori -->
                <?php $category = wp_get_object_terms($pid, 'category'); ?>

                <!-- Varumärke -->
                <?php $brand = wp_get_object_terms($pid, 'brand'); ?>

                <!-- Årsmodell -->
                <?php $year = get_post_meta(get_the_ID(), 'year', true); ?>

                <!-- Storlek -->
                <?php $size = wp_get_object_terms($pid, 'size'); ?>

                <!-- Ram -->
                <?php $frame = get_post_meta(get_the_ID(), 'frame', true); ?>

                <!-- Säljare -->
                <?php $fname = get_post_meta(get_the_ID(), 'fname', true); ?>
                <?php $lname = get_post_meta(get_the_ID(), 'lname', true); ?>
                <?php $email = get_post_meta(get_the_ID(), 'email', true); ?>
                <?php $phone = get_post_meta(get_the_ID(), 'phone', true); ?>

                <?php if (!empty($sales_price)): ?>
                    <div class="post_details--price">
                        <p class="price-wrap--details"><span class="number"><?php echo $sales_price; ?></span> <span class="currancy">kr</span></p>
                    </div>
                <?php endif; ?>

                <ul class="post-list_single ui-list">
                    <?php if (!empty($category) || !empty($region) || !empty($weight) || !empty($brand) || !empty($year) || !empty($size) || !empty($frame)): ?>
                        <h4 class="spec_title">Allmänt</h4>

                        <?php if (!empty($category)): ?>
                            <li class="post_item">
                                <label class="spec_label">Kategori</label>
                                <div class="post_input"><?php echo $category[0]->name; ?></div>
                            </li>
                        <?php endif; ?>

                        <?php if (!empty($brand)): ?>
                            <li class="post_item">
                                <label class="spec_label">Märke</label>
                                <div class="post_input"><?php echo $brand[0]->name; ?></div>
                            </li>
                        <?php endif; ?>

                        <?php if (!empty($frame)): ?>
                            <li class="post_item">
                                <label class="spec_label">Ram</label>
                                <div class="post_input"><?php echo $frame; ?></div>
                            </li>
                        <?php endif; ?>

                        <?php if (!empty($size)): ?>
                            <li class="post_item">
                                <label class="spec_label">Storlek</label>
                                <div class="post_input"><?php echo $size[0]->name; ?></div>
                            </li>
                        <?php endif; ?>

                        <?php if (!empty($year)): ?>
                            <li class="post_item">
                                <label class="spec_label">Årsmodell</label>
                                <div class="post_input"><?php echo $year; ?></div>
                            </li>
                        <?php endif; ?>

                        <?php if (!empty($weight)): ?>
                            <li class="post_item">
                                <label class="spec_label">Vikt</label>
                                <div class="post_input"><?php echo $weight; ?></div>
                            </li>
                        <?php endif; ?>

                        <!--<?php if (!empty($region)): ?>
                            <li class="post_item">
                                <label class="spec_label">Område</label>
                                <div class="post_input"><?php echo $region[0]->name; ?></div>
                            </li>
                        <?php endif; ?>-->
                    <?php endif; ?>

                    <?php if (!empty($gear_group) || !empty($front_gear) || !empty($rear_gear) || !empty($gear_shifters)): ?>
                        <h4 class="spec_title">Växlar</h4>

                        <?php if (!empty($gear_group) && (empty($front_gear) || empty($rear_gear) || empty($gear_shifters))): ?>
                            <li class="post_item">
                                <label class="spec_label">Växelgrupp</label>
                                <div class="post_input"><?php echo $gear_group; ?></div>
                            </li>
                        <?php endif; ?>

                        <?php if (!empty($front_gear)): ?>
                            <li class="post_item">
                                <label class="spec_label">Framväxel</label>
                                <div class="post_input"><?php echo $front_gear; ?></div>
                            </li>
                        <?php endif; ?>

                        <?php if (!empty($rear_gear)): ?>
                            <li class="post_item">
                                <label class="spec_label">Bakväxel</label>
                                <div class="post_input"><?php echo $rear_gear; ?></div>
                            </li>
                        <?php endif; ?>

                        <?php if (!empty($gear_shifters)): ?>
                            <li class="post_item">
                                <label class="spec_label">Växelreglage</label>
                                <div class="post_input"><?php echo $gear_shifters; ?></div>
                            </li>
                        <?php endif; ?>
                    <?php endif; ?>

                    <?php if (!empty($wheels) || !empty($rims) || !empty($front_hub) || !empty($rear_hub) || !empty($spokes) || !empty($tires)): ?>
                        <h4 class="spec_title">Hjul</h4>

                        <?php if (!empty($wheels)): ?>
                            <li class="post_item">
                                <label class="spec_label">Hjul</label>
                                <div class="post_input"><?php echo $wheels; ?></div>
                            </li>
                        <?php endif; ?>

                        <?php if (!empty($rims)): ?>
                            <li class="post_item">
                                <label class="spec_label">Fälgar</label>
                                <div class="post_input"><?php echo $rims; ?></div>
                            </li>
                        <?php endif; ?>

                        <?php if (!empty($front_hub)): ?>
                            <li class="post_item">
                                <label class="spec_label">Framnav</label>
                                <div class="post_input"><?php echo $front_hub; ?></div>
                            </li>
                        <?php endif; ?>

                        <?php if (!empty($rear_hub)): ?>
                            <li class="post_item">
                                <label class="spec_label">Baknav</label>
                                <div class="post_input"><?php echo $rear_hub; ?></div>
                            </li>
                        <?php endif; ?>

                        <?php if (!empty($spokes)): ?>
                            <li class="post_item">
                                <label class="spec_label">Ekrar</label>
                                <div class="post_input"><?php echo $spokes; ?></div>
                            </li>
                        <?php endif; ?>

                        <?php if (!empty($tires)): ?>
                            <li class="post_item">
                                <label class="spec_label">Däck</label>
                                <div class="post_input"><?php echo $tires; ?></div>
                            </li>
                        <?php endif; ?>
                     <?php endif; ?>

                    <?php if (!empty($break_levers) || !empty($front_break) || !empty($rear_break) || !empty($front_disc) || !empty($rear_disc)): ?>
                        <h4 class="spec_title">Bromsar</h4>

                        <?php if (!empty($break_levers)): ?>
                            <li class="post_item">
                                <label class="spec_label">Bromsreglage</label>
                                <div class="post_input"><?php echo $break_levers; ?></div>
                            </li>
                        <?php endif; ?>

                         <?php if (!empty($front_break)): ?>
                            <li class="post_item">
                                <label class="spec_label">Frambroms</label>
                                <div class="post_input"><?php echo $front_break; ?></div>
                            </li>
                        <?php endif; ?>

                        <?php if (!empty($rear_break)): ?>
                            <li class="post_item">
                                <label class="spec_label">Bakbroms</label>
                                <div class="post_input"><?php echo $rear_break; ?></div>
                            </li>
                        <?php endif; ?>

                        <?php if (!empty($front_disc)): ?>
                            <li class="post_item">
                                <label class="spec_label">Bromsskiva fram</label>
                                <div class="post_input"><?php echo $front_disc; ?></div>
                            </li>
                        <?php endif; ?>

                        <?php if (!empty($rear_disc)): ?>
                            <li class="post_item">
                                <label class="spec_label">Bromsskiva bak</label>
                                <div class="post_input"><?php echo $rear_disc; ?></div>
                            </li>
                        <?php endif; ?>
                    <?php endif; ?>

                    <?php if (!empty($crankset) || !empty($bottom_bracket) || !empty($cassette) || !empty($chain)): ?>
                        <h4 class="spec_title">Drivlina</h4>

                        <?php if (!empty($crankset)): ?>
                            <li class="post_item">
                                <label class="spec_label">Vevparti</label>
                                <div class="post_input"><?php echo $crankset; ?></div>
                            </li>
                        <?php endif; ?>

                         <?php if (!empty($bottom_bracket)): ?>
                            <li class="post_item">
                                <label class="spec_label">Vevlager</label>
                                <div class="post_input"><?php echo $bottom_bracket; ?></div>
                            </li>
                        <?php endif; ?>

                        <?php if (!empty($cassette)): ?>
                            <li class="post_item">
                                <label class="spec_label">Kassett</label>
                                <div class="post_input"><?php echo $cassette; ?></div>
                            </li>
                        <?php endif; ?>

                        <?php if (!empty($chain)): ?>
                            <li class="post_item">
                                <label class="spec_label">Kedja</label>
                                <div class="post_input"><?php echo $chain; ?></div>
                            </li>
                        <?php endif; ?>
                    <?php endif; ?>

                    <?php if (!empty($fork) || !empty($rear_shock) || !empty($remote_system)): ?>
                        <h4 class="spec_title">Dämpare</h4>

                        <?php if (!empty($fork)): ?>
                            <li class="post_item">
                                <label class="spec_label">Framgaffel</label>
                                <div class="post_input"><?php echo $fork; ?></div>
                            </li>
                        <?php endif; ?>

                        <?php if (!empty($rear_shock)): ?>
                            <li class="post_item">
                                <label class="spec_label">Bakdämpare</label>
                                <div class="post_input"><?php echo $rear_shock; ?></div>
                            </li>
                        <?php endif; ?>

                        <?php if (!empty($remote_system)): ?>
                            <li class="post_item">
                                <label class="spec_label">Dämparreglage</label>
                                <div class="post_input"><?php echo $remote_system; ?></div>
                            </li>
                        <?php endif; ?>
                    <?php endif; ?>

                    <?php if (!empty($handlebar) || !empty($stem) || !empty($headset) || !empty($seatpost) || !empty($saddle)): ?>
                        <h4 class="spec_title">Övrigt</h4>
                        
                        <?php if (!empty($handlebar)): ?>
                            <li class="post_item">
                                <label class="spec_label">Styre</label>
                                <div class="post_input"><?php echo $handlebar; ?></div>
                            </li>
                        <?php endif; ?>

                        <?php if (!empty($stem)): ?>
                            <li class="post_item">
                                <label class="spec_label">Styrstam</label>
                                <div class="post_input"><?php echo $stem; ?></div>
                            </li>
                        <?php endif; ?>

                        <?php if (!empty($headset)): ?>
                            <li class="post_item">
                                <label class="spec_label">Styrlager</label>
                                <div class="post_input"><?php echo $headset; ?></div>
                            </li>
                        <?php endif; ?>

                        <?php if (!empty($seatpost)): ?>
                            <li class="post_item">
                                <label class="spec_label">Sadelstolpe</label>
                                <div class="post_input"><?php echo $seatpost; ?></div>
                            </li>
                        <?php endif; ?>

                        <?php if (!empty($saddle)): ?>
                            <li class="post_item">
                                <label class="spec_label">Sadel</label>
                                <div class="post_input"><?php echo $saddle; ?></div>
                            </li>
                        <?php endif; ?>
                    <?php endif; ?>
                </ul>

                <?php if (!empty($fname) || !empty($lname) || !empty($email) || !empty($phone) || !empty($region)): ?>
                    <h4 class="spec_title spec_title--contact">Kontakt</h4>

                    <?php if (!empty($fname) && !empty($lname)): ?>
                        <li class="post_item">
                            <label class="spec_label">Säljare</label>
                            <div class="post_input"><?php echo $fname.' '.$lname; ?></div>
                        </li>
                    <?php endif; ?>

                    <?php if (!empty($email)): ?>
                        <li class="post_item">
                            <label class="spec_label">E-post</label>
                            <div class="post_input"><?php echo $email; ?></div>
                        </li>
                    <?php endif; ?>

                    <?php if (!empty($phone)): ?>
                        <li class="post_item">
                            <label class="spec_label">Telefon</label>
                            <div class="post_input"><?php echo $phone; ?></div>
                        </li>
                    <?php endif; ?>

                    <?php if (!empty($region)): ?>
                        <li class="post_item">
                            <label class="spec_label">Område</label>
                            <div class="post_input"><?php echo $region[0]->name; ?></div>
                        </li>
                    <?php endif; ?>
                <?php endif; ?>

            </div>  
        </div>    

    <?php endwhile; ?>

<?php endif; ?>

<?php get_footer(); ?>