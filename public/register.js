(() => {
    $(document).ready(() => {
        $(document).on('input', '#password', (event) => {
            const value = $(event.target).val();
            let strenght = 0;

            if (value.match(/(?=.*[a-z])(?=.*[A-Z])/g)) {
                strenght += 40;
            }
            if (value.match(/(?=.*[\d])/g)) {
                strenght += 40;
            }
            if (value.length >= 10) {
                strenght += 20;
            }

            $('#feedback-percentage').css('width', `${strenght || 40}%`);

            if (value.length === 0) {
                $('#feedback').css('display', 'none');
            } else {
                if (strenght <= 40) {
                    $('#feedback-percentage').css("background-color", "#dc3545");
                    $('#feedback-percentage').html("Baja");
                } else if (strenght <= 80) {
                    $('#feedback-percentage').css("background-color", "#ffc107");
                    $('#feedback-percentage').html("Media");
                } else {
                    $('#feedback-percentage').css("background-color", "#28a745");
                    $('#feedback-percentage').html("Alta");
                }

                $('#feedback').css('display', 'block');
            }
        });
    });
})();
