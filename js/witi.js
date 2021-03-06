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

                if (form.find('#image').length > 0) {
                    console.log('yes');
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
                }


                var formData = new FormData($(this)[0]);
                form.find('button').html('Processing...');

                $.ajax({
                    url: '/bin/add.php',
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
        form.find('#name').focus();
        $('body').on('click', closeForm);
    });

    var closeForm = function (e) {
        var formTrigger = $('.add-trigger');

        if (!form.has($(e.target)).length > 0 && !formTrigger.has($(e.target)).length > 0 && !formTrigger.is($(e.target))) {
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
                url: '/bin/update.php',
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
                url: '/bin/update.php',
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
        report.on('click', function (e) {
            e.preventDefault();

            var form = report.closest('form'),
                input = form.find('.report-reason');

            form.addClass('visible');
            report.html('Submit report');
            input.focus();

            if (!input.val().length > 0) {
                return false;
            }

            report.html('Processing...');

            $.ajax({
                url: '/bin/update.php',
                type: 'POST',
                data: {
                    id: report.closest('.person').attr('data-id'),
                    type: 'report',
                    comment: input.val()
                },
                success: function (data) {
                    location.reload();
                }
            });
        });
    }

    var leaderboard = $('.leaderboard');
    if (leaderboard.length > 0) {
        var people = $('.person');

        var ctx = $("#myChart").get(0).getContext("2d");
        var myNewChart = new Chart(ctx);

        var labels = [],
            values = [];

        $.each(people, function () {
            var person = $(this);
            labels.push(person.find('.title').text());
	    values.push(parseInt(person.attr('data-score')));
        });

        var data = {
            labels : labels,
            datasets : [
                {
                    fillColor : "#0589CD",
                    strokeColor : "#0589CD",
                    pointColor : "fff",
                    pointStrokeColor : "#000",
                    data : values
                }
            ]
        }

        var options = {
            scaleShowLabels : true
        }

        myNewChart.Bar(data, options);
    }
});
