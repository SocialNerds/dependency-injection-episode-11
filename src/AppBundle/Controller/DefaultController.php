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
        $socialResponse = new SocialResponse('Hello socially!');

        $sendResponse = new GetResponse($socialResponse);
        $container = new ContainerBuilder();
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
