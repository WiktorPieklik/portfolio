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

/* serviceman/myservicereports.html.twig */
class __TwigTemplate_d1654eafa25cd414166007a12d614c8eeb55d98779c14035f90d03f7ef0cd398 extends \Twig\Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "serviceman/myservicereports.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "serviceman/myservicereports.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "serviceman/myservicereports.html.twig", 1);
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
        echo "    <h2>Przyjęte zlecenia przeglądu</h2>
    ";
        // line 4
        $context["counter"] = 0;
        // line 5
        echo "    <div class=\"accordion\" id=\"accordionExample\">
        ";
        // line 6
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["serviceReports"]) || array_key_exists("serviceReports", $context) ? $context["serviceReports"] : (function () { throw new RuntimeError('Variable "serviceReports" does not exist.', 6, $this->source); })()));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["report"]) {
            // line 7
            echo "            ";
            $context["counter"] = ((isset($context["counter"]) || array_key_exists("counter", $context) ? $context["counter"] : (function () { throw new RuntimeError('Variable "counter" does not exist.', 7, $this->source); })()) + 1);
            // line 8
            echo "
            ";
            // line 9
            if (((isset($context["counter"]) || array_key_exists("counter", $context) ? $context["counter"] : (function () { throw new RuntimeError('Variable "counter" does not exist.', 9, $this->source); })()) == 1)) {
                // line 10
                echo "                <div class=\"card\" xmlns=\"http://www.w3.org/1999/html\">
                    <div class=\"card-header\" id=\"heading";
                // line 11
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["report"], "id", [], "any", false, false, false, 11), "html", null, true);
                echo "\">
                        <h2 class=\"mb-0\">
                            <button class=\"btn btn-link\" type=\"button\" data-toggle=\"collapse\" data-target=\"#collapse";
                // line 13
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["report"], "id", [], "any", false, false, false, 13), "html", null, true);
                echo "\" aria-expanded=\"true\" aria-controls=\"collapse";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["report"], "id", [], "any", false, false, false, 13), "html", null, true);
                echo "\">
                                Zgłoszenie przeglądu #";
                // line 14
                echo twig_escape_filter($this->env, (isset($context["counter"]) || array_key_exists("counter", $context) ? $context["counter"] : (function () { throw new RuntimeError('Variable "counter" does not exist.', 14, $this->source); })()), "html", null, true);
                echo "
                            </button>
                        </h2>
                    </div>

                    <div id=\"collapse";
                // line 19
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["report"], "id", [], "any", false, false, false, 19), "html", null, true);
                echo "\" class=\"collapse show\" aria-labelledby=\"heading";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["report"], "id", [], "any", false, false, false, 19), "html", null, true);
                echo "\" data-parent=\"#accordionExample\">
                        <div class=\"card-body\">
                            <form class=\"form-group mb-2\" action=\"";
                // line 21
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl("serviceman_finishservicereport", ["id" => twig_get_attribute($this->env, $this->source, $context["report"], "id", [], "any", false, false, false, 21)]), "html", null, true);
                echo "\" method=\"post\">
                                <p class=\"card-text\">Data zgłoszenia: ";
                // line 22
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["report"], "created_at", [], "any", false, false, false, 22), "Y-m-d H:i"), "html", null, true);
                echo "</p>
                                <p class=\"card-text\">Wiadomość zlecenia: <strong>";
                // line 23
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["report"], "message", [], "any", false, false, false, 23), "html", null, true);
                echo "</strong></p>
                                <div class=\"list-group\">
                                    <button type=\"button\" class=\"list-group-item list-group-item-action active\">
                                        Sprzęt oczekujący na przegląd
                                    </button>
                                    <select multiple class=\"form-control mb-2\" style=\"width: 100%\" id=\"order_equipments\">
                                        ";
                // line 29
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["report"], "equipments", [], "any", false, false, false, 29));
                foreach ($context['_seq'] as $context["_key"] => $context["equipment"]) {
                    // line 30
                    echo "                                                <option value=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["equipment"], "id", [], "any", false, false, false, 30), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["equipment"], "name", [], "any", false, false, false, 30), "html", null, true);
                    echo "</option>
                                        ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['equipment'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 32
                echo "                                    </select>

                                </div>
                                <!-- Button on card -->
                                <button type=\"submit\" name=\"repairButton\" value=\"true\" class=\"btn btn-outline-success float-right mt-2 mb-2 mr-2\">Napraw</button>
                                <!-- End of button -->
                            </form>
                        </div>
                    </div>
                </div>
            ";
            } else {
                // line 43
                echo "                <div class=\"card\">
                    <div class=\"card-header\" id=\"heading";
                // line 44
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["report"], "id", [], "any", false, false, false, 44), "html", null, true);
                echo "\">
                        <h2 class=\"mb-0\">
                            <button class=\"btn btn-link collapsed\" type=\"button\" data-toggle=\"collapse\" data-target=\"#collapse";
                // line 46
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["report"], "id", [], "any", false, false, false, 46), "html", null, true);
                echo "\" aria-expanded=\"false\" aria-controls=\"collapse";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["report"], "id", [], "any", false, false, false, 46), "html", null, true);
                echo "\">
                                Zgłoszenie przeglądu #";
                // line 47
                echo twig_escape_filter($this->env, (isset($context["counter"]) || array_key_exists("counter", $context) ? $context["counter"] : (function () { throw new RuntimeError('Variable "counter" does not exist.', 47, $this->source); })()), "html", null, true);
                echo "
                            </button>
                        </h2>
                    </div>
                    <div id=\"collapse";
                // line 51
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["report"], "id", [], "any", false, false, false, 51), "html", null, true);
                echo "\" class=\"collapse\" aria-labelledby=\"heading";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["report"], "id", [], "any", false, false, false, 51), "html", null, true);
                echo "\" data-parent=\"#accordionExample\">
                        <div class=\"card-body\">
                            <form class=\"form-group mb-2\" action=\"";
                // line 53
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl("serviceman_finishservicereport", ["id" => twig_get_attribute($this->env, $this->source, $context["report"], "id", [], "any", false, false, false, 53)]), "html", null, true);
                echo "\" method=\"post\">
                                <p class=\"card-text\">Wiadomość zgłoszenia: <strong>";
                // line 54
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["report"], "message", [], "any", false, false, false, 54), "html", null, true);
                echo "</strong></p>
                                <div class=\"list-group\">
                                    <button type=\"button\" class=\"list-group-item list-group-item-action active\">
                                        Sprzęt oczekujący na przegląd
                                    </button>
                                    <select multiple class=\"form-control mb-2\" style=\"width: 100%\" id=\"damage_equipments\">
                                        ";
                // line 60
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["report"], "equipments", [], "any", false, false, false, 60));
                foreach ($context['_seq'] as $context["_key"] => $context["equipment"]) {
                    // line 61
                    echo "                                                <option value=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["equipment"], "id", [], "any", false, false, false, 61), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["equipment"], "name", [], "any", false, false, false, 61), "html", null, true);
                    echo "</option>
                                        ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['equipment'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 63
                echo "                                    </select>
                                </div>
                                <!-- Button on card -->
                                <button type=\"submit\" name=\"repairButton\" value=\"true\" class=\"btn btn-outline-success float-right mt-2 mb-2 mr-2\">Napraw</button>
                                <!-- End of button -->
                            </form>
                        </div>
                    </div>
                </div>
            ";
            }
            // line 73
            echo "
        ";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 75
            echo "            <div class=\"alert alert-primary\" role=\"alert\">
                Obecnie nie masz żadnych dostępnych zleceń przeglądu.
            </div>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['report'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 79
        echo "    </div>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "serviceman/myservicereports.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  246 => 79,  237 => 75,  231 => 73,  219 => 63,  208 => 61,  204 => 60,  195 => 54,  191 => 53,  184 => 51,  177 => 47,  171 => 46,  166 => 44,  163 => 43,  150 => 32,  139 => 30,  135 => 29,  126 => 23,  122 => 22,  118 => 21,  111 => 19,  103 => 14,  97 => 13,  92 => 11,  89 => 10,  87 => 9,  84 => 8,  81 => 7,  76 => 6,  73 => 5,  71 => 4,  68 => 3,  58 => 2,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'base.html.twig' %}
{% block body %}
    <h2>Przyjęte zlecenia przeglądu</h2>
    {% set counter = 0 %}
    <div class=\"accordion\" id=\"accordionExample\">
        {% for report in serviceReports %}
            {% set counter = counter +1 %}

            {% if counter == 1%}
                <div class=\"card\" xmlns=\"http://www.w3.org/1999/html\">
                    <div class=\"card-header\" id=\"heading{{ report.id }}\">
                        <h2 class=\"mb-0\">
                            <button class=\"btn btn-link\" type=\"button\" data-toggle=\"collapse\" data-target=\"#collapse{{ report.id }}\" aria-expanded=\"true\" aria-controls=\"collapse{{ report.id }}\">
                                Zgłoszenie przeglądu #{{ counter }}
                            </button>
                        </h2>
                    </div>

                    <div id=\"collapse{{ report.id }}\" class=\"collapse show\" aria-labelledby=\"heading{{ report.id }}\" data-parent=\"#accordionExample\">
                        <div class=\"card-body\">
                            <form class=\"form-group mb-2\" action=\"{{ url(\"serviceman_finishservicereport\", {\"id\": report.id}) }}\" method=\"post\">
                                <p class=\"card-text\">Data zgłoszenia: {{ report.created_at | date(\"Y-m-d H:i\") }}</p>
                                <p class=\"card-text\">Wiadomość zlecenia: <strong>{{ report.message }}</strong></p>
                                <div class=\"list-group\">
                                    <button type=\"button\" class=\"list-group-item list-group-item-action active\">
                                        Sprzęt oczekujący na przegląd
                                    </button>
                                    <select multiple class=\"form-control mb-2\" style=\"width: 100%\" id=\"order_equipments\">
                                        {% for equipment in report.equipments %}
                                                <option value=\"{{ equipment.id }}\">{{ equipment.name }}</option>
                                        {% endfor %}
                                    </select>

                                </div>
                                <!-- Button on card -->
                                <button type=\"submit\" name=\"repairButton\" value=\"true\" class=\"btn btn-outline-success float-right mt-2 mb-2 mr-2\">Napraw</button>
                                <!-- End of button -->
                            </form>
                        </div>
                    </div>
                </div>
            {% else %}
                <div class=\"card\">
                    <div class=\"card-header\" id=\"heading{{ report.id }}\">
                        <h2 class=\"mb-0\">
                            <button class=\"btn btn-link collapsed\" type=\"button\" data-toggle=\"collapse\" data-target=\"#collapse{{ report.id }}\" aria-expanded=\"false\" aria-controls=\"collapse{{ report.id }}\">
                                Zgłoszenie przeglądu #{{ counter }}
                            </button>
                        </h2>
                    </div>
                    <div id=\"collapse{{ report.id }}\" class=\"collapse\" aria-labelledby=\"heading{{ report.id }}\" data-parent=\"#accordionExample\">
                        <div class=\"card-body\">
                            <form class=\"form-group mb-2\" action=\"{{ url(\"serviceman_finishservicereport\", {\"id\": report.id}) }}\" method=\"post\">
                                <p class=\"card-text\">Wiadomość zgłoszenia: <strong>{{ report.message }}</strong></p>
                                <div class=\"list-group\">
                                    <button type=\"button\" class=\"list-group-item list-group-item-action active\">
                                        Sprzęt oczekujący na przegląd
                                    </button>
                                    <select multiple class=\"form-control mb-2\" style=\"width: 100%\" id=\"damage_equipments\">
                                        {% for equipment in report.equipments %}
                                                <option value=\"{{ equipment.id }}\">{{ equipment.name }}</option>
                                        {% endfor %}
                                    </select>
                                </div>
                                <!-- Button on card -->
                                <button type=\"submit\" name=\"repairButton\" value=\"true\" class=\"btn btn-outline-success float-right mt-2 mb-2 mr-2\">Napraw</button>
                                <!-- End of button -->
                            </form>
                        </div>
                    </div>
                </div>
            {% endif %}

        {% else %}
            <div class=\"alert alert-primary\" role=\"alert\">
                Obecnie nie masz żadnych dostępnych zleceń przeglądu.
            </div>
        {% endfor %}
    </div>
{% endblock %}", "serviceman/myservicereports.html.twig", "/Users/wiktorpieklik/bd2/templates/serviceman/myservicereports.html.twig");
    }
}
