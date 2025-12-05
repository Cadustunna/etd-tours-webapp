<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

abstract class Controller {
    protected $request;
    protected $action;

    public function __construct($request, $action) {
        $this->request = $request;
        $this->action = $action;
    }
    
    public function executeAction() 
    {
        if (method_exists($this, $this->action)) {
            return $this->{$this->action}();
        } else {
            echo "Action '{$this->action}' does not exist in " . get_class($this);
            return false;
        }
    }
    
    protected function returnView($viewModel, $fullView = true)
    {
        if (!is_array($viewModel)) {
            $viewModel = [];
        }

        extract($viewModel);

        // Path for the main layout
        $mainView = APP_ROOT . '/views/main.php';

        // Path for the specific view (controller/action)
        $view = APP_ROOT . '/views/' . strtolower(get_class($this)) . '/' . $this->action . '.php';

        if ($fullView) {
            if (!file_exists($view)) {
                die("View file not found at $view");
            }
            require_once($mainView);  // main.php will now have $view
        } else {
            if (!file_exists($view)) {
                die("View file not found at $view");
            }
            require_once($view);
        }
    }
}
