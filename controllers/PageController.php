<?php
session_start();
require_once('controllers/AbstractControllers/BaseAbstract.php');

class PageController extends BaseAbstract
{
    public function error()
    {
        $this->render('error');
    }

    protected function redirectBack($sub_path = null)
    {
        // TODO: Implement redirectBack() method.
    }
}

