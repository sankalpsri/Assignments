<?php 

echo  "<h2>Assignment 2</h2>";

$min_number = 1;
$max_number = 100;
echo "<ul>";
for($i = $min_number; $i <= $max_number and print_r("<li>" . 
                                            ($i % 15 ? $i % 5 ? $i % 3 ? $i : "foo" : "bar" : "foobar" ) . "</li>" 
                                            ); ++$i );
echo "</ul>";



