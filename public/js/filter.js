$(document).ready(function () {
   
    $('#ReportForm').on('submit', function (e) {
        e.preventDefault(); 
        $.ajax({
            url: `${baseUrl }/submission-report`, 
            type: 'POST',
            data: $(this).serialize(),
            dataType: 'json',
            success: function (response) {

                $('table tbody').empty();

                if (response.submissions) {
                    $.each(response.submissions, function (index, submission) {
                        $('table tbody').append(`
                            <tr>
                                <td>${index + 1}</td>
                                <td>${submission.buyer}</td>
                                <td>${submission.amount}</td>
                                <td>${submission.receipt_id}</td>
                                <td>${submission.buyer_email}</td>
                                <td>${submission.city}</td>
                                <td>${submission.phone}</td>
                                <td>${submission.entry_at}</td>
                            </tr>
                        `);
                    });
                } else {
                    $('table tbody').append(`
                        <tr>
                             <td class="text-center" colspan="8">No submissions found.</td>
                        </tr>
                    `);
                }
            },
            error: function (xhr, status, error) {
                console.error(`An error occurred: ${error}`);
                console.log(xhr.responseText); 
                alert('An error occurred while fetching the data.');
            }
        });
    });

    $('#ReportForm button[type="reset"]').on('click', function () {
        $.ajax({
            url: `${baseUrl }/submission-report`, 
            type: 'POST',
            data: {},
            dataType: 'json',
            success: function (response) {
                $('table tbody').empty();

                if (response.submissions) {
                    $.each(response.submissions, function (index, submission) {
                        $('table tbody').append(`
                            <tr>
                                <td>${index + 1}</td>
                                <td>${submission.buyer}</td>
                                <td>${submission.amount}</td>
                                <td>${submission.receipt_id}</td>
                                <td>${submission.buyer_email}</td>
                                <td>${submission.city}</td>
                                <td>${submission.phone}</td>
                                <td>${submission.entry_at}</td>
                            </tr>
                        `);
                    });
                } else {
                    $('table tbody').append(`
                        <tr>
                            <td class="text-center" colspan="8">No submissions found.</td>
                        </tr>
                    `);
                }
            },
            error: function () {
                alert('An error occurred while fetching the data.');
            }
        });
    });
});
