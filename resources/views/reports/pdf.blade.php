<!DOCTYPE html>
<html>
<head>
    <title> @lang("app.pdf.report_1") </title>
</head>
<body>
    <h1> @lang("app.pdf.report_2") </h1>
    <p><b>@lang("app.orders_view.date")</b> {{ $data['created_at'] }} </p>
    <p><b>@lang("app.orders_view.total")</b> ${{ $data['total'] }} </p>
    <table border="1" width="100%">
        <thead>
            <tr>
                <th>@lang("app.orders_view.item")</th>
                <th>@lang("app.orders_view.name")</th>
                <th>@lang("app.orders_view.price")</th>
                <th>@lang("app.orders_view.quantity")</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data['items'] as $item)
            <tr>
                <td>{{ $item['id'] }}</td>
                <td>{{ $item['movie']['title'] }}</td>
                <td>${{ $item['price'] }}</td>
                <td>{{ $item['quantity'] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
