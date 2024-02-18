                <!-- Modal to add new record -->
                <div class="modal modal-slide-in fade" id="modals-slide-in-caisse">
                    <div class="modal-dialog">
                        <form class="add-new-record modal-content pt-0" action=""
                              method="POST" id="caisse-form">
                            @csrf
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
                            <div class="modal-header mb-1">
                                <h5 class="modal-title" id="TitleModalCaisse">New Caisse</h5>
                            </div>
                            <div class="modal-body flex-grow-1">
                                <div class="form-group">

                                    <label class="form-label" for="person_id">Person</label>
                
                                    <select name="person_id" id="person_id" required class="form-control">
                                        <option disabled="true" value="" selected>Choose person for operation</option>
                                    </select>
                
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="description">description</label>
                                    <textarea name="description" id="description" class="form-control" cols="30" rows="5"></textarea>
                                </div>


                                <div class="form-group">
                                    <label class="form-label" for="montant">Montant</label>
                                    <input
                                            type="number"
                                            class="form-control"
                                            id="montant"
                                            min="1"
                                            placeholder="montant"
                                            name="montant"
                                    />
                                </div>
                                
                                <div class="form-group">
                                    <label class="form-label" for="type">type</label>

                                    <select name="type" id="type" required class="form-control">
                                        <option disabled="true" value="" selected>Choose type</option>
                                        <option value="injection" >injection</option>
                                        <option  value="retrait" >retrait</option>
                                        <option value="paiement_yal">paiement yaldine </option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    {{-- <div class="col-12 col-md-12 form-group"> --}}
                                      <label  class="form-label" for="date-caisse">Date</label>
                                      <input type="text" id="date-caisse" name="date" class="form-control flatpickr-basic" required placeholder="YYYY-MM-DD" />
                                    {{-- </div> --}}
                                </div>



                                <button type="submit" class="btn btn-primary data-submit mr-1" id="btn_submit_caisse">Submit</button>
                                <button type="reset" class="btn btn-outline-secondary" data-dismiss="modal">Cancel
                                </button>
                            </div>
                        </form>
                    </div>
                </div>


@push('js')

<script>

        let ajaxSelectUsers = {
                url: '{{route('api.users')}}',
                processResults: procResUsers
            };

            $('#person_id').select2({
                theme: 'bootstrap4',
                ajax: ajaxSelectUsers
            });


            function procResUsers(data) {
                // Transforms the top-level key of the response object from 'items' to 'results'
                let items = [];
                for (let z = 0; z < data.data.length; z++) {
                    let person = data.data[z];
                    items.push({
                        id: person.id,
                        text: person.name
                    });
                }
                return {results: items};
            }


</script>
    
@endpush