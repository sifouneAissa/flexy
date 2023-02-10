<div class="row h-100">
    <div class="col-11 col-sm-11 mx-auto">
        <!-- header -->
        <div class="row">
            <header class="header">
                <div class="row">
                    <div class="col">
                        <div class="logo-small">
                            <img src="assets/img/logo.png" alt="" />
                            <h5><span class="text-secondary fw-light">Finance</span><br />Wallet</h5>
                        </div>
                    </div>
                    <div class="col-auto align-self-center">
                        <a href="signin.html">Sing in</a>
                    </div>
                </div>
            </header>
        </div>
        <!-- header ends -->
    </div>
    <div class="col-11 col-sm-11 col-md-6 col-lg-5 col-xl-3 mx-auto align-self-center py-4">
        <h1 class="mb-4"><span class="text-secondary fw-light">Create</span><br/>new account</h1>
        <div class="form-floating is-valid mb-3">
            <select class="form-control" id="country">
                <option selected>United States (+1)</option>
                <option>United Kingdoms (+44)</option>
            </select>
            <label for="country">Contry</label>
        </div>
        <div class="form-floating is-valid mb-3">
            <input type="text" class="form-control" value="info@maxartkiller.com"
                   placeholder="Email or Phone" id="emailphone">
            <label for="emailphone">Email or Phone</label>
        </div>
        <div class="form-floating is-valid mb-3">
            <input type="text" class="form-control" value="maxartkiller" placeholder="Username"
                   id="username">
            <label for="username">Username</label>
        </div>
        <div class="form-floating is-valid mb-3">
            <input type="password" class="form-control" value="asdasdasdsd" placeholder="Password"
                   id="password">
            <label for="password">Password</label>
        </div>
        <div class="form-floating is-invalid mb-3">
            <input type="password" class="form-control" placeholder="Confirm Password" id="confirmpassword">
            <label for="confirmpassword">Confirm Password</label>
            <button type="button" class="btn btn-link text-danger tooltip-btn" data-bs-toggle="tooltip"
                    data-bs-placement="left" title="Enter valid Password" id="passworderror">
                <i class="bi bi-info-circle"></i>
            </button>
        </div>
        <p class="mb-3"><span class="text-muted">By clicking on Sign up button, you are agree to the our </span> <a
                href="">Terms and Conditions</a></p>
    </div>
    <div class="col-11 col-sm-11 mt-auto mx-auto py-4">
        <div class="row ">
            <div class="col-12 d-grid">
                <a href="verify.html" class="btn btn-default btn-lg shadow-sm">Sign Up</a>
            </div>
        </div>
    </div>
</div>
