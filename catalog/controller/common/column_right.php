<?php
class ControllerCommonColumnRight extends Controller {
	public function index() {
         $var = $this->db->query("select oc_product.product_id,oc_product.image,oc_product.price,oc_product.price2
                ,oc_product_description.name 
                from oc_product 
                JOIN oc_product_special
                 ON oc_product.product_id=oc_product_special.product_id 
                JOIN oc_product_description
                  ON oc_product_description.product_id = oc_product.product_id GROUP BY oc_product_description.product_id LIMIT 5  
                ");
                $special_products = $var->rows;//return rows from query result.
                foreach($special_products as $key => $special_product){
                    $special_products[$key]['href']=$this->url->link('product/product', 'product_id=' . $special_product['product_id']);
                }
                
		$this->load->model('design/layout');
                
		if (isset($this->request->get['route'])) {
			$route = (string)$this->request->get['route'];
		} else {
			$route = 'common/home';
		}

		$layout_id = 0;

		if ($route == 'product/category' && isset($this->request->get['path'])) {
			$this->load->model('catalog/category');

			$path = explode('_', (string)$this->request->get['path']);

			$layout_id = $this->model_catalog_category->getCategoryLayoutId(end($path));
		}

		if ($route == 'product/product' && isset($this->request->get['product_id'])) {
			$this->load->model('catalog/product');

			$layout_id = $this->model_catalog_product->getProductLayoutId($this->request->get['product_id']);
		}

		if ($route == 'information/information' && isset($this->request->get['information_id'])) {
			$this->load->model('catalog/information');

			$layout_id = $this->model_catalog_information->getInformationLayoutId($this->request->get['information_id']);
		}

		if (!$layout_id) {
			$layout_id = $this->model_design_layout->getLayout($route);
		}

		if (!$layout_id) {
			$layout_id = $this->config->get('config_layout_id');
		}

		$this->load->model('extension/module');

		$data['modules'] = array();

		$modules = $this->model_design_layout->getLayoutModules($layout_id, 'column_right');

		foreach ($modules as $module) {
			$part = explode('.', $module['code']);

			if (isset($part[0]) && $this->config->get($part[0] . '_status')) {
				$data['modules'][] = $this->load->controller('module/' . $part[0]);
			}

			if (isset($part[1])) {
				$setting_info = $this->model_extension_module->getModule($part[1]);

				if ($setting_info && $setting_info['status']) {
					$data['modules'][] = $this->load->controller('module/' . $part[0], $setting_info);
				}
			}
		}
                $data['telephone'] = $this->config->get('config_telephone');
                $data['special_products'] = $special_products;
		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/common/column_right.tpl')) {
			return $this->load->view($this->config->get('config_template') . '/template/common/column_right.tpl', $data);
		} else {
			return $this->load->view('default/template/common/column_right.tpl', $data);
		}
	}
}