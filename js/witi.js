jQuery(function ($) {
    // Initialize fastclick
    FastClick.attach(document.body);

    // Form
    var form = $('.add-form');

    if (form.length > 0) {
        var orientation = (typeof window.orientation === typeof undefined ? 'undefined' : window.orientation);
        form.on({
            submit: function (e) {
                e.preventDefault();

                var name = form.find('#name').val().length > 0,
                    file = form.find('#image').val().length > 0;

                if (!name || !file) {
                    if (!file) {
                        form.find('#image').addClass('required');
                    }
                    if (!name) {
                        form.find('#name').addClass('required');
                    }

                    return false;
                }


                var formData = new FormData($(this)[0]);
                form.find('button').html('Processing...');

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
        }).find('[name="rotation"]').val(orientation);
    }

    // Toggle form
    $('.add-trigger').on('click', function (e) {
        e.preventDefault();
        form.addClass('visible');
        $('body').on('click', closeForm);
    });

    var closeForm = function (e) {
        var formTrigger = $('.add-trigger');

        if (!form.has($(e.target)).length > 0 && !formTrigger.has($(e.target)).length > 0) {
            form.removeClass('visible');
        }
    }

    // Select person
    var people = $('.person');

    people.on('click', 'a', function (e) {
        if (location.hash) {
            e.preventDefault();

            var person = $(this);

            $.ajax({
                url: 'bin/update.php',
                type: 'POST',
                data: {
                    id: person.closest('li').attr('data-id'),
                    gadgetId: location.hash.replace('#', '')
                },
                success: function (data) {
                    location.reload();
                }
            });
        }
    });

    // Assign gadget to person
    var assign = $('.assign');
    if (assign.length > 0) {
        assign.on('change', function () {
            var id;

            assign.find('option').each(function () {
                if (this.selected) {
                    id = $(this).attr('value');
                }
            });

            $.ajax({
                url: 'bin/update.php',
                type: 'POST',
                data: {
                    id: assign.closest('.person').attr('data-id'),
                    gadgetId: id
                },
                success: function (data) {
                    console.log(data);
                    location.reload();
                }
            });
        });
    }

    // Report user
    var report = $('.report');
    if (report.length > 0) {
        report.on('click', function () {
            $.ajax({
                url: 'bin/update.php',
                type: 'POST',
                data: {
                    id: report.closest('.person').attr('data-id'),
                    type: 'report'
                },
                success: function (data) {
                    location.reload();
                }
            });
        });
    }
});
