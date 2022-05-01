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

/* login.twig */
class __TwigTemplate_aefb069c9eb9662b2f92212866ce902dd5afd0dcb4ed235989518830bea0a681 extends Template
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
        // line 1
        echo "<h3 style=\"text-align: center\">";
        echo twig_escape_filter($this->env, ($context["title"] ?? null), "html", null, true);
        echo "</h3>
<div style=\"width: 900px; margin: 0 auto\">
    <div style=\"display: flex; justify-content: space-around; align-items: flex-start\">
        <div class=\"block\">
            <h3>Зарегистрироваться</h3>
            <form action=\"/login/register\" method=\"post\" style=\"display:flex; flex-direction: column; gap: 5px\">
                <div class=\"field\">Email:</div> <input type=\"text\" value=\"\" name=\"email\"><br>
                <div class=\"field\">Имя:</div> <input type=\"text\" value=\"\" name=\"name\"><br>
                <div class=\"field\">Пароль:</div> <input type=\"password\" name=\"password\"><br>
                <div class=\"field\">Подтверждение пароля:</div> <input type=\"password\" name=\"confirm\"><br>
                <input type=\"submit\" value=\"Зарегистрироваться\">
            </form>
        </div>
        <div class=\"block\">
            <h3>Войти</h3>
            <form action=\"/login/auth\" method=\"post\" style=\"display:flex; flex-direction: column; gap: 5px\">
                <div class=\"field\">Email:</div> <input type=\"text\" value=\"\" name=\"email\"><br>
                <div class=\"field\">Пароль:</div> <input type=\"password\" value=\"\" name=\"password\"><br>
                <input type=\"submit\" value=\"Войти\">
            </form>

        </div>
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "login.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "login.twig", "/Applications/MAMP/htdocs/app/View/login.twig");
    }
}
