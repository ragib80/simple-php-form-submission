$(document).ready(function () {
    var itemIndex = 1;

    function validateForm() {
        var valid = true;

        var amount = $('#amount').val();
        if (!/^\d+$/.test(amount)) {
            $("#error_amount").text("Amount should be a valid number");
            valid = false;
        } else {
            $("#error_amount").text("");
        }

        var buyer = $('#buyer').val();
        if (!/^[a-zA-Z0-9\s]{1,20}$/.test(buyer)) {
            $("#error_buyer").text("Buyer should only contain letters, spaces, and numbers (max 20 characters)");
            valid = false;
        } else {
            $("#error_buyer").text("");
        }

        var receipt_id = $('#receipt_id').val();
        if (!/^[A-Za-z\s]+$/.test(receipt_id)) {
            $("#error_receipt_id").text("Receipt ID should only contain text");
            valid = false;
        } else {
            $("#error_receipt_id").text("");
        }

        var item = $('#items_0').val();
        if (!/^[A-Za-z]+$/.test(item)) {
            $("#error_items").text("Items should only contain text");
            valid = false;
        } else {
            $("#error_items").text("");
        }

        var buyer_email = $('#buyer_email').val();
        if (!/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/.test(buyer_email)) {
            $("#error_buyer_email").text("Invalid email address");
            valid = false;
        } else {
            $("#error_buyer_email").text("");
        }

        var note = $('#note').val().trim();
        if (note.length === 0) {
            $('#error_note').text('Enter a note. Not more than 30 words');
            valid = false;
        } else if (note.length > 30) {
            $('#error_note').text('Not more than 30 words.');
            valid = false;
        } else {
            $('#error_note').text('');
        }


        var city = $('#city').val();
        if (!/^[a-zA-Z\s]+$/.test(city)) {
            $("#error_city").text("City should only contain text and spaces");
            valid = false;
        } else {
            $("#error_city").text("");
        }

        var phone = $('#phone').val();
        if (!/^\d+$/.test(phone)) {
            $("#error_phone").text("Phone should only contain numbers");
            valid = false;
        } else if (!phone.startsWith('880')) {
            if (phone.startsWith('0')) {
                $('#phone').val('88' + phone.replace(/^0/, ''));
            } else {
                $('#phone').val('880' + phone);
            }
            $("#error_phone").text("");
        } else {
            $("#error_phone").text("");
        }

        var entry_by = $('#entry_by').val();
        if (entry_by === "" || !$.isNumeric(entry_by)) {
            $('#error_entry_by').text('Please select a valid option.');
            valid = false;
        } else {
            $('#error_entry_by').text('');
        }
        $('#items-container input[name="items[]"]').each(function () {
            var itemId = $(this).attr('id');
            var itemIndex = itemId.split('_')[1]; 
            var item = $(this).val();
        
            if (itemIndex == 0){
                return;
            } 
            if (!/^[A-Za-z]+$/.test(item)) {
                $("#error_items_" + itemIndex).text("Items should only contain text");
                valid = false;
            } else {
                $("#error_items_" + itemIndex).text("");
            }
        });

        return valid; 
    }


    $('#addItemBtn').on('click', function () {
        var newItemField = `
            <div class="input-group mb-2" id="item_${itemIndex}">
                <input type="text" class="form-control" name="items[]" id="items_${itemIndex}">
                <button type="button" class="btn btn-outline-danger removeItemBtn">
                    <i class="bi bi-x"></i>
                </button><br>
                
               
            </div>
             <h6 class="text-danger pt-1 appended_error_txt" id="error_items_${itemIndex}" style="font-size: 14px;"></h6>`;
        $('#items-container').append(newItemField);
        itemIndex++;
    });

    $(document).on('click', '.removeItemBtn', function () {
        $(this).closest('.input-group').remove();
        var itemId = $(this).siblings('input').attr('id');
        $('#error_' + itemId).remove();
    });

    $('#submissionForm').on('submit', function(e) {
        e.preventDefault();

        if (validateForm()) {
            var phone = $('#phone').val();
            if (phone === "" && !phone.startsWith("0") ||!phone.startsWith("880") ) {
              
                $('#phone').val('880'+ phone);
            }
            $.ajax({
                url: `${baseUrl }/submission/create`,
                type: 'POST',
                data: $(this).serialize(),
                dataType: 'json',
                success: function(response) {
                    if (response.status === 200) {
                        alert(response.message);
                        window.location.href = `${baseUrl}/submission/list`;
                        $('#submissionForm')[0].reset();
                    } else {
                        if (response.status === 429){
                            alert(response.message)
                        }
                        else if (response.errors){
                            $.each(response.errors, function(field, error) {
                                $('#error_' + field).text(error);
                            });
                        }  
                    }
                },
                error: function(xhr, status, error) {
                    console.error(`An error occurred: ${error}`);
                }
            });
         }
    });

    $('#amount').on('keyup input change', function () {
        var amount = $(this).val();
        if (!/^\d+$/.test(amount)) {
            $("#error_amount").text("Amount should be a valid number.");
        } else {
            $("#error_amount").text("");
        }
    });

    $('#buyer').on('keyup input change', function () {
        var buyer = $(this).val();
        if (!/^[a-zA-Z0-9\s]{1,20}$/.test(buyer)) {
            $("#error_buyer").text("Buyer should only contain letters, spaces, and numbers (max 20 characters).");
        } else {
            $("#error_buyer").text("");
        }
    });

    $('#receipt_id').on('keyup input change', function () {
        var receipt_id = $(this).val();
        if (!/^[A-Za-z]+$/.test(receipt_id)) {
            $("#error_receipt_id").text("Receipt ID should only contain text.");
        } else {
            $("#error_receipt_id").text("");
        }
    });

    $(document).on('keyup input change', 'input[name="items[]"]', function () {
        var item = $(this).val();
        var itemIndex = $(this).attr('id').split('_')[1]; 
    
        if (!/^[A-Za-z]+$/.test(item)) {
            $("#error_items_" + itemIndex).text("Items should only contain text");
        } else {
            $("#error_items_" + itemIndex).text("");
        }
    });

    $('#buyer_email').on('keyup input change', function () {
        var buyer_email = $(this).val();
        if (!/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/.test(buyer_email)) {
            $("#error_buyer_email").text("Invalid email address.");
        } else {
            $("#error_buyer_email").text("");
        }
    });

    $('textarea#note').on('keyup input change', function() {
        var note = $(this).val().trim();
        if (note.length === 0) {
            $('#error_note').text('Enter a note. Not more than 30 words');
        } else if (note.length > 30) {
            $('#error_note').text('Not more than 30 words.');
        } else {
            $('#error_note').text('');
        }
    });

    $('#city').on('keyup input change', function () {
        var city = $(this).val();
        if (!/^[a-zA-Z\s]+$/.test(city)) {
            $("#error_city").text("City should only contain text and spaces.");
        } else {
            $("#error_city").text("");
        }
    });

    $('#phone').on('click', function () {
        var phone = $(this).val();
        if (phone === "") {
            $(this).val('880');
        }
    });

    $('#phone').on('keyup input change', function () {
        var phone = $(this).val();

        if (!/^\d*$/.test(phone)) {
            $("#error_phone").text("Phone should only contain numbers");
        } else {
            $("#error_phone").text("");
            if (phone.startsWith("0")) {
                $(this).val('880' + phone.substring(1));
            }

        }
    });
    $('#entry_by').on('keyup input change', function () {
        var entry_by = $(this).val();
        if (entry_by === "" || !$.isNumeric(entry_by)) {
            $('#error_entry_by').text('Please select a valid option.');
        } else {
            $('#error_entry_by').text('');
        }
    });
    $('#items_0').on('keyup input change', function() {
        var items = $(this).val();
        if (!/^[A-Za-z]+$/.test(items)) {
            $("#error_items").text("Items should only contain text");
        } else {
            $("#error_items").text("");
        }
    });
    
});
