@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Create User') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form>
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Name</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Enter name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="text" name="email" id="email" class="form-control" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Address</label>
                            <input type="text" name="address" id="address" class="form-control" placeholder="Enter address">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                        </div>
                       
                        <button type="button" id="save-data" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('#save-data').click(function() {
            var href = "{{ route('user.index') }}"
            var name = $('#name').val();
            var email = $('#email').val();
            var address = $('#address').val();
            var password = $('#password').val();
            $.ajax({
                type: "post",
                url: " {{ route('user.store') }}",
                dataType: "json",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "name":name,
                    "email": email,
                    "address": address,
                    "password": password
                },
                success: function (result) {
                    if(result.success == true) {
                        window.location.href = href;
                    }
                }
            })
        });
    });
    </script>
@endsection
