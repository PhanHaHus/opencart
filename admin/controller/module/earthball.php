<?php
class ControllerModuleEarthball extends Controller {
	private $error = array();

	public function index() {
		$this->load->language('module/earthball');
		$this->load->model('fido/earthball');

		$this->model_fido_earthball->checkTables();

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('setting/setting');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && ($this->validate())) {
			$this->model_setting_setting->editSetting('earthball', $this->request->post);

			$this->session->data['success'] = $this->language->get('text_success');

			$this->redirect($this->url->link('extension/module', 'token=' . $this->session->data['token'], 'SSL'));
		}

		$data['heading_title'] = $this->language->get('heading_title');

		$data['text_enabled'] = $this->language->get('text_enabled');
		$data['text_disabled'] = $this->language->get('text_disabled');
		$data['text_yes'] = $this->language->get('text_yes');
		$data['text_no'] = $this->language->get('text_no');
		$data['text_content_top'] = $this->language->get('text_content_top');
		$data['text_content_bottom'] = $this->language->get('text_content_bottom');		
		$data['text_column_left'] = $this->language->get('text_column_left');
		$data['text_column_right'] = $this->language->get('text_column_right');

		$data['entry_layout'] = $this->language->get('entry_layout');
		$data['entry_position'] = $this->language->get('entry_position');
		$data['entry_status'] = $this->language->get('entry_status');
		$data['entry_sort_order'] = $this->language->get('entry_sort_order');
		$data['entry_auto_refresh'] = $this->language->get('entry_auto_refresh');
		$data['entry_dashboard_status'] = $this->language->get('entry_dashboard_status');
		$data['entry_dashboard_limit'] = $this->language->get('entry_dashboard_limit');
		$data['entry_earth_code'] = $this->language->get('entry_earth_code');
		$data['entry_show_globe'] = $this->language->get('entry_show_globe');
		$data['entry_show_visitors'] = $this->language->get('entry_show_visitors');
		$data['entry_show_bots'] = $this->language->get('entry_show_bots');
		$data['entry_expiry_time'] = $this->language->get('entry_expiry_time');

		$data['tab_general'] = $this->language->get('tab_general');
		$data['tab_data'] = $this->language->get('tab_data');

		$data['button_save'] = $this->language->get('button_save');
		$data['button_cancel'] = $this->language->get('button_cancel');
		$data['button_whos_online'] = $this->language->get('button_whos_online');
		$data['button_reset_counter'] = $this->language->get('button_reset_counter');
		$data['button_add_module'] = $this->language->get('button_add_module');
		$data['button_remove'] = $this->language->get('button_remove');

		$data['reset_counter'] = $this->url->link('module/earthball/reset_counter', 'token=' . $this->session->data['token'], 'SSL');

 		if (isset($this->error['warning'])) {
			$data['error_warning'] = $this->error['warning'];
		} else {
			$data['error_warning'] = '';
		}

 		if (isset($this->error['auto_refresh'])) {
			$data['error_auto_refresh'] = $this->error['auto_refresh'];
		} else {
			$data['error_auto_refresh'] = '';
		}

