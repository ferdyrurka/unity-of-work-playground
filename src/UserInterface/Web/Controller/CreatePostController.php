<?php
declare(strict_types=1);

namespace App\UserInterface\Web\Controller;

use App\Application\ApplicationService\CreatePostApplicationService;
use App\UserInterface\DTO\CreatePostDTO;
use App\UserInterface\Form\CreatePostForm;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CreatePostController extends AbstractController
{
    /**
     * @param Request $request
     * @Route("/post/create", methods={"GET"}, name="post.create")
     * @Template("post/create_post.html.twig")
     * @return array
     */
    public function createPostForm(Request $request): array
    {
        $form = $this->createForm(CreatePostForm::class, new CreatePostDTO());
        $form->handleRequest($request);

        return [
            'form' => $form->createView(),
        ];
    }

    /**
     * @param Request $request
     * @param CreatePostApplicationService $createPostApplicationService
     * @Route("/post/create", methods={"POST"})
     * @return Response
     */
    public function createPost(
        Request $request,
        CreatePostApplicationService $createPostApplicationService
    ): Response {
        $form = $this->createForm(CreatePostForm::class, new CreatePostDTO());
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $createPostApplicationService->create($form->getData());
            return $this->redirect('/');
        }

        return $this->forward(self::class . '::createPostForm', [
           'request' => $request,
        ]);
    }
}
