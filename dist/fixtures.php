<?php
// This file create fake datas for the project

require_once '../vendor/autoload.php';
require_once '../config/database.php';

$faker = Faker\Factory::create();

// USERS
for ($i = 0; $i < 10; $i++) {
  $user = $faker->userName;
  $mail = "$user@$faker->freeEmailDomain";
  $password = password_hash($faker->password, PASSWORD_DEFAULT);

  $userData = $pdo->prepare("INSERT INTO user (pseudo, email, password) VALUES (?,?,?)");
  $userData->execute([$user, $mail, $password]);

  // ARTICLES
  for ($j = 0; $j < rand(0, 12); $j++) {
    $author = $user;
    $title = $faker->realText(60);
    $content = $faker->realText(500);
    $createdAt = date("Y-m-d H:i:s", rand(1000000000, 1617989832));

    $articleData = $pdo->prepare("INSERT INTO article (author, title, content, created_at) VALUES (?,?,?,?)");
    $articleData->execute([$author, $title, $content, $createdAt]);

    // COMMENTS
    for ($k = 0; $k < rand(0, 50); $k++) {
      $author = $user;
      $content = $faker->realText(rand(100, 200));
      $createdAt = date("Y-m-d H:i:s", rand(1000000000, 1617989832));
      $articleId = rand(1, 50);

      $commentData = $pdo->prepare("INSERT INTO comment (author, content, created_at, article_id) VALUES (?,?,?,?)");
      $commentData->execute([$author, $content, $createdAt, $articleId]);
    }
  }
}
