<?php

use Gip\Application;
use Gip\Navigation;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

require_once __DIR__ . '/vendor/autoload.php';

$application = new Application();
$twig = $application->loadTwig();
$data = $application->getData(Navigation::ABOUT);

try {
    echo $twig->render('index.twig', $data);
} catch (LoaderError|RuntimeError|SyntaxError $e) {
}
