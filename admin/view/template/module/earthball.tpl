<?php echo $header; ?>
<div id="content">
  <div class="breadcrumb">
    <?php foreach ($breadcrumbs as $breadcrumb) { ?>
    <?php echo $breadcrumb['separator']; ?><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a>
    <?php } ?>
  </div>
  <?php if ($error_warning) { ?>
  <div class="warning"><?php echo $error_warning; ?></div>
  <?php } ?>
  <div class="box">
    <div class="heading">
      <h1><img src="view/image/module.png" alt="" /> <?php echo $heading_title; ?></h1>
      <div class="buttons"><a onclick="$('#counter_reset').submit();" class="button"><span><?php echo $button_reset_counter; ?></span></a><a onclick="$('#form').submit();" class="button"><span><?php echo $button_save; ?></span></a><a onclick="location = '<?php echo $cancel; ?>';" class="button"><span><?php echo $button_cancel; ?></span></a></div>
    </div>
    <div class="content">
      <div id="tabs" class="htabs"><a href="#tab_general"><?php echo $tab_general; ?></a><a href="#tab_data"><?php echo $tab_data; ?></a></div>
      <form action="<?php echo $reset_counter; ?>" method="post" enctype="multipart/form-data" id="counter_reset">
        <input type="hidden" name="reset_counter" value="1" />
      </form>
      <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form">
        <div id="tab_general">
          <table id="module" class="list">
            <thead>
              <tr>
                <td class="left"><?php echo $entry_layout; ?></td>
                <td class="left"><?php echo $entry_position; ?></td>
                <td class="left"><?php echo $entry_status; ?></td>
                <td class="right"><?php echo $entry_sort_order; ?></td>
                <td style="width: 150px;"></td>
              </tr>
            </thead>
            <?php $module_row = 0; ?>
            <?php foreach ($modules as $module) { ?>
            <tbody id="module-row<?php echo $module_row; ?>">
              <tr>
                <td class="left"><select name="earthball_<?php echo $module_row; ?>_layout_id">
                    <?php foreach ($layouts as $layout) { ?>
                    <?php if ($layout['layout_id'] == ${'earthball_' . $module . '_layout_id'}) { ?>
                    <option value="<?php echo $layout['layout_id']; ?>" selected="selected"><?php echo $layout['name']; ?></option>
                    <?php } else { ?>
                    <option value="<?php echo $layout['layout_id']; ?>"><?php echo $layout['name']; ?></option>
                    <?php } ?>
                    <?php } ?>
                  </select></td>
                <td class="left"><select name="earthball_<?php echo $module_row; ?>_position">
                    <?php if (${'earthball_' . $module . '_position'} == 'content_top') { ?>
                    <option value="content_top" selected="selected"><?php echo $text_content_top; ?></option>
                    <?php } else { ?>
                    <option value="content_top"><?php echo $text_content_top; ?></option>
                    <?php } ?>  
                    <?php if (${'earthball_' . $module . '_position'} == 'content_bottom') { ?>
                    <option value="content_bottom" selected="selected"><?php echo $text_content_bottom; ?></option>
                    <?php } else { ?>
                    <option value="content_bottom"><?php echo $text_content_bottom; ?></option>
                    <?php } ?> 
                    <?php if (${'earthball_' . $module . '_position'} == 'column_left') { ?>
                    <option value="column_left" selected="selected"><?php echo $text_column_left; ?></option>
                    <?php } else { ?>
                    <option value="column_left"><?php echo $text_column_left; ?></option>
                    <?php } ?>
                    <?php if (${'earthball_' . $module . '_position'} == 'column_right') { ?>
                    <option value="column_right" selected="selected"><?php echo $text_column_right; ?></option>
                    <?php } else { ?>
                    <option value="column_right"><?php echo $text_column_right; ?></option>
                    <?php } ?>
                  </select></td>
                <td class="left"><select name="earthball_<?php echo $module_row; ?>_status">
                    <?php if (${'earthball_' . $module . '_status'}) { ?>
                    <option value="1" selected="selected"><?php echo $text_enabled; ?></option>
                    <option value="0"><?php echo $text_disabled; ?></option>
                    <?php } else { ?>
                    <option value="1"><?php echo $text_enabled; ?></option>
                    <option value="0" selected="selected"><?php echo $text_disabled; ?></option>
                    <?php } ?>
                  </select></td>
                <td class="right"><input type="text" name="earthball_<?php echo $module_row; ?>_sort_order" value="<?php echo ${'earthball_' . $module . '_sort_order'}; ?>" size="3" /></td>
                <td class="left"><a onclick="$('#module-row<?php echo $module_row; ?>').remove();" class="button"><span><?php echo $button_remove; ?></span></a></td>
              </tr>
            </tbody>
            <?php $module_row++; ?>
            <?php } ?>
            <tfoot>
              <tr>
                <td colspan="4"></td>
                <td class="left"><a onclick="addModule();" class="button"><span><?php echo $button_add_module; ?></span></a></td>
              </tr>
            </tfoot>
          </table>
          <input type="hidden" name="earthball_module" value="<?php echo $earthball_module; ?>" />
        </div>
        <div id="tab_data">
          <table class="form">
            <tr>
              <td><?php echo $entry_dashboard_status; ?></td>
              <td class="left"><select name="earthball_dashboard_status">
                  <?php if ($earthball_dashboard_status) { ?>
                  <option value="1" selected="selected"><?php echo $text_enabled; ?></option>
                  <option value="0"><?php echo $text_disabled; ?></option>
                  <?php } else { ?>
                  <option value="1"><?php echo $text_enabled; ?></option>
                  <option value="0" selected="selected"><?php echo $text_disabled; ?></option>
                  <?php } ?>
                </select></td>
            </tr>
            <tr>
              <td><span class="required">*</span> <?php echo $entry_auto_refresh; ?></td>
              <td><input type="text" name="earthball_auto_refresh" value="<?php echo $earthball_auto_refresh; ?>" size="1" />
                  <?php if ($error_auto_refresh) { ?>
                  <span class="error"><?php echo $error_auto_refresh; ?></span>
                  <?php } ?></td>
            </tr>
            <tr>
              <td><?php echo $entry_dashboard_limit; ?></td>
              <td><input type="text" name="earthball_dashboard_limit" value="<?php echo $earthball_dashboard_limit; ?>" size="1" /></td>
            </tr>
            <tr>
              <td><?php echo $entry_earth_code; ?></td>
              <td><textarea name="earthball_earth_code" rows="6" cols="100"><?php echo $earthball_earth_code; ?></textarea></td>
            </tr>
            <tr>
              <td><?php echo $entry_show_globe; ?></td>
              <td><?php if ($earthball_show_globe) { ?>
                <input type="radio" name="earthball_show_globe" value="1" checked="checked" />
                <?php echo $text_yes; ?>
                <input type="radio" name="earthball_show_globe" value="0" />
                <?php echo $text_no; ?>
                <?php } else { ?>
                <input type="radio" name="earthball_show_globe" value="1" />
                <?php echo $text_yes; ?>
                <input type="radio" name="earthball_show_globe" value="0" checked="checked" />
                <?php echo $text_no; ?>
                <?php } ?></td>
            </tr>
            <tr>
              <td><?php echo $entry_show_visitors; ?></td>
              <td><?php if ($earthball_show_visitors) { ?>
                <input type="radio" name="earthball_show_visitors" value="1" checked="checked" />
                <?php echo $text_yes; ?>
                <input type="radio" name="earthball_show_visitors" value="0" />
                <?php echo $text_no; ?>
                <?php } else { ?>
                <input type="radio" name="earthball_show_visitors" value="1" />
                <?php echo $text_yes; ?>
                <input type="radio" name="earthball_show_visitors" value="0" checked="checked" />
                <?php echo $text_no; ?>
                <?php } ?></td>
            </tr>
            <tr>
              <td><span class="required">*</span> <?php echo $entry_expiry_time; ?></td>
              <td><input type="text" name="earthball_expiry_time" value="<?php echo $earthball_expiry_time; ?>" size="3" /><div style="display: inline-block; margin-left: 100px;"><a onclick="location = '<?php echo $whos_online; ?>';" class="button"><span><?php echo $button_whos_online; ?></span></a></div>
                  <?php if ($error_expiry_time) { ?>
                  <span class="error"><?php echo $error_expiry_time; ?></span>
                  <?php } ?></td>
            </tr>
            <tr>
              <td><?php echo $entry_show_bots; ?></td>
              <td><?php if ($earthball_show_bots) { ?>
                <input type="radio" name="earthball_show_bots" value="1" checked="checked" />
                <?php echo $text_yes; ?>
                <input type="radio" name="earthball_show_bots" value="0" />
                <?php echo $text_no; ?>
                <?php } else { ?>
                <input type="radio" name="earthball_show_bots" value="1" />
                <?php echo $text_yes; ?>
                <input type="radio" name="earthball_show_bots" value="0" checked="checked" />
                <?php echo $text_no; ?>
                <?php } ?></td>
            </tr>
          </table>
        </div>
      </form>
    </div>
  </div>
