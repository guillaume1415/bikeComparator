$(document).ready(function () {

    $('.prix').click(function() {
        $('.input-prix').toggle() // AFFICHE ET CACHE A CHAQUE CLIQUE SUR LE BOUTTON
        //Toggle class for current element's child
        $("i", this).toggleClass("fa-minus fas fa-plus");

        //Remove fa-close and remove fas fa-plus from other elements
        $('.prix').not(this).find("i").removeClass("fa-close").addClass("fas fa-minus");
    });

    $('.size').click(function() {
        $('.input-size').toggle() // AFFICHE ET CACHE A CHAQUE CLIQUE SUR LE BOUTTON
        //Toggle class for current element's child
        $("i", this).toggleClass("fa-minus fas fa-plus");

        //Remove fa-close and remove fas fa-plus from other elements
        $('.size').not(this).find("i").removeClass("fa-close").addClass("fas fa-minus");
    });

    $('.material-frame').click(function() {
        $('.input-material-frame').toggle() // AFFICHE ET CACHE A CHAQUE CLIQUE SUR LE BOUTTON
        //Toggle class for current element's child
        $("i", this).toggleClass("fa-minus fas fa-plus");

        //Remove fa-close and remove fas fa-plus from other elements
        $('.material-frame').not(this).find("i").removeClass("fa-close").addClass("fas fa-minus");
    });

    $('.material-fork').click(function() {
        $('.input-material-fork').toggle() // AFFICHE ET CACHE A CHAQUE CLIQUE SUR LE BOUTTON
        //Toggle class for current element's child
        $("i", this).toggleClass("fa-minus fas fa-plus");

        //Remove fa-close and remove fas fa-plus from other elements
        $('.material-fork').not(this).find("i").removeClass("fa-close").addClass("fas fa-minus");
    });

    $('.marque').click(function() {
        $('.input-marque').toggle() // AFFICHE ET CACHE A CHAQUE CLIQUE SUR LE BOUTTON
        //Toggle class for current element's child
        $("i", this).toggleClass("fa-minus fas fa-plus");

        //Remove fa-close and remove fas fa-plus from other elements
        $('.marque').not(this).find("i").removeClass("fa-close").addClass("fas fa-minus");
    });
});