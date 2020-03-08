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

/* serviceman/damageReportBody.html.twig */
class __TwigTemplate_1d66026a974f058592fb7c39c46cf9213b2fb01c5042561d271a33de9c8663f7 extends \Twig\Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "serviceman/damageReportBody.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "serviceman/damageReportBody.html.twig"));

        // line 1
        $context["counter"] = 0;
        // line 2
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["damageReports"]) || array_key_exists("damageReports", $context) ? $context["damageReports"] : (function () { throw new RuntimeError('Variable "damageReports" does not exist.', 2, $this->source); })()));
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
                echo "            <div class=\"card\" xmlns=\"http://www.w3.org/1999/html\">
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
                            Zgłoszenie awarii #";
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
                        <h5 class=\"card-title\">ID użytkownika: ";
                // line 17
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["report"], "attachedOrder", [], "any", false, false, false, 17), "user", [], "any", false, false, false, 17), "id", [], "any", false, false, false, 17), "html", null, true);
                echo "</h5>
                        <p class=\"card-text\">Email użytkownika: ";
                // line 18
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["report"], "attachedOrder", [], "any", false, false, false, 18), "user", [], "any", false, false, false, 18), "email", [], "any", false, false, false, 18), "html", null, true);
                echo "</p>
                        <p class=\"card-text\">Data zgłoszenia: ";
                // line 19
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["report"], "created_at", [], "any", false, false, false, 19), "Y-m-d H:i"), "html", null, true);
                echo "</p>
                        <p class=\"card-text\">Wiadomość zgłoszenia: <strong>";
                // line 20
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["report"], "message", [], "any", false, false, false, 20), "html", null, true);
                echo "</strong></p>
                        <div class=\"list-group\">
                            <button type=\"button\" class=\"list-group-item list-group-item-action active\">
                                Zniszczone sprzęty
                            </button>
                            ";
                // line 25
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["report"], "equipments", [], "any", false, false, false, 25));
                foreach ($context['_seq'] as $context["_key"] => $context["equipment"]) {
                    // line 26
                    echo "                                <button type=\"button\" class=\"list-group-item list-group-item-action\">";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["equipment"], "name", [], "any", false, false, false, 26), "html", null, true);
                    echo "</button>
                            ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['equipment'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 28
                echo "                        </div>
                        <form class=\"form-inline float-right mb-2\" action=\"";
                // line 29
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl("serviceman_assigndamage", ["id" => twig_get_attribute($this->env, $this->source, $context["report"], "id", [], "any", false, false, false, 29)]), "html", null, true);
                echo "\" method=\"post\">
                            <button type=\"submit\" class=\"btn btn-outline-success mt-2\">Przyjmij zgłoszenie</button>
                        </form>
                    </div>
                </div>
            </div>
    ";
            } else {
                // line 36
                echo "        <div class=\"card\">
            <div class=\"card-header\" id=\"heading";
                // line 37
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["report"], "id", [], "any", false, false, false, 37), "html", null, true);
                echo "\">
                <h2 class=\"mb-0\">
                    <button class=\"btn btn-link collapsed\" type=\"button\" data-toggle=\"collapse\" data-target=\"#collapse";
                // line 39
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["report"], "id", [], "any", false, false, false, 39), "html", null, true);
                echo "\" aria-expanded=\"false\" aria-controls=\"collapse";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["report"], "id", [], "any", false, false, false, 39), "html", null, true);
                echo "\">
                        Zgłoszenie awarii #";
                // line 40
                echo twig_escape_filter($this->env, (isset($context["counter"]) || array_key_exists("counter", $context) ? $context["counter"] : (function () { throw new RuntimeError('Variable "counter" does not exist.', 40, $this->source); })()), "html", null, true);
                echo "
                    </button>
                </h2>
            </div>
            <div id=\"collapse";
                // line 44
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["report"], "id", [], "any", false, false, false, 44), "html", null, true);
                echo "\" class=\"collapse\" aria-labelledby=\"heading";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["report"], "id", [], "any", false, false, false, 44), "html", null, true);
                echo "\" data-parent=\"#accordionExample\">
                <div class=\"card-body\">
                    <p class=\"card-text\">Email użytkownika: ";
                // line 46
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["report"], "attachedOrder", [], "any", false, false, false, 46), "user", [], "any", false, false, false, 46), "email", [], "any", false, false, false, 46), "html", null, true);
                echo "</p>
                    <p class=\"card-text\">Data zgłoszenia: ";
                // line 47
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["report"], "created_at", [], "any", false, false, false, 47), "Y-m-d H:i"), "html", null, true);
                echo "</p>
                    <p class=\"card-text\">Wiadomość zgłoszenia: ";
                // line 48
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["report"], "message", [], "any", false, false, false, 48), "html", null, true);
                echo "</p>
                    <div class=\"list-group\">
                        <button type=\"button\" class=\"list-group-item list-group-item-action active\">
                            Zniszczone sprzęty
                        </button>
                        ";
                // line 53
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["report"], "equipments", [], "any", false, false, false, 53));
                foreach ($context['_seq'] as $context["_key"] => $context["equipment"]) {
                    // line 54
                    echo "                            <button type=\"button\" class=\"list-group-item list-group-item-action\">";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["equipment"], "name", [], "any", false, false, false, 54), "html", null, true);
                    echo "</button>
                        ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['equipment'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 56
                echo "                    </div>
                    <form class=\"form-inline float-right mb-2\" action=\"";
                // line 57
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl("serviceman_assigndamage", ["id" => twig_get_attribute($this->env, $this->source, $context["report"], "id", [], "any", false, false, false, 57)]), "html", null, true);
                echo "\" method=\"post\">
                        <button type=\"submit\" class=\"btn btn-outline-success mt-2\">Przyjmij zgłoszenie</button>
                    </form>
                </div>
            </div>
        </div>
    ";
            }
            // line 64
            echo "
