<?php

class Player {
    public $name;
    public $coins;

    public function __construct($name, $coins)
    {
        $this->name = $name;
        $this->coins = $coins;
    }
}

class Game {
    protected $player1;
    protected $player2;

    public function __construct(Player $player1, Player $player2)
    {
        $this->player1 = $player1;
        $this->player2 = $player2;
    }

    public function start()
    {
        while(true) {
            // flip the coin
            $flip = rand(0, 1) ? "heads" : "tails";

            // determination of the winner
            if($flip == "heads") {
                $this->player1->coins++;
                $this->player2->coins--;
            } else {
                $this->player1->coins--;
                $this->player2->coins++;
            }

            // the game is over if someone has 0 coins left
            if($this->player1->coins == 0 || $this->player2->coins == 0) {
                return $this->end();
            }
        }
    }

    public function end()
    {
        echo <<<EOT
            Game over.
        EOT;
    }
}

$game = new Game(
    new Player("Batman", 100),
    new Player("Robin", 100)
);

$game->start();