(function ($) {
  "use strict"

  /* 0. Proloder */
  $(window).on('load', function () {
    $('#preloader-active').delay(450).fadeOut('slow');
    $('body').delay(450).css({
      'overflow': 'visible'
    });
  });


  /* 1. sticky And Scroll UP */
  $(window).on('scroll', function () {
    var scroll = $(window).scrollTop();
    if (scroll < 400) {
      $(".header-sticky").removeClass("sticky-bar");
      $('#back-top').fadeOut(500);
    } else {
      $(".header-sticky").addClass("sticky-bar");
      $('#back-top').fadeIn(500);
    }
  });

  // Scroll Up
  $('#back-top a').on("click", function () {
    $('body,html').animate({
      scrollTop: 0
    }, 800);
    return false;
  });

  /* 2. slick Nav */
  // mobile_menu
  var menu = $('ul#navigation');
  if (menu.length) {
    menu.slicknav({
      prependTo: ".mobile_menu",
      closedSymbol: '+',
      openedSymbol: '-'
    });
  };


  //3. Search Toggle
  $("#search_input_box").hide();
  $("#search_1").on("click", function () {
    $("#search_input_box").slideToggle();
    $("#search_input").focus();
  });
  $("#close_search").on("click", function () {
    $('#search_input_box').slideUp(500);
  });



  //4. h1-hero-active
  function mainSlider() {
    var BasicSlider = $('.slider-active');
    BasicSlider.on('init', function (e, slick) {
      var $firstAnimatingElements = $('.single-slider:first-child').find('[data-animation]');
      doAnimations($firstAnimatingElements);

    });
    BasicSlider.on('beforeChange', function (e, slick, currentSlide, nextSlide) {
      var $animatingElements = $('.single-slider[data-slick-index="' + nextSlide + '"]').find('[data-animation]');
      doAnimations($animatingElements);

    });

    BasicSlider.slick({
      autoplay: true,
      autoplaySpeed: 4000,
      dots: false,
      fade: true,
      arrows: true,
      prevArrow: '<button type="button" class="slick-prev"><i class="ti-angle-left"></i></button>',
      nextArrow: '<button type="button" class="slick-next"><i class="ti-angle-right"></i></button>',
      responsive: [{
        breakpoint: 1024,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          infinite: true,
        }
      },
      {
        breakpoint: 991,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          arrows: true
        }
      },
      {
        breakpoint: 767,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          arrows: false
        }
      }
      ]
    });
    function doAnimations(elements) {
      var animationEndEvents = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
      elements.each(function () {
        var $this = $(this);
        var $animationDelay = $this.data('delay');
        var $animationType = 'animated ' + $this.data('animation');
        $this.css({
          'animation-delay': $animationDelay,
          '-webkit-animation-delay': $animationDelay
        });
        $this.addClass($animationType).one(animationEndEvents, function () {
          $this.removeClass($animationType);
        });
      });
    }
  }
  mainSlider();


  //5. Single Img slider
  $('.directory-active').slick({
    dots: false,
    infinite: true,
    autoplay: true,
    speed: 400,
    arrows: true,
    prevArrow: '<button type="button" class="slick-prev"><i class="fas fa-chevron-left"></i></button>',
    nextArrow: '<button type="button" class="slick-next"><i class="fas fa-chevron-right"></i></button>',
    slidesToShow: 4,
    slidesToScroll: 1,
    responsive: [
      {
        breakpoint: 1400,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 1,
          infinite: true,
          dots: false,
        }
      },
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1,
          infinite: true,
          dots: false,
        }
      },
      {
        breakpoint: 992,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1,
          infinite: true,
          dots: false,
        }
      },
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          arrows: false
        }
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          arrows: false
        }
      },
    ]
  });

  /* 5. Testimonial Active*/
  var testimonial = $('.h1-testimonial-active');
  if (testimonial.length) {
    testimonial.slick({
      dots: false,
      infinite: true,
      speed: 1000,
      autoplay: false,
      arrows: true,
      prevArrow: '<button type="button" class="slick-prev"><i class="ti-angle-left"></i></button>',
      nextArrow: '<button type="button" class="slick-next"><i class="ti-angle-right"></i></button>',
      slidesToShow: 1,
      slidesToScroll: 1,
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            infinite: true,
            dots: false,
            arrows: true
          }
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            dots: false,
            arrows: false
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            dots: false,
            arrows: false
          }
        }
      ]
    });
  }

  // 7. selling-active
  $('.latest-items-active').slick({
    dots: false,
    infinite: true,
    autoplay: true,
    speed: 400,
    arrows: true,
    prevArrow: '<button type="button" class="slick-prev"><i class="ti-angle-left"></i></button>',
    nextArrow: '<button type="button" class="slick-next"><i class="ti-angle-right"></i></button>',
    slidesToShow: 4,
    slidesToScroll: 1,
    responsive: [
      {
        breakpoint: 1400,
        settings: {
          slidesToShow: 4,
          slidesToScroll: 1,
          infinite: true,
          dots: false,
        }
      },
      {
        breakpoint: 1200,
        settings: {
          slidesToShow: 4,
          slidesToScroll: 1,
          infinite: true,
          dots: false,
        }
      },
      {
        breakpoint: 992,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 1,
          infinite: true,
          dots: false,
        }
      },
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1,
          arrows: false
        }
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          arrows: false
        }
      },
    ]
  });

  /* 6. Nice Selectorp  */
  var nice_Select = $('select');
  if (nice_Select.length) {
    nice_Select.niceSelect();
  }

  /* 7. data-background */
  $("[data-background]").each(function () {
    $(this).css("background-image", "url(" + $(this).attr("data-background") + ")")
  });

  /* 10. WOW active */
  new WOW().init();

  // 11. ---- Mailchimp js --------//  
  // function mailChimp() {
  //   $('#mc_embed_signup').find('form').ajaxChimp();
  // }
  // mailChimp();


  // 12 Pop Up Img
  var popUp = $('.single_gallery_part, .img-pop-up');
  if (popUp.length) {
    popUp.magnificPopup({
      type: 'image',
      gallery: {
        enabled: true
      }
    });
  }

  // 13 Pop Up Video
  var popUp = $('.popup-video');
  if (popUp.length) {
    popUp.magnificPopup({
      type: 'iframe'
    });
  }

  /* 14. counterUp*/
  $('.counter').counterUp({
    delay: 10,
    time: 3000
  });


  //15. click counter Number js
  (function () {
    window.inputNumber = function (el) {
      var min = el.attr('min') || false;
      var max = el.attr('max') || false;
      var els = {};
      els.dec = el.prev();
      els.inc = el.next();

      el.each(function () {
        init($(this));
      });
      function init(el) {

        els.dec.on('click', decrement);
        els.inc.on('click', increment);
        function decrement() {
          var value = el[0].value;
          value--;
          if (!min || value >= min) {
            el[0].value = value;
          }
        }

        function increment() {
          var value = el[0].value;
          value++;
          if (!max || value <= max) {
            el[0].value = value++;
          }
        }
      }
    }
  })();
  inputNumber($('.input-number'));
  inputNumber($('.input-number2'));


})(jQuery);


