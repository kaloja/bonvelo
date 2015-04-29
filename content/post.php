<main class="post" role="main">
  <form method="post" name="post" action="" enctype="multipart/form-data">
    <div class="post_content">
      <div class="wrapper">

        <div class="post_file">
          <span>Lägg till annonsbild</span>
          <input type="file" class="post_file--upload" name="post_file--upload">
        </div>

        <div class="post_file--preview"></div>

        <textarea class="post_title" name="post_title" placeholder="Skriv din rubrik här..." rows="1" cols="0" autofocus></textarea>
        <textarea class="post_text" name="post_text" placeholder="Skriv en kort beskrivning om cykeln här..." rows="1" cols="0"></textarea>

      </div>
    </div>

    <div class="wrapper">
      <div class="post_details">

        <ul class="post_list ui-list">
          <li class="post_item">
            <input type="text" class="post_gear-group post_input" name="post_gear-group" value="" placeholder="Växelgrupp" />
          </li>

          <li class="post_item">
            <input type="text" class="post_wheels post_input" name="post_wheels" value="" placeholder="Hjul" />
          </li>
          
          <li class="post_item">
            <input type="text" class="post_year post_input" name="post_year" value="" placeholder="Årsmodell" />
          </li>

          <li class="post_item">
            <input type="text" class="post_sales-price post_input" name="post_sales-price" value="" placeholder="Pris" />
          </li>

          <li class="post_item">
            <input type="text" class="post_phone post_input" name="post_phone" value="" placeholder="Telefon (valfri)"/>
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
            <input type="text" class="post_front-gear post_input" name="post_front-gear" value="" placeholder="Framväxel"/>
            <input type="text" class="post_rear-gear post_input" name="post_rear-gear" value="" placeholder="Bakväxel"/>
            <input type="text" class="post_gear-shifters post_input" name="post_gear-shifters" value="" placeholder="Växelreglage"/>
          </div>

          <div class="input_container">
            <h4 class="spec_title">Hjul</h4>
            <input type="text" class="post_rims post_input" name="post_rims" value="" placeholder="Fälgar"/>
            <input type="text" class="post_front-hub post_input" name="post_front-hub" value="" placeholder="Framnav"/>
            <input type="text" class="post_rear-hub post_input" name="post_rear-hub" value="" placeholder="Baknav"/>
            <input type="text" class="post_spokes post_input" name="post_spokes" value="" placeholder="Ekrar"/>
            <input type="text" class="post_tires post_input" name="post_tires" value="" placeholder="Däck"/>
          </div>

          <div class="input_container">
            <h4 class="spec_title">Bromsar</h4>
            <input type="text" class="post_brake-levers post_input" name="post_break-levers" value="" placeholder="Bromsreglage"/>
            <input type="text" class="post_front-brake post_input" name="post_front-break" value="" placeholder="Frambroms"/>
            <input type="text" class="post_rear-brake post_input" name="post_rear-break" value="" placeholder="Bakbroms"/>
            <input type="text" class="post_front-disc post_input" name="post_front-disc" value="" placeholder="Bromsskiva fram"/>
            <input type="text" class="post_rear-disc post_input" name="post_rear-disc" value="" placeholder="Bromsskiva bak"/>
          </div>

          <div class="input_container">
            <h4 class="spec_title">Drivlina</h4>
            <input type="text" class="post_crankset post_input" name="post_crankset" value="" placeholder="Vevparti"/>
            <input type="text" class="post_bottom-bracket post_input" name="post_bottom-bracket" value="" placeholder="Vevlager"/>
            <input type="text" class="post_cassette post_input" name="post_cassette" value="" placeholder="Kassett"/>
            <input type="text" class="post_chain post_input" name="post_chain" value="" placeholder="Kedja"/>
          </div>

          <div class="input_container">
            <h4 class="spec_title">Dämpare</h4>
            <input type="text" class="post_fork post_input" name="post_fork" value="" placeholder="Framgaffel"/>
            <input type="text" class="post_rear-shock post_input" name="post_rear-shock" value="" placeholder="Bakdämpare"/>
            <input type="text" class="post_remote-system post_input" name="post_remote-system" value="" placeholder="Dämparreglage"/>
          </div>

          <div class="input_container">
            <h4 class="spec_title">Övrigt</h4>
            <input type="text" class="post_handlebar post_input" name="post_handlebar" value="" placeholder="Styre"/>
            <input type="text" class="post_stem post_input" name="post_stem" value="" placeholder="Styrstam"/>
            <input type="text" class="post_headset post_input" name="post_headset" value="" placeholder="Styrlager"/>
            <input type="text" class="post_seatpost post_input" name="post_seatpost" value="" placeholder="Sadelstolpe"/>
            <input type="text" class="post_saddle post_input" name="post_saddle" value="" placeholder="Sadel"/>
            <input type="text" class="post_weight post_input" name="post_weight" value="" placeholder="Vikt"/>
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
              <span>Välj kategori</span>
              <input type="hidden" name="post_category" value="">
            </div>
          </li>

          <li class="post_item">
            <div class="dropdown js-brand-btn">
              <span>Välj märke</span>
              <input type="hidden" name="post_brand" value="">
            </div>
          </li>

          <li class="post_item">
            <div class="dropdown js-size-btn">
              <span>Välj storlek</span>
              <input type="hidden" name="post_size" value="">
            </div>
          </li>

          <li class="post_item">
            <div class="dropdown js-region-btn">
              <span>Välj område</span>
              <input type="hidden" name="post_region" value="">
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

         <ul class="post_list ui-list">
          <li class="post_item">
            <button name="submit" class="post_submit" title="Publicera annons">Publicera</button>
            <input type="hidden" name="action" value="Post"/>
            <input type="hidden" name="post_type" value="Annons"/>
          </li>
         </ul>

        <?php endif; ?>
        
      </div>
    </div>
  </form>
</main>
