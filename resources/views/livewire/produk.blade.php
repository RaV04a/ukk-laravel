<div class="container mt-5">
    <h1 class="text-center mb-4">Products</h1>

    <form wire:submit.prevent="store" class="mb-4">
        <div class="row">
            <div class="col-md-4">
                <input type="text" wire:model="nama_produk" class="form-control" placeholder="Nama Produk" required>
            </div>
            <div class="col-md-4">
                <input type="number" wire:model="harga" class="form-control" placeholder="Harga" required>
            </div>
            <div class="col-md-4">
                <button type="submit" class="btn btn-primary">Add Product</button>
            </div>
        </div>
    </form>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nama Produk</th>
                <th>Harga</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td>{{ $product->nama_produk }}</td>
                <td>{{ number_format($product->harga, 2, ',', '.') }}</td>
                <td>
                    <button wire:click.prevent="edit({{ $product->id }})" class="btn btn-warning btn-sm">Edit</button>
                    <button wire:click="destroy({{ $product->id }})" class="btn btn-danger btn-sm">Delete</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Edit Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="update">
                        <div class="mb-3">
                            <input type="text" wire:model.defer="nama_produk" class="form-control" placeholder="Nama Produk" required>
                        </div>
                        <div class="mb-3">
                            <input type="number" wire:model.defer="harga" class="form-control" placeholder="Harga" required>
                        </div>
                        <button type="submit" class="btn btn-success">Update Product</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        window.addEventListener('showEditModal', () => {
            var myModal = new bootstrap.Modal(document.getElementById('editModal'));
            myModal.show();
        });

        window.addEventListener('hideEditModal', () => {
            var myModal = bootstrap.Modal.getInstance(document.getElementById('editModal'));
            if (myModal) {
                myModal.hide();
            }
        });
    });
</script>
@livewireScripts