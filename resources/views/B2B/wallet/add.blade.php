@extends('layouts/contentLayoutMaster')

@section('title', 'Make A Deposite')

@section('vendor-style')
@endsection
@section('page-style')
@endsection

@section('content')
  <div class="content-header row"></div>
  @if(session('success'))
    <div class='alert alert-success'>{{session('success')}}</div>
  @endif
  <div class="content-body">
    <div class="row">
      <!-- START .col-lg-8 -->
      <div class="col-lg-8">
        <!-- START .card -->
        <div class="card">
          <h4 class="card-header text-bold-600">Make A Deposite</h4>
          <div class="card-body">


            <div class="tab-content">

              <!-- END tab1 -->
              <!-- START tab2 -->
              <div class="tab-pane active" id="credit-end" role="tabpanel" aria-labelledby="credit-tab-end"
                   aria-expanded="false">
                <div class="card bg-gray">
                  <div class="card-header payment-header">
                    <div><i class="fa fa-credit-card-alt fa-fw mr-1"></i> Add</div>
                    <div class="float-right">
                      <img src="../../../app-assets/images/img/pay.png" alt="">
                      <img src="../../../app-assets/images/img/visa.png" alt="">
                    </div>
                  </div>
                  <div class="card-body">
                    <form action="{{route('SaveMakeADeposit')}}" method="post">
                      @csrf
                      <div class="row">
                        <div class="col-lg-12 form-group">
                          <label for="cardnumber">User</label>
                          <select class="select2 form-control" required id="user_id" name="user_id">
                            @foreach ($agents as $user)
                              <option value="{{$user->id}}">{{$user->name}} | <b>Balance: {{$user->balance}} USD</b>
                              </option>
                            @endforeach
                          </select>
                        </div>
                        <div class="col-lg-6 form-group">
                          <label for="expire">Deposit</label>
                          <input type="text" name="deposit" required id="" class="form-control" placeholder="1">
                        </div>
                        <div class="col-lg-6 form-group">
                          <label for="expire">Description:</label>
                          <input type="text" name="description" required id="" class="form-control"
                                 placeholder="order id : 1">
                        </div>


                        <div class="col-lg-12">
                          <button class="btn btn-block pay-btn black-btn">
                            <i class="fa fa-lock fa-fw mr-1"></i> Add to Wallet
                          </button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- END .card -->
      </div>
      <!-- END .col-lg-8 -->
      <div class="col-lg-4">
        <div class="card">
          <div class="card-body">
            <div class="stars">
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
            </div>
            <h6>Add To Walet Notes</h6>


            <div class="bg-gray mt-3 p-2 rounded">
              <div class="text-bold-600">email: <span class="orange">support@tripserb2b.com</span></div>
            </div>

          </div>
        </div>
      </div>
      <div>
      </div>
    </div>
  </div>
@endsection
