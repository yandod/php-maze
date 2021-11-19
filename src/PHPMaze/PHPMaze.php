<?php
namespace PHPMaze;

class PHPMaze
{

    public int $seed = 0;
    public int $dimension = 11;

    /**
     * @param 0 $seed
     * @param 11 $dimension
     */
    public function __construct($seed = 0, $dimension = 11)
    {
        $this->seed = $seed;
        $this->dimension = $dimension;

        // Initialize rand with seed.
        if (isset($this->seed)) {
            mt_srand($this->seed,MT_RAND_PHP);
        }        
    }

    /**
     * @return array|mixed
     */
    public function generate()
    {
        $field = array_fill(0, $this->dimension, 0);
        for ($i = 0; $i < $this->dimension; $i++) {
            $field[$i] = array_fill(0, $this->dimension, 0);
            for ($j = 0; $j < $this->dimension; $j++) {
                $field[$i][$j] = true;
            }
        }

        // Generate the maze recursively.
        $field = $this->iterate($field, 1, 1);

        return $field;
    }

    /**
     * @param $field
     * @param $x
     * @param $y
     * @return mixed
     */
    public function iterate($field, $x, $y)
    {
        $field[$x][$y] = false;
        while (true) {
            $directions = [];
            if ($x > 1 && $field[$x - 2][$y] == true) {
                array_push($directions, [-1, 0]);
            }
            if ($x < $this->dimension - 2 && $field[$x + 2][$y] == true) {
                array_push($directions, [1, 0]);
            }
            if ($y > 1 && $field[$x][$y - 2] == true) {
                array_push($directions, [0, -1]);
            }
            if ($y < $this->dimension - 2 && $field[$x][$y + 2] == true) {
                array_push($directions, [0, 1]);
            }
            if (count($directions) == 0) {
                return $field;
            }
            $dir = $directions[floor(rand(0, 1000) / 1000 * count($directions))];
            $field[$x + $dir[0]][$y + $dir[1]] = false;
            $field = $this->iterate($field, $x + $dir[0] * 2, $y + $dir[1] * 2);
        }
    }
    
    /**
     * @param array $field
     * @return string
     */
    public function toString($field) {
        $string = '';
        foreach ($field as $line) {
            foreach ($line as $cell) {
                if ($cell) {
                    $string .= '#';
                } else {
                    $string .= ' ';
                }
            }
            $string .= "\n";
        }
        return $string;
    }
}
