<?php

class ServiceLog
{
    private $logAnimal = "Animais:<br>";
    private $logSkill = "Skills:<br>";
    private $logGeneral = "";

    public function logAnimal()
    {
        foreach ($_SESSION['animals'] as $animal) {
            $this->logAnimal = $this->logAnimal . $animal . "<br>";
        }
        return $this->logAnimal;
    }
    public function logSkill()
    {
        foreach ($_SESSION['skills'] as $skill) {
            $this->logSkill =  $this->logSkill . $skill . "<br>";
        }

        return $this->logSkill;
    }

    public function logGeneral()
    {
        $general = "Skill atual: " . $_SESSION['skillAtual'] . "<br>Animal atual: " . $_SESSION['animalAtual'] . "<br>Index Atual: " . $_SESSION['index'];
        $this->logGeneral = $general;
        return $this->logGeneral;
    }

    public function logPossibleAnimals()
    {
        $possibles = "Animais possíveis:<br>";
        foreach ($_SESSION['possibleAnimals'] as $animal) {
            $possibles = $possibles . "$animal<br>";
        }
        return  $possibles;
    }

    public function logAssocAnimalSkill()
    {
        $assoc = "Animais e skills:<br>";
        foreach ($_SESSION['animalsSkills'] as $animal => $skill) {
            $assoc = $assoc . "$animal | $skill<br>";
        }
        return  $assoc;
    }

    public function status()
    {
        if (isset($_REQUEST['start'])) {
            echo "START";
        }
    }
}
