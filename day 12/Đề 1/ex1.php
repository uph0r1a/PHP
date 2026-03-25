<?php
$studentName = "Thai Duc Tri";
$studentAge = 19;
$studyYear = 14;

echo "My name is {$studentName}, I am {$studentAge} years old, and I am in year {$studyYear} of my studies.</br>";

function calculateCircleArea($radius)
{
    return M_PI * pow($radius, 2);
}

$radius = 7.5;
echo "The area of the circle with radius {$radius}  is: " . calculateCircleArea($radius);
