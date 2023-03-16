<?php
require('session.php');
require_once('Service.php');
// require_once('Animal.php');

$service = new Service;

if (@!$_SESSION['animais']) $service->defaultAnimals();

if (@$_REQUEST['start']) {
    $service->sessionDefault();
    $service->setInputRadio('add');
    $text = $text ?? "<p>Jogo iniciado<br>O animal que voce pensou " . $_SESSION['atualSkill'] . "?</p>";

    if (@$_REQUEST['response'] === 'sim' && !$_SESSION['checkWin']) {
        foreach ($_SESSION['animais'] as $animal => $skill) {
            foreach ($skill as $value) {
                if ($value === $_SESSION['atualSkill']) $_SESSION['filteredAnimals'][] = $animal;
            }
        }
        // var_dump($_SESSION['filteredAnimals']);

        if (count($_SESSION['filteredAnimals']) ===  1) {
            $text = "O animal que você pensou é o(a) " . $_SESSION['filteredAnimals'][0] . " ?";
            $_SESSION['checkWin'] = true;
        } else {
            $_SESSION['skillNumber'] += 1;
            if ($_SESSION['animais'][$_SESSION['filteredAnimals'][$_SESSION['skillNumber']]][0] !== $_SESSION['atualSkill']) {
                $_SESSION['atualSkill'] = $_SESSION['animais'][$_SESSION['filteredAnimals'][$_SESSION['skillNumber']]][0];
            }
            $text = "O animal que você pensou " . $_SESSION['atualSkill'] . " ?<br>";
        }

        $service->setInputRadio('add');
        $service->unsetRequestKey('response');
    } else if (@$_REQUEST['response'] === 'sim' && $_SESSION['checkWin']) {
        $text = "Eu venci!";
        $btnText = "Jogar novamente";
        $service->setInputRadio('remove');
        $service->unsetRequestKey('response');
        $service->unsetSessionKey('skillNumber', 'atualSkill', 'checkWin');
        $_SESSION['filteredAnimals'] = [];

        ///-------------------------------
    } else if (@$_REQUEST['response'] === 'nao') {
        $text = "<p>Errei :(</p><br>Qual animal você pensou ?";
        $inputText = "<div><br><input type='text' name='newAnimal'><br><br></div>";
        $btnText = "Continuar";
        $service->setInputRadio('remove');
        $service->unsetSessionKey('checkWin');
        $service->unsetRequestKey('response', 'start');
    } else if (@$_REQUEST['newAnimal'] && !$_REQUEST['newSkill']) {
        $requestNewAnimal = $_REQUEST['newAnimal'];
        $_SESSION['newAnimal'] = $requestNewAnimal;
        $text = "<p>Um(a) $requestNewAnimal ____ mas um $animal[0] nao.";
        $inputText = "<div><br><input type='text' name='newSkill'><br><br></div>";
        $btnText = "Continuar";
        $service->setInputRadio('remove');
    } else if (@$_REQUEST['newSkill']) {
        $requestNewSkill = $_REQUEST['newSkill'];
        $text = "<p>Feito! Jogue de novo!";
        $inputText = "";
        $btnText = "Jogar de novo";
        $service->setInputRadio('remove');
        $_SESSION['animalQtd'] = $_SESSION['animalQtd'] + 1;
        $_SESSION['animais'][$_SESSION['newAnimal']] = [$_SESSION['atualSkill'], $requestNewSkill];
        var_dump($_SESSION['animais']);

        $service->unsetSessionKey('newAnimal', 'checkWin');
        $service->unsetRequestKey('response', 'start', 'newAnimal', 'newSkill');
    }
}

$inputRadio = $service->getInputRadio();
// var_dump($_SESSION['animais']);
?>

<div align="center">
    <form action="" method="POST">
        <input type="checkbox" name="start" id="start" checked style="display: none;">
        <?php echo $text ?? "<p>Pense em um animal</p>" ?>
        <?php echo $inputText ?? "" ?>
        <?php echo $inputRadio ?>
        <div><button type="submit"><?php echo $btnText ?? "Continuar" ?></button></div>
    </form>
</div>