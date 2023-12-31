@extends('layout.admin.app')

@push('header-script')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.6/css/responsive.bootstrap4.min.css">
@endpush

@section('content')
<!-- Property View Modal -->
<div class="modal fade" id="viewProperty" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="viewPropertyLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="viewPropertyLabel"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="view-title">Property Name</h4>
                    <p id="view-property-name" class="view-description"></p>
                    <h4 class="view-title">Property Location</h4>
                    <p id="view-property-location" class="view-description"></p>
                    <h4 class="view-title">Property Category</h4>
                    <p id="view-property-category" class="view-description"></p>
                    <h4 class="view-title">Property Image</h4>
                    <p class="view-description">
                        <img id="view-property-image" style="max-width: 100%;"></p>
                    <h4 class="view-title">Property Summary</h4>
                    <p id="view-property-summary" class="view-description"></p>
                    <h4 class="view-title">Property Description</h4>
                    <p id="view-property-description" class="view-description"></p>

                    <div class="row">
                        <div class="col-12 form-group">
                            <div id="view-property-images" class="row"></div>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
        </div>
        {{-- <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div> --}}
      </div>
    </div>
  </div>

    <div class="content-wrapper">
      <div class="page-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 d-flex flex-wrap justify-content-between ">
                    <h3 class="page-title">Properties</h3>
                    <nav aria-label="breadcrumb">
                      <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.properties.index') }}">Properties</a></li>
                        <li class="breadcrumb-item active" aria-current="page"> Properties </li>
                      </ol>
                    </nav>
                </div>
                <div class="col-12">
                    <div class="mb-3">
                        <button class="btn btn-primary mb-2 mb-md-0 mr-2"><a href="{{ route('admin.properties.create') }}"> Add Property </a></button>
                    </div>
                </div>
            </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <table id="properties-table" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th style="width: 4px;">SI No</th>
                        <th>Property</th>
                        <th style="width: 120px;">Action</th>
                    </tr>
                </thead>
            </table>
        </div>
      </div>
    </div>
@endsection

@push('footer-script')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.6/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.6/js/responsive.bootstrap4.min.js"></script>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(function() {
                loadTable();
                function loadTable() {
                    table = $('#properties-table').DataTable({
                            responsive: true,
                            processing: true,
                            serverSide: true,
                            destroy: true,
                            stateSave: true,
                            ajax: '{!! route('admin.properties.data') !!}',
                        {{-- dom: '<"toolbar">frtip',
                                $('div#properties-table_filter').html(
                                    `
                                        <div class=" d-flex flex-wrap justify-content-between ">
                                            <div class="dataTables_length" id="properties-table_length">
                                                <label>
                                                    Show
                                                    <select name="properties-table_length" aria-controls="properties-table" class="custom-select custom-select-sm form-control form-control-sm">
                                                        <option value="10">10</option>
                                                        <option value="25">25</option>
                                                        <option value="50">50</option>
                                                        <option value="100">100</option>
                                                    </select>
                                                    entries
                                                </label>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-form-label">Users</label>
                                                <select class="form-control" name="users" id="users" data-style="form-control">
                                                    <option value="all">All</option>
                                                    @foreach($users as $user)
                                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div id="properties-table_filter" class="dataTables_filter">
                                                <label>
                                                    Search:
                                                    <input type="search" class="form-control form-control-sm" placeholder="" aria-controls="properties-table">
                                                </label>
                                            </div>
                                        </div>
                                    `
                                ); --}}
                            language: {
                                "url": "<?php echo __("app.datatable") ?>"
                            },
                            // "fnDrawCallback": function (oSettings) {
                            //     $("body").tooltip({
                            //         selector: '[data-toggle="tooltip"]'
                            //     });
                            // },
                            // "fnRowCallback" : function(nRow, aData, iDisplayIndex){
                            //         var oSettings = oAllLinksTable.fnSettings();
                            //         $("td:first", nRow).html(oSettings._iDisplayStart+iDisplayIndex +1);
                            //         return nRow;
                            // },
                            columns: [
                                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                                {data: 'name', name: 'name'},
                                {data: 'action', name: 'action'},
                            ]
                        })
                }

        $('body').on('click', '.sa-params', function(){
            var id = $(this).data('property-id');
            swal({
                title: "Are you sure?",
                text: "You will not be able to recover the deleted Property!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel please!",
                closeOnConfirm: true,
                closeOnCancel: true
            }, function(isConfirm){
                if (isConfirm) {

                    var url = "{{ route('admin.properties.destroy',':id') }}";
                    url = url.replace(':id', id);

                    var token = "{{ csrf_token() }}";

                    $.ajax({
                        type: 'POST',
                        url: url,
                        data: {'_token': token, '_method': 'DELETE'},
                        success: function (response) {
//                                 $.unblockUI();
// //                                    swal("Deleted!", response.message, "success");
//                                 table._fnDraw();
                            loadTable();
                        }
                    });
                }
            });
        });

            $('body').on('click','.view-property',function(){
                var id = $(this).data('property-id');
                var url = "{{ route('admin.properties.show',':id') }}";
                    url = url.replace(':id', id);

                    $.ajax({
                        type: 'GET',
                        url: url,
                        success: function (data) {
                            $('#viewPropertyLabel').text(data.property.name);
                            $('#view-property-name').text(data.property.name);
                            $('#view-property-location').text(data.property.location);
                            $('#view-property-category').text(data.category);
                            $('#view-property-image').attr('src', '../Property Images/' + data.property.image);
                            $('#view-property-summary').text(data.property.summary);
                            $('#view-property-description').html(data.property.description);
                        }
                    });
            });
        } );

        @if(Session::has('success'))
            toastr.success("{{ Session::get('success')}}");
        @endif
    </script>
@endpush
