jQuery(function ($) {
    // Initialize fastclick
    FastClick.attach(document.body);

    // Form
    var form = $('.add-person');
    if (!form.length > 0) {
        var form = $('.add-gadget');
    };

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
        }).find('[name="rotation"]').prop('value', window.orientation || 'undefined');
    }

    // Toggle form
    $('.add-person-trigger').on('click', function () {
        form.toggleClass('visible');
    });
    // Toggle form
    $('.add-gadget-trigger').on('click', function () {
        form.toggleClass('visible');
    });

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
