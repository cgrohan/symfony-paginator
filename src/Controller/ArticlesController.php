<?php

namespace App\Controller;

use App\Repository\ArticlesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ArticlesController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(Request $request, ArticlesRepository $repoArticle)
    {       
        $offset = max(0, $request->query->getInt('offset', 0));
        $paginator = $repoArticle->getArticlePaginator($offset);

        return $this->render('home/index.html.twig',[
            'articles' => $paginator,
            'previous' => $offset - $repoArticle::PAGINATOR_PER_PAGE,
            'next' => min(count($paginator), $offset + $repoArticle::PAGINATOR_PER_PAGE),
        ]);
    }
}