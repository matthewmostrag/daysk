// Do and undo tasks
$('.task').click(function(){
    var $this = $(this);
    var task_id = $this.attr('data-id');
    var task_status = $this.attr('data-status');

    $.ajax({
        type: 'PATCH',
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        url: '/tasks/status/' + task_id,
        data: {'status': 1 - task_status},
        success: function(data) {
            switchStatus();
            updateProgression(data);
        }
    });

    function switchStatus() {
        $this.removeClass('status-' + task_status);
        $this.addClass('status-' + (1 - task_status));
        $this.attr('data-status', (1 - task_status));
    }

    function updateProgression(data) {
        var progression = data.progression + '%';
        $('.percentage span').text(progression);
        $('.progress-bar span').css('width', progression);

        $('.progress .message').text(data.message);
    }
});