// Home add_to_cart function
function home_add_to_cart(id, price, quantity) {
  jQuery('#product_id').val(id);
  jQuery('#product_price').val(price);
  add_to_cart();
}


// add_to_cart function
function add_to_cart() {
  jQuery.ajax({
    url: "/add_to_cart",
    data: jQuery('#frmadd_to_cart').serialize(),
    type: 'POST',
    success: function (result) {
      alert("Product " + result.msg)
      $('#sh-cart').css('content','2')
    }

  });

}

function add_to_wish(id, price,W_delete) {
  jQuery('#product_id').val(id);
  jQuery('#product_price').val(price);
  jQuery('#w_delete').val(W_delete);
  jQuery.ajax({
    url: "/add_to_wish",
    data: jQuery('#frmadd_to_cart').serialize(),
    type: 'POST',
    success: function (result) {
      alert("Product " + result.msg)
      $('#sh-cart').css('content','2')
    }

  });

}



jQuery(document).ready(function () {
  // This button will increment the value
  $('[data-quantity="plus"]').click(function (e) {
    // Stop acting like a button
    e.preventDefault();
    // Get the field name
    fieldName = $(this).attr('data-field');
    // Get its current value
    var currentVal = parseInt($('input[name=' + fieldName + ']').val());
    // If is not undefined
    if (!isNaN(currentVal)) {
      // Increment
      $('input[name=' + fieldName + ']').val(currentVal++);
    } else {
      // Otherwise put a 0 there
      $('input[name=' + fieldName + ']').val(0);
    }
  });
  // This button will decrement the value till 0
  $('[data-quantity="minus"]').click(function (e) {
    // Stop acting like a button
    e.preventDefault();
    // Get the field name
    fieldName = $(this).attr('data-field');
    // Get its current value
    var currentVal = parseInt($('input[name=' + fieldName + ']').val());
    // If it isn't undefined or its greater than 0
    if (!isNaN(currentVal) && currentVal > 0) {
      // Decrement one
      $('input[name=' + fieldName + ']').val(currentVal--);
    } else {
      // Otherwise put a 0 there
      $('input[name=' + fieldName + ']').val(0);
    }
  });
});



