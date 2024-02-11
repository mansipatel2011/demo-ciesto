$(document).ready(function() {
  // Swiper: Slider
    new Swiper('.category-swiper', {
      loop: true,
      nextButton: '.swiper-button-next7',
      prevButton: '.swiper-button-prev7',
      slidesPerView: 4,
      paginationClickable: true,
      spaceBetween: 20,
      breakpoints: {
        1920: {
          slidesPerView: 4,
          spaceBetween: 30
        },
        1440:{
          slidesPerView: 2,
          spaceBetween: 30
        },
        1028: {
          slidesPerView: 2,
          spaceBetween: 30
        },
        991:{
          slidesPerView: 2,
          spaceBetween: 30
        },
        767:{
          slidesPerView: 1,
          spaceBetween: 30
        }, 
      }
    });
    new Swiper('.featured-swiper', {
      loop: true,
      nextButton: '.swiper-button-next1',
      prevButton: '.swiper-button-prev1',
      slidesPerView: 4,
      paginationClickable: true,
      spaceBetween: 20,
      breakpoints: {
        1920: {
          slidesPerView: 4,
          spaceBetween: 30
        },
        1440:{
          slidesPerView: 2,
          spaceBetween: 30
        },
        1028: {
          slidesPerView: 2,
          spaceBetween: 30
        },
        991:{
          slidesPerView: 2,
          spaceBetween: 30
        },
        767:{
          slidesPerView: 1,
          spaceBetween: 30
        }, 
      }
    }); 
    new Swiper('.offer-product-swiper', {
      loop: true,
      nextButton: '.swiper-button-next2',
      prevButton: '.swiper-button-prev2',
      slidesPerView: 4,
      paginationClickable: true,
      spaceBetween: 20,
      breakpoints: {
        1920: {
          slidesPerView: 4,
          spaceBetween: 30
        },
        1440:{
          slidesPerView: 2,
          spaceBetween: 30
        },
        1028: {
          slidesPerView: 2,
          spaceBetween: 30
        },
        991:{
          slidesPerView: 2,
          spaceBetween: 30
        },
        767:{
          slidesPerView: 1,
          spaceBetween: 30
        }, 
      }
    }); 
    new Swiper('.arrivals-product-swiper', {
      loop: true,
      nextButton: '.swiper-button-next3',
      prevButton: '.swiper-button-prev3',
      slidesPerView: 4,
      paginationClickable: true,
      spaceBetween: 20,
      breakpoints: {
        1920: {
          slidesPerView: 4,
          spaceBetween: 30
        },
        1028: {
          slidesPerView: 2,
          spaceBetween: 30
        },
        991:{
          slidesPerView: 1,
          spaceBetween: 30
        },
        576: {
          slidesPerView: 1,
          spaceBetween: 20
        }
      }
    });  
    new Swiper('.testimonial-swiper', {
      loop: true,
      nextButton: '.swiper-button-next4',
      prevButton: '.swiper-button-prev4',
      slidesPerView: 1,
      spaceBetween: 50,
      paginationClickable: true, 
    });  
    new Swiper('.partners-swiper', {
      loop: true, 
      nextButton: '.swiper-button-next5',
      prevButton: '.swiper-button-prev5',
      slidesPerView: 5,
      paginationClickable: true, 
      breakpoints: {
        1920: {
          slidesPerView: 5,
          spaceBetween: 30
        },
        1028: {
          slidesPerView: 3,
          spaceBetween: 30
        },
        991:{
          slidesPerView: 2,
          spaceBetween: 30
        },
        576: {
          slidesPerView:1,
          spaceBetween: 10
        }
      }
    });  
    new Swiper('.blog-swiper', {
      loop: true, 
      nextButton: '.swiper-button-next6',
      prevButton: '.swiper-button-prev6',
      slidesPerView: 2,
      paginationClickable: true,  
      easing: 'ease-in-out', 
      spaceBetween: 20,
      breakpoints: {
        1920: {
          slidesPerView: 2,
          spaceBetween: 30
        },
        1028: {
          slidesPerView: 2,
          spaceBetween: 30
        },
        991:{
          slidesPerView: 1,
          spaceBetween: 30
        },
        576: {
          slidesPerView: 1,
          spaceBetween: 10
        }
      }
    });  
    new Swiper('.banner-swiper', {
      loop: true, 
      nextButton: '.swiper-button-next8',
      prevButton: '.swiper-button-prev8',
      slidesPerView:1,
      spaceBetween: 20,

      paginationClickable: true,
    });  
  }); 


$('.input_search').on('blur', function(){
   $('main').removeClass('input-desc-hover').addClass('input-desc');
}).on('focus', function(){
  $('main').removeClass('input-desc').addClass('input-desc-hover');
});
 
   
 
$('.login_change').change(function() {
  if (this.value == 'login') {
    $('.login_form').css('display', 'inline-block');
    $('.login_breadcrub').css('display', 'inline-block');
    $('.register_form').css('display', 'none'); 
    $('.register_breadcrub').css('display', 'none'); 
  }
  else if (this.value == 'register') {
    $('.login_form').css('display', 'none');
    $('.login_breadcrub').css('display', 'none');
    $('.register_form').css('display', 'inline-block');
    $('.register_breadcrub').css('display', 'inline-block');
  } 
});



var buttonPlus  = $(".qty-btn-plus");
var buttonMinus = $(".qty-btn-minus");

var incrementPlus = buttonPlus.click(function() {
  var $n = $(this)
  .parent(".qty-container")
  .find(".input-qty");
  $n.val(Number($n.val())+1 );
});

var incrementMinus = buttonMinus.click(function() {
  var $n = $(this)
  .parent(".qty-container")
  .find(".input-qty");
  var amount = Number($n.val());
  if (amount > 0) {
    $n.val(amount-1);
  }
});

 
$("table").on("click", ".delete_icon", function() {
  $(this).closest("tr").remove();
});

$(".col-12").on("click", ".delete_icon", function() {
  $(this).closest(".product_row").remove();
});



$('#menu').metisMenu();

document.getElementById("myinput").oninput = function() {
  var value = (this.value-this.min)/(this.max-this.min)*100
  this.style.background = 'linear-gradient(to right, #B23632 0%, #B23632 ' + value + '%, #ADADAD ' + value + '%, #ADADAD 100%)'
};


// $(window).on('resize', function() { 
  if ($(window).width()<991) {
    $('.sidebar').css('display', 'none'); 
    $(".filter_toggle").on('click', function(){
      $('.sidebar').css('display', 'inline-block'); 
    })  
    $(".close_icon").on('click', function(){
      $('.sidebar').css('display', 'none'); 
    })
  } 
  else{
    $('.sidebar').css('display', 'inline-block'); 
  }
// }) 
