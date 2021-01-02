<?php


interface Seaside 
{
    public function addSea(): void;

    public function addBeach(): void;

    public function addSand(): void;

    public function addSwim(): void;
}




class ConcreteSeaside1 implements Seaside
{
    private $action;

    public function __construct()
    {
        $this->reset();
    }

    public function reset(): void
    {
        $this->action = new Activity1();
    }

    public function addSea(): void
    {
        $this->action->action_part[] = "Sea";
    }

    public function addBeach(): void
    {
        $this->action->action_part[] = "Beach";
    }

    public function addSand(): void
    {
        $this->action->action_part[] = "Sand";
    }

    public function addSwim(): void
    {
        $this->action->action_part[] = "Swim";
    }

    public function getActivity(): Activity1
    {
        $result = $this->action;
        $this->reset();

        return $result;
    }
}




class Activity1
{
    public $action_part = [];

    public function listActions(): void
    {
        echo "Seaside actions: " . implode(', ', $this->action_part) . "\n\n";
    }
}




class Touroperator
{
    /***
    * @var Builder
    ***/
    private $builder;

   
    public function setBuilder(Seaside $builder): void
    {
        $this->builder = $builder;
    }

   
    public function buildMinimalViableAction(): void
    {
        $this->builder->addSea();
    }

    public function buildFullFeaturedAction(): void
    {
        $this->builder->addSea();
        $this->builder->addBeach();
        $this->builder->addSand();
        $this->builder->addSwim();
    }
}



function travelAgency(Touroperator $to) {
    $builder = new ConcreteSeaside1();
    $to->setBuilder($builder);

    echo "Minimal action:<br>";
    $to->buildMinimalViableAction();
    $builder->getActivity()->listActions();
    echo '<br>';
    echo "Standard full featured holiday:<br>";
    $to->buildFullFeaturedAction();
    $builder->getActivity()->listActions();
    echo '<br>';
    echo "Custom actions:</br>";
    $builder->addBeach();
    $builder->addSand();
    $builder->getActivity()->listActions();
}

$travel = new Touroperator;
travelAgency($travel);
?>