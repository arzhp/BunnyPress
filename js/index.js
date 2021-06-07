var bunnypresslite_pagetop = function() {
    if (window.pageYOffset > 400) {
        document.getElementById("bunnypresslite-pagetop").classList.add("fixed")
    } else {
        document.getElementById("bunnypresslite-pagetop").classList.remove("fixed")
    }
};
window.addEventListener("load", bunnypresslite_pagetop);
window.addEventListener("scroll", bunnypresslite_pagetop);
document.getElementById("bunnypresslite-pagetop").addEventListener('click', function(e) {
    e.preventDefault();
    window.scroll({
        top: 0,
        behavior: 'smooth'
    })
});