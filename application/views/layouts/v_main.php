<?php $this->load->view('layouts/v_head'); ?>

<body>
    <?php $this->load->view('layouts/v_navbar'); ?>
    <?php $this->load->view('layouts/v_sidebar'); ?>
    <div id="main-body-content" class="column">
        <?php $this->load->view('v_dashboard'); ?>
        <?php $this->load->view('layouts/v_footer'); ?>

        <script type="text/javascript">
            'use strict';

            $(".navBtn:first").addClass('is-active');
            let target = $("#main-body-content");
            let url;

            $(".navBtn").click(function(e) {
                e.preventDefault();
                $(".navBtn").removeClass('is-active');
                $(this).addClass('is-active');
                url = e.target.href;
                fetch_page(url);
                console.log('clicked');
            });

            function fetch_page(url) {
                fetch(url)
                    .then((response) => {
                        response.json().then((data) => {
                            target.html(data.html)
                            passingValueData(data.data)
                        });
                    })
                    .catch((err) => {
                        alert("failed to fetch")
                    });
            };

            $(document).keydown(function(e) {
                if (e.which == 116 || e.keyCode == 82 && e.ctrlKey) { //116 = F5
                    fetch_page(url);
                    return false;
                }
            });

            let add_modal = (el) => {
                $("#" + el).addClass('is-active is-clipped');
            }

            let close_modal = () => {
                $('.modal').removeClass('is-active');
                $('.modal').removeClass('is-clipped');
            }

            $(function() {
                $(document).on('click', 'a.modal-button', function() {
                    let el = $(this).data('modal');
                    let key_val = $(this).data('id');
                    if (key_val) {
                        let modal_data = data.filter(a => a.akun_id == key_val);
                        $.each(modal_data, function(key, entry) {
                            document.getElementsByName("akun_id")[key].value = entry.akun_id;
                            document.getElementsByName("akun_kode")[key].value = entry.akun_kode;
                            document.getElementsByName("akun_ket")[key].value = entry.akun_ket;
                        })
                    } else {
                        $.each(document.getElementsByName("akun_kode"), function(key) {
                            document.getElementsByName("akun_id")[key].value = '';
                            document.getElementsByName("akun_kode")[key].value = '';
                            document.getElementsByName("akun_ket")[key].value = '';
                        })
                    }
                    add_modal(el);
                });

                document.body.addEventListener('click', function(event) {
                    const arr2 = ['modal-close', 'modal-card-head', 'modal-card-foot', 'simpan-modal', 'modal-foot-close'];
                    let arr1 = event.target.classList;
                    arr1.forEach(element => {
                        if (arr2.some(item => item === element)) {
                            close_modal();
                        }
                    });
                });
            })
        </script>
    </div>
</body>

</html>