 		if (isset($this->error['expiry_time'])) {
			$data['error_expiry_time'] = $this->error['expiry_time'];
		} else {
			$data['error_expiry_time'] = '';
		}

		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'href'      => $this->url->link('common/home', 'token=' . $this->session->data['token'], 'SSL'),
			'text'      => $this->language->get('text_home'),
			'separator' => FALSE
		);

		$data['breadcrumbs'][] = array(
			'href'      => $this->url->link('extension/module', 'token=' . $this->session->data['token'], 'SSL'),
			'text'      => $this->language->get('text_module'),
			'separator' => ' :: '
		);

		$data['breadcrumbs'][] = array(
			'href'      => $this->url->link('module/earthball', 'token=' . $this->session->data['token'], 'SSL'),
			'text'      => $this->language->get('heading_title'),
			'separator' => ' :: '
		);

		$data['action'] = $this->url->link('module/earthball', 'token=' . $this->session->data['token'], 'SSL');
		$data['cancel'] = $this->url->link('extension/module', 'token=' . $this->session->data['token'], 'SSL');
		$data['whos_online'] = $this->url->link('module/earthball/whos_online', 'token=' . $this->session->data['token'], 'SSL');

		if (isset($this->request->post['earthball_dashboard_status'])) {
			$data['earthball_dashboard_status'] = $this->request->post['earthball_dashboard_status'];
		} else {
			$data['earthball_dashboard_status'] = $this->config->get('earthball_dashboard_status');
		}

		if (isset($this->request->post['earthball_dashboard_limit'])) {
			$data['earthball_dashboard_limit'] = $this->request->post['earthball_dashboard_limit'];
		} else {
			$data['earthball_dashboard_limit'] = $this->config->get('earthball_dashboard_limit');
		}

		if (isset($this->request->post['earthball_auto_refresh'])) {
			$data['earthball_auto_refresh'] = $this->request->post['earthball_auto_refresh'];
		} elseif ($this->config->get('earthball_auto_refresh')) {
			$data['earthball_auto_refresh'] = $this->config->get('earthball_auto_refresh');
		} else {
			$data['earthball_auto_refresh'] = 60;
		}

		if (isset($this->request->post['earthball_earth_code'])) {
			$data['earthball_earth_code'] = $this->request->post['earthball_earth_code'];
		} elseif ($this->config->get('earthball_earth_code')) {
			$data['earthball_earth_code'] = $this->config->get('earthball_earth_code');
		} else {
			$data['earthball_earth_code'] = $this->language->get('text_start_ball');
		}

		if (isset($this->request->post['earthball_show_globe'])) {
			$data['earthball_show_globe'] = $this->request->post['earthball_show_globe'];
		} else {
			$data['earthball_show_globe'] = $this->config->get('earthball_show_globe');
		}

		if (isset($this->request->post['earthball_show_visitors'])) {
			$data['earthball_show_visitors'] = $this->request->post['earthball_show_visitors'];
		} else {
			$data['earthball_show_visitors'] = $this->config->get('earthball_show_visitors');
		}

		if (isset($this->request->post['earthball_show_bots'])) {
			$data['earthball_show_bots'] = $this->request->post['earthball_show_bots'];
		} else {
			$data['earthball_show_bots'] = $this->config->get('earthball_show_bots');
		}

		if (isset($this->request->post['earthball_expiry_time'])) {
			$data['earthball_expiry_time'] = $this->request->post['earthball_expiry_time'];
		} else {
			$data['earthball_expiry_time'] = $this->config->get('earthball_expiry_time');
		}

		if (isset($this->request->post['earthball_show_module'])) {
			$data['earthball_show_module'] = $this->request->post['earthball_show_module'];
		} else {
			$data['earthball_show_module'] = $this->config->get('earthball_show_module');
		}

		if (isset($this->request->post['earthball_module'])) {
			$modules = explode(',', $this->request->post['earthball_module']);
		} elseif ($this->config->get('earthball_module') != '') {
			$modules = explode(',', $this->config->get('earthball_module'));
		} else {
			$modules = array();
		}		

		$this->load->model('design/layout');

		$data['layouts'] = $this->model_design_layout->getLayouts();

		foreach ($modules as $module) {
			if (isset($this->request->post['earthball_' . $module . '_layout_id'])) {
				$data['earthball_' . $module . '_layout_id'] = $this->request->post['earthball_' . $module . '_layout_id'];
			} else {
				$data['earthball_' . $module . '_layout_id'] = $this->config->get('earthball_' . $module . '_layout_id');
			}	

			if (isset($this->request->post['earthball_' . $module . '_position'])) {
				$data['earthball_' . $module . '_position'] = $this->request->post['earthball_' . $module . '_position'];
			} else {
				$data['earthball_' . $module . '_position'] = $this->config->get('earthball_' . $module . '_position');
			}	

			if (isset($this->request->post['earthball_' . $module . '_status'])) {
				$data['earthball_' . $module . '_status'] = $this->request->post['earthball_' . $module . '_status'];
			} else {
				$data['earthball_' . $module . '_status'] = $this->config->get('earthball_' . $module . '_status');
			}	

			if (isset($this->request->post['earthball_' . $module . '_sort_order'])) {
				$data['earthball_' . $module . '_sort_order'] = $this->request->post['earthball_' . $module . '_sort_order'];
			} else {
				$data['earthball_' . $module . '_sort_order'] = $this->config->get('earthball_' . $module . '_sort_order');
			}				
		}

		$data['modules'] = $modules;

		if (isset($this->request->post['earthball_module'])) {
			$data['earthball_module'] = $this->request->post['earthball_module'];
		} else {
			$data['earthball_module'] = $this->config->get('earthball_module');
		}

		$this->template = 'module/earthball.tpl';
                
                $data['header'] = $this->load->controller('common/header');
                $data['footer'] = $this->load->controller('common/footer');
                $this->response->setOutput($this->load->view('module/earthball.tpl', $data));
                
		$this->children = array(
			'common/header',
			'common/footer'
		);
                
