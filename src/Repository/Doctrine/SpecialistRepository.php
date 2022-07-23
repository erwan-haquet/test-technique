<?php

namespace App\Repository\Doctrine;

use App\Entity\Specialist;
use App\Repository\SpecialistRepositoryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Specialist>
 *
 * @method Specialist|null find($id, $lockMode = null, $lockVersion = null)
 * @method Specialist|null findOneBy(array $criteria, array $orderBy = null)
 * @method Specialist[]    findAll()
 * @method Specialist[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SpecialistRepository extends ServiceEntityRepository implements SpecialistRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Specialist::class);
    }

    public function add(Specialist $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Specialist $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function findById(int $id, bool $activeOnly = true): ?Specialist
    {
        $qb = $this
            ->createQueryBuilder('specialist')
            ->where('specialist.id = :id')
            ->setParameter('id', $id);

        if (true === $activeOnly) {
            $qb->andWhere('specialist.active = true');
        }

        return $qb
            ->getQuery()
            ->getOneOrNullResult();
    }

    public function search(bool $onlineFirst = true, bool $activeOnly = true): array
    {
        $qb = $this->createQueryBuilder('specialist');

        if (true === $activeOnly) {
            $qb->andWhere('specialist.active = true');
        }

        if (true === $onlineFirst) {
            $qb->orderBy('specialist.online', 'DESC');
        }

        return $qb->getQuery()->getResult();
    }
}
