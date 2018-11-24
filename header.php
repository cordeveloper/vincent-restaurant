<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php bloginfo('name'); ?></title>
    <?php wp_head(); ?>
</head>
<body>
    <header class="header">
        <section class="header__main">
            <?php echo get_custom_logo(); ?>
        </section>
    </header>
    <div class="vincent__corners"></div>
    
