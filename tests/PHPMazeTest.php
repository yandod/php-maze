<?php
//namespace \PHPMaze;

/**
 * Generated by PHPUnit_SkeletonGenerator on 2015-08-15 at 07:24:38.
 */
class PHPMazeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \PHPMaze\PHPMaze
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->object = new \PHPMaze\PHPMaze(1, 7);
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }

    public function testSmallMaze()
    {
      $maze = $this->object->generate();
      $this->assertNotEmpty($maze);
      $exp = [
        [true, true, true, true, true, true, true],
        [true, false, false, false, true, false, true],
        [true, true, true, false, true, false, true],
        [true, false, true, false, false, false, true],
        [true, false, true, true, true, false, true],
        [true, false, false, false, false ,false, true],
        [true, true, true, true, true, true, true, ],
      ];
      $this->assertEquals($exp, $maze);
      $this->assertTrue(true);
    }
}
