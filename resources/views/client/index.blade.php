<!DOCTYPE html>
<html lang="en">
<head>
    <!-- ... Other meta tags and stylesheets ... -->

    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- ... Rest of your layout ... -->

    <!-- Include Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <div class="py-4">
        <div class="container">
            <div class ="row">
                @if(session('success'))
                <h5>{{session('success')}}</h5>

                @endif
                <div class="col-md-12">
                   <div class="card">
                        <div class="card-header">
                            <h4> FORM
                                <a href="{{route('client.create')}}" class="btn btn-primary float-end">ADD</a>
                            </h4>

                        </div>
                                    <table class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Action</th>
                                                <th>id</th>
                                                <th>Child First Name</th>
                                                <th>Child Middle Name</th>
                                                <th>Child Last Name</th>
                                                <th>Child Age</th>
                                                <th>Gender</th>
                                                <th>Different Address</th>
                                                <th>Child Address</th>
                                                <th>Child City</th>
                                                <th>Child State</th>
                                                <th>Country</th>
                                                <th>Child Zip Code</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($clients as $client)
                                                <tr>
                                                    <td>
                                                        <a href="{{ url('client/' . $client->id . '/edit') }}" class="btn btn-success">Edit</a>
                                                        <form method="POST" action="{{ route('client.destroy', $client->id) }}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger ">Delete</button>
                                                        </form>
                                                    </td>

                                                    <td>{{ $client->id }}</td>
                                                    <td>{{ $client->child_first_name }}</td>
                                                    <td>{{ $client->child_middle_name }}</td>
                                                    <td>{{ $client->child_last_name }}</td>
                                                    <td>{{ $client->child_age }}</td>
                                                    <td>{{ $client->gender }}</td>
                                                    <td>
                                                        <input type="checkbox" class="different-address-checkbox" {{ $client->different_address ? 'checked' : '' }}>
                                                    </td>
                                                    <td><input type="text" class="form-control address-field" value="{{ $client->child_address }}" {{ $client->different_address ? '' : 'disabled' }}></td>
                                                    <td><input type="text" class="form-control address-field" value="{{ $client->child_city }}" {{ $client->different_address ? '' : 'disabled' }}></td>
                                                    <td><input type="text" class="form-control address-field" value="{{ $client->child_state }}" {{ $client->different_address ? '' : 'disabled' }}></td>
                                                    <td><input type="text" class="form-control address-field" value="{{ $client->country }}" {{ $client->different_address ? '' : 'disabled' }}></td>
                                                    <td><input type="text" class="form-control address-field" value="{{ $client->child_zip_code }}" {{ $client->different_address ? '' : 'disabled' }}></td>
                                                </tr>
                                             @endforeach

                                        </tbody>



                                </table>

                </div>

            </div>
        </div>
    </div>
</body>
</html>

