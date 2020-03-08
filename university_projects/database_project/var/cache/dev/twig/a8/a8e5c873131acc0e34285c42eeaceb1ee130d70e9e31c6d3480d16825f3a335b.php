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
class __TwigTemplate_9e1a74f658c2c7940482626edb899cddf4c215fcf3a49b9b97770fbc6972e3a7 extends \Twig\Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "damageReport/damageReportBody.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "damageReport/damageReportBody.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "damageReport/damageReportBody.html.twig", 1);
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
        $context["counter"] = 0;
        // line 4
        echo "    <nav>
        <div class=\"nav nav-tabs mb-4\" id=\"nav-tab\" role=\"tablist\">
            <a class=\"nav-item nav-link active\" id=\"nav-home-tab\" data-toggle=\"tab\" href=\"#nav-damageReports\" role=\"tab\" aria-controls=\"nav-home\" aria-selected=\"true\">Zgłoszenia awarii</a>
            <a class=\"nav-item nav-link\" id=\"nav-profile-tab\" data-toggle=\"tab\" href=\"#nav-Repair\" role=\"tab\" aria-controls=\"nav-profile\" aria-selected=\"false\">Zlecenia przeglądu</a>
            <a class=\"nav-item nav-link\" id=\"nav-contact-tab\" data-toggle=\"tab\" href=\"#nav-transportOrder\" role=\"tab\" aria-controls=\"nav-contact\" aria-selected=\"false\">Zlecenia przewozu</a>
        </div>
    </nav>
    <div class=\"tab-content\" id=\"nav-tabContent\">
        <div class=\"tab-pane fade show active\" id=\"nav-damageReports\" role=\"tabpanel\" aria-labelledby=\"nav-home-tab\">
            ";
        // line 13
        $this->loadTemplate("damageReport/damageReportBody.html.twig", "damageReport/damageReportBody.html.twig", 13)->display(twig_array_merge($context, ["damageReports" => (isset($context["damageReports"]) || array_key_exists("damageReports", $context) ? $context["damageReports"] : (function () { throw new RuntimeError('Variable "damageReports" does not exist.', 13, $this->source); })())]));
        // line 14
        echo "        </div>
        <div class=\"tab-pane fade\" id=\"nav-Repair\" role=\"tabpanel\" aria-labelledby=\"nav-profile-tab\">Przeglądy</div>
        <div class=\"tab-pane fade\" id=\"nav-transportOrder\" role=\"tabpanel\" aria-labelledby=\"nav-contact-tab\">Przewozy</div>
    </div>

";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

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
        return array (  84 => 14,  82 => 13,  71 => 4,  68 => 3,  58 => 2,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'base.html.twig' %}
{% block body %}
    {% set counter = 0 %}
    <nav>
        <div class=\"nav nav-tabs mb-4\" id=\"nav-tab\" role=\"tablist\">
            <a class=\"nav-item nav-link active\" id=\"nav-home-tab\" data-toggle=\"tab\" href=\"#nav-damageReports\" role=\"tab\" aria-controls=\"nav-home\" aria-selected=\"true\">Zgłoszenia awarii</a>
            <a class=\"nav-item nav-link\" id=\"nav-profile-tab\" data-toggle=\"tab\" href=\"#nav-Repair\" role=\"tab\" aria-controls=\"nav-profile\" aria-selected=\"false\">Zlecenia przeglądu</a>
            <a class=\"nav-item nav-link\" id=\"nav-contact-tab\" data-toggle=\"tab\" href=\"#nav-transportOrder\" role=\"tab\" aria-controls=\"nav-contact\" aria-selected=\"false\">Zlecenia przewozu</a>
        </div>
    </nav>
    <div class=\"tab-content\" id=\"nav-tabContent\">
        <div class=\"tab-pane fade show active\" id=\"nav-damageReports\" role=\"tabpanel\" aria-labelledby=\"nav-home-tab\">
            {% include 'damageReport/damageReportBody.html.twig' with {\"damageReports\": damageReports} %}
        </div>
        <div class=\"tab-pane fade\" id=\"nav-Repair\" role=\"tabpanel\" aria-labelledby=\"nav-profile-tab\">Przeglądy</div>
        <div class=\"tab-pane fade\" id=\"nav-transportOrder\" role=\"tabpanel\" aria-labelledby=\"nav-contact-tab\">Przewozy</div>
    </div>

{% endblock %}", "damageReport/damageReportBody.html.twig", "/Users/wiktorpieklik/bd2/templates/damageReport/damageReportBody.html.twig");
    }
}
