<?php
session_start();
require_once('models/User.php');
require_once('controllers/AbstractControllers/BaseAbstract.php');
require_once('controllers/InterfaceController/FormInterface.php');
class RegisterController extends BaseAbstract implements FormInterface
{

    var $user;
    public function __construct()
    {
        $this->user = new User();
    }

    public function viewForm(){
        $this->render('register');
    }

    public function mainActionForm(){
        if ($_POST['password_confirm'] !== $_POST['password'] && !empty($_POST['password']) && !empty($_POST['password_confirm'])){
            setcookie('error', 'Mật khẩu không trùng nhau', time() + 1);
            $this->redirectBack();
        }elseif (!empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['password_confirm'])){
            $username = htmlspecialchars($_POST['username'], ENT_QUOTES, 'UTF-8');
            $password = htmlspecialchars($_POST['password'], ENT_QUOTES, 'UTF-8');

            $status = $this->user->find([
                'username' => $username
            ]);

            if($status){
                setcookie('error', 'Tài khoản đã tồn tại', time() + 1);
                $this->redirectBack();
            }else{
                $this->user->insert([
                    'username' => $username,
                    'password' => $password
                ]);
                header("Location: index.php?controller=Login&action=viewForm");
            }
        } else {
            setcookie('error', 'Vui lòng không để trống', time() + 1);
            $this->redirectBack();
        }
    }

    protected function redirectBack($sub_path = null)
    {
        header("Location: index.php?controller=Register&action=viewForm");
    }
}