<?php

class ChessRatingQuiz
{
    /**
     * @param $msg
     * @return string
     */
    public function input($msg)
    {
        $input = preg_replace('/[^1-9]/', '', $msg);

        if (strlen($input) != 10) {
            return "Controlla bene, il messaggio deve contenere 10 numeri da 1 a 9. \n";
        }

        $total = 0;

        for ($q = 1; $q <= strlen($input); $q++) {
            $i = intval($input[$q-1]);
            $total += isset($this->map[$q][$i]) ? $this->map[$q][$i] : 1000;
        }

        $cat = 'NC';
        $elo = $total / 10;

        if ($elo >= 1500) {
            $cat = '3N';
        } else if ($elo >= 1600) {
            $cat = '2N';
        } else if ($elo >= 1800) {
            $cat = '1N';
        } else if ($elo >= 2000) {
            $cat = 'CM';
        } else if ($elo >= 2200) {
            $cat = 'Maestro';
        } else if ($elo >= 2400) {
            $cat = 'MI';
        } else if ($elo >= 2600) {
            $cat = 'GM';
        }

        echo "Il tuo punteggio ELO stimato è {$elo}, la tua categoria è {$cat}.\n";
    }

    /**
     * @var array
     */
    private $map = array(

        # FEN: r1b3k1/6p1/P1n1pr1p/q1p5/1b1P4/2N2N2/PP1QBPPP/R3K2R b
        1 => array(
            1 => 2600, # f6f3 elo=2600
            2 => 1900, # c5d4 elo=1900
            3 => 1900, # c6d4 elo=1900
            4 => 1400, # b4c3 elo=1400
            5 => 1500, # c8a6 elo=1500
            6 => 1400, # f6g6 elo=1400
            7 => 1200, # e6e5 elo=1200
            8 => 1600, # c8d7 elo=1600
        ),

        # FEN: 2nq1nk1/5p1p/4p1pQ/pb1pP1NP/1p1P2P1/1P4N1/P4PB1/6K1 w
        2 => array(
            1 => 2600, # g2e4 elo=2600
            2 => 1950, # g5h7 elo=1950
            3 => 1900, # h5g6 elo=1900
            4 => 1400, # g2f1 elo=1400
            5 => 1200, # g2d5 elo=1200
            6 => 1400, # f2f4 elo=1400
        ),

        # FEN: 8/3r2p1/pp1Bp1p1/1kP5/1n2K3/6R1/1P3P2/8 w
        3 => array(
            1 => 2500, # c5c6 elo=2500
            2 => 2000, # g3g6 elo=2000
            3 => 1900, # e4e5 elo=1900
            4 => 1700, # g3g5 elo=1700
            5 => 1200, # e4d4 elo=1200
            6 => 1200, # d6e5 elo=1200
        ),

        # FEN: 8/4kb1p/2p3pP/1pP1P1P1/1P3K2/1B6/8/8 w
        4 => array(
            1 => 2500, # e5e6 elo=2500
            2 => 1600, # b3f7 elo=1600
            3 => 1700, # b3c2 elo=1700
            4 => 1800, # b3d1 elo=1800
        ),

        # FEN: b1R2nk1/5ppp/1p3n2/5N2/1b2p3/1P2BP2/q3BQPP/6K1 w
        5 => array(
            1 => 2500, # e3c5 elo=2500
            2 => 2100, # f5h6 elo=2100
            3 => 1900, # e3h6 elo=1900
            4 => 1500, # f5g7 elo=1500
            5 => 1750, # f2g3 elo=1750
            6 => 1200, # c8f8 elo=1200
            7 => 1200, # f2h4 elo=1200
            8 => 1750, # e3b6 elo=1750
            9 => 1400, # e2c4 elo=1400
        ),

        # FEN: 3nn1k1/pp3pbp/2bp1np1/q3p1B1/2B1P3/2N4P/PPPQ1PP1/3RR1K1 w
        6 => array(
            # g5f6 elo=2500
            # c3d5 elo=1700
            # c4b5 elo=1900
            # f2f4 elo=1700
            # a2a3 elo=1200
            # e1e3 elo=1200
        ),

        # FEN: r1b1qrk1/1ppn1pb1/p2p1npp/3Pp3/2P1P2B/2N5/PP1NBPPP/R2Q1RK1 b
        7 => array(
            # f6h7 elo=2500
            # f6e4 elo=1800
            # g6g5 elo=1700
            # a6a5 elo=1700
            # g8h7 elo=1500
        ),

        # FEN: 2R1r3/5k2/pBP1n2p/6p1/8/5P1P/2P3P1/7K w
        8 => array(
            # b6d8 elo=2500
            # c8e8 elo=1600
        ),

        # FEN: 2r2rk1/1p1R1pp1/p3p2p/8/4B3/3QB1P1/q1P3KP/8 w
        9 => array(
            # e3d4 elo=2500
            # e4g6 elo=1800
            # e4h7 elo=1800
            # e3h6 elo=1700
            # d7b7 elo=1400
        ),

        # FEN: r1bq1rk1/p4ppp/1pnp1n2/2p5/2PPpP2/1NP1P3/P3B1PP/R1BQ1RK1 b
        10 => array(
            # d8d7 elo=2600
            # f6e8 elo=2000
            # h7h5 elo=1800
            # c5d4 elo=1600
            # c8a6 elo=1800
            # a7a5 elo=1800
            # f8e8 elo=1400
            # d6d5 elo=1500
        ),
    );
}