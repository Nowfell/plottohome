@extends('layout.admin.app')

@section('content')

<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">Add Property</h3>
        <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.properties.index') }}">Properties</a></li>
            <li class="breadcrumb-item active" aria-current="page"> Add Property </li>
        </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                {{-- <h4 class="card-title">Add Property</h4> --}}
                <p class="card-description">Add details for new Property</p>
                <form class="forms-sample" method="POST" action="{{ route('admin.properties.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group form-inline">
                        <input type="checkbox" class="form-control mr-2" id="propertyFeatured" style="width: 20px;" name="property_featured" />
                        <label for="propertyFeatured" style="margin-top: 9px;font-weight: 600;">Featured Property</label>
                    </div>
                  <div class="form-group">
                    <label for="propertyName">Property Name</label>
                    <input type="text" class="form-control @error('property_name') is-invalid @enderror" id="propertyName" name="property_name" value="{{ old('property_name') }}" placeholder="Property Name" />
                    
                    @error('property_name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="propertyPrice">Property Price</label>
                    <input type="text" class="form-control @error('property_price') is-invalid @enderror" id="propertyPrice" name="property_price"value="{{ old('property_price') }}" placeholder="Property Price" />
                    @error('property_price')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="propertyCategory">Property Category</label>
                    <select class="form-control @error('property_category') is-invalid @enderror" id="propertyCategory" name="property_category" value="{{ old('property_category') }}" placeholder="Property Category">
                        @foreach($categories as $key => $category)
                            <option value="{{ $key }}">{{ $category }}</option>
                        @endforeach
                    </select>
                    @error('property_category')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    {{-- <input type="text" class="form-control" id="propertyCategory" name="property_category" value="{{ old('property_category') }}" placeholder="Property Name" /> --}}
                  </div>
                  <div class="form-group">
                    <label for="propertyLocation">Property Location</label>
                    <select class="form-control @error('property_location') is-invalid @enderror" id="propertyLocation" value="{{ old('property_location') }}" name="property_location" placeholder="Property Location">
                        @foreach($locations as $location)
                            <option value="{{ $location->location }}">{{ $location->location }}</option>
                        @endforeach
                    </select>
                    @error('property_location')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    {{-- <input type="text" class="form-control" id="propertyCategory" name="property_category" placeholder="Property Name" /> --}}
                  </div>
                  <div class="form-group">
                    <label for="propertyImage">Property Image</label>
                    {{-- <textarea
                      class="form-control"
                      name="property_icon"
                      id="propertyIcon"
                      rows="3"
                      placeholder="Property Icon"
                    ></textarea> --}}

                    <div class="form-group">
                            <div class="property-images  @error('property_images') is-invalid @enderror" style="padding-top: .5rem;"></div>
                            @error('property_images')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        {{-- <div class="input-group col-xs-12">
                        <input type="text" id="imageUploadName" class="form-control file-upload-info" disabled placeholder="Upload Property Image" />
                        <span class="input-group-append"> --}}
                            {{-- <label class="file-upload-browse btn btn-primary" id="imageUploadLabel" type="button"><input type="file" name="property_image[]" class="file-upload-default" style="display:none;" accept="image/*" /> Upload </label> --}}
                        {{-- </span>
                        </div> --}}
                        {{-- <label class="active">Images</label>
                        <div class="input-images" style="padding-top: .5rem;"></div> --}}
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="propertySummary">Property Summary</label>
                    <textarea
                      class="form-control @error('property_summary') is-invalid @enderror"
                      name="property_summary"
                      id="propertySummary"
                      rows="4"
                      placeholder="Property Summary"
                    >{{ old('property_summary') }}</textarea>
                    @error('property_summary')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="propertyDescription">Property Description</label>
                    <textarea
                      class="form-control"
                      name="property_description"
                      id="propertyDescription"
                      rows="8"
                      placeholder="Property Description"
                    ></textarea>
                  </div>
                  <div class="form-group">
                    {{-- <label>File upload</label>
                    <input type="file" name="img[]" class="file-upload-default" />
                    <div class="input-group col-xs-12">
                      <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image" />
                      <span class="input-group-append">
                        <button class="file-upload-browse btn btn-primary" type="button"> Upload </button>
                      </span>
                    </div> --}}
                  </div>
                  <button type="submit" class="btn btn-primary mr-2"> Submit </button>
                  <button  onclick="javascript:history.back();return false;" class="btn btn-outline-primary bg-white">Cancel</button>
                </form>
              </div>
            </div>
          </div>
        </div>
    </div>

@endsection

@push('footer-script')
  <script>
    // $(document).ready(function(){
    // });
    CKEDITOR.config.height = 500;
    CKEDITOR.config.width = 'auto';
    CKEDITOR.replace('propertyDescription', {
        filebrowserUploadUrl: "{{route('ckeditor.file-upload', ['_token' => csrf_token(),'project' => 'property' ])}}",
        filebrowserUploadMethod: 'form'
    });

    $('.property-images').imageUploader({
        imagesInputName: 'property_images',
    });
    // CKEDITOR.on( 'dialogDefinition', function( ev ) {
    //     // Take the dialog name and its definition from the event data
    //     var dialogName = ev.data.name;
    //     var dialogDefinition = ev.data.definition;

    //     if ( dialogName == 'image' ) {
    //         // Remove upload tab
    //         dialogDefinition.removeContents('Link');
    //         dialogDefinition.removeContents('advanced');
    //     }
    // });
    $('#imageUploadLabel > input').on('change', function(){
        var file = $(this)[0].files[0].name;
        $('#imageUploadName').val(file);
    });

    $('#propertyLocation').select2({
        placeholder: 'Property Location',
        tags: true,
        // ajax: {
        //     url: '{{ url('/location-autocomplete-search') }}',
        //     dataType: 'json',
        //     delay: 250,
        //     processResults: function (data) {
        //         return {
        //             results: $.map(data, function (item) {
        //                 return {
        //                     text: item.location
        //                 }
        //             })
        //         };
        //     },
        //     cache: true
        // }
    });
  </script>
@endpush
