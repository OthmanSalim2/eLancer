import "./bootstrap";

import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.start();

// here private because me make listen on private channel
// here notification() method it use to make listen on event of notification
// data here represent the data that sent to private channel
window.Echo.private(`App.Model.User.${userId}`).notification((data) => {
    $("#notificationsList").prepend(`
    <li class="notifications-not-read">
    {{-- data it'd represent the felid in database --}}
    <a href="${data.url}?notify_id="${data.user_id}">
        <span class="notification-icon"><i class="icon-material-outline-group"></i></span>
        <span class="notification-text">
                <strong>*</strong>
            ${data.body}
        </span>
        </a>
    </li>
    `);

    let count = Number($("#newNotifications").text());
    count++;
    if (count > 99) {
        count = "99+";
    }
    $("#newNotifications").text(count);
});

/* here must pit dot(.) in the first from name of event if was without dot laravel will understand as
    App\Events\message.created and this mistake
*/
window.Echo.joi(`messages.${userId}`).listen(
    ".message.created",
    function (data) {
        // the first .message. from broadcastWith() from event
        alert(data.message.message);
    }
);
