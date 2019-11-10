<?php
declare(strict_types=1);

namespace App\UserInterface\Web\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\Routing\Annotation\Route;

class HomeController
{
    /**
     * @Route("/")
     * @Template("home/home.html.twig")
     */
    public function home(): void
    {
        //Do nothing
    }
}
