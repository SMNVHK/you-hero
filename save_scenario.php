<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $scenario = [];

  $stepCount = 0;
  while (isset($_POST["step_{$stepCount}_title"])) {
    $step = [
      'title' => $_POST["step_{$stepCount}_title"],
      'choices' => explode(',', $_POST["step_{$stepCount}_choices"])
    ];

    $imageFile = $_FILES["step_{$stepCount}_image"];
    if ($imageFile['error'] === UPLOAD_ERR_OK) {
      $uploadDir = 'uploads/';
      $uploadFile = $uploadDir . basename($imageFile['name']);
      move_uploaded_file($imageFile['tmp_name'], $uploadFile);
      $step['image'] = $uploadFile;
    }

    $scenario[] = $step;
    $stepCount++;
  }

  $json = json_encode($scenario);
  file_put_contents('scenario.json', $json);

  echo "Le scénario a été enregistré avec succès.";
}
?>