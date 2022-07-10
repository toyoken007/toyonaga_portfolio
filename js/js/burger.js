const ham = $('#js-hamburger');
const nav = $('#js-nav');
const list = $('.header_list ul');
ham.on('click', function () { //ハンバーガーメニューをクリックしたら
  ham.toggleClass('active'); // ハンバーガーメニューにactiveクラスを付け外し
  nav.toggleClass('active'); // ナビゲーションメニューにactiveクラスを付け外し
  // list.css({
  //   "display" : "none"
  // })
});