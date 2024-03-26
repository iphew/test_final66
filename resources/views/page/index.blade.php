<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel CRUD Index</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>Laravel Menu Example</h2>
            </div>
            <div>
                <a href="{{ route('menu.create') }}" class="btn btn-success">Add Menu</a>
            </div>
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
            @endif

            <table class="table table-bordered">
                <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th width="280px">Action</th>
                </tr>
                @foreach($menu_data as $data_of_menu)
                    <tr>
                        <td>{{ $data_of_menu->id }}</td>
                        <td>{{ $data_of_menu->name }}</td>
                        <td>{{ $data_of_menu->price}}</td>
                        <td>
                            <form action="{{ route('menu.destroy', $data_of_menu->id) }}" method="POST">
                                <a href="{{ route('menu.edit', $data_of_menu->id) }}" class="btn btn-warning">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
            {!! $menu_data->links('pagination::bootstrap-5') !!}
        </div>
    </div>

</body>
</html>
