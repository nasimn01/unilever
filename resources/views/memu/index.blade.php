@extends('layout.app')
@section('pageTitle',trans('Memu List'))
@section('pageSubTitle',trans('List'))

@section('content')

<!-- Bordered table start -->
<section class="section">
    <div class="row" id="table-bordered">
        <div class="col-12">
            <div class="card">
                    <!-- table bordered -->
                    <div class="table-responsive">
                        <table class="table table-bordered mb-0">
                            <a class="float-end" href="{{route(currentUser().'.memu.create')}}"style="font-size:1.7rem"><i class="bi bi-plus-square-fill"></i></a>
                            <thead>
                                <tr>
                                    <th scope="col">{{__('#SL')}}</th>
                                    <th scope="col">{{__('Outlet')}}</th>
                                    <th scope="col">{{__('JSO ID')}}</th>
                                    <th scope="col">{{__('SR ID')}}</th>
                                    <th scope="col">{{__('Total Amount')}}</th>
                                    <th scope="col">{{__('Paid Amount')}}</th>
                                    <th scope="col">{{__('Due Amount')}}</th>
                                    <th scope="col">{{__('Memu Date')}}</th>
                                    <th scope="col">{{__('Next-Due Collection-Date')}}</th>
                                    <th class="white-space-nowrap">{{__('ACTION')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($data as $p)
                                <tr>
                                <th scope="row">{{ ++$loop->index }}</th>
                                    <td>{{$p->outlet?->name}}</td>
                                    <td>{{$p->jso_id}}</td>
                                    <td>{{$p->sr_id}}</td>
                                    <td>{{$p->total_amount}}</td>
                                    <td>{{$p->paid_amount}}</td>
                                    <td>{{$p->due_amount}}</td>
                                    <td>{{$p->memu_date}}</td>
                                    <td>{{$p->next_due_collection_date}}</td>
                                    <td class="white-space-nowrap">
                                        <a href="{{route(currentUser().'.memu.edit',encryptor('encrypt',$p->id))}}">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        <a href="javascript:void()" onclick="$('#form{{$p->id}}').submit()">
                                            <i class="bi bi-trash"></i>
                                        </a>
                                        <form id="form{{$p->id}}" action="{{route(currentUser().'.memu.destroy',encryptor('encrypt',$p->id))}}" method="post">
                                            @csrf
                                            @method('delete')
                                            
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <th colspan="10" class="text-center">No Data Found</th>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
    </div>
</section>

@endsection