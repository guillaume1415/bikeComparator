$(document).ready(function () {
    var i = 0;
    /**
     *
     */
    // Traitements sur des cases à chocher
    $("input[type=checkbox][name=bike]").change(function () {
        var status = $('#banner-comparison').find('span');
        if (this.checked) {
            // alert('okay')
            $('#banner-comparison').css("display", "block");
            i++

            // Si la case est cochée, on fait des traitements
        } else {
            // Si la case est n'est pas cochée, on fait d'autres traitements
            if (!this.checked) {
                i--
            }

            if (i == 0) {
                $('#banner-comparison').css("display", "none");
            }
        }
        status.text(i)
        console.log(i)
    });

    /**
     *
     */
    $('input[type=checkbox][name=bike]').on('change', function () {
        var status = $(this).parent().find('span');

        if (status.text() === "Ajouté pour comparer") {
            status.text("Ajouter pour comparer");
        } else {
            status.text("Ajouté pour comparer");
        }
    });

});