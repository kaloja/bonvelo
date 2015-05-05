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
                                <input type="text" class="post_gear-group post_input" name="post_gear-group" value="<?php echo $gear_group; ?>" placeholder="Växelgrupp" />
                            </li>

                            <li class="post_item">
                                <input type="text" class="post_wheels post_input" name="post_wheels" value="<?php echo $wheels; ?>" placeholder="Hjul" />
                            </li>
                
                            <li class="post_item">
                                <input type="text" class="post_year post_input" name="post_year" value="<?php echo $year; ?>" placeholder="Årsmodell" />
                            </li>

                            <li class="post_item">
                                <input type="text" class="post_sales-price post_input" name="post_sales-price" value="<?php echo $sales_price; ?>" placeholder="Pris" />
                            </li>

                            <li class="post_item">
                                <input type="text" class="post_phone post_input" name="post_phone" value="<?php echo $phone; ?>" placeholder="Telefon (valfri)"/>
                            </li>

                            <li class="post_item">
                                <div class="post_spec--btn js-spec">
                                    <span>Lägg till specifikation</span>
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
                                    <span><?php echo $category[0]->name; ?></span>
                                    <input type="hidden" name="post_category" value="<?php echo $category[0]->name; ?>">
                                </div>
                            </li>

                            <li class="post_item">
                                <div class="dropdown js-brand-btn">
                                    <span><?php echo $brand[0]->name; ?></span>
                                    <input type="hidden" name="post_brand" value="<?php echo $brand[0]->name; ?>">
                                </div>
                            </li>

                            <li class="post_item">
                                <div class="dropdown js-size-btn">
                                    <span><?php echo $size[0]->name; ?></span>
                                    <input type="hidden" name="post_size" value="<?php echo $size[0]->name; ?>">
                                </div>
                            </li>

                            <li class="post_item">
                                <div class="dropdown js-region-btn">
                                    <span><?php echo $region[0]->name; ?></span>
                                    <input type="hidden" name="post_region" value="<?php echo $region[0]->name; ?>">
                                </div>
                            </li>
                        </ul>

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

            <div class="wrapper">
                <!-- Inloggad men inte skapare av aktuell annons -->

                <!-- Rubrik -->
                <?php the_title(); ?>

                <!-- Datum -->
                <p>Publicerad: <?php the_time('Y.m.d - G:i'); ?></p>

                <!-- Område -->
                <?php $region = wp_get_object_terms($pid, 'region'); ?>

                <p>Område: <?php echo $region[0]->name; ?></p>

                <!-- Kategori -->
                <?php $category = wp_get_object_terms($pid, 'category'); ?>

                <p>Kategori: <?php echo $category[0]->name; ?></p>

                <!-- Varumärke -->
                <?php $brand = wp_get_object_terms($pid, 'brand'); ?>

                <p>Varumärke: <?php echo $brand[0]->name; ?></p>

                <!-- Årsmodell -->
                <?php $year = get_post_meta(get_the_ID(), 'year', true); ?>

                <?php if (!empty($year)): ?>
                    <p>Årsmodell: <?php echo $year; ?></p>
                <?php endif; ?>

                <!-- Storlek -->
                <?php $size = wp_get_object_terms($pid, 'size'); ?>

                <p>Storlek: <?php echo $size[0]->name; ?></p>

                <!-- Annonstext -->
                <?php the_content(); ?>

                <!-- Växelgrupp -->
                <?php $gear_group = get_post_meta(get_the_ID(), 'gear-group', true); ?>

                <?php if (!empty($gear_group)): ?>
                    <p>Växelgrupp: <?php echo $gear_group; ?></p>
                <?php endif; ?>

                <?php $front_gear = get_post_meta(get_the_ID(), 'front-gear', true); ?>

                <?php if (!empty($front_gear)): ?>
                    <p>Framväxel: <?php echo $front_gear; ?></p>
                <?php endif; ?>

                <?php $rear_gear = get_post_meta(get_the_ID(), 'rear-gear', true); ?>

                <?php if (!empty($rear_gear)): ?>
                    <p>Bakväxel: <?php echo $rear_gear; ?></p>
                <?php endif; ?>

                <?php $gear_shifters = get_post_meta(get_the_ID(), 'gear-shifters', true); ?>

                <?php if (!empty($gear_shifters)): ?>
                    <p>Växelreglage: <?php echo $gear_shifters; ?></p>
                <?php endif; ?>

                <!-- Hjul -->
                <?php $wheels = get_post_meta(get_the_ID(), 'wheels', true); ?>

                <?php if (!empty($wheels)): ?>
                    <p>Hjul: <?php echo $wheels; ?></p>
                <?php endif; ?>

                <?php $rims = get_post_meta(get_the_ID(), 'rims', true); ?>

                <?php if (!empty($rims)): ?>
                    <p>Fälgar: <?php echo $rims; ?></p>
                <?php endif; ?>

                <?php $front_hub = get_post_meta(get_the_ID(), 'front-hub', true); ?>

                <?php if (!empty($front_hub)): ?>
                    <p>Framnav: <?php echo $front_hub; ?></p>
                <?php endif; ?>

                <?php $rear_hub = get_post_meta(get_the_ID(), 'rear-hub', true); ?>

                <?php if (!empty($rear_hub)): ?>
                    <p>Baknav: <?php echo $rear_hub; ?></p>
                <?php endif; ?>

                <?php $spokes = get_post_meta(get_the_ID(), 'spokes', true); ?>

                <?php if (!empty($spokes)): ?>
                    <p>Ekrar: <?php echo $spokes; ?></p>
                <?php endif; ?>

                <?php $tires = get_post_meta(get_the_ID(), 'tires', true); ?>

                <?php if (!empty($tires)): ?>
                    <p>Däck: <?php echo $tires; ?></p>
                <?php endif; ?>

                <?php $front_hub = get_post_meta(get_the_ID(), 'front-hub', true); ?>

                <?php if (!empty($front_hub)): ?>
                    <p>Framnav: <?php echo $front_hub; ?></p>
                <?php endif; ?>

                <!-- Bromsar -->
                <?php $break_levers = get_post_meta(get_the_ID(), 'break-levers', true); ?>

                <?php if (!empty($break_levers)): ?>
                    <p>Bromsreglage: <?php echo $break_levers; ?></p>
                <?php endif; ?>

                <?php $front_break = get_post_meta(get_the_ID(), 'front-break', true); ?>

                <?php if (!empty($front_break)): ?>
                    <p>Frambroms: <?php echo $front_break; ?></p>
                <?php endif; ?>

                <?php $rear_break = get_post_meta(get_the_ID(), 'rear-break', true); ?>

                <?php if (!empty($rear_break)): ?>
                    <p>Bakbroms: <?php echo $rear_break; ?></p>
                <?php endif; ?>

                <?php $front_disc = get_post_meta(get_the_ID(), 'front-disc', true); ?>

                <?php if (!empty($front_disc)): ?>
                    <p>Skivbroms fram: <?php echo $front_disc; ?></p>
                <?php endif; ?>

                <?php $rear_disc = get_post_meta(get_the_ID(), 'rear-disc', true); ?>

                <?php if (!empty($rear_disc)): ?>
                    <p>Skivbroms bak: <?php echo $rear_disc; ?></p>
                <?php endif; ?>

                <?php $crankset = get_post_meta(get_the_ID(), 'crankset', true); ?>

                <?php if (!empty($crankset)): ?>
                    <p>Vevpart: <?php echo $crankset; ?></p>
                <?php endif; ?>

                <?php $bottom_bracket = get_post_meta(get_the_ID(), 'bottom-bracket', true); ?>

                <?php if (!empty($bottom_bracket)): ?>
                    <p>Vevlager: <?php echo $bottom_bracket; ?></p>
                <?php endif; ?>

                <?php $cassette = get_post_meta(get_the_ID(), 'cassette', true); ?>

                <?php if (!empty($cassette)): ?>
                    <p>Kassett: <?php echo $cassette; ?></p>
                <?php endif; ?>

                <?php $chain = get_post_meta(get_the_ID(), 'chain', true); ?>

                <?php if (!empty($chain)): ?>
                    <p>Kedja: <?php echo $chain; ?></p>
                <?php endif; ?>

                <?php $fork = get_post_meta(get_the_ID(), 'fork', true); ?>

                <?php if (!empty($fork)): ?>
                    <p>Framgaffel: <?php echo $fork; ?></p>
                <?php endif; ?>

                <?php $rear_shock = get_post_meta(get_the_ID(), 'rear-shock', true); ?>

                <?php if (!empty($rear_shock)): ?>
                    <p>Bakdämpare: <?php echo $rear_shock; ?></p>
                <?php endif; ?>

                <?php $remote_system = get_post_meta(get_the_ID(), 'remote-system', true); ?>

                <?php if (!empty($remote_system)): ?>
                    <p>Dämparreglage: <?php echo $remote_system; ?></p>
                <?php endif; ?>

                <?php $handlebar = get_post_meta(get_the_ID(), 'handlebar', true); ?>

                <?php if (!empty($handlebar)): ?>
                    <p>Styre: <?php echo $handlebar; ?></p>
                <?php endif; ?>

                <?php $stem = get_post_meta(get_the_ID(), 'stem', true); ?>

                <?php if (!empty($stem)): ?>
                    <p>Styrstam: <?php echo $stem; ?></p>
                <?php endif; ?>

                <?php $headset = get_post_meta(get_the_ID(), 'headset', true); ?>

                <?php if (!empty($headset)): ?>
                    <p>Styrlager: <?php echo $headset; ?></p>
                <?php endif; ?>

                <?php $seatpost = get_post_meta(get_the_ID(), 'seatpost', true); ?>

                <?php if (!empty($seatpost)): ?>
                    <p>Sadelstolpe: <?php echo $seatpost; ?></p>
                <?php endif; ?>

                <?php $saddle = get_post_meta(get_the_ID(), 'saddle', true); ?>

                <?php if (!empty($saddle)): ?>
                    <p>Sadel: <?php echo $saddle; ?></p>
                <?php endif; ?>

                <?php $weight = get_post_meta(get_the_ID(), 'weight', true); ?>

                <?php if (!empty($weight)): ?>
                    <p>Vikt: <?php echo $weight; ?></p>
                <?php endif; ?>

                <!-- Pris -->
                <?php $sales_price = get_post_meta(get_the_ID(), 'sales-price', true); ?>

                <?php if (!empty($sales_price)): ?>
                    <p>Pris: <span class="number"><?php echo $sales_price; ?></span> SEK</p>
                <?php endif; ?>

                <!-- Säljare -->
                <?php $fname = get_post_meta(get_the_ID(), 'fname', true); ?>
                <?php $lname = get_post_meta(get_the_ID(), 'lname', true); ?>
                <?php $email = get_post_meta(get_the_ID(), 'email', true); ?>
                <?php $phone = get_post_meta(get_the_ID(), 'phone', true); ?>

                <p>Säljare: <?php echo $fname.' '.$lname; ?></p>
                <p>E-post: <?php echo $email; ?></p>
                <p>Telefon: <?php echo $phone; ?></p>

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


            <!-- Datum -->
            <p>Publicerad: <?php the_time('Y.m.d - G:i'); ?></p>

            <!-- Område -->
            <?php $region = wp_get_object_terms($pid, 'region'); ?>

            <p>Område: <?php echo $region[0]->name; ?></p>

            <!-- Kategori -->
            <?php $category = wp_get_object_terms($pid, 'category'); ?>

            <p>Kategori: <?php echo $category[0]->name; ?></p>

            <!-- Varumärke -->
            <?php $brand = wp_get_object_terms($pid, 'brand'); ?>

            <p>Varumärke: <?php echo $brand[0]->name; ?></p>

            <!-- Årsmodell -->
            <?php $year = get_post_meta(get_the_ID(), 'year', true); ?>

            <?php if (!empty($year)): ?>
              <p>Årsmodell: <?php echo $year; ?></p>
            <?php endif; ?>

            <!-- Storlek -->
            <?php $size = wp_get_object_terms($pid, 'size'); ?>

            <p>Storlek: <?php echo $size[0]->name; ?></p>

            <!-- Växelgrupp -->
            <?php $gear_group = get_post_meta(get_the_ID(), 'gear-group', true); ?>

            <?php if (!empty($gear_group)): ?>
              <p>Växelgrupp: <?php echo $gear_group; ?></p>
            <?php endif; ?>

            <?php $front_gear = get_post_meta(get_the_ID(), 'front-gear', true); ?>

            <?php if (!empty($front_gear)): ?>
              <p>Framväxel: <?php echo $front_gear; ?></p>
            <?php endif; ?>

            <?php $rear_gear = get_post_meta(get_the_ID(), 'rear-gear', true); ?>

            <?php if (!empty($rear_gear)): ?>
              <p>Bakväxel: <?php echo $rear_gear; ?></p>
            <?php endif; ?>

            <?php $gear_shifters = get_post_meta(get_the_ID(), 'gear-shifters', true); ?>

            <?php if (!empty($gear_shifters)): ?>
              <p>Växelreglage: <?php echo $gear_shifters; ?></p>
            <?php endif; ?>

            <!-- Hjul -->
            <?php $wheels = get_post_meta(get_the_ID(), 'wheels', true); ?>

            <?php if (!empty($wheels)): ?>
              <p>Hjul: <?php echo $wheels; ?></p>
            <?php endif; ?>

            <?php $rims = get_post_meta(get_the_ID(), 'rims', true); ?>

            <?php if (!empty($rims)): ?>
              <p>Fälgar: <?php echo $rims; ?></p>
            <?php endif; ?>

            <?php $front_hub = get_post_meta(get_the_ID(), 'front-hub', true); ?>

            <?php if (!empty($front_hub)): ?>
              <p>Framnav: <?php echo $front_hub; ?></p>
            <?php endif; ?>

            <?php $rear_hub = get_post_meta(get_the_ID(), 'rear-hub', true); ?>

            <?php if (!empty($rear_hub)): ?>
              <p>Baknav: <?php echo $rear_hub; ?></p>
            <?php endif; ?>

            <?php $spokes = get_post_meta(get_the_ID(), 'spokes', true); ?>

            <?php if (!empty($spokes)): ?>
              <p>Ekrar: <?php echo $spokes; ?></p>
            <?php endif; ?>

            <?php $tires = get_post_meta(get_the_ID(), 'tires', true); ?>

            <?php if (!empty($tires)): ?>
              <p>Däck: <?php echo $tires; ?></p>
            <?php endif; ?>

            <?php $front_hub = get_post_meta(get_the_ID(), 'front-hub', true); ?>

            <?php if (!empty($front_hub)): ?>
              <p>Framnav: <?php echo $front_hub; ?></p>
            <?php endif; ?>

            <!-- Bromsar -->
            <?php $break_levers = get_post_meta(get_the_ID(), 'break-levers', true); ?>

            <?php if (!empty($break_levers)): ?>
              <p>Bromsreglage: <?php echo $break_levers; ?></p>
            <?php endif; ?>

            <?php $front_break = get_post_meta(get_the_ID(), 'front-break', true); ?>

            <?php if (!empty($front_break)): ?>
              <p>Frambroms: <?php echo $front_break; ?></p>
            <?php endif; ?>

            <?php $rear_break = get_post_meta(get_the_ID(), 'rear-break', true); ?>

            <?php if (!empty($rear_break)): ?>
              <p>Bakbroms: <?php echo $rear_break; ?></p>
            <?php endif; ?>

            <?php $front_disc = get_post_meta(get_the_ID(), 'front-disc', true); ?>

            <?php if (!empty($front_disc)): ?>
              <p>Skivbroms fram: <?php echo $front_disc; ?></p>
            <?php endif; ?>

            <?php $rear_disc = get_post_meta(get_the_ID(), 'rear-disc', true); ?>

            <?php if (!empty($rear_disc)): ?>
              <p>Skivbroms bak: <?php echo $rear_disc; ?></p>
            <?php endif; ?>

            <?php $crankset = get_post_meta(get_the_ID(), 'crankset', true); ?>

            <?php if (!empty($crankset)): ?>
              <p>Vevpart: <?php echo $crankset; ?></p>
            <?php endif; ?>

            <?php $bottom_bracket = get_post_meta(get_the_ID(), 'bottom-bracket', true); ?>

            <?php if (!empty($bottom_bracket)): ?>
              <p>Vevlager: <?php echo $bottom_bracket; ?></p>
            <?php endif; ?>

            <?php $cassette = get_post_meta(get_the_ID(), 'cassette', true); ?>

            <?php if (!empty($cassette)): ?>
              <p>Kassett: <?php echo $cassette; ?></p>
            <?php endif; ?>

            <?php $chain = get_post_meta(get_the_ID(), 'chain', true); ?>

            <?php if (!empty($chain)): ?>
              <p>Kedja: <?php echo $chain; ?></p>
            <?php endif; ?>

            <?php $fork = get_post_meta(get_the_ID(), 'fork', true); ?>

            <?php if (!empty($fork)): ?>
              <p>Framgaffel: <?php echo $fork; ?></p>
            <?php endif; ?>

            <?php $rear_shock = get_post_meta(get_the_ID(), 'rear-shock', true); ?>

            <?php if (!empty($rear_shock)): ?>
              <p>Bakdämpare: <?php echo $rear_shock; ?></p>
            <?php endif; ?>

            <?php $remote_system = get_post_meta(get_the_ID(), 'remote-system', true); ?>

            <?php if (!empty($remote_system)): ?>
              <p>Dämparreglage: <?php echo $remote_system; ?></p>
            <?php endif; ?>

            <?php $handlebar = get_post_meta(get_the_ID(), 'handlebar', true); ?>

            <?php if (!empty($handlebar)): ?>
              <p>Styre: <?php echo $handlebar; ?></p>
            <?php endif; ?>

            <?php $stem = get_post_meta(get_the_ID(), 'stem', true); ?>

            <?php if (!empty($stem)): ?>
              <p>Styrstam: <?php echo $stem; ?></p>
            <?php endif; ?>

            <?php $headset = get_post_meta(get_the_ID(), 'headset', true); ?>

            <?php if (!empty($headset)): ?>
              <p>Styrlager: <?php echo $headset; ?></p>
            <?php endif; ?>

            <?php $seatpost = get_post_meta(get_the_ID(), 'seatpost', true); ?>

            <?php if (!empty($seatpost)): ?>
              <p>Sadelstolpe: <?php echo $seatpost; ?></p>
            <?php endif; ?>

            <?php $saddle = get_post_meta(get_the_ID(), 'saddle', true); ?>

            <?php if (!empty($saddle)): ?>
              <p>Sadel: <?php echo $saddle; ?></p>
            <?php endif; ?>

            <?php $weight = get_post_meta(get_the_ID(), 'weight', true); ?>

            <?php if (!empty($weight)): ?>
              <p>Vikt: <?php echo $weight; ?></p>
            <?php endif; ?>

            <!-- Pris -->
            <?php $sales_price = get_post_meta(get_the_ID(), 'sales-price', true); ?>

            <?php if (!empty($sales_price)): ?>
              <p>Pris: <span class="number"><?php echo $sales_price; ?></span> SEK</p>
            <?php endif; ?>

            <!-- Säljare -->
            <?php $fname = get_post_meta(get_the_ID(), 'fname', true); ?>
            <?php $lname = get_post_meta(get_the_ID(), 'lname', true); ?>
            <?php $email = get_post_meta(get_the_ID(), 'email', true); ?>
            <?php $phone = get_post_meta(get_the_ID(), 'phone', true); ?>

            <p>Säljare: <?php echo $fname.' '.$lname; ?></p>
            <p>E-post: <?php echo $email; ?></p>
            <p>Telefon: <?php echo $phone; ?></p>

        </div>    

    <?php endwhile; ?>

<?php endif; ?>

<?php get_footer(); ?>