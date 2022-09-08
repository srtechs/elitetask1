<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-4 d-flex flex-row justify-content-between">
                <h1 class="m-0 text-dark">Calendar
                </h1>
            </div>
        </div>
    </div>
</div>
<!-- Required meta tags -->
<link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500&display=swap" rel="stylesheet">
<link rel="stylesheet" href="fonts/icomoon/style.css">
<link href=<?= base_url('assets/') . 'calendar/fullcalendar/packages/core/main.css' ?> rel='stylesheet' />
<link href=<?= base_url('assets/') . 'calendar/fullcalendar/packages/daygrid/main.css' ?> rel='stylesheet' />
<!-- Bootstrap CSS -->
<link rel="stylesheet" href=<?= base_url('assets/') . "calendar/css/bootstrap.min.css" ?>>
<!-- Style -->
<link rel="stylesheet" href=<?= base_url('assets/') . "calendar/css/style.css" ?>>

<section class="content">
    <div class="container-fluid">

        <div id='calendar'></div>
        <!-- </div> -->
    </div>
</section>


<div class="modal" id="assignModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body d-flex flex-column justify-content-center align-items-center">
                <h3>Share Generate Invoice</h3>
                <p class="text-secondary">Saturday, 23rd July, 2022</p>
                <input type="email" class="form-control mt-2" name="email" placeholder="Email Address">
                <button type="button" class="btn btn-md bg-custom-blue rounded-pill mt-4">Share Now</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(function() {
        $(".fc-day-top").click(function() {
            $("#assignModal").modal("show");
        });
    });
</script>


<script src=<?= base_url('assets/calendar/') . "js/jquery-3.3.1.min.js" ?>></script>
<script src=<?= base_url('assets/calendar/') . "js/popper.min.js" ?>></script>
<script src=<?= base_url('assets/calendar/') . "js/bootstrap.min.js" ?>></script>

<script src=<?= base_url('assets/calendar/') . 'fullcalendar/packages/core/main.js' ?>></script>
<script src=<?= base_url('assets/calendar/') . 'fullcalendar/packages/interaction/main.js' ?>></script>
<script src=<?= base_url('assets/calendar/') . 'fullcalendar/packages/daygrid/main.js' ?>></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {
            plugins: ['interaction', 'dayGrid'],
            defaultDate: '2020-02-12',
            editable: true,
            eventLimit: true, // allow "more" link when too many events
            events: [{
                    title: 'All Day Event',
                    start: '2020-02-01'
                },
                {
                    title: 'Long Event',
                    start: '2020-02-07',
                    end: '2020-02-10'
                },
                {
                    groupId: 999,
                    title: 'Repeating Event',
                    start: '2020-02-09T16:00:00'
                },
                {
                    groupId: 999,
                    title: 'Repeating Event',
                    start: '2020-02-16T16:00:00'
                },
                {
                    title: 'Conference',
                    start: '2020-02-11',
                    end: '2020-02-13'
                },
                {
                    title: 'Meeting',
                    start: '2020-02-12T10:30:00',
                    end: '2020-02-12T12:30:00'
                },
                {
                    title: 'Lunch',
                    start: '2020-02-12T12:00:00'
                },
                {
                    title: 'Meeting',
                    start: '2020-02-12T14:30:00'
                },
                {
                    title: 'Happy Hour',
                    start: '2020-02-12T17:30:00'
                },
                {
                    title: 'Dinner',
                    start: '2020-02-12T20:00:00'
                },
                {
                    title: 'Birthday Party',
                    start: '2020-02-13T07:00:00'
                },
                {
                    title: 'Click for Google',
                    url: 'http://google.com/',
                    start: '2020-02-28'
                }
            ]
        });

        calendar.render();
    });
</script>

<script src=<?= base_url('assets/calendar/') . "js/main.js" ?>></script>