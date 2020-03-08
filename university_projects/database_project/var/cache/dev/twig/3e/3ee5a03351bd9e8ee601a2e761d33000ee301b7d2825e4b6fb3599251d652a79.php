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

/* equipment/damageReportBody.html.twig */
class __TwigTemplate_a3ee32273a3f6c7cff64ea1316177e243ca23be555732094997759d0c6a922ee extends \Twig\Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "equipment/damageReportBody.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "equipment/damageReportBody.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "equipment/damageReportBody.html.twig", 1);
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
        echo "    ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["equipments"]) || array_key_exists("equipments", $context) ? $context["equipments"] : (function () { throw new RuntimeError('Variable "equipments" does not exist.', 3, $this->source); })()));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["equipment"]) {
            // line 4
            echo "        <div class=\"card m-md-2\">
            <div class=\"card-body\">
                <h5 class=\"card-title\">";
            // line 6
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["equipment"], "name", [], "any", false, false, false, 6), "html", null, true);
            echo "</h5>
                <p class=\"card-text\">";
            // line 7
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["equipment"], "description", [], "any", false, false, false, 7), "html", null, true);
            echo "</p>
            </div>
            <ul class=\"list-group list-group-flush\">
                <li class=\"list-group-item font-weight-light\">Rodzaj: ";
            // line 10
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["equipment"], "type", [], "any", false, false, false, 10), "type", [], "any", false, false, false, 10), "html", null, true);
            echo "</li>
                <li class=\"list-group-item\">Cena za dzień: ";
            // line 11
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["equipment"], "price", [], "any", false, false, false, 11), "html", null, true);
            echo " zł</li>
                <li class=\"list-group-item\">Przebieg: ";
            // line 12
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["equipment"], "milleage", [], "any", false, false, false, 12), "html", null, true);
            echo " km</li>
            </ul>
            <div class=\"card-body\">
                ";
            // line 15
            if ($this->extensions['App\Twig\UserExtension']->isRoleGranted("role_user")) {
                // line 16
                echo "                    <form class=\"float-left mr-2\" action=\"";
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl("equipment_addToBasket", ["e_id" => twig_get_attribute($this->env, $this->source, $context["equipment"], "id", [], "any", false, false, false, 16), "dep_id" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["equipment"], "department", [], "any", false, false, false, 16), "id", [], "any", false, false, false, 16)]), "html", null, true);
                echo "\" method=\"post\">
                        <button type=\"submit\" class=\"btn btn-outline-primary\">Dodaj do koszyka</button>
                    </form>
                ";
            } else {
                // line 20
                echo "                    <div class=\"alert alert-info\" style=\"width: 29rem;\" role=\"alert\">
                        Aby wypożyczyć lub zarezerwować musisz się <a href=\"";
                // line 21
                echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl("app_login");
                echo "\" class=\"alert-link\">zalogować</a>.
                    </div>
                ";
            }
            // line 24
            echo "            </div>
        </div>
    ";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 27
            echo "        <span class=\"badge badge-pill badge-info\">Ups, stacja nie ma żadnego dostępnego sprzętu :(</span>
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
        return "equipment/damageReportBody.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  128 => 27,  121 => 24,  115 => 21,  112 => 20,  104 => 16,  102 => 15,  96 => 12,  92 => 11,  88 => 10,  82 => 7,  78 => 6,  74 => 4,  68 => 3,  58 => 2,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'base.html.twig' %}
{% block body %}
    {% for equipment in equipments %}
        <div class=\"card m-md-2\">
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
                {% if isGranted('role_user') %}
                    <form class=\"float-left mr-2\" action=\"{{ url(\"equipment_addToBasket\", {\"e_id\": equipment.id, \"dep_id\": equipment.department.id}) }}\" method=\"post\">
                        <button type=\"submit\" class=\"btn btn-outline-primary\">Dodaj do koszyka</button>
                    </form>
                {% else %}
                    <div class=\"alert alert-info\" style=\"width: 29rem;\" role=\"alert\">
                        Aby wypożyczyć lub zarezerwować musisz się <a href=\"{{ url(\"app_login\") }}\" class=\"alert-link\">zalogować</a>.
                    </div>
                {% endif %}
            </div>
        </div>
    {% else %}
        <span class=\"badge badge-pill badge-info\">Ups, stacja nie ma żadnego dostępnego sprzętu :(</span>
    {% endfor %}
{% endblock %}", "equipment/damageReportBody.html.twig", "/Users/wiktorpieklik/bd2/templates/equipment/damageReportBody.html.twig");
    }
}
