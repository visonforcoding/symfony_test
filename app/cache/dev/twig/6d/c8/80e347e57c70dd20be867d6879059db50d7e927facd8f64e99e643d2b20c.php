<?php

/* MywebAdminBundle:UserManage:addGroup.html.twig */
class __TwigTemplate_6dc880e347e57c70dd20be867d6879059db50d7e927facd8f64e99e643d2b20c extends Twig_Template
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
        echo "<div class=\"main_form\">
    <form role=\"form\" action=\"";
        // line 5
        echo $this->env->getExtension('routing')->getPath("myweb_admin_doAddGroup");
        echo "\" method=\"post\">
        <div class=\"form-group\">
            <label >name</label>
            <input name=\"name\" type=\"text\" placeholder=\"group name\"/>
        </div>
      ";
        // line 10
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["permissions"]) ? $context["permissions"] : $this->getContext($context, "permissions")));
        foreach ($context['_seq'] as $context["_key"] => $context["permission"]) {
            // line 11
            echo "        <div class=\"form-group\">
            <div class=\"checkbox\">
                <label>
                    <input type=\"checkbox\" name=\"permissions[]\" value=\"";
            // line 14
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["permission"]) ? $context["permission"] : $this->getContext($context, "permission")), "id"), "html", null, true);
            echo "\"/> ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["permission"]) ? $context["permission"] : $this->getContext($context, "permission")), "description"), "html", null, true);
            echo "
                </label>
            </div>   
                 ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['permission'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 18
        echo "        </div>
        <button type=\"submit\" class=\"btn btn-default\">Submit</button>
    </form>
</div>
";
    }

    public function getTemplateName()
    {
        return "MywebAdminBundle:UserManage:addGroup.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  65 => 18,  53 => 14,  48 => 11,  44 => 10,  36 => 5,  33 => 4,  30 => 3,  25 => 2,);
    }
}
