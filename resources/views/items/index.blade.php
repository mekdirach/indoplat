<!DOCTYPE html>
<html>

<head>
    <title>Indoplant CRUD</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h2>IndoPlant CRUD</h2>
        <a class="btn btn-success" href="{{ route('items.create') }}" style="padding: 5px 10px; border: 1px solid #ccc;">
            Create
            New Item</a>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <table class="table table-bordered">
            <tr>
                <th>No</th>
                <th>Item Code</th>
                <th>Item Name</th>
                <th>Price</th>
                <th width="280px">Action</th>
            </tr>
            @foreach ($items as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->itemcode }}</td>
                    <td>{{ $item->itemname }}</td>
                    <td>{{ $item->price }}</td>
                    <td>
                        <form action="{{ route('items.destroy', $item->id) }}" method="POST">
                            <a class="btn btn-info" href="{{ route('items.show', $item->id) }}">Show</a>
                            <a class="btn btn-primary" href="{{ route('items.edit', $item->id) }}">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
</body>

</html>
