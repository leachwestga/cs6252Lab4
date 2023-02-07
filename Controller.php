<?php
require_once './model/OrderPrices.php';

class Controller {
    private $action;
    
    public function __construct() {
        $this->action = '';
    }
    
    public function invoke() {
        $this->getAction();
        
        switch ($this->action) {
            case 'order_form':
                $this->processDisplayOrderForm();
                break;
            case 'order_summary':
                $this->processDisplaySummary();
                break;
            default:
                $this->processDisplayOrderForm();
                break;
        }
    }
    
    /****************************************************************
     * Process requests
     ***************************************************************/
    private function processDisplayOrderForm() {
        $error_message = '';
        $quantity = '';
        include('./view/order_form.php');
    }

    private function processDisplaySummary() {
        $error_message = '';
        $quantity = '';
        include('./view/order_summary.php');
    }

    /****************************************************************
     * Get requested action
     ***************************************************************/
    private function getAction() {
        if ($this->action !== '') {
            return;
        }
        $this->action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        if ($this->action === NULL) {
            $this->action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            if ($this->action === NULL) {
                $this->action = 'order_form';
            }
        } 
    }
}

?>