<?php
session_start();
require_once('models/User.php');
require_once('models/Post.php');
require_once('controllers/AbstractControllers/BaseAbstract.php');
require_once('controllers/InterfaceController/FormInterface.php');
require_once('trait/UserTrait.php');

class LoginController extends BaseAbstract implements FormInterface
{
    use UserTrait;
    var $user;
    var $post;

    public function __construct()
    {
        $this->user = new User();
        $this->post = new Post();
    }

    public function viewForm()
    {
        $sessionLogin = $this->getUsernameLogin();
        $rememberMe = $this->isRememberMe();

        if (!empty($sessionLogin) || (!empty($rememberMe['username']) && !empty($rememberMe['password']))) {
            header("Location: index.php?controller=Login&action=mainActionForm");
        } else {
            $this->render('login');
        }
    }

    public function mainActionForm()
    {
        if ($this->getUsernameLogin() !== null || (!empty($this->isRememberMe()['username']) && !empty($this->isRememberMe()['password']))) {
            $data = $this->post->get();
            $this->render('index', [
                'data' => $data,
                'usernameCookie' => $this->isRememberMe()['username'],
                'passwordCookie' => $this->isRememberMe()['password']
            ]);
        }

        if (!empty($_POST['username']) && !empty($_POST['password'])) {
            $username = htmlspecialchars($_POST['username'], ENT_QUOTES, 'UTF-8');
            $password = htmlspecialchars($_POST['password'], ENT_QUOTES, 'UTF-8');
            $isRemember = $_POST['isRemember'];

            $auth = $this->user->checkLogin([
                'username' => $username,
                'password' => $password
            ]);

            if (!$auth) {
                setcookie('error', 'Sai tài khoản hoặc mật khẩu', time() + 1);
                $this->redirectBack();
            } else {
                $this->setUsernameLogin($username);
                if (!empty($isRemember)) {
                    setcookie('rememberLogin', 'usr=' . $username . '&pass=' . $password, time() + (30 * 24 * 60 * 60));
                } else {
                    setcookie('rememberLogin', '', time() - 3600);
                }
                $data = $this->post->get();
                $this->render('index', ['data' => $data]);
            }
        } elseif (!isset($_POST['username']) || !isset($_POST['password'])){
            $this->redirectBack();
        }else{
            setcookie('error', 'Vui lòng không để trống', time() + 1);
//            sleep(60);
            $this->redirectBack();
        }
    }

    public function Logout()
    {
        session_destroy();
        setcookie('rememberLogin', '', time() - 3600);
        $this->redirectBack();
        exit();
    }

    protected function redirectBack($sub_path = null)
    {
        header("Location: index.php?controller=Login&action=viewForm");
    }
}

