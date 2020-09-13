const auto_refresh = setInterval(
  function ()
  {
    $('#mainview').load('tchat.php #worldUser');
    $('#frmwriteNck').load('tchat.php #nickname');
  }, 3000 // update the content

  );

