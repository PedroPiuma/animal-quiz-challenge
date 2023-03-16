<?php
require_once('Animal.php');

class Service
{
    private $inputRadio = "";
    // private $inputRadio = "<div><label for='sim'>SIM</label><input type='radio' name='response' value='sim' id='sim'>
    // <label for='nao'>NÃO</label><input type='radio' name='response' value='nao' id='nao'>
    // <br><br></div>";

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

    public function defaultAnimals()
    {
        $baleia = new Animal('baleia', 'vive na água');
        $tartaruga = new Animal('tartaruga', 'vive na água');
        $macaco = new Animal('macaco', 'usa ferramentas');

        $_SESSION['animais']['baleia'] = ['vive na água', 'é mamífero'];
        $_SESSION['animais']['tartaruga'] = ['põe ovos', 'vive na água', 'é réptil'];
        $_SESSION['animais']['macaco'] = ['usa ferramentas, é mamífero'];
    }

    public function sessionDefault()
    {
        $_SESSION['animalQtd'] = $_SESSION['animalQtd'] ?? 0;
        $_SESSION['skillNumber'] = $_SESSION['skillNumber'] ?? 0;
        $_SESSION['checkWin'] = $_SESSION['checkWin'] ?? false;
        $_SESSION['atualSkill'] = $_SESSION['atualSkill'] ?? $_SESSION['animais']['baleia'][0];
        // $_SESSION['atualAnimal'] = 'baleia';
        $_SESSION['filteredAnimals'] =  $_SESSION['filteredAnimals'] ?? [];
    }
}
