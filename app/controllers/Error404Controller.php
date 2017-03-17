<?php
class Error404Controller extends Controller
{
    public function indexAction()
    {
        $this->view->template = null;
        $this->view->render('error/error404');
    }
}