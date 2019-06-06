<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
// use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\Developer;

class DeveloperController extends Controller
{
    public function getProjects($id)
    {
    	$projects = $this->getDoctrine()
	        ->getRepository(Developer::class)
	        ->getProjectsByIdDeveloper($id);

	    if (!$projects) 
	    {
        	throw $this->createNotFoundException('No projects');
        }

    	return new Response(json_encode($projects));
    }

    public function getNameDeveloper($id)
    {
    	$developer = $this->getDoctrine()
	        ->getRepository(Developer::class)
	        ->find($id);

	    if (!$developer) 
	    {
        	throw $this->createNotFoundException('No developer found for id '.$id);
        }

    	return new Response(
    		'Call this great developer: ' . $developer->getFirstName() . ' ' . $developer->getLastName()
    	);
    }
}