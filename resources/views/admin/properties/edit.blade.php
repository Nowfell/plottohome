@extends('layout.admin.app')

@section('content')

<!-- Modal -->
<div class="modal fade" id="PropertyIconPreview" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Property Image Preview</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" style="text-align: center;">
          <img id="seriveIconImage" style="max-width: 100%;" src="{{ asset('Property Images/'.$property->image) }}">
        </div>
      </div>
    </div>
  </div>

<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">Edit Property</h3>
        <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.properties.index') }}">Properties</a></li>
            <li class="breadcrumb-item active" aria-current="page"> Edit Property </li>
        </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                {{-- <h4 class="card-title">Add Property</h4> --}}
                <p class="card-description">Edit details of the Property</p>
                <form class="forms-sample" method="POST" action="{{ route('admin.properties.update', $property->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="form-group form-inline">
                      <input type="checkbox" class="form-control mr-2" id="propertyFeatured" style="width: 20px;" name="property_featured" @if($property->featured) checked @endif/>
                      <label for="propertyFeatured"style="margin-top: 9px;font-weight: 600;">Featured Property</label>
                    </div>
                  <div class="form-group">
                    <label for="propertyName">Property Name</label>
                    <input type="text" class="form-control @error('property_name') is-invalid @enderror" id="propertyName" name="property_name" value="{{ old('property_name', $property->name) }}" placeholder="Property Name" />
                    
                    @error('property_name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="propertyPrice">Property Price</label>
                    <input type="text" class="form-control @error('property_price') is-invalid @enderror" id="propertyPrice" name="property_price" value="{{ old('property_price', $property->price) }}" placeholder="Property Price" />
                    
                    @error('property_price')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="propertyName">Property Category</label>
                    <select class="form-control @error('property_category') is-invalid @enderror" id="propertyCategory" name="property_category" placeholder="Property Category">
                        @foreach($categories as $key => $category)
                            <option value="{{ $key }}" @if($key == $property->categories) selected @endif>{{ $category }}</option>
                        @endforeach
                    </select>
                    
                    @error('property_category')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    {{-- <input type="text" class="form-control" id="propertyCategory" name="property_category" placeholder="Property Name" /> --}}
                  </div>
                  <div class="form-group">
                    <label for="propertyName">Property Location</label>
                    <select class="form-control @error('property_location') is-invalid @enderror" id="propertyLocation" name="property_location" placeholder="Property Location">
                        @foreach($locations as $location)
                            <option value="{{ $location->location }}" @if($location->location == $property->location) selected @endif>{{ $location->location }}</option>
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
                            <div class="property-images @error('property_images') is-invalid @enderror" style="padding-top: .5rem;"></div>
                            
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
                    >{{ old('property_summary', $property->summary) }}</textarea>
                    
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
                    >{{ $property->description }}</textarea>
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

    let preloaded = [
        @foreach($property->property_uploaded_images as $property_image)
            {id: {{ $property_image->id }}, src: '{{ asset('/Property Images/'.$property_image->name) }}' },
        @endforeach
    ];

    $('.property-images').imageUploader({
        preloaded: preloaded,
        imagesInputName: 'property_images',
        preloadedInputName: 'old_property_images',
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
        readURL($(this)[0]);
    });

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#seriveIconImage').attr('src',e.target.result);
            }

            reader.readAsDataURL(input.files[0]); // convert to base64 string
        }
    }

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
