const body = document.querySelector("body");
const sidebar = document.querySelector(".sidebar");
const toggle = document.querySelector(".toggle");
const searchBtn = document.querySelector(".search-box");
const modeSwtich = document.querySelector(".toggle-switch");
const modeTesxt = document.querySelector(".mode-text");

toggle.addEventListener("click", ()=>{
    sidebar.classList.toggle("close");})
searchBtn.addEventListener("click", ()=>{
        sidebar.classList.remove("close");
});
modeSwtich.addEventListener("click", ()=>{
    body.classList.toggle("dark");
    if(body.classList.contains("dark")){
        modeTesxt.innerText="Lighlt mode"
    }else{
        modeTesxt.innerText="dark mode"
    }
});









