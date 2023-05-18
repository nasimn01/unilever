@extends('layout.app')

@section('pageTitle',trans('Update Route'))
@section('pageSubTitle',trans('update'))

@section('content')
  <!-- // Basic multiple Column Form section start -->
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" method="post" enctype="multipart/form-data" action="{{route(currentUser().'.uroute.update',encryptor('encrypt',$rdata->id))}}">
                                @csrf
                                @method('PATCH')
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="text">{{__('Route Code')}}</label>
                                            <input type="text" class="form-control" value="{{ old('route_code',$rdata->route_code)}}" name="route_code">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="text">{{__('Route Name')}}</label>
                                            <input type="text" class="form-control" value="{{ old('route_name',$rdata->route_name)}}" name="route_name">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-info me-1 mb-1">Update</button>
                                        
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection