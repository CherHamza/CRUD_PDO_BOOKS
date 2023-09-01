<?php
namespace hamza\pdo\Controller;
use hamza\pdo\Kernel\AbstractController;
use hamza\pdo\Entity\Books;
use hamza\pdo\Kernel\Views;


class Book extends AbstractController {
    public function index(){
    {
        
        $view = new Views();
        $books= Books::getAll();
        $id = Books::getbyId(1);
        $view->setHead('head.html');
        $view->setHeader('header.html');
        $view->setMain('book.php');
        $view->setFooter('footer.html');


        $view->render([
            'flash' => $this->getFlashMessage(),
            'titlePage' => 'Page HomeController',
            'books'=>$books,
            // 'id'=>$id
        ]);
    }
    


}
    public function delete()
    {
       $result = false;
       $this->setFlashMessage('undefined Value', 'ERROR');
       if(isset($_GET['id'])){
        $result =  Books::delete($_GET["id"]);

       }
       if($result){
        $this->setFlashMessage("The book has been deleted", "SUCCESS");
       }
       $this->index();
       
        
    }

    public function edit()
{  
    $view = new Views();
    $id = Books::getbyId($_GET['id']);
    $view->setHead('head.html');
    $view->setHeader('header.html');
    $view->setMain('formUpdate.php');
    $view->setFooter('footer.html');

    if (isset($_POST['submit'])) {
        if (
            isset($_POST['title']) && $_POST['title'] !== "" &&
            isset($_POST['author']) && $_POST['author'] !== "" &&
            isset($_POST['type']) && $_POST['type'] !== "" &&
            isset($_POST['description']) && $_POST['description'] !== ""
        ) {
            $result = Books::update(
                $_GET['id'],
             [
                    'title' => $_POST['title'],
                    'author' => $_POST['author'],
                    'type' => $_POST['type'],
                    'description' => $_POST['description'],
                ]
            );

            if ($result) {
                $this->setFlashMessage("Votre livre a été bien modifié", "success");
            } else {
                $this->setFlashMessage('Aucun enregistrement ne correspond', 'error');
            }
        }
    }

    $view->render([
        'flash' => $this->getFlashMessage(),
        'titlePage' => 'Page HomeController',
        'book' => $id,
    ]);
}


    public function create()
{
    $view = new Views();
    $view->setHead('head.html');
    $view->setHeader('header.html');
    $view->setMain('formCreate.php');
    $view->setFooter('footer.html');

    if (isset($_POST['create'])) {
        $title = $_POST['title'] ?? '';
        $author = $_POST['author'] ?? '';
        $type = $_POST['type'] ?? '';
        $description = $_POST['description'] ?? '';

        if (!empty($title) && !empty($author) && !empty($type) && !empty($description)) {
            // Appel de la fonction insert pour insérer les données
            $result = Books::create([
                'title' => $title,
                'author' => $author,
                'type' => $type,
                'description' => $description
            ]);

            if ($result) {
                $this->setFlashMessage("Le livre a été ajouté avec succès.", "success");
            } else {
                $this->setFlashMessage("Une erreur s'est produite lors de l'ajout du livre.", "error");
            }
        } else {
            $this->setFlashMessage("Veuillez remplir tous les champs.", "error");
        }
    }


    $view->render([
        'flash' => $this->getFlashMessage(),
        'titlePage' => 'Page HomeController',
    ]);
}
}
    

    
