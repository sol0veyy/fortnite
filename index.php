<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/news.css">
    <title>Главная</title>
</head>
<body>
    <?php require('vendor/header.php'); ?>
        
    <Carousel>
        <template #slides>
            <Slide v-for="slide in 10" :key="slide">
            </Slide>
        </template>
    </Carousel>
</body>
</html>