<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Book.php";
    require_once "src/Author.php";
    require_once "src/Patron.php";

    $server = 'mysql:host=localhost:8889;dbname=library_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);


    class PatronTest extends PHPUnit_Framework_TestCase
    {
        function testGetPatronName()
        {
            // Arrange
            $patron_name = 'Fifi';
            $test_patron = new Patron($patron_name);

            // Act
            $result = $test_patron->getPatronName();

            // Assert
            $this->assertEquals($patron_name, $result);
        }

        function testSetPatronName()
        {
            // Arrange
            $patron_name = 'Fifi';
            $test_patron = new Patron($patron_name);

            $new_patron_name = 'Shaquifa';

            // Act
            $test_patron->setPatronName($new_patron_name);
            $result = $test_patron->getPatronName();

            // Assert
            $this->assertEquals($new_patron_name, $result);
        }

        function testGetId()
        {
            // Arrange
            $patron_name = 'Beats Me';
            $test_patron = new Patron($patron_name);
            $test_patron->save();

            // Act
            $result = $test_patron->getId();

            // Assert
            $this->assertTrue(is_numeric($result));
        }

        function testSave()
        {
            //Arrange
            $patron_name = "Ollie";
            $test_patron= new Patron($patron_name);

            //Act
            $executed = $test_patron->save();

            // Assert
            $this->assertTrue($executed, "Patron not successfully saved to database");
        }
    }
?>
