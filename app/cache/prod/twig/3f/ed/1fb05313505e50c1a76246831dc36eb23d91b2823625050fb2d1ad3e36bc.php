<?php

/* ::layout.html.twig */
class __TwigTemplate_3fed1fb05313505e50c1a76246831dc36eb23d91b2823625050fb2d1ad3e36bc extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'body' => array($this, 'block_body'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 2
        echo "
<!DOCTYPE html>
<html>
<head>
  <meta charset=\"utf-8\">
  <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">

  <title>";
        // line 9
        $this->displayBlock('title', $context, $blocks);
        echo "</title>

  ";
        // line 11
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 15
        echo "  
  <script>
        global = {
            locale   : '";
        // line 18
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "locale", array()), "html", null, true);
        echo "'
        }
  </script>
</head>

<body>
    ";
        // line 24
        if ($this->env->getExtension('security')->isGranted("IS_AUTHENTICATED_REMEMBERED")) {
            echo "      
        ";
            // line 25
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("site.user.login", array("%login%" => $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "username", array()))), "html", null, true);
            echo "- <a href=\"";
            echo $this->env->getExtension('routing')->getPath("fos_user_security_logout");
            echo "\">Déconnexion</a>
    ";
        } else {
            // line 27
            echo "        <a href=\"";
            echo $this->env->getExtension('routing')->getPath("fos_user_security_login");
            echo "\">Connexion</a>
    ";
        }
        // line 29
        echo "  <div class=\"container\">
    <div id=\"header\" class=\"jumbotron\">
      <h1>";
        // line 31
        echo $this->env->getExtension('translator')->getTranslator()->trans("site.titre", array(), "messages");
        echo "</h1>
      
      <p>";
        // line 33
        echo $this->env->getExtension('translator')->getTranslator()->trans("site.devise", array(), "messages");
        echo "</p>
      <p>
        <a class=\"btn btn-primary btn-lg\" href=\"http://fr.openclassrooms.com/informatique/cours/developpez-votre-site-web-avec-le-framework-symfony2\">
          Participer au MOOC »
        </a>
      </p>
    </div>
Aujourd'hui nous sommes le ";
        // line 40
        echo twig_escape_filter($this->env, twig_localized_date_filter($this->env, "now", "full", "none"), "html", null, true);
        echo " et il est ";
        echo twig_escape_filter($this->env, twig_localized_date_filter($this->env, "now", "none", "short"), "html", null, true);
        echo "
    <div class=\"row\">
      <div id=\"menu\" class=\"col-md-3\">
        <h3>Les annonces</h3>
        <ul class=\"nav nav-pills nav-stacked\">
          <li><a href=\"";
        // line 45
        echo $this->env->getExtension('routing')->getPath("oc_platform_home");
        echo "\">Accueil</a></li>
          ";
        // line 48
        echo "          ";
        // line 49
        echo "            <li><a href=\"";
        echo $this->env->getExtension('routing')->getPath("oc_platform_add");
        echo "\">Ajouter une annonce</a></li>
          ";
        // line 51
        echo "        </ul>

        <h4>Dernières annonces</h4>
        ";
        // line 54
        echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('http_kernel')->controller("OCPlatformBundle:Advert:menu", array("limit" => 3)));
        echo "
      </div>
      <div id=\"content\" class=\"col-md-9\">
        ";
        // line 57
        $this->displayBlock('body', $context, $blocks);
        // line 59
        echo "      </div>
    </div>

    <hr>

    <footer>
      <p>The sky's the limit © ";
        // line 65
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, "now", "Y"), "html", null, true);
        echo " and beyond.</p>
    </footer>
  </div>

  ";
        // line 69
        $this->displayBlock('javascripts', $context, $blocks);
        // line 80
        echo "
</body>
</html>";
    }

    // line 9
    public function block_title($context, array $blocks = array())
    {
        echo "OC Plateforme";
    }

    // line 11
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 12
        echo "    ";
        // line 13
        echo "    <link rel=\"stylesheet\" href=\"//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css\">
  ";
    }

    // line 57
    public function block_body($context, array $blocks = array())
    {
        // line 58
        echo "        ";
    }

    // line 69
    public function block_javascripts($context, array $blocks = array())
    {
        // line 70
        echo "    ";
        // line 71
        echo "    <script src=\"//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js\"></script>
    <script src=\"//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js\"></script>
    ";
        // line 73
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "766634f_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_766634f_0") : $this->env->getExtension('assets')->getAssetUrl("js/766634f_part_1_fonction_1.js");
            // line 77
            echo "       <script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : null), "html", null, true);
            echo "\" ></script>
     ";
            // asset "766634f_1"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_766634f_1") : $this->env->getExtension('assets')->getAssetUrl("js/766634f_part_1_jquery-2.1.3.min_2.js");
            echo "       <script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : null), "html", null, true);
            echo "\" ></script>
     ";
            // asset "766634f_2"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_766634f_2") : $this->env->getExtension('assets')->getAssetUrl("js/766634f_part_1_jquery-ui.min_3.js");
            echo "       <script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : null), "html", null, true);
            echo "\" ></script>
     ";
            // asset "766634f_3"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_766634f_3") : $this->env->getExtension('assets')->getAssetUrl("js/766634f_ckeditor_2.js");
            echo "       <script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : null), "html", null, true);
            echo "\" ></script>
     ";
        } else {
            // asset "766634f"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_766634f") : $this->env->getExtension('assets')->getAssetUrl("js/766634f.js");
            echo "       <script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : null), "html", null, true);
            echo "\" ></script>
     ";
        }
        unset($context["asset_url"]);
        // line 78
        echo " 
  ";
    }

    public function getTemplateName()
    {
        return "::layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  214 => 78,  182 => 77,  178 => 73,  174 => 71,  172 => 70,  169 => 69,  165 => 58,  162 => 57,  157 => 13,  155 => 12,  152 => 11,  146 => 9,  140 => 80,  138 => 69,  131 => 65,  123 => 59,  121 => 57,  115 => 54,  110 => 51,  105 => 49,  103 => 48,  99 => 45,  89 => 40,  79 => 33,  74 => 31,  70 => 29,  64 => 27,  57 => 25,  53 => 24,  44 => 18,  39 => 15,  37 => 11,  32 => 9,  23 => 2,);
    }
}
