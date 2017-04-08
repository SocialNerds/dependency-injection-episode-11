<?php

namespace AppBundle\Controller;

use AppBundle\GetResponse;
use AppBundle\SocialResponse;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $container = new ContainerBuilder();

        $socialResponse = new SocialResponse('Hello socially!');
        $container->set('social_response', $socialResponse);

        $sendResponse = new GetResponse($container->get('social_response'));
        $container->set('get_response', $sendResponse);

        $response = $container->get('get_response')->get();

        return $this->render(
            'default/index.html.twig',
            [
                'response' => $response,
            ]
        );
    }
}
