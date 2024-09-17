(function ($) {
    $(".navbar-collapse a").on("click", function () {
        $(".navbar-collapse").collapse("hide");
    });

    $(function () {
        $(".inicio-slides").vegas({
            slides: [
                { src: "imgs/slides/reaproveitamento.png" },
                { src: "imgs/slides/globo.png" },
                { src: "imgs/slides/ambiente.png" },
            ],

            timer: false,
            animation: "kenburns",
        });
    });

    $(".smoothscroll").click(function () {
        let href = $(this).attr("href");
        let docHref = $(href);
        let alturaHeader = $(".navbar").height() + 60;

        scrollToDiv(docHref, alturaHeader);
        return false;

        function scrollToDiv(elemento, alturaNav) {
            let deslocamento = elemento.offset();
            let deslocamentoTop = deslocamento.top;
            let totalScroll = deslocamentoTop - alturaNav;

            $("body,html").animate({ scrollTop: totalScroll }, 300);
        }
    });
})(window.jQuery);
