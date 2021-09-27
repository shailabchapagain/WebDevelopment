
let $1 = $(function () {
    $(document).scroll(function () {
        var $nav = $(".navbar-transparent");
        $nav.toggleClass('navbar-scrolled', $(this).scrollTop() > $nav.height());
    });
});

window.onscroll = function() {scrollFunction()};


var prevScrollpos = window.pageYOffset;

window.onscroll = function() {
    var currentScrollPos = window.pageYOffset;
    if (prevScrollpos > currentScrollPos) {
        document.getElementById("navbar").style.top = "0";
    } else {
        if ($(this).scrollTop() >= 150) {
            //custom code
            document.getElementById("navbar").style.top = "-80px";
        }
    }
    prevScrollpos = currentScrollPos;
}
