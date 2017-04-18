jQuery(function ($) {
  var bioOn = false;
  var abstractOn = false;

  
  $('.spkgd_speaker-bio-link').click(toggleBio);
  $('.spkgd_abstract-link').click(toggleAbstract);
  
  
  function toggleBio(){
    if ($(this).siblings('.spkgd_abstract-link').find('img').css('animation').includes('arrowUp')){
      killAbstract($(this));
    } 
    $(this).parent().siblings('.spkgd_speaker-bio').slideToggle(); // toggle the BIO view
    spinArrow($(this));    
  }
  
  function toggleAbstract(){
    if ($(this).siblings('.spkgd_speaker-bio-link').find('img').css('animation').includes('arrowUp')){
      killBio($(this));  
    }
    $(this).parent().siblings('.spkgd_abstract').slideToggle(); // toggle the abstract view
    spinArrow($(this)); 
  }
  
  function spinArrow(target_arrow){
    if ($("img", target_arrow).css('animation').includes('arrowUp')){
      $("img", target_arrow).css("-webkit-animation", "arrowDown .4s forwards");
      $("img", target_arrow).css("animation", "arrowDown .4s forwards");
      $(target_arrow).css("background-color", "#bfcdd9");
    } else {
      $("img", target_arrow).css("-webkit-animation", "arrowUp .4s forwards");
      $("img", target_arrow).css("animation", "arrowUp .4s forwards");
      $(target_arrow).css("background-color", "#dfe6ec"); 
    }
  }
  
  function killAbstract(button){
    button.parent().siblings('.spkgd_abstract').css('display', 'none');
    spinArrow(button.siblings('.spkgd_abstract-link'));
  }
  
  function killBio(button){
    button.parent().siblings('.spkgd_speaker-bio').css('display', 'none');
    spinArrow(button.siblings('.spkgd_speaker-bio-link'));
  }
  
});