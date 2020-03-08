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

/* user/myreservations.html.twig */
class __TwigTemplate_a3c4bd1fcffbfa3b48901f4e9a0a171054189484adc961afce86744ce590a269 extends \Twig\Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "user/myreservations.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "user/myreservations.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "user/myreservations.html.twig", 1);
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
        echo "    <h2>Moje rezerwacje</h2>
    ";
        // line 5
        if ((twig_length_filter($this->env, (isset($context["myReservations"]) || array_key_exists("myReservations", $context) ? $context["myReservations"] : (function () { throw new RuntimeError('Variable "myReservations" does not exist.', 5, $this->source); })())) > 0)) {
            // line 6
            echo "        <div class=\"accordion\" id=\"accordionExample\">
    ";
        }
        // line 8
        echo "    ";
        $this->loadTemplate("user/order_body.html.twig", "user/myreservations.html.twig", 8)->display(twig_array_merge($context, ["myOrders" => (isset($context["myReservations"]) || array_key_exists("myReservations", $context) ? $context["myReservations"] : (function () { throw new RuntimeError('Variable "myReservations" does not exist.', 8, $this->source); })()), "description" => (isset($context["description"]) || array_key_exists("description", $context) ? $context["description"] : (function () { throw new RuntimeError('Variable "description" does not exist.', 8, $this->source); })()), "title1" => "Zarezerwowane", "title2" => "Rezerwacja", "isOrder" => false]));
        // line 10
        echo "    ";
        if ((twig_length_filter($this->env, (isset($context["myReservations"]) || array_key_exists("myReservations", $context) ? $context["myReservations"] : (function () { throw new RuntimeError('Variable "myReservations" does not exist.', 10, $this->source); })())) > 0)) {
            // line 11
            echo "    </div>
    ";
        }
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "user/myreservations.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  86 => 11,  83 => 10,  80 => 8,  76 => 6,  74 => 5,  71 => 4,  68 => 3,  58 => 2,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'base.html.twig' %}
{% block body %}
    {% set counter = -1 %}
    <h2>Moje rezerwacje</h2>
    {% if myReservations | length > 0 %}
        <div class=\"accordion\" id=\"accordionExample\">
    {% endif %}
    {% include 'user/order_body.html.twig' with {\"myOrders\": myReservations, \"description\": description,
        \"title1\": 'Zarezerwowane', \"title2\": \"Rezerwacja\", \"isOrder\": false} %}
    {% if myReservations | length > 0 %}
    </div>
    {% endif %}
{% endblock %}", "user/myreservations.html.twig", "/Users/wiktorpieklik/bd2/templates/user/myreservations.html.twig");
    }
}
