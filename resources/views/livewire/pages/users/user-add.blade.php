{{--<div class="row">--}}
{{--    <div class="col-12 mb-3">--}}
{{--        <div class="rounded d-block overlfow-hidden">--}}
{{--            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d53231.962811927515!2d-117.15726395005734!3d33.5014375970648!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80db6252f51abe23%3A0x68bc0e88a03806a8!2sTemecula%2C%20CA%2C%20USA!5e0!3m2!1sen!2sin!4v1623665123540!5m2!1sen!2sin"--}}
{{--                    class="h-190 w-100 rounded shadow-sm" allowfullscreen="" loading="lazy"></iframe>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
@section('page-title')
    Add User
@endsection
<div class="row">
    <div class="col-12 col-md-6 col-lg-6">
        <div class="card card-light shadow-sm mb-4">
            <div class="card-body">
                <livewire:forms.add-user-form />
            </div>
        </div>
    </div>
    <div class="col-12 col-md-6 col-lg-6">
        <div class="card card-light shadow-sm mb-4">
            <div class="card-header">
                <h3>Roles</h3>
            </div>
            <div class="card-body">
                <div class="row">
                @foreach($aroles as $role)
                <div class="col-auto h5"><span class="badge text-primary">{{$role->name}}</span></div>
                @endforeach
                </div>

            </div>
        </div>
    </div>
</div>
