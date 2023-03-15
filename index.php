<?php

require('session.php');
require_once('Service.php');
require_once('ServiceLog.php');
require_once('ServiceInput.php');
require_once('ServiceQuestion.php');

$service = new Service;
$serviceLog = new ServiceLog;
$serviceInput = new ServiceInput;
$serviceQuestion = new ServiceQuestion;

if (isset($_REQUEST['start']) || isset($_SESSION['start'])) {
    $inputRadio = $serviceInput->setInputRadio('add')->getInputRadio();
    $serviceQuestion->setQuestion();
}

if (isset($_SESSION['victory']) || $_SESSION['index'] === 5) {
    $serviceInput->setInputRadio('remove');
    $serviceInput->setInputText('remove');
    $serviceInput->setBtn('Jogar novamente');
    $service->playAgain();
}

if (count($_SESSION['possibleAnimals']) === 0 || ($_SESSION['index'] === 3 && $_REQUEST['response'] === 'no') || $_SESSION['index'] === 4) {
    $serviceInput->setInputRadio('remove');
    $serviceInput->setInputText('add');
}

if (!isset($_SESSION['index'])) $serviceInput->setInputText('remove');

$inputRadio = $serviceInput->getInputRadio();
$inputText = $serviceInput->getInputText();
$btn = $serviceInput->getBtn();
$question = $serviceQuestion->getText();

// $logAnimal = $serviceLog->logAnimal();
// $logSkill = $serviceLog->logSkill();
// $logAssocAnimalSkill = $serviceLog->logAssocAnimalSkill();
// $logGeneral = $serviceLog->logGeneral();
// $logPossibleAnimals = $serviceLog->logPossibleAnimals();
// $serviceLog->status();
?>

<style>
    <?php include __DIR__ . '/style/logStyle.css' ?><?php include  __DIR__ . '/style/base.css' ?>
</style>
<div class="main">
    <!-- <div class="log">
        <div class="logBox"> <?php echo $logAnimal ?></div>
        <div class="logBox"><?php echo $logSkill ?></div>
        <div class="logBox"><?php echo $logAssocAnimalSkill ?></div>
        <div class="logBox"><?php echo $logGeneral ?></div>
        <div class="logBox"><?php echo $logPossibleAnimals ?></div>
    </div> -->
    <form action="" method="POST" align='center'>
        <input type="checkbox" name="start" id="start" checked style="display: none;">
        <?php echo $question ?>
        <?php echo $inputRadio ?>
        <?php echo $inputText ?>
        <?php echo $btn ?>
    </form>
</div>