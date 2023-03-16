<?php
class Service
{
    private $inputRadio = "";
    private $inputText = "";
    private $text = '<p>Pense em um animal</p>';
    private $btnText = 'Continuar';

    public function unsetSessionKey(...$keys)
    {
        foreach ($keys as $value) {
            unset($_SESSION[$value]);
        }
    }

    public function unsetRequestKey(...$keys)
    {
        foreach ($keys as $value) {
            unset($_REQUEST[$value]);
        }
    }

    public function getInputRadio()
    {
        return $this->inputRadio;
    }

    public function setInputRadio($action)
    {
        if ($action === 'add')
            $this->inputRadio =
                "<div><label for='sim'>SIM</label><input type='radio' name='response' value='sim' id='sim'>
            <label for='nao'>NÃO</label><input type='radio' name='response' value='nao' id='nao'>
            <br><br></div>";
        else if ($action === 'remove') $this->inputRadio = '';
        return $this;
    }

    public function getInputText()
    {
        return $this->inputText;
    }
    public function setInputText($action)
    {
        if ($action === 'addNewAnimal') {
            $this->inputText = "<div><input type='text' name='newAnimal'></div>";
        } else if ($action === 'addNewSkill') {
            $this->inputText = "<div><input type='text' name='newSkill'></div>";
        } else if ($action === 'remove') $this->inputText = '';
        return $this;
    }

    public function getText()
    {
        return $this->text;
    }
    public function setText($text)
    {
        $this->text = $text;
        return $this;
    }

    public function getBtnText()
    {
        return $this->btnText;
    }
    public function setBtnText($btnText)
    {
        $this->btnText = $btnText;
        return $this;
    }

    public function restart()
    {
        $_SESSION['indexAtual'] = 0;
        $_SESSION['checkedToWin'] = false;

        $_SESSION['animalAtual'] = $_SESSION['animais'][$_SESSION['indexAtual']];
        $_SESSION['skillAtual'] = $_SESSION['skills'][$_SESSION['indexAtual']];

        $_SESSION['YesSkillList'] = [];
        $_SESSION['NoSkillList'] = [];

        $_SESSION['discoverNewAnimal'] = false;
    }

    public function win()
    {
        var_dump($_SESSION['checkedToWin']);
        $this->setText("Eu venci!");
        $this->setInputRadio('remove');
        $this->setBtnText('Jogar novamente!');
        $this->restart();
    }

    //LOGS---------------------
    public function logAnimals()
    {
        foreach ($_SESSION['animais'] as $animal) {
            echo "Animal - $animal:<br>";
            foreach ($_SESSION['animalSkill'][$animal] as $key => $value) {
                echo "-------Key: $key // $value <br>";
            }

            // if ($_SESSION['animalAtual'] === $animal) {
            //     echo "Chegou na igualdade de: $animal === " .  $_SESSION['animalAtual'] . "<br>";
            // }
        }
    }

    public function logYesSkillList()
    {
        echo "<br>SIM<br>Lista de skills aceitas:";
        foreach ($_SESSION['YesSkillList'] as $skill) {
            echo "<br>$skill";
        }
        echo "<br>";
    }
    public function logNoSkillList()
    {
        echo "<br>NÃO<br>Lista de skills não aceitas:";
        foreach ($_SESSION['NoSkillList'] as $skill) {
            echo "<br>$skill";
        }
        echo "<br>";
    }

    public function logFilteredAnimalSkill($filteredAnimalSkill)
    {
        echo "<br>Array de animais que combinaram:<br>";
        foreach ($filteredAnimalSkill as $value) {
            echo "$value<br>";
        }
    }
}
