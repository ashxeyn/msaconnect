    $(document).ready(function() {
        $('#faqTable').DataTable();

        $('#faqTable tbody').on('click', 'tr', function() {
            let faqId = $(this).attr('data-id');
            let faqQuestion = $(this).attr('data-question');
            let faqAnswer = $(this).attr('data-answer');

            $('#faqId').val(faqId);
            $('#faqQuestion').val(faqQuestion);
            $('#faqAnswer').val(faqAnswer);

            $('#faqModal').fadeIn();
        });

        $('.close').click(function() {
            $('#faqModal').fadeOut();
        });
        
        $('#saveFaq').click(function() {
            let faqId = $('#faqId').val();
            let updatedQuestion = $('#faqQuestion').val();
            let updatedAnswer = $('#faqAnswer').val();

            let row = $('tr[data-id="' + faqId + '"]');
            row.attr('data-question', updatedQuestion);
            row.attr('data-answer', updatedAnswer);
            row.find('td:nth-child(2)').text(updatedQuestion);
            row.find('td:nth-child(3)').text(updatedAnswer);

            $('#faqModal').fadeOut();
        });

        $(window).click(function(event) {
            if (event.target.id === "faqModal") {
                $('#faqModal').fadeOut();
            }
        });
    });
