<?php
require('session.php');
require_once('Service.php');
require_once('ServiceAnimal.php');
require_once('Condition.php');

$service = new Service;
$serviceAnimal = new ServiceAnimal;

$service->logAnimals();

if (isset($_REQUEST['start']) && $_SESSION['discoverNewAnimal'] === false) {
    $service->setText('O animal que você pensou ' . $_SESSION['skillAtual'] . ' ?');
    $service->setInputRadio('add');

    switch (@$_REQUEST['response']) {
        case 'sim':
            if ($_SESSION['checkedToWin']) {
                $service->win();
                break;
            }

            $_SESSION['YesSkillList'][] = $_SESSION['skillAtual'];
            $service->logYesSkillList();

            $filteredAnimalSkill = array_filter($_SESSION['animais'], [$serviceAnimal, "filterAnimalSkill"]);
            $service->logFilteredAnimalSkill($filteredAnimalSkill);

            if (count($filteredAnimalSkill) === 1) {
                $service->setText('O animal que você é o(a) ' . $_SESSION['animalAtual'] . " ?");
                $_SESSION['checkedToWin']  = true;
            } else {
                $_SESSION['indexAtual'] += 1;
                echo "<br><br> Animal atual: " . $_SESSION['animalAtual'] . "<br>";

                $newFilteredAnimalSkill = array_filter($filteredAnimalSkill, function ($animal) {
                    return $animal !== $_SESSION['animalAtual'];
                });
                $_SESSION['animalAtual'] = $newFilteredAnimalSkill[array_key_first($newFilteredAnimalSkill)];
                // echo "<br>Novo filteredAnimalSkill:<br>";
                // echo $_SESSION['animalAtual'];

                foreach ($_SESSION['YesSkillList'] as $skill) {
                    foreach ($_SESSION['animalSkill'][$_SESSION['animalAtual']] as $value) {
                        if ($skill !== $value) {
                            $_SESSION['skillAtual'] = $value;
                            $_SESSION['YesSkillList'][] = $value;
                        }
                    }
                }

                $service->setText('O animal que você pensou ' . $_SESSION['skillAtual'] . " ?");
            }
            break;

        case 'nao':
            $_SESSION['NoSkillList'][] = $_SESSION['skillAtual'];
            $service->logNoSkillList();

            $filteredAnimalSkill = array_filter($_SESSION['animais'], [$serviceAnimal, "filterNoAnimalSkill"]);
            $service->logFilteredAnimalSkill($filteredAnimalSkill);

            if (count($filteredAnimalSkill) === 0) {
                $serviceAnimal->discoverNewAnimal();
                break;
            }

            if (count($filteredAnimalSkill) === 1) {
                $_SESSION['animalAtual'] = array_values($filteredAnimalSkill)[0];
                $service->setText('O animal que você é o(a) ' . $_SESSION['animalAtual'] . " ?");
                $_SESSION['checkedToWin']  = true;
            } else {
                $_SESSION['indexAtual'] += 1;
                echo "<br><br> Animal atual: " . $_SESSION['animalAtual'] . "<br>";

                $newFilteredAnimalSkill = array_filter($filteredAnimalSkill, function ($animal) {
                    return $animal !== $_SESSION['animalAtual'];
                });

                $_SESSION['animalAtual'] = $newFilteredAnimalSkill[array_key_first($newFilteredAnimalSkill)];
                echo "<br>Novo filteredAnimalSkill:<br>";
                echo $_SESSION['animalAtual'];
            }

            foreach ($_SESSION['NoSkillList'] as $skill) {
                foreach ($_SESSION['animalSkill'][$_SESSION['animalAtual']] as $value) {
                    if ($skill !== $value) {
                        $_SESSION['skillAtual'] = $value;
                    }
                }
                // echo "<br>AQUI SKILL NÂO ACEITA: $skill<br>";
                // echo "<br>AQUI SKILL PRÒXIMA: " . $_SESSION['skillAtual'] . "<br>";
            }
            $service->setText("O animal que você pensou " . $_SESSION['skillAtual'] . " ?");

            break;
    }
}

if ($_SESSION['discoverNewAnimal'] === true) {
    $service->setText('Qual animal você pensou ?');
    $service->setInputText('addNewAnimal');
    $service->setInputRadio('remove');

    if (@$_REQUEST['newAnimal']) {
        $_SESSION['newAnimal'] = $_REQUEST['newAnimal'];
        $service->setInputText('addNewSkill');
        $service->setText('Um(a) ' . $_SESSION['newAnimal'] . " ____ mas um(a) " . $_SESSION['animalAtual'] . " não.");
    } else if (@$_REQUEST['newSkill']) {
        echo $_REQUEST['newSkill'];
        $service->setText("Jogue novamente!");
        $service->setInputText('remove');
        $serviceAnimal->addAnimal($_SESSION['newAnimal'], $_REQUEST['newSkill']);
        $service->restart();
    }
}

echo "<br>SkillAtual: " . $_SESSION['skillAtual'] . "<br>";
echo "<br>AnimalAtual: " . $_SESSION['animalAtual'] . "<br>";

$text = $service->getText();
$inputRadio = $service->getInputRadio();
$btnText = $service->getBtnText();
$inputText = $service->getInputText();
?>


<div align="center">
    <form action="" method="POST">
        <input type="checkbox" name="start" id="start" checked style="display: none;">
        <?php echo $text ?>
        <?php echo $inputText ?>
        <?php echo $inputRadio ?>
        <div><button type="submit"><?php echo $btnText ?></button></div>
    </form>
</div>