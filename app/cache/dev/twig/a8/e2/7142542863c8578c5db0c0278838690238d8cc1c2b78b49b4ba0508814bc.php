<?php

/* MywebAdminBundle:Layout:dashbord.html.twig */
class __TwigTemplate_a8e27142542863c8578c5db0c0278838690238d8cc1c2b78b49b4ba0508814bc extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::base.html.twig");

        $this->blocks = array(
            'body' => array($this, 'block_body'),
            'main' => array($this, 'block_main'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_body($context, array $blocks = array())
    {
        // line 3
        echo "<header>
<nav class=\"navbar navbar-default\" role=\"navigation\">
  <div class=\"navbar-header\">
    <button type=\"button\" class=\"navbar-toggle\" data-toggle=\"collapse\" data-target=\"#bs-example-navbar-collapse-1\">
      <span class=\"sr-only\">Toggle navigation</span>
      <span class=\"icon-bar\"></span>
      <span class=\"icon-bar\"></span>
      <span class=\"icon-bar\"></span>
    </button>
      <a class=\"navbar-brand\" href=\"#\">欢迎您，
        ";
        // line 13
        if ($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array(), "any", false, true), "username", array(), "any", true, true)) {
            // line 14
            echo "             ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "username", array()), "html", null, true);
            echo "
          ";
        } else {
            // line 16
            echo "              游客
           ";
        }
        // line 18
        echo "      </a>
  </div>

  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class=\"collapse navbar-collapse\" id=\"bs-example-navbar-collapse-1\">
    <ul class=\"nav navbar-nav\">
      <li class=\"active\"><a href=\"#\">Link</a></li>
      <li><a href=\"#\">Link</a></li>
      <li class=\"dropdown\">
        <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">用户管理 <b class=\"caret\"></b></a>
        <ul class=\"dropdown-menu\">
          <li><a href=\"";
        // line 29
        echo $this->env->getExtension('routing')->getPath("myweb_admin_addUser");
        echo "\">添加用户</a></li>
          <li><a href=\"";
        // line 30
        echo $this->env->getExtension('routing')->getPath("myweb_admin_addGroup");
        echo "\">添加用户组</a></li>
          <li><a href=\"";
        // line 31
        echo $this->env->getExtension('routing')->getPath("myweb_admin_addPermission");
        echo "\">添加权限</a></li>
          <li><a href=\"";
        // line 32
        echo $this->env->getExtension('routing')->getPath("myweb_admin_showGroup");
        echo "\">权限管理</a></li>
          <li><a href=\"";
        // line 33
        echo $this->env->getExtension('routing')->getPath("myweb_admin_showUser");
        echo "\">用户管理</a></li>
        <li><a href=\"";
        // line 34
        echo $this->env->getExtension('routing')->getPath("myweb_admin_manageGroup");
        echo "\">用户组管理</a></li>
          <li class=\"divider\"></li>
          <li><a href=\"#\">Separated</a></li>
          <li class=\"divider\"></li>
          <li><a href=\"#\">One more separated link</a></li>
        </ul>
      </li>
    </ul>
    <ul class=\"nav navbar-nav navbar-right\">
      <li class=\"dropdown\">
        <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">
          ";
        // line 45
        if ($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array(), "any", false, true), "username", array(), "any", true, true)) {
            // line 46
            echo "             ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "username", array()), "html", null, true);
            echo "
          ";
        } else {
            // line 48
            echo "              游客
           ";
        }
        // line 50
        echo "            <b class=\"caret\"></b></a>
        <ul class=\"dropdown-menu\">
          <li><a href=\"";
        // line 52
        echo $this->env->getExtension('routing')->getPath("fos_user_security_logout");
        echo "\">退出</a></li>
          <li><a href=\"#\">Another action</a></li>
          <li><a href=\"#\">Something else here</a></li>
          <li class=\"divider\"></li>
          <li><a href=\"#\">Separated link</a></li>
        </ul>
      </li>
    </ul>
  </div><!-- /.navbar-collapse -->
</nav>
</header>
    <div id=\"center\">
        ";
        // line 64
        $this->displayBlock('main', $context, $blocks);
        // line 65
        echo "    </div>
";
    }

    // line 64
    public function block_main($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "MywebAdminBundle:Layout:dashbord.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  141 => 64,  136 => 65,  134 => 64,  119 => 52,  115 => 50,  111 => 48,  105 => 46,  103 => 45,  89 => 34,  85 => 33,  81 => 32,  77 => 31,  73 => 30,  69 => 29,  56 => 18,  52 => 16,  46 => 14,  44 => 13,  32 => 3,  29 => 2,);
    }
}
