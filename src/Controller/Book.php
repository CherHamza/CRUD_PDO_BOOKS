<?php
namespace hamza\pdo\Controller;
use hamza\pdo\Kernel\AbstractController;
use hamza\pdo\Entity\Books;
use hamza\pdo\Kernel\Views;


class Book extends AbstractController {
    public function index()
    {
        $view = new Views();
        
        $perPage = 10; // Nombre d'éléments par page
        
        $totalBooks = count(Books::getAll()); // Nombre total de livres
        
        $currentPage = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1; // Numéro de page actuel
        
        $totalPages = ceil($totalBooks / $perPage); // Nombre total de pages
        
        $offset = ($currentPage - 1) * $perPage; // Calcul de l'offset
        
        $books = Books::getAll($perPage, $offset); // Obtenir les livres avec pagination
    
        $view->setHead('head.html');
        $view->setHeader('header.html');
        $view->setMain('book.php');
        $view->setFooter('footer.html');
    
        $view->render([
            'flash' => $this->getFlashMessage(),
            'titlePage' => 'Page BookController',
            'books' => $books,
            'currentPage' => $currentPage,
            'totalPages' => $totalPages,
            'perPage' => $perPage,
        ]);
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
    

    
