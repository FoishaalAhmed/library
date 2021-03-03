@extends('layouts.app')
@section('title', 'User Books')
@section('content')
  
  <!-- **********booklist********* -->
  <div class="container">
      <div class="row">   
        <div class="col-sm-2">
            @include('frontend.user.sidebar')
        </div>
        <div class="col-sm-10">
          @include('includes.error')
            <div class="row">
                <div class="col-sm-12" style="overflow-x: auto;">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Book Name</th>
                        <th>Taken Date</th>
                        <th>Return date</th>
                        <th>Quantity</th>
                        <th>Status</th>
                        <th>Give Rating</th>
                        <th>Availablity</th>
                      </tr>
                    </thead>
                    <tbody>
                      
                        @foreach ($books as $item)
                        <tr>
                            <td>{{$item->name}}</td>
                            <td>{{date('d M, Y', strtotime($item->from))}}</td>
                            <td>{{date('d M, Y', strtotime($item->to))}}</td>
                            <td>{{$item->quantity}}</td>
                            <td>
                                @if ($item->status == 0) {{'Pending'}}
                                
                                @elseif($item->status == 1) {{'Approved'}}

                                @elseif($item->status == 3) {{'Returned'}}

                                @else {{'Canceled'}}
                                
                                @endif
                            </td>
                            <td>

                                @if ($item->rating == null) 

                                <a href="{{route('user.rating', [$item->book_id, strtolower(str_replace(' ', '-', $item->name))])}}" class="btn btn-sm btn-dark">Rate This</a>

                                @else {{'Rating Given'}}
                                
                                @endif

                            </td>
                            <td><button type="button" class="btn btn-dark btn-sm" onclick = "showModal({{$item->book_id}})" >Book Again</button></td>
                        </tr>

                      @endforeach
                    </tbody>
                  </table>
                </div>
            </div>
        </div>
      </div>

      <div class="modal fade" id="myModal">
          <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">

                  <!-- Modal Header -->
                  <div class="modal-header">
                      <h4 class="modal-title">Extends Time</h4>
                      
                  </div>

                  <!-- Modal body -->
                  <div class="modal-body">
                      <form action="{{route('book.borrow')}}" method="post" class="form-horizontal">
                          @csrf
                          <div class="col-md-12">
                              <div class="form-group">
                                  <div class="col-md-12">
                                      <label> From </label>
                                      <input type="date" name="from" class="form-control" placeholder="Book Borrow From" required>   

                                      <input type="hidden" name="book" id="book_id">
                                  </div>
                              </div>
                              <div class="form-group">
                                  <div class="col-md-12">
                                      <label> To </label>
                                      <input type="date" name="to" class="form-control" placeholder="Book Borrow To" required>   
                                  </div>
                              </div>
                              <div class="form-group">
                                  <div class="col-md-12">
                                      <label> Quantity </label>
                                      <input type="number" name="quantity" class="form-control" placeholder="Quantity" required value="1">   
                                  </div>
                              </div>
                              <center>
                                  <button type="submit" class="btn btn-sm btn-primary">Borrow</button>
                                  <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Cancel</button>
                              </center>
                          </div>
                      </form>
                  </div>
              </div>
          </div>
      </div>
  </div>
  
  <!-- **********booklist End********* -->

  @endsection

  @section('footer')
      <script>
        function showModal(id) {
          $('#book_id').val(id);
          $('#myModal').modal('toggle');
        }
      </script>
  @endsection