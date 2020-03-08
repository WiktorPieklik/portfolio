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

/* serviceman/serviceBody.html.twig */
class __TwigTemplate_f1d243b9bac130476071fab9dabf2dbedf4ed46781271168399f77abc0ee08da extends \Twig\Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "serviceman/serviceBody.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "serviceman/serviceBody.html.twig"));

        // line 1
        $context["counter"] = 0;
        // line 2
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["serviceReports"]) || array_key_exists("serviceReports", $context) ? $context["serviceReports"] : (function () { throw new RuntimeError('Variable "serviceReports" does not exist.', 2, $this->source); })()));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["report"]) {
            // line 3
            echo "    ";
            $context["counter"] = ((isset($context["counter"]) || array_key_exists("counter", $context) ? $context["counter"] : (function () { throw new RuntimeError('Variable "counter" does not exist.', 3, $this->source); })()) + 1);
            // line 4
            echo "
    ";
            // line 5
            if (((isset($context["counter"]) || array_key_exists("counter", $context) ? $context["counter"] : (function () { throw new RuntimeError('Variable "counter" does not exist.', 5, $this->source); })()) == 1)) {
                // line 6
                echo "        <div class=\"card\" xmlns=\"http://www.w3.org/1999/html\">
            <div class=\"card-header\" id=\"heading";
                // line 7
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["report"], "id", [], "any", false, false, false, 7), "html", null, true);
                echo "\">
                <h2 class=\"mb-0\">
                    <button class=\"btn btn-link\" type=\"button\" data-toggle=\"collapse\" data-target=\"#collapse";
                // line 9
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["report"], "id", [], "any", false, false, false, 9), "html", null, true);
                echo "\" aria-expanded=\"true\" aria-controls=\"collapse";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["report"], "id", [], "any", false, false, false, 9), "html", null, true);
                echo "\">
                        Zlecenie przeglądu #";
                // line 10
                echo twig_escape_filter($this->env, (isset($context["counter"]) || array_key_exists("counter", $context) ? $context["counter"] : (function () { throw new RuntimeError('Variable "counter" does not exist.', 10, $this->source); })()), "html", null, true);
                echo "
                    </button>
                </h2>
            </div>

            <div id=\"collapse";
                // line 15
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["report"], "id", [], "any", false, false, false, 15), "html", null, true);
                echo "\" class=\"collapse show\" aria-labelledby=\"heading";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["report"], "id", [], "any", false, false, false, 15), "html", null, true);
                echo "\" data-parent=\"#accordionExample\">
                <div class=\"card-body\">
                    <h5 class=\"card-title\">";
                // line 17
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["report"], "equipments", [], "any", false, false, false, 17), 0, [], "array", false, false, false, 17), "name", [], "any", false, false, false, 17), "html", null, true);
                echo "</h5>
                    <p class=\"card-text\">";
                // line 18
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["report"], "equipments", [], "any", false, false, false, 18), 0, [], "array", false, false, false, 18), "description", [], "any", false, false, false, 18), "html", null, true);
                echo "</p>
                </div>
                <ul class=\"list-group list-group-flush\">
                    <li class=\"list-group-item font-weight-light\">Rodzaj: ";
                // line 21
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["report"], "equipments", [], "any", false, false, false, 21), 0, [], "array", false, false, false, 21), "type", [], "any", false, false, false, 21), "type", [], "any", false, false, false, 21), "html", null, true);
                echo "</li>
                    <li class=\"list-group-item\">Przebieg: ";
                // line 22
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["report"], "equipments", [], "any", false, false, false, 22), 0, [], "array", false, false, false, 22), "milleage", [], "any", false, false, false, 22), "html", null, true);
                echo " km</li>
                </ul>
                <div class=\"card-body\">
                    <form class=\"form-inline float-right mb-2\" action=\"";
                // line 25
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl("serviceman_assignservice", ["id" => twig_get_attribute($this->env, $this->source, $context["report"], "id", [], "any", false, false, false, 25)]), "html", null, true);
                echo "\" method=\"post\">
                            <button type=\"submit\" class=\"btn btn-outline-success mt-2\">Przyjmij zlecenie</button>
                    </form>
                </div>
            </div>
        </div>
    ";
            } else {
                // line 32
                echo "        <div class=\"card\">
            <div class=\"card-header\" id=\"heading";
                // line 33
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["report"], "id", [], "any", false, false, false, 33), "html", null, true);
                echo "\">
                <h2 class=\"mb-0\">
                    <button class=\"btn btn-link collapsed\" type=\"button\" data-toggle=\"collapse\" data-target=\"#collapse";
                // line 35
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["report"], "id", [], "any", false, false, false, 35), "html", null, true);
                echo "\" aria-expanded=\"false\" aria-controls=\"collapse";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["report"], "id", [], "any", false, false, false, 35), "html", null, true);
                echo "\">
                        Zlecenie przeglądu #";
                // line 36
                echo twig_escape_filter($this->env, (isset($context["counter"]) || array_key_exists("counter", $context) ? $context["counter"] : (function () { throw new RuntimeError('Variable "counter" does not exist.', 36, $this->source); })()), "html", null, true);
                echo "
                    </button>
                </h2>
            </div>
            <div id=\"collapse";
                // line 40
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["report"], "id", [], "any", false, false, false, 40), "html", null, true);
                echo "\" class=\"collapse\" aria-labelledby=\"heading";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["report"], "id", [], "any", false, false, false, 40), "html", null, true);
                echo "\" data-parent=\"#accordionExample\">
                <div class=\"card-body\">
                    <h5 class=\"card-title\">";
                // line 42
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["report"], "equipments", [], "any", false, false, false, 42), 0, [], "array", false, false, false, 42), "name", [], "any", false, false, false, 42), "html", null, true);
                echo "</h5>
                    <p class=\"card-text\">";
                // line 43
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["report"], "equipments", [], "any", false, false, false, 43), 0, [], "array", false, false, false, 43), "description", [], "any", false, false, false, 43), "html", null, true);
                echo "</p>
                </div>
                <ul class=\"list-group list-group-flush\">
                    <li class=\"list-group-item font-weight-light\">Rodzaj: ";
                // line 46
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["report"], "equipments", [], "any", false, false, false, 46), 0, [], "array", false, false, false, 46), "type", [], "any", false, false, false, 46), "type", [], "any", false, false, false, 46), "html", null, true);
                echo "</li>
                    <li class=\"list-group-item\">Przebieg: ";
                // line 47
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["report"], "equipments", [], "any", false, false, false, 47), 0, [], "array", false, false, false, 47), "milleage", [], "any", false, false, false, 47), "html", null, true);
                echo " km</li>
                </ul>
                <div class=\"card-body\">
                    <form class=\"form-inline float-right mb-2\" action=\"";
                // line 50
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl("serviceman_assignservice", ["id" => twig_get_attribute($this->env, $this->source, $context["report"], "id", [], "any", false, false, false, 50)]), "html", null, true);
                echo "\" method=\"post\">
                        <button type=\"submit\" class=\"btn btn-outline-success mt-2\">Przyjmij zlecenie</button>
                    </form>
                </div>
            </div>
        </div>
    ";
            }
            // line 57
            echo "
