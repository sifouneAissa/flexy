<div>


    <!-- balance -->
    <div class="row my-4 text-center">
        <div class="col-12">
            <h1 class="fw-light mb-2">{{$user->balance}}</h1>
            <p class="text-secondary">Total Balance</p>
            <p class="text-secondary"><a href="{{route('payment.create')}}">Top up</a></p>
        </div>
    </div>
    <!-- income expense-->
    <div class="row mb-4">
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-auto">
                            <div class="avatar avatar-40 p-1 shadow-sm shadow-success rounded-15">
                                <div class="icons bg-success text-white rounded-12">
                                    <i class="bi bi-arrow-up-right"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col align-self-center ps-0">
                            <p class="size-10 text-secondary mb-0">Income</p>
                            <p>0</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-auto">
                            <div class="avatar avatar-40 p-1 shadow-sm shadow-danger rounded-15">
                                <div class="icons bg-danger text-white rounded-12">
                                    <i class="bi bi-arrow-down-left"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col align-self-center ps-0">
                            <p class="size-10 text-secondary mb-0">Expense</p>
                            <p>{{$user->credit}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
