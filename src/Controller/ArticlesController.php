<?php

namespace App\Controller;

use App\Repository\ArticlesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ArticlesController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(ArticlesRepository $repoArticle)
    {       
        return $this->render('home/index.html.twig',[
            'articles' => $repoArticle->findAll()
        ]);
    }
}