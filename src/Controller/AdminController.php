<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Author;
use App\Form\AuthorFormType;





class AdminController extends AbstractController
{
    /**
     * @Route("/admin", name="admin")
     */

    /** @var EntityManagerInterface */
    private $entityManager;

    /** @var \Doctarine\common\Persistence\ObjectRepository */
    private $authorRepository;

    /** @var \Doctrine\common\Peersistence\ObjectRepoistory */
    private $blogPostRepository;

    /**
     *@param EntityManagerInterface $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager){
        $this->entityManager = $entityManager;
        $this->blogPostRepository = $entityManager->getRepository('App:BlogPost');
        $this->authorRepository = $entityManager->getRepository('App:Author');
    }

    /**
     *@Route("/admin/author/create", name="author_create")
     */
    public function createAuthorAction(Request $request)
    {
        if($this->authorRepository->findoneByUssername($this->getUser()->getUserName())){
            //redirect to dashboard
            $this->addFlash('error', 'Unable to create author, author already exists\1');

            return $this->redirectToRoute('homepage');
        }

        $author = new Author();
        $author->setUsername($this->gerUser()->getUserName());

        $form = $this->createForm(AuthorFormType::class, $author);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $this->entityManager->persist($author);
            $this->entityManager->flush($author);

            $request->getSession()->set('user_is_author', true);
            $this->addFlash('sucsess', 'you are now an author.');

            return $this->redirectToRoute('homepage');
        }

        return $this->render('admin/create_author.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
