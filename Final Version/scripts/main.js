function myFunction() {
  var x = document.getElementById("dropdown");
  if (x.style.display === "block") {
    
  } else {
    x.style.display = "block";
  }
  
  var x = document.getElementById("dropdown-content");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
}

function nav() {
  document.getElementById("nav-user-cont").classList.toggle("show");
}

window.onclick = function(e) {
  if (!e.target.matches('.userbtn')) {
  var myDropdown = document.getElementById("nav-user-cont");
    if (myDropdown.classList.contains('show')) {
      myDropdown.classList.remove('show');
    }
  }
}

var PropslideIndex = 1;
showSlides(PropslideIndex);

function propViewerSlides(na) {
  showSlides(PropslideIndex += na);
}

function currentPropViewSlide(na) {
  showSlides(PropslideIndex = na);
}

function showSlides(na) {
  var x;
  var slides = document.getElementsByClassName("prop_picture_cont");
  var dots = document.getElementsByClassName("demo");
  var captionText = document.getElementById("caption");
  if (na > slides.length) {PropslideIndex = 1}
  if (na < 1) {PropslideIndex = slides.length}
  for (x = 0; x < slides.length; x++) {
      slides[x].style.display = "none";
  }
  for (x = 0; x < dots.length; x++) {
      dots[x].className = dots[x].className.replace(" active", "");
  }
  slides[PropslideIndex-1].style.display = "block";
  dots[PropslideIndex-1].className += " active";
  captionText.innerHTML = dots[PropslideIndex-1].alt;
}