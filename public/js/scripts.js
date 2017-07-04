(function ($) {
    $(function () {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name=_token]').attr('content')
            }
        });
        //Обработка ajax формы добавления страны

        $('#form-add-country').on('submit', function (e) {
            let formCountry = $(this);
            e.preventDefault();
            $.ajax({
                method: formCountry.attr('method'),
                url: formCountry.attr('action'),
                data: formCountry.serialize(),
                dataType: 'html',
                success: function (data) {
                    // Ответ сервера, форма для добавления города
                    $('#form-add-data').html(data);
                }
            })
        });

        //Обработка ajax формы добавления города

        $('#app').on('submit', '#form-add-city', function (event) {
            let formCity = $(this);
            event.preventDefault();
            $.ajax({
                method: formCity.attr('method'),
                url: formCity.attr('action'),
                data: formCity.serialize(),
                dataType: 'html',
                success: function (data) {
                    // ответ сервера, форма для добавления языка
                    $('#form-add-data').html(data);
                }
            })
        });

        //Обработка ajax формы выбор страны

        $('#select-country').on('change', function () {
            let country_id = $(this).val();
            $.ajax({
                type:'get',
                url: 'find/city',
                dataType: 'json',
                data: {'id': country_id},
                success: function (data) {
                    //ответ сервера все города соответствующие стране
                    $.each(data, function (index, city) {
                        $('#city').append('<option value="'+city.id+'">'+city.city+'</option>');
                    })
                }
            })
        });

        //Обработка ajax формы выбор города

        $('#app').on('change', '#city', function(){
            let city_id = $(this).val();
            console.log(city_id);
            $.ajax({
                type:'get',
                url: 'find/language',
                dataType: 'json',
                data: {'id': city_id},
                success: function (data) {
                    //ответ сервера все языки связанные с городом
                    $('#title').text('Используют языки:');
                    $.each(data, function (index, lang) {
                        $('#lang').append('<li>'+lang.language+'</li>');
                    })
                }
            })
        })


    });
})(jQuery);

