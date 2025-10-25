less.watch();





$(document).ready(function () {

    $(".icon-search").click(function(){

    $(".artseed-search").addClass('is-active');

    });

  

   $(".ic_close").click(function(){

    $(".artseed-search").removeClass('is-active');

    });

     

   $('.advgiua .item').fancybox();



               



               

   $(".closed").click(function () {





      $(".box-cartajax").removeClass('open');





      $(".bg-ajax").removeClass('open');





   });



   $(".menu-icon").click(function () {





      $(".menu_mb").toggleClass("open");



      $(".bg-white").toggleClass("open");



      $('html').addClass('no-scroll');





   });





   $(".bg-white").click(function () {





      if ($(this).hasClass("open")) {





         $(this).removeClass("open");





      }





      $(".menu_mb").removeClass("open");

      $('html').removeClass('no-scroll');





   });





});





$(document).ready(function () {

    $('.mv-slider').slick({





      dots: true,

      arrows: false,

      infinite: true,

      fade:true,

      speed: 300,



      slidesToShow: 1,



      slidesToScroll: 1,



      autoplay: true,



      autoplaySpeed: 3000,





   });

   $('.owl-spbc').slick({





      dots: false,

      arrows: false,

      infinite: true,



      speed: 300,



      slidesToShow: 1,



      slidesToScroll: 1,



      autoplay: true,



      autoplaySpeed: 3000,





   });

   //  $('.advgiua').slick({





   //    dots: false,

   //    arrows: true,

   //    infinite: true,



   //    speed: 300,



   //    slidesToShow: 7,



   //    slidesToScroll: 1,



   //    autoplay: true,



   //    autoplaySpeed: 3000,

   //     responsive: [



   //       {

   //          breakpoint: 768,

   //          settings: {

   //             slidesToShow: 4,

   //             arrows: false,

   //          }

   //       },

   //       {

   //          breakpoint: 480,

   //          settings: {

   //             slidesToShow: 2,

   //          }

   //       }

   //    ]





   // });





   $('.owl-partner').slick({


      dots: false,

      infinite: true,

      slidesToShow: 7,

      slidesToScroll: 1,

      autoplay: true,

      autoplaySpeed: 3000,

      speed: 300, // tốc độ chuyển slide
       swipeToSlide: true,
       touchThreshold: 10, // tăng độ nhạy cảm ứng
       cssEase: 'ease-out', // hiệu ứng mượt hơn
       adaptiveHeight: true, // tự động điều chỉnh chiều cao

      responsive: [



         {

            breakpoint: 768,

            settings: {

               slidesToShow: 3,

               arrows: false,

            }

         },

         {

            breakpoint: 480,

            settings: {

               slidesToShow: 4,

               arrows: false,



            }

         }

      ]

   });



  

   $('.owl-old-pr').slick({

      dots: false,

      infinite: true,

      speed: 1000,

      autoplaySpeed: 3000,

      slidesToShow: 4,

      slidesToScroll: 1,
       autoplay: true,          // bật chế độ tự động chạy


      responsive: [



         {

            breakpoint: 767,

            settings: {

               slidesToShow: 2,



            }

         },

         {

            breakpoint: 480,

            settings: {

               slidesToShow: 2,

               arrows: false,

               autoplay: true,



               autoplaySpeed: 3000,

            }

         }

      ]





   });



   $('.owl-project').slick({





      dots: true,
      arrows:false,




      infinite: true,





      speed: 300,





      slidesToShow: 5,





      slidesToScroll: 5,

      responsive: [



         {

            breakpoint: 767,

            settings: {

               slidesToShow: 2,
               slidesToScroll: 1,


            }

         },

         {

            breakpoint: 480,

            settings: {

               slidesToShow: 2,


               autoplay: true,
               dots:false,


               autoplaySpeed: 3000,
               slidesToScroll: 1,

            }

         }

      ]





   });





   $('.owlnew-home-tt').slick({





      dots: false,





      speed: 300,





      slidesToShow: 3,





      slidesToScroll: 1,

      responsive: [



         {

            breakpoint: 767,

            settings: {

               slidesToShow: 2,



            }

         },

         {

            breakpoint: 480,

            settings: {

               slidesToShow: 1,

               arrows: false,

               autoplay: true,



               autoplaySpeed: 3000,

            }

         }

      ]





   });

      





   $('.owl_img_product_details').slick({





      dots: false,

      arrows: false,

      infinite: true,



      slidesToShow: 5,



      slidesToScroll: 5,



   });



 





   $("#img_01").elevateZoom({





      gallery: 'slidezoompage',





      cursor: 'pointer',





      galleryActiveClass: 'active',





      imageCrossfade: true,





      scrollZoom: true,





      easing: true





   });





   //





   $("#img_01").bind("click", function (e) {





      var ez = $('#img_01').data('elevateZoom');





      $.fancybox(ez.getGalleryList());





      var src = $(this).find('img').attr('src');





      $('#img_01').attr('src', src);





      return false;





   });





   $("#slidezoompage a").bind("click", function (e) {





      var src = $(this).find('img').attr('src');





      $('#img_01').attr('src', src);





      return false;





   });



});





///////////cart/////////////





function createCookie(name, value, days) {





   if (days) {





      var date = new Date();





      date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1));





      var expires = "; expires=" + date.toGMTString();





   } else var expires = "";





   document.cookie = name + "=" + value + expires + "; path=/";





}





function readCookie(name) {





   var nameEQ = name + "=";





   var ca = document.cookie.split(';');





   for (var i = 0; i < ca.length; i++) {





      var c = ca[i];





      while (c.charAt(0) == ' ') c = c.substring(1, c.length);





      if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);





   }





   return null;





}





function eraseCookie(name) {





   createCookie(name, "", -1);





}





$(document).ready(function () {





   $(".listvourcher .item label").click(function () {





      $(this).next(".info").addClass('show');





      $(".black").addClass('show');





   });





   $(".listvourcher .black").click(function () {





      $(".info").removeClass('show');





      $(this).removeClass('show');





   });





   $(".listvourcher .item .close").click(function () {





      $(".info").removeClass('show');





      $(".black").removeClass('show');





   });

      

});