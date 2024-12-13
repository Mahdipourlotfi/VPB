(function(){
    
    var button = document.getElementById('cn-button');
      var wrapper = document.getElementById('cn-wrapper');
      var overlay = document.getElementById('cn-overlay');
  
    //open and close menu when the button is clicked
    var open = false;
    button.addEventListener('click', handler, false);
    button.addEventListener('focus', handler, false);
    wrapper.addEventListener('click', cnhandle, false);
  
    function cnhandle(e){
      e.stopPropagation();
    }
  
    function handler(e){
      if (!e) var e = window.event;
      e.stopPropagation();//so that it doesn't trigger click event on document
  
        if(!open){
          openNav();
        }
      else{
          closeNav();
        }
    }
    function openNav(){
      open = true;
        button.innerHTML = "-";
        overlay.classList.add("on-overlay");
        wrapper.classList.add("opened-nav");
    }
    function closeNav(){
      open = false;
      button.innerHTML = "+";
      overlay.classList.remove("on-overlay");
      wrapper.classList.remove("opened-nav");
    }
    document.addEventListener('click', closeNav);
  
  })();