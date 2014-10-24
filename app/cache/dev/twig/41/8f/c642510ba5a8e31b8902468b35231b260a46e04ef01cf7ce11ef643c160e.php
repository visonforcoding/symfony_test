<?php

/* MywebAdminBundle:UserManage:showUser.html.twig */
class __TwigTemplate_418fc642510ba5a8e31b8902468b35231b260a46e04ef01cf7ce11ef643c160e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("MywebAdminBundle:Layout:dashbord.html.twig");

        $this->blocks = array(
            'js' => array($this, 'block_js'),
            'main' => array($this, 'block_main'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "MywebAdminBundle:Layout:dashbord.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 2
        $context["pageTitle"] = "用户管理";
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_js($context, array $blocks = array())
    {
        // line 4
        echo "<script type=\"text/javascript\">
    \$(function(){
   
            });
</script>
";
    }

    // line 10
    public function block_main($context, array $blocks = array())
    {
        // line 11
        echo "<table id=\"list\"><tr><td/></tr></table>
<div id=\"pager\"></div>
<div class=\"list\">
    <table class=\"table table-bordered table-hover\">
        <tr class=\"active\"><td>用户名</td><td>邮箱</td><td>状态</td><td>上次登录时间</td>
            <td>所属组</td><td>权限</td><td>操作</td></tr>
    ";
        // line 17
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["userList"]) ? $context["userList"] : $this->getContext($context, "userList")));
        foreach ($context['_seq'] as $context["_key"] => $context["user"]) {
            // line 18
            echo "        <tr><td>";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "username"), "html", null, true);
            echo "</td><td>";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "email"), "html", null, true);
            echo "</td>
            <td>";
            // line 19
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "enabled"), "html", null, true);
            echo "</td><td>";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "last_login"), "html", null, true);
            echo "</td>
            <td>";
            // line 20
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "groups"));
            foreach ($context['_seq'] as $context["_key"] => $context["group"]) {
                // line 21
                echo "                <input type=\"checkbox\" name=\"group\" checked=\"true\" value=\"";
                echo twig_escape_filter($this->env, (isset($context["group"]) ? $context["group"] : $this->getContext($context, "group")), "html", null, true);
                echo "\"> ";
                echo twig_escape_filter($this->env, (isset($context["group"]) ? $context["group"] : $this->getContext($context, "group")), "html", null, true);
                echo "
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['group'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 23
            echo "                ";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "groupRest"));
            foreach ($context['_seq'] as $context["_key"] => $context["groupRest"]) {
                // line 24
                echo "                <input type=\"checkbox\" name=\"group\"  value=\"";
                echo twig_escape_filter($this->env, (isset($context["groupRest"]) ? $context["groupRest"] : $this->getContext($context, "groupRest")), "html", null, true);
                echo "\"> ";
                echo twig_escape_filter($this->env, (isset($context["groupRest"]) ? $context["groupRest"] : $this->getContext($context, "groupRest")), "html", null, true);
                echo "
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['groupRest'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 26
            echo "            </td>
            <td>";
            // line 27
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "permission"));
            foreach ($context['_seq'] as $context["_key"] => $context["permission"]) {
                // line 28
                echo "                <input type=\"checkbox\" name=\"permission\" checked=\"true\" value=\"";
                echo twig_escape_filter($this->env, (isset($context["permission"]) ? $context["permission"] : $this->getContext($context, "permission")), "html", null, true);
                echo "\"> ";
                echo twig_escape_filter($this->env, (isset($context["permission"]) ? $context["permission"] : $this->getContext($context, "permission")), "html", null, true);
                echo "
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['permission'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 30
            echo "                ";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "permissionRest"));
            foreach ($context['_seq'] as $context["_key"] => $context["permissionRest"]) {
                // line 31
                echo "                <input type=\"checkbox\" name=\"permission\"  value=\"";
                echo twig_escape_filter($this->env, (isset($context["permissionRest"]) ? $context["permissionRest"] : $this->getContext($context, "permissionRest")), "html", null, true);
                echo "\"> ";
                echo twig_escape_filter($this->env, (isset($context["permissionRest"]) ? $context["permissionRest"] : $this->getContext($context, "permissionRest")), "html", null, true);
                echo "
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['permissionRest'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 33
            echo "            </td>
            <td><a href=\"";
            // line 34
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("myweb_admin_editUser", array("userid" => $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "user_id"), "name" => $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "username"), "email" => $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "email"), "enabled" => $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "enabled"), "group" => $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "groups"), "groupRest" => $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "groupRest"))), "html", null, true);
            // line 35
            echo "\">编辑</a>|<a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("myweb_admin_delUser", array("userid" => $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "user_id"))), "html", null, true);
            echo "\">删除</a></td></tr>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['user'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 37
        echo "    </table>
</div>
";
    }

    public function getTemplateName()
    {
        return "MywebAdminBundle:UserManage:showUser.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  150 => 37,  141 => 35,  139 => 34,  136 => 33,  125 => 31,  120 => 30,  109 => 28,  105 => 27,  102 => 26,  91 => 24,  86 => 23,  75 => 21,  71 => 20,  65 => 19,  58 => 18,  54 => 17,  46 => 11,  43 => 10,  34 => 4,  31 => 3,  26 => 2,);
    }
}