";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 66
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
        return "serviceman/damageReportBody.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  209 => 66,  203 => 64,  193 => 57,  190 => 56,  181 => 54,  177 => 53,  169 => 48,  165 => 47,  161 => 46,  154 => 44,  147 => 40,  141 => 39,  136 => 37,  133 => 36,  123 => 29,  120 => 28,  111 => 26,  107 => 25,  99 => 20,  95 => 19,  91 => 18,  87 => 17,  80 => 15,  72 => 10,  66 => 9,  61 => 7,  58 => 6,  56 => 5,  53 => 4,  50 => 3,  45 => 2,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% set counter = 0 %}
{% for report in damageReports %}
    {% set counter = counter +1 %}

    {% if counter == 1%}
            <div class=\"card\" xmlns=\"http://www.w3.org/1999/html\">
                <div class=\"card-header\" id=\"heading{{ report.id }}\">
                    <h2 class=\"mb-0\">
                        <button class=\"btn btn-link\" type=\"button\" data-toggle=\"collapse\" data-target=\"#collapse{{ report.id }}\" aria-expanded=\"true\" aria-controls=\"collapse{{ report.id }}\">
                            Zgłoszenie awarii #{{ counter }}
                        </button>
                    </h2>
                </div>

                <div id=\"collapse{{ report.id }}\" class=\"collapse show\" aria-labelledby=\"heading{{ report.id }}\" data-parent=\"#accordionExample\">
                    <div class=\"card-body\">
                        <h5 class=\"card-title\">ID użytkownika: {{ report.attachedOrder.user.id }}</h5>
                        <p class=\"card-text\">Email użytkownika: {{ report.attachedOrder.user.email}}</p>
                        <p class=\"card-text\">Data zgłoszenia: {{ report.created_at | date(\"Y-m-d H:i\") }}</p>
                        <p class=\"card-text\">Wiadomość zgłoszenia: <strong>{{ report.message }}</strong></p>
                        <div class=\"list-group\">
                            <button type=\"button\" class=\"list-group-item list-group-item-action active\">
                                Zniszczone sprzęty
                            </button>
                            {% for equipment in report.equipments %}
                                <button type=\"button\" class=\"list-group-item list-group-item-action\">{{ equipment.name }}</button>
                            {% endfor %}
                        </div>
                        <form class=\"form-inline float-right mb-2\" action=\"{{ url(\"serviceman_assigndamage\", {\"id\" : report.id}) }}\" method=\"post\">
                            <button type=\"submit\" class=\"btn btn-outline-success mt-2\">Przyjmij zgłoszenie</button>
                        </form>
                    </div>
                </div>
            </div>
    {% else %}
        <div class=\"card\">
            <div class=\"card-header\" id=\"heading{{ report.id }}\">
                <h2 class=\"mb-0\">
                    <button class=\"btn btn-link collapsed\" type=\"button\" data-toggle=\"collapse\" data-target=\"#collapse{{ report.id }}\" aria-expanded=\"false\" aria-controls=\"collapse{{ report.id }}\">
                        Zgłoszenie awarii #{{ counter }}
                    </button>
                </h2>
            </div>
            <div id=\"collapse{{ report.id }}\" class=\"collapse\" aria-labelledby=\"heading{{ report.id }}\" data-parent=\"#accordionExample\">
                <div class=\"card-body\">
                    <p class=\"card-text\">Email użytkownika: {{ report.attachedOrder.user.email}}</p>
                    <p class=\"card-text\">Data zgłoszenia: {{ report.created_at | date(\"Y-m-d H:i\") }}</p>
                    <p class=\"card-text\">Wiadomość zgłoszenia: {{ report.message }}</p>
                    <div class=\"list-group\">
                        <button type=\"button\" class=\"list-group-item list-group-item-action active\">
                            Zniszczone sprzęty
                        </button>
                        {% for equipment in report.equipments %}
                            <button type=\"button\" class=\"list-group-item list-group-item-action\">{{ equipment.name }}</button>
                        {% endfor %}
                    </div>
                    <form class=\"form-inline float-right mb-2\" action=\"{{ url(\"serviceman_assigndamage\", {\"id\": report.id}) }}\" method=\"post\">
                        <button type=\"submit\" class=\"btn btn-outline-success mt-2\">Przyjmij zgłoszenie</button>
                    </form>
                </div>
            </div>
        </div>
    {% endif %}

{% else %}
    <div class=\"alert alert-primary\" role=\"alert\">
        Obecnie nie ma żadnych dostępnych zgłoszeń awarii.</a>
    </div>
{% endfor %}", "serviceman/damageReportBody.html.twig", "/Users/wiktorpieklik/bd2/templates/serviceman/damageReportBody.html.twig");
    }
}
