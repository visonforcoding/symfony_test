<?php

/* MywebAdminBundle:Index:index.html.twig */
class __TwigTemplate_039272c4c6cd267da9570a1d9d1ec229db145e1fe874bc6ccb0ea547b0d1cc5f extends Twig_Template
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
        $context["pageTitle"] = "后台管理";
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_main($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "MywebAdminBundle:Index:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  30 => 3,  25 => 2,);
    }
}
