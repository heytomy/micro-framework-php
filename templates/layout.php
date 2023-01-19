<!doctype html>
<html lang="fr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/app.css">
    <title><?php if (isset($data['title'])) echo $data['title']; ?> - Plugo</title>
    <?php if (isset($data['description'])) { ?>
      <meta name="description" content="<?= $data['description'] ?>">
    <?php } ?>
  </head>
  <body>
    <?php include '_navbar.php'; ?>
    <main>
      <?php require $templatePath ?>
    </main>
    <script src="js/app.js"></script>
    <?php include '_footer.php'; ?>