//		$this->response->setOutput($this->render());
	}

	public function reset_counter() {
		$this->load->language('module/earthball');
		$this->load->model('fido/earthball');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && ($this->validateReset())) {
			$this->model_fido_earthball->resetCounter();

			$this->session->data['success'] = $this->language->get('text_reset_success');
		}

		$this->redirect($this->url->link('module/earthball/counter_statistics', 'token=' . $this->session->data['token'], 'SSL'));
	}

	public function whos_online() {
		$this->load->language('module/earthball');
		$this->load->model('fido/earthball');

		$this->document->setTitle($this->language->get('heading_whos_online'));

		$current_time = time();
		$expiry_time = $this->config->get('earthball_expiry_time');

		$xx_mins_ago = ($current_time - $expiry_time);

		$this->model_fido_earthball->deleteWhosOnline($xx_mins_ago);

		$data['online_customers'] = array();

		$ip_array = array();
		$ip_duplicates = 0;
		$total_online = $this->model_fido_earthball->countWhosOnline();
		$total_customers_online = $this->model_fido_earthball->countCustomersOnline();
		$total_guests_online = $this->model_fido_earthball->countGuestsOnline();
		$total_bots_online = $this->model_fido_earthball->countBotsOnline();

		$results = $this->model_fido_earthball->getOnlineVisitors();

		foreach ($results as $result) {
			$time_online = ($current_time - $result['time_entry']);
			$time_since_last_click = ($current_time - $result['time_last_click']);

			if (in_array($result['ip_address'], $ip_array)) {
				$ip_duplicates++;
			} else {
				$ip_array[] = $result['ip_address'];
			}

			$this->load->model('catalog/product');
			$session_data = unserialize($result['session_data']);
			$products_in_cart = array_keys($session_data['cart']);
			$shopping_cart = array();
			foreach ($products_in_cart as $product_id) {
				$product_info = $this->model_catalog_product->getProduct($product_id);
				$quantity = $session_data['cart'][$product_id];
				$shopping_cart[] = array(
					'product_name'  => $product_info['name'],
					'quantity'      => $quantity
				);
			}

			$data['online_customers'][] = array(
				'time_online'      => gmdate('H:i:s', $time_online),
				'customer_id'      => $result['customer_id'],
				'full_name'        => $result['full_name'],
				'time_entry'       => date('H:i:s', $result['time_entry']),
				'time_last_click'  => date('H:i:s', $result['time_last_click']),
				'last_page_url'    => $result['last_page_url'],
				'time_since_last'  => sprintf($this->language->get('text_last_click'), gmdate('H:i:s', $time_since_last_click)),
				'ip_address'       => $result['ip_address'],
				'session_id'       => sprintf($this->language->get('text_session_id'), $result['session_id']),
				'host_address'     => sprintf($this->language->get('text_host_address'), $result['host_address']),
				'user_agent'       => sprintf($this->language->get('text_user_agent'), $result['user_agent']),
				'shopping_cart'    => $shopping_cart
			);
		}

		$data['whois_lookup'] = 'http://whois.domaintools.com/';

		$data['heading_title'] = $this->language->get('heading_whos_online');

		$data['text_online'] = sprintf($this->language->get('text_online'), $total_online);
		$data['text_customers_online'] = sprintf($this->language->get('text_customers_online'), $total_customers_online);
		$data['text_guests_online'] = sprintf($this->language->get('text_guests_online'), $total_guests_online);
		$data['text_bots_online'] = sprintf($this->language->get('text_bots_online'), $total_bots_online);
		$data['text_duplicate'] = sprintf($this->language->get('text_duplicate'), $ip_duplicates);
		$data['text_unique'] = sprintf($this->language->get('text_unique'), ($total_online - $ip_duplicates));
		$data['text_expiry_time'] = sprintf($this->language->get('text_expiry_time'), ($this->config->get('earthball_expiry_time') / 60));
		$data['text_cart_empty'] = $this->language->get('text_cart_empty');

		$data['column_online'] = $this->language->get('column_online');
		$data['column_customer_id'] = $this->language->get('column_customer_id');
		$data['column_full_name'] = $this->language->get('column_full_name');
		$data['column_ip_address'] = $this->language->get('column_ip_address');
		$data['column_entry_time'] = $this->language->get('column_entry_time');
		$data['column_last_click'] = $this->language->get('column_last_click');
		$data['column_last_url'] = $this->language->get('column_last_url');
		$data['column_shopping_cart'] = $this->language->get('column_shopping_cart');

		$data['button_refresh_list'] = $this->language->get('button_refresh_list');

		$data['refresh_list'] = $this->url->link('module/earthball/whos_online', 'token=' . $this->session->data['token'], 'SSL');

		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'href'      => $this->url->link('common/home', 'token=' . $this->session->data['token'], 'SSL'),
			'text'      => $this->language->get('text_home'),
			'separator' => FALSE
		);

		$data['breadcrumbs'][] = array(
			'href'      => $this->url->link('module/earthball/whos_online', 'token=' . $this->session->data['token'], 'SSL'),
			'text'      => $this->language->get('heading_whos_online'),
			'separator' => ' :: '
		);

		$this->template = 'module/earthball/whos_online.tpl';
		$this->children = array(
			'common/header',
			'common/footer'
		);

		$this->response->setOutput($this->render());
	}

	public function counter_statistics() {
		$this->load->language('module/earthball');
		$this->load->model('fido/earthball');

		$this->document->setTitle($this->language->get('heading_counter'));

		$current_date = date('U');

		$counter = $this->model_fido_earthball->getCounter();
		if ($counter) {
			$counter_start_date = date($this->language->get('date_format_short'), strtotime($counter['start_date']));
			$days_online = ((($current_date - date('U', strtotime($counter['start_date']))) / 60) / 60) / 24;
			$weeks_online = $days_online / 7;
			if ($weeks_online > 0 && $weeks_online < 1) {
				$weeks_online = 1;
			}
			$months_online = $days_online / 30;
			if ($months_online > 0 && $months_online < 1) {
				$months_online = 1;
			}
			$total_visitors = $this->model_fido_earthball->countTotalVisitors($counter['start_date']);
			$total_customers = $this->model_fido_earthball->countTotalCustomers($counter['start_date']);
			$total_guests = $this->model_fido_earthball->countTotalGuests($counter['start_date']);
			$total_page_views = $counter['counter'];
			$daily_visitors = $total_visitors / $days_online;
			$weekly_visitors = $total_visitors / $weeks_online;
			$monthly_visitors = $total_visitors / $months_online;
			$daily_customers = $total_customers / $days_online;
			$weekly_customers = $total_customers / $weeks_online;
			$monthly_customers = $total_customers / $months_online;
			$daily_guests = $total_guests / $days_online;
			$weekly_guests = $total_guests / $weeks_online;
			$monthly_guests = $total_guests / $months_online;
			$daily_page_views = $total_page_views / $days_online;
			$weekly_page_views = $total_page_views / $weeks_online;
			$monthly_page_views = $total_page_views / $months_online;
		} else {
			$counter_start_date = '';
			$days_online = 0;
			$weeks_online = 0;
			$months_online = 0;
			$total_visitors = 0;
			$total_customers = 0;
			$total_guests = 0;
			$total_page_views = 0;
			$daily_visitors = 0;
			$weekly_visitors = 0;
			$monthly_visitors = 0;
			$daily_customers = 0;
			$weekly_customers = 0;
			$monthly_customers = 0;
			$daily_guests = 0;
			$weekly_guests = 0;
			$monthly_guests = 0;
			$daily_page_views = 0;
			$weekly_page_views = 0;
			$monthly_page_views = 0;
		}

		$data['heading_title'] = $this->language->get('heading_counter');
		$data['heading_overview'] = $this->language->get('heading_overview');
		$data['heading_statistics'] = $this->language->get('heading_statistics');
		$data['heading_charts'] = $this->language->get('heading_charts');
		$data['heading_visitors'] = $this->language->get('heading_visitors');
		$data['heading_customers'] = $this->language->get('heading_customers');

		$data['text_overview'] = $this->language->get('text_overview');
		$data['text_totals'] = $this->language->get('text_totals');
		$data['text_visitor_averages'] = $this->language->get('text_visitor_averages');
		$data['text_customer_averages'] = $this->language->get('text_customer_averages');
		$data['text_guest_averages'] = $this->language->get('text_guest_averages');
		$data['text_page_view_averages'] = $this->language->get('text_page_view_averages');
		$data['text_counter_start_date'] = $this->language->get('text_counter_start_date');
		$data['text_days_online'] = $this->language->get('text_days_online');
		$data['text_weeks_online'] = $this->language->get('text_weeks_online');
		$data['text_months_online'] = $this->language->get('text_months_online');
		$data['text_total_visitors'] = $this->language->get('text_total_visitors');
		$data['text_total_customers'] = $this->language->get('text_total_customers');
		$data['text_total_guests'] = $this->language->get('text_total_guests');
		$data['text_total_page_views'] = $this->language->get('text_total_page_views');
		$data['text_daily_visitors'] = $this->language->get('text_daily_visitors');
		$data['text_weekly_visitors'] = $this->language->get('text_weekly_visitors');
		$data['text_monthly_visitors'] = $this->language->get('text_monthly_visitors');
		$data['text_daily_customers'] = $this->language->get('text_daily_customers');
		$data['text_weekly_customers'] = $this->language->get('text_weekly_customers');
		$data['text_monthly_customers'] = $this->language->get('text_monthly_customers');
		$data['text_daily_guests'] = $this->language->get('text_daily_guests');
		$data['text_weekly_guests'] = $this->language->get('text_weekly_guests');
		$data['text_monthly_guests'] = $this->language->get('text_monthly_guests');
		$data['text_daily_page_views'] = $this->language->get('text_daily_page_views');
		$data['text_weekly_page_views'] = $this->language->get('text_weekly_page_views');
		$data['text_monthly_page_views'] = $this->language->get('text_monthly_page_views');
		$data['text_week'] = $this->language->get('text_week');
		$data['text_month'] = $this->language->get('text_month');
		$data['text_year'] = $this->language->get('text_year');

		if (isset($this->error['warning'])) {
			$data['error_warning'] = $this->error['warning'];
		} else {
			$data['error_warning'] = '';
		}

		if (isset($this->session->data['success'])) {
			$data['success'] = $this->session->data['success'];

			unset($this->session->data['success']);
		} else {
			$data['success'] = '';
		}

		$data['entry_range'] = $this->language->get('entry_range');

		$data['token'] = $this->session->data['token'];

		$data['counter_start_date'] = $counter_start_date;
		$data['days_online'] = number_format($days_online);
		$data['weeks_online'] = number_format($weeks_online);
		$data['months_online'] = number_format($months_online);
		$data['total_visitors'] = number_format($total_visitors);
		$data['total_customers'] = number_format($total_customers);
		$data['total_guests'] = number_format($total_guests);
		$data['total_page_views'] = number_format($total_page_views);
		$data['daily_visitors'] = number_format($daily_visitors);
		$data['weekly_visitors'] = number_format($weekly_visitors);
		$data['monthly_visitors'] = number_format($monthly_visitors);
		$data['daily_customers'] = number_format($daily_customers);
		$data['weekly_customers'] = number_format($weekly_customers);
		$data['monthly_customers'] = number_format($monthly_customers);
		$data['daily_guests'] = number_format($daily_guests);
		$data['weekly_guests'] = number_format($weekly_guests);
		$data['monthly_guests'] = number_format($monthly_guests);
		$data['daily_page_views'] = number_format($daily_page_views);
		$data['weekly_page_views'] = number_format($weekly_page_views);
		$data['monthly_page_views'] = number_format($monthly_page_views);

		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'href'      => $this->url->link('common/home', 'token=' . $this->session->data['token'], 'SSL'),
			'text'      => $this->language->get('text_home'),
			'separator' => FALSE
		);

		$data['breadcrumbs'][] = array(
			'href'      => $this->url->link('module/earthball/counter_statistics', 'token=' . $this->session->data['token'], 'SSL'),
			'text'      => $this->language->get('heading_counter'),
			'separator' => ' :: '
		);

		$this->template = 'module/earthball/counter_statistics.tpl';
		$this->children = array(
			'common/header',
			'common/footer'
		);

		$this->response->setOutput($this->render());
	}

	public function online_dashboard() {
		$this->load->language('module/earthball');
		$this->load->model('fido/earthball');

		$current_time = time();
		$expiry_time = $this->config->get('earthball_expiry_time');

		$xx_mins_ago = ($current_time - $expiry_time);

		$this->model_fido_earthball->deleteWhosOnline($xx_mins_ago);

		$online_customers = array();

		$ip_array = array();
		$ip_duplicates = 0;
		$total_online = $this->model_fido_earthball->countWhosOnline();
		$bots_online = $this->model_fido_earthball->countBotsOnline();

		$results = $this->model_fido_earthball->getDashboardVisitors($this->config->get('earthball_dashboard_limit'));

		foreach ($results as $result) {
			$time_online = ($current_time - $result['time_entry']);
			$time_since_last_click = ($current_time - $result['time_last_click']);

			if (in_array($result['ip_address'], $ip_array)) {
				$ip_duplicates++;
			} else {
				$ip_array[] = $result['ip_address'];
			}

			$this->load->model('catalog/product');
			$session_data = unserialize($result['session_data']);
			$products_in_cart = array_keys($session_data['cart']);
			$shopping_cart = array();
			foreach ($products_in_cart as $product_id) {
				$product_info = $this->model_catalog_product->getProduct($product_id);
				$quantity = $session_data['cart'][$product_id];
				$shopping_cart[] = array(
					'product_name'  => $product_info['name'],
					'quantity'      => $quantity
				);
			}

			$data['online_customers'][] = array(
				'time_online'      => gmdate('H:i:s', $time_online),
				'customer_id'      => $result['customer_id'],
				'full_name'        => $result['full_name'],
				'ip_address'       => $result['ip_address'],
				'time_entry'       => date('H:i:s', $result['time_entry']),
				'time_last_click'  => date('H:i:s', $result['time_last_click']),
				'last_page_url'    => $result['last_page_url'],
				'time_since_last'  => sprintf($this->language->get('text_last_click'), gmdate('H:i:s', $time_since_last_click)),
				'shopping_cart'    => $shopping_cart
			);
		}

		$current_date = date('U');

		$counter = $this->model_fido_earthball->getCounter();
		if ($counter) {
			$counter_start_date = date($this->language->get('date_format_short'), strtotime($counter['start_date']));
			$days_online = ((($current_date - date('U', strtotime($counter['start_date']))) / 60) / 60) / 24;
			$weeks_online = $days_online / 7;
			if ($weeks_online > 0 && $weeks_online < 1) {
				$weeks_online = 1;
			}
			$total_page_views = $counter['counter'];
			$total_visitors = $this->model_fido_earthball->countTotalVisitors($counter['start_date']);
			$daily_visitors = $total_visitors / $days_online;
			$weekly_visitors = $total_visitors / $weeks_online;
		} else {
			$counter_start_date = '';
			$days_online = 0;
			$weeks_online = 0;
			$total_page_views = 0;
			$total_visitors = 0;
			$daily_visitors = 0;
			$weekly_visitors = 0;
		}

		$output = '<div style="float: left; width: 28%;">';
		$output .= '<div class="online_boxtop"><div class="heading">' . $this->language->get('heading_counter') . '</div></div>';
		$output .= '<div class="online_box">';
		$output .= '<table cellpadding="2" style="width: 100%;">';
		$output .= '<tr>';
		$output .= '<td style="text-align: left;">' . $this->language->get('text_counter_start_date') . '</td>';
		$output .= '<td style="text-align: right;">' . $counter_start_date . '</td>';
		$output .= '</tr>';
		$output .= '<tr>';
		$output .= '<td style="text-align: left;">' . $this->language->get('text_total_page_views') . '</td>';
		$output .= '<td style="text-align: right;">' . number_format($total_page_views) . '</td>';
		$output .= '</tr>';
		$output .= '<tr>';
		$output .= '<td style="text-align: left;">' . $this->language->get('text_total_visitors') . '</td>';
		$output .= '<td style="text-align: right;">' . number_format($total_visitors) . '</td>';
		$output .= '</tr>';
		$output .= '<tr>';
		$output .= '<td style="text-align: left;">' . $this->language->get('text_daily_visitors') . '</td>';
		$output .= '<td style="text-align: right;">' . number_format($daily_visitors) . '</td>';
		$output .= '</tr>';
		$output .= '<tr>';
		$output .= '<td style="text-align: left;">' . $this->language->get('text_weekly_visitors') . '</td>';
		$output .= '<td style="text-align: right;">' . number_format($weekly_visitors) . '</td>';
		$output .= '</tr>';
		$output .= '</table>';
		$output .= '<div style="padding: 5px; text-align: right;">' . sprintf($this->language->get('text_view_details'), $this->url->link('module/earthball/counter_statistics', 'token=' . $this->session->data['token'], 'SSL')) . '</div>';
		$output .= '</div>';
		$output .= '</div>';

		$output .= '<div style="float: right; width: 70%;">';
		$output .= '<div class="online_boxtop"><div class="heading">' . $this->language->get('heading_whos_online') . '</div></div>';
		$output .= '<div class="online_box">';
		$output .= '<table class="list">';
		$output .= '<thead>';
		$output .= '<tr>';
		$output .= '<td class="left" style="width: 10%;">' . $this->language->get('column_online') . '</td>';
		$output .= '<td class="right" style="width: 4%;">' . $this->language->get('column_customer_id') . '</td>';
		$output .= '<td class="left">' . $this->language->get('column_full_name') . '</td>';
		$output .= '<td class="left" style="width: 15%;">' . $this->language->get('column_ip_address') . '</td>';
		$output .= '<td class="left" style="width: 10%;">' . $this->language->get('column_entry_time') . '</td>';
		$output .= '<td class="left" style="width: 10%;">' . $this->language->get('column_last_click') . '</td>';
		$output .= '<td class="left" style="width: 20%;">' . $this->language->get('column_last_url') . '</td>';
		$output .= '<td class="left" style="width: 15%;">' . $this->language->get('column_shopping_cart') . '</td>';
		$output .= '</tr>';
		$output .= '</thead>';
		$output .= '<tbody>';
		if ($online_customers) {
			$class = 'odd';
			foreach ($online_customers as $online_customer) {
				$class = ($class == 'even' ? 'odd' : 'even');
				$output .= '<tr class="' . $class . '">';
				$output .= '<td class="left" style="vertical-align: top;">' . $online_customer['time_online'] . '</td>';
				$output .= '<td class="right" style="vertical-align: top;">' . $online_customer['customer_id'] . '</td>';
				$output .= '<td class="left" style="vertical-align: top;">' . $online_customer['full_name'] . '</td>';
				$output .= '<td class="left" style="vertical-align: top;">' . $online_customer['ip_address'] . '</td>';
				$output .= '<td class="left" style="vertical-align: top;">' . $online_customer['time_entry'] . '</td>';
				$output .= '<td class="left" style="vertical-align: top;">' . $online_customer['time_last_click'] . '</td>';
				$output .= '<td class="left" style="vertical-align: top;">' . $online_customer['last_page_url'] . '</td>';
				$output .= '<td class="left" style="vertical-align: top;">' . $online_customer['shopping_cart'] . '</td>';
				$output .= '</tr>';
			}
		}
		$output .= '</tbody>';
		$output .= '</table>';
		$output .= '<div>';
		$output .= sprintf($this->language->get('text_currently_online'), $total_online) . '<br />';
		$output .= sprintf($this->language->get('text_current_bots'), $bots_online) . '<br />';
		if ($this->config->get('earthball_dashboard_limit') && $this->config->get('earthball_dashboard_limit') > 0) {
			$output .= sprintf($this->language->get('text_displaying'), $this->config->get('earthball_dashboard_limit'));
		} else {
			$output .= $this->language->get('text_displaying_all');
		}
		$output .= '<span style="margin-left: 10px;">' . sprintf($this->language->get('text_view_details'), $this->url->link('module/earthball/whos_online', 'token=' . $this->session->data['token'], 'SSL')) . '</span>';
		$output .= '</div>';
		$output .= '</div>';
		$output .= '</div>';
		$output .= '<div style="clear: both;"></div>';

		$this->response->setOutput($output);
	}

	private function validate() {
		if (!$this->user->hasPermission('modify', 'module/earthball')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		if ($this->request->post['earthball_auto_refresh'] < 60) {
			$this->error['auto_refresh'] = $this->language->get('error_auto_refresh');
		}

		if ($this->request->post['earthball_expiry_time'] < 300) {
			$this->error['expiry_time'] = $this->language->get('error_expiry_time');
		}

		if (!$this->error) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	private function validateReset() {
		if (!$this->user->hasPermission('modify', 'module/earthball')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		if (!$this->error) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function chart() {
		$this->load->language('module/earthball');

		$data = array();

		$data['visitor'] = array();
		$data['customer'] = array();
		$data['guest'] = array();
		$data['xaxis'] = array();

		$data['visitor']['label'] = $this->language->get('text_visitors');
		$data['customer']['label'] = $this->language->get('text_customers');
		$data['guest']['label'] = $this->language->get('text_guests');
		$data['page_view']['label'] = $this->language->get('text_page_views');

		if (isset($this->request->get['range'])) {
			$range = $this->request->get['range'];
		} else {
			$range = 'month';
		}

		switch ($range) {
			case 'week':
				$date_start = strtotime('-' . date('w') . ' days'); 

				for ($i = 0; $i < 7; $i++) {
					$date = date('Y-m-d', $date_start + ($i * 86400));

					$query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "counter_history` WHERE start_date = '" . $this->db->escape($date) . "'");

					if ($query->num_rows) {
						$data['visitor']['data'][] = array($i, (int)$query->row['session_counter']);
						$data['customer']['data'][] = array($i, (int)$query->row['customer_counter']);
						$data['guest']['data'][] = array($i, (int)$query->row['guest_counter']);
						$data['page_view']['data'][] = array($i, (int)$query->row['counter']);
					} else {
						$data['visitor']['data'][] = array($i, 0);
						$data['customer']['data'][] = array($i, 0);
						$data['guest']['data'][] = array($i, 0);
						$data['page_view']['data'][] = array($i, 0);
					}

					$data['xaxis'][] = array($i, date('D', strtotime($date)));
				}

				break;
			default:
			case 'month':
				for ($i = 1; $i <= date('t'); $i++) {
					$date = date('Y') . '-' . date('m') . '-' . $i;

					$query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "counter_history` WHERE start_date = '" . $this->db->escape($date) . "'");

					if ($query->num_rows) {
						$data['visitor']['data'][] = array($i, (int)$query->row['session_counter']);
						$data['customer']['data'][] = array($i, (int)$query->row['customer_counter']);
						$data['guest']['data'][] = array($i, (int)$query->row['guest_counter']);
						$data['page_view']['data'][] = array($i, (int)$query->row['counter']);
					} else {
						$data['visitor']['data'][] = array($i, 0);
						$data['customer']['data'][] = array($i, 0);
						$data['guest']['data'][] = array($i, 0);
						$data['page_view']['data'][] = array($i, 0);
					}	

					$data['xaxis'][] = array($i, date('j', strtotime($date)));
				}
				break;
			case 'year':
				for ($i = 1; $i <= 12; $i++) {
					$query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "counter_history` WHERE YEAR(start_date) = '" . date('Y') . "' AND MONTH(start_date) = '" . $i . "' GROUP BY MONTH(start_date)");

					if ($query->num_rows) {
						$data['visitor']['data'][] = array($i, (int)$query->row['session_counter']);
						$data['customer']['data'][] = array($i, (int)$query->row['customer_counter']);
						$data['guest']['data'][] = array($i, (int)$query->row['guest_counter']);
						$data['page_view']['data'][] = array($i, (int)$query->row['counter']);
					} else {
						$data['visitor']['data'][] = array($i, 0);
						$data['customer']['data'][] = array($i, 0);
						$data['guest']['data'][] = array($i, 0);
						$data['page_view']['data'][] = array($i, 0);
					}

					$data['xaxis'][] = array($i, date('M', mktime(0, 0, 0, $i, 1, date('Y'))));
				}			
				break;	
		} 

		$this->load->library('json');

		$this->response->setOutput(Json::encode($data));
	}
}
?>
