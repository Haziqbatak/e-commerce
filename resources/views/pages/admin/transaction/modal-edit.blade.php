<div class="modal fade" id="updateStatus{{ $row->id }}" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ $row->name }} - {{ $row->phone }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="{{ route('admin.transaction.update', $row->id) }}" method="post">
                @csrf
                @method('PUT')

                <div class="modal-body">
                    <label for="status">STATUS</label>
                    <select class="form-select" aria-label="Default select example" name="status">
                        <option selected>Open this select menu</option>
                        <option value="PENDING">Pending</option>
                        <option value="SETTLEMENT">Settlement</option>
                        <option value="EXPIRED">Expired</option>
                        <option value="SUCCESS">Success</option>
                    </select>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>


        </div>
    </div>
</div><!-- End Basic Modal-->
