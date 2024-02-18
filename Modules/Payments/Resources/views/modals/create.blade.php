<div class="modal modal-slide-in fade" id="modal-add-payment">
    <div class="modal-dialog">
        <form action="{{route('payments.store')}}" method="post" class="add-new-user modal-content pt-0">
            @csrf
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
            <div class="modal-header mb-1">
                <h5 class="modal-title" id="exampleModalLabel">New Payment</h5>
            </div>
            <div class="modal-body flex-grow-1">


                <div class="form-group">
                    <label class="form-label" for="employee">Employee</label>
                    <input
                            type="text"
                            class="form-control"
                            id="employee"
                            placeholder="Employee"
                            name="employee"
                    />
                </div>

                <div class="form-group">
                    <label class="form-label" for="amount">Amount</label>
                    <input
                            type="number"
                            class="form-control"
                            id="amount"
                            min="1"
                            placeholder="Payment Amount"
                            name="amount"
                    />
                </div>

                <div class="row">
                    <div class="col-12 col-md-12 form-group">
                      <label for="pay_date">Pay Date</label>
                      <input type="text" id="pay_date" name="pay_date" class="form-control flatpickr-basic" required placeholder="YYYY-MM-DD" />
                    </div>
                </div>


                <div class="row">
                    <div class="col-12 col-md-12 form-group">
                      <label for="date_due">Date Due</label>
                      <input type="text" id="date_due" name="date_due" class="form-control flatpickr-basic" required placeholder="YYYY-MM-DD" />
                    </div>
                </div>

                
              
                <button type="submit" class="btn btn-primary mr-1 data-submit">Submit</button>
                <button type="reset" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
            </div>
        </form>
    </div>
</div>

