<?php

require('session.php');
require_once('Animal.php');

$animalDefault = new Animal('baleia', 'vive na água');
// $_SESSION[$animalDefault->getName()] =  $animalDefault->getSkill();

$animal = $animalDefault->getName();
$skill = $animalDefault->getSkill();
$question = '<label for="yes">SIM<input type="radio" name="inputResponse" id="yes" value="yes"></label>
<span> | </span>
<label for="no">NÃO<input type="radio" name="inputResponse" id="no" value="no"></label>';
$paragraph = '';
$newAnimal = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $inputResponse = $_REQUEST['inputResponse'] ?? NULL;
    var_dump($inputResponse);
    switch ($inputResponse) {
        case NULL:
            $paragraph = "O animal que você pensou vive na água?";
            break;
        case 'yes':
            $paragraph = "O animal que você pensou é $animal ?";
            break;
        case 'no':
            $paragraph = "Qual animal você pensou?";
            $newAnimal  = '<input type="text">';
            $question = '';
            break;
        default:
            $paragraph = "Default";
            break;
    }
}

?>


<form action="" method="POST" align="center">
    <p><?php echo $paragraph ?></p>
    <div><?php echo $question ?></div>
    <div><?php echo $newAnimal ?></div>
    <br>
    <button type="submit">Continuar</button>
</form>