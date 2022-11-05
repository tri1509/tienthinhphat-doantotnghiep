$(document).ready(function () {
  setTimeout(function () {
    $(".modal-popup").fadeIn(500);
  }, 3000);
  $("#close-modal").click(function () {
    $(".modal-popup").fadeOut(500);
  });
  $("#close-modal").click(function () {
    $(".modal-thanhtoan").fadeOut(500);
  });
  $(".sp-cn").hide();
  $(".sp-sn").click(function () {
    $(this).hide();
    $(".sp-cn").show();
    $("body").addClass("push-left");
  });
  $(".sp-cn").click(function () {
    $(this).hide();
    $(".sp-sn").show();
    $("body").removeClass("push-left");
  });
  /*--------------------------------------------*/
  $(document).ready(function () {
    $(".tab-content-item").hide();
    $(".tab-content-item:first-child").fadeIn();
    $(".nav-tabs li").click(function () {
      $(".nav-tabs li").removeClass("active");
      $(this).addClass("active");

      let id_tab_content = $(this).children("a").attr("href");
      $(".tab-content-item").hide();
      $(id_tab_content).fadeIn();
      return false;
    });
  });
  /*-----------------------------------------------*/
  var slpr = $(".slider-pr").lightSlider({
    item: 3,
    loop: true,
    auto: true,
    pause: 5000,
    controls: false,
    pager: false,
    responsive: [
      {
        breakpoint: 767,
        settings: {
          item: 2,
        },
      },
      {
        breakpoint: 480,
        settings: {
          item: 1,
        },
      },
    ],
  });
});
/*--------------------------------------------*/

function openNav() {
  document.getElementById("mySidenav").style.width = "280px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0px";
}

/*--------------------------------------------*/

function togglePass() {
  var hide = document.getElementById("open");
  hide.classList.toggle("hide");
  var show = document.getElementById("close");
  show.classList.toggle("show");
  var x = document.getElementById("inputPassword");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
/*--------------------------------------------*/

function togglePass2() {
  var hide = document.getElementById("open2");
  hide.classList.toggle("hide");
  var show = document.getElementById("close2");
  show.classList.toggle("show");
  var x = document.getElementById("inputPassword2");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
/*--------------------------------------------*/

$("#inputPassword, #inputPassword2").on("keyup", function () {
  if ($("#inputPassword").val() == $("#inputPassword2").val()) {
    $("#dangky").removeAttr("disabled");
    $("#restorepass").removeAttr("disabled");
  } else {
    $("#dangky").attr("disabled", "disabled");
    $("#restorepass").attr("disabled", "disabled");
  }
});
/*--------------------------------------------*/

var offset = 500;
var duration = 100;
$(function () {
  $(window).scroll(function () {
    if ($(this).scrollTop() > offset) $("#top-up").fadeIn(duration);
    else $("#top-up").fadeOut(duration);
  });
  $("#top-up").click(function () {
    $("body,html").animate(
      {
        scrollTop: 0,
      },
      duration
    );
  });
});
/*--------------------------------------------*/

$(document).ready(function () {
  jQuery("#mainSlider").nivoSlider({
    directionNav: false,
    animSpeed: 500,
    effect: "random",
    slices: 18,
    pauseTime: 5000,
    pauseOnHover: false,
    controlNav: false,
  });
});
/*--------------------------------------------*/

window.onscroll = function () {
  myFunction();
};

var header_bottom = document.getElementById("header-bottom");
var logo_header_bottom = document.getElementById("logo-header-bottom");
var sticky = header_bottom.offsetTop;

function myFunction() {
  if (window.pageYOffset >= sticky) {
    header_bottom.classList.add("sticky");
    logo_header_bottom.classList.add("sticky");
  } else {
    header_bottom.classList.remove("sticky");
    logo_header_bottom.classList.remove("sticky");
  }
}
/*--------------------------------------------*/

$(document).ready(function () {
  $(".img-slider").slick({
    slidesToShow: 5, // số phần tử
    slidesToScroll: 1, //dich chuyển 1 phần tử
    infinite: true, //lặp
    autoplay: true,
    autoplaySpeed: 2000,
    prevArrow:
      "<img class='container-item-nav left' src='./img/left.svg' alt='' width='15' height='15'>",
    nextArrow:
      "<img class='container-item-nav right' src='./img/right.svg' alt='' width='15' height='15'>",
    responsive: [
      {
        breakpoint: 1200,
        settings: {
          slidesToShow: 4,
          slidesToScroll: 1,
        },
      },
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 1,
        },
      },
      {
        breakpoint: 766,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2,
        },
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
        },
      },
    ],
  });
});
/*--------------------------------------------*/

$(document).ready(function () {
  $(".slider-detail").slick({
    slidesToShow: 4,
    slidesToScroll: 1,
    infinite: true,
    prevArrow:
      "<img class='container-item-nav left' src='./img/left.svg' alt='' width='15' height='15'>",
    nextArrow:
      "<img class='container-item-nav right' src='./img/right.svg' alt='' width='15' height='15'>",
  });
});

/*--------------------------------------------*/
let items = document.querySelectorAll(".parallax");
document.addEventListener("scroll", (event) => {
  items.forEach((item) => {
    if (item.offsetTop - window.scrollY < 600) {
      item.classList.add("active");
    }
  });
});
/*--------------------------------------------*/

let slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides((slideIndex += n));
}

function currentSlide(n) {
  showSlides((slideIndex = n));
}

function showSlides(n) {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("demo");
  if (n > slides.length) {
    slideIndex = 1;
  }
  if (n < 1) {
    slideIndex = slides.length;
  }
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
    // dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex - 1].style.display = "block";
  // dots[slideIndex - 1].className += " active";
}

function openImg(evt, idDetail) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(idDetail).style.display = "block";
  evt.currentTarget.className += " active";
}
