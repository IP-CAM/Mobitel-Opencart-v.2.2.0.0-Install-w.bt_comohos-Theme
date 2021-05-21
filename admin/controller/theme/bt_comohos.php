<?php
class ControllerThemeBtComohos extends Controller {
	private $error = array();

	public function index() {
		$this->load->language('theme/bt_comohos');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('setting/setting');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
			$this->model_setting_setting->editSetting('bt_comohos', $this->request->post, $this->request->get['store_id']);

			$this->session->data['success'] = $this->language->get('text_success');

			$this->response->redirect($this->url->link('extension/theme', 'token=' . $this->session->data['token'], true));
		}

		$data['heading_title'] = $this->language->get('heading_title');

		$data['text_edit'] = $this->language->get('text_edit');
		$data['text_enabled'] = $this->language->get('text_enabled');
		$data['text_disabled'] = $this->language->get('text_disabled');
		$data['text_product'] = $this->language->get('text_product');
		$data['text_image'] = $this->language->get('text_image');
		$data['text_general'] = $this->language->get('text_general');
		
		$data['entry_directory'] = $this->language->get('entry_directory');
		$data['entry_status'] = $this->language->get('entry_status');		
		$data['entry_product_limit'] = $this->language->get('entry_product_limit');
		$data['entry_product_description_length'] = $this->language->get('entry_product_description_length');
		$data['entry_image_category'] = $this->language->get('entry_image_category');
		$data['entry_image_thumb'] = $this->language->get('entry_image_thumb');
		$data['entry_image_popup'] = $this->language->get('entry_image_popup');
		$data['entry_image_product'] = $this->language->get('entry_image_product');
		$data['entry_image_additional'] = $this->language->get('entry_image_additional');
		$data['entry_image_related'] = $this->language->get('entry_image_related');
		$data['entry_image_compare'] = $this->language->get('entry_image_compare');
		$data['entry_image_wishlist'] = $this->language->get('entry_image_wishlist');
		$data['entry_image_cart'] = $this->language->get('entry_image_cart');
		$data['entry_image_location'] = $this->language->get('entry_image_location');
		$data['entry_width'] = $this->language->get('entry_width');
		$data['entry_height'] = $this->language->get('entry_height');
		
		$data['help_product_limit'] = $this->language->get('help_product_limit');
		$data['help_product_description_length'] = $this->language->get('help_product_description_length');
		$data['help_directory'] = $this->language->get('help_directory');

		$data['button_save'] = $this->language->get('button_save');
		$data['button_cancel'] = $this->language->get('button_cancel');

		if (isset($this->error['warning'])) {
			$data['error_warning'] = $this->error['warning'];
		} else {
			$data['error_warning'] = '';
		}

		if (isset($this->error['product_limit'])) {
			$data['error_product_limit'] = $this->error['product_limit'];
		} else {
			$data['error_product_limit'] = '';
		}

		if (isset($this->error['product_description_length'])) {
			$data['error_product_description_length'] = $this->error['product_description_length'];
		} else {
			$data['error_product_description_length'] = '';
		}

		if (isset($this->error['image_category'])) {
			$data['error_image_category'] = $this->error['image_category'];
		} else {
			$data['error_image_category'] = '';
		}

		if (isset($this->error['image_thumb'])) {
			$data['error_image_thumb'] = $this->error['image_thumb'];
		} else {
			$data['error_image_thumb'] = '';
		}

		if (isset($this->error['image_popup'])) {
			$data['error_image_popup'] = $this->error['image_popup'];
		} else {
			$data['error_image_popup'] = '';
		}

		if (isset($this->error['image_product'])) {
			$data['error_image_product'] = $this->error['image_product'];
		} else {
			$data['error_image_product'] = '';
		}

		if (isset($this->error['image_additional'])) {
			$data['error_image_additional'] = $this->error['image_additional'];
		} else {
			$data['error_image_additional'] = '';
		}

		if (isset($this->error['image_related'])) {
			$data['error_image_related'] = $this->error['image_related'];
		} else {
			$data['error_image_related'] = '';
		}

		if (isset($this->error['image_compare'])) {
			$data['error_image_compare'] = $this->error['image_compare'];
		} else {
			$data['error_image_compare'] = '';
		}

		if (isset($this->error['image_wishlist'])) {
			$data['error_image_wishlist'] = $this->error['image_wishlist'];
		} else {
			$data['error_image_wishlist'] = '';
		}

		if (isset($this->error['image_cart'])) {
			$data['error_image_cart'] = $this->error['image_cart'];
		} else {
			$data['error_image_cart'] = '';
		}

