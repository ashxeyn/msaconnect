
    $(document).ready(function() {
        $('#activityTable').DataTable({
            "paging": true,
            "searching": true,
            "ordering": true,
            "info": true
        });
    });







    $(document).ready(function() {
        function loadCalendar(month, year) {
            $.ajax({
                url: "admin_calendar.php", // Make sure this file returns only the calendar grid HTML
                type: "GET",
                data: { month: month, year: year },
                success: function(response) {
                    $("#calendarGrid").html(response);
                    $("#calendarTitle").text(new Date(year, month - 1).toLocaleString('en-us', { month: 'long', year: 'numeric' }));
                    $("#prevMonth").data("month", month == 1 ? 12 : month - 1).data("year", month == 1 ? year - 1 : year);
                    $("#nextMonth").data("month", month == 12 ? 1 : month + 1).data("year", month == 12 ? year + 1 : year);
                }
            });
        }

        $("#prevMonth, #nextMonth").click(function() {
            let month = $(this).data("month");
            let year = $(this).data("year");
            loadCalendar(month, year);
        });

        $(document).on("click", ".calendar-day", function() {
            let selectedDate = $(this).attr("data-date");
            console.log("Clicked date:", selectedDate); // Logging instead of alert
            $("#selectedDate").val(selectedDate);
            $("#activityDescription").val("");
            $("#calendarModal").fadeIn();
        });

        $('#calendarModal').click(function(event) {
    if ($(event.target).is('#calendarModal')) {
        $('#calendarModal').fadeOut();
    }
});


        $(window).click(function(event) {
            if (event.target.id === "calendarModal") {
                $("#calendarModal").fadeOut();
            }
        });

        $("#saveActivity").click(function() {
            let date = $("#selectedDate").val();
            let description = $("#activityDescription").val();
            if (description.trim() === "") {
                alert("Please enter a description.");
                return;
            }

            // Simulating saving to the database
            console.log("Activity for " + date + " updated: " + description);
            $("#calendarModal").fadeOut();
        });
    });
