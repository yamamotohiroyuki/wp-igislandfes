
<div class="global-section">
  <div class="news-top">
    <div class="news-top__header function-title">
      <h2 class="function-title__title">News</h2>
      <div class="function-title__menu">
        <ul>
          <li><a href="#">Read More</a></li>
          <li><a href="#">RSS</a></li>
        </ul>
      </div>
    </div>
    <div class="news-slick">
      <div class="news-slick__cell news-card">
        <a href="#">
          <p>2019.00.00</p>
          <h3>ニュースタイトルニュースタイトルニュースタイトルニュースタイトル</h3>
        </a>
      </div>
      <div class="news-slick__cell news-card">
        <a href="#">
          <p>2019.00.00</p>
          <h3>ニュースタイトルニュースタイトルニュースタイトルニュースタイトル</h3>
        </a>
      </div>
      <div class="news-slick__cell news-card">
        <a href="#">
          <p>2019.00.00</p>
          <h3>ニュースタイトルニュースタイトルニュースタイトルニュースタイトル</h3>
        </a>
      </div>
      <div class="news-slick__cell news-card">
        <a href="#">
          <p>2019.00.00</p>
          <h3>ニュースタイトルニュースタイトルニュースタイトルニュースタイトル</h3>
        </a>
      </div>
      <div class="news-slick__cell news-card">
        <a href="#">
          <p>2019.00.00</p>
          <h3>ニュースタイトルニュースタイトルニュースタイトルニュースタイトル</h3>
        </a>
      </div>
      <div class="news-slick__cell news-card">
        <a href="#">
          <p>2019.00.00</p>
          <h3>ニュースタイトルニュースタイトルニュースタイトルニュースタイトル</h3>
        </a>
      </div>
      <div class="news-slick__cell news-card">
        <a href="#">
          <p>2019.00.00</p>
          <h3>ニュースタイトルニュースタイトルニュースタイトルニュースタイトル</h3>
        </a>
      </div>
    </div>
    <div class="news-top__footer">
      <p><a href="#">Read More</a></p>
    </div>
    <script>
    $('.news-slick').slick({
      dots: true,
      infinite: false,
      speed: 300,
      slidesToShow: 3,
      slidesToScroll: 3,
      dots: false,
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 3,
            infinite: true,
          }
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
      ]
    });
    </script>
  </div>
</div>
