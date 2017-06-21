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
<div class="gallery">
    <h1>Gallery</h1>
    <p>Миниатюры фотографий</p>
    {% for image in gallery.getData.images %}
    {% set image = image.getData %}
    <a href="index.php?page=Image&id={{ image.id }}"><img src="images/thumb/thumb_{{ image.name }}" alt="{{ image.desc }}" title="{{ image.desc }}"></a>
    {% endfor %}
</div>

</body>
</html>