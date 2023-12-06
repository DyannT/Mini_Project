<?php
session_start();
require_once('models/Post.php');
require_once('controllers/AbstractControllers/BaseAbstract.php');

class PostController extends BaseAbstract
{
    var $post;

    public function __construct()
    {
        $this->post = new Post();
    }

    public function addForm(){
        $this->render('add',[
            'usernameCookie' => $this->isRememberMe()['username'],
            'passwordCookie' => $this->isRememberMe()['password']
        ]);
    }

    public function addAction(){
        if (!empty($_POST['title']) && !empty($_POST['content'])) {
            $title = htmlspecialchars($_POST['title'], ENT_QUOTES, 'UTF-8');
            $content = htmlspecialchars($_POST['content'], ENT_QUOTES, 'UTF-8');

            $status = $this->post->insert([
                'title' => $title,
                'content' => $content
            ]);

            $this->notificationPost('Thêm mới thành công.','Thêm mới thất bại.',$status, 'addForm');
        }else{
            setcookie('error_add_post', 'Vui lòng không để trống', time() + 1);
            $this->redirectBack('?controller=Post&action=addForm');
        }
    }

    public function deleteAction(){
        $id = $_GET['id'];

        $status = $this->post->delete([
            'id' => $id
        ]);

        $this->notificationPost('Xóa thành công.','Xóa thất bại.',$status);
    }

    public function editForm(){
        $id = $_GET['id'];

        $data = $this->post->find([
            'id' => $id
        ]);

        $this->render('edit',[
            'data'=>$data,
            'usernameCookie' => $this->isRememberMe()['username'],
            'passwordCookie' => $this->isRememberMe()['password']
        ]);
    }

    public function editAction(){
        if (!empty($_POST['title']) && !empty($_POST['content'])) {
            $title = htmlspecialchars($_POST['title'], ENT_QUOTES, 'UTF-8');
            $content = htmlspecialchars($_POST['content'], ENT_QUOTES, 'UTF-8');
            $id = $_POST['id'];

            $status = $this->post->update([
                'title' => $title,
                'content' => $content,
                'id' => $id
            ]);

            $this->notificationPost('Sửa thành công.','Sửa thất bại.',$status,'editForm&id='.$id);
        }else{
            setcookie('error_edit_post', 'Vui lòng không để trống', time() + 1);
            $this->redirectBack('?controller=Post&action=editForm&id='.$_POST['id']);
        }
    }

    protected function redirectBack($sub_path = null)
    {
        header("Location: index.php" . $sub_path);
    }

    private function notificationPost($titleSuccess,$titleError,$status,$backError = null){
        if ($status) {
            setcookie('notification_success_post',$titleSuccess,time()+1);
            header('location: index.php?controller=Login&action=mainActionForm');
        } else {
            setcookie('notification_error_post',$titleError,time()+1);
            header('location: index.php?controller=Post&action=' . $backError ?? 'mainActionForm');
        }
    }
}

