<div class="main-menu-container">
    <div class="columns mb-0">
        <div class="column px-0">
            <nav class="breadcrumb" aria-label="breadcrumbs">
                <ul>
                    <li><a href="<?= base_url('dashboard'); ?>">Home</a></li>
                    <li><a><?= preg_replace("/[^A-Za-z0-9]+/", " ", ucfirst($this->router->class)) ?></a></li>
                    <li><a><?= preg_replace("/[^A-Za-z0-9]+/", " ", ucfirst($this->router->method)) ?></a></li>
                </ul>
            </nav>
        </div>
        <div class="column">
            <div class="navbar-end">
                <a data-modal="modal_tambah_akun" class="button modal-button is-rounded is-primary is-light has-background-white">
                    <span class="icon">
                        <i class="fas fa-plus"></i>
                    </span>
                </a>
            </div>
        </div>
    </div>
    <div class="card pt-4 px-3 table-container">
        <table class="table is-stripped is-hoverable is-fullwidth">
            <thead>
                <tr>
                    <th>No</th>
                    <th>No Akun</th>
                    <th>Keterangan Akun</th>
                    <th>Created at</th>
                    <th>Created by</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="target">
            </tbody>
        </table>
    </div>
</div>
</div>

<div class="modal" id="modal_tambah_akun">
    <div class="modal-background"></div>
    <div class="modal-card">

        <header class="modal-card-head">
            <p class="modal-card-title">Tambah Akun</p>
            <button class="delete modal-close" aria-label="close is-danger"></button>
        </header>

        <form action='<?= base_url() ?>accounting/simpan_account/' id="form-submit-akun" accept-charset='utf-8' method='post'>
            <section class="modal-card-body">
                <div class="field">
                    <div class="control">
                        <input class="input" name="akun_id" type="hidden" placeholder="e.g 1001">
                    </div>
                </div>
                <div class="field">
                    <label class="label">Nomor</label>
                    <div class="control">
                        <input class="input" name="akun_kode" type="text" placeholder="e.g 1001">
                    </div>
                </div>
                <div class="field">
                    <label class="label">Keterangan</label>
                    <div class="control">
                        <input class="input" name="akun_ket" type="text" placeholder="e.g. Kas & Bank">
                    </div>
                </div>
            </section>

            <footer class="modal-card-foot">
                <div class="field is-grouped">
                    <div class="control">
                        <button type="submit" class="button simpan-modal is-link is-rounded is-success">SAVE</button>
                    </div>
                    <div class="control">
                        <a href="#" class="button is-link is-light is-rounded modal-foot-close">CANCEL</a>
                    </div>
                </div>
            </footer>
        </form>
    </div>
</div>

<script type="text/javascript" src="<?= base_url() ?>assets/js/datatables.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/js/dataTables.bulma.min.js"></script>
<script type="text/javascript">
    var element = "";
    var data;

    var passingValueData = (fetch_data) => {
        data = fetch_data;
        $.each(data, function(key, entry) {
            element += '<tr>' +
                '<td> ' + (key + 1) + ' </td>' +
                '<td> ' + entry.akun_kode + ' </td>' +
                '<td> ' + entry.akun_ket + ' </td>' +
                '<td> ' + entry.created_at + ' </td>' +
                '<td> ' + entry.useride + ' </td>' +
                '<td> ' +
                '<a data-id="' + entry.akun_id + '" data-modal="modal_tambah_akun" class="button modal-button is-light is-rounded has-background-white is-warning">' +
                '<span class="icon"><i class="fas fa-pencil-alt"></i></span></a>' +
                '<a class="button is-light is-rounded has-background-white is-danger">' +
                '<span class="icon"><i class="fas fa-trash"></i></span></a>' +
                '</td>' +
                '</tr>';
        })
        $('#target').html(element)
        $('.table').DataTable();
    }

    $("#form-submit-akun").submit(function(e) {
        e.preventDefault();
        $.ajax({
            url: $(this).attr('action'),
            method: $(this).attr('method'),
            data: $(this).serialize(),
            dataType: "json",
            beforeSend: function() {
                confirm('simpan data ?');
            },
            success: function(data) {
                target.html(data.html)
                passingValueData(data.data)
            }
        })
    })
</script>