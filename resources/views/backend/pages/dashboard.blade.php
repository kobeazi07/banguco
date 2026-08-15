@extends('backend.layouts.index')

@section('konten')
    <div class="container-fluid">

        <!-- Page Heading -->


        <!-- Content Row -->
        @foreach ($cv as $cv)
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                <a href="{{ asset($cv->cv) }}" target="_blank" rel="noopener noreferrer"
                    class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                    <i class="fas fa-file-pdf fa-sm text-white-50"></i> Lihat CV
                </a>
            </div>
            <form class="editformcv" data-id="{{ $cv->id }}" enctype="multipart/form-data">
                @csrf
                <div class="row">

                    <div class="col-lg-6">
                        <label for="">Upload CV</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="cv">
                            <label class="custom-file-label">Choose
                                file</label>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3 float-right">Save
                            changes</button>
                    </div>
            </form>
    </div>
    @endforeach
    </div>
    <script>
        // Update label filename
        document.addEventListener('change', function(e) {
            if (e.target.classList.contains('custom-file-input')) {
                e.target.nextElementSibling.innerText = e.target.files[0].name;
            }
        });


        $(document).on('submit', '.editformcv', function(e) {
            e.preventDefault();

            let form = $(this);
            let id = form.data('id');
            let formData = new FormData(this);


            $.ajax({
                url: "{{ url('/edit_cv') }}/" + id,
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    Swal.fire('Sukses', response.message, 'success');
                    $('#Edit-' + id).modal('hide');
                    location.reload();
                },
                error: function(xhr) {
                    Swal.fire('Error', 'Terjadi kesalahan', 'error');
                }
            });
        });
    </script>
@endsection
