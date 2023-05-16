@extends('layout.app')

@section('pageTitle',trans('Update Employee leave'))
@section('pageSubTitle',trans('update'))

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
                            <form class="form" method="post" enctype="multipart/form-data" action="{{route(currentUser().'.emLeave.update',encryptor('encrypt',$emdata->id))}}">
                                @csrf
                                @method('PATCH')
                                <div class="row">
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="designation">{{__('Employee')}}<span class="text-danger">*</span></label>
                                            <select required name="employee_id" class="form-control form-select" >
                                                <option value="">Select</option>
                                                @forelse($employee as $d)
                                                    <option value="{{$d->id}}" {{ old('employee_id',$emdata->employee_id)==$d->id?"selected":""}}> {{ $d->name}}</option>
                                                @empty
                                                    <option value="">No data found</option>
                                                @endforelse
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="date">{{__('Leave Date Start')}}</label>
                                            <input type="date" class="form-control" value="{{ old('leave_date_start',$emdata->leave_date_start)}}" name="leave_date_start">
                                            
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="date">{{__('Leave Date End')}}</label>
                                            <input type="date" class="form-control" value="{{ old('leave_date_end',$emdata->leave_date_end)}}" name="leave_date_end">
                                            
                                        </div>
                                    </div>
                                   
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="reason">{{__('Leave Reason')}}</label>
                                            <input type="text" class="form-control" value="{{ old('leave_reason',$emdata->leave_reason)}}" name="leave_reason">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="details">{{__('Application Details')}}</label>
                                            <input type="text" class="form-control" value="{{ old('application_details',$emdata->application_details)}}" name="application_details">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="img">{{__('Application Image')}}</label>
                                            <input type="file" class="form-control" name="application_image">
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
