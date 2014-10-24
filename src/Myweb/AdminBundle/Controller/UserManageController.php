<?php

/*
 * Manage User Group Permission
 */

namespace Myweb\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request as syr;

class UserManageController extends Controller {

    /**
     * add user 
     * @return type
     */
    public function addUserAction() {
        $groupsList = $this->get('yamei_user.user_manage')->getGroupArray();
        return $this->render('MywebAdminBundle:UserManage:addUser.html.twig', array(
                    'groupsList' => $groupsList
        ));
    }

    /**
     * do add user 
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @return type
     */
    public function doAddUserAction(syr $request) {
        $username = $request->get('username');
        $password = $request->get('password');
        $email = $request->get('email');
        $groups = $request->get('groups');
        $error = false;
        if ($error) {
            
        } else {
            $output = $this->get('yamei_user.user_manage')->addUser($username, $password, $email, $groups);
        }
        return $this->render('MywebAdminBundle:UserManage:showResult.html.twig', array(
                    'output' => $output
        ));
    }

    public function editUserAction(syr $request) {
        $userId = $request->get('userid');
        $name = $request->get('name');
        $email = $request->get('email');
        $enabled = $request->get('enabled');
        $group = $request->get('group');
        $groupRest = $request->get('groupRest');
        return $this->render('MywebAdminBundle:UserManage:editUser.html.twig', array(
                    'userId' => $userId,
                    'name' => $name,
                    'email' => $email,
                    'enabled' => $enabled,
                    'groups' => $group,
                    'groupsRest' => $groupRest
        ));
    }

    public function doEditUserAction(syr $request) {
        $userId = $request->get('userId');
        $name = $request->get('username');
        $email = $request->get('email');
        $enabled = $request->get('enabled');
        $group = $request->get('groups');
        $result = $this->get('yamei_user.user_manage')->editUser($userId,$name,$email,$enabled,$group);
          return $this->render('MywebAdminBundle:UserManage:showResult.html.twig', array(
                    'output' => $result
        ));

    }

    public function delUserAction(syr $request) {
        $userId = $request->get('userid');
        $result = $this->get('yamei_user.user_manage')->delUser($userId);
        return $this->render('MywebAdminBundle:UserManage:showResult.html.twig', array(
                    'output' => $result
        ));
    }

    /**
     * add permission
     * @return type
     */
    public function addPermissionAction() {

        return $this->render('MywebAdminBundle:UserManage:addPermission.html.twig');
    }

    /**
     * do add permission
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @return type
     */
    public function doAddPermissionAction(syr $request) {
        $permission = trim($request->get('permission'));
        $description = $request->get('description');
        $output = $this->get('yamei_voters')->addPermission($permission, $description);
        return $this->render('MywebAdminBundle:UserManage:doAddPermission.html.twig', array(
                    'output' => $output
                ));
    }

    public function showUserAction() {
        $result = $this->get('yamei_user.user_manage')->getUserArray();
        $userList = $result['userRows'];
        $allGroup = $result['allGroup'];
        $allPermission = $result['allPermission'];
        return $this->render('MywebAdminBundle:UserManage:showUser.html.twig', array(
                    'userList' => $userList,
                    'allGroup' => $allGroup,
                    'allPermission' => $allPermission
        ));
    }

    public function getUserListAction(syr $request) {
        $output = $this->get('yamei_user.user_manage')->getUserList($request);
        return $output;
    }

    public function showGroupAction() {
        $this->get('yamei_user.user_manage')->getGroupsArray();
        exit();
//        return $this->render('MywebAdminBundle:UserManage:showGroup.html.twig', array(
//                    'groupsList' => $groupsList
//        ));
    }

    public function manageGroupAction() {
        $groupList = $this->get('yamei_user.user_manage')->getGroupArray();
        return $this->render('MywebAdminBundle:UserManage:manageGroup.html.twig', array(
                    'groupList' => $groupList
        ));
    }

    public function delGroupAction(syr $request) {
        $groupId = $request->get('group');
        $output = $this->get('yamei_user.user_manage')->delGroup($groupId);
        return $this->render('MywebAdminBundle:UserManage:delGroup.html.twig', array(
                    'output' => $output
        ));
    }

    /**
     * 
     * @return type
     */
    public function addGroupAction() {
        $permissions = $this->get('yamei_user.user_manage')->getPermissionArray();
        return $this->render('MywebAdminBundle:UserManage:addGroup.html.twig', array(
                    'permissions' => $permissions
        ));
    }

    public function doAddGroupAction(syr $request) {
        $name = trim($request->get('name'));
        $permissions = $request->get('permissions');
        $output = $this->get('yamei_user.user_manage')->addGroup($name, $permissions);
        return $this->render('MywebAdminBundle:UserManage:doAddGroup.html.twig', array(
                    'output' => $output
                ));
    }

    public function delGroupPerAction(syr $request) {
        $groupId = $request->get('group');
        $permissionId = $request->get('permission');
        $output = $this->get('yamei_user.user_manage')->delGroupPermission($groupId, $permissionId);
        return $this->render('MywebAdminBundle:UserManage:delGroupPer.html.twig', array(
                    'output' => $output
                ));
    }

    public function getGroupListAction(syr $request) {
        //$this->get('yamei_user.user_manage')->getGroupArray();
        // return $output;  
    }

}
