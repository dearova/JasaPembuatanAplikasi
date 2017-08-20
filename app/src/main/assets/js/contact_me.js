$(function() {

    $("#contactForm input,#contactForm textarea").jqBootstrapValidation({
        preventSubmit: true,
        submitError: function($form, event, errors) {
            // additional error messages or events
        },
        submitSuccess: function($form, event) {
            // Prevent spam click and default submit behaviour
            $("#btnSubmit").attr("disabled", true);
            event.preventDefault();
            
            // get values from FORM
            var nama = $("input#nama").val();
            var email = $("input#email").val();
            var phone = $("input#phone").val();
            var lembaga = $("input#lembaga").val();
            var almlembaga = $("input#almlembaga").val();
            var jabatan = $("input#jabatan").val();
            var tujuan = $("input#tujuan").val();
            var proses = $("input#proses").val();
            var harga = $("input#harga").val();
            
            var pesan = $("textarea#pesan").val();
            
            var firstName = nama; // For Success/Failure Message
            // Check for white space in name for Success/Fail message
            if (firstName.indexOf(' ') >= 0) {
                firstName = name.split(' ').slice(0, -1).join(' ');
            }
            $.ajax({
                url: "https://jpap.xyz/proses/ajukan.php",
                type: "POST",
                data: {
                    nama: nama,
                    phone: phone,
                    email: email,
                    lembaga: lembaga,
                    almlembaga: almlembaga,
                    jabatan: jabatan,
                    tujuan: tujuan,
                    proses: proses,
                    harga: harga,
                    pesan: pesan
                },
                cache: false,
                success: function() {
                    // Enable button & show success message
                    $("#btnSubmit").attr("disabled", false);
                    $('#success').html("<div class='alert alert-success'>");
                    $('#success > .alert-success').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                        .append("</button>");
                    $('#success > .alert-success')
                        .append("<strong>Hai " + nama + ", pengajuanmu telah kami terima. </strong>");
                    $('#success > .alert-success')
                        .append('</div>');

                    //clear all fields
                    $('#contactForm').trigger("reset");
                },
                error: function() {
                    // Enable button & show success message
                    $("#btnSubmit").attr("disabled", false);
                    $('#success').html("<div class='alert alert-success'>");
                    $('#success > .alert-success').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                        .append("</button>");
                    $('#success > .alert-success')
                        .append("<strong>Hai " + nama + ", pengajuanmu telah kami terima. </strong>");
                    $('#success > .alert-success')
                        .append('</div>');

                    //clear all fields
                    $('#contactForm').trigger("reset");
                },
            });
        },
        filter: function() {
            return $(this).is(":visible");
        },
    });

    $("a[data-toggle=\"tab\"]").click(function(e) {
        e.preventDefault();
        $(this).tab("show");
    });
});

// When clicking on Full hide fail/success boxes
$('#name').focus(function() {
    $('#success').html('');
});
