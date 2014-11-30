<?php

/* MywebDataBundle:Data:index.html.twig */
class __TwigTemplate_2042f907a1a3fd85a5d11cc4c9fba0f27cda8c4dfd7a8688f4348e1787583308 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("MywebDataBundle:Layout:base.html.twig");

        $this->blocks = array(
            'js' => array($this, 'block_js'),
            'main' => array($this, 'block_main'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "MywebDataBundle:Layout:base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $context["pageTitle"] = "数据查询";
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_js($context, array $blocks = array())
    {
        // line 4
        echo "<script type=\"text/javascript\">
    \$(function(){
    \$(\"#list\").jqGrid({
    // datatype: 'xmlhttp://localhost/jqgrid/jqgrid.php?page=1&rows=10&sidx=1&sord=ASC',
           url: \"";
        // line 8
        echo $this->env->getExtension('routing')->getPath("myweb_data_getTempList");
        echo "\",
            datatype:'json',
            mtype: 'POST',
            colNames:['Inv No', 'Date', 'Amount', 'Tax', 'Total', 'Notes'],
            colModel :[
            {name:'name', width:55},
            {name:'pwd', width:90},
            {name:'cttime', width:80, align:'right'},
            {name:'email', width:80, align:'right'},
            {name:'birthday', width:80, align:'right'},
            {name:'hobby', width:150, sortable:false}
            ],
        pager: \"#pager\",
        rownumbers:true,
        rowNum:1000000,
        rowList: [10, 20, 30],
        sortname: \"id\",
        sortorder: \"desc\",
        viewrecords: true,
        gridview: true,
        autoencode: true,
        caption: \"request data\",
        height:\"auto\",
        autowidth:true,
        jsonReader: {
                        root: \"rows\",
                        page: \"page\",
                        total: \"total\",
                        records: \"records\",
                        repeatitems: false,
                        id: \"0\"
                    }

    });
            });
</script>
";
    }

    // line 45
    public function block_main($context, array $blocks = array())
    {
        // line 46
        echo "<table id=\"list\"><tr><td/></tr></table>
<div id=\"pager\"></div>
";
    }

    public function getTemplateName()
    {
        return "MywebDataBundle:Data:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  84 => 46,  81 => 45,  40 => 8,  34 => 4,  31 => 3,  26 => 1,);
    }
}
