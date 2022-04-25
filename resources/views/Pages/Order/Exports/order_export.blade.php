<table>
    <thead>
    <tr>
        <th>Order numer</th>
        <th>Customer</th>
        <th>Product</th>
    </tr>
    </thead>
    <tbody>
    @foreach($orrder as $v_orrder)
        <tr>
            <td>{{ $v_orrder->id }}</td>
            <td>{{ $v_orrder->customer_rltn->name }}</td>
            <td>{{ $v_orrder->product_rltn->name }}</td>
        </tr>
    @endforeach
    </tbody>
</table>