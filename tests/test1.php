<?php

require_once __DIR__.'/../src/ChessRatingQuiz.php';

$app = new ChessRatingQuiz();

$raw = " elo 121311a31a11 \n ";

$msg = substr(trim($raw), 3);

echo $app->input($msg);

