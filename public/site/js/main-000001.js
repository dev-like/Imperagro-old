( function( window ) {

'use strict';

  $('.menu-mob').click(function(e){
    e.preventDefault();
    $('nav .content-mobile .l').slideToggle();
  });

  // eventos
  $('.options-eventos li a').click(function(e){
    e.preventDefault();
    if ($(this)[0].id == "todos"){
      $('.lista-eventos').slick('slickUnfilter');
    } else {
      $('.lista-eventos').slick('slickUnfilter');
      $('.lista-eventos').slick('slickFilter','.'+$(this)[0].id);
    }

    $('.options-eventos li a').removeClass('active');
    $(this).addClass('active');
  });

  // Funcionalidades do Menu
  $(window).scroll(function()
  {
    if($(this).scrollTop() > 190)
    {
      $('nav').addClass('fix');
      $('.cotacoes').addClass('fix');
    }
    else
    {
      $('nav').removeClass('fix');
      $('.cotacoes').removeClass('fix');
    }
  });

  // soluções
  $(".lista-solu.i1 .lst").owlCarousel({
    loop:true,
    items:3,
    margin:60,
    nav:false,
    autoplay: true,
    slideBy:3,
    responsiveClass:true,
    responsive:{
        0:{
            items:1
        },
        768:{
            items:2
        },
        992:{
            items:3
        }
    }
  });
  $(".lista-solu.i2 .lst").owlCarousel({
    loop:true,
    items:3,
    margin:60,
    nav:false,
    autoplay: true,
    slideBy:3,
    responsive:{
        0:{
            items:1
        },
        768:{
            items:2
        },
        992:{
            items:3
        }
    }
  });
  $(".lista-solu.i3 .lst").owlCarousel({
    loop:true,
    items:3,
    margin:60,
    nav:false,
    autoplay: true,
    navElem:[
      '<button type="button" role="presentation" id="owl-prev" class="owl-prev"> ‹ </button>',
      '<button type="button" role="presentation" id="owl-next" class="owl-next"> › </button>'],
    responsiveClass:true,
    responsive:{
        0:{
            items:1
        },
        768:{
            items:2
        },
        992:{
            items:3
        }
    }
  });
  $(".lista-solu.i4 .lst").owlCarousel({
    loop:true,
    items:3,
    margin:60,
    nav:false,
    autoplay: true,
    navElem:[
      '<button type="button" role="presentation" id="owl-prev" class="owl-prev"> ‹ </button>',
      '<button type="button" role="presentation" id="owl-next" class="owl-next"> › </button>'],
    responsiveClass:true,
    responsive:{
        0:{
            items:1
        },
        768:{
            items:2
        },
        992:{
            items:3
        }
    }
  });
  $(".lista-solu.i5 .lst").owlCarousel({
    loop:true,
    items:3,
    margin:60,
    nav:false,
    autoplay: true,
    navElem:[
      '<button type="button" role="presentation" id="owl-prev" class="owl-prev"> ‹ </button>',
      '<button type="button" role="presentation" id="owl-next" class="owl-next"> › </button>'],
    responsiveClass:true,
    responsive:{
        0:{
            items:1
        },
        768:{
            items:2
        },
        992:{
            items:3
        }
    }
  });

  $('.servicos-solucoes .solu a').click(function(e){
    e.preventDefault();
    $('.servicos-solucoes .solu a').removeClass('active');
    $('.listagem-solu .lista-solu').css('display','none')

    $(this).addClass('active');
    $('.listagem-solu .lista-solu.'+$(this)[0].id).fadeIn(1000);
  });

  // banner
  $(".lista-banner").slick({
    dots: false,
    infinite: true,
    speed: 900,
    fade: true,
    arrows: true,
    cssEase: 'linear',
    adaptiveHeight: true,
    autoplay: true
  });

  // eventos
  $(".lista-eventos").slick({
    infinite: true,
    slidesToShow: 2,
    slidesToScroll: 1,
    arrows: false,
    autoplay: true,
    responsive: [
      {
        breakpoint: 720,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }
    ]
  });

  // siganos
  $(".lista-insta").slick({
    infinite: true,
    slidesToShow: 3,
    slidesToScroll: 1,
    arrows: false,
    autoplay: true,
    responsive: [
      {
        breakpoint: 992,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1
        }
      },
      {
        breakpoint: 668,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }
    ]
  });

  // depoimentos
  $(".depo-carousel").owlCarousel({
    loop:true,
    items:2,
    margin:30,
    nav:false,
    autoplay: true,
    navElem:[
      '<button type="button" role="presentation" id="owl-prev" class="owl-prev"> ‹ </button>',
      '<button type="button" role="presentation" id="owl-next" class="owl-next"> › </button>'],
    responsiveClass:true,
    responsive:{
        0:{
            items:1
        },
        768:{
            items:2,
            nav:false
        }
    }
  });

  // maps
  var selectmap = document.getElementById('maps-sel');
  selectmap.addEventListener("change", function(){
    document.getElementById('maps-adr').innerHTML = selectmap.options[selectmap.selectedIndex].getAttribute('adr');
    document.getElementById('maps-map').setAttribute("src", selectmap.options[selectmap.selectedIndex].getAttribute('map'));
  });

  //rolagem
  $('nav li a[href^="#"]').on('click', function(e) {
    e.preventDefault();
    var id = $(this).attr('href'),
        targetOffset = $(id).offset().top-120;

    $('html, body').animate({
      scrollTop: targetOffset
    }, 500);
  });

})( window );
