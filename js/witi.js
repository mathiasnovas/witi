jQuery(function ($) {
    // Form
    var form = $('.add-person');

    if (form.length > 0) {
        form.on({
            submit: function (e) {
                e.preventDefault();

                var formData = new FormData($(this)[0]);

                $.ajax({
                    url: 'bin/add.php',
                    data: formData,
                    processData: false,
                    contentType: false,
                    type: 'POST',
                    cache: false,
                    async: false,
                    success: function (data) {
                        location.reload();
                    },
                    error: function (error) {
                        console.log(error);
                    },
                });
                
            }
        });
    }

    // Toggle form
    $('.add-person-trigger').on('click', function () {
        form.toggleClass('visible');
    });
});