function updateQTY(id, price) {
  jQuery('#product_id').val(id);
  jQuery('#product_price').val(price);
  var qty=jQuery('#qty-'+id).val();
  jQuery('#quantity').val(qty);
  jQuery('#total_price_'+id).html('₹'+qty*price);
  add_to_cart();
}

function deleteCartProduct(id,qty,price) {
  jQuery('#product_id').val(id);
  jQuery('#quantity').val(qty);
  jQuery('#product_price').val(price);
  jQuery('#cart-product-'+id).remove();
  add_to_cart();
}
function deleteWishProduct(id,qty,price) {
  jQuery('#product_id').val(id);
  jQuery('#quantity').val(qty);
  jQuery('#product_price').val(price);
  jQuery('#cart-product-'+id).remove();
  add_to_wish(id,price,1);
}

function sort_by(){
  var sort_by_value=jQuery('#sort_by_value').val();
  jQuery('#sort').val(sort_by_value);
  jQuery('#categoryFilter').submit();
}

// price filter
  
  var filter_from = jQuery('#filter_price_from').val();
  var filter_to = jQuery('#filter_price_to').val();

if(filter_from == "" || filter_to == ""){
  var filter_from = 100;
  var filter_to = 500;
}

jQuery('#lower').val(filter_from);
jQuery('#upper').val(filter_to);

var lowerSlider = document.querySelector('#lower');
var upperSlider = document.querySelector('#upper');

document.querySelector('#end').value = upperSlider.value;
document.querySelector('#start').value = lowerSlider.value;

var lowerVal = parseInt(lowerSlider.value);
var upperVal = parseInt(upperSlider.value);

upperSlider.oninput = function () {
    lowerVal = parseInt(lowerSlider.value);
    upperVal = parseInt(upperSlider.value);

    if (upperVal <= lowerVal + 4) {
        lowerSlider.value = upperVal - 4;
        if (lowerVal == lowerSlider.min) {
            upperSlider.value = 4;
        }
    }
    document.querySelector('#end').value = this.value;
};

lowerSlider.oninput = function () {
    lowerVal = parseInt(lowerSlider.value);
    upperVal = parseInt(upperSlider.value);
    if (lowerVal >= upperVal - 4) {
        upperSlider.value = lowerVal + 4;
        if (upperVal == upperSlider.max) {
            lowerSlider.value = parseInt(upperSlider.max) - 4;
        }
    }
    document.querySelector('#start').value = this.value;
    document.querySelector('#end').value = upperSlider.value; // Update upper slider's text value
};

upperSlider.oninput = function () {
    lowerVal = parseInt(lowerSlider.value);
    upperVal = parseInt(upperSlider.value);

    if (upperVal <= lowerVal + 4) {
        upperSlider.value = lowerVal + 4;
        if (upperVal == upperSlider.min) {
            lowerSlider.value = 0;
        }
    }
    document.querySelector('#end').value = this.value;
    document.querySelector('#start').value = lowerSlider.value; // Update lower slider's text value
};


function sort_price_fliter(){
  
  jQuery('#filter_price_from').val(jQuery('#start').val());
  jQuery('#filter_price_to').val(jQuery('#end').val());
  jQuery('#categoryFilter').submit();
}


function search_filter(){
  var search_input = jQuery('#search_input').val();
  if(search_input != ''){
    window.location.href = '/search/'+search_input;
  }
}

// jQuery('#btn_tyuhn').click(function(e){
//   e.preventDefault();
//   alert("zxc");
//   jQuery.ajex({
//     url:'registration_process',
//     data:jQuery('#register').serialize(),
//     type:'POST',
//     success:function(result){

//     }
//   });
// });
 

