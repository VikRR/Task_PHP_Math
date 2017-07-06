(function ($) {
    $(function () {
        let app = $('#app'),
            formAddData = $('#form-add-data');

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name=_token]').attr('content')
            }
        });
        //Обработка ajax формы добавления страны
        // Ответ сервера, форма для добавления города

        $('#form-add-country').on('submit', function (e) {
            let formCountry = $(this);
            e.preventDefault();
            $.ajax({
                method: formCountry.attr('method'),
                url: formCountry.attr('action'),
                data: formCountry.serialize(),
                dataType: 'html',
                success: function (data) {
                    formAddData.html(data);
                }
            })
        });

        //Обработка ajax формы добавления города
        // ответ сервера, форма для добавления языка

        app.on('submit', '#form-add-city', function (event) {
            let formCity = $(this);
            event.preventDefault();
            $.ajax({
                method: formCity.attr('method'),
                url: formCity.attr('action'),
                data: formCity.serialize(),
                dataType: 'html',
                success: function (data) {
                    formAddData.html(data);
                }
            })
        });

        //Обработка ajax формы выбор страны
        //ответ сервера все города соответствующие стране

        $('#select-country').on('change', function () {
            let country_id = $(this).val(),
                optionsList = '';
            $.ajax({
                type: 'get',
                url: 'find/city',
                dataType: 'json',
                data: {'id': country_id},
                success: function (data) {
                    $.each(data, function (index, city) {
                        optionsList += '<option value="' + city.id + '">' + city.city + '</option>';
                    });
                    $('#city').append(optionsList);
                }
            })
        });

        //Обработка ajax формы выбор города
        //ответ сервера все языки связанные с городом

        app.on('change', '#city', function () {
            let city_id = $(this).val(),
                title = $('#title'),
                langsList = '<ul>';
            $.ajax({
                type: 'get',
                url: 'find/language',
                dataType: 'json',
                data: {'id': city_id},
                success: function (data) {
                    if (data.length) {
                        title.text('Используют языки:');
                        $.each(data, function (index, lang) {
                            langsList += '<li>'+lang.language+'</li>';
                        });
                        langsList += '</ul>';
                        $('#lang').append(langsList);
                    }else{
                        title.text('Ни одного языка еще не добавлено.');
                    }
                }
            })
        })


    });
})(jQuery);

