<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Project;

class ProjectFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for ($i=0; $i <= 50; $i++) { 
    		$project = new Project();
	        $project->setName('Project-' . $i);
	        $manager->persist($project);
    	}

        $manager->flush();
    }
}
