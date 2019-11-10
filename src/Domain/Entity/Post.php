<?php
declare(strict_types=1);

namespace App\Domain\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Gedmo\Mapping\Annotation as Gedmo;
use DateTime;

/**
 * @ORM\Entity
 * @ORM\Table(name="post")
 * @UniqueEntity("slug")
 */
class Post
{
    /**
     * @var int
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer", length=11)
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @var string
     * @ORM\Column(type="text")
     */
    private $content;

    /**
     * @var DateTime
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @var string
     * @ORM\Column(type="string", length=255, unique=true)
     * @Gedmo\Slug(fields={"title"}, updatable=false, separator="-",unique=true)
     */
    private $slug;

    public function __construct(string $title, string $content)
    {
        $this->title = $title;
        $this->content = $content;
        $this->createdAt = new DateTime();
    }
}
