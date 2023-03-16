<?php
class Step
{
    private $text;
    private $input;
    private $btn;
    private $memory;

    public function __construct($text, $input = null, $memory = null)
    {
        $this->text = $text;
        $this->input = $input;
        $this->btn = '<button type="submit">Continuar</button>';
        $this->memory = $memory;
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

    public function getInput()
    {
        return $this->input;
    }
    public function setInput($input)
    {
        $this->input = $input;
        return $this;
    }

    public function getBtn()
    {
        return $this->btn;
    }
    public function setBtn($btn)
    {
        $this->btn = $btn;
        return $this;
    }

    public function getMemory()
    {
        return $this->memory;
    }
    public function setMemory($memory)
    {
        $this->memory = $memory;
        return $this;
    }
}
