<?php

/* MywebAdminBundle:UserManage:editUser.html.twig */
class __TwigTemplate_8bde3a94003c3ad7a4d670df3e64e0f29bf830aa6385f9ec602ac52ee78e00b0 extends Twig_Template
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
        $context["pageTitle"] = "编辑用户";
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_main($context, array $blocks = array())
    {
        // line 4
        echo "<div class=\"main_form\">
    <form role=\"form\" action=\"";
        // line 5
        echo $this->env->getExtension('routing')->getPath("myweb_admin_doEditUser");
        echo "\" method=\"post\">
        <input name=\"userId\" type=\"hidden\" value=\"";
        // line 6
        echo twig_escape_filter($this->env, (isset($context["userId"]) ? $context["userId"] : $this->getContext($context, "userId")), "html", null, true);
        echo "\"/>
        <div class=\"form-group\">
            <label >username</label>
            <input name=\"username\"type=\"text\" value=\"";
        // line 9
        echo twig_escape_filter($this->env, (isset($context["name"]) ? $context["name"] : $this->getContext($context, "name")), "html", null, true);
        echo "\" placeholder=\"username\"/>
        </div>
       <div class=\"form-group\">
            <label>status</label>
            <input type=\"radio\" name=\"enabled\" ";
        // line 13
        if (((isset($context["enabled"]) ? $context["enabled"] : $this->getContext($context, "enabled")) == "1")) {
            echo " checked=\"true\"";
        }
        echo " value=\"1\" /> enabled
            <input type=\"radio\" name=\"enabled\" value=\"0\" /> unabled
        </div>
        <div class=\"form-group\">
            <label>email</label>
            <input type=\"text\" name=\"email\" value=\"";
        // line 18
        echo twig_escape_filter($this->env, (isset($context["email"]) ? $context["email"] : $this->getContext($context, "email")), "html", null, true);
        echo "\" placeholder=\"email\"/>
        </div>
       ";
        // line 20
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["groups"]) ? $context["groups"] : $this->getContext($context, "groups")));
        foreach ($context['_seq'] as $context["_key"] => $context["group"]) {
            // line 21
            echo "        <div class=\"form-group\">
            <div class=\"checkbox\">
                <label>
                    <input type=\"checkbox\" checked=\"true\" name=\"groups[]\" value=\"";
            // line 24
            echo twig_escape_filter($this->env, (isset($context["group"]) ? $context["group"] : $this->getContext($context, "group")), "html", null, true);
            echo "\"/> ";
            echo twig_escape_filter($this->env, (isset($context["group"]) ? $context["group"] : $this->getContext($context, "group")), "html", null, true);
            echo "
                </label>
            </div>   
          ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['group'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 28
        echo "        ";
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["groupsRest"]) ? $context["groupsRest"] : $this->getContext($context, "groupsRest")));
        foreach ($context['_seq'] as $context["_key"] => $context["groupRest"]) {
            // line 29
            echo "        <div class=\"form-group\">
            <div class=\"checkbox\">
                <label>
                    <input type=\"checkbox\"  name=\"groups[]\" value=\"";
            // line 32
            echo twig_escape_filter($this->env, (isset($context["groupRest"]) ? $context["groupRest"] : $this->getContext($context, "groupRest")), "html", null, true);
            echo "\"/> ";
            echo twig_escape_filter($this->env, (isset($context["groupRest"]) ? $context["groupRest"] : $this->getContext($context, "groupRest")), "html", null, true);
            echo "
                </label>
            </div>   
          ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['groupRest'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 36
        echo "        </div>
        <button type=\"submit\" class=\"btn btn-default\">Submit</button>
    </form>
</div>
";
    }

    public function getTemplateName()
    {
        return "MywebAdminBundle:UserManage:editUser.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  111 => 36,  99 => 32,  94 => 29,  89 => 28,  77 => 24,  72 => 21,  68 => 20,  63 => 18,  53 => 13,  46 => 9,  40 => 6,  36 => 5,  33 => 4,  30 => 3,  25 => 2,);
    }
}
