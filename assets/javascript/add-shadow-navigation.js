window.addEventListener('scroll',(e)=>{
    const nav = document.querySelector('#navigation');
    if(window.scrollY > 70){
      nav.classList.add("add-shadow");
    }else{
      nav.classList.remove("add-shadow");
    }
  });