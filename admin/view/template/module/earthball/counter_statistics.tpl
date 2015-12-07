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
    </div>
    <div class="content">
      <div style="float: left; width: 42%;">
        <div class="online_boxtop">
          <div class="heading"><?php echo $heading_statistics; ?></div>
        </div>
        <div class="online_box">
          <h4><?php echo $text_overview; ?></h4>
          <table class="list">
            <tr>
              <td style="text-align: left;"><?php echo $text_counter_start_date; ?></td>
              <td style="text-align: right; width: 20%;"><?php echo $counter_start_date; ?></td>
            </tr>
            <tr>
              <td style="text-align: left;"><?php echo $text_days_online; ?></td>
              <td style="text-align: right;"><?php echo $days_online; ?></td>
            </tr>
            <tr>
              <td style="text-align: left;"><?php echo $text_weeks_online; ?></td>
              <td style="text-align: right;"><?php echo $weeks_online; ?></td>
            </tr>
            <tr>
              <td style="text-align: left;"><?php echo $text_months_online; ?></td>
              <td style="text-align: right;"><?php echo $months_online; ?></td>
            </tr>
          </table>
          <h4><?php echo $text_totals; ?></h4>
          <table class="list">
            <tr>
              <td style="text-align: left;"><?php echo $text_total_visitors; ?></td>
              <td style="text-align: right; width: 20%;"><?php echo $total_visitors; ?></td>
            </tr>
            <tr>
              <td style="text-align: left;"><?php echo $text_total_customers; ?></td>
              <td style="text-align: right;"><?php echo $total_customers; ?></td>
            </tr>
            <tr>
              <td style="text-align: left;"><?php echo $text_total_guests; ?></td>
              <td style="text-align: right;"><?php echo $total_guests; ?></td>
            </tr>
            <tr>
              <td style="text-align: left;"><?php echo $text_total_page_views; ?></td>
              <td style="text-align: right;"><?php echo $total_page_views; ?></td>
            </tr>
          </table>
          <h4><?php echo $text_visitor_averages; ?></h4>
          <table class="list">
            <tr>
              <td style="text-align: left;"><?php echo $text_daily_visitors; ?></td>
              <td style="text-align: right; width: 20%;"><?php echo $daily_visitors; ?></td>
            </tr>
            <tr>
              <td style="text-align: left;"><?php echo $text_weekly_visitors; ?></td>
              <td style="text-align: right;"><?php echo $weekly_visitors; ?></td>
            </tr>
            <tr>
              <td style="text-align: left;"><?php echo $text_monthly_visitors; ?></td>
              <td style="text-align: right;"><?php echo $monthly_visitors; ?></td>
            </tr>
          </table>
          <h4><?php echo $text_customer_averages; ?></h4>
          <table class="list">
            <tr>
              <td style="text-align: left;"><?php echo $text_daily_customers; ?></td>
              <td style="text-align: right; width: 20%;"><?php echo $daily_customers; ?></td>
            </tr>
            <tr>
              <td style="text-align: left;"><?php echo $text_weekly_customers; ?></td>
              <td style="text-align: right;"><?php echo $weekly_customers; ?></td>
            </tr>
            <tr>
              <td style="text-align: left;"><?php echo $text_monthly_customers; ?></td>
              <td style="text-align: right;"><?php echo $monthly_customers; ?></td>
            </tr>
          </table>
          <h4><?php echo $text_guest_averages; ?></h4>
          <table class="list">
            <tr>
              <td style="text-align: left;"><?php echo $text_daily_guests; ?></td>
              <td style="text-align: right; width: 20%;"><?php echo $daily_guests; ?></td>
            </tr>
            <tr>
              <td style="text-align: left;"><?php echo $text_weekly_guests; ?></td>
              <td style="text-align: right;"><?php echo $weekly_guests; ?></td>
            </tr>
            <tr>
              <td style="text-align: left;"><?php echo $text_monthly_guests; ?></td>
              <td style="text-align: right;"><?php echo $monthly_guests; ?></td>
            </tr>
          </table>
          <h4><?php echo $text_page_view_averages; ?></h4>
          <table class="list">
            <tr>
              <td style="text-align: left;"><?php echo $text_daily_page_views; ?></td>
              <td style="text-align: right; width: 20%;"><?php echo $daily_page_views; ?></td>
            </tr>
            <tr>
              <td style="text-align: left;"><?php echo $text_weekly_page_views; ?></td>
              <td style="text-align: right;"><?php echo $weekly_page_views; ?></td>
            </tr>
            <tr>
              <td style="text-align: left;"><?php echo $text_monthly_page_views; ?></td>
              <td style="text-align: right;"><?php echo $monthly_page_views; ?></td>
            </tr>
          </table>
        </div>
      </div>
      <div style="float: right; width: 56%;">
        <div class="online_boxtop">
          <div style="width: 100%; display: inline-block;">
            <div class="heading" style="float: left; padding: 7px 0px 0px 5px; line-height: 12px;"><?php echo $heading_charts; ?></div>
            <div style="float: right; font-size: 12px; padding: 2px 5px 0px 0px;"><?php echo $entry_range; ?>
              <select id="range" onchange="getVisitorCharts(this.value)" style="margin: 2px 3px 0 0;">
                <option value="week"><?php echo $text_week; ?></option>
                <option value="month"><?php echo $text_month; ?></option>
                <option value="year"><?php echo $text_year; ?></option>
              </select>
            </div>
          </div>
        </div>
        <div class="online_box">
          <h3><?php echo $heading_visitors; ?></h3>
          <div id="visitors" class="chart"></div>
          <h3><?php echo $heading_customers; ?></h3>
          <div id="customers" class="chart"></div>
        </div>
      </div>
      <div style="clear: both;"></div>
    </div>
  </div>
</div>
<!--[if IE]>
<script type="text/javascript" src="view/javascript/jquery/flot/excanvas.js"></script>
<![endif]-->
<script type="text/javascript" src="view/javascript/jquery/flot/jquery.flot.js"></script>
<script type="text/javascript"><!--
function getVisitorCharts(range) {
	$.ajax({
		type: 'GET',
		url: 'index.php?route=module/earthball/chart&token=<?php echo $token; ?>&range=' + range,
		dataType: 'json',
		async: false,
		success: function(json) {
			var option = {	
				shadowSize: 0,
				lines: { 
					show: true,
					fill: true,
					lineWidth: 1
				},
				grid: {
					backgroundColor: '#FFFFFF'
				},	
				xaxis: {
            		ticks: json.xaxis
				}
			}

			$.plot($('#visitors'), [json.visitor, json.page_view], option);
			$.plot($('#customers'), [json.customer, json.guest], option);
		}
	});
}

getVisitorCharts($('#range').val());
//--></script>
<?php echo $footer; ?>
