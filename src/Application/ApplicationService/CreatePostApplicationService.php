<?php
declare(strict_types=1);

namespace App\Application\ApplicationService;

use App\Domain\Factory\PostFactory;
use App\Domain\Repository\PostRepositoryInterface;
use App\Infrastructure\UnityOfWork\UnityOfWorkInterface;
use App\UserInterface\DTO\CreatePostDTO;

class CreatePostApplicationService
{
    /**
     * @var PostRepositoryInterface
     */
    private $postRepository;

    /**
     * @var UnityOfWorkInterface
     */
    private $unityOfWork;

    /**
     * @var PostFactory
     */
    private $postFactory;

    public function __construct(
        PostRepositoryInterface $postRepository,
        UnityOfWorkInterface $unityOfWork,
        PostFactory $postFactory
    ) {
        $this->postRepository = $postRepository;
        $this->unityOfWork = $unityOfWork;
        $this->postFactory = $postFactory;
    }

    public function create(CreatePostDTO $createPostDTO): void
    {
        $post = $this->postFactory->createPostByDto($createPostDTO);
        $this->postRepository->add($post);

        $this->unityOfWork->commit();
    }
}
