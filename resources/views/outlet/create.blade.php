@extends('layout.app')

@section('pageTitle',trans('Create Outlet'))
@section('pageSubTitle',trans('Create'))

@section('content')
  <!-- // Basic multiple Column Form section start -->
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" method="post" action="{{route(currentUser().'.outlet.store')}}">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="code">{{__('Code')}}<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" value="{{ old('code')}}" name="code">
                                            @if($errors->has('code'))
                                                <span class="text-danger"> {{ $errors->first('code') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="alt_code">{{__('Alt Code')}}<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" value="{{ old('alt_code')}}" name="alt_code">
                                            @if($errors->has('alt_code'))
                                                <span class="text-danger"> {{ $errors->first('alt_code') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="name">{{__('Name')}}</label>
                                            <input type="text" class="form-control" value="{{ old('name')}}" name="name">
                                            @if($errors->has('name'))
                                                <span class="text-danger"> {{ $errors->first('name') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="short_name">{{__('Short Name')}}</label>
                                            <input type="text" class="form-control" value="{{ old('short_name')}}" name="short_name">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="bangla_name">{{__('Bangla Name')}}</label>
                                            <input type="text" class="form-control" value="{{ old('bangla_name')}}" name="bangla_name">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="owner">{{__('Owner')}}</label>
                                            <input type="text" class="form-control" value="{{ old('owner')}}" name="owner">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="address">{{__('Address')}}</label>
                                            <textarea name="address" class="form-control" rows="2">{{ old('address')}}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="contact">{{__('Contact')}}</label>
                                            <input type="text" class="form-control" value="{{ old('contact')}}" name="contact">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="channel">{{__('Channel')}}</label>
                                            <input type="text" class="form-control" value="{{ old('channel')}}" name="channel">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="region">Region</label>
                                            <select class="form-control form-select" name="region">
                                                <option value="">Select Region</option>
                                                @forelse($district as $d)
                                                    <option value="{{$d->id}}" {{ old('region')==$d->id?"selected":""}}> {{ $d->name}}</option>
                                                @empty
                                                    <option value="">No region found</option>
                                                @endforelse
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="town">Town</label>
                                            <select class="form-control form-select" name="town">
                                                <option value="">Select Town</option>
                                                @forelse($upazila as $d)
                                                    <option value="{{$d->id}}" {{ old('town')==$d->id?"selected":""}}> {{ $d->name}}</option>
                                                @empty
                                                    <option value="">No town found</option>
                                                @endforelse
                                            </select>
                                        </div>
                                    </div>
                                    {{-- <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="distributor_code">{{__('Distribute Code')}}</label>
                                            <input type="text" class="form-control" value="{{ old('distributor_code')}}" name="distributor_code">
                                        </div>
                                    </div> --}}
                                    {{-- <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="route_code">{{__('Route Code')}}</label>
                                            <select class="form-control form-select" name="route_code">
                                                <option value="">Select Route Code</option>
                                                @forelse($route as $d)
                                                    <option value="{{$d->id}}" {{ old('route_code')==$d->id?"selected":""}}> {{ $d->route_code}} {{ $d->route_name}}</option>
                                                @empty
                                                    <option value="">No data found</option>
                                                @endforelse
                                            </select>
                                        </div>
                                    </div> --}}
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="route_name">{{__('Route Name & Code')}}</label>
                                            <select class="form-control form-select" name="route_name">
                                                <option value="">Select Route</option>
                                                @forelse($route as $d)
                                                    <option value="{{$d->id}}" {{ old('route_name')==$d->id?"selected":""}}> {{ $d->route_name}}({{ $d->route_code}})</option>
                                                @empty
                                                    <option value="">No data found</option>
                                                @endforelse
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="outlet_create_date">{{__('Outlet Creation Date')}}</label>
                                            <input type="date" class="form-control" value="{{ old('outlet_create_date')}}" name="outlet_create_date">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="frequency">{{__('Frequency')}}</label>
                                            <input type="text" class="form-control" value="{{ old('frequency')}}" name="frequency">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="sales_officer">{{__('Sales Officer')}}</label>
                                            <input type="text" class="form-control" value="{{ old('sales_officer')}}" name="sales_officer">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">Save</button>
                                        
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
