<?php

class Service
{
    public function playAgain()
    {
        unset($_SESSION['newAnimal']);
        unset($_SESSION['index']);

        unset($_SESSION['possibleAnimals']);
        unset($_SESSION['animalAtual']);
        unset($_SESSION['skillAtual']);

        unset($_SESSION['start']);
        unset($_REQUEST['start']);
        unset($_SESSION['victory']);
    }
}