		if (isset($this->error['image_location'])) {
			$data['error_image_location'] = $this->error['image_location'];
		} else {
			$data['error_image_location'] = '';
		}
		
		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', 'token=' . $this->session->data['token'], true)
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_theme'),
			'href' => $this->url->link('extension/theme', 'token=' . $this->session->data['token'], true)
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('theme/bt_comohos', 'token=' . $this->session->data['token'] . '&store_id=' . $this->request->get['store_id'], true)
		);

		$data['action'] = $this->url->link('theme/bt_comohos', 'token=' . $this->session->data['token'] . '&store_id=' . $this->request->get['store_id'], true);

		$data['cancel'] = $this->url->link('extension/theme', 'token=' . $this->session->data['token'], true);

		if (isset($this->request->get['store_id']) && ($this->request->server['REQUEST_METHOD'] != 'POST')) {
			$setting_info = $this->model_setting_setting->getSetting('bt_comohos', $this->request->get['store_id']);
		}
		
		if (isset($this->request->post['bt_comohos_directory'])) {
			$data['bt_comohos_directory'] = $this->request->post['bt_comohos_directory'];
		} elseif (isset($setting_info['bt_comohos_directory'])) {
			$data['bt_comohos_directory'] = $setting_info['bt_comohos_directory'];
		} else {
			$data['bt_comohos_directory'] = 'default';
		}		

		$data['directories'] = array();

		$directories = glob(DIR_CATALOG . 'view/theme/*', GLOB_ONLYDIR);

		foreach ($directories as $directory) {
			$data['directories'][] = basename($directory);
		}

		if (isset($this->request->post['bt_comohos_product_limit'])) {
			$data['bt_comohos_product_limit'] = $this->request->post['bt_comohos_product_limit'];
		} elseif (isset($setting_info['bt_comohos_product_limit'])) {
			$data['bt_comohos_product_limit'] = $setting_info['bt_comohos_product_limit'];
		} else {
			$data['bt_comohos_product_limit'] = 15;
		}		
		
		if (isset($this->request->post['bt_comohos_status'])) {
			$data['bt_comohos_status'] = $this->request->post['bt_comohos_status'];
		} elseif (isset($setting_info['bt_comohos_status'])) {
			$data['bt_comohos_status'] = $this->config->get('bt_comohos_status');
		} else {
			$data['bt_comohos_status'] = '';
		}
		
		if (isset($this->request->post['bt_comohos_product_description_length'])) {
			$data['bt_comohos_product_description_length'] = $this->request->post['bt_comohos_product_description_length'];
		} elseif (isset($setting_info['bt_comohos_product_description_length'])) {
			$data['bt_comohos_product_description_length'] = $this->config->get('bt_comohos_product_description_length');
		} else {
			$data['bt_comohos_product_description_length'] = 100;
		}
		
		if (isset($this->request->post['bt_comohos_image_category_width'])) {
			$data['bt_comohos_image_category_width'] = $this->request->post['bt_comohos_image_category_width'];
		} elseif (isset($setting_info['bt_comohos_image_category_width'])) {
			$data['bt_comohos_image_category_width'] = $this->config->get('bt_comohos_image_category_width');
		} else {
			$data['bt_comohos_image_category_width'] = 80;		
		}
		
		if (isset($this->request->post['bt_comohos_image_category_height'])) {
			$data['bt_comohos_image_category_height'] = $this->request->post['bt_comohos_image_category_height'];
		} elseif (isset($setting_info['bt_comohos_image_category_height'])) {
			$data['bt_comohos_image_category_height'] = $this->config->get('bt_comohos_image_category_height');
		} else {
			$data['bt_comohos_image_category_height'] = 80;
		}
		
		if (isset($this->request->post['bt_comohos_image_thumb_width'])) {
			$data['bt_comohos_image_thumb_width'] = $this->request->post['bt_comohos_image_thumb_width'];
		} elseif (isset($setting_info['bt_comohos_image_thumb_width'])) {
			$data['bt_comohos_image_thumb_width'] = $this->config->get('bt_comohos_image_thumb_width');
		} else {
			$data['bt_comohos_image_thumb_width'] = 228;
		}
		
		if (isset($this->request->post['bt_comohos_image_thumb_height'])) {
			$data['bt_comohos_image_thumb_height'] = $this->request->post['bt_comohos_image_thumb_height'];
		} elseif (isset($setting_info['bt_comohos_image_thumb_height'])) {
			$data['bt_comohos_image_thumb_height'] = $this->config->get('bt_comohos_image_thumb_height');
		} else {
			$data['bt_comohos_image_thumb_height'] = 228;		
		}
		
		if (isset($this->request->post['bt_comohos_image_popup_width'])) {
			$data['bt_comohos_image_popup_width'] = $this->request->post['bt_comohos_image_popup_width'];
		} elseif (isset($setting_info['bt_comohos_image_popup_width'])) {
			$data['bt_comohos_image_popup_width'] = $this->config->get('bt_comohos_image_popup_width');
		} else {
			$data['bt_comohos_image_popup_width'] = 500;
		}
		
		if (isset($this->request->post['bt_comohos_image_popup_height'])) {
			$data['bt_comohos_image_popup_height'] = $this->request->post['bt_comohos_image_popup_height'];
		} elseif (isset($setting_info['bt_comohos_image_popup_height'])) {
			$data['bt_comohos_image_popup_height'] = $this->config->get('bt_comohos_image_popup_height');
		} else {
			$data['bt_comohos_image_popup_height'] = 500;
		}
		
		if (isset($this->request->post['bt_comohos_image_product_width'])) {
			$data['bt_comohos_image_product_width'] = $this->request->post['bt_comohos_image_product_width'];
		} elseif (isset($setting_info['bt_comohos_image_product_width'])) {
			$data['bt_comohos_image_product_width'] = $this->config->get('bt_comohos_image_product_width');
		} else {
			$data['bt_comohos_image_product_width'] = 228;
		}
		
		if (isset($this->request->post['bt_comohos_image_product_height'])) {
			$data['bt_comohos_image_product_height'] = $this->request->post['bt_comohos_image_product_height'];
		} elseif (isset($setting_info['bt_comohos_image_product_height'])) {
			$data['bt_comohos_image_product_height'] = $this->config->get('bt_comohos_image_product_height');
		} else {
			$data['bt_comohos_image_product_height'] = 228;
		}
		
		if (isset($this->request->post['bt_comohos_image_additional_width'])) {
			$data['bt_comohos_image_additional_width'] = $this->request->post['bt_comohos_image_additional_width'];
		} elseif (isset($setting_info['bt_comohos_image_additional_width'])) {
			$data['bt_comohos_image_additional_width'] = $this->config->get('bt_comohos_image_additional_width');
		} else {
			$data['bt_comohos_image_additional_width'] = 74;
		}
		
		if (isset($this->request->post['bt_comohos_image_additional_height'])) {
			$data['bt_comohos_image_additional_height'] = $this->request->post['bt_comohos_image_additional_height'];
		} elseif (isset($setting_info['bt_comohos_image_additional_height'])) {
			$data['bt_comohos_image_additional_height'] = $this->config->get('bt_comohos_image_additional_height');
		} else {
			$data['bt_comohos_image_additional_height'] = 74;
		}
		
		if (isset($this->request->post['bt_comohos_image_related_width'])) {
			$data['bt_comohos_image_related_width'] = $this->request->post['bt_comohos_image_related_width'];
		} elseif (isset($setting_info['bt_comohos_image_related_width'])) {
			$data['bt_comohos_image_related_width'] = $this->config->get('bt_comohos_image_related_width');
		} else {
			$data['bt_comohos_image_related_width'] = 80;
		}
		
		if (isset($this->request->post['bt_comohos_image_related_height'])) {
			$data['bt_comohos_image_related_height'] = $this->request->post['bt_comohos_image_related_height'];
		} elseif (isset($setting_info['bt_comohos_image_related_height'])) {
			$data['bt_comohos_image_related_height'] = $this->config->get('bt_comohos_image_related_height');
		} else {
			$data['bt_comohos_image_related_height'] = 80;
		}
		
		if (isset($this->request->post['bt_comohos_image_compare_width'])) {
			$data['bt_comohos_image_compare_width'] = $this->request->post['bt_comohos_image_compare_width'];
		} elseif (isset($setting_info['bt_comohos_image_compare_width'])) {
			$data['bt_comohos_image_compare_width'] = $this->config->get('bt_comohos_image_compare_width');
		} else {
			$data['bt_comohos_image_compare_width'] = 90;
		}
		
		if (isset($this->request->post['bt_comohos_image_compare_height'])) {
			$data['bt_comohos_image_compare_height'] = $this->request->post['bt_comohos_image_compare_height'];
		} elseif (isset($setting_info['bt_comohos_image_compare_height'])) {
			$data['bt_comohos_image_compare_height'] = $this->config->get('bt_comohos_image_compare_height');
		} else {
			$data['bt_comohos_image_compare_height'] = 90;
		}
		
		if (isset($this->request->post['bt_comohos_image_wishlist_width'])) {
			$data['bt_comohos_image_wishlist_width'] = $this->request->post['bt_comohos_image_wishlist_width'];
		} elseif (isset($setting_info['bt_comohos_image_wishlist_width'])) {
			$data['bt_comohos_image_wishlist_width'] = $this->config->get('bt_comohos_image_wishlist_width');
		} else {
			$data['bt_comohos_image_wishlist_width'] = 47;
		}
		
		if (isset($this->request->post['bt_comohos_image_wishlist_height'])) {
			$data['bt_comohos_image_wishlist_height'] = $this->request->post['bt_comohos_image_wishlist_height'];
		} elseif (isset($setting_info['bt_comohos_image_wishlist_height'])) {
			$data['bt_comohos_image_wishlist_height'] = $this->config->get('bt_comohos_image_wishlist_height');
		} else {
			$data['bt_comohos_image_wishlist_height'] = 47;
		}
		
		if (isset($this->request->post['bt_comohos_image_cart_width'])) {
			$data['bt_comohos_image_cart_width'] = $this->request->post['bt_comohos_image_cart_width'];
		} elseif (isset($setting_info['bt_comohos_image_cart_width'])) {
			$data['bt_comohos_image_cart_width'] = $this->config->get('bt_comohos_image_cart_width');
		} else {
			$data['bt_comohos_image_cart_width'] = 47;
		}
		
		if (isset($this->request->post['bt_comohos_image_cart_height'])) {
			$data['bt_comohos_image_cart_height'] = $this->request->post['bt_comohos_image_cart_height'];
		} elseif (isset($setting_info['bt_comohos_image_cart_height'])) {
			$data['bt_comohos_image_cart_height'] = $this->config->get('bt_comohos_image_cart_height');
		} else {
			$data['bt_comohos_image_cart_height'] = 47;
		}
		
		if (isset($this->request->post['bt_comohos_image_location_width'])) {
			$data['bt_comohos_image_location_width'] = $this->request->post['bt_comohos_image_location_width'];
		} elseif (isset($setting_info['bt_comohos_image_location_width'])) {
			$data['bt_comohos_image_location_width'] = $this->config->get('bt_comohos_image_location_width');
		} else {
			$data['bt_comohos_image_location_width'] = 268;
		}
		
		if (isset($this->request->post['bt_comohos_image_location_height'])) {
			$data['bt_comohos_image_location_height'] = $this->request->post['bt_comohos_image_location_height'];
		} elseif (isset($setting_info['bt_comohos_image_location_height'])) {
			$data['bt_comohos_image_location_height'] = $this->config->get('bt_comohos_image_location_height');
		} else {
			$data['bt_comohos_image_location_height'] = 50;
		}
		
		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('theme/bt_comohos', $data));
	}

	protected function validate() {
		if (!$this->user->hasPermission('modify', 'theme/bt_comohos')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		if (!$this->request->post['bt_comohos_product_limit']) {
			$this->error['product_limit'] = $this->language->get('error_limit');
		}

		if (!$this->request->post['bt_comohos_product_description_length']) {
			$this->error['product_description_length'] = $this->language->get('error_limit');
		}

		if (!$this->request->post['bt_comohos_image_category_width'] || !$this->request->post['bt_comohos_image_category_height']) {
			$this->error['image_category'] = $this->language->get('error_image_category');
		}

		if (!$this->request->post['bt_comohos_image_thumb_width'] || !$this->request->post['bt_comohos_image_thumb_height']) {
			$this->error['image_thumb'] = $this->language->get('error_image_thumb');
		}

		if (!$this->request->post['bt_comohos_image_popup_width'] || !$this->request->post['bt_comohos_image_popup_height']) {
			$this->error['image_popup'] = $this->language->get('error_image_popup');
		}

		if (!$this->request->post['bt_comohos_image_product_width'] || !$this->request->post['bt_comohos_image_product_height']) {
			$this->error['image_product'] = $this->language->get('error_image_product');
		}

		if (!$this->request->post['bt_comohos_image_additional_width'] || !$this->request->post['bt_comohos_image_additional_height']) {
			$this->error['image_additional'] = $this->language->get('error_image_additional');
		}

		if (!$this->request->post['bt_comohos_image_related_width'] || !$this->request->post['bt_comohos_image_related_height']) {
			$this->error['image_related'] = $this->language->get('error_image_related');
		}

		if (!$this->request->post['bt_comohos_image_compare_width'] || !$this->request->post['bt_comohos_image_compare_height']) {
			$this->error['image_compare'] = $this->language->get('error_image_compare');
		}

		if (!$this->request->post['bt_comohos_image_wishlist_width'] || !$this->request->post['bt_comohos_image_wishlist_height']) {
			$this->error['image_wishlist'] = $this->language->get('error_image_wishlist');
		}

		if (!$this->request->post['bt_comohos_image_cart_width'] || !$this->request->post['bt_comohos_image_cart_height']) {
			$this->error['image_cart'] = $this->language->get('error_image_cart');
		}

		if (!$this->request->post['bt_comohos_image_location_width'] || !$this->request->post['bt_comohos_image_location_height']) {
			$this->error['image_location'] = $this->language->get('error_image_location');
		}

		return !$this->error;
	}
}