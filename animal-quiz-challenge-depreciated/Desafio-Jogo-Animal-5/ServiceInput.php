<?php

class ServiceInput
{
    private $inputRadio = '';
    private $inputText = '';
    private $btn = "<div><button type='submit'>Continuar</button></div>";

    public function getInputRadio()
    {
        return $this->inputRadio;
    }

    public function setInputRadio($action)
    {
        if ($action === 'add') $this->inputRadio = "<div><label for='yes'>SIM</label><input type='radio' name='response' value='yes' id='yes'>
            <label for='no'>NÃO</label><input type='radio' name='response' value='no' id='no'><br><br></div>";
        else if ($action === 'remove') $this->inputRadio = '';
        return $this;
    }

    public function getInputText()
    {
        return $this->inputText;
    }

    public function setInputText($action)
    {
        if ($action === 'add') $this->inputText = "<div><input type='text' name='newAnimal'></div>";
        else if ($action === 'addSkill') $this->inputText = "<div><input type='text' name='newSkill'></div>";
        else if ($action === 'remove') $this->inputText = '';
        return $this;
    }

    public function getBtn()
    {
        return $this->btn;
    }

    public function setBtn($action)
    {
        $this->btn = "<div><button type='submit'>$action</button></div>";
        return $this;
    }
}
