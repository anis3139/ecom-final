<div class="container ">
    <div class="row border border-dark">
        <div class="col-md-10 offset-md-1 mt-5 ">
            <h1 class="text-center my-5">About Section</h1>

            <table class="table table-striped table-bordered mt-2" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th class="th-sm">Name</th>
                        <th class="th-sm">Input</th>
                        <th class="th-sm">Action</th>
                    </tr>
                </thead>
                <tbody>

                    <tr>
                        <td>
                            <div class="form-group mb-2">
                                <h3>About Section Title:</h3>
                            </div>
                        </td>
                        <td>
                            <div class="form-group mx-sm-3 mb-2">
                                <label for="addTitle" class="sr-only">Title</label>

                                <textarea type="text" required name="" id="addTitle" class="form-control ckeditor" cols="30"
                                    rows="5"><?php if ($results) {
                                            echo $results->title;
                                        } ?></textarea>

                            </div>
                        </td>
                        <td>
                            <button id="submitTitle" type="submit" class="btn btn-primary mb-2">Update</button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="form-group mb-2">
                                <h3>About Description:</h3>
                            </div>
                        </td>
                        <td>
                            <div class="form-group mx-sm-3 mb-2">
                                <label for="addDescription" class="sr-only">Title</label>
                                <textarea required name="" id="addDescription" class="form-control ckeditor" cols="30" rows="10"><?php if ($results) {
                                        echo $results->description;
                                    } ?></textarea>

                            </div>
                        </td>
                        <td>
                            <button id="submitDescription" type="submit" class="btn btn-primary mb-2">Update</button>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <div class="form-group mb-2">
                                <h3>About Page Image:</h3>
                            </div>
                        </td>
                        <td>
                            <div class="form-group mx-sm-3 mb-2 text-center">
                                <label for="addImage" class="sr-only">Image</label>
                                <input id="addImage" required type="file" class="form-control ">
                                <hr>
                                <img id="addimagepreview" style="width: 200px; height:120px !important;"
                                    class="imgPreview mt-3 border rounded" src="
                                    @if($results)
                                    @isset($results)
                                    {{ $results->image1 }}
                                    @endisset
                                @else
                                    @empty($records)
                                                    {{ asset('admin/images/default-image.png') }}
                                    @endempty
                                @endif

                                    " />

                            </div>
                        </td>
                        <td>
                            <button id="submitImage" type="submit" class="btn btn-primary mb-2">Update</button>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <div class="form-group mb-2">
                                <h3>About Page Image 2:</h3>
                            </div>
                        </td>
                        <td>
                            <div class="form-group mx-sm-3 mb-2 text-center">
                                <label for="addImage2" class="sr-only">Image</label>
                                <input id="addImage2" required type="file" class="form-control ">
                                <hr>
                                <img id="addimagepreview2" style="width: 200px; height:120px !important;"
                                    class="imgPreview mt-3 border rounded" src="
                                    @if($results)
                                    @isset($results)
                                    {{ $results->image2 }}
                                    @endisset
                                @else
                                    @empty($records)
                                                    {{ asset('admin/images/default-image.png') }}
                                    @endempty
                                @endif " />

                            </div>
                        </td>
                        <td>
                            <button id="submitImage2" type="submit" class="btn btn-primary mb-2">Update</button>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <div class="form-group mb-2">
                                <h3>About Page Image 3:</h3>
                            </div>
                        </td>
                        <td>
                            <div class="form-group mx-sm-3 mb-2 text-center">
                                <label for="addImage3" class="sr-only">Image</label>
                                <input id="addImage3" required type="file" class="form-control ">
                                <hr>
                                <img id="addimagepreview3" style="width: 200px; height:120px !important;"
                                    class="imgPreview mt-3 border rounded" src="

                                                                     @if($results)
                                                                     @isset($results)
                                                                     {{ $results->image3 }}
                                                                     @endisset
                                                                 @else
                                                                     @empty($records)
                                                                                     {{ asset('admin/images/default-image.png') }}
                                                                     @endempty
                                                                 @endif
                                                                 " />

                            </div>
                        </td>
                        <td>
                            <button id="submitImage3" type="submit" class="btn btn-primary mb-2">Update</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>


