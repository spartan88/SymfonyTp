<?php

/* OCPlatformBundle::layout.html.twig */
class __TwigTemplate_4a9d9001e69fe4fa5a6362d4fabdcec9e5a33b0e7dc48de006be52c82a8fc7cd extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 3
        try {
            $this->parent = $this->env->loadTemplate("::layout.html.twig");
        } catch (Twig_Error_Loader $e) {
            $e->setTemplateFile($this->getTemplateName());
            $e->setTemplateLine(3);

            throw $e;
        }

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
            'ocplatform_body' => array($this, 'block_ocplatform_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 5
    public function block_title($context, array $blocks = array())
    {
        // line 6
        echo "  Annonces - ";
        $this->displayParentBlock("title", $context, $blocks);
        echo "
";
    }

    // line 9
    public function block_body($context, array $blocks = array())
    {
        // line 10
        echo "
  ";
        // line 12
        echo "  <h1>";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Annonces"), "html", null, true);
        echo "</h1>
  
  <hr>

  ";
        // line 17
        echo "  ";
        $this->displayBlock('ocplatform_body', $context, $blocks);
    }

    public function block_ocplatform_body($context, array $blocks = array())
    {
        // line 18
        echo "  ";
    }

    public function getTemplateName()
    {
        return "OCPlatformBundle::layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  69 => 18,  62 => 17,  54 => 12,  51 => 10,  48 => 9,  41 => 6,  38 => 5,  11 => 3,);
    }
}
