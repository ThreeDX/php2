<!DOCTYPE html>
<html>
<head lang="ru">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <title>{{ title }}</title>
    <link href="css/index.css" rel="stylesheet">
</head>
<body>
<div class="gallery image">
    <h1>Image</h1>
    {% set image = image.getData %}
    <p>{{ image.desc }}</p>
    <img src="images/{{ image.name }}" alt="{{ image.desc }}" title="{{ image.desc }}">
    <a href="index.php">вернуться</a>
</div>

</body>
</html>