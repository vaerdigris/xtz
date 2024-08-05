(function ($) {


  function dynamicCurrentMenuClass(selector) {
    let FileName = window.location.href.split("/").reverse()[0];

    selector.find("li").each(function () {
      let anchor = $(this).find("a");
      if ($(anchor).attr("href") == FileName) {
        $(this).addClass("current");
      }
    });
    selector.children("li").each(function () {
      if ($(this).find(".current").length) {
        $(this).addClass("current");
      }
    });
    if ("" == FileName) {
      selector.find("li").eq(0).addClass("current");
    }
  }

  $(document).ready(function () {
    var clickableDivs = document.querySelectorAll('.partners__item');

    clickableDivs.forEach(function (div) {
      div.addEventListener('click', function () {
        var url = div.getAttribute('data-url');
        if (url) {
          window.open(url, '_blank');
        }
      });
    });
  });



  if ($(".wow").length) {
    var wow = new WOW({
      boxClass: "wow", 
      animateClass: "animated", 
      mobile: true, 
      live: true, 
    });
    wow.init();
  }



  // window load event
  $(window).on("load", function () {
    if ($(".preloader").length) {
      $(".preloader").fadeOut();
    }

  });

  // Carousel
  let thmOwlCarousels = $(".xtz-owl__carousel");
  if (thmOwlCarousels.length) {
    thmOwlCarousels.each(function () {
      let elm = $(this);
      let options = elm.data("owl-options");
      let thmOwlCarousel = elm.owlCarousel(
        "object" === typeof options ? options : JSON.parse(options)
      );
    });
  }

 // Text Slider
  let parent = document.querySelectorAll('.client-slider__animate-text');
  for (let i = 0; i < parent.length; i++) {
    parent[i].style.width = parent[i].children[0].clientWidth + "px";
  };

  // For Typing Animation
  var TxtType = function (el, toRotate, period) {
    this.toRotate = toRotate;
    this.el = el;
    this.loopNum = 0;
    this.period = parseInt(period, 10) || 2000;
    this.txt = '';
    this.tick();
    this.isDeleting = false;
  };
  TxtType.prototype.tick = function () {
    var i = this.loopNum % this.toRotate.length;
    var fullTxt = this.toRotate[i];

    if (this.isDeleting) {
      this.txt = fullTxt.substring(0, this.txt.length - 1);
    } else {
      this.txt = fullTxt.substring(0, this.txt.length + 1);
    }

    this.el.innerHTML = '<span class="wrap">' + this.txt + '<span class="wrap-border"></span></span>';

    var that = this;
    var delta = 200 - Math.random() * 100;

    if (this.isDeleting) {
      delta /= 2;
    }
    if (!this.isDeleting && this.txt === fullTxt) {
      delta = this.period;
      this.isDeleting = true;
    } else if (this.isDeleting && this.txt === '') {
      this.isDeleting = false;
      this.loopNum++;
      delta = 500;
    }

    setTimeout(function () {
      that.tick();
    }, delta);
  };

  window.onload = function () {
    var elements = document.getElementsByClassName('typewrite');
    for (var i = 0; i < elements.length; i++) {
      var toRotate = elements[i].getAttribute('data-type');
      var period = elements[i].getAttribute('data-period');
      if (toRotate) {
        new TxtType(elements[i], JSON.parse(toRotate), period);
      }
    }
  };

  // FAQ 
  if ($(".faq-page__accordion").length) {
    var accordionGrp = $(".faq-page__accordion");
    accordionGrp.each(function () {
      var accordionName = $(this).data("grp-name");
      var Self = $(this);
      var accordion = Self.find(".accordion");
      Self.addClass(accordionName);
      Self.find(".accordion .accordion-content").hide();
      Self.find(".accordion.active").find(".accordion-content").show();
      accordion.each(function () {
        $(this)
          .find(".accordion-title")
          .on("click", function () {
            if ($(this).parent().hasClass("active") === false) {
              $(".faq-page__accordion." + accordionName)
                .find(".accordion")
                .removeClass("active");
              $(".faq-page__accordion." + accordionName)
                .find(".accordion")
                .find(".accordion-content")
                .slideUp();
              $(this).parent().addClass("active");
              $(this).parent().find(".accordion-content").slideDown();
            }
          });
      });
    });
  }

// Arrow
  $(document).ready(function () {
    var e = document.querySelector(".scroll-top path"),
      t = e.getTotalLength();
    (e.style.transition = e.style.WebkitTransition = "none"),
    (e.style.strokeDasharray = t + " " + t),
    (e.style.strokeDashoffset = t),
    e.getBoundingClientRect(),
      (e.style.transition = e.style.WebkitTransition = "stroke-dashoffset 10ms linear");
    var o = function () {
      var o = $(window).scrollTop(),
        r = $(document).height() - $(window).height(),
        i = t - (o * t) / r;
      e.style.strokeDashoffset = i;
    };
    o(), $(window).scroll(o);
    var back = $(".scroll-top"),
      body = $("body, html");
    $(window).on('scroll', function () {
      if ($(window).scrollTop() > $(window).height()) {
        back.addClass('scroll-top--active');
      } else {
        back.removeClass('scroll-top--active');
      }
    });
  });


})(jQuery);