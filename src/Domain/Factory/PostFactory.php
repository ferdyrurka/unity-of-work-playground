<?php
declare(strict_types=1);

namespace App\Domain\Factory;

use App\Domain\Entity\Post;
use App\UserInterface\DTO\CreatePostDTO;

class PostFactory
{
    public function createPostByDto(CreatePostDTO $createPostDTO): Post
    {
        return new Post(
            htmlspecialchars($createPostDTO->title),
            htmlspecialchars($createPostDTO->content)
        );
    }
}
