<?php


namespace App\Twig;


use Carbon\Carbon;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class DateExtension extends AbstractExtension
{
    public function __construct()
    {
        date_default_timezone_set("Europe/Warsaw");
    }

    public function getFunctions()
    {
        return array(
            new TwigFunction("dateOrDefault", function (?\DateTimeInterface $date, string $default)
            {
                if($date != null)
                {
                    $givenDate = Carbon::createFromFormat("Y-m-d H:i", $date->format("Y-m-d H:i"));
                    return $givenDate->toDateTimeString('minutes');
                }
                else
                {
                    return $default;
                }
            })
        );
    }

}