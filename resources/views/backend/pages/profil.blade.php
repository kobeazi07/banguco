@extends('backend.layouts.index')

@section('konten')
    <div class="container-fluid">

        <!-- Page Heading -->


        <!-- Content Row -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Profil</h1>
            {{-- <a href="{{ asset($users->users) }}" target="_blank" rel="noopener noreferrer"
             Pweb       class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                    <i class="fas fa-file-pdf fa-sm text-white-50"></i> Lihat users
                </a> --}}
        </div>
        <form class="editformusers" data-id="{{ $users->id }}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">usersname</label>
                        <input type="text" class="form-control" name="name" id="exampleFormControlInput1"
                            value="{{ $users->name }}" placeholder="masukkan portfolio">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Email</label>
                        <input type="email" name="email" value="{{ $users->email }}"
                            class="form-control form-control-users" id="exampleInputEmail" aria-describedby="emailHelp"
                            placeholder="Enter Email Address...">
                    </div>
                    <div class="input-group">
                        <input type="password" name="password" class="form-control form-control-users"
                            id="exampleInputPassword" placeholder="Password">

                        <div class="input-group-append">
                            <span class="input-group-text" id="togglePassword" style="cursor: pointer;">
                                <i class="bi bi-eye" id="toggleIcon"></i>
                            </span>
                        </div>
                    </div>


                </div>

            </div>

            {{-- <div class="col-lg-6">
                        <label for="">Upload users</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="users">
                            <label class="custom-file-label">Choose
                                file</label>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3 float-right">Save
                            changes</button>
                    </div> --}}
            <button type="submit" class="btn btn-primary mt-3 float-right">Save
                changes</button>
        </form>

    </div>
    <script>
        // Update label filename
        document.addEventListener('change', function(e) {
            if (e.target.classList.contains('custom-file-input')) {
                e.target.nextElementSibling.innerText = e.target.files[0].name;
            }
        });


        $(document).on('submit', '.editformusers', function(e) {
            e.preventDefault();

            let form = $(this);
            let id = form.data('id');
            let formData = new FormData(this);


            $.ajax({
                url: "{{ url('/edit_profiladmin') }}/" + id,
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
