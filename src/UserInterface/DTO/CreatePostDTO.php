<?php
declare(strict_types=1);

namespace App\UserInterface\DTO;

use Symfony\Component\Validator\Constraints as Assert;

class CreatePostDTO
{
    /**
     * @var string
     *
     * @Assert\NotBlank()
     * @Assert\Length(
     *     max="255",
     *     min="1"
     * )
     */
    public $title;

    /**
     * @var string
     *
     * @Assert\NotBlank()
     * @Assert\Length(
     *     min="1"
     * )
     */
    public $content;
}
