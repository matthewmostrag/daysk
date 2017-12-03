// Do and undo tasks
$('.task').click(function(){
    var $this = $(this);
    var task_id = $this.attr('data-id');
    var task_status = $this.attr('data-status');

    var url = "/tasks/" + task_id + "/";
    if (task_status == 1) {
        url += "undone";
    } else {
        url += "done";
    }

    $.ajax({
        url: url,
        success: function(response) {
            switchStatus();
        }
    });

    function switchStatus() {
        if (task_status == 1) {
            $this.removeClass("status-1");
            $this.addClass("status-0");
            $this.attr('data-status', 0);
        } else {
            $this.removeClass("status-0");
            $this.addClass("status-1");
            $this.attr('data-status', 1);
        }
    }
});
