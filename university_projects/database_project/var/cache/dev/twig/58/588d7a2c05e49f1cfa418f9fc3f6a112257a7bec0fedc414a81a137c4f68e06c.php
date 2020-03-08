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

/* serviceman/index.html.twig */
class __TwigTemplate_7f45e2299d414d10c6598dded34bcc9653a8078cb4d82fcd7fff51e03d58f17b extends \Twig\Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "serviceman/index.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "serviceman/index.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "serviceman/index.html.twig", 1);
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
        echo "    <nav>
        <div class=\"nav nav-tabs mb-3\" id=\"nav-tab\" role=\"tablist\">
            <a class=\"nav-item nav-link active\" id=\"nav-home-tab\" data-toggle=\"tab\" href=\"#nav-damageReports\" role=\"tab\" aria-controls=\"nav-home\" aria-selected=\"true\">
                Zgłoszenia awarii ";
        // line 6
        echo ((($this->extensions['App\Twig\UserExtension']->getDamageReportsCount() > 0)) ? ((("<span class=\"badge badge-pill badge-primary\">" . $this->extensions['App\Twig\UserExtension']->getDamageReportsCount()) . "</span>")) : (""));
        echo "
            </a>
            <a class=\"nav-item nav-link\" id=\"nav-profile-tab\" data-toggle=\"tab\" href=\"#nav-Repair\" role=\"tab\" aria-controls=\"nav-profile\" aria-selected=\"false\">
                Zlecenia przeglądu ";
        // line 9
        echo ((($this->extensions['App\Twig\UserExtension']->getServiceReportsCount() > 0)) ? ((("<span class=\"badge badge-pill badge-primary\">" . $this->extensions['App\Twig\UserExtension']->getServiceReportsCount()) . "</span>")) : (""));
        echo "
            </a>
            <a class=\"nav-item nav-link\" id=\"nav-contact-tab\" data-toggle=\"tab\" href=\"#nav-transportOrder\" role=\"tab\" aria-controls=\"nav-contact\" aria-selected=\"false\">
                Zlecenia przewozu</a>
        </div>
    </nav>
    <div class=\"tab-content\" id=\"nav-tabContent\">
        <div class=\"tab-pane fade show active\" id=\"nav-damageReports\" role=\"tabpanel\" aria-labelledby=\"nav-home-tab\">
            ";
        // line 17
        if ((twig_length_filter($this->env, (isset($context["damageReports"]) || array_key_exists("damageReports", $context) ? $context["damageReports"] : (function () { throw new RuntimeError('Variable "damageReports" does not exist.', 17, $this->source); })())) > 0)) {
            // line 18
            echo "                <div class=\"accordion\" id=\"accordionExample\">
            ";
        }
        // line 20
        echo "            ";
        $this->loadTemplate("serviceman/damageReportBody.html.twig", "serviceman/index.html.twig", 20)->display(twig_array_merge($context, ["damageReports" => (isset($context["damageReports"]) || array_key_exists("damageReports", $context) ? $context["damageReports"] : (function () { throw new RuntimeError('Variable "damageReports" does not exist.', 20, $this->source); })())]));
        // line 21
        echo "            ";
        if ((twig_length_filter($this->env, (isset($context["damageReports"]) || array_key_exists("damageReports", $context) ? $context["damageReports"] : (function () { throw new RuntimeError('Variable "damageReports" does not exist.', 21, $this->source); })())) > 0)) {
            // line 22
            echo "                </div>
            ";
        }
        // line 24
        echo "        </div>
        <div class=\"tab-pane fade\" id=\"nav-Repair\" role=\"tabpanel\" aria-labelledby=\"nav-profile-tab\">
            ";
        // line 26
        if ((twig_length_filter($this->env, (isset($context["serviceReports"]) || array_key_exists("serviceReports", $context) ? $context["serviceReports"] : (function () { throw new RuntimeError('Variable "serviceReports" does not exist.', 26, $this->source); })())) > 0)) {
            // line 27
            echo "                <div class=\"accordion\" id=\"accordionExample\">
            ";
        }
        // line 29
        echo "            ";
        $this->loadTemplate("serviceman/serviceBody.html.twig", "serviceman/index.html.twig", 29)->display(twig_array_merge($context, ["serviceReports" => (isset($context["serviceReports"]) || array_key_exists("serviceReports", $context) ? $context["serviceReports"] : (function () { throw new RuntimeError('Variable "serviceReports" does not exist.', 29, $this->source); })())]));
        // line 30
        echo "            ";
        if ((twig_length_filter($this->env, (isset($context["serviceReports"]) || array_key_exists("serviceReports", $context) ? $context["serviceReports"] : (function () { throw new RuntimeError('Variable "serviceReports" does not exist.', 30, $this->source); })())) > 0)) {
            // line 31
            echo "                </div>
            ";
        }
        // line 33
        echo "        </div>
        <div class=\"tab-pane fade\" id=\"nav-transportOrder\" role=\"tabpanel\" aria-labelledby=\"nav-contact-tab\">Przewozy</div>
    </div>

