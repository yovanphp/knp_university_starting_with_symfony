<?php

namespace Yoda\EventBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

class DefaultController extends Controller
{
    public function indexAction($name='', $count=17)
    {
    	/*$data = [
    		'user_name' => $name,
    		'count' => $count,
    		'message' => 'To be or not to be, that is the question....'
    	];*/
        //return $this->render('EventBundle:Default:index.html.twig', ['name' => $name]);
        
        //return new Response('This is a test');
        
        //Format our array in a json object and sends it as a response. But in Dev Tools we can see that this response is of Content-Type:text/html; This is resolved in two ways as shown below.
        /*$json = json_encode($data);
		return new Response($json);*/   

		/*$json = json_encode($data);
		$response = new Response($json);
		$response->headers->set('Content-type', 'application/json');
		return $response;*/
		
		/*$json = json_encode($data);
		return new JsonResponse($data);*/

		/*$templating = $this->container->get('templating'); 
		$content = $templating->render('EventBundle:Default:index.html.twig', ['name' => $name]);
		return new Response($content);*/

		/*$templating = $this->container->get('templating');
		return $templating->renderResponse('EventBundle:Default:index.html.twig', ['name' => $name, 'count' => $count]);*/

		//$em = $this->container->get('doctrine')->getManager();
		/*$em = $this->getDoctrine()->getManager();
		//To query for an entity, we must first get the entities repository object from the entityManager getRepository(name of entity)
		//The sole job of a repository: Query for one type of object. 
		//The name of the entity is a shortcut=> EventBundle:Event translates to Yoda\EventBundle\Entity\Event
		$repository = $em->getRepository('EventBundle:Event');*/

		$repository = $this->getDoctrine()->getRepository('EventBundle:Event');
		$event = $repository->findOneBy([
				'name' => 'Darth\'s surprise birthday party!'
			]);
		return $this->render('EventBundle:Default:index.html.twig', ['name' => $name, 'count' => $count, 'event' => $event]);
    }
}
