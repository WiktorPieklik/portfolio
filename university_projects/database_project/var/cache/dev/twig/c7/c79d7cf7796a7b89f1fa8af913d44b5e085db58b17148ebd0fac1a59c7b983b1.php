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

/* user/myorders.html.twig */
class __TwigTemplate_9b6c095cb6759a9b641f5f9c4ea1e46ababe069f224ea89c07976b1a6b397645 extends \Twig\Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "user/myorders.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "user/myorders.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "user/myorders.html.twig", 1);
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
        $context["counter"] =  -1;
        // line 4
        echo "    <h2>";
        echo twig_escape_filter($this->env, (isset($context["title"]) || array_key_exists("title", $context) ? $context["title"] : (function () { throw new RuntimeError('Variable "title" does not exist.', 4, $this->source); })()), "html", null, true);
        echo "</h2>

    ";
        // line 6
        if ((twig_length_filter($this->env, (isset($context["myOrders"]) || array_key_exists("myOrders", $context) ? $context["myOrders"] : (function () { throw new RuntimeError('Variable "myOrders" does not exist.', 6, $this->source); })())) > 0)) {
            // line 7
            echo "        <div class=\"accordion\" id=\"accordionExample\">
    ";
        }
        // line 9
        echo "        ";
        $this->loadTemplate("user/order_body.html.twig", "user/myorders.html.twig", 9)->display(twig_array_merge($context, ["myOrders" => (isset($context["myOrders"]) || array_key_exists("myOrders", $context) ? $context["myOrders"] : (function () { throw new RuntimeError('Variable "myOrders" does not exist.', 9, $this->source); })()), "description" => (isset($context["description"]) || array_key_exists("description", $context) ? $context["description"] : (function () { throw new RuntimeError('Variable "description" does not exist.', 9, $this->source); })()), "title1" => "Wypożyczone", "title2" => "Zamówienie", "isOrder" => true]));
        // line 11
        echo "    ";
        if ((twig_length_filter($this->env, (isset($context["myOrders"]) || array_key_exists("myOrders", $context) ? $context["myOrders"] : (function () { throw new RuntimeError('Variable "myOrders" does not exist.', 11, $this->source); })())) > 0)) {
            // line 12
            echo "    </div>
    ";
        }
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "user/myorders.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  89 => 12,  86 => 11,  83 => 9,  79 => 7,  77 => 6,  71 => 4,  68 => 3,  58 => 2,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'base.html.twig' %}
{% block body %}
    {% set counter = -1 %}
    <h2>{{ title }}</h2>

    {% if myOrders | length > 0 %}
        <div class=\"accordion\" id=\"accordionExample\">
    {% endif %}
        {% include 'user/order_body.html.twig' with {\"myOrders\": myOrders, \"description\": description,
            \"title1\": 'Wypożyczone', \"title2\": \"Zamówienie\", \"isOrder\": true} %}
    {% if myOrders | length > 0 %}
    </div>
    {% endif %}
{% endblock %}", "user/myorders.html.twig", "/Users/wiktorpieklik/bd2/templates/user/myorders.html.twig");
    }
}
