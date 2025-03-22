    $(document).ready(function() {
        $('#aboutTable').DataTable();

        $('#aboutTable tbody').on('click', 'tr', function() {
            let aboutId = $(this).attr('data-id');
            let aboutType = $(this).attr('data-type');
            let aboutContent = $(this).attr('data-content');

            $('#aboutId').val(aboutId);
            $('#aboutType').val(aboutType);
            $('#aboutContent').val(aboutContent);

            $('#aboutModal').fadeIn();
        });

        $('.close').click(function() {
            $('#aboutModal').fadeOut();
        });

        $('#saveAbout').click(function() {
            let aboutId = $('#aboutId').val();
            let updatedContent = $('#aboutContent').val();

            let row = $('tr[data-id="' + aboutId + '"]');
            row.attr('data-content', updatedContent);
            row.find('td:nth-child(3)').text(updatedContent);

            $('#aboutModal').fadeOut();
        });

        $(window).click(function(event) {
            if (event.target.id === "aboutModal") {
                $('#aboutModal').fadeOut();
            }
        });
    });
