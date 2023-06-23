<?php

require __DIR__ . '/vendor/autoload.php'; // remove this line if you use a PHP Framework.

use Orhanerday\OpenAi\OpenAi;

$open_ai_key = '*************************************';
$open_ai = new OpenAi($open_ai_key);

$prompt = $_POST['prompt'];

$complete = $open_ai->completion([
    'model' => 'text-davinci-002',
    'prompt' => $prompt,
    'temperature' => 1.0,
    'max_tokens' => 4000,
    'frequency_penalty' => 0,
    'presence_penalty' => 0.6,
 ]);

$response = json_decode($complete,true);
$response = $response["choices"][0]["text"];


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Output</title>
    <style>
        .output-text{
            white-space: break-spaces;
        }
    </style>
</head>
<body>
    <h1>Out put TEST<?= $prompt?></h1>
    <div class="output-text">
        <?= $response?>
    </div>
</body>
</html>