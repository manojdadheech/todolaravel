<script src="{{url('assets/js/jquery.min.js')}}"></script>
<!-- Bootstrap js-->
<script src="{{url('assets/js/bootstrap/bootstrap.bundle.min.js')}}"></script>
<!-- feather icon js-->
<script src="{{url('assets/js/icons/feather-icon/feather.min.js')}}"></script>
<script src="{{url('assets/js/icons/feather-icon/feather-icon.js')}}"></script>
<!-- scrollbar js-->
<script src="{{url('assets/js/scrollbar/simplebar.js')}}"></script>
<script src="{{url('assets/js/scrollbar/custom.js')}}"></script>
<!-- Sidebar jquery-->
<script src="{{url('assets/js/config.js')}}"></script>
<!-- Plugins JS start-->
<script src="{{url('assets/js/sidebar-menu.js')}}"></script>
<script src="{{url('assets/js/sidebar-pin.js')}}"></script>
<script src="{{url('assets/js/slick/slick.min.js')}}"></script>
<script src="{{url('assets/js/slick/slick.js')}}"></script>
<script src="{{url('assets/js/header-slick.js')}}"></script>
<script src="{{url('assets/js/photoswipe/photoswipe.min.js')}}"></script>
<script src="{{url('assets/js/photoswipe/photoswipe-ui-default.min.js')}}"></script>
<script src="{{url('assets/js/photoswipe/photoswipe.js')}}"></script>
<!-- calendar js-->
<script src="{{url('assets/js/dashboard/default.js')}}"></script>
<script src="{{url('assets/js/notify/index.js')}}"></script>
<script src="{{url('assets/js/datatable/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{url('assets/js/datatable/datatables/datatable.custom.js')}}"></script>
<script src="{{url('assets/js/datatable/datatables/datatable.custom1.js')}}"></script>
<script src="{{url('assets/js/calendar/fullcalendar.min.js')}}"></script>
<script src="{{url('assets/js/calendar/fullcalendar-custom.js')}}"></script>
<script src="{{url('assets/js/datepicker/date-range-picker/moment.min.js')}}"></script>
<script src="{{url('assets/js/datepicker/date-range-picker/datepicker-range-custom.js')}}"></script>
<script src="{{url('assets/js/typeahead/handlebars.js')}}"></script>
<script src="{{url('assets/js/typeahead/typeahead.bundle.js')}}"></script>
<script src="{{url('assets/js/typeahead/typeahead.custom.js')}}"></script>
<script src="{{url('assets/js/typeahead-search/handlebars.js')}}"></script>
<script src="{{url('assets/js/typeahead-search/typeahead-custom.js')}}"></script>
<script src="{{url('assets/js/dropzone/dropzone.js')}}"></script>
<script src="{{url('assets/js/dropzone/dropzone-script.js')}}"></script>
<script src="{{url('assets/js/form-validation-custom.js')}}"></script>
<script src="{{url('assets/js/height-equal.js')}}"></script>
<script src="{{url('assets/js/animation/wow/wow.min.js')}}"></script>
<!-- Plugins JS Ends-->
<!-- Theme js-->
<script src="{{url('assets/js/tooltip-init.js')}}"></script>
<script src="{{url('assets/js/script.js')}}"></script>
<script src="{{url('assets/js/theme-customizer/customizer.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="{{url('assets/js/datatable/datatables/jquery.dataTables.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- Include DataTables Buttons JS -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
<!-- Plugin used-->
<script>new WOW().init();</script>
<script>
   $(document).ready(function () {
   
       $("body").append("");
       var boxed = "";
       if ($(".page-wrapper").hasClass("box-layout")) {
           boxed = "box-layout";
       }
   
      
   
       $(".table").DataTable({
           
           paging: true,
           dom: 'Bfrtip',
            
       })
   
   
   
   
   
      
   
   
      
   
   })
</script>
<script>
   $(document).ready(function () {
   
       $('#todolist-form').on('submit', function(e) {
       e.preventDefault();
       
       let formData = new FormData(this);
   
       $.ajax({
           url: $(this).attr('action'),
           type: 'POST',
           data: formData,
           contentType: false,
           processData: false,
           success: function(response) {
               Swal.fire({
                   icon: 'success',
                   title: 'Success',
                   text: 'Todo added successfully!',
               });
               // Optionally, reset the form
               $('#todolist-form')[0].reset();
               normalload();
           },
           error: function(response) {
               let errors = response.responseJSON.errors;
               let errorMessage = '';
   
               for (let field in errors) {
                   errorMessage += `${errors[field][0]}<br>`;
               }
   
               Swal.fire({
                   icon: 'error',
                   title: 'Oops...',
                   html: errorMessage,
               });
           }
       });
   });
   
   
   
   let table = $('#example').DataTable();
   
   
   // for update
   
       $('#todolist-formupdate').on('submit', function(e) {
       e.preventDefault();
       
       let formData = new FormData(this);
   
       $.ajax({
           url: $(this).attr('action'),
           type: 'POST',
           data: formData,
           contentType: false,
           processData: false,
           success: function(response) {
               Swal.fire({
                   icon: 'success',
                   title: 'Success',
                   text: 'Todo Update successfully!',
               });
               $('.tabble').removeClass('d-none');
               $('#todolist-form').removeClass('d-none');
               $('#todolist-formupdate').addClass('d-none');
               $('#todotitle').text('Add New Todo');
               normalload();
           },
           error: function(response) {
               let errors = response.responseJSON.errors;
               let errorMessage = '';
   
               for (let field in errors) {
                   errorMessage += `${errors[field][0]}<br>`;
               }
   
               Swal.fire({
                   icon: 'error',
                   title: 'Oops...',
                   html: errorMessage,
               });
           }
       });
   });
   
   
   function completetodo() {
   $(".check_btn").click(function (e) {
       e.preventDefault();
       const id = $(this).data("id");
       console.log(id);
   
       $.ajax({
           url: `/completetodo/${id}`, 
           type: "GET", 
           success: function (data) {
               console.log(data);
               if (data.response === 1) { 
                   Swal.fire(
                       'Completed!',
                       'Todo completed successfully',
                       'success'
                   );
                   // location.reload();
                   normalload();
               } else {
                   Swal.fire({
                       icon: 'error',
                       title: 'Oops...',
                       text: 'Something went wrong!',
                   });
               }
           },
           error: function (xhr, status, error) {
               console.error(xhr.responseText);
               Swal.fire({
                   icon: 'error',
                   title: 'Oops...',
                   text: 'Something went wrong!',
               });
           }
       });
   });
   }
   
   // Call the function to attach event handlers
   completetodo();
   
   
   function edittodo() {
   $(".edit_btn").click(function (e) {
       e.preventDefault();
       
       const id = $(this).data("id");
       const title = $(this).data("title");
       const description = $(this).data("description");
       
       console.log(id, title, description);
   
       // Assuming you have form fields with these IDs
       $('#titleedit').val(title);
       $('#descriptionedit').val(description);
       $('#todoid').val(id);
   
       $('.tabble').addClass('d-none');
       $('#todolist-form').addClass('d-none');
       $('#todolist-formupdate').removeClass('d-none');
       $('#todotitle').text('Update Todo');
   
   
   });
   }
   
   // Call the function to attach event handlers
   edittodo();
   
   
   
   $(document).ready(function() {
   $("#back").click(function (e) {
       e.preventDefault();
       $('.tabble').removeClass('d-none');
       $('#todolist-form').removeClass('d-none');
       $('#todolist-formupdate').addClass('d-none');
       $('#todotitle').text('Add New Todo');
   });
   });
   
   
   
       function deleteUserFunction() {
           $(".delete_btn").click(function (e) {
               e.preventDefault();
               const id = $(this).data("id");
   
               Swal.fire({
                   title: 'Are you sure?',
                   text: "You won't be able to revert this!",
                   icon: 'warning',
                   showCancelButton: true,
                   confirmButtonColor: '#3085d6',
                   cancelButtonColor: '#d33',
                   confirmButtonText: 'Yes, delete it!'
               }).then((result) => {
                   if (result.isConfirmed) {
                       $.ajax({
                           url: "{{route('todolist.destroy')}}",
                           type: "POST",
                           data: {
                               "_token": "{{ csrf_token() }}", // Add the CSRF token to the data
                               "id": id
                           },
                           success: function (data) {
                               console.log(data);
                               if (data.response == 1) {
                                   Swal.fire(
                                       'Deleted!',
                                       'Todo has been deleted.',
                                       'success'
                                   )
                                   // location.reload();
                                   normalload();
                               } else {
                                   Swal.fire({
                                       icon: 'error',
                                       title: 'Oops...',
                                       text: 'Something went wrong!',
                                   })
                               }
                           }
                       })
   
                   }
               })
   
           })
       }
   
       $('#DataTables_Table_0_filter input').addClass("border border-dark");
   
       $('#type').on('change', function() {
       let searchVal = $(this).val();
       console.log(searchVal);
       if(searchVal != ''){
           $.ajax({
               url: `/searchfilter/${searchVal}`, // Add the appropriate URL for your search endpoint
               type: "GET",
               success: function(data) {
                   console.log(data);
                   if (data.response != 0) {
                       render_tr(data.data);
                   } else {
                       $('#tbody').html('No Data Found!');
                       console.log("not found");
                       Swal.fire({
                           icon: 'error',
                           title: 'Oops...',
                           text: 'No Data Found!',
                       });
                   }
               },
               error: function(data) {
                   console.log(data);
                   // render_tr(data.data);
                   $('#tbody').html('No Data Found!');
                   Swal.fire({
                           icon: 'error',
                           title: 'Oops...',
                           text: 'No Data Found!',
                       });
               }
           });
       }
   });
   
    
   
   
   function render_tr(arr) {
   table.clear();
   let tr='';
   
   arr.forEach((element,index) => {
       let statusBadge = element.is_completed ?
           '<span class="badge badge-success">Completed</span>' :
           '<span class="badge badge-warning">Not Completed</span>';
   
       let checkBtn = element.is_completed ?
           '' :
           `<i class="fs-4 fa fa-check check_btn" data-id="${element.id}"></i>`;
   
       tr +=  `<tr>
           <td>${index + 1}</td>
           <td>${element.title}</td>
           <td>${element.description}</td>
           <td>${statusBadge}</td>
           <td>
               ${checkBtn}
               <i class="fs-4 fa fa-edit edit_btn" data-id="${element.id}" data-title="${element.title}" data-description="${element.description}"></i>
               <i class="fs-4 fa fa-trash delete_btn" data-id="${element.id}"></i>
           </td>
       </tr>`;
   
      
   });
   
   $('#tbody').html(tr);
   
   // Reattach event handlers after rows are added
   edittodo();
   deleteUserFunction();
   completetodo();
   }
   
   function normalload() {
   
   
             $.ajax({
               url: `/searchfilter/`, // Add the appropriate URL for your search endpoint
               type: "GET",
               success: function(data) {
                   console.log(data);
                   if (data.response != 0) {
                       $('#type').val('');
                       render_tr(data.data);
                   } else {
                       $('#type').val('');
                       $('#tbody').html('No Data Found!');
                       console.log("not found");
                       Swal.fire({
                           icon: 'error',
                           title: 'Oops...',
                           text: 'No Data Found!',
                       });
                   }
               },
               error: function(data) {
                   table.clear();
                   console.log(data);
                   Swal.fire({
                           icon: 'error',
                           title: 'Oops...',
                           text: 'No Data Found!',
                       });
               }
           });
   
   }
   
   // Call the function to attach event handlers
   // normalload();
   
   
   
   
       deleteUserFunction();
   
   })
</script>