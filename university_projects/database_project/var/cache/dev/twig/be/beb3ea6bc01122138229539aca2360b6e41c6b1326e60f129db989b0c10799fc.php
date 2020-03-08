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

/* menu/menuAnonymous.html.twig */
class __TwigTemplate_c544592ef7eacf4571c6b147cd34e392d860e604420a0bd1864380edf2a31193 extends \Twig\Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "menu/menuAnonymous.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "menu/menuAnonymous.html.twig"));

        // line 1
        echo "<ul class=\"nav nav-pills mb-5\">
    <li class=\"nav-item\">
        <a class=\"nav-link active\" href=\"";
        // line 3
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl("department_index");
        echo "\">Strona główna</a>
    </li>

    <li class=\"nav-item\">
        <a class=\"nav-link\" href=\"";
        // line 7
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl("app_login");
        echo "\">Zaloguj się</a>
    </li>

    <li class=\"nav-item\">
        <a class=\"nav-link\" href=\"";
        // line 11
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl("user_register");
        echo "\">Zarejestruj się</a>
    </li>
</ul>";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "menu/menuAnonymous.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  61 => 11,  54 => 7,  47 => 3,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<ul class=\"nav nav-pills mb-5\">
    <li class=\"nav-item\">
        <a class=\"nav-link active\" href=\"{{ url('department_index') }}\">Strona główna</a>
    </li>

    <li class=\"nav-item\">
        <a class=\"nav-link\" href=\"{{ url('app_login') }}\">Zaloguj się</a>
    </li>

    <li class=\"nav-item\">
        <a class=\"nav-link\" href=\"{{ url(\"user_register\") }}\">Zarejestruj się</a>
    </li>
</ul>", "menu/menuAnonymous.html.twig", "/Users/wiktorpieklik/bd2/templates/menu/menuAnonymous.html.twig");
    }
}
