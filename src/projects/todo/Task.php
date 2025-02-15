<?php

namespace Src\projects;
use DateTime;
use JsonSerializable;

class Task implements JsonSerializable
{
    private string $name;
    private string $description;
    private DateTime $scheduledAt;
    public function __construct(string $name, string $description, DateTime $scheduledAt){
        $this->name = $name;
        $this->description = $description;
        $this->scheduledAt = $scheduledAt;

    }

    public function __set(string $name, $value){
        if(property_exists($this, $name)){
            $this->$name = $value;
        return;
        }
        throw new \InvalidArgumentException(sprintf("Propriedade %s inexistente", $name));
    }
public function __get(string $name){
    if(property_exists($this, $name)){
        return $this->$name;
    }
    throw new \InvalidArgumentException(sprintf("Propriedade %s inexistente", $name));
}


    /**
     * @inheritDoc
     */
    public function jsonSerialize():array {

        return  array(
"name"=> $this->name,
"description"=> $this->description,
"scheduled" => $this->scheduledAt->format(DateTime::ATOM)

        );
    }
}