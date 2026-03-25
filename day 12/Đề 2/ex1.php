<?php
$yourFullName = "Thai Duc Tri";
$yourBirthYear = 2006;
$currentYear = 2026;

echo "My name is $yourFullName, I was born in $yourBirthYear, so I am " . $currentYear - $yourBirthYear . " years old in $currentYear.</br>";

function convertTemperature($celsius, $toFahrenheit)
{
    if ($toFahrenheit) {
        return $celsius * (9 / 5) + 32;
    } else {
        return $celsius + 273.15;
    }
}

$celsius = 25;

echo "{$celsius}°C = " . convertTemperature($celsius, true) . "°F </br>{$celsius}°C = " . convertTemperature($celsius, false) . " K";
