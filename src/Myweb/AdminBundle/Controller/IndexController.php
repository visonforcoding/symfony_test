<?php

namespace Myweb\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Myweb\BlogBundle\Entity\Comment;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\Security\Acl\Domain\ObjectIdentity;
use Symfony\Component\Security\Acl\Domain\UserSecurityIdentity;
use Symfony\Component\Security\Acl\Permission\MaskBuilder;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;


class IndexController extends Controller {

    public function indexAction( ) {
      //  $token = $this->getToken();

        return $this->render('MywebAdminBundle:Index:index.html.twig');
    }

    public function addCommentAction() {
        $comment = new Comment();

        //add  submit data
        $comment->setContent('test');
        $em = $this->getDoctrine()->getManager();
        $em->persist($comment);
        $em->flush();

        // creating the ACL
        $aclProvider = $this->get('security.acl.provider');
        $objectIdentity = ObjectIdentity::fromDomainObject($comment);
        $acl = $aclProvider->createAcl($objectIdentity);

        // retrieving the security identity of the currently logged-in user
        $securityContext = $this->get('security.context');
        $user = $securityContext->getToken()->getUser();
        $securityIdentity = UserSecurityIdentity::fromAccount($user);

        // grant owner access
        $acl->insertObjectAce($securityIdentity, MaskBuilder::MASK_OWNER);
        $aclProvider->updateAcl($acl);
        var_dump($acl);
        exit();
    }

    public function editCommentAction(Comment $comment) {
        $securityContext = $this->get('security.context');

        // check for edit access
        if (false === $securityContext->isGranted('EDIT', $comment)) {
            throw new AccessDeniedException();
        }
        // ... retrieve actual comment object, and do your editing here
    }

}
