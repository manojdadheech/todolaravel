@include('header')
<div class="loader-wrapper">
   <div class="loader loader-1">
      <div class="loader-outter"></div>
      <div class="loader-inner"></div>
      <div class="loader-inner-1"></div>
   </div>
</div>
<!-- loader ends-->
<!-- tap on top starts-->
<div class="tap-top"><i data-feather="chevrons-up"></i></div>
<!-- tap on tap ends-->
<!-- page-wrapper Start-->
<div class="page-wrapper compact-wrapper" id="pageWrapper">
   <div class="page-body">
      <div class="container-fluid">
         <div class="row">
            <div class="col-sm-12">
               <div class="card">
                  <div class="card-header">
                     <h4 id="todotitle">Add New Todo </h4>
                  </div>
                  <div class="card-body">
                     <div class="horizontal-wizard-wrapper">
                        <div class="row g-3">
                           <div class="col-12">
                              <div class="tab-content dark-field" id="horizontal-wizard-tabContent">
                                 <div class="tab-pane fade show active" id="wizard-info" role="tabpanel" aria-labelledby="wizard-info-tab">
                                    <form id="todolist-form" method="POST" action="{{ route('todolist.store') }}" enctype="multipart/form-data" class="row g-3 needs-validation" novalidate="">
                                       @csrf
                                       <div class="col-xl-6 col-sm-6">
                                          <label class="form-label" for="title">Title<span class="txt-danger">*</span></label>
                                          <input class="form-control" id="title" value="{{ old('title') }}" name="title" type="text" placeholder="Enter title" >
                                          @error('title')
                                          <p class="text-red-500 text-xs mt-1">
                                             {{ $message }}
                                          </p>
                                          @enderror
                                       </div>
                                       <div class="col-xl-6 col-sm-6">
                                          <label class="form-label" for="description">Description<span class="txt-danger">*</span></label>
                                          <input class="form-control" id="description" value="{{ old('description') }}" name="description" type="text" placeholder="Enter description" >
                                          @error('description')
                                          <p class="text-red-500 text-xs mt-1">
                                             {{ $message }}
                                          </p>
                                          @enderror
                                       </div>
                                       <div class="col-12 text-end">
                                          <button class="btn btn-primary" type="submit">Add Now</button>
                                       </div>
                                    </form>
                                    {{-- for update --}}
                                    <form id="todolist-formupdate" method="POST" action="{{ route('todolist.update') }}" enctype="multipart/form-data" class="row g-3 needs-validation d-none" novalidate="">
                                       @csrf
                                       <input type="hidden" name="id" id="todoid">
                                       <div class="col-xl-6 col-sm-6">
                                          <label class="form-label" for="title">Title<span class="txt-danger">*</span></label>
                                          <input class="form-control" id="titleedit" value="{{ old('title') }}" name="title" type="text" placeholder="Enter title" >
                                          @error('title')
                                          <p class="text-red-500 text-xs mt-1">
                                             {{ $message }}
                                          </p>
                                          @enderror
                                       </div>
                                       <div class="col-xl-6 col-sm-6">
                                          <label class="form-label" for="description">Description<span class="txt-danger">*</span></label>
                                          <input class="form-control" id="descriptionedit" value="{{ old('description') }}" name="description" type="text" placeholder="Enter description" >
                                          @error('description')
                                          <p class="text-red-500 text-xs mt-1">
                                             {{ $message }}
                                          </p>
                                          @enderror
                                       </div>
                                       <div class="col-12 text-end">
                                          <button class="btn btn-primary float-start" id="back">Back</button>
                                          <button class="btn btn-primary" type="submit">Update Now</button>
                                       </div>
                                    </form>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="row tabble">
            <div class="col-sm-12">
               <div class="card ">
                  <div class="form-group col-sm-3">
                     <label for="type" class="form-label">Fillter</label>
                     <select name="type" id="type" class="form-control">
                        <option value="">Select</option>
                        <option value="0">Not Completed</option>
                        <option value="1">Completed</option>
                        <option value="2">All</option>
                     </select>
                  </div>
                  <div class="card-body">
                     <div class="overflow-auto">
                        <table id="example" class="table table-bordered">
                           <thead>
                              <tr>
                                 <th>Sno</th>
                                 <th>Titel</th>
                                 <th>Description</th>
                                 <th>Status</th>
                                 <th>Action</th>
                              </tr>
                           </thead>
                           <tbody id="tbody">
                              @foreach ($todolists as $todolist )
                              <tr>
                                 <td>{{$loop->index+1}}</td>
                                 <td>{{$todolist->title}}</td>
                                 <td>{{$todolist->description}}</td>
                                 <td>@if($todolist->is_completed)
                                    <span class="badge badge-success">Completed</span>
                                    @else
                                    <span class="badge badge-warning">Not Completed</span>
                                    @endif
                                 </td>
                                 <td>
                                    @if(!$todolist->is_completed)
                                    <i class="fs-4 fa fa-check check_btn" data-id="{{$todolist->id}}"></i>
                                    @endif
                                    <i class="fs-4 fa fa-edit edit_btn" data-id="{{ $todolist->id }}" data-title="{{ $todolist->title }}" data-description="{{ $todolist->description }}"></i>
                                    <i class="fs-4 fa fa-trash delete_btn" data-id="{{$todolist->id}}"></i>
                                 </td>
                              </tr>
                              @endforeach
                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      {{-- @include("master.notification") --}}
   </div>
</div>
@include('footer')