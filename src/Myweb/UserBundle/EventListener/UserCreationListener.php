<?php

/* 
 * listen user create 
 * 
 */
namespace Myweb\UserBundle\EventListener;
use FOS\UserBundle\FOSUserEvents;
use FOS\UserBundle\Event\FormEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Doctrine\ORM\EntityManager;

class UserCreationListener implements EventSubscriberInterface
{
    protected $em;
    protected $user;
    protected $defaultGroup;

    public function __construct(EntityManager $em, $defaultGroup)
    {
        $this->em = $em;
        $this->defaultGroup = $defaultGroup;
    }

    /**
     * {@inheritDoc}
     */
    public static function getSubscribedEvents()
    {
        return array(
            FOSUserEvents::REGISTRATION_SUCCESS => 'onRegistrationSuccess',
        );
    }

    public function onRegistrationSuccess(FormEvent $event)
    {
        $this->user = $event->getForm()->getData();
        $group_name = $this->defaultGroup;
        $entity = $this->em->getRepository('MywebUserBundle:Group')->findOneByName($group_name); // You could do that by Id, too
        $this->user->addGroup($entity);
        $this->em->flush();

    }
}

