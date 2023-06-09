<?php
require_once('ServiceAnimal.php');
class ServiceQuestion
{
    private $text = 'Pense em um animal';
    public function getText()
    {
        return $this->text;
    }
    public function setText($text)
    {
        $this->text = $text;
        return $this;
    }

    public function setQuestion()
    {
        $_SESSION['showPicture'] = false;
        switch ($_SESSION['index']) {
            case 0:
                return $this->text = "<p>O animal que você pensou " . $_SESSION['skillAtual'] . " ? 1</p>";
            case 1:
                $filterAnimal = new ServiceAnimal;
                $filter =  $filterAnimal->filterAnimal();
                if ($filter === 'yes') {
                    $_SESSION['showPicture'] = true;
                    return $this->text = "<p>O animal que pensou é o(a) " . $_SESSION['animalAtual'] . " ? 2</p>";
                } else if ($filter === 'newAnimal') {
                    $_SESSION['index'] += 1;
                    return $this->text = "<p>Qual animal você pensou ? 3</p>";
                }
                return $this->text = "<p>O animal que você pensou " . $_SESSION['skillAtual'] . " ? 4</p>";
            case 2:
                if ($_REQUEST['response'] === 'yes') {
                    $_SESSION['victory'] = true;
                    return $this->text = "<p>Eu venci!</p>";
                } else if ($_REQUEST['response'] === 'no') {
                    $_SESSION['index'] += 1;
                    return $this->text = "<p>Eu perdi!<br>Qual animal você pensou ?</p>";
                }
            case 3:
                if ($_REQUEST['newAnimal'] && !$_SESSION['newAnimal']) {
                    $_SESSION['newAnimal'] = $_REQUEST['newAnimal'];
                    $_SESSION['index'] += 1;
                    return $this->text = "<p>Um(a) " . $_SESSION['newAnimal'] . " ____ mas um(a) " . $_SESSION['animalAtual'] . " não.</p>";
                } else {
                    $_SESSION['index'] += 1;
                }
            case 4:
                $addNewAnimal = new ServiceAnimal;
                $addNewAnimal->setNewAnimal($_SESSION['newAnimal'], $_REQUEST['newAnimal']);
                $_SESSION['index'] += 1;
                return $this->text = "<p>Entendi! Agora conheço um novo animal!</p>";
            default:
                return "Default";
        }
    }
}
