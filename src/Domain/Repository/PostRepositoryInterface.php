<?php
declare(strict_types=1);

namespace App\Domain\Repository;

use App\Domain\Entity\Post;

interface PostRepositoryInterface
{
    public function add(Post $post): void;

    public function findLastFivePost(): array;
}
