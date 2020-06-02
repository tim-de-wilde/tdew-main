$('.clickable').on('click', function () {
    const trackId = $(this).attr('track-id');
    const parent = $(this).parent().parent();
    const icon = $(this).find('i').first();
    const exec = [
        ['check', 'color-secondary-4'],
        ['add', 'color-grey-2']
    ];
    const toggle = parseInt($(this).attr('toggle') ?? 0);
    icon.html(exec[toggle][0]);
    icon.attr('class', `material-icons clickable hover-highlight ${exec[toggle][1]}`);

    if (!toggle) {
        parent.removeClass('uk-transition-fade');
    } else {
        parent.addClass('uk-transition-fade');
    }

    $(this).attr('toggle', toggle ? 0 : 1);
});