<div class="container">
    <div class="row mt-3">
        <div class="col-12">
            <div class="card border-primary">
                <div class="card-body">
                    <h4 class="card-tittle">Daftar Pengguna</h4>
                        <!-- Button trigger modal -->
                        <a href="{{ url('/tambah') }}" class="btn btn-primary mb-3">
                            <i class="bx bx-plus"></i> Tambah Kasir
                        </a>
                    <table class="table table-bordered">
                        <thead>
                            <th class="text-center">No</th>
                            <th class="text-center">Nama</th>
                            <th class="text-center">Username</th>
                            <th class="text-center">Peran</th>
                            <th class="text-center">Action</th>
                        </thead>
                        <tbody>
                                <tr>
                                    <td class="text-center">1</td>
                                    <td class="text-center">Adryan</td>
                                    <td class="text-center">ElsYans</td>
                                    <td class="text-center">kasir</td>
                                    <td class="text-center">
                                        <div class="d-flex justify-content-center gap-2">
                                            <a href="#" class="btn btn-warning btn-sm py-1 px-3 rounded-1 text-white">
                                                <i class="fa-regular fa-pen-to-square"></i> Edit
                                            </a>
                                            <form action="#" method="POST">
                                                @csrf @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm py-1 px-3 rounded-1" onclick="return confirm('Perhatian! data akan terhapus permanen!!!')">
                                                    <i class="fa-solid fa-trash"></i> Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


