<?php $this->load->view('layouts/v_head'); ?>

<body>
    <?php $this->load->view('layouts/v_navbar'); ?>
    <?php $this->load->view('layouts/v_sidebar'); ?>
    <div id="main-body-content" class="column"></div>
    <?php $this->load->view('layouts/v_footer'); ?>

    <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function() {
            'use strict';
            let target = $("#main-body-content");
            let url;
            let form;

            $(".navBtn").click(function(e) {
                e.preventDefault();
                $(".navBtn").removeClass('is-active');
                $(this).addClass('is-active');
                url = e.target.href;
                fetch_page(url);
            });

            function fetch_page(url) {
                fetch(url)
                    .then((response) => {
                        response.json().then((data) => {
                            target.html(data.html)
                            passingValueData(data)
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

            $(document).on('click', '.modal-button', function() {
                let el = $(this).data('modal');
                let key_val = $(this).data('id');
                let modal_data = data.filter(a => Object.values(a)[0] == key_val);
                const form = document.getElementById(el).querySelector('form');
                if (key_val) {
                    for (let i = 0; i < form.length; i++) {
                        let nameInput = form.elements[i].name;
                        if (nameInput) {
                            $.each(modal_data, function(key, entry) {
                                document.getElementsByName(nameInput)[key].value = entry[nameInput];
                            })
                        }
                    }
                } else {
                    for (let i = 0; i < form.length; i++) {
                        let nameInput = form.elements[i].name;
                        if (nameInput) {
                            document.getElementsByName(nameInput)[0].value = ''
                        }
                    }
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

            $(".navBtn:first").click();

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