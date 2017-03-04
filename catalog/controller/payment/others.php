<?php
class ControllerPaymentOthers extends Controller {
	public function index() {
		$data['text_loading'] = $this->language->get('text_loading');
		$data['button_confirm'] = $this->language->get('button_confirm');

		$data['continue'] = $this->url->link('checkout/success');

		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/payment/others.tpl')) {
			return $this->load->view($this->config->get('config_template') . '/template/payment/others.tpl', $data);
		} else {
			return $this->load->view('default/template/payment/others.tpl', $data);
		}
	}

	public function confirm() {
		if ($this->session->data['payment_method']['code'] == 'others') {
			$this->load->language('payment/others');

			$this->load->model('checkout/order');

			$this->model_checkout_order->addOrderHistory($this->session->data['order_id'], $this->config->get('others_order_status_id'), '', true);
		}
	}
}