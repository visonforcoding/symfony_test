<?php

/* MywebAdminBundle:UserManage:doAddGroup.html.twig */
class __TwigTemplate_ad749cb515d28120101fc2950d08c184ed144222ee6636b95b9344438750d1ee extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("MywebAdminBundle:Layout:dashbord.html.twig");

        $this->blocks = array(
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
        $context["pageTitle"] = "添加用户组";
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_main($context, array $blocks = array())
    {
        // line 4
        echo "<h1>";
        echo twig_escape_filter($this->env, (isset($context["output"]) ? $context["output"] : $this->getContext($context, "output")), "html", null, true);
        echo "</h1>
";
    }

    public function getTemplateName()
    {
        return "MywebAdminBundle:UserManage:doAddGroup.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  33 => 4,  30 => 3,  25 => 2,);
    }
}
