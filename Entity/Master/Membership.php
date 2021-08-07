<?php

/*
 * This file is part of EC-CUBE
 *
 * Copyright(c) EC-CUBE CO.,LTD. All Rights Reserved.
 *
 * http://www.ec-cube.co.jp/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Plugin\LoginPlugin\Entity\Master;

use Doctrine\ORM\Mapping as ORM;
use Eccube\Entity\AbstractEntity;

/**
 * Membership
 *
 * @ORM\Table(name="plg_login_plugin_membership")
 * @ORM\Entity(repositoryClass="Plugin\LoginPlugin\Repository\Master\MembershipRepository")
 */
class Membership extends AbstractEntity
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", options={"unsigned":true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="text", nullable=true)
     */
    private $name;
    /**
     * @var int
     *
     * @ORM\Column(name="sort_no", type="integer", options={"unsigned":true})
     */
    private $sort_no;

    /**
     * @var string
     *
     * @ORM\Column(name="discriminator_type", type="text", nullable=true)
     */    
    private $discriminator_type;


     /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name.
     *
     * @param string $name
     *
     * @return CustomMembership
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set name.
     *
     * @param string $sort_no
     *
     * @return CustomMembership
     */
    public function setSortNo($sort_no)
    {
        $this->sort_no = $sort_no;

        return $this;
    }

    /**
     * Get name.
     *
     * @return string
     */
    public function getSortNo()
    {
        return $this->sort_no;
    }
    /**
     * Set discriminator_type.
     *
     * @param string $discriminator_type
     *
     * @return CustomMembership
     */
    public function setDiscriminatorType($discriminator_type)
    {
        $this->discriminator_type = $discriminator_type;

        return $this;
    }

    /**
     * Get discriminator_type.
     *
     * @return string
     */
    public function getDiscriminatorType()
    {
        return $this->discriminator_type;
    }
}
