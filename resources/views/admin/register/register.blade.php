@extends('admin.include.auth.common')
@section('authContent')

<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-7">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Create Account</h3>
                                </div>
                                <div class="card-body">
                                    <form id="adminRegister">
                                        @csrf
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" id="inputFirstName" name="inputFirstName" type="text"
                                                        placeholder="Enter your first name" />
                                                    <label for="inputFirstName">First name</label>
                                                    <span class="text-danger" id="firstNameError"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating">
                                                    <input class="form-control" id="inputLastName" name="inputLastName" type="text"
                                                        placeholder="Enter your last name" />
                                                    <label for="inputLastName">Last name</label>
                                                    <span class="text-danger" id="lastNameError"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="inputEmail" name="inputEmail" type="email"
                                                placeholder="name@example.com" />
                                            <label for="inputEmail">Email address</label>
                                            <span class="text-danger" id="emailError"></span>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" id="inputPassword" name="inputPassword" type="password"
                                                        placeholder="Create a password" />
                                                    <label for="inputPassword">Password</label>
                                                    <span class="text-danger" id="passwordError"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" id="inputPasswordConfirm" name="inputPassword_confirmation"
                                                        type="password" placeholder="Confirm password" />
                                                    <label for="inputPasswordConfirm">Confirm Password</label>
                                                    <span class="text-danger" id="passwordConfirmError"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-4 mb-0">
                                            <div class="d-grid">
                                                <button type="submit" class="btn btn-primary btn-block">Create Account</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center py-3">
                                    <div class="small">
                                        <a href="/adminlogin">Have an account? Go to login</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>

        <script>
            $(document).ready(function() {
                $('#adminRegister').submit(function(e) {
                    e.preventDefault();

                    // Clear previous error messages
                    $('#firstNameError').text('');
                    $('#lastNameError').text('');
                    $('#emailError').text('');
                    $('#passwordError').text('');
                    $('#passwordConfirmError').text('');

                    $.ajax({
                        type: "POST",
                        url: "{{ route('registerInput') }}",
                        data: $(this).serialize(),
                        dataType: "json",
                        success: function(response) {
                            // Show success alert with SweetAlert
                            Swal.fire({
                                icon: 'success',
                                title: 'Success!',
                                text: response.success,
                                confirmButtonText: 'OK'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href = '{{ route('adminLogin') }}'; // Redirect after success
                                }
                            });
                            console.log(response);
                        },
                        error: function(xhr, status, error) {
                            if (xhr.status === 422) {
                                let errors = xhr.responseJSON.errors;

                                // Display validation errors
                                if (errors.inputFirstName) {
                                    $('#firstNameError').text(errors.inputFirstName[0]);
                                }
                                if (errors.inputLastName) {
                                    $('#lastNameError').text(errors.inputLastName[0]);
                                }
                                if (errors.inputEmail) {
                                    $('#emailError').text(errors.inputEmail[0]);
                                }
                                if (errors.inputPassword) {
                                    $('#passwordError').text(errors.inputPassword[0]);
                                }
                                if (errors.inputPassword_confirmation) {
                                    $('#passwordConfirmError').text(errors.inputPassword_confirmation[0]);
                                }

                                // Show error alert with SweetAlert
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error!',
                                    text: 'Please fix the highlighted errors and try again.',
                                });
                            } else {
                                // Show general error alert
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error!',
                                    text: 'Something went wrong. Please try again.',
                                });
                            }
                        }
                    });
                });
            });
        </script>
@endsection
