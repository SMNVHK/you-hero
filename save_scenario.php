<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $scenario = [];

  for ($i = 0; $i < 5; $i++) {
    $step = [
      'title' => $_POST["step_{$i}_title"],
      'choices' => [
        $_POST["step_{$i}_choice_1"],
        $_POST["step_{$i}_choice_2"]
      ]
    ];
    $scenario[] = $step;
  }

  $json = json_encode($scenario);
  file_put_contents('scenario.json', $json);

  echo "Le scénario a été enregistré avec succès.";
}
?>