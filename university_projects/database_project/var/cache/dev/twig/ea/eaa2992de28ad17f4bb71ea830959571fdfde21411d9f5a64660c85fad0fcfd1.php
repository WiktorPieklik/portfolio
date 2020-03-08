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
class __TwigTemplate_190e4ffe282b1324d3039fcfba1b76e65275fe6ed99d6b1298a89311840db3c7 extends \Twig\Template
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
                echo "        <div class=\"card\" xmlns=\"http://www.w3.org/1999/html\">
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
                    echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('dateOrDefault')->getCallable(), [twig_get_attribute($this->env, $this->source, $context["order"], "finished_at", [], "any", false, false, false, 20), "brak"]), "html", null, true);
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
                            ";
                    // line 39
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(call_user_func_array($this->env->getFunction('availableDepartments')->getCallable(), [$context["order"]]));
                    foreach ($context['_seq'] as $context["_key"] => $context["department"]) {
                        // line 40
                        echo "                            <option value=\"";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["department"], "id", [], "any", false, false, false, 40), "html", null, true);
                        echo "\">";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["department"], "address", [], "any", false, false, false, 40), "html", null, true);
                        echo "</option>
                            ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['department'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 42
                    echo "                        </select>
                        <button type=\"submit\" class=\"btn btn-primary my-1\">Zwróc</button>
                        <p>
                            <a class=\"btn btn-danger ml-2 mt-3\" data-toggle=\"collapse\" href=\"#damageReport\" role=\"button\" aria-expanded=\"false\" aria-controls=\"collapseExample\">
                                Zgłoś awarię
                            </a>
                        </p>
                    </form>

                    <div class=\"collapse\" id=\"damageReport\">
                        <div class=\"card card-body\">
                            <form class=\"form-inline\" action=\"";
                    // line 53
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl("user_damagereport", ["id" => twig_get_attribute($this->env, $this->source, $context["order"], "id", [], "any", false, false, false, 53)]), "html", null, true);
                    echo "\" method=\"post\">
                                <div class=\"form-group\">
                                    <label for=\"order_equipments\" class=\"mb-1\">Wybierz zepsuty sprzęt (wciśnij ctrl by wybrać kilka opcji)</label>
                                    <select multiple class=\"form-control mb-2\" style=\"width: 100%\" id=\"order_equipments\" name=\"order_equipments[]\">
                                        ";
                    // line 57
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["order"], "equipments", [], "any", false, false, false, 57));
                    foreach ($context['_seq'] as $context["_key"] => $context["equipment"]) {
                        // line 58
                        echo "                                        <option value=\"";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["equipment"], "id", [], "any", false, false, false, 58), "html", null, true);
                        echo "\">";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["equipment"], "name", [], "any", false, false, false, 58), "html", null, true);
                        echo "</option>
                                        ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['equipment'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 60
                    echo "                                    </select>
                                </div>
                                <div class=\"form-group\" style=\"width: 100%\">
                                    <label class=\"my-1 mr-2\" for=\"returnOrderDamage\">Zwróć do stacji</label>
                                        <select class=\"custom-select my-1 mr-sm-2\" name=\"returnOrderDamageDepartmentId\">
                                            ";
                    // line 65
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(call_user_func_array($this->env->getFunction('availableDepartments')->getCallable(), [$context["order"]]));
                    foreach ($context['_seq'] as $context["_key"] => $context["department"]) {
                        // line 66
                        echo "                                                <option value=\"";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["department"], "id", [], "any", false, false, false, 66), "html", null, true);
                        echo "\">";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["department"], "address", [], "any", false, false, false, 66), "html", null, true);
                        echo "</option>
                                            ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['department'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 68
                    echo "                                        </select>
                                </div>
                                <input type=\"text\" class=\"form-control\" style=\"width: 100%\" name=\"message\" placeholder=\"Opisz co się zepsuło...\">
                                <button type=\"submit\" class=\"btn btn-outline-secondary mt-2\">Zgłoś awarię</button>
                            </form>
                        </div>
                    </div>
                    ";
                }
                // line 76
                echo "
                    ";
                // line 77
                if ( !(isset($context["isOrder"]) || array_key_exists("isOrder", $context) ? $context["isOrder"] : (function () { throw new RuntimeError('Variable "isOrder" does not exist.', 77, $this->source); })())) {
                    // line 78
                    echo "                        <div class=\"container mt-3\">
                            <button type=\"button\" class=\"btn btn-primary btn-sm float-right mb-2\" data-toggle=\"modal\" data-target=\"#orderModal\">
                                Złóż zamówienie
                            </button>
                        </div>

                        <div class=\"modal fade\" id=\"orderModal\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"exampleModalLabel\" aria-hidden=\"true\">
                            <div class=\"modal-dialog\" role=\"document\">
                                <div class=\"modal-content\">
                                    <div class=\"modal-header\">
                                        <h5 class=\"modal-title\" id=\"exampleModalLabel\">Składanie zamówienia</h5>
                                        <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
                                        </button>
                                    </div>
                                    <div class=\"modal-body\">
                                        Czy na pewno chcesz złożyć zamówienie na:
                                        ";
                    // line 94
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["order"], "equipments", [], "any", false, false, false, 94));
                    foreach ($context['_seq'] as $context["_key"] => $context["equipment"]) {
                        // line 95
                        echo "                                             <br /> ";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["equipment"], "name", [], "any", false, false, false, 95), "html", null, true);
                        echo "
                                        ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['equipment'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 96
                    echo "?
                                    </div>
                                    <div class=\"modal-footer\">
                                        <form class=\"float-left mr-2\" action=\"";
                    // line 99
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl("user_makeorder", ["id" => $this->extensions['App\Twig\UserExtension']->getUserId()]), "html", null, true);
                    echo "\" method=\"post\">
                                            <button type=\"submit\" class=\"btn btn-primary\">Tak</button>
                                            <input type=\"hidden\" name=\"isReservation\" value=true>
                                            <input type=\"hidden\" name=\"reservationId\" value=";
                    // line 102
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["order"], "id", [], "any", false, false, false, 102), "html", null, true);
                    echo ">
                                        </form>
                                        <button type=\"button\" class=\"btn btn-secondary\" data-dismiss=\"modal\">Nie</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    ";
                }
                // line 110
                echo "
                </div>
            </div>
        </div>
    ";
            } else {
                // line 115
                echo "        <div class=\"card\">
            <div class=\"card-header\" id=\"heading";
                // line 116
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["order"], "id", [], "any", false, false, false, 116), "html", null, true);
                echo "\">
                <h2 class=\"mb-0\">
                    <button class=\"btn btn-link collapsed\" type=\"button\" data-toggle=\"collapse\" data-target=\"#collapse";
                // line 118
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["order"], "id", [], "any", false, false, false, 118), "html", null, true);
                echo "\" aria-expanded=\"false\" aria-controls=\"collapse";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["order"], "id", [], "any", false, false, false, 118), "html", null, true);
                echo "\">
                        ";
                // line 119
                echo twig_escape_filter($this->env, (isset($context["title2"]) || array_key_exists("title2", $context) ? $context["title2"] : (function () { throw new RuntimeError('Variable "title2" does not exist.', 119, $this->source); })()), "html", null, true);
                echo " #";
                echo twig_escape_filter($this->env, ((isset($context["counter"]) || array_key_exists("counter", $context) ? $context["counter"] : (function () { throw new RuntimeError('Variable "counter" does not exist.', 119, $this->source); })()) + 1), "html", null, true);
                echo "
                    </button>
                </h2>
            </div>
            <div id=\"collapse";
                // line 123
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["order"], "id", [], "any", false, false, false, 123), "html", null, true);
                echo "\" class=\"collapse\" aria-labelledby=\"heading";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["order"], "id", [], "any", false, false, false, 123), "html", null, true);
                echo "\" data-parent=\"#accordionExample\">
                <div class=\"card-body\">
                    <p>Stacja początkowa: ";
                // line 125
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["order"], "startDepartment", [], "any", false, false, false, 125), "address", [], "any", false, false, false, 125), "html", null, true);
                echo " </p>
                    <p>Stacja końcowa: ";
                // line 126
                echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["order"], "endDepartment", [], "any", false, true, false, 126), "address", [], "any", true, true, false, 126)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["order"], "endDepartment", [], "any", false, true, false, 126), "address", [], "any", false, false, false, 126), "brak")) : ("brak")), "html", null, true);
                echo "</p>
                    <p>Data rozpoczęcia: ";
                // line 127
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["order"], "created_at", [], "any", false, false, false, 127), "Y-m-d H:i"), "html", null, true);
                echo "</p>
                    <p>Data zakończenia: ";
                // line 128
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('dateOrDefault')->getCallable(), [twig_get_attribute($this->env, $this->source, $context["order"], "finished_at", [], "any", false, false, false, 128), "brak"]), "html", null, true);
                echo "</p>
                    <p>Cena końcowa: ";
                // line 129
                echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, $context["order"], "price", [], "any", true, true, false, 129)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, $context["order"], "price", [], "any", false, false, false, 129), 0)) : (0)), "html", null, true);
                echo " zł</p>
                    <div class=\"list-group\">
                        <button type=\"button\" class=\"list-group-item list-group-item-action active\">
                            ";
                // line 132
                echo twig_escape_filter($this->env, (isset($context["title1"]) || array_key_exists("title1", $context) ? $context["title1"] : (function () { throw new RuntimeError('Variable "title1" does not exist.', 132, $this->source); })()), "html", null, true);
                echo " sprzęty
                        </button>
                        ";
                // line 134
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["order"], "equipments", [], "any", false, false, false, 134));
                foreach ($context['_seq'] as $context["_key"] => $context["equipment"]) {
                    // line 135
                    echo "                            <button type=\"button\" class=\"list-group-item list-group-item-action\">";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["equipment"], "name", [], "any", false, false, false, 135), "html", null, true);
                    echo "</button>
                        ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['equipment'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 137
                echo "
                        ";
                // line 138
                if (((isset($context["isOrder"]) || array_key_exists("isOrder", $context) ? $context["isOrder"] : (function () { throw new RuntimeError('Variable "isOrder" does not exist.', 138, $this->source); })()) && (isset($context["isReturn"]) || array_key_exists("isReturn", $context) ? $context["isReturn"] : (function () { throw new RuntimeError('Variable "isReturn" does not exist.', 138, $this->source); })()))) {
                    // line 139
                    echo "                            <form class=\"form-inline mt-2\" action=\"";
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl("user_finishorder", ["id" => twig_get_attribute($this->env, $this->source, $context["order"], "id", [], "any", false, false, false, 139)]), "html", null, true);
                    echo "\" method=\"post\">
                                <label class=\"my-1 mr-2\" for=\"returnOrder\">Zwróć do stacji</label>
                                <select class=\"custom-select my-1 mr-sm-2\" name=\"returnOrder\">
                                    ";
                    // line 142
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(call_user_func_array($this->env->getFunction('availableDepartments')->getCallable(), [$context["order"]]));
                    foreach ($context['_seq'] as $context["_key"] => $context["department"]) {
                        // line 143
                        echo "                                        <option value=\"";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["department"], "id", [], "any", false, false, false, 143), "html", null, true);
                        echo "\">";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["department"], "address", [], "any", false, false, false, 143), "html", null, true);
                        echo "</option>
                                    ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['department'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 145
                    echo "                                </select>
                                <button type=\"submit\" class=\"btn btn-primary my-1\">Zwróć</button>
                                <p>
                                    <a class=\"btn btn-danger ml-2 mt-3\" data-toggle=\"collapse\" href=\"#damageReport\" role=\"button\" aria-expanded=\"false\" aria-controls=\"collapseExample\">
                                        Zgłoś awarię
                                    </a>
                                </p>
                            </form>

                            <div class=\"collapse\" id=\"damageReport\">
                                <div class=\"card card-body\">
                                    <form class=\"form-inline\" action=\"";
                    // line 156
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl("user_damagereport", ["id" => twig_get_attribute($this->env, $this->source, $context["order"], "id", [], "any", false, false, false, 156)]), "html", null, true);
                    echo "\" method=\"post\">
                                        <div class=\"form-group\">
                                            <label for=\"order_equipments\" class=\"mb-1\">Wybierz zepsuty sprzęt (wciśnij ctrl by wybrać kilka opcji)</label>
                                            <select multiple class=\"form-control mb-2\" style=\"width: 100%\" id=\"order_equipments\" name=\"order_equipments[]\">
                                                ";
                    // line 160
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["order"], "equipments", [], "any", false, false, false, 160));
                    foreach ($context['_seq'] as $context["_key"] => $context["equipment"]) {
                        // line 161
                        echo "                                                    <option value=\"";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["equipment"], "id", [], "any", false, false, false, 161), "html", null, true);
                        echo "\">";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["equipment"], "name", [], "any", false, false, false, 161), "html", null, true);
                        echo "</option>
                                                ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['equipment'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 163
                    echo "                                            </select>
                                        </div>
                                        <div class=\"form-group\" style=\"width: 100%\">
                                            <label class=\"my-1 mr-2\" for=\"returnOrderDamage\">Zwróć do stacji</label>
                                            <select class=\"custom-select my-1 mr-sm-2\" name=\"returnOrderDamageDepartmentId\">
                                                ";
                    // line 168
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(call_user_func_array($this->env->getFunction('availableDepartments')->getCallable(), [$context["order"]]));
                    foreach ($context['_seq'] as $context["_key"] => $context["department"]) {
                        // line 169
                        echo "                                                    <option value=\"";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["department"], "id", [], "any", false, false, false, 169), "html", null, true);
                        echo "\">";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["department"], "address", [], "any", false, false, false, 169), "html", null, true);
                        echo "</option>
                                                ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['department'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 171
                    echo "                                            </select>
                                        </div>
                                        <input type=\"text\" class=\"form-control\" style=\"width: 100%\" name=\"message\" placeholder=\"Opisz co się zepsuło...\">
                                        <button type=\"submit\" class=\"btn btn-outline-secondary mt-2\">Zgłoś awarię</button>
                                    </form>
                                </div>
                            </div>

                        ";
                }
                // line 180
                echo "
                        ";
                // line 181
                if ( !(isset($context["isOrder"]) || array_key_exists("isOrder", $context) ? $context["isOrder"] : (function () { throw new RuntimeError('Variable "isOrder" does not exist.', 181, $this->source); })())) {
                    // line 182
                    echo "                            <div class=\"container mt-3\">
                                <button type=\"button\" class=\"btn btn-primary btn-sm float-right mb-2\" data-toggle=\"modal\" data-target=\"#orderModal2\">
                                    Złóż zamówienie
                                </button>
                            </div>

                            <div class=\"modal fade\" id=\"orderModal2\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"exampleModalLabel\" aria-hidden=\"true\">
                                <div class=\"modal-dialog\" role=\"document\">
                                    <div class=\"modal-content\">
                                        <div class=\"modal-header\">
                                            <h5 class=\"modal-title\" id=\"exampleModalLabel\">Składanie zamówienia</h5>
                                            <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
                                            </button>
                                        </div>
                                        <div class=\"modal-body\">
                                            Czy na pewno chcesz złożyć zamówienie na:
                                            ";
                    // line 198
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["order"], "equipments", [], "any", false, false, false, 198));
                    foreach ($context['_seq'] as $context["_key"] => $context["equipment"]) {
                        // line 199
                        echo "                                        <br /> ";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["equipment"], "name", [], "any", false, false, false, 199), "html", null, true);
                        echo "
                                            ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['equipment'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 200
                    echo "?
                                        </div>
                                        <div class=\"modal-footer\">
                                            <form class=\"float-left mr-2\" action=\"";
                    // line 203
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl("user_makeorder", ["id" => $this->extensions['App\Twig\UserExtension']->getUserId()]), "html", null, true);
                    echo "\" method=\"post\">
                                                <button type=\"submit\" class=\"btn btn-primary\">Tak</button>
                                                <input type=\"hidden\" name=\"isReservation\" value=true>
                                                <input type=\"hidden\" name=\"reservationId\" value=";
                    // line 206
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["order"], "id", [], "any", false, false, false, 206), "html", null, true);
                    echo ">
                                            </form>
                                            <button type=\"button\" class=\"btn btn-secondary\" data-dismiss=\"modal\">Nie</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        ";
                }
                // line 214
                echo "                    </div>
                </div>
            </div>
        </div>
    ";
            }
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 220
            echo "    <div class=\"alert alert-primary\" role=\"alert\">
        Ups :( <br>";
            // line 221
            echo twig_escape_filter($this->env, (isset($context["description"]) || array_key_exists("description", $context) ? $context["description"] : (function () { throw new RuntimeError('Variable "description" does not exist.', 221, $this->source); })()), "html", null, true);
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
        return array (  535 => 221,  532 => 220,  522 => 214,  511 => 206,  505 => 203,  500 => 200,  491 => 199,  487 => 198,  469 => 182,  467 => 181,  464 => 180,  453 => 171,  442 => 169,  438 => 168,  431 => 163,  420 => 161,  416 => 160,  409 => 156,  396 => 145,  385 => 143,  381 => 142,  374 => 139,  372 => 138,  369 => 137,  360 => 135,  356 => 134,  351 => 132,  345 => 129,  341 => 128,  337 => 127,  333 => 126,  329 => 125,  322 => 123,  313 => 119,  307 => 118,  302 => 116,  299 => 115,  292 => 110,  281 => 102,  275 => 99,  270 => 96,  261 => 95,  257 => 94,  239 => 78,  237 => 77,  234 => 76,  224 => 68,  213 => 66,  209 => 65,  202 => 60,  191 => 58,  187 => 57,  180 => 53,  167 => 42,  156 => 40,  152 => 39,  145 => 36,  143 => 35,  139 => 33,  130 => 31,  126 => 30,  121 => 28,  115 => 25,  112 => 24,  106 => 22,  101 => 20,  96 => 19,  94 => 18,  89 => 16,  85 => 15,  78 => 13,  68 => 8,  62 => 7,  57 => 5,  54 => 4,  51 => 3,  48 => 2,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% for order in myOrders %}
    {% set counter = counter + 1 %}
    {% if counter == 0 %}
        <div class=\"card\" xmlns=\"http://www.w3.org/1999/html\">
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
                    <p>Data zakończenia: {{ dateOrDefault(order.finished_at, \"brak\") }}</p>
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
                            {% for department in availableDepartments(order) %}
                            <option value=\"{{ department.id }}\">{{ department.address }}</option>
                            {% endfor %}
                        </select>
                        <button type=\"submit\" class=\"btn btn-primary my-1\">Zwróc</button>
                        <p>
                            <a class=\"btn btn-danger ml-2 mt-3\" data-toggle=\"collapse\" href=\"#damageReport\" role=\"button\" aria-expanded=\"false\" aria-controls=\"collapseExample\">
                                Zgłoś awarię
                            </a>
                        </p>
                    </form>

                    <div class=\"collapse\" id=\"damageReport\">
                        <div class=\"card card-body\">
                            <form class=\"form-inline\" action=\"{{ url(\"user_damagereport\", {\"id\": order.id}) }}\" method=\"post\">
                                <div class=\"form-group\">
                                    <label for=\"order_equipments\" class=\"mb-1\">Wybierz zepsuty sprzęt (wciśnij ctrl by wybrać kilka opcji)</label>
                                    <select multiple class=\"form-control mb-2\" style=\"width: 100%\" id=\"order_equipments\" name=\"order_equipments[]\">
                                        {% for equipment in order.equipments %}
                                        <option value=\"{{ equipment.id }}\">{{ equipment.name }}</option>
                                        {% endfor %}
                                    </select>
                                </div>
                                <div class=\"form-group\" style=\"width: 100%\">
                                    <label class=\"my-1 mr-2\" for=\"returnOrderDamage\">Zwróć do stacji</label>
                                        <select class=\"custom-select my-1 mr-sm-2\" name=\"returnOrderDamageDepartmentId\">
                                            {% for department in availableDepartments(order) %}
                                                <option value=\"{{ department.id }}\">{{ department.address }}</option>
                                            {% endfor %}
                                        </select>
                                </div>
                                <input type=\"text\" class=\"form-control\" style=\"width: 100%\" name=\"message\" placeholder=\"Opisz co się zepsuło...\">
                                <button type=\"submit\" class=\"btn btn-outline-secondary mt-2\">Zgłoś awarię</button>
                            </form>
                        </div>
                    </div>
                    {% endif %}

                    {% if not isOrder %}
                        <div class=\"container mt-3\">
                            <button type=\"button\" class=\"btn btn-primary btn-sm float-right mb-2\" data-toggle=\"modal\" data-target=\"#orderModal\">
                                Złóż zamówienie
                            </button>
                        </div>

                        <div class=\"modal fade\" id=\"orderModal\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"exampleModalLabel\" aria-hidden=\"true\">
                            <div class=\"modal-dialog\" role=\"document\">
                                <div class=\"modal-content\">
                                    <div class=\"modal-header\">
                                        <h5 class=\"modal-title\" id=\"exampleModalLabel\">Składanie zamówienia</h5>
                                        <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
                                        </button>
                                    </div>
                                    <div class=\"modal-body\">
                                        Czy na pewno chcesz złożyć zamówienie na:
                                        {% for equipment in order.equipments %}
                                             <br /> {{ equipment.name }}
                                        {% endfor %}?
                                    </div>
                                    <div class=\"modal-footer\">
                                        <form class=\"float-left mr-2\" action=\"{{ url(\"user_makeorder\", {\"id\": getUserId()}) }}\" method=\"post\">
                                            <button type=\"submit\" class=\"btn btn-primary\">Tak</button>
                                            <input type=\"hidden\" name=\"isReservation\" value=true>
                                            <input type=\"hidden\" name=\"reservationId\" value={{ order.id }}>
                                        </form>
                                        <button type=\"button\" class=\"btn btn-secondary\" data-dismiss=\"modal\">Nie</button>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                    <p>Data zakończenia: {{ dateOrDefault(order.finished_at, \"brak\") }}</p>
                    <p>Cena końcowa: {{ order.price | default(0)}} zł</p>
                    <div class=\"list-group\">
                        <button type=\"button\" class=\"list-group-item list-group-item-action active\">
                            {{ title1 }} sprzęty
                        </button>
                        {% for equipment in order.equipments %}
                            <button type=\"button\" class=\"list-group-item list-group-item-action\">{{ equipment.name }}</button>
                        {% endfor %}

                        {% if isOrder and isReturn %}
                            <form class=\"form-inline mt-2\" action=\"{{ url(\"user_finishorder\", {\"id\": order.id})}}\" method=\"post\">
                                <label class=\"my-1 mr-2\" for=\"returnOrder\">Zwróć do stacji</label>
                                <select class=\"custom-select my-1 mr-sm-2\" name=\"returnOrder\">
                                    {% for department in availableDepartments(order) %}
                                        <option value=\"{{ department.id }}\">{{ department.address }}</option>
                                    {% endfor %}
                                </select>
                                <button type=\"submit\" class=\"btn btn-primary my-1\">Zwróć</button>
                                <p>
                                    <a class=\"btn btn-danger ml-2 mt-3\" data-toggle=\"collapse\" href=\"#damageReport\" role=\"button\" aria-expanded=\"false\" aria-controls=\"collapseExample\">
                                        Zgłoś awarię
                                    </a>
                                </p>
                            </form>

                            <div class=\"collapse\" id=\"damageReport\">
                                <div class=\"card card-body\">
                                    <form class=\"form-inline\" action=\"{{ url(\"user_damagereport\", {\"id\": order.id}) }}\" method=\"post\">
                                        <div class=\"form-group\">
                                            <label for=\"order_equipments\" class=\"mb-1\">Wybierz zepsuty sprzęt (wciśnij ctrl by wybrać kilka opcji)</label>
                                            <select multiple class=\"form-control mb-2\" style=\"width: 100%\" id=\"order_equipments\" name=\"order_equipments[]\">
                                                {% for equipment in order.equipments %}
                                                    <option value=\"{{ equipment.id }}\">{{ equipment.name }}</option>
                                                {% endfor %}
                                            </select>
                                        </div>
                                        <div class=\"form-group\" style=\"width: 100%\">
                                            <label class=\"my-1 mr-2\" for=\"returnOrderDamage\">Zwróć do stacji</label>
                                            <select class=\"custom-select my-1 mr-sm-2\" name=\"returnOrderDamageDepartmentId\">
                                                {% for department in availableDepartments(order) %}
                                                    <option value=\"{{ department.id }}\">{{ department.address }}</option>
                                                {% endfor %}
                                            </select>
                                        </div>
                                        <input type=\"text\" class=\"form-control\" style=\"width: 100%\" name=\"message\" placeholder=\"Opisz co się zepsuło...\">
                                        <button type=\"submit\" class=\"btn btn-outline-secondary mt-2\">Zgłoś awarię</button>
                                    </form>
                                </div>
                            </div>

                        {% endif %}

                        {% if not isOrder %}
                            <div class=\"container mt-3\">
                                <button type=\"button\" class=\"btn btn-primary btn-sm float-right mb-2\" data-toggle=\"modal\" data-target=\"#orderModal2\">
                                    Złóż zamówienie
                                </button>
                            </div>

                            <div class=\"modal fade\" id=\"orderModal2\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"exampleModalLabel\" aria-hidden=\"true\">
                                <div class=\"modal-dialog\" role=\"document\">
                                    <div class=\"modal-content\">
                                        <div class=\"modal-header\">
                                            <h5 class=\"modal-title\" id=\"exampleModalLabel\">Składanie zamówienia</h5>
                                            <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
                                            </button>
                                        </div>
                                        <div class=\"modal-body\">
                                            Czy na pewno chcesz złożyć zamówienie na:
                                            {% for equipment in order.equipments %}
                                        <br /> {{ equipment.name }}
                                            {% endfor %}?
                                        </div>
                                        <div class=\"modal-footer\">
                                            <form class=\"float-left mr-2\" action=\"{{ url(\"user_makeorder\", {\"id\": getUserId()}) }}\" method=\"post\">
                                                <button type=\"submit\" class=\"btn btn-primary\">Tak</button>
                                                <input type=\"hidden\" name=\"isReservation\" value=true>
                                                <input type=\"hidden\" name=\"reservationId\" value={{ order.id }}>
                                            </form>
                                            <button type=\"button\" class=\"btn btn-secondary\" data-dismiss=\"modal\">Nie</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
