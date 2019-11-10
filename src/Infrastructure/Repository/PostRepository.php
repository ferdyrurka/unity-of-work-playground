<?php
declare(strict_types=1);

namespace App\Infrastructure\Repository;

use App\Domain\Entity\Post;
use App\Domain\Repository\PostRepositoryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

class PostRepository extends ServiceEntityRepository implements PostRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Post::class);
    }

    public function add(Post $post): void
    {
        $this->getEntityManager()->persist($post);
    }

    public function findLastFivePost(): array
    {
        return $this->getEntityManager()
            ->createQueryBuilder()
            ->orderBy('id', 'desc')
            ->setMaxResults(5)
            ->getQuery()
            ->getResult()
        ;
    }
}
