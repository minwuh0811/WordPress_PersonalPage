<div class="mega-price-table-8" style="transform: scale(1.0<?php echo $zoom; ?>);">
  <div class="price-head" style="background-color: <?php echo $top_bg; ?>;">
    <h3 style="font-size: <?php echo $titlesize; ?>px; color: <?php echo $title_clr; ?>;"><?php echo $price_title; ?></h3>
    <h5 style="color: <?php echo $title_clr; ?>;"><?php echo $subtitle; ?></h5>
  </div>
  <div class="price-box" style="background-color: <?php echo $top_bg; ?>;">
    <span class="plan-price" style="color: <?php echo $amount_clr; ?>; font-size: <?php echo $amountsize; ?>px;"><?php echo $price_currency; ?><?php echo $price_amount; ?></span>
    <span class="plan-type" style="color: <?php echo $amount_clr; ?>; font-size: <?php echo $planesize; ?>px;"><?php echo $price_plan; ?></span>
  </div>

  <div class="price-content" style="background-color: <?php echo $price_bg; ?>;">
    <?php echo $content; ?>
  </div>

  <div class="price-table-wrap" style="background-color: <?php echo $price_bg; ?>;">
    <a href="<?php echo $btn_url; ?>" class="price-table-btn" style="font-size: <?php echo $btnsize; ?>px; background: <?php echo $top_bg; ?>;">
      <?php echo $btn_text; ?>
    </a>
  </div>
</div>