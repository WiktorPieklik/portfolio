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

/* user/order_body.html.twig */
class __TwigTemplate_440592743b5606fe0236812e0234b9ef58fbf373a6805cab5b6bbc59e19a7abf extends \Twig\Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "user/order_body.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "user/order_body.html.twig"));

        // line 1
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["myOrders"]) || array_key_exists("myOrders", $context) ? $context["myOrders"] : (function () { throw new RuntimeError('Variable "myOrders" does not exist.', 1, $this->source); })()));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["order"]) {
            // line 2
            echo "    ";
            $context["counter"] = ((isset($context["counter"]) || array_key_exists("counter", $context) ? $context["counter"] : (function () { throw new RuntimeError('Variable "counter" does not exist.', 2, $this->source); })()) + 1);
            // line 3
            echo "    ";
            if (((isset($context["counter"]) || array_key_exists("counter", $context) ? $context["counter"] : (function () { throw new RuntimeError('Variable "counter" does not exist.', 3, $this->source); })()) == 0)) {
                // line 4
                echo "        <div class=\"card\">
            <div class=\"card-header\" id=\"heading";
                // line 5
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["order"], "id", [], "any", false, false, false, 5), "html", null, true);
                echo "\">
                <h2 class=\"mb-0\">
                    <button class=\"btn btn-link\" type=\"button\" data-toggle=\"collapse\" data-target=\"#collapse";
                // line 7
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["order"], "id", [], "any", false, false, false, 7), "html", null, true);
                echo "\" aria-expanded=\"true\" aria-controls=\"collapse";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["order"], "id", [], "any", false, false, false, 7), "html", null, true);
                echo "\">
                        ";
                // line 8
                echo twig_escape_filter($this->env, (isset($context["title1"]) || array_key_exists("title1", $context) ? $context["title1"] : (function () { throw new RuntimeError('Variable "title1" does not exist.', 8, $this->source); })()), "html", null, true);
                echo " #";
                echo twig_escape_filter($this->env, ((isset($context["counter"]) || array_key_exists("counter", $context) ? $context["counter"] : (function () { throw new RuntimeError('Variable "counter" does not exist.', 8, $this->source); })()) + 1), "html", null, true);
                echo "
                    </button>
                </h2>
            </div>

            <div id=\"collapse";
                // line 13
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["order"], "id", [], "any", false, false, false, 13), "html", null, true);
                echo "\" class=\"collapse show\" aria-labelledby=\"heading";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["order"], "id", [], "any", false, false, false, 13), "html", null, true);
                echo "\" data-parent=\"#accordionExample\">
                <div class=\"card-body\">
                    <p>Stacja początkowa: ";
                // line 15
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["order"], "startDepartment", [], "any", false, false, false, 15), "address", [], "any", false, false, false, 15), "html", null, true);
                echo " </p>
                    <p>Stacja końcowa: ";
                // line 16
                echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["order"], "endDepartment", [], "any", false, true, false, 16), "address", [], "any", true, true, false, 16)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["order"], "endDepartment", [], "any", false, true, false, 16), "address", [], "any", false, false, false, 16), "brak")) : ("brak")), "html", null, true);
                echo "</p>
                    <p>Data rozpoczęcia: ";
                // line 17
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["order"], "created_at", [], "any", false, false, false, 17), "Y-m-d H:i"), "html", null, true);
                echo "</p>
                    <p>Cena końcowa: ";
                // line 18
                echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, $context["order"], "price", [], "any", true, true, false, 18)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, $context["order"], "price", [], "any", false, false, false, 18), 0)) : (0)), "html", null, true);
                echo " zł</p>
                    <div class=\"list-group\">
                        <button type=\"button\" class=\"list-group-item list-group-item-action active\">
                            ";
                // line 21
                echo twig_escape_filter($this->env, (isset($context["title1"]) || array_key_exists("title1", $context) ? $context["title1"] : (function () { throw new RuntimeError('Variable "title1" does not exist.', 21, $this->source); })()), "html", null, true);
                echo " sprzęty
                        </button>
                        ";
                // line 23
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["order"], "equipments", [], "any", false, false, false, 23));
                foreach ($context['_seq'] as $context["_key"] => $context["equipment"]) {
                    // line 24
                    echo "                            <button type=\"button\" class=\"list-group-item list-group-item-action\">";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["equipment"], "name", [], "any", false, false, false, 24), "html", null, true);
                    echo "</button>
                        ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['equipment'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 26
                echo "                    </div>
                </div>
            </div>
        </div>
    ";
            } else {
                // line 31
                echo "        <div class=\"card\">
            <div class=\"card-header\" id=\"heading";
                // line 32
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["order"], "id", [], "any", false, false, false, 32), "html", null, true);
                echo "\">
                <h2 class=\"mb-0\">
                    <button class=\"btn btn-link collapsed\" type=\"button\" data-toggle=\"collapse\" data-target=\"#collapse";
                // line 34
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["order"], "id", [], "any", false, false, false, 34), "html", null, true);
                echo "\" aria-expanded=\"false\" aria-controls=\"collapse";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["order"], "id", [], "any", false, false, false, 34), "html", null, true);
                echo "\">
                        ";
                // line 35
                echo twig_escape_filter($this->env, (isset($context["title2"]) || array_key_exists("title2", $context) ? $context["title2"] : (function () { throw new RuntimeError('Variable "title2" does not exist.', 35, $this->source); })()), "html", null, true);
                echo " #";
                echo twig_escape_filter($this->env, ((isset($context["counter"]) || array_key_exists("counter", $context) ? $context["counter"] : (function () { throw new RuntimeError('Variable "counter" does not exist.', 35, $this->source); })()) + 1), "html", null, true);
                echo "
                    </button>
                </h2>
            </div>
            <div id=\"collapse";
                // line 39
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["order"], "id", [], "any", false, false, false, 39), "html", null, true);
                echo "\" class=\"collapse\" aria-labelledby=\"heading";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["order"], "id", [], "any", false, false, false, 39), "html", null, true);
                echo "\" data-parent=\"#accordionExample\">
                <div class=\"card-body\">
                    <p>Stacja początkowa: ";
                // line 41
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["order"], "startDepartment", [], "any", false, false, false, 41), "address", [], "any", false, false, false, 41), "html", null, true);
                echo " </p>
                    <p>Stacja końcowa: ";
                // line 42
                echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["order"], "endDepartment", [], "any", false, true, false, 42), "address", [], "any", true, true, false, 42)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["order"], "endDepartment", [], "any", false, true, false, 42), "address", [], "any", false, false, false, 42), "brak")) : ("brak")), "html", null, true);
                echo "</p>
                    <p>Data rozpoczęcia: ";
                // line 43
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["order"], "created_at", [], "any", false, false, false, 43), "Y-m-d H:i"), "html", null, true);
                echo "</p>
                    <p>Cena końcowa: ";
                // line 44
                echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, $context["order"], "price", [], "any", true, true, false, 44)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, $context["order"], "price", [], "any", false, false, false, 44), 0)) : (0)), "html", null, true);
                echo " zł</p>
                    <div class=\"list-group\">
                        <button type=\"button\" class=\"list-group-item list-group-item-action active\">
                            ";
                // line 47
                echo twig_escape_filter($this->env, (isset($context["title1"]) || array_key_exists("title1", $context) ? $context["title1"] : (function () { throw new RuntimeError('Variable "title1" does not exist.', 47, $this->source); })()), "html", null, true);
                echo " sprzęty
                        </button>
                        ";
                // line 49
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["order"], "equipments", [], "any", false, false, false, 49));
                foreach ($context['_seq'] as $context["_key"] => $context["equipment"]) {
                    // line 50
                    echo "                            <button type=\"button\" class=\"list-group-item list-group-item-action\">";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["equipment"], "name", [], "any", false, false, false, 50), "html", null, true);
                    echo "</button>
                        ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['equipment'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 52
                echo "                    </div>
                </div>
            </div>
        </div>
    ";
            }
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 58
            echo "    <div class=\"alert alert-primary\" role=\"alert\">
        Ups :( <br>";
            // line 59
            echo twig_escape_filter($this->env, (isset($context["description"]) || array_key_exists("description", $context) ? $context["description"] : (function () { throw new RuntimeError('Variable "description" does not exist.', 59, $this->source); })()), "html", null, true);
            echo " Zobacz czy coś Cie nie <a href=\"";
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl("department_index");
            echo "\" class=\"alert-link\">interesuje</a>.
    </div>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['order'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "user/order_body.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  207 => 59,  204 => 58,  194 => 52,  185 => 50,  181 => 49,  176 => 47,  170 => 44,  166 => 43,  162 => 42,  158 => 41,  151 => 39,  142 => 35,  136 => 34,  131 => 32,  128 => 31,  121 => 26,  112 => 24,  108 => 23,  103 => 21,  97 => 18,  93 => 17,  89 => 16,  85 => 15,  78 => 13,  68 => 8,  62 => 7,  57 => 5,  54 => 4,  51 => 3,  48 => 2,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% for order in myOrders %}
    {% set counter = counter + 1 %}
    {% if counter == 0 %}
        <div class=\"card\">
            <div class=\"card-header\" id=\"heading{{ order.id }}\">
                <h2 class=\"mb-0\">
                    <button class=\"btn btn-link\" type=\"button\" data-toggle=\"collapse\" data-target=\"#collapse{{ order.id }}\" aria-expanded=\"true\" aria-controls=\"collapse{{ order.id }}\">
                        {{ title1 }} #{{ counter + 1 }}
                    </button>
                </h2>
            </div>

            <div id=\"collapse{{ order.id }}\" class=\"collapse show\" aria-labelledby=\"heading{{ order.id }}\" data-parent=\"#accordionExample\">
                <div class=\"card-body\">
                    <p>Stacja początkowa: {{ order.startDepartment.address }} </p>
                    <p>Stacja końcowa: {{ order.endDepartment.address | default(\"brak\") }}</p>
                    <p>Data rozpoczęcia: {{ order.created_at | date(\"Y-m-d H:i\")}}</p>
                    <p>Cena końcowa: {{ order.price | default(0)}} zł</p>
                    <div class=\"list-group\">
                        <button type=\"button\" class=\"list-group-item list-group-item-action active\">
                            {{ title1 }} sprzęty
                        </button>
                        {% for equipment in order.equipments %}
                            <button type=\"button\" class=\"list-group-item list-group-item-action\">{{ equipment.name }}</button>
                        {% endfor %}
                    </div>
                </div>
            </div>
        </div>
    {% else %}
        <div class=\"card\">
            <div class=\"card-header\" id=\"heading{{ order.id }}\">
                <h2 class=\"mb-0\">
                    <button class=\"btn btn-link collapsed\" type=\"button\" data-toggle=\"collapse\" data-target=\"#collapse{{ order.id }}\" aria-expanded=\"false\" aria-controls=\"collapse{{ order.id }}\">
                        {{ title2 }} #{{ counter + 1 }}
                    </button>
                </h2>
            </div>
            <div id=\"collapse{{ order.id }}\" class=\"collapse\" aria-labelledby=\"heading{{ order.id }}\" data-parent=\"#accordionExample\">
                <div class=\"card-body\">
                    <p>Stacja początkowa: {{ order.startDepartment.address }} </p>
                    <p>Stacja końcowa: {{ order.endDepartment.address | default(\"brak\") }}</p>
                    <p>Data rozpoczęcia: {{ order.created_at | date(\"Y-m-d H:i\")}}</p>
                    <p>Cena końcowa: {{ order.price | default(0)}} zł</p>
                    <div class=\"list-group\">
                        <button type=\"button\" class=\"list-group-item list-group-item-action active\">
                            {{ title1 }} sprzęty
                        </button>
                        {% for equipment in order.equipments %}
                            <button type=\"button\" class=\"list-group-item list-group-item-action\">{{ equipment.name }}</button>
                        {% endfor %}
                    </div>
                </div>
            </div>
        </div>
    {% endif %}
{% else %}
    <div class=\"alert alert-primary\" role=\"alert\">
        Ups :( <br>{{ description }} Zobacz czy coś Cie nie <a href=\"{{ url(\"department_index\") }}\" class=\"alert-link\">interesuje</a>.
    </div>
{% endfor %}", "user/order_body.html.twig", "/Users/wiktorpieklik/bd2/templates/user/order_body.html.twig");
    }
}
