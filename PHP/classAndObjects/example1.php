<?php
class demo
{
    function credentials()
    {
        echo "My name is Usman Hameed. <br>";
        echo "My age is 25. <br>";
        echo "My gender is Male. <br>";
    }

    function colors()
    {
        echo "1st Color is Black. <br>";
        echo "2nd Color is Blue. <br>";
        echo "3rd Color is Brown. <br>";
        echo "4th Color is Gray. <br>";
        echo "5th Color is Green. <br>";
        echo "6th Color is Red. <br>";
    }
}

// Creating object of demo class with the name of obj
$obj = new demo();

// calling credentials function.
$obj->credentials();

echo "<br>"; // line break

// calling colors function.
$obj->colors();

// Redirect to example 2
echo "<a href='example2.php'>Next Example</a>"; 

/*
NOTE: You can also create object with different names/instances. 
Example: 
$cred = new demo();
$cred->credentials();
$col = new demo();
$col->colors();
*/

// Guide
echo "<br><br> <b> NOTE: </b> For better understanding, see source code of this page in any IDE or editior. <br>";
?>