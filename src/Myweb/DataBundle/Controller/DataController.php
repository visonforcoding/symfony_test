<?php

namespace Myweb\DataBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request as syr;
use Symfony\Component\HttpFoundation\JsonResponse;
use Myweb\DataBundle\Entity\temp;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;

class DataController extends Controller {

    /**
     *
     * @param type $name
     * @return type
     */
    public function indexAction() {
        if ($this->get('security.context')->isGranted(array('闪烁'))) {
            echo "你有权限！";
            exit();
        } else {
            throw new \Symfony\Component\Security\Core\Exception\AccessDeniedException();
        }
    }

    public function getTempListAction(syr $request) {
        $countSqlQuery = "select COUNT(*) as count from `temp`";
        $dataSqlQuery = "select * from `temp`";
        $output = $this->get('yamei_jqgrid')
                ->buildAllDataResponse($request, $countSqlQuery, $dataSqlQuery, true, false);
        return new JsonResponse($output);
    }

    public function testAction() {
    $output = $this->get('yamei_voters')->listPermission();
         var_dump($output);
   exit();
    }

}
