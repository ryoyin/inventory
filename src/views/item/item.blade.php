<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Inventory | Item</title>
</head>

<body>
    <div>
        <h2>Inventory - Item List</h2>
        <form action="{{ url('inventory/item/create') }}" method="get"><button type="submit">Create</button> </form>
    </div>
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <div>
        <table>
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>SKU</th>
                <th>Model No.</th>
                <th>Description</th>
                <th>Category ID</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            </thead>
        <tbody>
            @foreach($items as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->sku }}</td>
                <td>{{ $item->model_no }}</td>
                <td>{{ $item->description }}</td>
                <td>{{ $item->category_id }}</td>
                <td>{{ $item->status }}</td>
                <td>
                    <form action="{{ url('inventory/item/'.$item->id.'/edit') }}" method="GET" style="display: inline-block">
                        <button type="submit" class="btn btn-warning">
                            <i class="fa fa-edit"></i> Edit
                        </button>
                    </form>

                    <form action="{{ url('inventory/item/'.$item->id) }}" method="POST" style="display: inline-block">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}

                        <button type="submit" class="btn btn-danger">
                            <i class="fa fa-trash"></i> Delete
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
        </table>
    </div>
</body>

</html>