function applyCouponCode(){
  jQuery('#coupon_code_msg').html('');
  jQuery('#order_placed_msg').html('');
  var coupon_code = jQuery('#coupon_code').val();
  if(!coupon_code == ''){
    jQuery.ajax({
      url:'/apply_coupon_code',
      type:'POST',
      data:'coupon_code='+coupon_code+'&_token='+jQuery("[name='_token']").val(),
      success:function(result){
        if(result.status=="success"){
          jQuery('.show_coupon_code').show();
          jQuery('#coupon_code_str').html(coupon_code);
          jQuery('#total_price').html("₹"+result.TotalPrice);
          jQuery("input[name='totalPrice']").val(result.TotalPrice);
          jQuery('.apply_coupon_code_box').hide();


          jQuery('#coupon_code_msg').html('<p style="color:green;margin-left: 40px;"><b>'+result.msg+'</b></p>');
        }else{
          jQuery('#coupon_code_msg').html('<p style="color:red;margin-left: 40px;"><b>'+result.msg+'</b></p>');
        }
      }

    })
  }else{
    jQuery('#coupon_code_msg').html('<p style="color:red;">Please enter coupon code</p>');
  }
}

function remove_coupon_code(){
  jQuery('#coupon_code').val('');
  jQuery('.show_coupon_code').hide();
  jQuery('.apply_coupon_code_box').show();
  jQuery('.total_price_box1').hide();
  jQuery('.total_price_box2').show();
  jQuery('#coupon_code_msg').html('<p style="color:red;margin-left: 40px;">Coupon Code is Removed</p>');
}

function validateForm() {
  let name = document.forms["order_place"]["name"].value;
  let email = document.forms["order_place"]["email"].value;
  let phone = document.forms["order_place"]["phone"].value;
  let address = document.forms["order_place"]["address"].value;
  let state = document.forms["order_place"]["state"].value;
  let city = document.forms["order_place"]["city"].value;
  let zip = document.forms["order_place"]["zip"].value;
  var validRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;


  if (name == "") {
    jQuery('#formMsg').html("Name must be filled out");
    jQuery('#order_placed_msg1').html('Fill the form');
  }else if(email == "" & validRegex.test(email)){
    jQuery('#formMsg').html("Email must be filled out");
    jQuery('#order_placed_msg1').html('Fill the form');
  }
  else if(phone == ""){
    jQuery('#formMsg').html("Phone must be filled out");
    jQuery('#order_placed_msg1').html('Fill the form');
  }
  else if(address == ""){
    jQuery('#formMsg').html("Address must be filled out");
    jQuery('#order_placed_msg1').html('Fill the form');
  }
  else if(state == ""){
    jQuery('#formMsg').html("State must be filled out");
    jQuery('#order_placed_msg1').html('Fill the form');
  }
  else if(city == ""){
    jQuery('#formMsg').html("City must be filled out");
    jQuery('#order_placed_msg1').html('Fill the form');
  }
  else if(zip == ""){
    jQuery('#formMsg').html("zip must be filled out");
    jQuery('#order_placed_msg1').html('Fill the form');
  }else{
    return ture;
  }

}

function test() {
  // validateForm();
  // if(validate==true){
    var form_data = new FormData(document.getElementById("frmPlaceOrder")); 
    // prevent form submission
    // if(validateForm()==0 ){
    //   jQuery('#order_placed_msg').html('Please Wait.....');
    // }
    $.ajax({
      url:'/place_order',
      contentType: 'multipart/form-data',
      cache: false,
      contentType: false,
      processData: false,
      data: form_data , // serialize form data and attach to request
      type:'POST',
      success:function(result) {
        if(result.status=='success'){
          if(result.payment_url!=''){
            window.location.href=result.payment_url;
          }else{
            window.location.href="order_placed";
          }
        }
        jQuery('#order_placed_msg').html(result.msg);
      }
    });
  // }

}  

function review_form() {
  var form_data = new FormData(document.getElementById("reviewForm")); 
  e.preventDefault // prevent form submission
  jQuery('#review_msg').html('Please Wait.....');
  $.ajax({
    url:'/review_submit',
    contentType: 'multipart/form-data',
    cache: false,
    contentType: false,
    processData: false,
    data: form_data , // serialize form data and attach to request
    type:'POST',
    success:function(result) {
      if(result.status=='success'){
        console.log(result);
      }
      // jQuery('#order_placed_msg').html(result.msg);
    }
  });

}  

function share_btn(){
  const url = window.document.location.href;
  if(navigator.share){
    navigator.share({
      title:"hello this is test",
      url:'${url}'
    });
  }else{
    alert("else part");
  }
}

function footer_cat(){
  jQuery.ajax({
    url: "/footer_detail",
    type: 'get',
    success: function (result) {
      jQuery('#footer_category').html(result)
    }

  });
}
