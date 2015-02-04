<?php

/* OCPlatformBundle:Advert:form.html.twig */
class __TwigTemplate_043dfcd0c80adb1baf5181cfc58c932a92feca1598a4c4fbbd2e36e40d0a4132 extends Twig_Template
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
        // line 2
        echo "
<div class=\"well\">
  ";
        // line 4
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : null), 'form_start', array("attr" => array("class" => "form-horizontal")));
        echo "

    ";
        // line 7
        echo "    ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'errors');
        echo "

    <div class=\"form-group\">
      ";
        // line 11
        echo "      ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "title", array()), 'label', array("label_attr" => array("class" => "col-sm-3 control-label"), "label" => "Titre de l'annonce"));
        echo "

      ";
        // line 14
        echo "      ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "title", array()), 'errors');
        echo "

      <div class=\"col-sm-4\">
        ";
        // line 18
        echo "        ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "title", array()), 'widget', array("attr" => array("class" => "form-control")));
        echo "
      </div>
    </div>

    ";
        // line 23
        echo "    <div class=\"form-group\">
      ";
        // line 24
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "content", array()), 'label', array("label_attr" => array("class" => "col-sm-3 control-label"), "label" => "Contenu de l'annonce"));
        echo "
      ";
        // line 25
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "content", array()), 'errors');
        echo "
      <div class=\"col-sm-4\">
        ";
        // line 27
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "content", array()), 'widget');
        echo "
      </div>
    </div>

";
        // line 39
        echo "   
    <div class=\"form-group\">
        ";
        // line 42
        echo "        ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "user", array()), 'label', array("label_attr" => array("class" => "col-sm-3 control-label"), "label" => "Auteur"));
        echo "
        ";
        // line 43
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "user", array()), 'errors');
        echo "
      <div class=\"col-sm-4\">
        ";
        // line 45
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "user", array()), 'widget', array("attr" => array("class" => "form-control")));
        echo "
      </div>
    </div>
      
";
        // line 57
        echo "      
    <div class=\"form-group\">
        ";
        // line 60
        echo "        ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "image", array()), "file", array()), 'label', array("label_attr" => array("class" => "col-sm-3 control-label"), "label" => "Fichier"));
        echo "
        ";
        // line 61
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "image", array()), "file", array()), 'errors');
        echo "
      <div class=\"col-sm-4\">
        ";
        // line 63
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "image", array()), "file", array()), 'widget');
        echo "
      </div>
    </div>
      
      
    <div class=\"form-group\">
        ";
        // line 70
        echo "        ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "categories", array()), 'label', array("label_attr" => array("class" => "col-sm-3 control-label"), "label" => "Categories"));
        echo "
        ";
        // line 71
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "categories", array()), 'errors');
        echo "
      <div class=\"col-sm-4\">
        ";
        // line 73
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "categories", array()), 'widget', array("attr" => array("class" => "form-control")));
        echo "
      </div>
    </div>


  ";
        // line 79
        echo "  ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "save", array()), 'widget', array("attr" => array("class" => "btn btn-primary")));
        echo "

  ";
        // line 84
        echo "  ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'rest');
        echo "
  

  ";
        // line 88
        echo "  ";
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : null), 'form_end');
        echo "
</div>";
    }

    public function getTemplateName()
    {
        return "OCPlatformBundle:Advert:form.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  150 => 88,  143 => 84,  137 => 79,  129 => 73,  124 => 71,  119 => 70,  110 => 63,  105 => 61,  100 => 60,  96 => 57,  89 => 45,  84 => 43,  79 => 42,  75 => 39,  68 => 27,  63 => 25,  59 => 24,  56 => 23,  48 => 18,  41 => 14,  35 => 11,  28 => 7,  23 => 4,  19 => 2,);
    }
}
