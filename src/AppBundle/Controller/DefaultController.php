<?php

namespace AppBundle\Controller;

use AppBundle\GetResponse;
use AppBundle\SocialResponse;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $container = new ContainerBuilder();

        $container
            ->register('social_response', 'AppBundle\SocialResponse')
            ->addArgument('Hello socially!');

        $container
            ->register('get_response', 'AppBundle\GetResponse')
            ->addArgument(new Reference('social_response'));

        $response = $container->get('get_response')->get();

        return $this->render(
            'default/index.html.twig',
            [
                'response' => $response,
            ]
        );
    }
}
