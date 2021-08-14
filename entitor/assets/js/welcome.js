const scrollToNick = ()=> $("html, body").animate({scrollTop: $("#nick").offset()['top'] });
$("#nick-alert-box").click((e)=>{
  $(e.target).addClass("d-none");
});