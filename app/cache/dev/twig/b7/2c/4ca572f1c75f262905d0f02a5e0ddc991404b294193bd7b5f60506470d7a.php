<?php

/* ::base.html.twig */
class __TwigTemplate_b72c4ca572f1c75f262905d0f02a5e0ddc991404b294193bd7b5f60506470d7a extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'stylesheets' => array($this, 'block_stylesheets'),
            'js' => array($this, 'block_js'),
            'body' => array($this, 'block_body'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />
        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0\" />    
        <meta charset=\"UTF-8\" />
        <title>";
        // line 7
        echo twig_escape_filter($this->env, (isset($context["pageTitle"]) ? $context["pageTitle"] : $this->getContext($context, "pageTitle")), "html", null, true);
        echo "</title>
         <!-- 最新 Bootstrap 核心 CSS 文件 -->
<link rel=\"stylesheet\" href=\"//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css\">
<!-- 可选的Bootstrap主题文件（一般不用引入） -->
<link rel=\"stylesheet\" href=\"//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap-theme.min.css\">
<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
<script type=\"text/javascript\" src=\"";
        // line 13
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/js/jquery-1.7.2.min.js"), "html", null, true);
        echo "\"></script>
<script src=\"//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js\"></script>
<link rel=\"stylesheet\" type=\"text/css\" media=\"screen\" href=\"";
        // line 15
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/css/jquery-ui-1.7.3.custom.css"), "html", null, true);
        echo "\" />
<link rel=\"stylesheet\" type=\"text/css\" media=\"screen\" href=\"";
        // line 16
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/css/ui.jqgrid.css"), "html", null, true);
        echo "\" />
<script type=\"text/javascript\" src=\"";
        // line 17
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/js/i18n/grid.locale-cn.js"), "html", null, true);
        echo "\"></script>
<script type=\"text/javascript\" src=\"";
        // line 18
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/js/jquery.jqGrid.min.js"), "html", null, true);
        echo "\"></script>
   <link href=\"";
        // line 19
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/css/admin.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" />
        ";
        // line 20
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 21
        echo "        ";
        $this->displayBlock('js', $context, $blocks);
        // line 22
        echo "    </head>
    <body>
        ";
        // line 24
        $this->displayBlock('body', $context, $blocks);
        // line 25
        echo "        ";
        $this->displayBlock('javascripts', $context, $blocks);
        // line 26
        echo "    </body>
</html>";
    }

    // line 20
    public function block_stylesheets($context, array $blocks = array())
    {
    }

    // line 21
    public function block_js($context, array $blocks = array())
    {
        echo " ";
    }

    // line 24
    public function block_body($context, array $blocks = array())
    {
    }

    // line 25
    public function block_javascripts($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "::base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  100 => 25,  95 => 24,  89 => 21,  84 => 20,  79 => 26,  76 => 25,  74 => 24,  70 => 22,  67 => 21,  65 => 20,  61 => 19,  57 => 18,  53 => 17,  49 => 16,  45 => 15,  40 => 13,  31 => 7,  23 => 1,);
    }
}
