<!DOCTYPE html>
<html>

<head>
    <title>Create Item</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h2>Create New Item</h2>
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('items.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="docentry">Docentry:</label>
                <select name="docentry" id="docentry" class="form-control">
                    <!-- Populate options with docentry values from opch table -->
                    @foreach ($opchEntries as $opch)
                        <option value="{{ $opch->docentry }}">{{ $opch->docentry }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="itemcode">Item Code:</label>
                <input type="text" class="form-control" id="itemcode" name="itemcode" required>
            </div>
            <div class="form-group">
                <label for="itemname">Item Name:</label>
                <input type="text" class="form-control" id="itemname" name="itemname" required>
            </div>
            <div class="form-group">
                <label for="price">Price:</label>
                <input type="text" class="form-control" id="price" name="price" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>



    </div>
</body>

</html>
