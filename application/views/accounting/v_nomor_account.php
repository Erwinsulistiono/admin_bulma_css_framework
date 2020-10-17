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
                    <span class="icon is-large">
                        <i class="fas fa-lg fa-plus"></i>
                    </span>
                </a>
            </div>
        </div>
    </div>
    <div class="card card-shadow pt-4 px-3 table-container">
        <table class="table is-stripped is-hoverable is-fullwidth">
            <thead>
                <tr>
                    <th>No</th>
                    <th data-field="akun_kode">No Akun</th>
                    <th data-field="akun_ket">Keterangan Akun</th>
                    <th data-field="created_at">Created at</th>
                    <th data-field="useride">Created by</th>
                    <th data-action="edit-delete">Action</th>
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
            <p class="modal-card-title">Akun</p>
            <button class="delete modal-close" aria-label="close is-danger"></button>
        </header>

        <form action='<?= base_url() ?>accounting/simpan_nomor_account/' id="form-submit-akun" accept-charset='utf-8' method='post'>
            <section class="modal-card-body">
                <div class="field">
                    <div class="control">
                        <input class="input" name="akun_id" type="hidden" placeholder="e.g 1001">
                    </div>
                </div>
                <div class="field">
                    <label class="label">Nomor</label>
                    <div class="control">
                        <input class="input" name="akun_kode" type="tags" placeholder="e.g 1001">
                    </div>
                </div>
                <div class="field">
                    <label class="label">Keterangan</label>
                    <div class="control">
                        <input class="input" name="akun_ket" type="tags" placeholder="e.g. Kas & Bank">
                    </div>
                </div>
            </section>

            <footer class="modal-card-foot field is-grouped is-grouped-right">
                <div class="control">
                    <a href="#" class="button is-link is-light is-rounded modal-foot-close">Cancel</a>
                </div>
                <div class="control">
                    <button type="submit" class="button simpan-modal is-link is-rounded is-success">Save</button>
                </div>
            </footer>
        </form>
    </div>
</div>