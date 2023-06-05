<?php
class Fruits
{
    // Setting name
    function set_name($name)
    {
        $this->name = $name;
    }
    // Getting name
    function get_name()
    {
        return $this->name;
    }

    // Setting color
    function set_color($color)
    {
        $this->color = $color;
    }
    // Getting color
    function get_color()
    {
        return $this->color;
    }
}

$apple = new Fruits();  // 1st Fruit
$banana = new Fruits(); // 2nd Fruit

$apple->set_name('Apple');
$apple->set_color('Red');
echo "1st Fruit name is: ".$apple->get_name()."<br>";
echo "1st Fruit color is: ".$apple->get_color()."<br><br>";

$banana->set_name('Banana');
$banana->set_color('Yellow');
echo "2nd Fruit name is: ".$banana->get_name()."<br>";
echo "2nd Fruit color is: ".$banana->get_color()."<br>";

// Redirect to example 1
echo "<a href='example1.php'>Previous Example</a>"; 

// Guide
echo "<br><br> <b> NOTE: </b> For better understanding, see source code of this page in any IDE or editior. <br>";
?>