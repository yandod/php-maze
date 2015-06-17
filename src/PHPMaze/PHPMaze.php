<?php
namespace PHPMaze;

class PHPMaze {

  public $dimension = 11;
  public $seed = null;

  public function __construct($seed = null){
    $this->seed = $seed;
  }

  public function generate($dimension = 11) {
    // Initialize the field.
    if (isset($this->seed)) {
      srand($this->seed);
    }
    $field = array_fill(0, $dimension, 0);
    $this->dimension = $dimension;
    for($i = 0; $i < $dimension; $i++) {
        $field[$i] = array_fill(0, $dimension, 0);
        for ($j = 0; $j < $dimension; $j++) {
            $field[$i][$j] = true;
        }
    }

    // Generate the maze recursively.
    $field = $this->iterate($field, 1, 1);

    return $field;
  }

  public function iterate($field, $x, $y) {
    $field[$x][$y] = false;
    while(true) {
        $directions = [];
        if($x > 1 && $field[$x-2][$y] == true) {
          array_push($directions,[-1, 0]);
        }
        if($x < $this->dimension - 2 && $field[$x+2][$y] == true) {
          array_push($directions,[1, 0]);
        }
        if($y > 1 && $field[$x][$y-2] == true) {
          array_push($directions,[0, -1]);
        }
        if($y < $this->dimension - 2 && $field[$x][$y+2] == true) {
          array_push($directions,[0, 1]);
        }
        if(count($directions) == 0) {
            return $field;
        }
        $dir = $directions[floor(rand(0,1)*count($directions))];
        $field[$x+$dir[0]][$y+$dir[1]] = false;
        $field = $this->iterate($field, $x+$dir[0]*2, $y+$dir[1]*2);
    }
  }
}
