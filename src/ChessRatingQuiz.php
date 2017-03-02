<?php
/**
 *
 *
 */

/**
 * Class ChessRatingQuiz.
 */
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
        # URL: https://it.lichess.org/analysis/standard/r1b3k1/6p1/P1n1pr1p/q1p5/1b1P4/2N2N2/PP1QBPPP/R3K2R_b
        1 => array(
            1 => 1500, # c8a6 elo=1500 Axa6
            2 => 1400, # b4c3 elo=1400 Axc3
            3 => 1900, # c5d4 elo=1900 cxd4
            4 => 1000, # g8h7 elo=1000 Rh7
            5 => 1400, # f6g6 elo=1400 Tg6
            6 => 2600, # f6f3 elo=2600 Txf3
            7 => 1200, # e6e5 elo=1200 e5
            8 => 1600, # c8d7 elo=1600 Ad7
            9 => 1900, # c6d4 elo=1900 Cxd4
        ),

        # FEN: 2nq1nk1/5p1p/4p1pQ/pb1pP1NP/1p1P2P1/1P4N1/P4PB1/6K1 w
        # URL: https://it.lichess.org/analysis/standard/2nq1nk1/5p1p/4p1pQ/pb1pP1NP/1p1P2P1/1P4N1/P4PB1/6K1_w
        2 => array(
            1 => 1950, # g5h7 elo=1950 Cxh7
            2 => 1000, # a2a4 elo=1000 a4
            3 => 1000, # g3f5 elo=1000 Cf5
            4 => 1900, # h5g6 elo=1900 hxg6
            5 => 1400, # g2f1 elo=1400 Af1
            6 => 1200, # g2d5 elo=1200 Axd5
            7 => 2600, # g2e4 elo=2600 Ae4
            8 => 1400, # f2f4 elo=1400 f4
            9 => 1000, # g3e4 elo=1000 C3e4
        ),

        # FEN: 8/3r2p1/pp1Bp1p1/1kP5/1n2K3/6R1/1P3P2/8 w
        # URL: https://it.lichess.org/analysis/standard/8/3r2p1/pp1Bp1p1/1kP5/1n2K3/6R1/1P3P2/8_w
        3 => array(
            1 => 1000, # b2b3 elo=1000 b3
            2 => 2500, # c5c6 elo=2500 c6
            3 => 1000, # f2f4 elo=1000 f4
            4 => 1000, # d6f8 elo=1000 Af8
            5 => 2000, # g3g6 elo=2000 Txg6
            6 => 1900, # e4e5 elo=1900 Re5
            7 => 1200, # e4d4 elo=1200 Rd4
            8 => 1700, # g3g5 elo=1700 Tg5
            9 => 1200, # d6e5 elo=1200 Ae5
        ),

        # FEN: 8/4kb1p/2p3pP/1pP1P1P1/1P3K2/1B6/8/8 w
        # URL: https://it.lichess.org/analysis/standard/8/4kb1p/2p3pP/1pP1P1P1/1P3K2/1B6/8/8_w
        4 => array(
            1 => 1600, # b3f7 elo=1600 Axf7
            2 => 1800, # b3d1 elo=1800 Ad1
            3 => 1000, # f4e4 elo=1000 Re4
            4 => 1000, # b3a4 elo=1000 Aa4
            5 => 1700, # b3c2 elo=1700 Ac2
            6 => 1000, # f4e3 elo=1000 Re3
            7 => 1000, # f4g3 elo=1000 Rg3
            8 => 1000, # f4f3 elo=1000 Rf3
            9 => 2500, # e5e6 elo=2500 e6
        ),

        # FEN: b1R2nk1/5ppp/1p3n2/5N2/1b2p3/1P2BP2/q3BQPP/6K1 w
        # URL: https://it.lichess.org/analysis/standard/b1R2nk1/5ppp/1p3n2/5N2/1b2p3/1P2BP2/q3BQPP/6K1_w
        5 => array(
            1 => 2100, # f5h6 elo=2100 Ch6
            2 => 1900, # e3h6 elo=1900 Ah6
            3 => 1500, # f5g7 elo=1500 Cxg7
            4 => 1750, # f2g3 elo=1750 Dg3
            5 => 1200, # c8f8 elo=1200 Txf8
            6 => 1200, # f2h4 elo=1200 Dh4
            7 => 1750, # e3b6 elo=1750 Axb6
            8 => 2500, # e3c5 elo=2500 Ac5
            9 => 1400, # e2c4 elo=1400 Ac4
        ),

        # FEN: 3nn1k1/pp3pbp/2bp1np1/q3p1B1/2B1P3/2N4P/PPPQ1PP1/3RR1K1 w
        # URL: https://it.lichess.org/analysis/standard/3nn1k1/pp3pbp/2bp1np1/q3p1B1/2B1P3/2N4P/PPPQ1PP1/3RR1K1_w
        6 => array(
            1 => 1200, # a2a3 elo=1200 a3
            2 => 2500, # g5f6 elo=2500 Axf6
            3 => 1700, # c3d5 elo=1700 Cd5
            4 => 1900, # c4b5 elo=1900 Ab5
            5 => 1000, # a2a4 elo=1000 a4
            6 => 1000, # b2b3 elo=1000 b3
            7 => 1000, # g1h2 elo=1000 Rh2
            8 => 1700, # f2f4 elo=1700 f4
            9 => 1200, # e1e3 elo=1200 Te3
        ),

        # FEN: r1b1qrk1/1ppn1pb1/p2p1npp/3Pp3/2P1P2B/2N5/PP1NBPPP/R2Q1RK1 b
        # URL: https://it.lichess.org/analysis/standard/r1b1qrk1/1ppn1pb1/p2p1npp/3Pp3/2P1P2B/2N5/PP1NBPPP/R2Q1RK1_b
        7 => array(
            1 => 1700, # a6a5 elo=1700 a5
            2 => 1000, # d7c5 elo=1000 Cc5
            3 => 1000, # f6h5 elo=1000 Ch5
            4 => 1500, # g8h7 elo=1500 Rh7
            5 => 1000, # c7c6 elo=1000 c6
            6 => 1000, # c7c5 elo=1000 c5
            7 => 2500, # f6h7 elo=2500 Ch7
            8 => 1800, # f6e4 elo=1800 Cxe4
            9 => 1700, # g6g5 elo=1700 g5
        ),

        # FEN: 2R1r3/5k2/pBP1n2p/6p1/8/5P1P/2P3P1/7K w
        # URL: https://it.lichess.org/analysis/standard/2R1r3/5k2/pBP1n2p/6p1/8/5P1P/2P3P1/7K_w
        8 => array(
            1 => 1000, # c2c4 elo=1000 c4
            2 => 1600, # c8e8 elo=1600 Txe8
            3 => 1000, # c6c7 elo=1000 c7
            4 => 1000, # h1g1 elo=1000 Rg1
            5 => 1000, # g2g4 elo=1000 g4
            6 => 2500, # b6d8 elo=2500 Ad8
            7 => 1000, # b6a7 elo=1000 Aa7
            8 => 1000, # b6a5 elo=1000 Aa5
            9 => 1000, # h3h4 elo=1000 h4
        ),

        # FEN: 2r2rk1/1p1R1pp1/p3p2p/8/4B3/3QB1P1/q1P3KP/8 w
        # URL: https://it.lichess.org/analysis/standard/2r2rk1/1p1R1pp1/p3p2p/8/4B3/3QB1P1/q1P3KP/8_w
        9 => array(
            1 => 1800, # e4g6 elo=1800
            2 => 1000, # d3b3 elo=1000
            3 => 2500, # e3d4 elo=2500
            4 => 1800, # e4h7 elo=1800
            5 => 1000, # e3f4 elo=1000
            6 => 1000, # g2f3 elo=1000
            7 => 1700, # e3h6 elo=1700
            8 => 1400, # d7b7 elo=1400
            9 => 1000, # g2h3 elo=1000
        ),

        # FEN: r1bq1rk1/p4ppp/1pnp1n2/2p5/2PPpP2/1NP1P3/P3B1PP/R1BQ1RK1 b
        # URL: https://it.lichess.org/analysis/standard/r1bq1rk1/p4ppp/1pnp1n2/2p5/2PPpP2/1NP1P3/P3B1PP/R1BQ1RK1_b
        10 => array(
            1 => 1400, # f8e8 elo=1400
            2 => 2000, # f6e8 elo=2000
            3 => 2600, # d8d7 elo=2600
            4 => 1800, # h7h5 elo=1800
            5 => 1600, # c5d4 elo=1600
            6 => 1800, # c8a6 elo=1800
            7 => 1000, # f6g4 elo=1000
            8 => 1800, # a7a5 elo=1800
            9 => 1500, # d6d5 elo=1500
        ),
    );
}