<?php

namespace Nabz\Pagination;

use CodeIgniter\Config\Services;
use CodeIgniter\View\View;

class ViewBridge {
    protected $view;

    protected View $viewBridge;

    protected $data;

    public function __construct() {
        $this->viewBridge = Services::renderer();
    }

    public function make($view, $data = []) {
        $this->view = $view;
        $this->data = $data;

        return $this;
    }

    public function render(): string {
        return $this->viewBridge->setData($this->data)->render($this->view);
    }

    public function __toString() {
        return $this->render();
    }
}