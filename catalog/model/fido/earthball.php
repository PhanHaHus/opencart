<?php
class ModelFidoEarthball extends Model {
	public function addWhosOnline($customer_id, $full_name, $session_id, $session_data, $ip_address, $current_time, $last_page_url, $host_address, $user_agent) {
		$this->db->query("INSERT INTO " . DB_PREFIX . "whos_online SET customer_id = '" . (int)$customer_id . "', full_name = '" . $this->db->escape($full_name) . "', session_id = '" . $this->db->escape($session_id) . "', session_data = '" . $this->db->escape($session_data) . "', ip_address = '" . $this->db->escape($ip_address) . "', time_entry = '" . $this->db->escape($current_time) . "', time_last_click = '" . $this->db->escape($current_time) . "', last_page_url = '" . $this->db->escape($last_page_url) . "', host_address = '" . $this->db->escape($host_address) . "', user_agent = '" . $this->db->escape($user_agent) . "'");
	}

	public function updateWhosOnline($customer_id, $full_name, $session_id, $session_data, $ip_address, $current_time, $last_page_url) {
		$this->db->query("UPDATE " . DB_PREFIX . "whos_online SET customer_id = '" . (int)$customer_id . "', full_name = '" . $this->db->escape($full_name) . "', session_data = '" . $this->db->escape($session_data) . "', ip_address = '" . $this->db->escape($ip_address) . "', time_last_click = '" . $this->db->escape($current_time) . "', last_page_url = '" . $this->db->escape($last_page_url) . "' WHERE session_id = '" . $session_id . "' AND ip_address = '" . $ip_address . "'");
	}

	public function deleteWhosOnline($xx_mins_ago) {
		$this->db->query("DELETE FROM " . DB_PREFIX . "whos_online WHERE time_last_click <= '" . $xx_mins_ago . "'");
	}

	public function getOnlineCustomers($session_id) {
		$query = $this->db->query("SELECT COUNT(*) AS count FROM " . DB_PREFIX . "whos_online WHERE session_id = '" . $session_id . "'");

		if ($query->row) {
			return $query->row['count'];
		} else {
			return FALSE;
		}
	}

	public function countWhosOnline() {
		$query = $this->db->query("SELECT COUNT(*) AS count FROM " . DB_PREFIX . "whos_online WHERE customer_id >= '0'");

		if ($query->row) {
			return $query->row['count'];
		} else {
			return FALSE;
		}
	}

	public function countOnlineGuests() {
		$query = $this->db->query("SELECT COUNT(*) AS count FROM " . DB_PREFIX . "whos_online WHERE customer_id = '0'");

		if ($query->row) {
			return $query->row['count'];
		} else {
			return FALSE;
		}
	}

	public function countOnlineCustomers() {
		$query = $this->db->query("SELECT COUNT(*) AS count FROM " . DB_PREFIX . "whos_online WHERE customer_id > '0'");

		if ($query->row) {
			return $query->row['count'];
		} else {
			return FALSE;
		}
	}

	public function getCounter() {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "counter");

		if ($query->row) {
			return $query->row;
		} else {
			return FALSE;
		}
	}

	public function addCounter($current_date, $ip_address) {
		$this->db->query("INSERT INTO " . DB_PREFIX . "counter SET start_date = '" . $this->db->escape($current_date) . "', counter = '1'");
	}

	public function updateCounter($counter_now, $ip_address) {
		$this->db->query("UPDATE " . DB_PREFIX . "counter SET counter = '" . (int)$counter_now . "'");
	}

	public function getCounterHistory($current_date) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "counter_history WHERE start_date='" . $current_date . "'");

		if ($query->row) {
			return $query->row;
		} else {
			return FALSE;
		}
	}

	public function addCounterHistory($current_date, $ip_address) {
		$this->db->query("INSERT INTO " . DB_PREFIX . "counter_history SET start_date = '" . $this->db->escape($current_date) . "', counter = '1', session_counter = '1', customer_counter = '0', guest_counter = '1'");
	}

	public function updateCounterHistory($counter_now, $session_counter_now, $customer_counter_now, $guest_counter_now, $current_date, $ip_address) {
		$this->db->query("UPDATE " . DB_PREFIX . "counter_history SET counter = '" . (int)$counter_now . "', session_counter = '" . (int)$session_counter_now . "', customer_counter = '" . (int)$customer_counter_now . "', guest_counter = '" . (int)$guest_counter_now . "' WHERE start_date = '" . $current_date . "'");
	}

	public function countTotalVisitors($start_date) {
		$query = $this->db->query("SELECT SUM(session_counter) AS total FROM " . DB_PREFIX . "counter_history WHERE start_date >= '" . $start_date . "'");

		if ($query->row) {
			return $query->row['total'];
		} else {
			return FALSE;
		}
	}

	public function countPageViews($start_date) {
		$query = $this->db->query("SELECT SUM(counter) AS total FROM " . DB_PREFIX . "counter_history WHERE start_date >= '" . $start_date . "'");

		if ($query->row) {
			return $query->row['total'];
		} else {
			return FALSE;
		}
	}

	public function checkAdminUser($ip_address) {
		$this->load->library('user');
		$this->registry->set('user', new User($this->registry));

		if ($this->user->isLogged()) {
			return TRUE;
		} elseif ($ip_address == '127.0.0.1') {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function isBot($user_agent) {
		$bots = file(DIR_SYSTEM . 'helper/spiders.txt');
		foreach ($bots as $bot) {
			if(stripos($user_agent, trim($bot)) != false) {
				return TRUE;
			}
		}
		return FALSE;
	}
}
?>
