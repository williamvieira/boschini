// menu
      var slideRight = new Menu({
        wrapper: '#o-wrapper',
        type: 'slide-right',
        menuOpenerClass: '.c-button',
        maskId: '#c-mask'
      });

      var slideRightBtn = document.getElementById('c-button--slide-right');
      
      slideRightBtn.addEventListener('click', function(e) {
        e.preventDefault;
        slideRight.open();
      });


