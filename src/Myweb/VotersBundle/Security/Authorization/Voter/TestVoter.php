<?php

namespace Myweb\VotersBundle\Security\Authorization\Voter;

use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Security\Core\Authorization\Voter\VoterInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Doctrine\ORM\EntityManager;

class TestVoter implements VoterInterface {

    /**
     * give user
     * @var type 
     */
    private $user;
    private $em;
    public function __construct(EntityManager $entityManager) {
        $this->em = $entityManager;
    }

    public function supportsAttribute($attribute) {
        //$em = $this->em;
        $user = $this->user;
        $permission = array();
       foreach ($user->getGroups() as $group) {
       //this is where you get your group object
            $permissions = $group->getPermissions();   //get permissions Collection;
            foreach ($permissions as $value){
                   $permission[] = $value->getPermission();
            }
        }
        return in_array($attribute, $permission);
    }

    public function supportsClass($class) {
        return true;
    }

    public function vote(TokenInterface $token, $object, array $attributes) {
        if (!empty($object)) {
            if ($object instanceof \Myweb\UserBundle\Entity\User) {
                $this->user = $object;
            } else {
                if(!$token instanceof \Symfony\Component\Security\Core\Authentication\Token\AnonymousToken ){
                $this->user = $token->getUser();
                }else{
                return VoterInterface::ACCESS_DENIED;
                }
            }
        } else {
             if(!$token instanceof \Symfony\Component\Security\Core\Authentication\Token\AnonymousToken ){
                $this->user = $token->getUser();
                }else{
                return VoterInterface::ACCESS_DENIED;
                }
        }
        $denied = false;
        foreach ($attributes as $attribute) {
            if (!$this->supportsAttribute($attribute)) {
                $denied = true;
            }
        }
        if ($denied) {
            return VoterInterface::ACCESS_DENIED;
        } else {
            return VoterInterface::ACCESS_GRANTED;
        }
    }

}
