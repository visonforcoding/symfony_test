<?php

/*
 * user controller  manage user
 * 
 */

namespace Myweb\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Myweb\UserBundle\Entity\User;
use Myweb\UserBundle\Entity\Group;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class UserController extends Controller implements ContainerAwareInterface {

    protected $container;

    /**
     * {@inheritDoc}
     */
    public function setContainer(ContainerInterface $container = null) {
        $this->container = $container;
    }

    /**
     * add user and set to groups
     * @param string $username
     * @param string $password
     * @param string $email
     * @param array $groups
     * @return string
     */
    public function addUser($username, $password, $email, array $groups) {
        $em = $this->getDoctrine()->getManager();
        $userManager = $this->container->get('fos_user.user_manager');
        $ckUser = $userManager->findUserByUsername($username);
        $ckEmail = $userManager->findUserByEmail($email);
        $error = false;
        if (empty($ckUser) && empty($ckEmail)) {
            $user = $userManager->createUser();
            $user->setUsername($username);
            $user->setEmail($email);
            $user->setPlainPassword($password);
            $user->setEnabled(true);
            $em->persist($user);
            $em->flush();
            foreach ($groups as $group) {
                $entity = $em->getRepository('MywebUserBundle:Group')->findOneById($group); // You could do that by Id, too
                $user->addGroup($entity);
                $em->flush();
                if (empty($user->getId())) {
                    $error = true;
                }
            }
        } else {
            $output = "your username or email has been registered!";
        }
        if ($error) {
            $output = "add user to group error!";
        } else {
            $output = "create user success!";
        }
        return $output;
    }

    /**
     * delete a user 
     * @param type $userId   the user id
     * @return type
     */
    public function delUser($userId) {
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('MywebUserBundle:User')->find($userId);
        $error = false;
        if ($user) {
            $em->remove($user);
            $em->flush();
            if ($user->getId()) {
                $error = true;
            } else {
                $error = false;
            }
        }
        if ($error) {
            $output = $this->get('translator')->trans('Action.delError');
        } else {
            $output = $this->get('translator')->trans('Action.delSuccess');
        }
        return $output;
    }

    /**
     * return fos_user jqgrid json response
     * @param \Myweb\UserBundle\Controller\Request $request
     * @return \Myweb\UserBundle\Controller\JsonResponse
     */
    public function getUserList($request) {
        $countSqlQuery = "select COUNT(*) as count from `fos_user`";
        $dataSqlQuery = "select * from `fos_user`";
        $output = $this->get('yamei_jqgrid')
                ->buildAllDataResponse($request, $countSqlQuery, $dataSqlQuery, true, false);
        return new JsonResponse($output);
    }

    public function getUserArray() {
        $sleUserQuery = "select id as user_id,username,email,enabled,last_login from fos_user";
        $em = $this->getDoctrine()->getManager();
        $selUser = $em->getConnection()->prepare($sleUserQuery);
        $selUser->execute();
        $userRows = $selUser->fetchAll();
        $selGroupQuery = "select fos_user_user_group.*,fg.name from fos_user_user_group join "
                . "fos_group fg on fg.id = fos_user_user_group.group_id";
        $selGroup = $em->getConnection()->prepare($selGroupQuery);
        $selGroup->execute();
        $groupRows = $selGroup->fetchAll();
        foreach ($userRows as $key => $value) {
            foreach ($groupRows as $k => $v) {
                if ($value['user_id'] == $v['user_id']) {
                    $userRows[$key]['groups'][] = $groupRows[$k]['name'];
                }
            }
        }
        $selPermissionQuery = "select * from ym_group_permission join ym_permission ymp "
                . "on ymp.id = ym_group_permission.permissionId join fos_group fg on fg.id"
                . " = ym_group_permission.groupId";
        $selPermission = $em->getConnection()->prepare($selPermissionQuery);
        $selPermission->execute();
        $permissionRows = $selPermission->fetchAll();
        foreach ($userRows as $key => $value) {
            foreach ($value['groups'] as $k => $v) {
                foreach ($permissionRows as $pk => $pv) {
                    if ($v == $pv['name']) {
                        $userRows[$key]['permission'][] = $permissionRows[$pk]['description'];
                    }
                }
            }
        }
        foreach ($userRows as $key => $value) {
            $userRows[$key]['permission'] = array_unique($value['permission']);
            $userRows[$key]['groups'] = array_unique($value['groups']);
        }

        $selAllGroupQuery = "select * from fos_group";
        $selAllGroup = $em->getConnection()->prepare($selAllGroupQuery);
        $selAllGroup->execute();
        $allGroupRows = $selAllGroup->fetchAll();
        foreach ($allGroupRows as $value) {
            $allGroupRow[] = $value['name'];
        }
        $selAllpermission = "select * from ym_permission";
        $selAllPermission = $em->getConnection()->prepare($selAllpermission);
        $selAllPermission->execute();
        $allPermissionRows = $selAllPermission->fetchAll();
        foreach ($allPermissionRows as $value) {
            $allPermissionRow[] = $value['description'];
        }
        foreach ($userRows as $key => $value) {
            $groupRest = \array_diff($allGroupRow, $value['groups']);
            $userRows[$key]['groupRest'] = $groupRest;
            $permissionRest = \array_diff($allPermissionRow, $value['permission']);
            $userRows[$key]['permissionRest'] = $permissionRest;
        }
        $result = array(
            'userRows' => $userRows,
            'allGroup' => $allGroupRows,
            'allPermission' => $allPermissionRows
        );
        return $result;
    }
    
    
    /**
     * edit fos_user user
     * @param string $id  user id
     * @param string $name  username
     * @param string $email user email
     * @param string set the user`s status '1' set to enabled '0' set to unenabled
     * @param array $group the groups has been set
     * @return string  action result
     */
    public function editUser($id, $name, $email, $enabled, $groups) {
        $em = $this->getDoctrine()->getManager();
        if ($enabled == '1') {
            $enabled = true;
        } else {
            $enabled = false;
        }
        $user = $em->getRepository('MywebUserBundle:User')->findOneBy(array(
            'id'=>$id
        ));
        $oldName = $user->getUsername($name);
        $oldEmail = $user->getEmail($email);
        if ($oldName != $name) {
            $ckUser = $em->getRepository('MywebUserBundle:User')->findOneBy(
                    array(
                        'username' => $name
                    )
            );
            if ($ckUser) {
                return $output = $this->get('translator')->trans('Action.duplicatName');
            }
        }
        if ($oldEmail != $email) {
            $ckEmail = $em->getRepository('MywebUserBundle:User')->findOneBy(
                    array(
                        'email' => $email
                    )
            );
            if ($ckEmail) {
                return $output = $this->get('translator')->trans('Action.duplicatEmail');
            }
        }
        $error = false;
        $allGroups = $this->getGroupArray();
        foreach ($allGroups as $group){
            $allGroupsName[] = $group['name'];
        }
        if (empty($ckUser) && empty($ckEmail)) {
            $user->setUsername($name);
            $user->setEmail($email);
            $user->setEnabled($enabled);
            $em->flush();
            
            //del all groups
            foreach ($allGroupsName as $groupName){
             $entity = $em->getRepository('MywebUserBundle:Group')->findOneBy(array(
                    'name'=>$groupName
                )); // You could do that by Id too
                $user->removeGroup($entity);
                $em->flush();
            }
            foreach ($groups as $group) {
                $entity = $em->getRepository('MywebUserBundle:Group')->findOneBy(array(
                    'name'=>$group
                )); // You could do that by Id too
                $user->addGroup($entity);
                $em->flush();
                if (empty($user->getId())) {
                    $error = true;
                }
            }
        } 
        if ($error) {
           $output = $this->get('translator')->trans('Action.editUserError');
        } else {
          $output = $this->get('translator')->trans('Action.editUserSuccess');
        }
        return $output;
    }

    /**
     *  return json type response for jqgrid
     * @param symfony request $request   
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function getGroupList($request) {
        $countSqlQuery = "select COUNT(*) as count from `ym_group_permission`";
        $dataSqlQuery = "select * from `fos_group` join (select * from `ym_group_permission` left join `ym_permission`"
                . " ymp on `ym_group_permission`.`permissionId` = ymp.id) as ymgp on `fos_group`.id = ymgp.groupId";
        $output = $this->get('yamei_jqgrid')
                ->buildAllDataResponse($request, $countSqlQuery, $dataSqlQuery, true, false);
        return new JsonResponse($output);
    }

    /**
     *  common get array type group and group_permission list
     * @return array 
     */
    public function getGroupsArray() {
       $groupRows = $this->getGroupArray();
       $groupPerRows = $this->getGroupPermission();
       foreach($groupRows as $key=>$value){
           foreach($groupPerRows as $k=>$v){
               if((int)$v['groupId']==$value['id']){
                  $groupRows[$key]['permissions']['permissionId'] = $groupPerRows[$k]['permissionId'];
                  $groupRows[$key]['permissions']['description'] = $groupPerRows[$k]['description'];
                  
               }
           }
       }
       return $groupRows;
    }

    /**
     * 
     * @return array only group list
     */
    public function getGroupArray() {
        $em = $this->getDoctrine()->getManager();
        $sel_group = $em->createQueryBuilder()
                ->select('g')
                ->from('MywebUserBundle:Group', 'g')
                ->getQuery();
        $rows = $sel_group->getArrayResult();   //get aray data from db
        return $rows;
    }
    
    public function getGroupPermission(){
        $em = $this->getDoctrine()->getManager();
        $selPermissionQuery = "select * from ym_group_permission join ym_permission ymp "
                . "on ymp.id = ym_group_permission.permissionId join fos_group fg on fg.id"
                . " = ym_group_permission.groupId";
        $selPermission = $em->getConnection()->prepare($selPermissionQuery);
        $selPermission->execute();
        $permissionRows = $selPermission->fetchAll();
        return $permissionRows;
    }

    /**
     * 
     * @param type $name
     * @param array $permissions
     * @return string
     */
    public function addGroup($name, array $permissions) {
        $em = $this->getDoctrine()->getManager();
        $ck_name = $em->getRepository('MywebUserBundle:Group')->findOneBy(
                array('name' => $name)
        );
        $error = false;
        if (empty($ck_name)) {
            $group = new Group($name, array());
            $group->setName($name);
            $group->setRoles(array());
            $em->persist($group);
            $em->flush();
            foreach ($permissions as $permission) {
                $entity = $em->getRepository('MywebVotersBundle:Permission')->findOneById($permission);
                $group->addPermission($entity);
                $em->flush();
                if (empty($group->getId())) {
                    $error = true;
                }
            }
        } else {
            $output = "soory,the name you add has been added!";
        }
        if ($error) {
            $output = "add error!";
        } else {
            $output = "add success!";
        }

        return $output;
    }

    /**
     * delete the group and the group_permission recods in this group
     * @param type $groupId  the group id will be deleted
     * @return string
     */
    public function delGroup($groupId) {
        $em = $this->getDoctrine()->getManager();
        $error = false;
        $group = $em->getRepository('MywebUserBundle:Group')->find($groupId);
        if ($group) {
            $em->remove($group);
            $em->flush();
            if ($group->getId()) {
                $error = true;
            } else {
                $error = false;
            }
        }
        if ($error) {
            $output = $this->get('translator')->trans('Action.delError');
        } else {
            $output = $this->get('translator')->trans('Action.delSuccess');
        }
        return $output;
    }

    /**
     * 
     * @return  array object
     */
    public function getPermissionArray() {
        $em = $this->getDoctrine()->getManager();
        $permission = $em->getRepository('MywebVotersBundle:Permission')->findAll();
        return $permission;
    }

    public function delGroupPermission($groupId, $permissionId) {
        $em = $this->getDoctrine()->getManager();
        $error = false;
        $group = $em->getRepository('MywebUserBundle:Group')->find($groupId);
        $permission = $em->getRepository('MywebVotersBundle:Permission')->find($permissionId);
        $group->removePermission($permission);
        $em->flush();
        if (empty($group->getId())) {
            $error = true;
        }
        if ($error) {
            $output = "delete error!";
        } else {
            $output = "delete success!";
        }
        return $output;
    }
    
    
    public function getAllGroupsName(){
        
    }

}
