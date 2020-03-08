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

/* basket/index.html.twig */
class __TwigTemplate_c1baf115592217885ccc9c855a4172e06cafe1c58db655c0cdc539649c8b4095 extends \Twig\Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "basket/index.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "basket/index.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "basket/index.html.twig", 1);
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
            <div class=\"col-6\">
                <h2>Koszyk</h2>
            </div>
        <div class=\"form-group col-7\">
            <h5>Wybrana stacja: ";
        // line 9
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["equipments"]) || array_key_exists("equipments", $context) ? $context["equipments"] : (function () { throw new RuntimeError('Variable "equipments" does not exist.', 9, $this->source); })()), 0, [], "array", false, false, false, 9), "department", [], "any", false, false, false, 9), "address", [], "any", false, false, false, 9), "html", null, true);
        echo "</h5>
        </div>
            <div class=\"col-2\">
                <!-- Button trigger modal -->
                <button type=\"button\" class=\"btn btn-primary btn-sm\" data-toggle=\"modal\" data-target=\"#orderModal\">
                    Złóż zamówienie
                </button>
            </div>
            <div class=\"col-1\">
                <!-- Button trigger modal -->
                <button type=\"button\" class=\"btn btn-info btn-sm\" data-toggle=\"modal\" data-target=\"#reservationModal\">
                    Zarezerwuj
                </button>
            </div>
            <div class=\"col-2\">
                <!-- Button trigger modal -->
                <button type=\"button\" class=\"btn btn-danger btn-sm\" data-toggle=\"modal\" data-target=\"#emptyBasket\">
                    Opróżnij koszyk
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
                    Czy na pewno chcesz złożyć zamówienie na ";
        // line 41
        echo twig_escape_filter($this->env, $this->extensions['App\Twig\UserExtension']->getBasketCount(), "html", null, true);
        echo " ";
        echo ((($this->extensions['App\Twig\UserExtension']->getBasketCount() == 1)) ? ("produkt") : ("produktów"));
        echo "?
                </div>
                <div class=\"modal-footer\">
                    <form class=\"float-left mr-2\" action=\"";
        // line 44
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
        // line 62
        echo twig_escape_filter($this->env, $this->extensions['App\Twig\UserExtension']->getBasketCount(), "html", null, true);
        echo " ";
        echo ((($this->extensions['App\Twig\UserExtension']->getBasketCount() == 1)) ? ("produkt") : ("produktów"));
        echo "?
                </div>
                <div class=\"modal-footer\">
                    <form class=\"float-left mr-2\" action=\"";
        // line 65
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl("user_makereservation", ["id" => $this->extensions['App\Twig\UserExtension']->getUserId()]), "html", null, true);
        echo "\" method=\"post\">
                        <button type=\"submit\" class=\"btn btn-primary\">Tak</button>
                    </form>
                    <button type=\"button\" class=\"btn btn-secondary\" data-dismiss=\"modal\">Nie</button>
                </div>
            </div>
        </div>
    </div>

    <div class=\"modal fade\" id=\"emptyBasket\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"exampleModalLabel\" aria-hidden=\"true\">
        <div class=\"modal-dialog\" role=\"document\">
            <div class=\"modal-content\">
                <div class=\"modal-header\">
                    <h5 class=\"modal-title\" id=\"exampleModalLabel\">Opróżnianie koszyka</h5>
                    <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
                    </button>
                </div>
                <div class=\"modal-body\">
                    Czy na pewno chcesz usunąć ";
        // line 83
        echo twig_escape_filter($this->env, $this->extensions['App\Twig\UserExtension']->getBasketCount(), "html", null, true);
        echo " ";
        echo ((($this->extensions['App\Twig\UserExtension']->getBasketCount() == 1)) ? ("pozycję") : ("pozycji"));
        echo " z koszyka?
                </div>
                <div class=\"modal-footer\">
                    <form class=\"float-left mr-2\" action=\"";
        // line 86
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl("user_emptybasket", ["id" => $this->extensions['App\Twig\UserExtension']->getUserId()]), "html", null, true);
        echo "\" method=\"post\">
                        <button type=\"submit\" class=\"btn btn-primary\">Tak</button>
                    </form>
                    <button type=\"button\" class=\"btn btn-secondary\" data-dismiss=\"modal\">Nie</button>
                </div>
            </div>
        </div>
    </div>

    ";
        // line 95
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["equipments"]) || array_key_exists("equipments", $context) ? $context["equipments"] : (function () { throw new RuntimeError('Variable "equipments" does not exist.', 95, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["equipment"]) {
            // line 96
            echo "        <div class=\"card m-md-2\" style=\"width: 67rem;\">
            <div class=\"card-body\">
                <h5 class=\"card-title\">";
            // line 98
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["equipment"], "name", [], "any", false, false, false, 98), "html", null, true);
            echo "</h5>
                <p class=\"card-text\">";
            // line 99
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["equipment"], "description", [], "any", false, false, false, 99), "html", null, true);
            echo "</p>
            </div>
            <ul class=\"list-group list-group-flush\">
                <li class=\"list-group-item font-weight-light\">Rodzaj: ";
            // line 102
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["equipment"], "type", [], "any", false, false, false, 102), "type", [], "any", false, false, false, 102), "html", null, true);
            echo "</li>
                <li class=\"list-group-item\">Cena za dzień: ";
            // line 103
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["equipment"], "price", [], "any", false, false, false, 103), "html", null, true);
            echo " zł</li>
                <li class=\"list-group-item\">Przebieg: ";
            // line 104
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["equipment"], "milleage", [], "any", false, false, false, 104), "html", null, true);
            echo " km</li>
            </ul>
            <div class=\"card-body\">
                    <form class=\"float-left mr-2\" action=\"";
            // line 107
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl("basket_delete", ["id" => twig_get_attribute($this->env, $this->source, $context["equipment"], "id", [], "any", false, false, false, 107)]), "html", null, true);
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
        return "basket/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  221 => 107,  215 => 104,  211 => 103,  207 => 102,  201 => 99,  197 => 98,  193 => 96,  189 => 95,  177 => 86,  169 => 83,  148 => 65,  140 => 62,  119 => 44,  111 => 41,  76 => 9,  68 => 3,  58 => 2,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'base.html.twig' %}
{% block body %}
    <div class=\"container\">
        <div class=\"row\">
            <div class=\"col-6\">
                <h2>Koszyk</h2>
            </div>
        <div class=\"form-group col-7\">
            <h5>Wybrana stacja: {{ equipments[0].department.address }}</h5>
        </div>
            <div class=\"col-2\">
                <!-- Button trigger modal -->
                <button type=\"button\" class=\"btn btn-primary btn-sm\" data-toggle=\"modal\" data-target=\"#orderModal\">
                    Złóż zamówienie
                </button>
            </div>
            <div class=\"col-1\">
                <!-- Button trigger modal -->
                <button type=\"button\" class=\"btn btn-info btn-sm\" data-toggle=\"modal\" data-target=\"#reservationModal\">
                    Zarezerwuj
                </button>
            </div>
            <div class=\"col-2\">
                <!-- Button trigger modal -->
                <button type=\"button\" class=\"btn btn-danger btn-sm\" data-toggle=\"modal\" data-target=\"#emptyBasket\">
                    Opróżnij koszyk
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
                    Czy na pewno chcesz złożyć zamówienie na {{ basketCount() }} {{ basketCount() == 1? \"produkt\": \"produktów\" }}?
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

    <div class=\"modal fade\" id=\"emptyBasket\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"exampleModalLabel\" aria-hidden=\"true\">
        <div class=\"modal-dialog\" role=\"document\">
            <div class=\"modal-content\">
                <div class=\"modal-header\">
                    <h5 class=\"modal-title\" id=\"exampleModalLabel\">Opróżnianie koszyka</h5>
                    <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
                    </button>
                </div>
                <div class=\"modal-body\">
                    Czy na pewno chcesz usunąć {{ basketCount() }} {{ basketCount() == 1? \"pozycję\": \"pozycji\" }} z koszyka?
                </div>
                <div class=\"modal-footer\">
                    <form class=\"float-left mr-2\" action=\"{{ url(\"user_emptybasket\", {\"id\": getUserId()}) }}\" method=\"post\">
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
{% endblock %}", "basket/index.html.twig", "/Users/wiktorpieklik/bd2/templates/basket/index.html.twig");
    }
}
