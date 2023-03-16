<?php

class ServiceAnimal
{
    public function filterAnimal()
    {
        if (isset($_REQUEST['response']) && $_REQUEST['response'] === 'no') {
            $checkAnimalIndex = array_search($_SESSION['animalAtual'], $_SESSION['possibleAnimals']);
            unset($_SESSION['possibleAnimals'][$checkAnimalIndex]);
            if (count($_SESSION['possibleAnimals']) === 0) {
                return 'newAnimal';
            }
            $_SESSION['animalAtual'] = array_values($_SESSION['possibleAnimals'])[0];
            if (strlen($_SESSION['animalsSkills'][$_SESSION['animalAtual']]) > 0) $_SESSION['skillAtual'] = $_SESSION['animalsSkills'][$_SESSION['animalAtual']];
            return 'no';
        } else if (isset($_REQUEST['response']) && $_REQUEST['response'] === 'yes') {
            $_SESSION['index'] += 1;
            return 'yes';
        }
    }

    public function setNewAnimal($name, $skill)
    {
        $_SESSION['animals'][] = $name;
        $_SESSION['skills'][] = $skill;
        $_SESSION['animalsSkills'][$name] = $skill;
    }
}
