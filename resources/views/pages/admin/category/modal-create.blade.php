<div class="modal fade" id="createModalCategory" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Basic Modal</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.category.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="col-12">
                    <div class="modal-body">
                        <label for="inputName" class="form-label">Category Name</label>
                        <input type="text" class="form-control" id="categoryName" name="name">
                    </div>

                    <div class="modal-body">
                        <label for="inputName" class="form-label">Your image</label>
                        <input type="file" class="form-control" id="image" name="image">
                    </div>
                    <div class="col-12">
                        <img src="#" alt="category-image" id="preview-logo" class="visually-hidden">
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
