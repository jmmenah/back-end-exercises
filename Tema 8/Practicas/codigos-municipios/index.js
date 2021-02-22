$(document).ready(function() {

    $.getJSON('resources/autonomias.json', function(data) {
        $.each(data, function(key, val) {
            $('#comunidades').append('<option value=' + val.autonomia_id + '>' + val.nombre + '</option>');
        });
    });

    $('#comunidades').change(function() {
        $('#divprovincias').show();
        var idComunidad = $(this).val();
        $('#provincias').empty();
        $.getJSON('provincias.php?id=' + idComunidad, function(data) {
            $.each(data, function(key, val) {
                $('#provincias').append('<option value=' + val.provincia_id + '>' + val.nombre + '</option>');
            });
        });
    });

    $('#provincias').change(function() {
        $('#divmunicipios').show();
        var idProvincia = $(this).val();
        $('#municipios').empty();
        $.getJSON('municipios.php?id=' + idProvincia, function(data) {
            $.each(data, function(key, val) {
                $('#municipios').append('<option value=' + val.municipio_id + '>' + val.nombre + '</option>');
            });


        });
    });

    $("#myForm").submit(function() {
        let myForm = $("#myForm").serializeArray();
        let data = '';
        $.each(myForm, function(i, field) {
            data += field.name + ":" + field.value + " ";
        });

        $("#myModal").find('.modal-body').text(data);
        $("#myModal").modal("show");
        return false;
    });

});