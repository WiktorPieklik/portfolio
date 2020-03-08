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

/* basket/damageReportBody.html.twig */
class __TwigTemplate_81e9414b19eb02bb8b60ec5507a8ed7c207f7e6deb08ea5bbecf00ed371d0c99 extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "basket/damageReportBody.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "basket/damageReportBody.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "basket/damageReportBody.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 2
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 3
        echo "    <div class=\"container\">
        <div class=\"row\">
            <div class=\"col-8\">
                <h2>Koszyk</h2>
            </div>
            <div class=\"col-2\">
                <!-- Button trigger modal -->
                <button type=\"button\" class=\"btn btn-primary btn-sm\" data-toggle=\"modal\" data-target=\"#orderModal\">
                    Złóż zamówienie
                </button>
            </div>
            <div class=\"col-2\">
                <!-- Button trigger modal -->
                <button type=\"button\" class=\"btn btn-info btn-sm\" data-toggle=\"modal\" data-target=\"#reservationModal\">
                    Zarezerwuj
                </button>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class=\"modal fade\" id=\"orderModal\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"exampleModalLabel\" aria-hidden=\"true\">
        <div class=\"modal-dialog\" role=\"document\">
            <div class=\"modal-content\">
                <div class=\"modal-header\">
                    <h5 class=\"modal-title\" id=\"exampleModalLabel\">Składanie zamówienia</h5>
                    <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
                    </button>
                </div>
                <div class=\"modal-body\">
                    Czy na pewno chcesz złożyć ofertę na ";
        // line 32
        echo twig_escape_filter($this->env, $this->extensions['App\Twig\UserExtension']->getBasketCount(), "html", null, true);
        echo " ";
        echo ((($this->extensions['App\Twig\UserExtension']->getBasketCount() == 1)) ? ("produkt") : ("produktów"));
        echo "?
                </div>
                <div class=\"modal-footer\">
                    <form class=\"float-left mr-2\" action=\"";
        // line 35
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl("user_makeorder", ["id" => $this->extensions['App\Twig\UserExtension']->getUserId()]), "html", null, true);
        echo "\" method=\"post\">
                        <button type=\"submit\" class=\"btn btn-primary\">Tak</button>
                    </form>
                    <button type=\"button\" class=\"btn btn-secondary\" data-dismiss=\"modal\">Nie</button>
                </div>
            </div>
        </div>
    </div>

    <div class=\"modal fade\" id=\"reservationModal\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"exampleModalLabel\" aria-hidden=\"true\">
        <div class=\"modal-dialog\" role=\"document\">
            <div class=\"modal-content\">
                <div class=\"modal-header\">
                    <h5 class=\"modal-title\" id=\"exampleModalLabel2\">Rezerwacja</h5>
                    <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
                    </button>
                </div>
                <div class=\"modal-body\">
                    Czy na pewno chcesz zarezerwować ";
        // line 53
        echo twig_escape_filter($this->env, $this->extensions['App\Twig\UserExtension']->getBasketCount(), "html", null, true);
        echo " ";
        echo ((($this->extensions['App\Twig\UserExtension']->getBasketCount() == 1)) ? ("produkt") : ("produktów"));
        echo "?
                </div>
                <div class=\"modal-footer\">
                    <form class=\"float-left mr-2\" action=\"";
        // line 56
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl("user_makereservation", ["id" => $this->extensions['App\Twig\UserExtension']->getUserId()]), "html", null, true);
        echo "\" method=\"post\">
                        <button type=\"submit\" class=\"btn btn-primary\">Tak</button>
                    </form>
                    <button type=\"button\" class=\"btn btn-secondary\" data-dismiss=\"modal\">Nie</button>
                </div>
            </div>
        </div>
    </div>

    ";
        // line 65
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["equipments"]) || array_key_exists("equipments", $context) ? $context["equipments"] : (function () { throw new RuntimeError('Variable "equipments" does not exist.', 65, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["equipment"]) {
            // line 66
            echo "        <div class=\"card m-md-2\" style=\"width: 67rem;\">
            <div class=\"card-body\">
                <h5 class=\"card-title\">";
            // line 68
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["equipment"], "name", [], "any", false, false, false, 68), "html", null, true);
            echo "</h5>
                <p class=\"card-text\">";
            // line 69
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["equipment"], "description", [], "any", false, false, false, 69), "html", null, true);
            echo "</p>
            </div>
            <ul class=\"list-group list-group-flush\">
                <li class=\"list-group-item font-weight-light\">Rodzaj: ";
            // line 72
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["equipment"], "type", [], "any", false, false, false, 72), "type", [], "any", false, false, false, 72), "html", null, true);
            echo "</li>
                <li class=\"list-group-item\">Cena za dzień: ";
            // line 73
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["equipment"], "price", [], "any", false, false, false, 73), "html", null, true);
            echo " zł</li>
                <li class=\"list-group-item\">Przebieg: ";
            // line 74
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["equipment"], "milleage", [], "any", false, false, false, 74), "html", null, true);
            echo " km</li>
            </ul>
            <div class=\"card-body\">
                    <form class=\"float-left mr-2\" action=\"";
            // line 77
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl("basket_delete", ["id" => twig_get_attribute($this->env, $this->source, $context["equipment"], "id", [], "any", false, false, false, 77)]), "html", null, true);
            echo "\" method=\"post\">
                        <button type=\"submit\" class=\"btn btn-outline-danger\">Usuń z listy</button>
                    </form>
            </div>
        </div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['equipment'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "basket/damageReportBody.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  180 => 77,  174 => 74,  170 => 73,  166 => 72,  160 => 69,  156 => 68,  152 => 66,  148 => 65,  136 => 56,  128 => 53,  107 => 35,  99 => 32,  68 => 3,  58 => 2,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'base.html.twig' %}
{% block body %}
    <div class=\"container\">
        <div class=\"row\">
            <div class=\"col-8\">
                <h2>Koszyk</h2>
            </div>
            <div class=\"col-2\">
                <!-- Button trigger modal -->
                <button type=\"button\" class=\"btn btn-primary btn-sm\" data-toggle=\"modal\" data-target=\"#orderModal\">
                    Złóż zamówienie
                </button>
            </div>
            <div class=\"col-2\">
                <!-- Button trigger modal -->
                <button type=\"button\" class=\"btn btn-info btn-sm\" data-toggle=\"modal\" data-target=\"#reservationModal\">
                    Zarezerwuj
                </button>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class=\"modal fade\" id=\"orderModal\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"exampleModalLabel\" aria-hidden=\"true\">
        <div class=\"modal-dialog\" role=\"document\">
            <div class=\"modal-content\">
                <div class=\"modal-header\">
                    <h5 class=\"modal-title\" id=\"exampleModalLabel\">Składanie zamówienia</h5>
                    <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
                    </button>
                </div>
                <div class=\"modal-body\">
                    Czy na pewno chcesz złożyć ofertę na {{ basketCount() }} {{ basketCount() == 1? \"produkt\": \"produktów\" }}?
                </div>
                <div class=\"modal-footer\">
                    <form class=\"float-left mr-2\" action=\"{{ url(\"user_makeorder\", {\"id\": getUserId()}) }}\" method=\"post\">
                        <button type=\"submit\" class=\"btn btn-primary\">Tak</button>
                    </form>
                    <button type=\"button\" class=\"btn btn-secondary\" data-dismiss=\"modal\">Nie</button>
                </div>
            </div>
        </div>
    </div>

    <div class=\"modal fade\" id=\"reservationModal\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"exampleModalLabel\" aria-hidden=\"true\">
        <div class=\"modal-dialog\" role=\"document\">
            <div class=\"modal-content\">
                <div class=\"modal-header\">
                    <h5 class=\"modal-title\" id=\"exampleModalLabel2\">Rezerwacja</h5>
                    <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
                    </button>
                </div>
                <div class=\"modal-body\">
                    Czy na pewno chcesz zarezerwować {{ basketCount() }} {{ basketCount() == 1? \"produkt\": \"produktów\" }}?
                </div>
                <div class=\"modal-footer\">
                    <form class=\"float-left mr-2\" action=\"{{ url(\"user_makereservation\", {\"id\": getUserId()}) }}\" method=\"post\">
                        <button type=\"submit\" class=\"btn btn-primary\">Tak</button>
                    </form>
                    <button type=\"button\" class=\"btn btn-secondary\" data-dismiss=\"modal\">Nie</button>
                </div>
            </div>
        </div>
    </div>

    {% for equipment in equipments %}
        <div class=\"card m-md-2\" style=\"width: 67rem;\">
            <div class=\"card-body\">
                <h5 class=\"card-title\">{{ equipment.name }}</h5>
                <p class=\"card-text\">{{ equipment.description }}</p>
            </div>
            <ul class=\"list-group list-group-flush\">
                <li class=\"list-group-item font-weight-light\">Rodzaj: {{ equipment.type.type }}</li>
                <li class=\"list-group-item\">Cena za dzień: {{ equipment.price }} zł</li>
                <li class=\"list-group-item\">Przebieg: {{ equipment.milleage }} km</li>
            </ul>
            <div class=\"card-body\">
                    <form class=\"float-left mr-2\" action=\"{{ url(\"basket_delete\", {\"id\": equipment.id}) }}\" method=\"post\">
                        <button type=\"submit\" class=\"btn btn-outline-danger\">Usuń z listy</button>
                    </form>
            </div>
        </div>
    {% endfor %}
{% endblock %}", "basket/damageReportBody.html.twig", "/Users/wiktorpieklik/bd2/templates/basket/damageReportBody.html.twig");
    }
}
