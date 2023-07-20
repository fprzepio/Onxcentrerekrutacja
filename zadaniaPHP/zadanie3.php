<?php

class RankingTable {
    private $players = [];

    public function __construct($playerNames) {
        foreach ($playerNames as $name) {
            $this->players[$name] = ['score' => 0, 'games' => 0];
        }
    }

    public function recordResult($playerName, $score) {
        if (isset($this->players[$playerName])) {
            $this->players[$playerName]['score'] += $score;
            $this->players[$playerName]['games']++;
        }
    }

    public function playerRank($rank) {
        $rank--;

        uasort($this->players, function($a, $b) {
            if ($a['score'] == $b['score']) {
                if ($a['games'] == $b['games']) {
                    return 0;
                }
                return ($a['games'] < $b['games']) ? -1 : 1;
            }
            return ($a['score'] > $b['score']) ? -1 : 1;
        });

        $playerNames = array_keys($this->players);
        return isset($playerNames[$rank]) ? $playerNames[$rank] : null;
    }
}

$table = new RankingTable(array('Jan', 'Maks', 'Monika'));
$table->recordResult('Jan', 2);
$table->recordResult('Maks', 3);
$table->recordResult('Monika', 5);
echo $table->playerRank(1); // Powinno zwrócić "Monika"

?>
