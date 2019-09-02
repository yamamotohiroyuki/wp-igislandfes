// JavaScript Document

$(function (){
  window_fixer();

});

$(window).on('load resize',function () {
  window_fixer();
});
/*
$(".js-modaal-video-btn").modaal({ type: 'video' });
$(".js-modaal-image-btn").modaal({ type: 'image' });
$(".js-modaal-btn").modaal();
*/

function window_fixer() {
    //var header_h = $('.global-header').outerHeight();
    var window_h = $(window).height();
    //var window_w = $(window).width();
    var contents_h = window_h;
    $('.global-main').css({
      "min-height": contents_h,
    });
}



///////////////////////////////////////////  globalmenu trigger
var current_scrollY;
$(document).on('click', '.js-globalmenu-trigger', function () {
  if ($('body').hasClass('is-globalmenu-open')){
    //スクロール固定解除
    $( '.global-wrapper' ).attr( { style: '' } );
    $( 'html, body' ).prop( { scrollTop: current_scrollY } );
    // class remove
    $('body').removeClass('is-globalmenu-open');
  } else {
    current_scrollY = $( window ).scrollTop();
    //スクロール固定
    $( '.global-wrapper' ).css( { top: -1 * current_scrollY });
    // class add
    $('body').addClass('is-globalmenu-open');
  }
});



///////////////////////////////////////////  page scroll

$(function(){
  //URLのハッシュ値を取得
  var urlHash = location.hash;
  //ハッシュ値があればページ内スクロール
  if(urlHash) {
    //スクロールを0に戻す
    $('body,html').stop().scrollTop(0);
    setTimeout(function () {
      //ロード時の処理を待ち、時間差でスクロール実行
      scrollToAnker(urlHash) ;
    }, 100);
  }

  //通常のクリック時
  $('.js-scroller').click(function() {
    //ページ内リンク先を取得
    var href= $(this).attr("href");
    //リンク先が#か空だったらhtmlに
    var hash = href == "#" || href == "" ? 'html' : href;
    //スクロール実行
    scrollToAnker(hash);
    //リンク無効化
    return false;
  });

  // 関数：スムーススクロール
  // 指定したアンカー(#ID)へアニメーションでスクロール
  function scrollToAnker(hash) {
    var target = $(hash);
    var position = target.offset().top;
    $('body,html').stop().animate({scrollTop:position}, 500);
  }
  
});



///////////////////////////////////////////  header
var head = $('.global-header');
var posFlag = false;
$(window).scroll(function () {
  if ($(this).scrollTop() > ($(window).height() / 10 ) ) {
    if (posFlag == false) {
      posFlag = true;
      head.addClass('in-view');
    }
  } else {
    if (posFlag) {
      posFlag = false;
      head.removeClass('in-view');
    }
  }
});


