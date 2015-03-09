<?php


class NewsController
{
    public $cont = 'News';

    public function actionAll()
    {
        $article = new NewsModel();

        $items = $article->findAll();

        $view = new View;

        $view->items = $items;
        $view->ctrl = $this->cont;

        $view->act = 'One';
        $view->inf = $this->inform;
        $view->edit = $this->edit;
        $view->errors = $this->errors;

        $view->display('all.php');
    }

    public function actionOne()
    {
        if (!empty($_GET['id'])){
             $id = $_GET['id'];
        }
        else{
            throw new HTTP404Exception('Ошибка 404 ! Отсутсвует id заданой новости');
        }

        $article = new NewsModel();

        $view = new View;

        $view->item = $article->findOneByPk($id);
        $view->ctrl = $this->cont;
        $view->del = $this->del;

        $view->display('one.php');
    }

    public function actionErrors()
    {
        echo ModelException::getExceptions();
    }
}