";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 59
            echo "    <div class=\"alert alert-primary\" role=\"alert\">
        Obecnie nie ma żadnych dostępnych zgłoszeń awarii.</a>
    </div>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['report'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "serviceman/serviceBody.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  181 => 59,  175 => 57,  165 => 50,  159 => 47,  155 => 46,  149 => 43,  145 => 42,  138 => 40,  131 => 36,  125 => 35,  120 => 33,  117 => 32,  107 => 25,  101 => 22,  97 => 21,  91 => 18,  87 => 17,  80 => 15,  72 => 10,  66 => 9,  61 => 7,  58 => 6,  56 => 5,  53 => 4,  50 => 3,  45 => 2,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% set counter = 0 %}
{% for report in serviceReports %}
    {% set counter = counter +1 %}

    {% if counter == 1%}
        <div class=\"card\" xmlns=\"http://www.w3.org/1999/html\">
            <div class=\"card-header\" id=\"heading{{ report.id }}\">
                <h2 class=\"mb-0\">
                    <button class=\"btn btn-link\" type=\"button\" data-toggle=\"collapse\" data-target=\"#collapse{{ report.id }}\" aria-expanded=\"true\" aria-controls=\"collapse{{ report.id }}\">
                        Zlecenie przeglądu #{{ counter }}
                    </button>
                </h2>
            </div>

            <div id=\"collapse{{ report.id }}\" class=\"collapse show\" aria-labelledby=\"heading{{ report.id }}\" data-parent=\"#accordionExample\">
                <div class=\"card-body\">
                    <h5 class=\"card-title\">{{ report.equipments[0].name }}</h5>
                    <p class=\"card-text\">{{ report.equipments[0].description }}</p>
                </div>
                <ul class=\"list-group list-group-flush\">
                    <li class=\"list-group-item font-weight-light\">Rodzaj: {{ report.equipments[0].type.type }}</li>
                    <li class=\"list-group-item\">Przebieg: {{ report.equipments[0].milleage }} km</li>
                </ul>
                <div class=\"card-body\">
                    <form class=\"form-inline float-right mb-2\" action=\"{{ url(\"serviceman_assignservice\", {\"id\" : report.id}) }}\" method=\"post\">
                            <button type=\"submit\" class=\"btn btn-outline-success mt-2\">Przyjmij zlecenie</button>
                    </form>
                </div>
            </div>
        </div>
    {% else %}
        <div class=\"card\">
            <div class=\"card-header\" id=\"heading{{ report.id }}\">
                <h2 class=\"mb-0\">
                    <button class=\"btn btn-link collapsed\" type=\"button\" data-toggle=\"collapse\" data-target=\"#collapse{{ report.id }}\" aria-expanded=\"false\" aria-controls=\"collapse{{ report.id }}\">
                        Zlecenie przeglądu #{{ counter }}
                    </button>
                </h2>
            </div>
            <div id=\"collapse{{ report.id }}\" class=\"collapse\" aria-labelledby=\"heading{{ report.id }}\" data-parent=\"#accordionExample\">
                <div class=\"card-body\">
                    <h5 class=\"card-title\">{{ report.equipments[0].name }}</h5>
                    <p class=\"card-text\">{{ report.equipments[0].description }}</p>
                </div>
                <ul class=\"list-group list-group-flush\">
                    <li class=\"list-group-item font-weight-light\">Rodzaj: {{ report.equipments[0].type.type }}</li>
                    <li class=\"list-group-item\">Przebieg: {{ report.equipments[0].milleage }} km</li>
                </ul>
                <div class=\"card-body\">
                    <form class=\"form-inline float-right mb-2\" action=\"{{ url(\"serviceman_assignservice\", {\"id\" : report.id}) }}\" method=\"post\">
                        <button type=\"submit\" class=\"btn btn-outline-success mt-2\">Przyjmij zlecenie</button>
                    </form>
                </div>
            </div>
        </div>
    {% endif %}

{% else %}
    <div class=\"alert alert-primary\" role=\"alert\">
        Obecnie nie ma żadnych dostępnych zgłoszeń awarii.</a>
    </div>
{% endfor %}", "serviceman/serviceBody.html.twig", "/Users/wiktorpieklik/bd2/templates/serviceman/serviceBody.html.twig");
    }
}
