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
                <a data-modal="modal_tambah_akun" class="button modal-button is-primary is-rounded is-light has-background-white is-hidden-mobile is-pulled-right">
                    <span class="icon is-large">
                        <i class="fas fa-lg fa-plus"></i>
                    </span>
                </a>
                <a data-modal="modal_tambah_akun" class="button modal-button is-primary is-rounded is-light has-background-white is-hidden-mobile is-pulled-right">
                    <span class="icon is-large">
                        <i class="fas fa-lg fa-plus"></i>
                    </span>
                </a>
                <a data-modal="modal_tambah_akun" class="button modal-button is-primary is-rounded is-light has-background-white is-hidden-mobile is-pulled-right">
                    <span class="icon is-large">
                        <i class="fas fa-lg fa-plus"></i>
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
                    <th data-field="coa_no">No Akun</th>
                    <th data-field="coa_nama">Nama</th>
                    <th data-field="akun_ket" rowspan="2">Tipe Akun</th>
                    <th data-field="coa_header_detail">Tipe CoA</th>
                    <th data-field="coa_crdr">Cr/Db</th>
                    <th data-field="coa_balance">Saldo (Rp)</th>
                    <th data-field="coa_balance_date">Per Tanggal</th>
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
            <p class="modal-card-title">CoA</p>
            <button class="delete modal-close" aria-label="close is-danger"></button>
        </header>

        <form action='<?= base_url() ?>accounting/simpan_coa/' id="form-submit-akun" accept-charset='utf-8' method='post'>
            <section class="modal-card-body">
                <div class="columns">
                    <div class="column">
                        <input class="input" name="coa_id" type="hidden" placeholder="e.g 1001">
                        <div class="field">
                            <label class="label">No CoA</label>
                            <div class="control">
                                <input class="input is-rounded" name="coa_no" type="text" placeholder="e.g 1001">
                            </div>
                        </div>
                    </div>
                    <div class="column">
                        <div class="field">
                            <label class="label">Nama CoA</label>
                            <div class="control">
                                <input class="input is-rounded" name="coa_nama" type="text" placeholder="e.g. Kas & Bank">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="columns">
                    <div class="column is-12">
                        <div class="field">
                            <label class="label">Tipe Akun</label>
                            <div class="control is-expanded">
                                <div class="select is-rounded is-fullwidth">
                                    <select class="input" name="akun_kode" type="text">
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="columns">
                    <div class="column">
                        <div class="field">
                            <label class="label">Credit / Debit</label>
                            <div class="control is-expanded">
                                <div class="select is-rounded is-fullwidth">
                                    <select class="input" name="coa_crdr" type="text">
                                        <option></option>
                                        <option value="Credit">Credit</option>
                                        <option value="Debit">Debit</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="column">
                        <div class="field">
                            <label class="label">Header / Detail</label>
                            <div class="control is-expanded">
                                <div class="select is-rounded is-fullwidth">
                                    <select class="input" name="coa_header_detail" type="text">
                                        <option></option>
                                        <option value="Header">Header</option>
                                        <option value="Detail">Detail</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="columns">
                    <div class="column">
                        <div class="field">
                            <label class="label">Saldo Awal</label>
                            <div class="control">
                                <input class="input is-rounded" data-type="currency" name="coa_balance" type="text" placeholder="e.g 1.000.000">
                            </div>
                        </div>
                    </div>
                    <div class="column">
                        <div class="field">
                            <label class="label">Per Tanggal</label>
                            <div class="control">
                                <input class="datepicker input is-rounded" id="tanggal_berlaku_coa" data-show-header="false" data-color="" name="coa_balance_date" type="date">
                            </div>
                        </div>
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

<script type="text/javascript" src="<?= base_url() ?>assets/js/bulma-calendar.min.js"></script>
<script type="text/javascript">
    // var dataAkun = fetch(dataakun)
    //     .then((response) => {
    //         response.json().then((result) => {
    //             data = result.data
    //             target.html(result.html)
    //             isLoadedAttachDataTable(data)
    //         })
    //     })
    //     .catch((err) => {
    //         alert("failed to fetch")
    //     })
    // var startDateOnDateTimePicker;

    // $(document).on('click', 'a.modal-button', function() {
    //     let el = $(this).attr('name');
    //     $.each(dataAkun, function(key, entry) {
    //         $("select[name*='akun_kode']")
    //             .append($('<option></option>')
    //                 .attr('value', entry.akun_kode)
    //                 .text(entry.akun_kode + ' - ' + entry.akun_ket));
    //     });
    // })

    function hapusElementHidden() {
        $(".datetimepicker").toggleClass('is-hidden');
    }
    var calendars = bulmaCalendar.attach('[type="date"]');
    calendars.forEach(calendar => {
        calendar.on('select', date => {
            hapusElementHidden()
        });
    });

    // var dataAkun = JSON.parse("< $akun ?>");
    // console.log(dataAkun)
</script>