</div>
<script type="text/javascript"><!--
var module_row = <?php echo $module_row; ?>;

function addModule() {	
	html  = '<tbody id="module-row' + module_row + '">';
	html += '  <tr>';
	html += '    <td class="left"><select name="earthball_' + module_row + '_layout_id">';
	<?php foreach ($layouts as $layout) { ?>
	html += '      <option value="<?php echo $layout['layout_id']; ?>"><?php echo $layout['name']; ?></option>';
	<?php } ?>
	html += '    </select></td>';
	html += '    <td class="left"><select name="earthball_' + module_row + '_position">';
	html += '      <option value="content_top"><?php echo $text_content_top; ?></option>';
	html += '      <option value="content_bottom"><?php echo $text_content_bottom; ?></option>';
	html += '      <option value="column_left"><?php echo $text_column_left; ?></option>';
	html += '      <option value="column_right"><?php echo $text_column_right; ?></option>';
	html += '    </select></td>';
	html += '    <td class="left"><select name="earthball_' + module_row + '_status">';
    html += '      <option value="1" selected="selected"><?php echo $text_enabled; ?></option>';
    html += '      <option value="0"><?php echo $text_disabled; ?></option>';
    html += '    </select></td>';
	html += '    <td class="right"><input type="text" name="earthball_' + module_row + '_sort_order" value="" size="3" /></td>';
	html += '    <td class="left"><a onclick="$(\'#module-row' + module_row + '\').remove();" class="button"><span><?php echo $button_remove; ?></span></a></td>';
	html += '  </tr>';
	html += '</tbody>';
	
	$('#module tfoot').before(html);
	
	module_row++;
}

$('#form').bind('submit', function() {
	var module = new Array(); 

	$('#module tbody').each(function(index, element) {
		module[index] = $(element).attr('id').substr(10);
	});
	
	$('input[name=\'earthball_module\']').attr('value', module.join(','));
});
//--></script>
<script type="text/javascript"><!--
$('#tabs a').tabs(); 
//--></script> 
<?php echo $footer; ?>
