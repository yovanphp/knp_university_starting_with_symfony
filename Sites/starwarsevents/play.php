<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Debug\Debug;

/** @var \Composer\Autoload\ClassLoader $loader */
$loader = require __DIR__.'/app/autoload.php';
Debug::enable();

$kernel = new AppKernel('dev', true);
$kernel->loadClassCache();
$request = Request::createFromGlobals();
$kernel->boot();

$container = $kernel->getContainer();
$container->enterScope('request');
$container->set('request', $request);

/*$templating = $container->get('templating');
echo $templating->render(
		'EventBundle:Default:index.html.twig', 
		['name' => 'Yovan Juggoo', 'count' => 18]
	);*/


use Yoda\EventBundle\Entity\Event;

$event = new Event;
$event->setName('Darth\'s surprise birthday party!');
$event->setLocation('Deathstar');
$event->setTime(new \DateTime('tomorrow noon'));
$event->setDetails('Ha! Darth HATES surprises!!!!');

$em = $container->get('doctrine')->getManager();
$em->persist($event);
$em->flush();

