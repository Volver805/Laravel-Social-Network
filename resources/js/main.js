const collapseDOM = document.querySelector('.collapse-menu')

collapseDOM.addEventListener('click',()=> {
if(!collapseDOM.classList.contains("collapse-menu-active")) {
    navAppear();    
}
else {
    navDisappear()
}
})
window.addEventListener('scroll',()=> {
    if(collapseDOM.classList.contains("collapse-menu-active"))
        navDisappear();    
        
})

const navAppear = ()=> {
    document.querySelector('.collapse-navbar').style.left = "0%";
    collapseDOM.classList.add('collapse-menu-active');
}
const navDisappear = ()=> {
    document.querySelector('.collapse-navbar').style.left = "-100%";
    collapseDOM.classList.remove('collapse-menu-active');
}