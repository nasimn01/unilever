@extends('layout.app')

@section('pageTitle',trans('Create Memu'))
@section('pageSubTitle',trans('Create'))

@section('content')
<style>
    .hidden {
        display: none;
    }
</style>
  <!-- // Basic multiple Column Form section start -->
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" method="post" action="{{route(currentUser().'.memu.store')}}">
                                @csrf
                                <div class="row">
                                   
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="designation">{{__('Outlet')}}<span class="text-danger">*</span></label>
                                            <select required name="outlet_id" class="form-control form-select" >
                                                <option value="">Select</option>
                                                @forelse($outlet as $d)
                                                    <option value="{{$d->id}}" {{ old('outlet_id')==$d->id?"selected":""}}> {{ $d->name}}</option>
                                                @empty
                                                    <option value="">No data found</option>
                                                @endforelse
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="jso">{{__('JSO ID')}}<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" value="{{ old('jso_id')}}" name="jso_id" required>
                                            
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="sr">{{__('SR ID')}}<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" value="{{ old('sr_id')}}" name="sr_id" required>
                                            
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="amount">{{__('Total Amount')}}</label>
                                            <input type="number" class="form-control" value="{{ old('total_amount')}}" name="total_amount" id="total_amount" oninput="calculateDueAmount()">
                                            
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="amount">{{__('Paid Amount')}}</label>
                                            <input type="number" class="form-control" value="{{ old('paid_amount')}}" name="paid_amount" id="paid_amount" oninput="checkPaidAmount()">
                                            
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-12" >
                                        <div class="form-group" id="due_div">
                                            <label for="amount">{{__('Due Amount')}}</label>
                                            <input type="number" class="form-control" id="due_amount" value="{{ old('due_amount')}}" name="due_amount" readonly>
                                            
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="date">{{__('Memu Date')}}</label>
                                            <input type="date" class="form-control" value="{{ old('memu_date')}}" name="memu_date">
                                            
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="date">{{__('Next-Due Collection Date')}}</label>
                                            <input type="date" class="form-control" value="{{ old('next_due_collection_date')}}" name="next_due_collection_date">
                                            
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
@push('scripts')
<script>
    function calculateDueAmount() {
      const totalAmount = parseFloat(document.getElementById('total_amount').value);
      const paidAmount = parseFloat(document.getElementById('paid_amount').value);
      const dueDiv = document.getElementById('due_div');
      
      if (totalAmount === paidAmount) {
        dueDiv.classList.add('hidden');
      } else {
        dueDiv.classList.remove('hidden');
        const dueAmount = totalAmount - paidAmount;
        document.getElementById('due_amount').value = dueAmount.toFixed(2);
      }
    }

    function checkPaidAmount() {
      const totalAmount = parseFloat(document.getElementById('total_amount').value);
      const paidAmount = parseFloat(document.getElementById('paid_amount').value);
      
      if (paidAmount > totalAmount) {
        alert('Paid amount cannot be greater than total amount!');
        document.getElementById('paid_amount').value = totalAmount.toFixed(2);
      }
      
      calculateDueAmount();
    }
</script>
@endpush
