<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $title ?></title>
  <link href="<?= base_url() ?>assets/css/font.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/bulma.min.css') ?>" />
</head>

<body>
  <section class="hero is-fullheight is-light">
    <!-- Hero content: will be in the middle -->
    <div class="hero-body">
      <div class="container">
        <div class="columns">
          <div class="column is-offset-4 is-4">
            <div class="box">
              <div class="card-content">
                <form action='<?= base_url() ?>login/auth' accept-charset='utf-8' method='post'>
                  <div class="field">
                    <label class="label">Name</label>
                    <div class="control">
                      <input class="input is-medium is-rounded" name="username" type="text" placeholder="e.g @admin">
                    </div>
                  </div>

                  <div class="field">
                    <label class="label">Password</label>
                    <div class="control">
                      <input class="input is-medium is-rounded" name="password" type="password" placeholder="**********">
                    </div>
                  </div>
                  <br />
                  <button class="button is-block is-fullwidth is-primary is-medium is-rounded" type="submit">
                    LOGIN
                  </button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </section>
</body>

</html>