
@extends('layouts.base')
@section('content')

@toastr_css

    

       
                    
            
                
           
           
              
      <div class="col-xl-12 mb-30">     
        <div class="card card-statistics h-100"> 
          <div class="card-body">

          @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<br>

          <button type="button" class="button x-small" data-toggle="modal" data-target="#exampleModal">
                Add Category
            </button>

            <br><br>
            <div>
                <a href="{{ route('export_order') }}">Export to excel file</a>
            </div>
            <br><br>



         
            <div class="table-responsive">
            <table id="datatable" class="table table-striped table-bordered p-0" data-page-length="50"
                    style="text-align: center">
              <thead>
                  <tr>
                      <th>#</th>
                      <th>order number</th>
                      <th>customer name</th>
                      <th>product name</th>
                      <th>process</th>
                      
                  </tr>
              </thead>
              <tbody>
                  

                  <?php $i=0; ?>
                  @foreach($order as $v_order)
                  <tr>
                                <?php $i++; ?>
                                <td>{{ $i }}</td>
                                <td>{{$v_order->id}}</td>
                                <td>{{$v_order->customer_rltn->name}}</td>
                                <td>{{$v_order->product_rltn->name}}</td>
                              
                                <td>
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                        data-target="#edit{{$v_order->id}}"
                                        title="edit"><i class="fa fa-edit"></i></button>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                        data-target="#delete{{$v_order->id}}"
                                        title="delete"><i
                                            class="fa fa-trash"></i></button>
                                </td>
                            </tr>



       
                            

 <!-- edit order -->
<div class="modal fade" id="edit{{$v_order->id}}" tabindex="-1" role="dialog" 
           aria-labelledby="exampleModalLabel"  aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h1 style="font-family: 'Cairo', sans-serif;"  class="modal-title" id="exampleModalLabel">
                    Update Order Data
                </h1>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- edit_form -->
                <form action="{{ route('Order.update', 'test') }}" method="Post" enctype="">
                {{ method_field('patch') }}
                {{ csrf_field() }}
            
                
                <div class=" col">
                                <label for="inputState">Customer Name</label>
                                <select class="custom-select mr-sm-2" name="customer_id" {{$v_order->customer_id}} >
                                    <option value="{{ $v_order->customer_rltn->id}}"> {{ $v_order->customer_rltn->name}} </option>
                                    @foreach($cstmr as $v_cst)
                                        <option value="{{$v_cst->id}}">{{$v_cst->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                    <br>


                    <div class=" col">
                                <label for="inputState">product Name</label>
                                <select class="custom-select mr-sm-2" name="product_id" {{$v_order->product_id}}>
                                    <option value="{{$v_order->product_rltn->id}}"> {{$v_order->product_rltn->name}} </option>
                                    @foreach($prdct as $v_prodct)
                                        <option value="{{$v_prodct->id}}">{{$v_prodct->name}}</option>
                                    @endforeach
                                </select>
                            </div>


                          <input type="hidden" name="id" class="form-control" 
                                          value="{{$v_order->id}}" >

                   
                    <br><br>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary"
                    data-dismiss="modal">cancel</button>
                <button type="submit" class="btn btn-success">Update</button>
            </div>
            </form>

        </div>
    </div>
</div>                      











  <!-- delete order -->
  <div class="modal fade" id="delete{{$v_order->id}}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                id="exampleModalLabel">
                                                DELETE Order
                                            </h1>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('Order.destroy', 'test') }}" method="post">
                                                {{ method_field('Delete') }}
                                                @csrf
                                               
                                                Are You Sure To Delete this order :  {{ $v_order->id }}  

                                                <input id="id" type="hidden" name="id" class="form-control"
                                                    value="{{ $v_order->id }}">

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                    <button type="submit"
                                                        class="btn btn-danger">Delete</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>


  @endforeach


  


              
           </table>
          </div>
          </div>
        </div>   
      </div>



      <!-- add order -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" 
           aria-labelledby="exampleModalLabel"  aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                    Add Order
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- add_form -->
                <form action="{{ route('Order.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                 

                    <div class=" col">
                                <label for="inputState">Customer Name</label>
                                <select class="custom-select mr-sm-2" name="customer_id" >
                                    <option selected disabled>Choose a customer ...</option>
                                    @foreach($cstmr as $v_cst)
                                        <option value="{{$v_cst->id}}">{{$v_cst->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                    <br>


                    <div class=" col">
                                <label for="inputState">product Name</label>
                                <select class="custom-select mr-sm-2" name="product_id" >
                                    <option selected disabled>Choose a customer ...</option>
                                    @foreach($prdct as $v_prodct)
                                        <option value="{{$v_prodct->id}}">{{$v_prodct->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                   

                   

                  

                    <br><br>
                    
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary"
                    data-dismiss="modal">cancel</button>
                <button type="submit" class="btn btn-success">submit</button>
            </div>
            </form>

        </div>
    </div>
</div>    
  

      











   @jquery
   @toastr_js
    @toastr_render
        

@endsection



