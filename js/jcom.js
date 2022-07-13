// slider behavior
$('.carousel').carousel({
  interval: 2000
});


// nav menu behaviour
document.addEventListener('click',function(e){
  // Hamburger menu
  if(e.target.classList.contains('hamburger-toggle')){
    e.target.children[0].classList.toggle('active');
  }
}) ; 
