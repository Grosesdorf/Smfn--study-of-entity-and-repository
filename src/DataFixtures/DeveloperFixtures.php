<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use \App\Entity\Developer;

class DeveloperFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
    	for ($i=0; $i <= 10; $i++) { 
    		$developer = new Developer();
	        $developer->setFirstName('FN' . $i);
	        $developer->setLastName('LN' . $i);
	        $manager->persist($developer);
    	}
        
        $manager->flush();
    }
}
