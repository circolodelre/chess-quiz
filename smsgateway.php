<?php

require_once __DIR__.'/src/ChessRatingQuiz.php';

$app = new ChessRatingQuiz();

$raw = filter_input(INPUT_POST, 'message');

$msg = substr(trim($raw), 3);

echo $app->input($msg);
