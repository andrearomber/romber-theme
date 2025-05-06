<?php /* Component arguments */
$type = get_arg($args, 'type');
$video = get_arg($args, 'video');
$autoplay = get_arg($args, 'autoplay') ? true : false;
$no_controls = get_arg($args, 'no_controls') ? false : true;
$muted = get_arg($args, 'muted') ? true : false;
$loop = get_arg($args, 'loop') ? true : false;

?>

<?php if ($type == "upload-file" && $video) : ?>
    <?php 
    $pathinfo = pathinfo($video['url']);
    $ext = $pathinfo['extension']; 
    ?>

    <video
        <?php echo $autoplay ? 'autoplay' : ''; ?>
        <?php echo $muted ? 'muted' : ''; ?>
        <?php echo !$no_controls ? 'controls' : ''; ?>
        <?php echo $loop ? 'loop' : ''; ?>
    >
        <source src="<?php echo $video['url']; ?>" type="video/<?php echo $ext; ?>">
        <?php lit("Tu navegador no es capaz de reproducir este vídeo."); ?>
    </video>

<?php elseif ($type == "external-embed" && $video) : ?>
    <?php echo $video; ?>
<?php endif; ?>
