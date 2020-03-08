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

/* damageReport/damageReportBody.html.twig */
class __TwigTemplate_7faa0901facb05b5f080f8d57a0ee58fe1ef5c596b27b983b5c55ac6423f20c9 extends \Twig\Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "damageReport/damageReportBody.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "damageReport/damageReportBody.html.twig"));

        // line 1
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["damageReports"]) || array_key_exists("damageReports", $context) ? $context["damageReports"] : (function () { throw new RuntimeError('Variable "damageReports" does not exist.', 1, $this->source); })()));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["report"]) {
            // line 2
            echo "    ";
            $context["counter"] = ((isset($context["counter"]) || array_key_exists("counter", $context) ? $context["counter"] : (function () { throw new RuntimeError('Variable "counter" does not exist.', 2, $this->source); })()) + 1);
            // line 3
            echo "
    ";
            // line 4
            if (((isset($context["counter"]) || array_key_exists("counter", $context) ? $context["counter"] : (function () { throw new RuntimeError('Variable "counter" does not exist.', 4, $this->source); })()) == 1)) {
                // line 5
                echo "        <div class=\"accordion\" id=\"accordionExample\">
            <div class=\"card\" xmlns=\"http://www.w3.org/1999/html\">
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
                        <p class=\"card-text\">Wiadomość zgłoszenia: ";
                // line 20
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["report"], "message", [], "any", false, false, false, 20), "html", null, true);
                echo "</p>
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
                    </div>
                </div>
            </div>
        </div>
    ";
            } else {
                // line 34
                echo "    ";
            }
            // line 35
            echo "
";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 37
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
        return "damageReport/damageReportBody.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  136 => 37,  130 => 35,  127 => 34,  119 => 28,  110 => 26,  106 => 25,  98 => 20,  94 => 19,  90 => 18,  86 => 17,  79 => 15,  71 => 10,  65 => 9,  60 => 7,  56 => 5,  54 => 4,  51 => 3,  48 => 2,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% for report in damageReports %}
    {% set counter = counter +1 %}

    {% if counter == 1%}
        <div class=\"accordion\" id=\"accordionExample\">
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
                        <p class=\"card-text\">Wiadomość zgłoszenia: {{ report.message }}</p>
                        <div class=\"list-group\">
                            <button type=\"button\" class=\"list-group-item list-group-item-action active\">
                                Zniszczone sprzęty
                            </button>
                            {% for equipment in report.equipments %}
                                <button type=\"button\" class=\"list-group-item list-group-item-action\">{{ equipment.name }}</button>
                            {% endfor %}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    {% else %}
    {% endif %}

{% else %}
    <div class=\"alert alert-primary\" role=\"alert\">
        Obecnie nie ma żadnych dostępnych zgłoszeń awarii.</a>
    </div>
{% endfor %}", "damageReport/damageReportBody.html.twig", "/Users/wiktorpieklik/bd2/templates/damageReport/damageReportBody.html.twig");
    }
}
