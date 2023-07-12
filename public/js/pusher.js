import Echo from 'laravel-echo';

window.Echo = new Echo({
  broadcaster: 'pusher',
  key: '4676023b96ad930e1523',
  cluster: 'eu',
  forceTLS: true
});

var channel = Echo.private(`App.Models.User.${userId}`);
channel.notification(function(data) {
  console.log(JSON.stringify(data));
  alert(JSON.stringify(data));
});