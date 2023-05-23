const body = document.querySelector('body'),
      sidebar = body.querySelector('nav'),
      toggle = body.querySelector(".odes-toggle"),
      searchBtn = body.querySelector(".odes-search-box"),
      modeSwitch = body.querySelector(".odes-toggle-switch"),
      modeText = body.querySelector(".odes-mode-text");


toggle.addEventListener("click" , () =>{
    sidebar.classList.toggle("odes-close");
})

searchBtn.addEventListener("click" , () =>{
    sidebar.classList.remove("odes-close");
})

modeSwitch.addEventListener("click" , () =>{
    body.classList.toggle("odes-dark");
    
    if(body.classList.contains("dark")){
        modeText.innerText = "Light mode";
    }else{
        modeText.innerText = "Dark mode";
        
    }
});