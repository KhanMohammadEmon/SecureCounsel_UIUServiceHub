function cpass(email, pass) {
    console.log();
    Swal.fire({

        html: '<br><label>Old Password</label><br>' +
            '<input id="swal-input1" class="swal2-input required"><br>' +
            '<br><label>New Password</label><br>' +
            '<input id="swal-input2" class="swal2-input required"><br>' +
            '<br><label>Confirm New Password</label><br>' +
            '<input id="swal-input3" class="swal2-input required">',
        focusConfirm: false,

        inputAttributes: {
            autocapitalize: 'off'
        },
        showCancelButton: true,
        confirmButtonText: 'Change Password',
        showLoaderOnConfirm: true,

        allowOutsideClick: () => !Swal.isLoading()
    }).then((result) => {
        if (result.isConfirmed) {

            if (document.getElementById('swal-input1').value == "" || document.getElementById('swal-input2').value == "" || document.getElementById('swal-input3').value == "") {
                Swal.fire('Field can not be empty', '', 'error')
            } else if (document.getElementById('swal-input2').value == document.getElementById('swal-input3').value) {
                enop = document.getElementById('swal-input1').value;
                enop2 = document.getElementById('swal-input2').value;

                if (pass == enop) {

                    link = "change_pass.php?email=" + email + "&&npass=" + enop2;
                    location.href = link;
                } else {
                    Swal.fire('Old Password did not matched', '', 'error')
                }

            } else {
                Swal.fire('Password did not matched', '', 'error')
            }
        } else {
            Swal.fire('Password changing proccess reverted', '', 'warning')
        }
    })
}



