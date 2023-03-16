<?php

class Animal
{
    private $name;
    private $skill;

    public function __construct($name, $skill)
    {
        $this->name = $name;
        $this->skill = $skill;
        return $this;
    }

    public function getName()
    {
        return $this->name;
    }
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    public function getSkill()
    {
        return $this->skill;
    }
    public function setSkill($skill)
    {
        $this->skill = $skill;
        return $this;
    }
}
