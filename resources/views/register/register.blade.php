 @extends('includes.common')
       @section('content1') 
        
        <!-- Breadcrumb Start -->
        <div class="breadcrumb-wrap">
            <div class="container-fluid">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Products</a></li>
                    <li class="breadcrumb-item active">Register</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb End -->
        
        <!-- Login Start -->
        <div class="login">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6">    
                        <div class="register-form">
                            <form action="" name="registerForm" id="registerForm" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>First Name</label>
                                        <input class="form-control" type="text" name="userFname" id="userFname" placeholder="First Name">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Last Name</label>
                                        <input class="form-control" type="text" name="userLname" id="userLname" placeholder="Last Name">
                                    </div>
                                    <div class="col-md-6">
                                        <label>E-mail</label>
                                        <input class="form-control" type="email"  name="userEmail" id="userEmail" placeholder="E-mail">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Mobile No</label>
                                        <input class="form-control" type="tel"  name="userPhone" id="userPhone" placeholder="Mobile No">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Password</label>
                                        <input class="form-control" type="password" name="userPassword" id="userPassword" placeholder="Password">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Retype Password</label>
                                        <input class="form-control" type="password" name="retypePassword" id="retypePassword" placeholder="Password">
                                    </div>
                                    <div class="col-md-12">
                                        <input type="submit" name="register" class="btn" value="Submit">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- <div class="col-lg-6">
                        <div class="login-form">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>E-mail / Username</label>
                                    <input class="form-control" type="text" placeholder="E-mail / Username">
                                </div>
                                <div class="col-md-6">
                                    <label>Password</label>
                                    <input class="form-control" type="text" placeholder="Password">
                                </div>
                                <div class="col-md-12">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="newaccount">
                                        <label class="custom-control-label" for="newaccount">Keep me signed in</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button class="btn">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
        <!-- Login End -->
        
        <script>
            var f = document.getElementById('registerForm');
            f.addEventListener('submit', (e) => {
                e.preventDefault();

                $.ajax({
                    url: "{{route('registerSubmit')}}",
                    method: "post",
                    data: $('#registerForm').serialize(),
                    success: function(response){
                        alert(response);
                    }
                })
            });
        </script>

@endsection
      