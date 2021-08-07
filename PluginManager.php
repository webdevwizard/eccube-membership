<?php
/*
* Plugin Name : LoginPlugin
*/

namespace Plugin\LoginPlugin;

use Doctrine\ORM\EntityManagerInterface;
use Eccube\Application;
use Eccube\Plugin\AbstractPluginManager;
use Symfony\Component\DependencyInjection\ContainerInterface;

use Plugin\LoginPlugin\Repository\Master\MembershipRepository;
use Plugin\LoginPlugin\Entity\Master\Membership;

/**
 * Class PluginManager.
 */
class PluginManager extends AbstractPluginManager
{
    /**
     * PluginManager constructor.
     */
    public function __construct()
    {
    }

    /**
     * @param null|array $meta
     * @param ContainerInterface $container
     *
     * @throws \Exception
     */
    public function enable(array $meta = null, ContainerInterface $container)
    {
        // プラグイン設定を追加
        $this->createMembership($container);
        
    }

    private function createMembership(ContainerInterface $container) {
        $entityManager = $container->get('doctrine')->getManager();
        $membershipRepository = $container->get(MembershipRepository::class);
        $membership = $membershipRepository->findOneBy([], ['sort_no' => 'DESC']);
        $sortNo = $membership ? $membership->getSortNo() + 1 : 0;
        
        $membership = $membershipRepository->findOneBy(['discriminator_type' => Membership::class]);
        if($membership) {
            return;
        }

        $membership1 = new Membership();
        $membership1->setName('有料');
        $membership1->setSortNo($sortNo);
        $membership1->setDiscriminatorType(Membership::class);

        $entityManager->persist($membership1);        
        $entityManager->flush($membership1);

        $membership2 = new Membership();
        $membership2->setName('無料');
        $membership2->setSortNo($sortNo + 1);
        $membership2->setDiscriminatorType(Membership::class);

        $entityManager->persist($membership2);
        $entityManager->flush($membership2);
    }
}