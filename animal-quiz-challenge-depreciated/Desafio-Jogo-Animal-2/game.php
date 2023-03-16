<?php
require('session.php');
require_once('Step.php');
require_once('Animal.php');
$input = '<label for="yes">SIM<input type="radio" name="inputResponse" id="yes" value="yes"></label>
        <span> | </span>
        <label for="no">NÃO<input type="radio" name="inputResponse" id="no" value="no"></label>';

$baleia = new Animal('baleia', 'vive na água');
$animal = $baleia->getName();
$skill = $baleia->getSkill();

$step = new Step("O animal que você pensou $skill ?", $input, null);
$text = $step->getText();
$input = $step->getInput();
$btn = $step->getBtn();

function checkSkill($value)
{
    return $value === $firstSkill;
}

function checkYesAsnwer()
{
    $firstSkill = "vive na água";

    $filteredSkill = array_filter($_SESSION['boolean'], function ($value) use ($firstSkill) {
    });
    var_dump($filteredSkill);
}

function checkNoAsnwer()
{
}


if ($_REQUEST['inputResponse']) {
    $_SESSION['boolean'][] = [$skill, $animal, $_REQUEST['inputResponse']];
    foreach ($_SESSION['boolean'] as $key => $value) {
        echo "$key: $value[0] - $value[1] - $value[2]<br>";
    }

    switch ($_REQUEST['inputResponse']) {
        case 'yes':
            checkYesAsnwer();
            break;
        case 'no':
            checkNoAsnwer();
            break;

        default:
            # code...
            break;
    }
}

?>

<form action="" method="POST" align="center">
    <p><?php echo $text ?></p>
    <div><?php echo $input ?></div>
    <br>
    <div><?php echo $btn ?></div>
</form>