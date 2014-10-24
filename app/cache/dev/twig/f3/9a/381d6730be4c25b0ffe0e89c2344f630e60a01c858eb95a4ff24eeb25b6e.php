<?php

/* MywebAdminBundle:UserManage:showGroup.html.twig */
class __TwigTemplate_f39a381d6730be4c25b0ffe0e89c2344f630e60a01c858eb95a4ff24eeb25b6e extends Twig_Template
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
    \$(function() {

    });
</script>
";
    }

    // line 10
    public function block_main($context, array $blocks = array())
    {
        // line 11
        echo "<div class=\"list\">
    <table class=\"table table-bordered table-hover\">
        <tr class=\"active\"><td>组名</td><td>权限</td><td>描述</td><td>操作</td></tr>
    ";
        // line 14
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["groupsList"]) ? $context["groupsList"] : $this->getContext($context, "groupsList")));
        foreach ($context['_seq'] as $context["_key"] => $context["group"]) {
            // line 15
            echo "        <tr><td>";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["group"]) ? $context["group"] : $this->getContext($context, "group")), "name"), "html", null, true);
            echo "</td><td>";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["group"]) ? $context["group"] : $this->getContext($context, "group")), "permission"), "html", null, true);
            echo "</td>
            <td>";
            // line 16
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["group"]) ? $context["group"] : $this->getContext($context, "group")), "description"), "html", null, true);
            echo "</td><td><a href=\"
";
            // line 17
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("myweb_admin_delGroupPer", array("group" => $this->getAttribute((isset($context["group"]) ? $context["group"] : $this->getContext($context, "group")), "groupId"), "permission" => $this->getAttribute((isset($context["group"]) ? $context["group"] : $this->getContext($context, "group")), "permissionId"))), "html", null, true);
            echo "\">删除</a></td></tr>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['group'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 19
        echo "    </table>
</div>
<div > 
    <form class=\"form-inline\" role=\"form\">
        <select class=\"form-control\">
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
        </select>
        分配为：
          <select class=\"form-control\">
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
        </select>
         <button type=\"submit\" class=\"btn btn-default\">确定</button>
    </form>
</div>
";
    }

    public function getTemplateName()
    {
        return "MywebAdminBundle:UserManage:showGroup.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  74 => 19,  66 => 17,  62 => 16,  55 => 15,  51 => 14,  46 => 11,  43 => 10,  34 => 4,  31 => 3,  26 => 2,);
    }
}
