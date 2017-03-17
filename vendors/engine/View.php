<?php
class View
{
    public $template = 'layout';
    public function render($view,$data=[])
    {
        if (is_array($data)) {
            extract($data);
        }

        $path = 'app/views/';
        if (is_null($this->template)) {
            if (file_exists($path.$view.'.php')) {
                include_once $path.$view.'.php';
            } else {
                echo 'view file not found';
            }
        } else {
            if (file_exists($path.$this->template.'.php')) {
                include_once $path.$this->template.'.php';
            } else {
                echo 'template file not found';
            }
        }
    }
}