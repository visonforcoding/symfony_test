<?php

/* MywebAdminBundle:UserManage:addPermission.html.twig */
class __TwigTemplate_07d99a319f985274a0df8ed17d8e66f320ff8a16502384805e5fbe82b8850d71 extends Twig_Template
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
        $context["pageTitle"] = "添加权限";
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_main($context, array $blocks = array())
    {
        // line 4
        echo "<div class=\"main_form\">
<form role=\"form\" action=\"";
        // line 5
        echo $this->env->getExtension('routing')->getPath("myweb_admin_doAddPermission");
        echo "\" method=\"post\">
  <div class=\"form-group\">
    <label for=\"exampleInputEmail1\">Permission</label>
    <input type=\"text\" class=\"form-control\" name=\"permission\"  placeholder=\"Enter Permission\">
  </div>
  <div class=\"form-group\">
    <label for=\"exampleInputPassword1\">Description</label>
    <textarea name=\"description\" id=\"exampleInputPassword1\" placeholder=\"Enter Desrcrition\"></textarea>
  </div>
  <button type=\"submit\" class=\"btn btn-default\">Submit</button>
</form>
</div>
";
    }

    public function getTemplateName()
    {
        return "MywebAdminBundle:UserManage:addPermission.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  36 => 5,  33 => 4,  30 => 3,  25 => 2,);
    }
}
