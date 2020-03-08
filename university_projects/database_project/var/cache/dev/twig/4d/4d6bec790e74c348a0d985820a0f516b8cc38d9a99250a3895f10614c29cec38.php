<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* menu/menuServiceman.html.twig */
class __TwigTemplate_7970ec1fae15631f6350071800b82c2093617740e1807a7f935fa33b0cd25e2c extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "menu/menuServiceman.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "menu/menuServiceman.html.twig"));

        // line 1
        echo "<ul class=\"nav nav-pills mb-3\">
    <li class=\"nav-item\">
        <a class=\"nav-link active\" href=\"";
        // line 3
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl("serviceman_index");
        echo "\">Strona główna</a>
    </li>

    <li class=\"nav-item\">
        <a class=\"nav-link\" href=\"";
        // line 7
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl("serviceman_damagereports");
        echo "\">Przyjęte zgłoszenia awarii</a>
    </li>

    <li class=\"nav-item\">
        <a class=\"nav-link\" href=\"";
        // line 11
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl("serviceman_servicereports");
        echo "\">Przyjęte zlecenia przeglądu</a>
    </li>

    <li class=\"nav-item\">
        <a class=\"nav-link\" href=\"#\">Przyjęte zlecenia przewozu</a>
    </li>

    <li class=\"nav-item\">
        <a class=\"nav-link\" href=\"";
        // line 19
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl("user_logout");
        echo "\">Wyloguj się</a>
    </li>
</ul>";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "menu/menuServiceman.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  72 => 19,  61 => 11,  54 => 7,  47 => 3,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<ul class=\"nav nav-pills mb-3\">
    <li class=\"nav-item\">
        <a class=\"nav-link active\" href=\"{{ url('serviceman_index') }}\">Strona główna</a>
    </li>

    <li class=\"nav-item\">
        <a class=\"nav-link\" href=\"{{ url(\"serviceman_damagereports\") }}\">Przyjęte zgłoszenia awarii</a>
    </li>

    <li class=\"nav-item\">
        <a class=\"nav-link\" href=\"{{ url(\"serviceman_servicereports\") }}\">Przyjęte zlecenia przeglądu</a>
    </li>

    <li class=\"nav-item\">
        <a class=\"nav-link\" href=\"#\">Przyjęte zlecenia przewozu</a>
    </li>

    <li class=\"nav-item\">
        <a class=\"nav-link\" href=\"{{ url('user_logout') }}\">Wyloguj się</a>
    </li>
</ul>", "menu/menuServiceman.html.twig", "/Users/wiktorpieklik/bd2/templates/menu/menuServiceman.html.twig");
    }
}
