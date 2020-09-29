<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $title ?></title>
  <link href="<?= base_url() ?>assets/css/font.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/bulma.min.css') ?>" />
  <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/neumorphic-login.css') ?>">
</head>

<body>
  <section class="hero is-fullheight">
    <div class="hero-body has-text-centered">
      <div class="login">
        <img src="https://logoipsum.com/logo/logo-1.svg" width="325px" />
        <form action='<?= base_url() ?>login/auth' accept-charset='utf-8' method='post'>
          <div class="field">
            <div class="control">
              <input class="input is-medium is-rounded" name="username" type="text" placeholder="@username" autocomplete="username" required />
            </div>
          </div>
          <div class="field">
            <div class="control">
              <input class="input is-medium is-rounded" name="password" type="password" placeholder="**********" autocomplete="current-password" required />
            </div>
          </div>
          <br />
          <button class="button is-block is-fullwidth is-primary is-medium is-rounded" type="submit">
            Login
          </button>
        </form>

      </div>
    </div>
  </section>
</body>

</html>