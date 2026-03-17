@extends('admin.admin_master')


@section('admin')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">



                        <div class="col-lg-12">
                            <div class="card border border-success">
                                <div class="col-md-6  p-3">
                                    @include('profile.partials.update-profile-information-form')
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="card border border-success">
                                <div class="col-md-6  p-3">
                                    @include('profile.partials.update-password-form')
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="card border border-success">
                                <div class="col-md-6  p-3">
                                    @include('profile.partials.resim')
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12">
                                <div class="card border border-danger">
                                <div class="col-md-6  p-3">
                                    @include('profile.partials.delete-user-form')
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div> <!-- end col -->
</div>
@endsection
