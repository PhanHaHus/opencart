<?php
class ControllerModuleEarthball extends Controller {
	protected function index($module) {
		$this->load->language('module/earthball');
		$this->load->model('fido/earthball');

		// Who's Online
		$user_agent = (isset($this->request->server['HTTP_USER_AGENT']) ? $this->request->server['HTTP_USER_AGENT'] : '');
		$bot_online = ($this->model_fido_earthball->isBot($user_agent) ? TRUE : FALSE);

		if ($this->customer->isLogged()) {
			$customer_id = $this->customer->getId();
			$full_name = $this->customer->getLastName() . ', ' . $this->customer->getFirstName();
			if (isset($this->session->data['customer_counter']) && $this->session->data['customer_counter'] == TRUE) {
				$customer_counter = 0;
			} else {
				$customer_counter = 1;
				$this->session->data['customer_counter'] = TRUE;
			}
		} else {
			if ($bot_online) {
				$customer_id = -1;
				$full_name = $this->language->get('text_bot');
			} else {
				$customer_id = 0;
				$full_name = $this->language->get('text_guest');
			}
			if (isset($this->session->data['customer_counter'])) {
				unset($this->session->data['customer_counter']);
			}
			$customer_counter = 0;
		}

		$session_id = session_id();
		$session_data = serialize($this->session->data);
		$last_page_url = $this->request->server['REQUEST_URI'];
		$ip_address = $this->request->server['REMOTE_ADDR'];
		$host_address = gethostbyaddr($ip_address);
		$admin_user = $this->model_fido_earthball->checkAdminUser($ip_address);

		$current_time = time();
		$expiry_time = $this->config->get('earthball_expiry_time');

		$xx_mins_ago = ($current_time - $expiry_time);

		$this->model_fido_earthball->deleteWhosOnline($xx_mins_ago);

		$online_customers = $this->model_fido_earthball->getOnlineCustomers($session_id);

		if ($online_customers > 0) {
			if (!$admin_user) {
				$this->model_fido_earthball->updateWhosOnline($customer_id, $full_name, $session_id, $session_data, $ip_address, $current_time, $last_page_url);
			}
		} else {
			if (!$admin_user) {
				$this->model_fido_earthball->addWhosOnline($customer_id, $full_name, $session_id, $session_data, $ip_address, $current_time, $last_page_url, $host_address, $user_agent);
			}
		}

		// Counters
		if (isset($this->session->data['session_counter']) && $this->session->data['session_counter'] == TRUE) {
			$session_counter = 0;
			$guest_counter = 0;
		} else {
			if ($bot_online) {
				$session_counter = 0;
				$guest_counter = 0;
			} else {
				$session_counter = 1;
				$guest_counter = 1;
			}
			$this->session->data['session_counter'] = TRUE;
			$this->session->data['guest_counter'] = TRUE;
		}

		$current_date = date('Y-m-d');

		$counter_history = $this->model_fido_earthball->getCounterHistory($current_date);
		if (!$bot_online) {
			if ($counter_history) {
				$history_counter_now = $counter_history['counter'] + 1;
				$session_counter_now = ($counter_history['session_counter'] + $session_counter);
				$customer_counter_now = ($counter_history['customer_counter'] + $customer_counter);
				$guest_counter_now = ($counter_history['guest_counter'] + $guest_counter);
				if (!$admin_user) {
					$this->model_fido_earthball->updateCounterHistory($history_counter_now, $session_counter_now, $customer_counter_now, $guest_counter_now, $current_date, $ip_address);
				}
			} else {
				if (!$admin_user) {
					$this->model_fido_earthball->addCounterHistory($current_date, $ip_address);
				}
			}
		}

		$counter = $this->model_fido_earthball->getCounter();
		if ($counter) {
			$start_date = $counter['start_date'];
			if (!$bot_online) {
				$counter_now = ($counter['counter'] + 1);
				if (!$admin_user) {
					$this->model_fido_earthball->updateCounter($counter_now, $ip_address);
				}
			}
		} else {
			$start_date = $current_date;
			if (!$bot_online) {
				if (!$admin_user) {
					$this->model_fido_earthball->addCounter($current_date, $ip_address);
				}
			}
		}

		$total_visitors = $this->model_fido_earthball->countTotalVisitors($start_date);
		$page_views = $this->model_fido_earthball->countPageViews($start_date);
		$whos_online = $this->model_fido_earthball->countWhosOnline();
		$online_guests = $this->model_fido_earthball->countOnlineGuests();
		$online_customers = $this->model_fido_earthball->countOnlineCustomers();

		$this->data['heading_title'] = $this->language->get('heading_title');

		$this->data['text_visitors'] = sprintf($this->language->get('text_visitors'), date($this->language->get('date_format_short'), strtotime($start_date)));
		$this->data['text_total_visitors'] = sprintf($this->language->get('text_total_visitors'), number_format($total_visitors));
		$this->data['text_page_views'] = sprintf($this->language->get('text_page_views'), number_format($page_views));
		$this->data['text_whos_online'] = sprintf($this->language->get('text_whos_online'), number_format($whos_online));
		$this->data['text_online_guests'] = sprintf($this->language->get('text_online_guests'), number_format($online_guests));
		$this->data['text_online_customers'] = sprintf($this->language->get('text_online_customers'), number_format($online_customers));

		$this->data['show_globe'] = $this->config->get('earthball_show_globe');
		$this->data['earthball_code'] = html_entity_decode($this->config->get('earthball_earth_code'));

		$this->data['show_visitors'] = $this->config->get('earthball_show_visitors');

		$this->data['module_position'] = $this->config->get('earthball_' . $module . '_position');

		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/module/earthball.tpl')) {
			$this->template = $this->config->get('config_template') . '/template/module/earthball.tpl';
		} else {
			$this->template = 'default/template/module/earthball.tpl';
		}
		$this->render();
	}
}
?>
