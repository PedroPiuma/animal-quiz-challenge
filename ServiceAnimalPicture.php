<?php
// https://pixabay.com/api/docs/
class ServiceAnimalPicture
{
    private $picture = '';

    public function getAnimalPicture()
    {
        return $this->picture;
    }

    public function setAnimalPicture()
    {
        $url = "https://pixabay.com/api/?key=34437395-37d4cf869573d653a619aea5c&q=" . $_SESSION['animalAtual'];
        $response = file_get_contents($url);
        var_dump($response);
        $this->picture = "<div><img src='https://live.staticflickr.com/7151/6760135001_58b1c5c5f0_c.jpg' alt='teste' width='300'></div>";
        return $this->picture;
    }
}
