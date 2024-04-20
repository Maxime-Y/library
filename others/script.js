window.onscroll = function() {
    var scroll = document.documentElement.scrollTop || document.body.scrollTop;
    var button = document.getElementById('return-to-top');
    if (scroll > 100) { 
        button.style.display = 'block'; 
    } else {
        button.style.display = 'none'; 
    }
};

document.getElementById('return-to-top').onclick = function() {
    window.scrollTo({top: 0, behavior: 'smooth'}); 
};