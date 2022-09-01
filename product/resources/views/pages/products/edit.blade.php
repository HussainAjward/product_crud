<form role="form" action="{{ route('products.update', $task->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="form-group">
                <input class="form-control" type="text" name="name" value="{{ $task->name }}"
                    placeholder="Enter Product Name">
            </div>
            <div class="mt-5 form-group">
                <input class="form-control dropify" type="file" name="images" value="{{ $task->images->name }}"
                    accept="image/jpg, image/jpeg, image/png">
            </div>
            <div class="mt-5 form-group">
                <input class="form-control" type="text" name="price" value="{{ $task->price }}"
                    placeholder="Enter Product Price">
            </div>
        </div>
        <div class="mt-4 text-center col-lg-8">
            <button type="submit" class="btn btn-success">Update</button>
        </div>
    </div>
</form>
