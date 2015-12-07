<?php
class ModelFidoEarthball extends Model {
	public function checkTables() {
		$create_counter = "CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "counter` (`start_date` date NOT NULL, `counter` int(12) NOT NULL default '0') ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;";
		$this->db->query($create_counter);
		$create_counter_history = "CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "counter_history` (`start_date` date NOT NULL, `counter` int(12) NOT NULL default '0', `session_counter` int(12) NOT NULL default '0', `customer_counter` int(12) NOT NULL default '0', `guest_counter` int(12) NOT NULL default '0', PRIMARY KEY  (`start_date`)) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;";
		$this->db->query($create_counter_history);
		$create_whos_online = "CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "whos_online` (`customer_id` int(11) DEFAULT NULL, `full_name` varchar(255) collate utf8_bin NOT NULL, `session_id` varchar(128) collate utf8_bin NOT NULL, `session_data` text collate utf8_bin NOT NULL, `ip_address` varchar(15) collate utf8_bin NOT NULL, `time_entry` varchar(14) collate utf8_bin NOT NULL default '', `time_last_click` varchar(14) collate utf8_bin NOT NULL default '', `last_page_url` text collate utf8_bin NOT NULL, `host_address` text collate utf8_bin NOT NULL, `user_agent` text collate utf8_bin NOT NULL default '') ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;";
		$this->db->query($create_whos_online);
	}

	public function resetCounter() {
		$this->db->query("DROP TABLE " . DB_PREFIX . "counter");
		$this->db->query("DROP TABLE " . DB_PREFIX . "counter_history");
		$create_counter = "CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "counter` (`start_date` date NOT NULL, `counter` int(12) NOT NULL default '0') ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;";
		$this->db->query($create_counter);
		$create_counter_history = "CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "counter_history` (`start_date` date NOT NULL, `counter` int(12) NOT NULL default '0', `session_counter` int(12) NOT NULL default '0', `customer_counter` int(12) NOT NULL default '0', `guest_counter` int(12) NOT NULL default '0', PRIMARY KEY  (`start_date`)) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;";
		$this->db->query($create_counter_history);
	}

	public function getOnlineVisitors() {
		if ($this->config->get('earthball_show_bots')) {
			$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "whos_online ORDER BY time_last_click ASC");
		} else {
			$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "whos_online WHERE customer_id >= '0' ORDER BY time_last_click ASC");
		}
		return $query->rows;
	}

	public function getDashboardVisitors($limit = 0) {
		if ($limit) {
			$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "whos_online WHERE customer_id >= '0' ORDER BY time_last_click DESC LIMIT " . $limit);
		} else {
			$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "whos_online WHERE customer_id >= '0' ORDER BY time_last_click ASC");
		}
		return $query->rows;
	}

	public function countWhosOnline() {
		$query = $this->db->query("SELECT COUNT(*) AS count FROM " . DB_PREFIX . "whos_online WHERE customer_id >= '0'");
		if ($query->row) {
			return $query->row['count'];
		} else {
			return FALSE;
		}
	}

	public function countCustomersOnline() {
		$query = $this->db->query("SELECT COUNT(*) AS count FROM " . DB_PREFIX . "whos_online WHERE customer_id > '0'");
		if ($query->row) {
			return $query->row['count'];
		} else {
			return FALSE;
		}
	}

	public function countGuestsOnline() {
		$query = $this->db->query("SELECT COUNT(*) AS count FROM " . DB_PREFIX . "whos_online WHERE customer_id = '0'");
		if ($query->row) {
			return $query->row['count'];
		} else {
			return FALSE;
		}
	}

	public function countBotsOnline() {
		$query = $this->db->query("SELECT COUNT(*) AS count FROM " . DB_PREFIX . "whos_online WHERE customer_id < '0'");
		if ($query->row) {
			return $query->row['count'];
		} else {
			return FALSE;
		}
	}

	public function deleteWhosOnline($xx_mins_ago) {
		$this->db->query("DELETE FROM " . DB_PREFIX . "whos_online WHERE time_last_click <= '" . $xx_mins_ago . "'");
	}

	public function getCounter() {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "counter");
		if ($query->row) {
			return $query->row;
		} else {
			return FALSE;
		}
	}

	public function countTotalVisitors($start_date) {
		$query = $this->db->query("SELECT SUM(session_counter) AS total FROM " . DB_PREFIX . "counter_history WHERE start_date >= '" . $start_date . "'");
		if ($query->row) {
			return $query->row['total'];
		} else {
			return FALSE;
		}
	}

	public function countTotalCustomers($start_date) {
		$query = $this->db->query("SELECT SUM(customer_counter) AS total FROM " . DB_PREFIX . "counter_history WHERE start_date >= '" . $start_date . "'");
		if ($query->row) {
			return $query->row['total'];
		} else {
			return FALSE;
		}
	}

	public function countTotalGuests($start_date) {
		$query = $this->db->query("SELECT SUM(guest_counter) AS total FROM " . DB_PREFIX . "counter_history WHERE start_date >= '" . $start_date . "'");
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
}
?>
