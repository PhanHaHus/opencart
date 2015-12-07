<?php echo $header; ?>
<div id="content">
  <div class="breadcrumb">
    <?php foreach ($breadcrumbs as $breadcrumb) { ?>
    <?php echo $breadcrumb['separator']; ?><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a>
    <?php } ?>
  </div>
  <div class="box">
    <div class="heading">
      <h1><img src="view/image/customer.png" alt="" /> <?php echo $heading_title; ?></h1>
      <div class="buttons"><a onclick="location = '<?php echo $refresh_list; ?>'" class="button"><span><?php echo $button_refresh_list; ?></span></a></div>
    </div>
    <div class="content">
      <table class="list">
        <thead>
          <tr>
            <td class="left" style="width: 15%;"><?php echo $column_online; ?></td>
            <td class="right" style="width: 4%;"><?php echo $column_customer_id; ?></td>
            <td class="left"><?php echo $column_full_name; ?></td>
            <td class="left" style="width: 9%;"><?php echo $column_ip_address; ?></td>
            <td class="left" style="width: 7%;"><?php echo $column_entry_time; ?></td>
            <td class="left" style="width: 7%;"><?php echo $column_last_click; ?></td>
            <td class="left" style="width: 15%;"><?php echo $column_last_url; ?></td>
            <td class="left" style="width: 20%;"><?php echo $column_shopping_cart; ?></td>
          </tr>
        </thead>
        <tbody>
        <?php if ($online_customers) { ?>
        <?php $class = 'odd'; ?>
        <?php foreach ($online_customers as $online_customer) { ?>
        <?php $class = ($class == 'even' ? 'odd' : 'even'); ?>
          <tr class="<?php echo $class; ?>">
            <td class="left" style="vertical-align: top;"><?php echo $online_customer['time_online']; ?>
              <div class="online">
                <p><?php echo $online_customer['time_since_last']; ?></p>
              </div></td>
            <td class="right" style="vertical-align: top;"><?php echo $online_customer['customer_id']; ?></td>
            <td class="left" style="vertical-align: top;"><?php echo $online_customer['full_name']; ?>
              <div class="online">
                <p><?php echo $online_customer['session_id']; ?></p>
                <p><?php echo $online_customer['host_address']; ?></p>
                <p><?php echo $online_customer['user_agent'] ?></p>
              </div></td>
            <td class="left" style="vertical-align: top;"><a onclick="window.open('<?php echo $whois_lookup; ?><?php echo $online_customer['ip_address']; ?>');"><?php echo $online_customer['ip_address']; ?></a></td>
            <td class="left" style="vertical-align: top;"><?php echo $online_customer['time_entry']; ?></td>
            <td class="left" style="vertical-align: top;"><?php echo $online_customer['time_last_click']; ?></td>
            <td class="left" style="vertical-align: top;"><?php echo $online_customer['last_page_url']; ?></td>
            <td class="left" style="vertical-align: top;"><?php if ($online_customer['shopping_cart']) { ?>
                <?php foreach ($online_customer['shopping_cart'] as $product) { ?>
                <?php echo $product['quantity']; ?> x <?php echo $product['product_name']; ?><br />
                <?php } ?>
                <?php } else { ?>
                <?php echo $text_cart_empty; ?>
              <?php } ?></td>
          </tr>
        <?php } ?>
        <?php } ?>
        </tbody>
      </table>
      <div>
        <?php echo $text_online; ?><br />
        <?php echo $text_customers_online; ?><br />
        <?php echo $text_guests_online; ?><br />
        <?php echo $text_bots_online; ?><br />
        <?php echo $text_duplicate; ?><br />
        <?php echo $text_unique; ?><br />
        <?php echo $text_expiry_time; ?><br />
      </div>
    </div>
  </div>
</div>
<?php echo $footer; ?>
