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
    <div class="card pt-4 px-3 table-container">
        <table class="table is-stripped is-hoverable is-fullwidth">
            <thead>
                <tr>
                    <th>No</th>
                    <th>No Akun</th>
                    <th>Nama</th>
                    <th>Tipe Akun</th>
                    <th>Tipe CoA</th>
                    <th>Cr/Db</th>
                    <th>Saldo (Rp)</th>
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
                                <input class="input is-rounded" data-show-header="false" data-color="info" data-display-mode="dialog" name="coa_balance_date" type="date">
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <footer class="modal-card-foot field is-grouped is-grouped-right">
                <div class="control">
                    <button type="submit" class="button simpan-modal is-link is-rounded is-success">SAVE</button>
                </div>
                <div class="control">
                    <a href="#" class="button is-link is-light is-rounded modal-foot-close">CANCEL</a>
                </div>
            </footer>
        </form>
    </div>
</div>

<script type="text/javascript" src="<?= base_url() ?>assets/js/bulma-calendar.min.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/js/datatables.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/js/dataTables.bulma.min.js"></script>
<script type="text/javascript">
    var dataAkun;

    var passingValueData = (fetch_data) => {
        let element = "";
        console.log(fetch_data);
        data = fetch_data.data.data1;
        dataAkun = fetch_data.data.data2;
        let url = '<?= base_url() ?>'
        data.forEach(function(entry, key) {
            let tipeCoA = '';
            entry.coa_balance = Number(entry.coa_balance).toLocaleString('id-ID');
            if (entry.coa_header_detail == 'H') {
                entry.coa_header_detail = 'Header';
            };
            if (entry.coa_header_detail == 'D') {
                entry.coa_header_detail = 'Detail'
            };
            element += '<tr>' +
                '<td> ' + (key + 1) + ' </td>' +
                '<td> ' + entry.coa_no + ' </td>' +
                '<td> ' + entry.coa_nama + ' </td>' +
                '<td> ' + entry.akun_kode + ' - ' + entry.akun_ket + ' </td>';

            element +=
                '<td> ' + entry.coa_header_detail + ' </td>' +
                '<td> ' + entry.coa_crdr + ' </td>' +
                '<td> ' + entry.coa_balance + ' </td>' +
                '<td> ' +
                '<a data-id="' + entry.coa_id + '" data-modal="modal_tambah_akun" class="modal-button">' +
                '<span class="is-medium has-text-warning icon"><i class="fas fa-lg fa-pencil-alt"></i></span></a>' +
                '<a href="' + url + 'accounting/hapus_coa/' + entry.coa_id + '" class="deleteRow">' +
                '<span class="is-medium has-text-danger icon"><i class="fas fa-lg fa-times"></i></span></a>' +
                '</td>' +
                '</tr>';

            tipeCoA = '';
        })
        $('#target').html(element)
        $('.table').DataTable();
    }

    $(document).on('click', 'a.modal-button', function() {
        let el = $(this).attr('name');
        $.each(dataAkun, function(key, entry) {
            console.log('poop');
            $("select[name*='akun_kode']")
                .append($('<option></option>')
                    .attr('value', entry.akun_kode)
                    .text(entry.akun_kode + ' - ' + entry.akun_ket));
        });
    })
    $(document).on("keyup", "input[data-type='currency']", function(event) {
        var selection = window.getSelection().toString();
        if (selection !== '') {
            return;
        }
        if ($.inArray(event.keyCode, [38, 40, 37, 39]) !== -1) {
            return;
        }
        var $this = $(this);
        var input = $this.val();
        var input = input.replace(/[\D\s\._\-]+/g, "");
        input = input ? parseInt(input, 10) : 0;

        $this.val(function() {
            return (input === 0) ? "" : input.toLocaleString("id-ID");
        });
    });

    var calendars = bulmaCalendar.attach('[type="date"]');

    // Loop on each calendar initialized
    for (var i = 0; i < calendars.length; i++) {
        // Add listener to date:selected event
        calendars[i].on('select', date => {
            console.log(date);
        });
    }

    // To access to bulmaCalendar instance of an element
    var element = document.querySelector('#my-element');
    if (element) {
        // bulmaCalendar instance is available as element.bulmaCalendar
        element.bulmaCalendar.on('select', function(datepicker) {
            console.log(datepicker.data.value());
        });
    }
</script>