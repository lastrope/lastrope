<?php


require_once 'class/Actus.php';
require_once 'class/Event.php';

$actus = new Actus($pdo, $session->read('langue'));
$actusInformation = $actus->getAllActus();
$event = new Event($pdo, $session->read('langue'));
$eventInformation = $event->getAllEvent();

$size_event = count($eventInformation);
$size_actus = count($actusInformation);
$cpt_event = 0;
$cpt_actu = 0;
$cpt = 0;
$key_actus = array_keys($actusInformation);
$key_event = array_keys($eventInformation);

$tag_langue = isset($_SESSION['langue']) ? $_SESSION['langue'] : 'fr';

$cpt_event = 0;
$cpt_actu = 0;
