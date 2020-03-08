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

/* menu/menuUser.html.twig */
class __TwigTemplate_857213dec373282f6b41e0c4932a83736b9e7d2ee7bbadacb63cf1aaeea887e4 extends \Twig\Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "menu/menuUser.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "menu/menuUser.html.twig"));

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
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl("user_myorders", ["id" => (isset($context["id"]) || array_key_exists("id", $context) ? $context["id"] : (function () { throw new RuntimeError('Variable "id" does not exist.', 7, $this->source); })())]), "html", null, true);
        echo "\">Aktywne wypożyczenia</a>
    </li>

    <li class=\"nav-item\">
        <a class=\"nav-link\" href=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl("user_myfinishedorders", ["id" => (isset($context["id"]) || array_key_exists("id", $context) ? $context["id"] : (function () { throw new RuntimeError('Variable "id" does not exist.', 11, $this->source); })())]), "html", null, true);
        echo "\">Historia wypożyczeń</a>
    </li>

    <li class=\"nav-item\">
        <a class=\"nav-link\" href=\"";
        // line 15
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl("user_myreservations", ["id" => (isset($context["id"]) || array_key_exists("id", $context) ? $context["id"] : (function () { throw new RuntimeError('Variable "id" does not exist.', 15, $this->source); })())]), "html", null, true);
        echo "\">Moje rezerwacje</a>
    </li>

    ";
        // line 18
        if (($this->extensions['App\Twig\UserExtension']->getBasketCount() > 0)) {
            // line 19
            echo "        <li class=\"nav-item\">
            <a href=\"";
            // line 20
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl("basket_index");
            echo "\" class=\"btn btn-outline-primary\" role=\"button\">
                Koszyk <span class=\"badge badge-pill badge-primary\">";
            // line 21
            echo twig_escape_filter($this->env, $this->extensions['App\Twig\UserExtension']->getBasketCount(), "html", null, true);
            echo "</span>
            </a>
        </li>
    ";
        }
        // line 25
        echo "
    <li class=\"nav-item\">
        <a class=\"nav-link\" href=\"";
        // line 27
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl("user_logout");
        echo "\">Wyloguj się</a>
    </li>
</ul>";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "menu/menuUser.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  94 => 27,  90 => 25,  83 => 21,  79 => 20,  76 => 19,  74 => 18,  68 => 15,  61 => 11,  54 => 7,  47 => 3,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<ul class=\"nav nav-pills mb-5\">
    <li class=\"nav-item\">
        <a class=\"nav-link active\" href=\"{{ url('department_index') }}\">Strona główna</a>
    </li>

    <li class=\"nav-item\">
        <a class=\"nav-link\" href=\"{{ url(\"user_myorders\", {\"id\": id}) }}\">Aktywne wypożyczenia</a>
    </li>

    <li class=\"nav-item\">
        <a class=\"nav-link\" href=\"{{ url(\"user_myfinishedorders\", {\"id\": id}) }}\">Historia wypożyczeń</a>
    </li>

    <li class=\"nav-item\">
        <a class=\"nav-link\" href=\"{{ url(\"user_myreservations\", {\"id\": id}) }}\">Moje rezerwacje</a>
    </li>

    {% if basketCount() > 0 %}
        <li class=\"nav-item\">
            <a href=\"{{ url(\"basket_index\") }}\" class=\"btn btn-outline-primary\" role=\"button\">
                Koszyk <span class=\"badge badge-pill badge-primary\">{{ basketCount() }}</span>
            </a>
        </li>
    {% endif %}

    <li class=\"nav-item\">
        <a class=\"nav-link\" href=\"{{ url('user_logout') }}\">Wyloguj się</a>
    </li>
</ul>", "menu/menuUser.html.twig", "/Users/wiktorpieklik/bd2/templates/menu/menuUser.html.twig");
    }
}
