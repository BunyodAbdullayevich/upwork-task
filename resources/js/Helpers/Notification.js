class Notification {
  success() {
    new Noty({
      type: 'success',
      layout: 'topRight',
      text: 'Successfully Done',
      timeout: 1200
    }).show();
  }

  alert() {
    new Noty({
      type: 'alert',
      layout: 'topRight',
      text: 'Are you sure?',
      timeout: 1200
    }).show();
  }

  error() {
    new Noty({
      type: 'alert',
      layout: 'topRight',
      text: 'Something Went Wrong !',
      timeout: 1200
    }).show();
  }

  warning() {
    new Noty({
      type: 'warning',
      layout: 'topRight',
      text: 'Opps Wrong!',
      timeout: 1200
    }).show();
  }
}

export default Notification = new Notification();