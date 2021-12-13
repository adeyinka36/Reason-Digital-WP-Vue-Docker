
// menu drop-down interactivity implemented
const header = document.getElementsByClassName('header')[0];
const dropDown = document.getElementsByClassName('drop-down')[0];
let showDropDown = false;

header.addEventListener('click', e=>{
  
  if(Array.from(e.target.classList).includes('menu') && !showDropDown){
    dropDown.style.top ="100%";
    dropDown.style.opacity = "1";
    showDropDown = true;
  } else if(Array.from(e.target.classList).includes('menu') && showDropDown) {
    dropDown.style.top="-200%";
    dropDown.style.opacity = "0";
    showDropDown = false;
  }
})