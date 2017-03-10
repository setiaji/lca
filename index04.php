<?php
include 'index02.php';
include 'index03.php';
use PHPUnit\Framework\TestCase;

class FalseTest extends TestCase
{
    public function testFailure() {
        $this->assertTrue(index02.php);
    }  
    
    public function testNull() {
        $this->assertNull(index03.php);
    }
}

?>
