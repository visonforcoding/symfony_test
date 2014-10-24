<?php

namespace Myweb\VotersBundle\Entity;
use Myweb\UserBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;


/**
 * Voters
 * @ORM\Entity
 * @ORM\Table(name="group_permission")
 */
class Voters
{
    /**
     * @var integer
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var integer
     * @ORM\Column(type="integer")
     *
     */
    private $groupId;

    /**
     * @var integer
     * @ORM\Column(type="integer")
     */
    private $permissionId;
       
    /**
     * @ORM\ManyToMany(targetEntity="Myweb\UserBundle\Entity\Group")
     * @ORM\JoinTable(name="fos_group",
     *      joinColumns={@ORM\JoinColumn(name="id", referencedColumnName="groupId")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="id", referencedColumnName="permissionId")}
     * )
     */
    protected $groups;
    
     /**
     * @ORM\ManyToMany(targetEntity="Myweb\VotersBundle\Entity\Permission")
     * @ORM\JoinTable(name="permission",
     *      joinColumns={@ORM\JoinColumn(name="id", referencedColumnName="permissionId")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="id", referencedColumnName="groupId")}
     * )
     */
    protected $permission;



    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set roleId
     *
     * @param integer $roleId
     * @return Voters
     */
    public function setGroupId($groupId)
    {
        $this->roleId = $groupId;
    
        return $this;
    }

    /**
     * Get roleId
     *
     * @return integer 
     */
    public function getGroupId()
    {
        return $this->groupId;
    }

    /**
     * Set permissionId
     *
     * @param integer $permissionId
     * @return Voters
     */
    public function setPermissionId($permissionId)
    {
        $this->permissionId = $permissionId;
    
        return $this;
    }

    /**
     * Get permissionId
     *
     * @return integer 
     */
    public function getPermissionId()
    {
        return $this->permissionId;
    }
}
