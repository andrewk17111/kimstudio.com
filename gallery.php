<!doctype html>
<html lang="en-US">
<head>
    <link rel="shortcut icon" type="image/png" href="pictures/IlHoiKimStudioLogo.png">
    <title>Kim Studio Of Tae Kwon Do | Home</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta charset="UTF-8">
    <meta name="description" content="Home page for Kim Studio Of Tae Kwon Do in Harrisburg, PA">
    <meta name="keywords" content="Tae Kwon Do,Taekwondo,Kim Studio,Harrisburg,WTF,Il Hoi Kim">
    <meta name="author" content="Andrew K">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<style>	
    .gallery {
        display: inline-block;
        display: -webkit-flex; /* Safari */
        -webkit-flex-wrap: wrap; /* Safari 6.1+ */
        display: flex;   
        flex-wrap: wrap;
    }
    
    .gallery-img {
        max-width: 10em;
        max-height: 10em;
        margin: auto;
        vertical-align: middle;
    }
    
    /*.mySlides {display:none}*/
    
    .demo {cursor:pointer}

button {
    color: white;
    background-color: black;
    border: none;
}

.navigation {
    height: 100%;
    width: 10%;
    font-size: 2em;
}

button:hover {
    background-color: rgb(255, 0, 0);
}

.lightbox {
    position: fixed;
    width: 100%;
    height: 100%;
    background-color: rgb(32,32,32);
    display: none;
}

.mySlides {
    display: none;
    max-width: 75%;
    max-height: 100%;
    margin: auto;
}

.img-section {
    height: 80%;
    width: 80%;
    margin: auto;
    vertical-align: middle;
}
</style>
<script src="https://www.w3schools.com/lib/w3.js"></script>
<body>
    <!--Header-->
    <div w3-include-html="header.html"></div>
    <!--Body-->
    <div class="clearfix">
        <?php
            $dir    = 'pictures/gallery';
            $files = scandir($dir);
        ?>
        <div class="column content" style="margin-top: 3em;">
            <div class="w3-content" style="max-width:1200px"><center>
                <div class="w3-row-padding w3-section gallery">
                    <?php
                        $int = 1;
                        foreach ($files as $value) {
                            if(is_file('pictures/gallery/' . $value)) {
                                echo '<div class="w3-col s4" style="width: 10em; height: 10em;">';
                                echo '<img class="demo gallery-img" src="pictures/gallery/' . $value . '" onclick="currentDiv(' . $int . ')">';
                                echo '</div>';
                                $int = $int + 1;
                            }
                        }
                    ?>
                </div>
            </center></div>
        </div>
        <div class="lightbox" id="lightbox">
            <button class="right" style="height: 3em; width: 3em;" onclick="closeLightBox()">X</button>
            <div class="img-section">
                <button class="navigation" onclick="plusDivs(-1)">&lt;</button>
                <?php
                    foreach ($files as $value) {
                        if(is_file('pictures/gallery/' . $value)) {
                            echo '<img class="mySlides" src="pictures/gallery/' . $value . '">';
                        }
                    }
                ?>
                <button class="right navigation" onclick="plusDivs(1)">&gt;</button>
            </div>
        </div>
    </div>
    <!--Footer-->
    <div w3-include-html="footer.html"></div>
</body>
<script>
    w3.includeHTML()
    
    var slideIndex = 1;
    showDivs(slideIndex);
    
    function plusDivs(n) {
        showDivs(slideIndex += n);
    }
    
    function currentDiv(n) {
        showDivs(slideIndex = n);
    }
    
    function showDivs(n) {
        var i;
        var x = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("demo");
        if (n > x.length) {slideIndex = 1}
        if (n < 1) {slideIndex = x.length}
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" w3-opacity-off", "");
        }
        x[slideIndex-1].style.display = "inline-block";
        document.getElementById("lightbox").style.display = "block";
        dots[slideIndex-1].className += " w3-opacity-off";
    }
    
    function closeLightBox() {
        document.getElementById("lightbox").style.display = "none";  
    }
</script>
</html>