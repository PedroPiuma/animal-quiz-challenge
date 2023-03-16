<?php

class ServiceAnimal
{
    public function filterAnimalSkill($animalFilter)
    {
        foreach ($_SESSION['animalSkill'] as $animal => $skills) {
            if ($animal === $animalFilter) {
                foreach ($skills as $skill) {
                    echo "$animal -- $skill: " .  $_SESSION['skillAtual'] . "<br>";
                    if ($skill === $_SESSION['skillAtual'] && $_REQUEST['response'] === 'sim') return true;
                }
            }
        }
    }

    public function filterNoAnimalSkill($animalFilter)
    {
        echo "<br>Init Filter<br>";
        foreach ($_SESSION['animalSkill'] as $animal => $skills) {
            if ($animal === $animalFilter) {
                foreach ($skills as $skill) {
                    echo "Skill: $skill<br>";
                    foreach ($_SESSION['NoSkillList'] as $value) {
                        echo "$value<br>";
                        if ($skill === $value) return false;
                    }

                    if ($skill !== $_SESSION['skillAtual'] && $_REQUEST['response'] === 'nao') return true;
                    else break;
                }
            }
        }
        echo "End Filter<br>";
    }

    public function discoverNewAnimal()
    {
        return  $_SESSION['discoverNewAnimal'] = true;
    }

    public function addAnimal($name, $skill)
    {
        $_SESSION['animalSkill'][$name] = [$skill];
        $_SESSION['animais'][] = $name;
        $_SESSION['skills'][] = $skill;
    }
}
