$(document).ready(function(){
    $('.pickdate').pickadate({
        format: 'yyyy-mm-dd',
        selectMonth: true,
        selectYear: true,
        clear: 'Clear',
        close: 'Ok',
        closeOnSelect: true
    });

    $(document).on('click', '.btn_add', function () {
        let trCount = $('#Qualification').find('tr.cloning_row:last').length;
        let numberIncr = trCount > 0 ? parseInt($('#Qualification').find('tr.cloning_row:last').attr('id')) + 1 : 0;

        $('#Qualification').find('tbody').append($('' +
            '<tr class="cloning_row" id="' + numberIncr + '">' +
            '<td><button type="button" class="btn btn-danger btn-sm delegated-btn"><i class="fa fa-minus"></i></button></td>' +
            '<td><select name="qualification[' + numberIncr + ']" class="form-control"><option value="Doctorate">Doctorate</option><option value="Master">Master</option><option value="Diploma">Diploma</option><option value="Certificate">Certificate</option><option value="Other">Other</option></select></td>' +
            '<td><input type="text" name="university[' + numberIncr + ']" class="form-control"></td>' +
            '<td><input type="text" name="country[' + numberIncr + ']" class="form-control"></td>' +
            '<td><input type="date" name="graduationYear[' + numberIncr + ']" class=" form-control"></td>' +
            '<td><input type="text" name="graduationRate['+ numberIncr + ']" class=" form-control"></td>' +
            '<td><input type="text" name="specialization['+ numberIncr + ']" class=" form-control"></td>' +
            '</tr>'));
    });

    $(document).on('click', '.delegated-btn', function (e) {
        e.preventDefault();
        $(this).parent().parent().remove();

    });

    $('form').on('submit', function (e) {
        $('select.qualification').each(function () { $(this).rules("add", { required: true }); });
        $('input.university').each(function () { $(this).rules("add", { required: true }); });
        $('input.country').each(function () { $(this).rules("add", { required: true }); });
        $('input.graduationYear').each(function () { $(this).rules("add", { required: true }); });
        $('input.graduationRate').each(function () { $(this).rules("add", { required: true }); });
        $('input.specialization').each(function () { $(this).rules("add", { required: true }); });
        e.preventDefault();
    });

    $('form').validate({

        submitHandler: function (form) {
            form.submit();
        }
    });

});
