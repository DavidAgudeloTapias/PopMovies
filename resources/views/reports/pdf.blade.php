<!DOCTYPE html>
<html>
<head>
    <title> @lang("app.pdf.report_1") </title>
</head>
<body>
    <h1> @lang("app.pdf.report_2") </h1>
    <p><b>@lang("app.orders_view.date")</b> {{ $orderData->getCreatedAt() }} </p>
    <p><b>@lang("app.orders_view.total")</b> ${{ $orderData->getTotal() }} </p>
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
            @foreach ($orderData->getItems() as $item)
            <tr>
                <td>{{ $item->getId() }}</td>
                <td>
                    <a value="{{ $item->getMovie()->getId() }}"> {{ $item->getMovie()->getTitle() }} </a>
                </td>
                <td>${{ $item->getPrice() }}</td>
                <td>{{ $item->getQuantity() }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
