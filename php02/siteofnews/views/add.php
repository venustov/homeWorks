<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="/styles/current.css">
</head>
<body>
<?php if (!empty($data['error'])): ?>
    <div class="error">
      <?php foreach ($data['error'] as $value): ?>
          <p><?php echo $value; ?></p>
      <?php endforeach; ?>
    </div>
<?php endif; ?>
<?php if (!empty($data['success'])): ?>
    <div class="success">
        <p><?php echo $data['success']; ?></p>
    </div>
<?php endif; ?>
<?php include __DIR__ . '/form.php'; ?>
</body>
</html>