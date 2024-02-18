<!-- Modal to add new record -->
<div class="modal modal-slide-in fade" id="assign-order{{$o->id}}">
    <div class="modal-dialog sidebar-sm">
        <form class="add-new-record modal-content pt-0" action="{{route('order.assign')}}" method="POST">
            @csrf

            <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
            <div class="modal-header mb-1">
                <h5 class="modal-title" id="exampleModalLabel">Assign order</h5>
            </div>
            <div class="modal-body flex-grow-1">

                <input type="hidden" name="order_id" value="{{$o->id}}">

                <div class="form-group">

                    <label class="form-label" for="operator_id">Operator</label>

                    <select name="operator_id" id="operator_id{{$o->id}}" required class="form-control ">
                        <option disabled="true" value="" selected>Choose operator</option>

                        @foreach ($operators as $operator)
                        <option value="{{$operator->id}}" >{{$operator->name}}</option>
                        @endforeach
                    </select>

                </div>


                <button type="submit" class="btn btn-success data-submit mr-1">Save</button>
                <button type="reset" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
            </div>
        </form>
    </div>
</div>

{{-- <script>

    function AssignSelect(id){


        let ajaxSelectAssign = {
                url: '{{route('api.operators')}}',
                processResults: procResAssign
            };

            $('#operator_id'+id).select2({
                theme: 'bootstrap4',
                ajax: ajaxSelectAssign
            });

            function procResAssign(data) {
                // Transforms the top-level key of the response object from 'items' to 'results'
                let items = [];
                for (let i = 0; i < data.data.length; i++) {
                    let operator = data.data[i];
                    items.push({
                        id: operator.id,
                        text: operator.name
                    });
                }
                return {results: items};
            }


    }


</script> --}}