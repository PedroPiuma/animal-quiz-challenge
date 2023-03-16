<?php
require('session.php');
require_once('Step.php');

$step = new Step('Pense em um aninal e inicie o jogo!', null, null);
$text = $step->getText();
// $input = $step->getInput();
$btn = $step->getBtn();

session_destroy();
?>

<form action="game.php" method="POST" align="center">
    <p><?php echo $text ?></p>
    <div><?php echo $btn ?></div>
</form>