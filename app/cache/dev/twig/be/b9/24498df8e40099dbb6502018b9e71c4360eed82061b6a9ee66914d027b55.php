<?php

/* MywebAdminBundle:UserManage:addUser.html.twig */
class __TwigTemplate_beb924498df8e40099dbb6502018b9e71c4360eed82061b6a9ee66914d027b55 extends Twig_Template
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
        $context["pageTitle"] = "添加用户";
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_main($context, array $blocks = array())
    {
        // line 4
        echo "<div class=\"main_form\">
    <form role=\"form\" action=\"";
        // line 5
        echo $this->env->getExtension('routing')->getPath("myweb_admin_doAddUser");
        echo "\" method=\"post\">
        <div class=\"form-group\">
            <label >username</label>
            <input name=\"username\"type=\"text\" placeholder=\"username\"/>
        </div>
        <div class=\"form-group\">
            <label>password</label>
            <input type=\"password\" name=\"password\" placeholder=\"password\"/>
        </div>
        <div class=\"form-group\">
            <label>email</label>
            <input type=\"text\" name=\"email\" placeholder=\"email\"/>
        </div>
                 ";
        // line 18
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["groupsList"]) ? $context["groupsList"] : $this->getContext($context, "groupsList")));
        foreach ($context['_seq'] as $context["_key"] => $context["group"]) {
            // line 19
            echo "        <div class=\"form-group\">
            <div class=\"checkbox\">
                <label>
                    <input type=\"checkbox\" name=\"groups[]\" value=\"";
            // line 22
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["group"]) ? $context["group"] : $this->getContext($context, "group")), "id"), "html", null, true);
            echo "\"/> ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["group"]) ? $context["group"] : $this->getContext($context, "group")), "name"), "html", null, true);
            echo "
                </label>
            </div>   
                 ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['group'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 26
        echo "        </div>
        <button type=\"submit\" class=\"btn btn-default\">Submit</button>
    </form>
</div>
";
    }

    public function getTemplateName()
    {
        return "MywebAdminBundle:UserManage:addUser.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  73 => 26,  61 => 22,  56 => 19,  52 => 18,  36 => 5,  33 => 4,  30 => 3,  25 => 2,);
    }
}
