<?php
class Condition
{
    private $tableOfCondition;

    public function __construct()
    {
        $this->tableOfCondition = [
            "firstYes" => function () {
                echo "Pensou nesse animal?";
            },
            "correctAnswer" => function () {
                echo "Eu acertei qual é o animal";
            },
            "newAnimal" => function () {
                echo "Errei! Qual é o animal?";
            },
            "newSkill" => function () {
                echo "O que seu animal faz que esse não?";
            },
            "playAgain" => function () {
                echo "Jogue novamente!";
            }
        ];
    }

    public function getTableOfCondition()
    {
        return $this->tableOfCondition;
    }
}
