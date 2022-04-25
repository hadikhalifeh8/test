
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
                Add Order
            </button>
            <br><br>


         
            <div class="table-responsive">
            <table id="datatable" class="table table-striped table-bordered p-0" data-page-length="50"
                    style="text-align: center">
              <thead>
                  <tr>
                      <th>#</th>
                      <th>Name</th>
                      <th>email</th>
                      <th>phone number</th>
                      <th>process</th>
                      
                  </tr>
              </thead>
              <tbody>
                  

                  <?php $i=0; ?>
                  @foreach($cst as $v_cst)
                  <tr>
                                <?php $i++; ?>
                                <td>{{ $i }}</td>
                                <td>{{$v_cst->name}}</td>
                                <td>{{$v_cst->email}}</td>
                                <td>{{$v_cst->phone}}</td>
                              
                                <td>
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                        data-target="#edit{{$v_cst->id}}"
                                        title="edit"><i class="fa fa-edit"></i></button>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                        data-target="#delete{{$v_cst->id}}"
                                        title="delete"><i
                                            class="fa fa-trash"></i></button>
                                </td>
                            </tr>

                   
                            
     <!-- edit customer -->
<div class="modal fade" id="edit{{$v_cst->id}}" tabindex="-1" role="dialog" 
           aria-labelledby="exampleModalLabel"  aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h1 style="font-family: 'Cairo', sans-serif;"  class="modal-title" id="exampleModalLabel">
                    Update Customer Data
                </h1>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- edit_form -->
                <form action="{{ route('Customer.update', 'test') }}" method="Post" enctype="">
                {{ method_field('patch') }}
                {{ csrf_field() }}
                    <div class="row">
                        <div class="col">
                            <label for="Name" class="mr-sm-2" >
                                Name :</label>
                            <input id="Name" type="text" name="name" class="form-control"
                                value="{{ $v_cst->name }}">
                        </div>

                        <input id="id" type="hidden" name="id" class="form-control"
                                                            value="{{ $v_cst->id }}">
                    </div>

                    <div class="row">
                        <div class="col">
                            <label for="Name" class="mr-sm-2">
                                email :</label>
                            <input id="Name" type="text" name="email" class="form-control"
                                      value="{{ $v_cst->email }}">
                        </div>
                        
                    </div>

                    <div class="row">
                        <div class="col">
                            <label for="Name" class="mr-sm-2">
                                Phone Number :</label>
                            <input id="Name" type="text" name="phone" class="form-control" 
                                                  value="{{ $v_cst->phone }}">
                        </div>
                        
                    </div>
                    
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


  <!-- delete customer -->
  <div class="modal fade" id="delete{{$v_cst->id}}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                id="exampleModalLabel">
                                                DELETE CUSTOMER
                                            </h1>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('Customer.destroy', 'test') }}" method="post">
                                                {{ method_field('Delete') }}
                                                @csrf
                                               
                                                Are You Sure To Delete this Customer :  {{ $v_cst->name }}  

                                                <input id="id" type="hidden" name="id" class="form-control"
                                                    value="{{ $v_cst->id }}">

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



      <!-- add customer -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" 
           aria-labelledby="exampleModalLabel"  aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                    Add Customer
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- add_form -->
                <form action="{{ route('Customer.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <label for="Name" class="mr-sm-2">
                                Name :</label>
                            <input id="Name" type="text" name="name" class="form-control">
                        </div>
                        
                    </div>
                    <br>

                    <div class="row">
                        <div class="col">
                            <label for="Name" class="mr-sm-2">
                                Email :</label>
                            <input id="Name" type="text" name="email" class="form-control">
                        </div>
                        
                    </div>
                    <br>

                    <div class="row">
                        <div class="col">
                            <label for="Name" class="mr-sm-2">
                                Phone Number :</label>
                            <input id="Name" type="text" name="phone" class="form-control">
                        </div>
                        
                    </div>

                    <br>

                  

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



