<?php if ($module_position == 'content_bottom') { ?>
<div class="box" id="earthball">
  <div class="box-heading"><?php echo $heading_title; ?></div>
  <div class="box-content">
    <div class="box-globe">
      <?php if ($show_globe) { ?>
      <div id="globe" style="text-align: center;"><?php echo $earthball_code; ?></div>
      <?php } ?>
    </div>
    <div class="box-visitors">
      <?php if ($show_visitors) { ?>
      <div class="earthball"><?php echo $text_visitors; ?>
        <ul>
          <li><?php echo $text_total_visitors; ?></li>
          <li><?php echo $text_page_views; ?></li>
        </ul>
      </div>
      <?php } ?>
    </div>
    <div class="box-online">
      <div class="earthball"><?php echo $text_whos_online; ?>
        <ul>
          <li><?php echo $text_online_guests; ?></li>
          <li><?php echo $text_online_customers; ?></li>
        </ul>
      </div>
    </div>
  </div>
</div>
<?php } else { ?>
<div class="box">
  <div class="box-heading"><?php echo $heading_title; ?></div>
  <div class="box-content">
    <?php if ($show_globe) { ?>
    <div id="globe" style="text-align: center;"><?php echo $earthball_code; ?></div>
    <?php } ?>
    <?php if ($show_visitors) { ?>
    <div class="earthball"><?php echo $text_visitors; ?>
      <ul>
        <li><?php echo $text_total_visitors; ?></li>
        <li><?php echo $text_page_views; ?></li>
      </ul>
    </div>
    <?php } ?>
    <div class="earthball"><?php echo $text_whos_online; ?>
      <ul>
        <li><?php echo $text_online_guests; ?></li>
        <li><?php echo $text_online_customers; ?></li>
      </ul>
    </div>
  </div>
</div>
<?php } ?>
