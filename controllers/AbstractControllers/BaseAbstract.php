<?php
abstract class BaseAbstract {
    abstract protected function redirectBack($sub_path = null);

    abstract public function Logout();

    protected function render($file, $data = [])
    {
        $view_file = 'views/' . $file . '.php';
        if (is_file($view_file)) {
            extract($data);
            ob_start();
            require_once($view_file);
            ob_end_flush();
        } else {
            header('Location: index.php?controller=Pages&action=error');
            exit();
        }
    }

    protected function isRememberMe(): array
    {
        $cookieData = array();

        parse_str($_COOKIE['rememberLogin'], $cookieData);

        return [
            'username' => $cookieData['usr'],
            'password' => $cookieData['pass']
        ];
    }
}