";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "serviceman/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  126 => 33,  122 => 31,  119 => 30,  116 => 29,  112 => 27,  110 => 26,  106 => 24,  102 => 22,  99 => 21,  96 => 20,  92 => 18,  90 => 17,  79 => 9,  73 => 6,  68 => 3,  58 => 2,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'base.html.twig' %}
{% block body %}
    <nav>
        <div class=\"nav nav-tabs mb-3\" id=\"nav-tab\" role=\"tablist\">
            <a class=\"nav-item nav-link active\" id=\"nav-home-tab\" data-toggle=\"tab\" href=\"#nav-damageReports\" role=\"tab\" aria-controls=\"nav-home\" aria-selected=\"true\">
                Zgłoszenia awarii {{ (damageReportsCount() > 0)? (\"<span class=\\\"badge badge-pill badge-primary\\\"\\>\"~damageReportsCount()~\"</span>\")|raw: '' }}
            </a>
            <a class=\"nav-item nav-link\" id=\"nav-profile-tab\" data-toggle=\"tab\" href=\"#nav-Repair\" role=\"tab\" aria-controls=\"nav-profile\" aria-selected=\"false\">
                Zlecenia przeglądu {{ (serviceReportsCount() > 0)? (\"<span class=\\\"badge badge-pill badge-primary\\\"\\>\"~serviceReportsCount()~\"</span>\")|raw: '' }}
            </a>
            <a class=\"nav-item nav-link\" id=\"nav-contact-tab\" data-toggle=\"tab\" href=\"#nav-transportOrder\" role=\"tab\" aria-controls=\"nav-contact\" aria-selected=\"false\">
                Zlecenia przewozu</a>
        </div>
    </nav>
    <div class=\"tab-content\" id=\"nav-tabContent\">
        <div class=\"tab-pane fade show active\" id=\"nav-damageReports\" role=\"tabpanel\" aria-labelledby=\"nav-home-tab\">
            {% if damageReports | length > 0 %}
                <div class=\"accordion\" id=\"accordionExample\">
            {% endif %}
            {% include 'serviceman/damageReportBody.html.twig' with {\"damageReports\": damageReports} %}
            {% if damageReports | length > 0 %}
                </div>
            {% endif %}
        </div>
        <div class=\"tab-pane fade\" id=\"nav-Repair\" role=\"tabpanel\" aria-labelledby=\"nav-profile-tab\">
            {% if serviceReports | length > 0 %}
                <div class=\"accordion\" id=\"accordionExample\">
            {% endif %}
            {% include 'serviceman/serviceBody.html.twig' with {\"serviceReports\" : serviceReports} %}
            {% if serviceReports | length > 0 %}
                </div>
            {% endif %}
        </div>
        <div class=\"tab-pane fade\" id=\"nav-transportOrder\" role=\"tabpanel\" aria-labelledby=\"nav-contact-tab\">Przewozy</div>
    </div>

{% endblock %}", "serviceman/index.html.twig", "/Users/wiktorpieklik/bd2/templates/serviceman/index.html.twig");
    }
}
