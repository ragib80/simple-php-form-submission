<div class="container-fluid">
    <div class="row mx-5">
        <div class="col-md-12">
            <div class="card mb-4 ">
                <div class="card-header">
                    <h3 class="card-title">Submissions List</h3>
                </div>
                <div class="card-body">
                    <div class="mb-4">
                        <form id="ReportForm" method="POST" enctype="multipart/form-data">

                            <div class="row">
                                <div class="col-md-3">
                                    <label for="date_from">From</label>
                                    <input type="date" class="form-control" id="date_from" name="date_from">
                                </div>
                                <div class="col-md-3">
                                    <label for="date_to ">To</label>
                                    <input type="date" class="form-control" id="date_to" name="date_to">
                                </div>

                                <div class="col-md-3">
                                    <label for="employee">Entry By</label><br>
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

                                </div>

                                <div style=" padding-top: 22px;" class="form-group col-md-3">
                                    <button type="submit" class="filter_btn btn btn-primary">Filter</button>
                                    <button type="reset" value="Reset" class="btn btn-outline-danger"><i class="fas fa-eraser"></i> Reset</button>
                                </div>
                                <div class="mt-2">
                                    <ul>
                                        <li>
                                            <small> Click the Filter button to generate report.</small>
                                        </li>
                                        <li>
                                            <small> 1. Generate Report between dates.</small>
                                        </li>
                                        <li>
                                            <small> 2. Generate Report of specific Entry By.</small>
                                        </li>
                                        <li>
                                            <small>3.Generate Report between dates and Entry By.</small>
                                        </li>
                                        <li>
                                            <small>4. If only From date is selected then To date is automatically count by current day.</small>
                                        </li>
                                        <li>
                                            <small> 5. If only To date is selected then Generate Report on the current day.</small>
                                        </li>
                                    </ul>


                                </div>


                            </div>

                        </form>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Buyer</th>
                                    <th>Amount</th>
                                    <th>Receipt ID</th>
                                    <th>Buyer Email</th>
                                    <th>Items</th>
                                    <th>City</th>
                                    <th>Phone</th>
                                    <th>Submitted At</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if ($submissionList): ?>
                                    <?php foreach ($submissionList as $index => $submission): ?>
                                        <tr>
                                            <td><?= $index + 1; ?></td>
                                            <td><?= htmlspecialchars($submission['buyer']); ?></td>
                                            <td><?= htmlspecialchars($submission['amount']); ?></td>
                                            <td><?= htmlspecialchars($submission['receipt_id']); ?></td>
                                            <td><?= htmlspecialchars($submission['buyer_email']); ?></td>
                                            <td><?= htmlspecialchars($submission['items']); ?></td>
                                            <td><?= htmlspecialchars($submission['city']); ?></td>
                                            <td><?= htmlspecialchars($submission['phone']); ?></td>
                                            <td><?= htmlspecialchars($submission['entry_at']); ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td class="text-center" colspan="8">No submissions found.</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>