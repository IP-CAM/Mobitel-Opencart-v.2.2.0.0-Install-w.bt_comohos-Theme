<?php
class ControllerCommonSearch extends Controller {
	public function index() {
		$this->load->language('common/search');

		$data['text_search'] = $this->language->get('text_search');

		if (isset($this->request->get['search'])) {
			$data['search'] = $this->request->get['search'];
		} else {
			$data['search'] = '';
		}


			$this->load->model('setting/setting');
			$module_info = current($this->model_setting_setting->getSetting("search_autocomplete"));
			$data['image'] = $module_info['image'];
			$data['price'] = $module_info['price'];
			$data['status'] = $module_info['status'];
			$data['limit'] = $module_info['limit'];
			
		return $this->load->view('common/search', $data);
	}
}