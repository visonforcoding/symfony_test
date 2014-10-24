<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appDevUrlMatcher
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appDevUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);

        if (0 === strpos($pathinfo, '/_')) {
            // _wdt
            if (0 === strpos($pathinfo, '/_wdt') && preg_match('#^/_wdt/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_wdt')), array (  '_controller' => 'web_profiler.controller.profiler:toolbarAction',));
            }

            if (0 === strpos($pathinfo, '/_profiler')) {
                // _profiler_home
                if (rtrim($pathinfo, '/') === '/_profiler') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_profiler_home');
                    }

                    return array (  '_controller' => 'web_profiler.controller.profiler:homeAction',  '_route' => '_profiler_home',);
                }

                if (0 === strpos($pathinfo, '/_profiler/search')) {
                    // _profiler_search
                    if ($pathinfo === '/_profiler/search') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchAction',  '_route' => '_profiler_search',);
                    }

                    // _profiler_search_bar
                    if ($pathinfo === '/_profiler/search_bar') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchBarAction',  '_route' => '_profiler_search_bar',);
                    }

                }

                // _profiler_purge
                if ($pathinfo === '/_profiler/purge') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:purgeAction',  '_route' => '_profiler_purge',);
                }

                if (0 === strpos($pathinfo, '/_profiler/i')) {
                    // _profiler_info
                    if (0 === strpos($pathinfo, '/_profiler/info') && preg_match('#^/_profiler/info/(?P<about>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_info')), array (  '_controller' => 'web_profiler.controller.profiler:infoAction',));
                    }

                    // _profiler_import
                    if ($pathinfo === '/_profiler/import') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:importAction',  '_route' => '_profiler_import',);
                    }

                }

                // _profiler_export
                if (0 === strpos($pathinfo, '/_profiler/export') && preg_match('#^/_profiler/export/(?P<token>[^/\\.]++)\\.txt$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_export')), array (  '_controller' => 'web_profiler.controller.profiler:exportAction',));
                }

                // _profiler_phpinfo
                if ($pathinfo === '/_profiler/phpinfo') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:phpinfoAction',  '_route' => '_profiler_phpinfo',);
                }

                // _profiler_search_results
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/search/results$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_search_results')), array (  '_controller' => 'web_profiler.controller.profiler:searchResultsAction',));
                }

                // _profiler
                if (preg_match('#^/_profiler/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler')), array (  '_controller' => 'web_profiler.controller.profiler:panelAction',));
                }

                // _profiler_router
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/router$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_router')), array (  '_controller' => 'web_profiler.controller.router:panelAction',));
                }

                // _profiler_exception
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception')), array (  '_controller' => 'web_profiler.controller.exception:showAction',));
                }

                // _profiler_exception_css
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception\\.css$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception_css')), array (  '_controller' => 'web_profiler.controller.exception:cssAction',));
                }

            }

            if (0 === strpos($pathinfo, '/_configurator')) {
                // _configurator_home
                if (rtrim($pathinfo, '/') === '/_configurator') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_configurator_home');
                    }

                    return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::checkAction',  '_route' => '_configurator_home',);
                }

                // _configurator_step
                if (0 === strpos($pathinfo, '/_configurator/step') && preg_match('#^/_configurator/step/(?P<index>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_configurator_step')), array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::stepAction',));
                }

                // _configurator_final
                if ($pathinfo === '/_configurator/final') {
                    return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::finalAction',  '_route' => '_configurator_final',);
                }

            }

        }

        // myweb_voters_homepage
        if (0 === strpos($pathinfo, '/hello') && preg_match('#^/hello/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'myweb_voters_homepage')), array (  '_controller' => 'Myweb\\VotersBundle\\Controller\\DefaultController::indexAction',));
        }

        if (0 === strpos($pathinfo, '/admin')) {
            // myweb_data_homepage
            if ($pathinfo === '/admin/data') {
                return array (  '_controller' => 'Myweb\\DataBundle\\Controller\\DataController::indexAction',  '_route' => 'myweb_data_homepage',);
            }

            // myweb_data_getTempList
            if ($pathinfo === '/admin/getTempList') {
                return array (  '_controller' => 'Myweb\\DataBundle\\Controller\\DataController::getTempListAction',  '_route' => 'myweb_data_getTempList',);
            }

            // myweb_data_test
            if ($pathinfo === '/admin/test') {
                return array (  '_controller' => 'Myweb\\DataBundle\\Controller\\DataController::testAction',  '_route' => 'myweb_data_test',);
            }

            // myweb_user_homepage
            if (0 === strpos($pathinfo, '/admin/hello') && preg_match('#^/admin/hello/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'myweb_user_homepage')), array (  '_controller' => 'Myweb\\UserBundle\\Controller\\DefaultController::indexAction',));
            }

            if (0 === strpos($pathinfo, '/admin/log')) {
                if (0 === strpos($pathinfo, '/admin/login')) {
                    // fos_user_security_login
                    if ($pathinfo === '/admin/login') {
                        return array (  '_controller' => 'FOS\\UserBundle\\Controller\\SecurityController::loginAction',  '_route' => 'fos_user_security_login',);
                    }

                    // fos_user_security_check
                    if ($pathinfo === '/admin/login_check') {
                        if ($this->context->getMethod() != 'POST') {
                            $allow[] = 'POST';
                            goto not_fos_user_security_check;
                        }

                        return array (  '_controller' => 'FOS\\UserBundle\\Controller\\SecurityController::checkAction',  '_route' => 'fos_user_security_check',);
                    }
                    not_fos_user_security_check:

                }

                // fos_user_security_logout
                if ($pathinfo === '/admin/logout') {
                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\SecurityController::logoutAction',  '_route' => 'fos_user_security_logout',);
                }

            }

            if (0 === strpos($pathinfo, '/admin/profile')) {
                // fos_user_profile_show
                if (rtrim($pathinfo, '/') === '/admin/profile') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_fos_user_profile_show;
                    }

                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'fos_user_profile_show');
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ProfileController::showAction',  '_route' => 'fos_user_profile_show',);
                }
                not_fos_user_profile_show:

                // fos_user_profile_edit
                if ($pathinfo === '/admin/profile/edit') {
                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ProfileController::editAction',  '_route' => 'fos_user_profile_edit',);
                }

            }

            if (0 === strpos($pathinfo, '/admin/re')) {
                if (0 === strpos($pathinfo, '/admin/register')) {
                    // fos_user_registration_register
                    if (rtrim($pathinfo, '/') === '/admin/register') {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'fos_user_registration_register');
                        }

                        return array (  '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::registerAction',  '_route' => 'fos_user_registration_register',);
                    }

                    if (0 === strpos($pathinfo, '/admin/register/c')) {
                        // fos_user_registration_check_email
                        if ($pathinfo === '/admin/register/check-email') {
                            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                $allow = array_merge($allow, array('GET', 'HEAD'));
                                goto not_fos_user_registration_check_email;
                            }

                            return array (  '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::checkEmailAction',  '_route' => 'fos_user_registration_check_email',);
                        }
                        not_fos_user_registration_check_email:

                        if (0 === strpos($pathinfo, '/admin/register/confirm')) {
                            // fos_user_registration_confirm
                            if (preg_match('#^/admin/register/confirm/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                    $allow = array_merge($allow, array('GET', 'HEAD'));
                                    goto not_fos_user_registration_confirm;
                                }

                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'fos_user_registration_confirm')), array (  '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::confirmAction',));
                            }
                            not_fos_user_registration_confirm:

                            // fos_user_registration_confirmed
                            if ($pathinfo === '/admin/register/confirmed') {
                                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                    $allow = array_merge($allow, array('GET', 'HEAD'));
                                    goto not_fos_user_registration_confirmed;
                                }

                                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::confirmedAction',  '_route' => 'fos_user_registration_confirmed',);
                            }
                            not_fos_user_registration_confirmed:

                        }

                    }

                }

                if (0 === strpos($pathinfo, '/admin/resetting')) {
                    // fos_user_resetting_request
                    if ($pathinfo === '/admin/resetting/request') {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_fos_user_resetting_request;
                        }

                        return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::requestAction',  '_route' => 'fos_user_resetting_request',);
                    }
                    not_fos_user_resetting_request:

                    // fos_user_resetting_send_email
                    if ($pathinfo === '/admin/resetting/send-email') {
                        if ($this->context->getMethod() != 'POST') {
                            $allow[] = 'POST';
                            goto not_fos_user_resetting_send_email;
                        }

                        return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::sendEmailAction',  '_route' => 'fos_user_resetting_send_email',);
                    }
                    not_fos_user_resetting_send_email:

                    // fos_user_resetting_check_email
                    if ($pathinfo === '/admin/resetting/check-email') {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_fos_user_resetting_check_email;
                        }

                        return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::checkEmailAction',  '_route' => 'fos_user_resetting_check_email',);
                    }
                    not_fos_user_resetting_check_email:

                    // fos_user_resetting_reset
                    if (0 === strpos($pathinfo, '/admin/resetting/reset') && preg_match('#^/admin/resetting/reset/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                            goto not_fos_user_resetting_reset;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'fos_user_resetting_reset')), array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::resetAction',));
                    }
                    not_fos_user_resetting_reset:

                }

            }

            // fos_user_change_password
            if ($pathinfo === '/admin/profile/change-password') {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_fos_user_change_password;
                }

                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ChangePasswordController::changePasswordAction',  '_route' => 'fos_user_change_password',);
            }
            not_fos_user_change_password:

            if (0 === strpos($pathinfo, '/admin/group')) {
                // fos_user_group_list
                if ($pathinfo === '/admin/group/list') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_fos_user_group_list;
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\GroupController::listAction',  '_route' => 'fos_user_group_list',);
                }
                not_fos_user_group_list:

                // fos_user_group_new
                if ($pathinfo === '/admin/group/new') {
                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\GroupController::newAction',  '_route' => 'fos_user_group_new',);
                }

                // fos_user_group_show
                if (preg_match('#^/admin/group/(?P<groupName>[^/]++)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_fos_user_group_show;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'fos_user_group_show')), array (  '_controller' => 'FOS\\UserBundle\\Controller\\GroupController::showAction',));
                }
                not_fos_user_group_show:

                // fos_user_group_edit
                if (preg_match('#^/admin/group/(?P<groupName>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'fos_user_group_edit')), array (  '_controller' => 'FOS\\UserBundle\\Controller\\GroupController::editAction',));
                }

                // fos_user_group_delete
                if (preg_match('#^/admin/group/(?P<groupName>[^/]++)/delete$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_fos_user_group_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'fos_user_group_delete')), array (  '_controller' => 'FOS\\UserBundle\\Controller\\GroupController::deleteAction',));
                }
                not_fos_user_group_delete:

            }

        }

        if (0 === strpos($pathinfo, '/hello')) {
            // myweb_blog_homepage
            if (preg_match('#^/hello/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'myweb_blog_homepage')), array (  '_controller' => 'Myweb\\BlogBundle\\Controller\\DefaultController::indexAction',));
            }

            // myweb_test_homepage
            if (preg_match('#^/hello/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'myweb_test_homepage')), array (  '_controller' => 'Myweb\\TestBundle\\Controller\\DefaultController::indexAction',));
            }

        }

        // one
        if ($pathinfo === '/one') {
            return array (  '_controller' => 'Myweb\\TestBundle\\Controller\\DefaultController::oneAction',  '_route' => 'one',);
        }

        // two
        if ($pathinfo === '/two') {
            return array (  '_controller' => 'Myweb\\TestBundle\\Controller\\IndexController::twoAction',  '_route' => 'two',);
        }

        if (0 === strpos($pathinfo, '/admin')) {
            // myweb_admin_homepage
            if (rtrim($pathinfo, '/') === '/admin') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'myweb_admin_homepage');
                }

                return array (  '_controller' => 'Myweb\\AdminBundle\\Controller\\IndexController::indexAction',  '_route' => 'myweb_admin_homepage',);
            }

            // myweb_admin_addComment
            if ($pathinfo === '/admin/addComment') {
                return array (  '_controller' => 'Myweb\\AdminBundle\\Controller\\IndexController::addCommentAction',  '_route' => 'myweb_admin_addComment',);
            }

            // myweb_admin_editComment
            if ($pathinfo === '/admin/editComment') {
                return array (  '_controller' => 'Myweb\\AdminBundle\\Controller\\IndexController::editCommentAction',  '_route' => 'myweb_admin_editComment',);
            }

            if (0 === strpos($pathinfo, '/admin/userManage')) {
                // myweb_admin_addPermission
                if ($pathinfo === '/admin/userManage/addPermission') {
                    return array (  '_controller' => 'Myweb\\AdminBundle\\Controller\\UserManageController::addPermissionAction',  '_route' => 'myweb_admin_addPermission',);
                }

                // myweb_admin_doAddPermission
                if ($pathinfo === '/admin/userManage/doAddPermission') {
                    return array (  '_controller' => 'Myweb\\AdminBundle\\Controller\\UserManageController::doAddPermissionAction',  '_route' => 'myweb_admin_doAddPermission',);
                }

                // myweb_admin_showUser
                if ($pathinfo === '/admin/userManage/showUser') {
                    return array (  '_controller' => 'Myweb\\AdminBundle\\Controller\\UserManageController::showUserAction',  '_route' => 'myweb_admin_showUser',);
                }

                // myweb_admin_getUserList
                if ($pathinfo === '/admin/userManage/getUserList') {
                    return array (  '_controller' => 'Myweb\\AdminBundle\\Controller\\UserManageController::getUserListAction',  '_route' => 'myweb_admin_getUserList',);
                }

                // myweb_admin_showGroup
                if ($pathinfo === '/admin/userManage/showGroup') {
                    return array (  '_controller' => 'Myweb\\AdminBundle\\Controller\\UserManageController::showGroupAction',  '_route' => 'myweb_admin_showGroup',);
                }

                // myweb_admin_getGroupList
                if ($pathinfo === '/admin/userManage/getGroupList') {
                    return array (  '_controller' => 'Myweb\\AdminBundle\\Controller\\UserManageController::getGroupListAction',  '_route' => 'myweb_admin_getGroupList',);
                }

                // myweb_admin_addUser
                if ($pathinfo === '/admin/userManage/addUser') {
                    return array (  '_controller' => 'Myweb\\AdminBundle\\Controller\\UserManageController::addUserAction',  '_route' => 'myweb_admin_addUser',);
                }

                // myweb_admin_doAddUser
                if ($pathinfo === '/admin/userManage/doAddUser') {
                    return array (  '_controller' => 'Myweb\\AdminBundle\\Controller\\UserManageController::doAddUserAction',  '_route' => 'myweb_admin_doAddUser',);
                }

                // myweb_admin_addGroup
                if ($pathinfo === '/admin/userManage/addGroup') {
                    return array (  '_controller' => 'Myweb\\AdminBundle\\Controller\\UserManageController::addGroupAction',  '_route' => 'myweb_admin_addGroup',);
                }

                // myweb_admin_doAddGroup
                if ($pathinfo === '/admin/userManage/doAddGroup') {
                    return array (  '_controller' => 'Myweb\\AdminBundle\\Controller\\UserManageController::doAddGroupAction',  '_route' => 'myweb_admin_doAddGroup',);
                }

                // myweb_admin_manageGroup
                if ($pathinfo === '/admin/userManage/manageGroup') {
                    return array (  '_controller' => 'Myweb\\AdminBundle\\Controller\\UserManageController::manageGroupAction',  '_route' => 'myweb_admin_manageGroup',);
                }

                if (0 === strpos($pathinfo, '/admin/userManage/del')) {
                    if (0 === strpos($pathinfo, '/admin/userManage/delGroup')) {
                        // myweb_admin_delGroup
                        if ($pathinfo === '/admin/userManage/delGroup') {
                            return array (  '_controller' => 'Myweb\\AdminBundle\\Controller\\UserManageController::delGroupAction',  '_route' => 'myweb_admin_delGroup',);
                        }

                        // myweb_admin_delGroupPer
                        if ($pathinfo === '/admin/userManage/delGroupPer') {
                            return array (  '_controller' => 'Myweb\\AdminBundle\\Controller\\UserManageController::delGroupPerAction',  '_route' => 'myweb_admin_delGroupPer',);
                        }

                    }

                    // myweb_admin_delUser
                    if ($pathinfo === '/admin/userManage/delUser') {
                        return array (  '_controller' => 'Myweb\\AdminBundle\\Controller\\UserManageController::delUserAction',  '_route' => 'myweb_admin_delUser',);
                    }

                }

                // myweb_admin_editUser
                if ($pathinfo === '/admin/userManage/editUser') {
                    return array (  '_controller' => 'Myweb\\AdminBundle\\Controller\\UserManageController::editUserAction',  '_route' => 'myweb_admin_editUser',);
                }

                // myweb_admin_doEditUser
                if ($pathinfo === '/admin/userManage/doEditUser') {
                    return array (  '_controller' => 'Myweb\\AdminBundle\\Controller\\UserManageController::doEditUserAction',  '_route' => 'myweb_admin_doEditUser',);
                }

            }

        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
