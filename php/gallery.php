<div class="wrapper style1">
    <section id="galerij" class="container special">
        <header>
            <h2 class="daydreamer"><?php getLocalizedStringForKey("gallery.title"); ?></h2>
            <br />
        </header>
         <div class="row">
        <?php 
        $dir          = './images/galerij';
         $file_type = array(
            'jpg',
            'jpeg',
            'png',
            'gif'
        );
        $file_display = array(
            'jpg',
            'jpeg',
            'png',
            'gif'
        );

if (file_exists($dir) == false) {
    echo 'Directory \''. $dir. '\' not found!';
} else {
    $dir_contents = scandir($dir);

    foreach ($dir_contents as $file) {
        $file_type = strtolower(end(explode('.', $file)));
        $file_name = current(explode('_min', $file));


       // echo  $file_type;
        if ($file !== '.' && $file !== '..' && in_array($file_type, $file_display) == true) {
            //echo  "images/galerij/".$file ;

            echo "<article class='4u 12u(mobile) special'>";
            if (file_exists($dir ."/original/".$file_name.".JPG")){
                echo "<a href='". $dir ."/original/".$file_name.".JPG'' data-lightbox='house' class='image featured'><img src='". $dir ."/".$file . "' alt='' /></a>";
            } else {
                 echo "<a href='". $dir ."/".$file . "' data-lightbox='house' class='image featured'><img src='". $dir ."/".$file . "' alt='' /></a>";
            }
            echo "</article>";
        }
    }
}
       

        ?>
         </div>
    </section>
</div>