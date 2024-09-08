<div class="container-fluid">
    <div class="row">
        <div class="col-md-7 ms-5">
            <div class="card card-primary card-outline mb-4">
                <div class="card-header">
                    <div class="card-title">Submission form</div>

                </div>
                <form method="POST" id="submissionForm">
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-md-12">
                                <label for="buyer" class="form-label">Buyer:</label>
                                <input type="text" class="form-control" name="buyer" id="buyer" maxlength="20" placeholder="Buyer name">
                                <h6 class="text-danger pt-1" id="error_buyer" style="font-size: 14px;"></h6>

                            </div>
                            <div class="col-md-6">
                                <label for="amount" class="form-label">Amount: </label>
                                <input type="number" class="form-control" name="amount" id="amount" placeholder="Amount">
                                <h6 class="text-danger pt-1" id="error_amount" style="font-size: 14px;"></h6>

                            </div>

                            <div class="col-md-6">
                                <label for="receipt_id" class="form-label">Receipt ID:</label>
                                <input type="text" class="form-control" name="receipt_id" id="receipt_id" placeholder="Receipt ID">
                                <h6 class="text-danger pt-1" id="error_receipt_id" style="font-size: 14px;"></h6>
                            </div>
                            <div class="col-md-12">
                                <label for="items" class="form-label">Items:</label>
                                <div id="items-container">
                                    <div class="input-group mb-2">
                                        <input type="text" class="form-control" name="items[]" id="items_0" placeholder="Item name">
                                        <button type="button" class="btn btn-secondary" id="addItemBtn">
                                            <i class="bi bi-plus"></i>
                                        </button>
                                    </div>
                                    <h6 class="text-danger pt-1" id="error_items" style="font-size: 14px;"></h6>
                                </div>

                            </div>


                            <div class="col-md-6">
                                <label for="buyer_email" class="form-label">Buyer Email:</label>
                                <input type="email" class="form-control" name="buyer_email" id="buyer_email" placeholder="Buyer Email">
                                <h6 class="text-danger pt-1" id="error_buyer_email" style="font-size: 14px;"></h6>

                            </div>
                            <div class="col-md-6">
                                <label for="phone" class="form-label">Phone:</label>
                                <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone">
                                <h6 class="text-danger pt-1" id="error_phone" style="font-size: 14px;"></h6>
                                <h6 class="text-danger pt-1" id="error_note_txt" style="font-size: 14px;"></h6>

                            </div>
                            <div class="col-md-12">
                                <label for="note" class="form-label">Note:</label>
                                <textarea class="form-control" name="note" id="note" maxlength="255" placeholder="Insert Note"></textarea>
                                <h6 class="text-danger pt-1" id="error_note" style="font-size: 14px;"></h6>
                            </div>
                            <div class="col-md-6">
                                <label for="city" class="form-label">City:</label>
                                <input type="text" class="form-control" name="city" id="city" placeholder="City">
                                <h6 class="text-danger pt-1" id="error_city" style="font-size: 14px;"></h6>
                            </div>
                            <div class="col-md-6">
                                <label for="entry_by" class="form-label">Entry by</label>
                                <select class="form-select" name="entry_by" id="entry_by">
                                    <option selected="" disabled="" value="">select an option...</option>
                                    <option value='1'>Ragib</option>
                                    <option value='2'>Jhon</option>
                                    <option value='3'>William</option>
                                    <option value='4'>Frankie</option>
                                    <option value='5'>Lenin</option>
                                    <option value='6'>Micheal</option>
                                    <option value='7'>Gabriel</option>
                                    <option value='8'>Allen</option>
                                    <option value='9'>Khalil</option>
                                    <option value='10'>David</option>
                                    <option value='11'>Hasan</option>
                                    <option value='12'>Shoib</option>
                                </select>
                                <h6 class=" text-danger pt-1" id="error_entry_by" style="font-size: 14px;"></h6>
                            </div>

                        </div>

                    </div>
                    <div class="card-footer"> <button type="submit" class="btn btn-primary">Submit</button> </div>
                </form>
            </div>
        </div>
    </div>

</div>