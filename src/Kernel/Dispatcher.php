<?php

namespace hamza\pdo\Kernel;
use hamza\pdo\Configuration\Config;

class Dispatcher {
    private $controller;
    private $method;

    public function __construct()
    {
        $this->controller = Config::CONTROLLER.'Home';
        $this->method = 'index';
        if (isset($_GET['controller'])) {           
            if(class_exists(Config::CONTROLLER.$_GET['controller'])) {
                $this->controller = Config::CONTROLLER.$_GET['controller'];
            }
        }
        if (isset($_GET['method'])) {
            if (method_exists($this->controller, $_GET['method'])) {
                $this->method = $_GET['method'];
            } else {
                $this->controller = Config::CONTROLLER . 'Home';
                // $this->method = 'index';
            }
        }
    }

    public function Dispatch() {
        // echo 'je suis ds le controller ' .$this->controller;
        // die;
        $method = $this->method;
        $cont = new $this->controller;
        // $cont->index();
        $cont->$method();

    }
}