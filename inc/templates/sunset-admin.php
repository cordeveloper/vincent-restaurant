<h1>Vincent Theme Options</h1>
<?php settings_errors(); ?>
<?php 
    $picture = esc_attr(get_option('profile_picture'));
?>
<div class="image__container">
    <div class="profile-picture">
        <img src="<?php print $picture ?>" alt="">
    </div>
</div>
<form action="options.php" method="post">
    <?php settings_fields('vincent-settings-group') ?>
    <?php do_settings_sections('opts-vincent'); ?>
    <?php submit_button(); ?>
</form>
