jQuery(document).ready(function($){
  $('.navicon').click(function(){
    //if mobile menu is not opened yet
    if($('.navicon').hasClass('closed')){

      //set its state to opened
      $('.navicon').removeClass('closed');
      $('.navicon').addClass('opened');

      // change the icon to close
      $('.navicon .fa').removeClass('fa-navicon');
      $('.navicon .fa').addClass('fa-times');

      // show the menu
      $('.mobile-navigation ul').css({"display":"block"});
      $('.mobile-navigation ul ul').css({"display":"none"}); //prevent lower level menu to open
    } 
    // if mobile menu is already open
    else{
      //set its state to opened
      $('.navicon').removeClass('opened');
      $('.navicon').addClass('closed');

      // change the icon to hamburger
      $('.navicon .fa').removeClass('fa-times');
      $('.navicon .fa').addClass('fa-navicon');

      // hide the menu
      $('.mobile-navigation ul').css({"display":"none"});
      //$('.mobile-navigation ul ul').css({"display":"none"}); //prevent lower level menu to open
    }

    $('.mobile-navigation .menu-item-has-children').children('a').append('<span class="submenu_switch"><i class="fa fa-plus"></i></span>');

    $('.submenu_switch').click(function(){
      if($(this).children('i').hasClass('fa-plus')){
        //close other expanded sub menu
        $('.menu-item-has-children').children('ul').css({"display":"none"});
        
        $('.submenu_switch i').each(function(){
          if($(this).hasClass('fa-minus')){
            $(this).addClass('fa-plus');
            $(this).removeClass('fa-minus'); 
          }
        });

        //open this specific sub menu
        $(this).parent().parent().children('ul').css({"display":"block"});

        //change icon to minus
        $(this).children('i').addClass('fa-minus');
        $(this).children('i').removeClass('fa-plus');        
      }
      else if($(this).children('i').hasClass('fa-minus')){
        //close other expanded sub menu
        $('.menu-item-has-children').children('ul').css({"display":"none"});

        //close this specific sub menu
        $(this).parent().parent().children('ul').css({"display":"none"});

        //change icon to plus
        $(this).children('i').addClass('fa-plus');
        $(this).children('i').removeClass('fa-minus');        
      }
    });


});
});