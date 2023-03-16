<?php
session_start();
$_SESSION['indexAtual'] = $_SESSION['indexAtual'] ?? 0;
$_SESSION['checkedToWin']  = $_SESSION['checkedToWin'] ?? false;


$_SESSION['animalSkill'] = $_SESSION['animalSkill'] ?? ['baleia' => ['vive na água', 'é mamífero'], 'macaco' => ['usa ferramentas'], 'tartaruga' => ['vive na água', 'põe ovos'], 'leão' => ['é o rei da selva']];
$_SESSION['animais'] = $_SESSION['animais'] ?? ['baleia', 'macaco', 'tartaruga', 'leão'];
$_SESSION['skills'] = $_SESSION['skills'] ?? ['vive na água', 'é mamífero', 'usa ferramentas', 'é o rei da selva'];

$_SESSION['animalAtual'] = $_SESSION['animalAtual'] ?? $_SESSION['animais'][$_SESSION['indexAtual']];
$_SESSION['skillAtual'] = $_SESSION['skillAtual']  ?? $_SESSION['skills'][$_SESSION['indexAtual']];

$_SESSION['YesSkillList'] = $_SESSION['YesSkillList'] ?? [];
$_SESSION['NoSkillList'] = $_SESSION['NoSkillList'] ?? [];

$_SESSION['discoverNewAnimal'] = $_SESSION['discoverNewAnimal'] ?? false;
