{{-- Klientu sarasas --}}
<div class="row">

    <div class="card mt-3">

        <div class="card-header">

            <h1>Klientų sąrašas </h1>
        </div>
        <div class="card-body">
            <div class="col-md-12 d-flex flex-row">
                <table class="table">
                    <thead>
                    <tr class="table-primary text-center">
                        <th>Vardas</th>
                        <th>Pavardė</th>
                        <th>Telefonas</th>
                        <th>El. Paštas</th>
                        <th>Adresas</th>
                        <th>Pozicija</th>
                        <th>Kompanija</th>
                        <th>Data</th>
                        <th>Kalbėjimo tekstas</th>
                        @if ($user->canEdit())
                        <th></th>
                        <th></th>
                        @endif
                    </tr>
                    </thead>

                        <tbody>
                        @foreach($customers as $customer)
                        <tr class="table-info text-center">
                            <td>{{$customer->name}}</td>
                            <td>{{$customer->surname}}</td>
                            <td>{{$customer->phone}}</td>
                            <td>{{$customer->email}}</td>
                            <td>{{$customer->address}}</td>
                            <td>{{$customer->position}}</td>
                            <td>{{($customer->getCompany()->name)}}</td>
                            <td>{{$customer->getConversations($customer->id)->date}}</td>
                            <td>{{$customer->getConversations($customer->id)->conversation == true ? $customer->getConversations($customer->id)->conversation : 'Nebuvo pokalbio'}}</td>
{{--                           <td>{{$customer->getConversations($customer->id)->conversation}}</td>--}}
                            @if ($user->canEdit())
                            <td><a class="btn btn-success" href="updateCustomers.php?id={{$customer->id}}">Update</a></td>
                            <td><a class="btn btn-danger" href="?deleteCustomer_id={{$customer->id}}">Delete</a></td>
                            @endif
                        </tr>
                        @endforeach
                        </tbody>

                </table>
            </div>
        </div>
    </div>
</div>
