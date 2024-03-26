<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Menu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>

    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>Edit Menu</h2>
            </div>
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <form action="{{ route('menu.update', $menu_data->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group my-3">
                            <strong>Name</strong>
                            <input type="text" name="name" value="{{ $menu_data->name }}" class="form-control"
                                placeholder="Menu Name">
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group my-3">
                            <strong>Price</strong>
                            <input type="text" name="price" value="{{ $menu_data->price }}" class="form-control"
                                placeholder="Menu Price">
                            @error('price')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div>
                        <a href="{{ route('menu.index') }}" class="btn btn-secondary">Back</a>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="mt-3 btn btn-info">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</body>

</html>
