<?php
session_start();
$_SESSION['newAnimal'] = $_SESSION['newAnimal'] ?? '';
$_SESSION['index'] = $_SESSION['index'] ?? 0;
$_SESSION['animals'] = $_SESSION['animals'] ?? ['macaco', 'baleia', 'dragão'];
$_SESSION['skills'] = $_SESSION['skills'] ?? ['sobe em árvore', 'vive na água', 'gospe fogo'];
$_SESSION['animalsSkills'] = $_SESSION['animalsSkills'] ?? ['macaco' => 'sobe em árvore', 'baleia' => 'vive na água', 'dragão' => 'gospe fogo'];

$_SESSION['possibleAnimals'] = $_SESSION['possibleAnimals'] ?? $_SESSION['animals'];
$_SESSION['animalAtual'] = count(array_values($_SESSION['possibleAnimals'])) > 0 ? array_values($_SESSION['possibleAnimals'])[0] : $_SESSION['animalAtual'];
$_SESSION['skillAtual'] = $_SESSION['skillAtual'] ?? $_SESSION['skills'][0];

if (isset($_REQUEST['start']) && !isset($_SESSION['start'])) {
    $_SESSION['start'] = true;
    $_SESSION['index'] += 1;
}
