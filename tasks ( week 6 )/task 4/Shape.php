<?php
interface Shape
{
    public function getColor();
    public function setColor($color);
    public function isFilled();
    public function setFilled($filled);
    public function toString();
}
