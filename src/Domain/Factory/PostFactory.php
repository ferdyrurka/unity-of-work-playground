<?php
declare(strict_types=1);

namespace App\Domain\Factory;

use App\Domain\Entity\Post;

class PostFactory
{
    public function createPost(string $title, string $content): Post
    {
        return new Post(
            htmlspecialchars($title),
            htmlspecialchars($content)
        );
    }
}
