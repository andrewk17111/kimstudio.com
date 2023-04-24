<!doctype html>
<html lang="en-US">
<head>
    <link rel="shortcut icon" type="image/png" href="pictures/IlHoiKimStudioLogo.png">
    <title>Kim Studio Of Tae Kwon Do | Home</title>
    <link rel="stylesheet" type="text/css" href="styles/style.css">
    <link rel="stylesheet" type="text/css" href="styles/gallery.css">
    <meta charset="UTF-8">
    <meta name="description" content="Home page for Kim Studio Of Tae Kwon Do in Harrisburg, PA">
    <meta name="keywords" content="Tae Kwon Do,Taekwondo,Kim Studio,Harrisburg,WTF,Il Hoi Kim">
    <meta name="author" content="Andrew K">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<script src="https://www.w3schools.com/lib/w3.js"></script>
<body>
    <!--Header-->
    <div w3-include-html="header.html"></div>
    <!--Body-->
    <div class="clearfix" style="margin-top: 3em;">
        <?php
            $dir = 'pictures/gallery';
            $thumb_dir = 'pictures/gallery/thumbnails';
            $files = scandir($thumb_dir);
        ?>
        <div class="column content">
            <?php
                $int = 1;
                foreach ($files as $value) {
                    if(is_file('pictures/gallery/thumbnails/' . $value)) {
                        echo '<div class="thumbnail" style="background-image: url(\'pictures/gallery/thumbnails/' . $value . '\');" onclick="currentDiv(' . $int . ')"></div>';
                        $int = $int + 1;
                    }
                }
            ?>
        </div>
        <!--Lightbox-->
        <div class="lightbox" id="lightbox">
            <div style="width:100%; overflow: auto;">
                <a class="button close-button" onclick="closeLightBox()"></a>
            </div>
            <div class="slideshow">
                <a class="button navigation left" onclick="plusDivs(-1)"></a>
                <?php
                    $int = 1;
                    foreach ($files as $value) {
                        if(is_file('pictures/gallery/' . $value)) {
                            echo '<div class="slide" style="background-image: url(\'pictures/gallery/' . $value . '\');"></div>';
                            $int = $int + 1;
                        }
                    }
                ?>
                <a class="button navigation right" onclick="plusDivs(1)"></a>
            </div>
        </div>
    </div>
    <!--Footer-->
    <div w3-include-html="footer.html"></div>
</body>
<script>
    w3.includeHTML()
    
    var slideIndex = 1;
    closeLightBox();
    
    function plusDivs(n) {
        showDivs(slideIndex += n);
    }
    
    function currentDiv(n) {
        showDivs(slideIndex = n);
    }
    
    function showDivs(n) {
        var i;
        var x = document.getElementsByClassName("slide");

        if (n > x.length) {
            slideIndex = 1
        }

        if (n < 1) {
            slideIndex = x.length
        }

        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        
        x[slideIndex-1].style.display = "inline-block";
        document.getElementById("lightbox").style.display = "block";
    }
    
    function closeLightBox() {
        document.getElementById("lightbox").style.display = "none";  
    }
</script>
</html>
