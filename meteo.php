<?php
require 'class\Meteo.php';
$meteo = new Meteosource ('2eaf586f6bmshb5bffe4090f7ffbp10d37cjsnddbe6becf6ec');
$meteo->getForecast('fishermans wharf');
