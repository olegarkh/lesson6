<?php

class AdminController
              extends NewsController
{
    public $cont = 'Admin';
    public $inform = 'Добавить новость';
    public $edit = 'Редактировать';
    public $del = 'Удалить новость';
    public $errors = ' Просмотр исключений';


    public function actionEdit()
    {
        $view = new View;

        if (!empty($_GET['id'])) {
            $id = $_GET['id'];

            $news = new NewsModel;

            $view->item = $news->findOneByPk($id);

        }
        $view->ctrl = $this->cont;
        $view->act = 'Save';

        $view->display('/../admin/editor.php');
    }
    public function actionSave()
    {
        $news = new NewsModel;

        if (!empty($_GET['id'])) {
             $news->id = $_GET['id'];
        }

        $news->title = $_POST['title'];
        $news->text = $_POST['text'];

        $news->save();

        header('Location: index.php?ctrl=Admin&act=Edit&id='.$news->id);
    }

    public function actionDel()
    {
        $news = new NewsModel;
        $news->id = $_GET['id'];
        $news->delete();

        header('Location: index.php?ctrl=Admin&act=All' );
    }
}
//abcdefghijklmnopqrstuvwxyz