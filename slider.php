<!DOCTYPE html>
<html>
<head>
<style type = "text/css">
#slider_selector{
    position: absolute;
    left: 0;
    top: 0;
    right: 0;
    bottom: 50px; /* height of thumbs (if not required set to 0) */
    height: auto; /* optionally add !important for WP version */
    width: auto;
}
</style>
<title>Slider</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">


</head>
<body>

  <div>
  <img class="mySlides" src="image/1.png" style="width:100%" height = "250 px">
  <img class="mySlides" src="image/2.jpg" style="width:100%" height = "250 px">
  <img class="mySlides" src="image/3.jpg" style="width:100%" height = "250 px">
  <img class="mySlides" src="image/4.jpg" style="width:100%" height = "250 px">
  <img class="mySlides" src="image/5.png" style="width:100%" height = "250 px">

  <!--<button class="w3-button w3-black w3-display-left" onclick="plusDivs(-1)">&#10094;</button>
  <button class="w3-button w3-black w3-display-right" onclick="plusDivs(1)">&#10095;</button>
  -->

</div>

<script>
/*var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  if (n > x.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";  
  }
  x[slideIndex-1].style.display = "block";  
}*/
var slideIndex = 0;
carousel();

function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
      x[i].style.display = "none"; 
    }
    slideIndex++;
    if (slideIndex > x.length) {slideIndex = 1} 
    x[slideIndex-1].style.display = "block"; 
    setTimeout(carousel, 3000); // Change image every 2 seconds
}
</script>

</body>
</html>
