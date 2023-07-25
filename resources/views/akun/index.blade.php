@extends('layouts.dashboard')
@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-12">
            <div class="bg-light rounded p-4">
                <h2 class="h4 mb-4">Manage Akun</h2>
                <div class="d-flex gap-2 mb-3">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambah-akun">Tambah</button>
                </div>
                <table id="akun-table" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Role</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="tambah-akun" tabindex="-1" aria-labelledby="tambah-akun" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tamhah Akun</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('account.store') }}" method="POST">
                @csrf
                <div class="modal-body">

                    <div class="mb-3">
                        <label class="form-label" for="name">Nama Lengkap</label>
                        <input class="form-control" id="name" name="name" type="text" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="role">Role</label>
                        <select class="form-select" id="role" name="role">
                            <option value="admin" selected>Admin</option>
                            <option value="viewer">Viewer</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="username">Username</label>
                        <input class="form-control" id="username" name="username" type="text" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="password">Password</label>
                        <input class="form-control" id="password" name="password" type="password" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="edit-akun" tabindex="-1" aria-labelledby="edit-akun" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tamhah Akun</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="form-edit-akun" action="" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">

                    <div class="mb-3">
                        <label class="form-label" for="edit-name">Nama Lengkap</label>
                        <input class="form-control" id="edit-name" name="name" type="text" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="edit-role">Role</label>
                        <select class="form-select" id="edit-role" name="role">
                            <option value="admin" selected>Admin</option>
                            <option value="viewer">Viewer</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="edit-username">Username</label>
                        <input class="form-control" id="edit-username" name="username" type="text" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="edit-password">Password baru</label>
                        <input class="form-control" id="edit-password" name="password" type="password">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('script')
<script>
    function getAkunById(id) {
        const editModal = new bootstrap.Modal(document.getElementById('edit-akun'))
        const editForm = document.getElementById('form-edit-akun');
        $.ajax({
            url: `/account/${id}/edit`,
            success: (res) => {
                if (res) {
                    $('#edit-name').val(res.name)
                    $('#edit-username').val(res.username)
                    $("#edit-role option").each(function() {
                        if ($(this).val() === res.role) {
                            $(this).prop("selected", true);
                        }
                    });

                    editForm.setAttribute('action', `/account/${res.id}/update`);
                    editModal.show();
                }
            }
        })
    }
    $('#akun-table').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        ajax: {
            url: "{{ route('account.index') }}",
            data: (res) => (console.log(res))
        },
        columns: [{
                data: 'name',
                name: 'name'
            },
            {
                data: 'username',
                name: 'username',
            },
            {
                data: 'role',
                name: 'role',
            },
            {
                data: null,
                name: null,
                orderable: false,
                render: (data, type, row) => {
                    return `
                <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" onclick="getAkunById('${row.id}')" ><i class="fa fa-edit"></i></button>
                <form class="d-inline" action="/account/${row.id}/destroy" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                </form>
                `
                }
            }
        ],
        language: {
            url: "https://cdn.datatables.net/plug-ins/1.11.4/i18n/id.json"
        },
    })
</script>
@endpush
@endsection
