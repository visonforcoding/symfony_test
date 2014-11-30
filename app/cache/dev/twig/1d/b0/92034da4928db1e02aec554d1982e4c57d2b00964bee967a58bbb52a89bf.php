<?php

/* MywebDataBundle:Layout:base.html.twig */
class __TwigTemplate_1db092034da4928db1e02aec554d1982e4c57d2b00964bee967a58bbb52a89bf extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'js' => array($this, 'block_js'),
            'main' => array($this, 'block_main'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
        <title>";
        // line 4
        echo twig_escape_filter($this->env, (isset($context["pageTitle"]) ? $context["pageTitle"] : $this->getContext($context, "pageTitle")), "html", null, true);
        echo "</title>
        <meta charset=\"UTF-8\">
        <meta name=\"viewport\" content=\"width=device-width\">   
<link rel=\"stylesheet\" type=\"text/css\" media=\"screen\" href=\"";
        // line 7
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/css/jquery-ui-1.7.3.custom.css"), "html", null, true);
        echo "\" />
<link rel=\"stylesheet\" type=\"text/css\" media=\"screen\" href=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/css/ui.jqgrid.css"), "html", null, true);
        echo "\" />
<script type=\"text/javascript\" src=\"http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js\"></script>
<script type=\"text/javascript\" src=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/js/i18n/grid.locale-cn.js"), "html", null, true);
        echo "\"></script>
<script type=\"text/javascript\" src=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/js/jquery.jqGrid.min.js"), "html", null, true);
        echo "\"></script>
 ";
        // line 12
        $this->displayBlock('js', $context, $blocks);
        // line 13
        echo "    </head>
    <body>
        <div id=\"main\">
            ";
        // line 16
        $this->displayBlock('main', $context, $blocks);
        // line 18
        echo "        </div>
    </body>
</html>

";
    }

    // line 12
    public function block_js($context, array $blocks = array())
    {
    }

    // line 16
    public function block_main($context, array $blocks = array())
    {
        // line 17
        echo "            ";
    }

    public function getTemplateName()
    {
        return "MywebDataBundle:Layout:base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  74 => 17,  71 => 16,  66 => 12,  58 => 18,  56 => 16,  51 => 13,  49 => 12,  45 => 11,  41 => 10,  36 => 8,  32 => 7,  26 => 4,  21 => 1,);
    }
}
