<?php
class Circle
{
    private float $radius = 1.0;
    private string $color = "red";


    public function __construct(float $radius = 1.0, string $color = "red")
    {
        $this->radius = $radius;
        $this->color = $color;
    }


    public function getRadius(): float
    {
        return $this->radius;
    }

    public function setRadius(float $radius): void
    {
        $this->radius = $radius;
    }


    public function getColor(): string
    {
        return $this->color;
    }

    public function setColor(string $color): void
    {
        $this->color = $color;
    }


    public function getArea(): float
    {
        return pi() * pow($this->radius, 2);
    }

    public function __toString(): string
    {
        return "Circle[radius={$this->radius}, color={$this->color}]";
    }
}
