@extends('layout.app')
@section('pageTitle',trans('Outlet List'))
@section('pageSubTitle',trans('List'))

@section('content')
<section class="section">
    <div class="row" id="table-bordered">
        <div class="col-12">
            <div class="card">
                    <!-- table bordered -->
                    <div class="table-responsive">
                        <table class="table table-bordered mb-0">
                            <a class="float-end" href="{{route(currentUser().'.outlet.create')}}"style="font-size:1.7rem"><i class="bi bi-plus-square-fill"></i></a>
                            <thead>
                                <tr>
                                    <th scope="col">{{__('#SL')}}</th>
                                    <th scope="col">{{__('Code')}}</th>
                                    <th scope="col">{{__('Alt Code')}}</th>
                                    <th scope="col">{{__('Name')}}</th>
                                    <th scope="col">{{__('Short Name')}}</th>
                                    <th scope="col">{{__('Bangla Name')}}</th>
                                    <th scope="col">{{__('Owner')}}</th>
                                    <th scope="col">{{__('Address')}}</th>
                                    <th scope="col">{{__('Contact')}}</th>
                                    <th scope="col">{{__('Channel')}}</th>
                                    <th scope="col">{{__('Region')}}</th>
                                    <th scope="col">{{__('Town')}}</th>
                                    {{-- <th scope="col">{{__('Distributor Code')}}</th> --}}
                                    <th scope="col">{{__('Route Code')}}</th>
                                    <th scope="col">{{__('Route Name')}}</th>
                                    <th scope="col">{{__('Outlet Creation Date')}}</th>
                                    <th scope="col">{{__('Frequency')}}</th>
                                    <th scope="col">{{__('Sales Officer')}}</th>
                                    <th scope="col">{{__('Status')}}</th>
                                    <th class="white-space-nowrap">{{__('ACTION')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($data as $p)
                                <tr>
                                <th scope="row">{{ ++$loop->index }}</th>
                                    <td>{{$p->code}}</td>
                                    <td>{{$p->alt_code}}</td>
                                    <td>{{$p->name}}</td>
                                    <td>{{$p->short_name}}</td>
                                    <td>{{$p->bangla_name}}</td>
                                    <td>{{$p->owner}}</td>
                                    <td>{{$p->address}}</td>
                                    <td>{{$p->contact}}</td>
                                    <td>{{$p->channel}}</td>
                                    <td>{{$p->region}}</td>
                                    <td>{{$p->town}}</td>
                                    {{-- <td>{{$p->distributor_code}}</td> --}}
                                    <td>{{$p->route?->route_code}}</td>
                                    <td>{{$p->route?->route_name}}</td>
                                    <td>{{$p->outlet_create_date}}</td>
                                    <td>{{$p->frequency}}</td>
                                    <td>{{$p->sales_officer}}</td>
                                    <td>@if($p->status == 1) {{__('Active') }} @else {{__('Inactive') }} @endif</td>
                                    
                                    <td class="white-space-nowrap">
                                        <a href="{{route(currentUser().'.outlet.edit',encryptor('encrypt',$p->id))}}">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        <a href="javascript:void()" onclick="$('#form{{$p->id}}').submit()">
                                            <i class="bi bi-trash"></i>
                                        </a>
                                        <form id="form{{$p->id}}" action="{{route(currentUser().'.outlet.destroy',encryptor('encrypt',$p->id))}}" method="post">
                                            @csrf
                                            @method('delete')
                                            
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <th colspan="20" class="text-center">No Data Found</th>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="my-3">
                        {!! $data->links()!!}
                    </div>
                </div>
            </div>
    </div>
</section>
<!-- Bordered table end -->


@endsection