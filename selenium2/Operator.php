<?php
/**
 * Operator
 */
abstract class Operator
{
    /**
     * @var PHPUnit_Extensions_Selenium2TestCase
     */
    protected $driver;
    
    /**
     * Constructor
     *
     * @param  PHPUnit_Extensions_Selenium2TestCase $driver
     * @return void
     */
    public function __construct(PHPUnit_Extensions_Selenium2TestCase $driver)
    {
        $this->driver = $driver;
    }
}

