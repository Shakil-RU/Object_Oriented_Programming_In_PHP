<?php
require_once __DIR__ . '/Book.php';
require_once __DIR__ . '/Customer.php';


// Instantiate a new book
$book1 = new Book(14115031, 'Digital Systems', 'Tocci',50);

// Show details of the book
echo "<b>About Requested Book:</b><br>";
echo $book1 . "<br>";

// Try to get a copy of the book
echo "<b>Available Copy : {$book1->available}</b>";
echo "<br>";
if($book1->getCopy()) echo "<i>This Book is Available. </i><br>" ;
else echo "<br><b>I am afraid that book is not available.</b><br>";

 echo "<br>";

//Show the details after setTitle function has been invoked.
$book1->title = "Make Your Self";
echo "<b>Book Details After Modification</b><br>";
echo $book1;


echo "<br>";
 echo "<br>";

$customer1 = new Customer(12345, "Abdullah", "Numan Shakil", "shakil@gmail.com");

echo $customer1;
echo "<br>";
echo"<br>";
echo $customer1->gotName();
?>