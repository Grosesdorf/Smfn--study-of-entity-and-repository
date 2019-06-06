<?php

namespace App\Repository;

use App\Entity\Developer;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Developer|null find($id, $lockMode = null, $lockVersion = null)
 * @method Developer|null findOneBy(array $criteria, array $orderBy = null)
 * @method Developer[]    findAll()
 * @method Developer[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DeveloperRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Developer::class);
    }

    // /**
    //  * @return Projects[] Returns an array of developer projects objects
    //  */
    public function getProjectsByIdDeveloper($id)
    {
        $conn = $this->getEntityManager()->getConnection();
        $sql = 'SELECT projects.name
                FROM projects_developers
                JOIN developers ON projects_developers.developer_id = developers.id
                JOIN projects ON projects_developers.project_id = projects.id
                WHERE developers.id = :id';
        $stmt = $conn->prepare($sql);
        $stmt->execute(['id' => $id]);
        $results = $stmt->fetchAll();

        return $results;
    }

    // /**
    //  * @return Developer[] Returns an array of Developer objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Developer
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
