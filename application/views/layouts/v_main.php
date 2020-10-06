<?php $this->load->view('layouts/v_head'); ?>

<body class="is-clipped">
    <?php $this->load->view('layouts/v_navbar'); ?>
    <?php $this->load->view('layouts/v_sidebar'); ?>
    <div id="main-body-content" class="column"></div>
    <?php $this->load->view('layouts/v_footer'); ?>

    <script type="text/javascript" src="<?= base_url() ?>assets/js/bulma-calendar.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/js/script.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/js/jquery-3.4.1.min.js"></script>
    <!-- <script type="text/javascript" src="<?= base_url() ?>assets/js/datatables.js"></script> -->
    <script type="text/javascript" src="<?= base_url() ?>assets/js/vanilla-dataTables.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/js/dataTables.bulma.min.js"></script>
    <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function() {
            'use strict';
            let target = $("#main-body-content");
            let url;
            let form;

            const navBtn = document.querySelectorAll(".navBtn");
            navBtn.forEach(element => {
                element.addEventListener('click', function(e) {
                    e.preventDefault();
                    let url = e.target.href;
                    navBtn.forEach(rm => rm.classList.remove("is-active"));
                    fetch_page(url);
                    element.classList.add("is-active");
                })
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

            let fetch_page = url => {
                fetch(url)
                    .then((response) => {
                        response.json().then((data) => {
                            target.html(data.html)
                            passingValueData(data)
                            isLoadedAttachDataTable()
                        })
                    })
                    .catch((err) => {
                        alert("failed to fetch")
                    })
            };

            let isLoadedAttachDataTable = () => {
                var table = new DataTable("table");
            }

            $(document).keydown(function(e) {
                if (e.which == 116 || e.keyCode == 82 && e.ctrlKey) { //116 = F5
                    fetch_page(url);
                    return false;
                }
            });

            let open_close_modal = (el = null) => {
                const modal = (el) ? document.querySelector('#' + el) : document.querySelector('.modal');
                modal.classList.toggle('is-active');
                modal.classList.toggle('is-clipped');
                let datetime = modal.querySelectorAll(".datetimepicker");
                datetime.forEach(rm => rm.classList.toggle("is-hidden", true))
            }

            $(document).on('click', '.modal-button', function() {
                let el = $(this).data('modal');
                let key_val = $(this).data('id');
                let modal_data = data.filter(a => Object.values(a)[0] == key_val);
                const form = document.getElementById(el).querySelector('form');

                if (key_val) {
                    Array.from(form).forEach(assignVal => {
                        let nameInput = assignVal.name;
                        if (nameInput) {
                            $.each(modal_data, function(key, entry) {
                                document.getElementsByName(nameInput)[key].value = entry[nameInput];
                            })
                        }
                    })
                } else {
                    Array.from(form).forEach(assignVal => {
                        let nameInput = assignVal.name;
                        if (nameInput) {
                            document.getElementsByName(nameInput)[0].value = " ";
                        }
                    })
                }
                open_close_modal(el);
            });

            document.body.addEventListener('click', function(event) {
                const arr2 = ['modal-close', 'modal-card-head', 'modal-card-foot', 'simpan-modal', 'modal-foot-close'];
                let arr1 = event.target.classList;
                arr1.forEach(element => {
                    if (arr2.some(item => item === element)) {
                        open_close_modal();
                    }
                });
            });


            navBtn[0].click();

            $(document).on('click', '.deleteRow', function(e) {
                e.preventDefault();
                let urlDelete = $(this).attr('href');
                fetch(urlDelete)
                    .then((response) => {
                        response.json().then((data) => {
                            $("#main-body-content").html(data.html)
                            passingValueData(data.data);
                        });
                    })
                    .catch((err) => {
                        alert("failed to Delete")
                    });
            })

            form = document.getElementById('form-submit-akun');
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                const data = new FormData(form);
                fetch(form.action, {
                        method: form.method,
                        body: data,
                    })
                    .then(response => response.json())
                    .then(data => {
                        $("#main-body-content").html(data.html);
                        passingValueData(data.data);
                    })
                    .catch(error => {
                        alert('Error Couldn\'t fetch data');
                    });
            });
        });
    </script>
</body>

</html>