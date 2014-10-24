<?php

/* 
 *   manage voters 
 *   add eddit or delete voters
 */
namespace Myweb\VotersBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Myweb\VotersBundle\Entity\Permission;
use Symfony\Component\HttpFoundation\Response;
class ManageVotersController extends Controller
{
    public function addPermission($permission,$description)
    {
        $permi_entity = new Permission();
        $permi_entity->setPermission($permission);
        $permi_entity->setDescription($description);
        $em = $this->getDoctrine()->getManager();
        $em->persist($permi_entity);
        $em->flush();
        $error = false;
        if(!$permi_entity->getId()){
            $error = true;
            $output = "error";
        }else{
            $error = false;
            $output = "true";
        }
        return $output;
    }
    public function listPermission(){
     $permission_repository = $this->getDoctrine()
    ->getRepository('MywebVotersBundle:Permission');
     $permissions =  $permission_repository->findAll();
     $output = array();
     foreach ($permissions as $key => $permission){
         $output[$key]['permission']  = $permission->getPermission();
         $output[$key]['description']  = $permission->getDescription();

     }
        return $output;
    }
}


