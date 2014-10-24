<?php

/* 
 * fosuserbundle group entity
 */

namespace Myweb\UserBundle\Entity;

use FOS\UserBundle\Model\Group as BaseGroup;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;


/**
 * @ORM\Entity
 * @ORM\Table(name="fos_group")
 */
class Group extends BaseGroup
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
     protected $id;
     
     
    /**
     * @ORM\ManyToMany(targetEntity="Myweb\VotersBundle\Entity\Permission")
     * @ORM\JoinTable(name="ym_group_permission",
     *      joinColumns={@ORM\JoinColumn(name="groupId", referencedColumnName="id",onDelete="CASCADE")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="permissionId", referencedColumnName="id")}
     * )
     */
     protected $permissions;
     
     public function __construct($name, $roles = array()) {
         parent::__construct($name, $roles);
         $this->permissions = new ArrayCollection();
     }
     
     public function getPermissions(){
         return $this->permissions;
     }
     
     public function addPermission($permission){
        if (!$this->getPermissions()->contains($permission)) {
            $this->getPermissions()->add($permission);
        }
        return $this;
     }
     
    public function removePermission($permission)
    {
        if ($this->getPermissions()->contains($permission)) {
            $this->getPermissions()->removeElement($permission);
        }

        return $this;
    }
     
}

