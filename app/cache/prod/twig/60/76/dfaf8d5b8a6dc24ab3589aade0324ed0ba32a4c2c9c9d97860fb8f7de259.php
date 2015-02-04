<?php

/* OCPlatformBundle:Advert:translation.html.twig */
class __TwigTemplate_6076dfaf8d5b8a6dc24ab3589aade0324ed0ba32a4c2c9c9d97860fb8f7de259 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<html>
  <body>
    ";
        // line 3
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Hello"), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, (isset($context["name"]) ? $context["name"] : null), "html", null, true);
        echo "!
  </body>
</html>";
    }

    public function getTemplateName()
    {
        return "OCPlatformBundle:Advert:translation.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  23 => 3,  19 => 1,);
    }
}
