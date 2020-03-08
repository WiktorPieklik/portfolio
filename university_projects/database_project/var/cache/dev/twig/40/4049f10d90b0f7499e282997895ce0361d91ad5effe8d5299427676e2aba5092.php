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
class __TwigTemplate_ebafc09e959e271cd28327942132669c3629d04f6876bd895e367fb87e3d8634 extends \Twig\Template
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
                echo twig_escape_filter($this->env, (isset($context["title2"]) || array_key_exists("title2", $context) ? $context["title2"] : (function () { throw new RuntimeError('Variable "title2" does not exist.', 8, $this->source); })()), "html", null, true);
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

                    ";
                // line 18
                if ((isset($context["isOrder"]) || array_key_exists("isOrder", $context) ? $context["isOrder"] : (function () { throw new RuntimeError('Variable "isOrder" does not exist.', 18, $this->source); })())) {
                    // line 19
                    echo "                    <p>Data rozpoczęcia: ";
                    echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["order"], "created_at", [], "any", false, false, false, 19), "Y-m-d H:i"), "html", null, true);
                    echo "</p>
                    <p>Data zakończenia: ";
                    // line 20
                    echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, $context["order"], "finished_at", [], "any", true, true, false, 20)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, $context["order"], "finished_at", [], "any", false, false, false, 20), "brak")) : ("brak")), "html", null, true);
                    echo "</p>
                    ";
                } else {
                    // line 22
                    echo "                    <p>Data rezerwacji: ";
                    echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["order"], "reserved_at", [], "any", false, false, false, 22), "Y-m-d H:i"), "html", null, true);
                    echo "</p>
                    ";
                }
                // line 24
                echo "
                    <p>Cena końcowa: ";
                // line 25
                echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, $context["order"], "price", [], "any", true, true, false, 25)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, $context["order"], "price", [], "any", false, false, false, 25), 0)) : (0)), "html", null, true);
                echo " zł</p>
                    <div class=\"list-group\">
                        <button type=\"button\" class=\"list-group-item list-group-item-action active\">
                            ";
                // line 28
                echo twig_escape_filter($this->env, (isset($context["title1"]) || array_key_exists("title1", $context) ? $context["title1"] : (function () { throw new RuntimeError('Variable "title1" does not exist.', 28, $this->source); })()), "html", null, true);
                echo " sprzęty
                        </button>
                        ";
                // line 30
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["order"], "equipments", [], "any", false, false, false, 30));
                foreach ($context['_seq'] as $context["_key"] => $context["equipment"]) {
                    // line 31
                    echo "                            <button type=\"button\" class=\"list-group-item list-group-item-action\">";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["equipment"], "name", [], "any", false, false, false, 31), "html", null, true);
                    echo "</button>
                        ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['equipment'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 33
                echo "                    </div>

                    ";
                // line 35
                if (((isset($context["isOrder"]) || array_key_exists("isOrder", $context) ? $context["isOrder"] : (function () { throw new RuntimeError('Variable "isOrder" does not exist.', 35, $this->source); })()) && (isset($context["isReturn"]) || array_key_exists("isReturn", $context) ? $context["isReturn"] : (function () { throw new RuntimeError('Variable "isReturn" does not exist.', 35, $this->source); })()))) {
                    // line 36
                    echo "                    <form class=\"form-inline mt-2\" action=\"";
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl("user_finishorder", ["id" => twig_get_attribute($this->env, $this->source, $context["order"], "id", [], "any", false, false, false, 36)]), "html", null, true);
                    echo "\" method=\"post\">
                        <label class=\"my-1 mr-2\" for=\"returnOrder\">Zwróć do stacji</label>
                        <select class=\"custom-select my-1 mr-sm-2\" name=\"returnOrder\">
                            <option selected>Wybierz...</option>
                            ";
                    // line 40
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable((isset($context["departments"]) || array_key_exists("departments", $context) ? $context["departments"] : (function () { throw new RuntimeError('Variable "departments" does not exist.', 40, $this->source); })()));
                    foreach ($context['_seq'] as $context["_key"] => $context["department"]) {
                        // line 41
                        echo "                            <option value=\"";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["department"], "id", [], "any", false, false, false, 41), "html", null, true);
                        echo "\">";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["department"], "address", [], "any", false, false, false, 41), "html", null, true);
                        echo "</option>
                            ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['department'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 43
                    echo "                        </select>
                        <button type=\"submit\" class=\"btn btn-primary my-1\">Zwróć</button>
                    </form>
                    ";
                }
                // line 47
                echo "
                    ";
                // line 48
                if ( !(isset($context["isOrder"]) || array_key_exists("isOrder", $context) ? $context["isOrder"] : (function () { throw new RuntimeError('Variable "isOrder" does not exist.', 48, $this->source); })())) {
                    // line 49
                    echo "
                    ";
                }
                // line 51
                echo "
                </div>
            </div>
        </div>
    ";
            } else {
                // line 56
                echo "        <div class=\"card\">
            <div class=\"card-header\" id=\"heading";
                // line 57
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["order"], "id", [], "any", false, false, false, 57), "html", null, true);
                echo "\">
                <h2 class=\"mb-0\">
                    <button class=\"btn btn-link collapsed\" type=\"button\" data-toggle=\"collapse\" data-target=\"#collapse";
                // line 59
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["order"], "id", [], "any", false, false, false, 59), "html", null, true);
                echo "\" aria-expanded=\"false\" aria-controls=\"collapse";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["order"], "id", [], "any", false, false, false, 59), "html", null, true);
                echo "\">
                        ";
                // line 60
                echo twig_escape_filter($this->env, (isset($context["title2"]) || array_key_exists("title2", $context) ? $context["title2"] : (function () { throw new RuntimeError('Variable "title2" does not exist.', 60, $this->source); })()), "html", null, true);
                echo " #";
                echo twig_escape_filter($this->env, ((isset($context["counter"]) || array_key_exists("counter", $context) ? $context["counter"] : (function () { throw new RuntimeError('Variable "counter" does not exist.', 60, $this->source); })()) + 1), "html", null, true);
                echo "
                    </button>
                </h2>
            </div>
            <div id=\"collapse";
                // line 64
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["order"], "id", [], "any", false, false, false, 64), "html", null, true);
                echo "\" class=\"collapse\" aria-labelledby=\"heading";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["order"], "id", [], "any", false, false, false, 64), "html", null, true);
                echo "\" data-parent=\"#accordionExample\">
                <div class=\"card-body\">
                    <p>Stacja początkowa: ";
                // line 66
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["order"], "startDepartment", [], "any", false, false, false, 66), "address", [], "any", false, false, false, 66), "html", null, true);
                echo " </p>
                    <p>Stacja końcowa: ";
                // line 67
                echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["order"], "endDepartment", [], "any", false, true, false, 67), "address", [], "any", true, true, false, 67)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["order"], "endDepartment", [], "any", false, true, false, 67), "address", [], "any", false, false, false, 67), "brak")) : ("brak")), "html", null, true);
                echo "</p>
                    <p>Data rozpoczęcia: ";
                // line 68
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["order"], "created_at", [], "any", false, false, false, 68), "Y-m-d H:i"), "html", null, true);
                echo "</p>
                    <p>Cena końcowa: ";
                // line 69
                echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, $context["order"], "price", [], "any", true, true, false, 69)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, $context["order"], "price", [], "any", false, false, false, 69), 0)) : (0)), "html", null, true);
                echo " zł</p>
                    <div class=\"list-group\">
                        <button type=\"button\" class=\"list-group-item list-group-item-action active\">
                            ";
                // line 72
                echo twig_escape_filter($this->env, (isset($context["title1"]) || array_key_exists("title1", $context) ? $context["title1"] : (function () { throw new RuntimeError('Variable "title1" does not exist.', 72, $this->source); })()), "html", null, true);
                echo " sprzęty
                        </button>
                        ";
                // line 74
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["order"], "equipments", [], "any", false, false, false, 74));
                foreach ($context['_seq'] as $context["_key"] => $context["equipment"]) {
                    // line 75
                    echo "                            <button type=\"button\" class=\"list-group-item list-group-item-action\">";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["equipment"], "name", [], "any", false, false, false, 75), "html", null, true);
                    echo "</button>
                        ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['equipment'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 77
                echo "
                        ";
                // line 78
                if (((isset($context["isOrder"]) || array_key_exists("isOrder", $context) ? $context["isOrder"] : (function () { throw new RuntimeError('Variable "isOrder" does not exist.', 78, $this->source); })()) && (isset($context["isReturn"]) || array_key_exists("isReturn", $context) ? $context["isReturn"] : (function () { throw new RuntimeError('Variable "isReturn" does not exist.', 78, $this->source); })()))) {
                    // line 79
                    echo "                            <form class=\"form-inline mt-2\" action=\"";
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl("user_finishorder", ["o_id" => twig_get_attribute($this->env, $this->source, $context["order"], "id", [], "any", false, false, false, 79)]), "html", null, true);
                    echo "\" method=\"post\">
                                <label class=\"my-1 mr-2\" for=\"returnOrder\">Zwróć do stacji</label>
                                <select class=\"custom-select my-1 mr-sm-2\" name=\"returnOrder\">
                                    <option selected>Wybierz...</option>
                                    ";
                    // line 83
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable((isset($context["departments"]) || array_key_exists("departments", $context) ? $context["departments"] : (function () { throw new RuntimeError('Variable "departments" does not exist.', 83, $this->source); })()));
                    foreach ($context['_seq'] as $context["_key"] => $context["department"]) {
                        // line 84
                        echo "                                        <option value=\"";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["department"], "id", [], "any", false, false, false, 84), "html", null, true);
                        echo "\">";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["department"], "address", [], "any", false, false, false, 84), "html", null, true);
                        echo "</option>
                                    ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['department'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 86
                    echo "                                </select>
                                <button type=\"submit\" class=\"btn btn-primary my-1\">Zwróć</button>
                            </form>
                        ";
                }
                // line 90
                echo "                    </div>
                </div>
            </div>
        </div>
    ";
            }
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 96
            echo "    <div class=\"alert alert-primary\" role=\"alert\">
        Ups :( <br>";
            // line 97
            echo twig_escape_filter($this->env, (isset($context["description"]) || array_key_exists("description", $context) ? $context["description"] : (function () { throw new RuntimeError('Variable "description" does not exist.', 97, $this->source); })()), "html", null, true);
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
        return array (  303 => 97,  300 => 96,  290 => 90,  284 => 86,  273 => 84,  269 => 83,  261 => 79,  259 => 78,  256 => 77,  247 => 75,  243 => 74,  238 => 72,  232 => 69,  228 => 68,  224 => 67,  220 => 66,  213 => 64,  204 => 60,  198 => 59,  193 => 57,  190 => 56,  183 => 51,  179 => 49,  177 => 48,  174 => 47,  168 => 43,  157 => 41,  153 => 40,  145 => 36,  143 => 35,  139 => 33,  130 => 31,  126 => 30,  121 => 28,  115 => 25,  112 => 24,  106 => 22,  101 => 20,  96 => 19,  94 => 18,  89 => 16,  85 => 15,  78 => 13,  68 => 8,  62 => 7,  57 => 5,  54 => 4,  51 => 3,  48 => 2,  43 => 1,);
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
                        {{ title2 }} #{{ counter + 1 }}
                    </button>
                </h2>
            </div>

            <div id=\"collapse{{ order.id }}\" class=\"collapse show\" aria-labelledby=\"heading{{ order.id }}\" data-parent=\"#accordionExample\">
                <div class=\"card-body\">
                    <p>Stacja początkowa: {{ order.startDepartment.address }} </p>
                    <p>Stacja końcowa: {{ order.endDepartment.address | default(\"brak\") }}</p>

                    {% if isOrder %}
                    <p>Data rozpoczęcia: {{ order.created_at | date(\"Y-m-d H:i\")}}</p>
                    <p>Data zakończenia: {{ order.finished_at | default(\"brak\") }}</p>
                    {% else %}
                    <p>Data rezerwacji: {{ order.reserved_at | date(\"Y-m-d H:i\") }}</p>
                    {% endif %}

                    <p>Cena końcowa: {{ order.price | default(0)}} zł</p>
                    <div class=\"list-group\">
                        <button type=\"button\" class=\"list-group-item list-group-item-action active\">
                            {{ title1 }} sprzęty
                        </button>
                        {% for equipment in order.equipments %}
                            <button type=\"button\" class=\"list-group-item list-group-item-action\">{{ equipment.name }}</button>
                        {% endfor %}
                    </div>

                    {% if isOrder and isReturn %}
                    <form class=\"form-inline mt-2\" action=\"{{ url(\"user_finishorder\", {\"id\": order.id})}}\" method=\"post\">
                        <label class=\"my-1 mr-2\" for=\"returnOrder\">Zwróć do stacji</label>
                        <select class=\"custom-select my-1 mr-sm-2\" name=\"returnOrder\">
                            <option selected>Wybierz...</option>
                            {% for department in departments %}
                            <option value=\"{{ department.id }}\">{{ department.address }}</option>
                            {% endfor %}
                        </select>
                        <button type=\"submit\" class=\"btn btn-primary my-1\">Zwróć</button>
                    </form>
                    {% endif %}

                    {% if not isOrder %}

                    {% endif %}

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

                        {% if isOrder and isReturn %}
                            <form class=\"form-inline mt-2\" action=\"{{ url(\"user_finishorder\", {\"o_id\": order.id})}}\" method=\"post\">
                                <label class=\"my-1 mr-2\" for=\"returnOrder\">Zwróć do stacji</label>
                                <select class=\"custom-select my-1 mr-sm-2\" name=\"returnOrder\">
                                    <option selected>Wybierz...</option>
                                    {% for department in departments %}
                                        <option value=\"{{ department.id }}\">{{ department.address }}</option>
                                    {% endfor %}
                                </select>
                                <button type=\"submit\" class=\"btn btn-primary my-1\">Zwróć</button>
                            </form>
                        {% endif %}
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
