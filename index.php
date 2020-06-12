<?php
// PSR-2 Update: converted tabs to spaces

// Added a Namespace
namespace eBaseInterviewExercise;

class Interview
{
    // BUG FIX: this should be a static variable based on usage below
    public static $title = 'Interview test';
}

$lipsum = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus incidunt, quasi aliquid, quod officia commodi magni eum? Provident, sed necessitatibus perferendis nisi illum quos, incidunt sit tempora quasi, pariatur natus.';

$people = array(
    array('id'=>1, 'first_name'=>'John', 'last_name'=>'Smith', 'email'=>'john.smith@hotmail.com'),
    array('id'=>2, 'first_name'=>'Paul', 'last_name'=>'Allen', 'email'=>'paul.allen@microsoft.com'),
    array('id'=>3, 'first_name'=>'James', 'last_name'=>'Johnston', 'email'=>'james.johnston@gmail.com'),
    array('id'=>4, 'first_name'=>'Steve', 'last_name'=>'Buscemi', 'email'=>'steve.buscemi@yahoo.com'),
    array('id'=>5, 'first_name'=>'Doug', 'last_name'=>'Simons', 'email'=>'doug.simons@hotmail.com')
);

// BUG FIX: check to see if the 'person' index exists; set to NULL if it doesn't
$person = isset($_POST['person']) ? $_POST['person'] : null;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Interview test</title>
    <style>
        body {font: normal 14px/1.5 sans-serif;}
    </style>
</head>
<body>

    <h1><?=Interview::$title;?></h1>

    <?php
    // BUG FIX: this was an infinite loop, starting at 10 and increasing to infinity; now it iterates from 0 to 9, resulting in 10 iterations
    // Print 10 times
    for ($i = 0; $i < 10; $i++) {
        // BUG FIX: substituted in the correct concatenation operator in place of +
        echo '<p>' . $lipsum . '</p>';
    }
    ?>


    <hr>


    <?php // BUG FIX: updated the method from GET to POST, since POST is commonly used for submitting/sending data, and POST doesn't display those values in the URL's query string ?>
    <form method="post" action="<?=$_SERVER['REQUEST_URI'];?>">
        <p><label for="firstName">First name</label> <input type="text" name="person[first_name]" id="firstName"></p>
        <p><label for="lastName">Last name</label> <input type="text" name="person[last_name]" id="lastName"></p>
        <p><label for="email">Email</label> <input type="text" name="person[email]" id="email"></p>
        <p><input type="submit" value="Submit" /></p>
    </form>

    <?php
        // PSR-2 Update: PSR-2 requires a space after the closing bracket
        // BUG FIX: check if the $person variable exists
    ?>
    <?php if (isset($person)) : ?>
        <p><strong>Person</strong> <?=$person['first_name'] ?? '';?>, <?=$person['last_name'] ?? '';?>, <?=$person['email'] ?? '';?></p>
    <?php endif; ?>


    <hr>


    <table>
        <thead>
            <tr>
                <th>First name</th>
                <th>Last name</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            <?php // PSR-2 Update: PSR-2 requires a space after the closing bracket ?>
            <?php foreach ($people as $person) : ?>
                <tr>
                    <?php // BUG FIX: previous code was treating $person as an object instead of an array ?>
                    <td><?=$person['first_name'];?></td>
                    <td><?=$person['last_name'];?></td>
                    <td><?=$person['email'];?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</body>
</html>