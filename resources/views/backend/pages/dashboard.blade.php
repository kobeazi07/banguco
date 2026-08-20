@extends('backend.layouts.index')

@section('konten')
    <div class="container-fluid">

        <!-- Page Heading -->


        <!-- Content Row -->
        @foreach ($setting as $cv)
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                {{-- <a href="{{ asset($cv->cv) }}" target="_blank" rel="noopener noreferrer"
             Pweb       class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                    <i class="fas fa-file-pdf fa-sm text-white-50"></i> Lihat CV
                </a> --}}
            </div>
            <form class="editformcv" data-id="{{ $cv->id }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Judul</label>
                            <input type="text" class="form-control" name="judul" id="exampleFormControlInput1"
                                value="{{ $cv->tittle }}" placeholder="masukkan portfolio">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Deskripsi</label>
                            <textarea class="form-control" id="deskripsi" name="deskripsi" placeholder="masukkan portfolio">{{ $cv->description }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Kata Kunci</label>
                            <input type="text" value="{{ $cv->meta }}" class="form-control" name="meta"
                                id="exampleFormControlInput1" placeholder="masukkan portfolio">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Harga/Liter</label>
                            <input type="number" value="{{ $cv->price }}" class="form-control" name="harga"
                                id="exampleFormControlInput1" placeholder="masukkan portfolio">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">No Wa</label>
                            <input type="number" value="{{ $cv->no_wa }}" class="form-control" name="nowa"
                                id="exampleFormControlInput1" placeholder="masukkan portfolio">
                        </div>

                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Link IG</label>
                            <textarea class="form-control" id="link_ig" name="link_ig" placeholder="masukkan portfolio">{{ $cv->link_ig }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Link Facebook</label>
                            <textarea class="form-control" id="link_facebook" name="link_facebook" placeholder="masukkan portfolio">{{ $cv->link_facebook }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Link Tiktok</label>
                            <textarea class="form-control" id="link_tiktok" name="link_tiktok" placeholder="masukkan portfolio">{{ $cv->link_tiktok }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Text WA</label>
                            <textarea class="form-control" id="text_wa" name="text_wa" placeholder="masukkan portfolio">{{ $cv->text_wa }}</textarea>
                        </div>
                    </div>
                </div>

                {{-- <div class="col-lg-6">
                        <label for="">Upload CV</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="cv">
                            <label class="custom-file-label">Choose
                                file</label>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3 float-right">Save
                            changes</button>
                    </div> --}}
                <button type="submit" class="btn btn-primary mt-3 float-right">Save
                    changes</button>
            </form>
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
                url: "{{ url('/edit_setting') }}/" + id,
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
