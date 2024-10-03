@extends('admin.include.auth.common')
@section('authContent')

    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header">
                                        <h3 class="text-center font-weight-light my-4">Login</h3>
                                    </div>
                                    <div class="card-body">
                                        <form id="loginForm">
                                            @csrf
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputEmail" type="email"
                                                    placeholder="name@example.com" />
                                                <label for="inputEmail">Email address</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputPassword" type="password"
                                                    placeholder="Password" />
                                                <label for="inputPassword">Password</label>
                                            </div>
                                            <div class="form-check mb-3">
                                                <input class="form-check-input" id="inputRememberPassword" type="checkbox"
                                                    value="" />
                                                <label class="form-check-label" for="inputRememberPassword">Remember
                                                    Password</label>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <a class="small" href="password.html">Forgot Password?</a>
                                                <button type="submit" class="btn btn-primary">Login</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="/adminregister">Need an account? Sign up!</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <script>
                $(document).ready(function() {
                    $('#loginForm').submit(function(event) {
                        event.preventDefault(); // Prevent the default form submission

                        // Get the form data
                        var formData = {
                            inputEmail: $('#inputEmail').val(),
                            inputPassword: $('#inputPassword').val(),
                        };

                        // Send the AJAX request
                        $.ajax({
                            type: 'POST',
                            url: '{{ route('loginInput') }}', // Replace this with the actual URL of your login endpoint
                            data: formData,
                            dataType: 'json',
                            success: function(response) {
                                // Handle the successful login response
                                console.log(response);
                                if (response.success) {
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Success',
                                        text: response.success,
                                    }).then(function() {
                                        // Redirect the user to the dashboard or show a success message
                                        window.location.href = '{{ route('dashboard') }}'; // Replace this with the actual URL of your dashboard
                                    });
                                } else {
                                    // Handle unexpected success response
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Oops...',
                                        text: 'An unexpected error occurred.',
                                    });
                                }
                            },
                            error: function(xhr, status, error) {
                                // Handle the login error response
                                if (xhr.responseJSON.error) {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Oops...',
                                        text: xhr.responseJSON.error,
                                    });
                                } else {
                                    // Handle unexpected error response
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Oops...',
                                        text: 'An unexpected error occurred.',
                                    });
                                }
                            }
                        });
                    });
                });
            </script>
            @if (Session::has('loginerror'))
                <script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: '{{ session('loginerror') }}',
                    })
                </script>
            @endif
            @if (Session::has('rolealert'))
                <script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: '{{ Session::get('rolealert') }}',
                    })
                </script>
            @endif
        @endsection
