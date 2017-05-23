<?php
echo "所说的";
class Car {
    private static $speed = 10;
    public static $speeds = 10;
    public static function getSpeed() {
        return self::$speed;
    }
}
echo Car::getSpeed();  //调用静态方法   10
echo Car::$speeds;
?>