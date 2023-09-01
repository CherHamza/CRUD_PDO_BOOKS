<?php

namespace hamza\pdo\Controller;

use hamza\pdo\Kernel\Views;
use hamza\pdo\Kernel\AbstractController;
use hamza\pdo\Utils\MyFunction;
use hamza\pdo\Entity\Books;


class Home extends AbstractController{

    public function index()
    {
        
        $view = new Views();
        $books= Books::getAll();
        $id = Books::getbyId(1);
        $view->setHead('head.html');
        $view->setHeader('header.html');
        $view->setMain('index.php');
        $view->setFooter('footer.html');


        $view->render([
            'flash' => $this->getFlashMessage(),
            'titlePage' => 'Page HomeController',
            'books'=>$books,
           // 'id'=>$id
        ]);
    }

}