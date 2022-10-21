<?php
$title = "Salanest group - Giới Thiệu - Tiến Thịnh Phát - Yến Sào";
include 'inc/header.php';
?>
<div class="main-breac">
  <div class="container">
    <span><a href="./" class="clblack">Trang chủ</a></span>
    <span style="margin: 0 7px;">
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#000000" class="bi bi-chevron-right"
        viewBox="0 0 16 16">
        <path fill-rule="evenodd"
          d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z" />
      </svg>
    </span>
    <span class="clpink">Giới Thiệu</span>
  </div>
</div>
<div class="bird-container bird-container--one">
  <div class="bird bird--one"></div>
</div>
<img src="img/intro_salanest.webp" alt="bai-viet-gioi-thieu-salanest" title="bài viết giới thiệu salanest" width="100%"
  header="auto">
<?php include 'inc/footer.php'; ?>
<style>
.bird {
  background-image: url(https://s3-us-west-2.amazonaws.com/s.cdpn.io/174479/bird-cells-new.svg);
  background-size: auto 100%;
  width: 88px;
  height: 125px;
  will-change: background-position;

  animation-name: fly-cycle;
  animation-timing-function: steps(10);
  animation-iteration-count: infinite;
}

.bird--one {
  animation-duration: 1s;
  z-index: 9;
  animation-delay: -0.5s;
}

.bird-container {
  position: absolute;
  top: 7%;
  left: -10%;
  transform: scale(0) translateX(-10vw);
  will-change: transform;
  animation-name: fly-right-one;
  animation-timing-function: linear;
  animation-iteration-count: infinite;
}

.bird-container--one {
  animation-duration: 15s;
  z-index: 9;
  animation-delay: 0;
}

@keyframes fly-cycle {
  100% {
    background-position: -900px 0;
  }
}

@keyframes fly-right-one {
  0% {
    transform: scale(0.3) translateX(-10vw);
  }

  10% {
    transform: translateY(2vh) translateX(10vw) scale(0.4);
  }

  20% {
    transform: translateY(0vh) translateX(30vw) scale(0.5);
  }

  30% {
    transform: translateY(4vh) translateX(50vw) scale(0.6);
  }

  40% {
    transform: translateY(2vh) translateX(70vw) scale(0.6);
  }

  50% {
    transform: translateY(0vh) translateX(90vw) scale(0.6);
  }

  60% {
    transform: translateY(0vh) translateX(110vw) scale(0.6);
  }

  100% {
    transform: translateY(0vh) translateX(110vw) scale(0.6);
  }
}
</style>