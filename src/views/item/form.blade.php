<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Inventory | Item</title>
</head>

<body>
    <div>
        <h2>Inventory - {{ $title }}</h2>
    </div>
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <div>
        <form action="{{ $action }}" method="POST">
            @if(isset($formMethod))
                {{ method_field($formMethod) }}
            @endif
            <div>
                Name: <input type="text" name="name" value="{{ $item['name'] }}">
            </div>
            <div>
                Description: <input type="text" name="description" value="{{ $item['description'] }}">
            </div>
            <div>
                SKU: <input type="text" name="sku" value="{{ $item['sku'] }}">
            </div>
            <div>
                Model No.: <input type="text" name="model_no" value="{{ $item['model_no'] }}">
            </div>
            <div>
                Category: <input type="text" name="category_id" value="{{ $item['category_id'] }}">
            </div>
            <div>
                Status:
                <select name="status">
                    <option value="pending" <?php echo $item['status'] == 'pending'? 'selected':'' ?>>pending</option>
                    <option value="normal" <?php echo $item['status'] == 'normal'? 'selected':'' ?>>normal</option>
                    <option value="suspend" <?php echo $item['status'] == 'suspend'? 'selected':'' ?>>suspend</option>
                    <option value="discontinue" <?php echo $item['status'] == 'discontinue'? 'selected':'' ?>>discontinue</option>
                </select>
            </div>
            <div>
                <button type="submit">Submit</button>
            </div>
        </form>
    </div>
</body>

</html>