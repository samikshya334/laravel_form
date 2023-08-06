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
                <div class="col-md-12">
                   <div class="card">
                        <div class="card-header">
                            <h4> EDit Details FORM
                                <a href="{{route('client.index')}}" class="btn btn-primary float-end">BACK</a>

                            </h4>

                        </div>

                            <div class="card-body">

                                <form action="{{url('client/' . $client->id)}}" method="POST">
                                    @csrf
                                    @method('PUT')


                                    <div class="mb-3">
                                    <label for="childFirstName">Child First Name:</label>
                                    <input type="text" id="childFirstName" name="child_first_name" value="{{$client->child_first_name}}" required><br>
                                    </div>
                                    <div class="mb-3">
                                    <label for="childMiddleName">Child Middle Name:</label>
                                    <input type="text" id="childMiddleName" name="child_middle_name"value="{{$client->child_middle_name}}"><br>
                                    </div>
                                    <div class="mb-3">
                                    <label for="childLastName">Child Last Name:</label>
                                    <input type="text" id="childLastName" name="child_last_name" value="{{$client->child_last_name}}" required><br>
                                    </div>
                                    <div class="mb-3">
                                    <label for="childAge">Child Age:</label>
                                    <input type="number" id="childAge" name="child_age" value="{{$client->child_age}}" required><br>
                                    </div>
                                    <div class="mb-3">
                                    <label for="gender">Gender:</label>
                                    <select id="gender" name="gender" required>
                                        <option value="male" {{$client->gender === 'male' ? 'selected' : ''}}>Male</option>
                                        <option value="female" {{$client->gender === 'female' ? 'selected' : ''}}>Female</option>
                                        <option value="other" {{$client->gender === 'other' ? 'selected' : ''}}>Other</option>
                                    </select>

                                    </div>
                                    <div class="mb-3">
                                    <input type="checkbox" id="differentAddress" class="different-address-checkbox" >
                                    <label for="differentAddress">Different Address?</label><br>
                                    </div>
                                    <div class="mb-3">
                                    <label for="childAddress">Child Address:</label>
                                    <input type="text" id="childAddress" class="address-field" name="child_address" value="{{$client->child_address}}"disabled><br>
                                    </div>
                                    <div class="mb-3">
                                    <label for="childCity">Child City:</label>
                                    <input type="text" id="childCity" class="address-field" name="child_city" value="{{$client->child_city}}" disabled><br>
                                    </div>
                                    <div class="mb-3">
                                    <label for="childState">Child State:</label>
                                    <input type="text" id="childState" class="address-field" name="child_state"value="{{$client->child_state}}" disabled><br>
                                    </div>
                                    <div class="mb-3">
                                    <label for="country">Country:</label>
                                    <select id="country" class="address-field" name="country" value="{{$client->country}}"disabled>
                                        <option value="usa">Nepal</option>
                                        <option value="canada">Canada</option>

                                    </select><br>
                                    </div>
                                    <div class="mb-3">
                                    <label for="childZipCode">Child Zip Code:</label>
                                    <input type="number" id="childZipCode" class="address-field" name="child_zip_code" value="{{$client->child_zip_code}}"disabled><br>

                                </div>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </form>

                                <script>

                                    const differentAddressCheckbox = document.querySelector('.different-address-checkbox');
                                    const addressFields = document.querySelectorAll('.address-field');

                                    differentAddressCheckbox.addEventListener('change', function() {
                                        addressFields.forEach(field => {
                                            field.disabled = !this.checked;
                                        });
                                    });
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>






