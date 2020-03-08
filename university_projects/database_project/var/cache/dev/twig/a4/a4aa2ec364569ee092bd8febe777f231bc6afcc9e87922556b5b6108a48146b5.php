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

/* serviceman/mydamagereports.html.twig */
class __TwigTemplate_d1d38c1b83a666a21a1a40cda35ed22fc692b62e1caaf526322f9ef40decb6ab extends \Twig\Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "serviceman/mydamagereports.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "serviceman/mydamagereports.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "serviceman/mydamagereports.html.twig", 1);
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
        echo "    <h2>Przyjęte zgłoszenia awarii</h2>
    ";
        // line 4
        $context["counter"] = 0;
        // line 5
        echo "    <div class=\"accordion\" id=\"accordionExample\">
    ";
        // line 6
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["damageReports"]) || array_key_exists("damageReports", $context) ? $context["damageReports"] : (function () { throw new RuntimeError('Variable "damageReports" does not exist.', 6, $this->source); })()));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["report"]) {
            // line 7
            echo "        ";
            $context["counter"] = ((isset($context["counter"]) || array_key_exists("counter", $context) ? $context["counter"] : (function () { throw new RuntimeError('Variable "counter" does not exist.', 7, $this->source); })()) + 1);
            // line 8
            echo "
        ";
            // line 9
            if (((isset($context["counter"]) || array_key_exists("counter", $context) ? $context["counter"] : (function () { throw new RuntimeError('Variable "counter" does not exist.', 9, $this->source); })()) == 1)) {
                // line 10
                echo "            <div class=\"card\" xmlns=\"http://www.w3.org/1999/html\">
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
                            Zgłoszenie awarii #";
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
                echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl("serviceman_handleequipments");
                echo "\" method=\"post\">
                            <h5 class=\"card-title\">ID użytkownika: ";
                // line 22
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["report"], "attachedOrder", [], "any", false, false, false, 22), "user", [], "any", false, false, false, 22), "id", [], "any", false, false, false, 22), "html", null, true);
                echo "</h5>
                            <p class=\"card-text\">Email użytkownika: ";
                // line 23
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["report"], "attachedOrder", [], "any", false, false, false, 23), "user", [], "any", false, false, false, 23), "email", [], "any", false, false, false, 23), "html", null, true);
                echo "</p>
                            <p class=\"card-text\">Data zgłoszenia: ";
                // line 24
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["report"], "created_at", [], "any", false, false, false, 24), "Y-m-d H:i"), "html", null, true);
                echo "</p>
                            <p class=\"card-text\">Wiadomość zgłoszenia: <strong>";
                // line 25
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["report"], "message", [], "any", false, false, false, 25), "html", null, true);
                echo "</strong></p>
                            <div class=\"list-group\">
                                <button type=\"button\" class=\"list-group-item list-group-item-action active\">
                                    Sprzęty oczekujące na naprawe
                                </button>
                                <select multiple class=\"form-control mb-2\" style=\"width: 100%\" id=\"order_equipments\" name=\"damage_equipments[]\">
                                    ";
                // line 31
                $context["leftEquipments"] = 0;
                // line 32
                echo "                                    ";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["report"], "equipments", [], "any", false, false, false, 32));
                foreach ($context['_seq'] as $context["_key"] => $context["equipment"]) {
                    // line 33
                    echo "                                        ";
                    if ((twig_get_attribute($this->env, $this->source, $context["equipment"], "status", [], "any", false, false, false, 33) == "status_damaged")) {
                        // line 34
                        echo "                                            ";
                        $context["leftEquipments"] = ((isset($context["leftEquipments"]) || array_key_exists("leftEquipments", $context) ? $context["leftEquipments"] : (function () { throw new RuntimeError('Variable "leftEquipments" does not exist.', 34, $this->source); })()) + 1);
                        // line 35
                        echo "                                        <option value=\"";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["equipment"], "id", [], "any", false, false, false, 35), "html", null, true);
                        echo "\">";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["equipment"], "name", [], "any", false, false, false, 35), "html", null, true);
                        echo "</option>
                                        ";
                    }
                    // line 37
                    echo "                                    ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['equipment'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 38
                echo "                                </select>
                                <small id=\"equipmentHelp\" class=\"form-text text-muted\">Wybierz sprzęt, który chcesz naprawić/zutylizować (wciśnij ctrl by wybrać kilka opcji)</small>

                            </div>
                            <!-- Buttons on card -->
                            ";
                // line 43
                if (((isset($context["leftEquipments"]) || array_key_exists("leftEquipments", $context) ? $context["leftEquipments"] : (function () { throw new RuntimeError('Variable "leftEquipments" does not exist.', 43, $this->source); })()) == 0)) {
                    // line 44
                    echo "                                ";
                    echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('redirect')->getCallable(), ["serviceman_finishdamagereport", ["id" => twig_get_attribute($this->env, $this->source, $context["report"], "id", [], "any", false, false, false, 44)]]), "html", null, true);
                    echo "
                            ";
                } else {
                    // line 46
                    echo "                            <button type=\"button\" class=\"btn btn-outline-danger mt-2 mb-2 float-right\" data-toggle=\"modal\" data-target=\"#repairModal\">
                                Utylizuj
                            </button>
                            <button type=\"submit\" name=\"repairButton\" value=\"true\" class=\"btn btn-outline-success float-right mt-2 mr-2\">Napraw</button>
                            <!-- End of buttons -->
                            ";
                }
                // line 52
                echo "                            <!-- Repair Modal Body -->
                            <div class=\"modal fade\" id=\"repairModal\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"exampleModalLabel\" aria-hidden=\"true\">
                                <div class=\"modal-dialog\" role=\"document\">
                                    <div class=\"modal-content\">
                                        <div class=\"modal-header\">
                                            <h5 class=\"modal-title\" id=\"exampleModalLabel\">Utylizacja sprzętu</h5>
                                        </div>
                                        <div class=\"modal-body\">
                                            Czy na pewno chcesz zutylizować sprzęt?
                                        </div>
                                        <div class=\"modal-footer\">
                                            <button type=\"submit\" name=\"utilizeButton\" value=\"true\" class=\"btn btn-primary\">Tak</button>
                                            <button type=\"button\" class=\"btn btn-secondary\" data-dismiss=\"modal\">Nie</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End of Repair Modal Body -->
                        </form>
                        <button type=\"button\" class=\"list-group-item list-group-item-action active mt-3\">
                            Wszystkie zgłoszone sprzęty
                        </button>
                        ";
                // line 74
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["report"], "equipments", [], "any", false, false, false, 74));
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
                echo "                    </div>
                </div>
            </div>
        ";
            } else {
                // line 81
                echo "            <div class=\"card\">
                <div class=\"card-header\" id=\"heading";
                // line 82
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["report"], "id", [], "any", false, false, false, 82), "html", null, true);
                echo "\">
                    <h2 class=\"mb-0\">
                        <button class=\"btn btn-link collapsed\" type=\"button\" data-toggle=\"collapse\" data-target=\"#collapse";
                // line 84
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["report"], "id", [], "any", false, false, false, 84), "html", null, true);
                echo "\" aria-expanded=\"false\" aria-controls=\"collapse";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["report"], "id", [], "any", false, false, false, 84), "html", null, true);
                echo "\">
                            Zgłoszenie awarii #";
                // line 85
                echo twig_escape_filter($this->env, (isset($context["counter"]) || array_key_exists("counter", $context) ? $context["counter"] : (function () { throw new RuntimeError('Variable "counter" does not exist.', 85, $this->source); })()), "html", null, true);
                echo "
                        </button>
                    </h2>
                </div>
                <div id=\"collapse";
                // line 89
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["report"], "id", [], "any", false, false, false, 89), "html", null, true);
                echo "\" class=\"collapse\" aria-labelledby=\"heading";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["report"], "id", [], "any", false, false, false, 89), "html", null, true);
                echo "\" data-parent=\"#accordionExample\">
                    <div class=\"card-body\">
                        <form class=\"form-group mb-2\" action=\"";
                // line 91
                echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl("serviceman_handleequipments");
                echo "\" method=\"post\">
                            <p class=\"card-text\">Email użytkownika: ";
                // line 92
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["report"], "attachedOrder", [], "any", false, false, false, 92), "user", [], "any", false, false, false, 92), "email", [], "any", false, false, false, 92), "html", null, true);
                echo "</p>
                            <p class=\"card-text\">Data zgłoszenia: ";
                // line 93
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["report"], "created_at", [], "any", false, false, false, 93), "Y-m-d H:i"), "html", null, true);
                echo "</p>
                            <p class=\"card-text\">Wiadomość zgłoszenia: <strong>";
                // line 94
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["report"], "message", [], "any", false, false, false, 94), "html", null, true);
                echo "</strong></p>
                            <div class=\"list-group\">
                                <button type=\"button\" class=\"list-group-item list-group-item-action active\">
                                    Sprzęty oczekujące na naprawe
                                </button>
                                <select multiple class=\"form-control mb-2\" style=\"width: 100%\" id=\"damage_equipments\" name=\"damage_equipments[]\">
                                    ";
                // line 100
                $context["leftEquipments"] = 0;
                // line 101
                echo "                                    ";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["report"], "equipments", [], "any", false, false, false, 101));
                foreach ($context['_seq'] as $context["_key"] => $context["equipment"]) {
                    // line 102
                    echo "                                        ";
                    if ((twig_get_attribute($this->env, $this->source, $context["equipment"], "status", [], "any", false, false, false, 102) == "status_damaged")) {
                        // line 103
                        echo "                                            ";
                        $context["leftEquipments"] = ((isset($context["leftEquipments"]) || array_key_exists("leftEquipments", $context) ? $context["leftEquipments"] : (function () { throw new RuntimeError('Variable "leftEquipments" does not exist.', 103, $this->source); })()) + 1);
                        // line 104
                        echo "                                            <option value=\"";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["equipment"], "id", [], "any", false, false, false, 104), "html", null, true);
                        echo "\">";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["equipment"], "name", [], "any", false, false, false, 104), "html", null, true);
                        echo "</option>
                                        ";
                    }
                    // line 106
                    echo "                                    ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['equipment'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 107
                echo "                                </select>
                                <small id=\"equipmentHelp\" class=\"form-text text-muted\">Wybierz sprzęt, który chcesz naprawić/zutylizować (wciśnij ctrl by wybrać kilka opcji)</small>

                            </div>
                            <!-- Buttons on card -->
                            ";
                // line 112
                if (((isset($context["leftEquipments"]) || array_key_exists("leftEquipments", $context) ? $context["leftEquipments"] : (function () { throw new RuntimeError('Variable "leftEquipments" does not exist.', 112, $this->source); })()) == 0)) {
                    // line 113
                    echo "                                ";
                    echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('redirect')->getCallable(), ["serviceman_finishdamagereport", ["id" => twig_get_attribute($this->env, $this->source, $context["report"], "id", [], "any", false, false, false, 113)]]), "html", null, true);
                    echo "
                            ";
                } else {
                    // line 115
                    echo "                            <button type=\"button\" class=\"btn btn-outline-danger mt-2 mb-2 float-right\" data-toggle=\"modal\" data-target=\"#repairModal";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["report"], "id", [], "any", false, false, false, 115), "html", null, true);
                    echo "\">
                                Utylizuj
                            </button>
                            <button type=\"submit\" name=\"repairButton\" value=\"true\" class=\"btn btn-outline-success float-right mt-2 mr-2\">Napraw</button>
                            <!-- End of buttons -->
                            ";
                }
                // line 121
                echo "
                            <!-- Repair Modal Body -->
                            <div class=\"modal fade\" id=\"repairModal";
                // line 123
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["report"], "id", [], "any", false, false, false, 123), "html", null, true);
                echo "\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"exampleModalLabel\" aria-hidden=\"true\">
                                <div class=\"modal-dialog\" role=\"document\">
                                    <div class=\"modal-content\">
                                        <div class=\"modal-header\">
                                            <h5 class=\"modal-title\" id=\"exampleModalLabel\">Utylizacja sprzętu</h5>
                                        </div>
                                        <div class=\"modal-body\">
                                            Czy na pewno chcesz zutylizować sprzęt?
                                        </div>
                                        <div class=\"modal-footer\">
                                            <button type=\"submit\" name=\"utilizeButton\" value=\"true\" class=\"btn btn-primary\">Tak</button>
                                            <button type=\"button\" class=\"btn btn-secondary\" data-dismiss=\"modal\">Nie</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End of Repair Modal Body -->
                        </form>
                        <button type=\"button\" class=\"list-group-item list-group-item-action active mt-3\">
                            Wszystkie zgłoszone sprzęty
                        </button>
                        ";
                // line 144
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["report"], "equipments", [], "any", false, false, false, 144));
                foreach ($context['_seq'] as $context["_key"] => $context["equipment"]) {
                    // line 145
                    echo "                            <button type=\"button\" class=\"list-group-item list-group-item-action\">";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["equipment"], "name", [], "any", false, false, false, 145), "html", null, true);
                    echo "</button>
                        ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['equipment'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 147
                echo "                    </div>
                </div>
            </div>
        ";
            }
            // line 151
            echo "
    ";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 153
            echo "        <div class=\"alert alert-primary\" role=\"alert\">
            Obecnie nie ma żadnych dostępnych zgłoszeń awarii.
        </div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['report'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 157
        echo "    </div>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "serviceman/mydamagereports.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  399 => 157,  390 => 153,  384 => 151,  378 => 147,  369 => 145,  365 => 144,  341 => 123,  337 => 121,  327 => 115,  321 => 113,  319 => 112,  312 => 107,  306 => 106,  298 => 104,  295 => 103,  292 => 102,  287 => 101,  285 => 100,  276 => 94,  272 => 93,  268 => 92,  264 => 91,  257 => 89,  250 => 85,  244 => 84,  239 => 82,  236 => 81,  230 => 77,  221 => 75,  217 => 74,  193 => 52,  185 => 46,  179 => 44,  177 => 43,  170 => 38,  164 => 37,  156 => 35,  153 => 34,  150 => 33,  145 => 32,  143 => 31,  134 => 25,  130 => 24,  126 => 23,  122 => 22,  118 => 21,  111 => 19,  103 => 14,  97 => 13,  92 => 11,  89 => 10,  87 => 9,  84 => 8,  81 => 7,  76 => 6,  73 => 5,  71 => 4,  68 => 3,  58 => 2,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'base.html.twig' %}
{% block body %}
    <h2>Przyjęte zgłoszenia awarii</h2>
    {% set counter = 0 %}
    <div class=\"accordion\" id=\"accordionExample\">
    {% for report in damageReports %}
        {% set counter = counter +1 %}

        {% if counter == 1%}
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
                        <form class=\"form-group mb-2\" action=\"{{ url(\"serviceman_handleequipments\") }}\" method=\"post\">
                            <h5 class=\"card-title\">ID użytkownika: {{ report.attachedOrder.user.id }}</h5>
                            <p class=\"card-text\">Email użytkownika: {{ report.attachedOrder.user.email}}</p>
                            <p class=\"card-text\">Data zgłoszenia: {{ report.created_at | date(\"Y-m-d H:i\") }}</p>
                            <p class=\"card-text\">Wiadomość zgłoszenia: <strong>{{ report.message }}</strong></p>
                            <div class=\"list-group\">
                                <button type=\"button\" class=\"list-group-item list-group-item-action active\">
                                    Sprzęty oczekujące na naprawe
                                </button>
                                <select multiple class=\"form-control mb-2\" style=\"width: 100%\" id=\"order_equipments\" name=\"damage_equipments[]\">
                                    {% set leftEquipments = 0 %}
                                    {% for equipment in report.equipments %}
                                        {% if equipment.status == \"status_damaged\" %}
                                            {% set leftEquipments = leftEquipments +1 %}
                                        <option value=\"{{ equipment.id }}\">{{ equipment.name }}</option>
                                        {% endif %}
                                    {% endfor %}
                                </select>
                                <small id=\"equipmentHelp\" class=\"form-text text-muted\">Wybierz sprzęt, który chcesz naprawić/zutylizować (wciśnij ctrl by wybrać kilka opcji)</small>

                            </div>
                            <!-- Buttons on card -->
                            {% if leftEquipments == 0 %}
                                {{ redirect(\"serviceman_finishdamagereport\", {\"id\" : report.id}) }}
                            {% else %}
                            <button type=\"button\" class=\"btn btn-outline-danger mt-2 mb-2 float-right\" data-toggle=\"modal\" data-target=\"#repairModal\">
                                Utylizuj
                            </button>
                            <button type=\"submit\" name=\"repairButton\" value=\"true\" class=\"btn btn-outline-success float-right mt-2 mr-2\">Napraw</button>
                            <!-- End of buttons -->
                            {% endif %}
                            <!-- Repair Modal Body -->
                            <div class=\"modal fade\" id=\"repairModal\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"exampleModalLabel\" aria-hidden=\"true\">
                                <div class=\"modal-dialog\" role=\"document\">
                                    <div class=\"modal-content\">
                                        <div class=\"modal-header\">
                                            <h5 class=\"modal-title\" id=\"exampleModalLabel\">Utylizacja sprzętu</h5>
                                        </div>
                                        <div class=\"modal-body\">
                                            Czy na pewno chcesz zutylizować sprzęt?
                                        </div>
                                        <div class=\"modal-footer\">
                                            <button type=\"submit\" name=\"utilizeButton\" value=\"true\" class=\"btn btn-primary\">Tak</button>
                                            <button type=\"button\" class=\"btn btn-secondary\" data-dismiss=\"modal\">Nie</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End of Repair Modal Body -->
                        </form>
                        <button type=\"button\" class=\"list-group-item list-group-item-action active mt-3\">
                            Wszystkie zgłoszone sprzęty
                        </button>
                        {% for equipment in report.equipments %}
                            <button type=\"button\" class=\"list-group-item list-group-item-action\">{{ equipment.name }}</button>
                        {% endfor %}
                    </div>
                </div>
            </div>
        {% else %}
            <div class=\"card\">
                <div class=\"card-header\" id=\"heading{{ report.id }}\">
                    <h2 class=\"mb-0\">
                        <button class=\"btn btn-link collapsed\" type=\"button\" data-toggle=\"collapse\" data-target=\"#collapse{{ report.id }}\" aria-expanded=\"false\" aria-controls=\"collapse{{ report.id }}\">
                            Zgłoszenie awarii #{{ counter }}
                        </button>
                    </h2>
                </div>
                <div id=\"collapse{{ report.id }}\" class=\"collapse\" aria-labelledby=\"heading{{ report.id }}\" data-parent=\"#accordionExample\">
                    <div class=\"card-body\">
                        <form class=\"form-group mb-2\" action=\"{{ url(\"serviceman_handleequipments\") }}\" method=\"post\">
                            <p class=\"card-text\">Email użytkownika: {{ report.attachedOrder.user.email}}</p>
                            <p class=\"card-text\">Data zgłoszenia: {{ report.created_at | date(\"Y-m-d H:i\") }}</p>
                            <p class=\"card-text\">Wiadomość zgłoszenia: <strong>{{ report.message }}</strong></p>
                            <div class=\"list-group\">
                                <button type=\"button\" class=\"list-group-item list-group-item-action active\">
                                    Sprzęty oczekujące na naprawe
                                </button>
                                <select multiple class=\"form-control mb-2\" style=\"width: 100%\" id=\"damage_equipments\" name=\"damage_equipments[]\">
                                    {% set leftEquipments = 0 %}
                                    {% for equipment in report.equipments %}
                                        {% if equipment.status == \"status_damaged\" %}
                                            {% set leftEquipments = leftEquipments +1 %}
                                            <option value=\"{{ equipment.id }}\">{{ equipment.name }}</option>
                                        {% endif %}
                                    {% endfor %}
                                </select>
                                <small id=\"equipmentHelp\" class=\"form-text text-muted\">Wybierz sprzęt, który chcesz naprawić/zutylizować (wciśnij ctrl by wybrać kilka opcji)</small>

                            </div>
                            <!-- Buttons on card -->
                            {% if leftEquipments == 0 %}
                                {{ redirect(\"serviceman_finishdamagereport\", {\"id\" : report.id}) }}
                            {% else %}
                            <button type=\"button\" class=\"btn btn-outline-danger mt-2 mb-2 float-right\" data-toggle=\"modal\" data-target=\"#repairModal{{ report.id }}\">
                                Utylizuj
                            </button>
                            <button type=\"submit\" name=\"repairButton\" value=\"true\" class=\"btn btn-outline-success float-right mt-2 mr-2\">Napraw</button>
                            <!-- End of buttons -->
                            {% endif %}

                            <!-- Repair Modal Body -->
                            <div class=\"modal fade\" id=\"repairModal{{ report.id }}\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"exampleModalLabel\" aria-hidden=\"true\">
                                <div class=\"modal-dialog\" role=\"document\">
                                    <div class=\"modal-content\">
                                        <div class=\"modal-header\">
                                            <h5 class=\"modal-title\" id=\"exampleModalLabel\">Utylizacja sprzętu</h5>
                                        </div>
                                        <div class=\"modal-body\">
                                            Czy na pewno chcesz zutylizować sprzęt?
                                        </div>
                                        <div class=\"modal-footer\">
                                            <button type=\"submit\" name=\"utilizeButton\" value=\"true\" class=\"btn btn-primary\">Tak</button>
                                            <button type=\"button\" class=\"btn btn-secondary\" data-dismiss=\"modal\">Nie</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End of Repair Modal Body -->
                        </form>
                        <button type=\"button\" class=\"list-group-item list-group-item-action active mt-3\">
                            Wszystkie zgłoszone sprzęty
                        </button>
                        {% for equipment in report.equipments %}
                            <button type=\"button\" class=\"list-group-item list-group-item-action\">{{ equipment.name }}</button>
                        {% endfor %}
                    </div>
                </div>
            </div>
        {% endif %}

    {% else %}
        <div class=\"alert alert-primary\" role=\"alert\">
            Obecnie nie ma żadnych dostępnych zgłoszeń awarii.
        </div>
    {% endfor %}
    </div>
{% endblock %}", "serviceman/mydamagereports.html.twig", "/Users/wiktorpieklik/bd2/templates/serviceman/mydamagereports.html.twig");
    }
}
